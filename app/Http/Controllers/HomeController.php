<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::user()->isStudent()) {
        return redirect()->route('registration');
        }else{

            return view('home');

        }
    }

    public function registration()
    {

        
        $userId = Auth::user()->id;
        $student = User::where('id', $userId)->first();

       // print_R($student);exit();
        
        return view('student_registration',compact('student'));
    }

}
