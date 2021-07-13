<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use DataTables;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Admin::all();
            return DataTables::of($data)
                ->smart()
                ->toJson();
        }
        return view("admin.admin");
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
            'name' => 'required',
            'username' => 'required|unique:admins,username',
            'password' => 'required',
            'confirm_password' => 'required|same:password',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $admin = new Admin;
        $admin->name = $request->name;
        $admin->username = $request->username;
        $admin->password = bcrypt($request->password);
        $admin->save();


        return redirect()->back()->with('success', 'success');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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

        $admin = Admin::find($id);

        if (!$admin) {
            return redirect()->back()
                ->withErrors(["User not found"])
                ->withInput();
        }

        if ($admin->username != $request->username) {
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'username' => 'required|unique:admins,username',
                'type' => 'required',
            ]);
        }
        if ($admin->username == $request->username) {
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'type' => 'required',
                'username' => 'required',
            ]);
        }

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $admin->name = $request->name;
        $admin->username = $request->username;
        $admin->type = $request->type;
        $admin->save();


        return redirect()->back()->with('edit', 'success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Admin::destroy($id);

        return redirect()->back()->with('delete', 'success');
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        if (!Auth::guard("admin")->attempt(['username' => $request->username, 'password' => $request->password], $request->remember)) {
            return redirect()->back()
                ->withErrors(["Invalid Credentials"])
                ->withInput();
        }

        return redirect("/admin/admin");
    }


    public function reset(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required',
            'password' => 'required',
            'confirm_password' => 'required|same:password',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $admin = Admin::find($request->id);
        $admin->password = bcrypt($request->password);
        $admin->save();


        return redirect()->back()->with('reset', 'success');
    }
}
