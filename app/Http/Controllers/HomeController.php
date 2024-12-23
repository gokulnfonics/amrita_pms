<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\TblLanguage;

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
        if (Auth::user()->isStudent() || Auth::user()->isRecruiter()) {

            $userId = Auth::user()->id;
        $user = User::where('id', $userId)->first();
        if($user->profile_updated == TRUE){

            if (Auth::user()->isStudent()) {
                return redirect()->route('job.index'); // Redirect students to job.index
            }else{

            return view('home');
            }

        }else{

        return redirect()->route('registration');
        }
        }else{

            return view('home');

        }
    }

    public function registration()
    {
   
        if (Auth::user()->isStudent()){
        
        $userId = Auth::user()->id;
        $student = User::where('id', $userId)->first();

        $languages = TblLanguage::all();
        
        return view('student_registration',compact('student','languages'));
    }else{

        $userId = Auth::user()->id;
        $recruiter = User::where('id', $userId)->first();

        return view('recruiter_registration',compact('recruiter'));

    }
    }

}
