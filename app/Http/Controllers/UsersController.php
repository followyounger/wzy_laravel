<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\User;
class UsersController extends Controller
{
    /**
     * create
     * zvan
     * 2018/10/27
     */
    public function create()
    {
        return view('users.create');
    }

    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    /**
     * store 保存用户信息
     * zvan
     * 2018/10/27
     * @param Request $request
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:50',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|confirmed|min:6'
        ]);
        $user = User::create([
           'name' => $request->name,
           'email' => $request->email,
           'password' => bcrypt($request->password)
        ]);

        session()->flash('success', '欢迎，您将在这里开启一段新的征程');
        // route 会自动访问的是模型的主键
        return redirect()->route('users.show', [$user]);
    }

}
