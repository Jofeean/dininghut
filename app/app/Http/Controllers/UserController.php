<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use DataTables;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = User::all();
            return DataTables::of($data)
                ->smart()
                ->toJson();
        }
        return view("admin.user");
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
            'username' => 'required|unique:users,username',
            'contact' => 'required',
            'gender' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $user = new User;
        $user->name = $request->name;
        $user->username = $request->username;
        $user->contact = $request->contact;
        $user->gender = $request->gender;
        $user->email = $request->email;
        $user->code = mt_rand(1000000000, 9999999999);
        $user->password = bcrypt($request->password);
        $user->save();

        \Illuminate\Support\Facades\Mail::to($user->email)
            ->queue(new \App\Mail\UserVerification($user));

//        dd($user);

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
        $user = User::find($id);

        if (!$user) {
            return redirect()->back()
                ->withErrors(["User not found"])
                ->withInput();
        }

        if ($user->username != $request->username || $user->email != $request->email) {
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'username' => 'required|unique:users,username',
                'contact' => 'required',
                'gender' => 'required',
                'email' => 'required|unique:users,email',
            ]);
        }
        if ($user->username == $request->username && $user->email == $request->email) {
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'username' => 'required',
                'contact' => 'required',
                'gender' => 'required',
                'email' => 'required',
            ]);
        }

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $user->name = $request->name;
        $user->username = $request->username;
        $user->contact = $request->contact;
        $user->gender = $request->gender;
        $user->email = $request->email;
        $user->save();


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
        User::destroy($id);

        return redirect()->back()->with('delete', 'success');
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        if (!Auth::guard("user")->attempt(['email' => $request->email, 'password' => $request->password, 'verified' => 1], $request->remember)) {
            return redirect()->back()
                ->withErrors(["Invalid Credentials or Please check your email to verify your account"])
                ->withInput();
        }

        return redirect("/reservation");
    }

    public function verification($code, $email)
    {
        $user = User::where('email', $email)->where('code', $code)->first();
        if ($user) {
            User::where('id', $user->id)->update(['verified' => true]);
        }

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

        $user = User::find($request->id);
        $user->password = bcrypt($request->password);
        $user->save();


        return redirect()->back()->with('reset', 'success');
    }

    public function forgot(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
            'confirm_password' => 'required|same:password',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $user = User::where("email", $request->email)->first();

        if (!$user) {
            return redirect()->back()
                ->withErrors(["Email not found"])
                ->withInput();
        }

        $user->password = bcrypt($request->password);
        $user->save();


        return redirect()->back()->with('reset', 'success');
    }
}
