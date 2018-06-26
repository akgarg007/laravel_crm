<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        // dd($users);
        return view('dashboard',["user_role"=>"admin",'users'=>$users]);
    }

    public function user_destroy($user_id = NULL)
    {
        // echo $user_id;
        if(Auth::check('admin'))
        {
            $user_delete = User::destroy($user_id);
            if($user_delete)
            {
                return back()->with('success','User deleted.');
            }
            else{
                return back()->with('errors','User not deleted.');
            }
        }
    }
}
