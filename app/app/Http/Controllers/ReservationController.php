<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use DataTables;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Reservation::with("users");
            return DataTables::of($data)
                ->smart(true)
                ->toJson();
        }

        $dates = Reservation::select("date")
            ->groupBy("date")
            ->get();

        $dates_status_collation = array();

        foreach ($dates as $date) {
            $reservations = Reservation::with('users')->where("date", $date->date)->get();
            $nan = Reservation::where("date", $date->date)->where("status", 0)->count();
            $confirmed = Reservation::where("date", $date->date)->where("status", 1)->count();
            $denied = Reservation::where("date", $date->date)->where("status", 2)->count();

            array_push($dates_status_collation,
                [
                    "date" => $date->date,
                    "reservations" => $reservations,
                    "nan" => $nan,
                    "confirmed" => $confirmed,
                    "denied" => $denied,
                ]);
        }

        $data["dates"] = $dates_status_collation;

//        return $data;

        return view("admin.reservation", $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'date' => 'required',
            'person' => 'required|numeric',
            'time' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $reservation = new Reservation();
        $reservation->user_id = Auth::guard("user")->user()->id;
        $reservation->date = $request->date;
        $reservation->attendees = $request->person;
        $reservation->time = $request->time;
        $reservation->save();

        return redirect()->back()->with('success', 'success');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $request)
    {
        if ($request->ajax()) {
            $data = Reservation::with("users")->where("date", $id);
            return DataTables::of($data)
                ->smart(true)
                ->toJson();
        }

        $dates = Reservation::select("date")
            ->groupBy("date")
            ->get();

        $dates_status_collation = array();

        foreach ($dates as $date) {
            $reservations = Reservation::with('users')->where("date", $date->date)->get();
            $nan = Reservation::where("date", $date->date)->where("status", 0)->count();
            $confirmed = Reservation::where("date", $date->date)->where("status", 1)->count();
            $denied = Reservation::where("date", $date->date)->where("status", 2)->count();

            array_push($dates_status_collation,
                [
                    "date" => $date->date,
                    "reservations" => $reservations,
                    "nan" => $nan,
                    "confirmed" => $confirmed,
                    "denied" => $denied,
                ]);
        }

        $data["dates"] = $dates_status_collation;
        $data["day"] = $id;

        return view("admin.reservation", $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function changeStatus($id, $status)
    {
        Reservation::find($id)
            ->update(['status' => $status]);

        return redirect()->back()->with('success', 'success');
    }

}
