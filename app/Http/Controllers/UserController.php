<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    
    public function index() {
        $x = 1;
        $users = User::get();
        return view('back.pages.users', compact('users', 'x'));
    }
  
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('back.pages.update_user', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->role = $request->roles;
        $user->save();
        $msg = "کاربر مورد نظر با موفقیت ویرایش گردید";
        return redirect(route('admin.users'))->with('success', $msg);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        $msg = "حذف با موفقیت انجام شد";
        return redirect(route('admin.users'))->with('success', $msg);
    }

    public function updatestatus(User $user)
    {
        if ($user->status == 1) {
            $user->status = 0;
        } else {
            $user->status = 1;
        }

        $user->save();
        $msg = "بروزرسانی با موفقیت انجام شد";
        return redirect(route('admin.users'))->with('success', $msg);
    }
}
