<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ModUserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserManagementController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('page.admin.user', ['users' => $users]);
    }

    public function reset(ModUserRequest $request)
    {
        $req = $request->validated();

        $pwd = Str::password(8);
        $u = User::find($req['user_id']);
        $u->password = Hash::make($pwd);
        $u->save();

        return redirect()->route('admin.user')->with('pwd', $pwd);
    }

    public function verify(ModUserRequest $request)
    {
        $req = $request->validated();

        $u = User::find($req['user_id']);
        $u->markEmailAsVerified();
        $u->save();

        return redirect()->route('admin.user')->with('status', 'successfully verify email|success');
    }
}
