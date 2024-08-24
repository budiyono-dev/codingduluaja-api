<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Admin\ModUserRequest;

class UserManagementController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('page.admin.user', ['users' => $users]);
    }

    public function reset(ModUserRequest $request){
        $req = $request->validated();

        $pwd = Str::password(8); 
        $u = User::find($req['user_id']);
        $u->password = Hash::make($pwd);
        $u->save();

        return redirect()->route('admin.user')->with('pwd', $pwd);
    }

    public function verify(ModUserRequest $request){
        $req = $request->validated();

        $u = User::find($req['user_id']);
        $u->markEmailAsVerified();
        $u->save();

        return redirect()->route('admin.user')->with('status', 'successfully verify email|success');
    }
}
