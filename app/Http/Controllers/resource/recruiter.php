<?php

namespace App\Http\Controllers\resource;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\PersonalInformation;
use App\Models\ContactInformation;

class recruiter extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $recruiter = User::findOrFail($request->rid);

            $recruiter->first_name = $request->company_name;
            $recruiter->profile_updated = TRUE;
            $recruiter->save();

            $userId = $request->rid;
            $personalInfo = PersonalInformation::where('user_id', $userId)->first();
            if ($personalInfo) {
                $personalInfo->forceDelete();
            }

            $personal_info = new PersonalInformation();

            $personal_info->user_id = $recruiter->id;
            $personal_info->about_me = $request->profile;
            if ($request->file('image_path')) {
                $picture = !empty($request->file('image_path')) ? $request->file('image_path')->getClientOriginalName() : '';
                $request->file('image_path')->move(public_path('assets/images/'), $picture);
            }
            $personal_info->image_path = isset($picture) && !empty($picture) ? $picture : '';
            $personal_info->save();

            $contactInfo = ContactInformation::where('user_id', $userId)->first();
            if ($contactInfo) {
                $contactInfo->forceDelete();
            }
            $contact_info = new ContactInformation();
            $contact_info->user_id      = $recruiter->id;
            $contact_info->email        = $request->email;
            $contact_info->phone_number = $request->phone;
            $contact_info->address      = $request->address;
            $contact_info->website      = $request->website;
            $contact_info->save();

        return redirect()->route('dashboard')->withSuccess("User Profile created successfully");

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
    public function edit($id)
    {
        if (!empty($id)) {
            $recruiter = User::findOrFail($id);
            $personal_information       = PersonalInformation::where('user_id', $id)->get()->first();
            $contact_information        = ContactInformation::where('user_id', $id)->get()->first();
                       
            $info['recruiter'] = $recruiter;
            $info['personal_info'] = $personal_information;
            $info['contact_info'] = $contact_information;
            // print_r($info);exit();
            
            return view('recruiter.edit', ['information' => $info]);
        } else {
            return redirect()->back()->withErrors('Somthing went wrong');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $id = $request->user_id;

        $recruiter = User::findOrFail($id);

            $recruiter->first_name = $request->company_name;
            $recruiter->profile_updated = TRUE;
            $recruiter->save();

            $personal_info = PersonalInformation::where('user_id', $id)->get()->first();
           
            $personal_info->about_me = $request->profile;
            if ($request->file('image_path')) {
                $picture = !empty($request->file('image_path')) ? $request->file('image_path')->getClientOriginalName() : '';
                $request->file('image_path')->move(public_path('assets/images/'), $picture);
            }
            $personal_info->image_path = isset($picture) && !empty($picture) ? $picture : '';
            $personal_info->save();

            $contact_info = ContactInformation::where('user_id', $id)->get()->first();

            $contact_info->user_id      = $recruiter->id;
            $contact_info->email        = $request->email;
            $contact_info->phone_number = $request->phone;
            $contact_info->address      = $request->address;
            $contact_info->website      = $request->website;
            $contact_info->save();

        return redirect()->route('dashboard')->withSuccess("User Profile updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
