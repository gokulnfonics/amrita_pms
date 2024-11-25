<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'role' => ['required'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => [
                'required',
                'string',
                'min:8',
                'regex:/^(?=.*[a-zA-Z])(?=.*\d)(?=.*[^a-zA-Z\d]).+$/',
            ],
            'fname' => [Rule::requiredIf($data['role'] === 'Student')],
            'lname' => [Rule::requiredIf($data['role'] === 'Student')],
            'cname' => [Rule::requiredIf($data['role'] === 'Recruiter')],
        ], [
            'password.regex' => 'The password must be at least 8 characters long and include a mix of letters, numbers, and symbols.',
            'fname.required_if' => 'The first name is required when the role is Student.',
            'lname.required_if' => 'The last name is required when the role is Student.',
            'cname.required_if' => 'The company name is required when the role is Recruiter.',
        ]);
        
        
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'first_name' => $data['role'] === 'Recruiter' ? $data['cname'] : $data['fname'],
            'last_name' => $data['role'] === 'Recruiter' ? null : $data['lname'], // Recruiters may not have a last name
            'email' => $data['email'],
            'role' => $data['role'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
