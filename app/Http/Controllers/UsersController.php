<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
