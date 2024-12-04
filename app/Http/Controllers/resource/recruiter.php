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
        $recruiters = User::where('role', 'recruiter')->where('profile_updated', TRUE)  
        ->with(['personalInformation', 'contactInformation']) 
        ->get();

       //print_r($recruiters);exit();

        return view('recruiter.index', ['recruiters' => $recruiters]);
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
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
                $request->file('image_path')->move(public_path('storage/images/'), $picture);
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

            return redirect()->route('registration')->with('success', 'Company registered successfully.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $recruiter = User::with(['personalInformation', 'contactInformation'])->find($id);
        return view('recruiter.show',compact('recruiter'));
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
                $request->file('image_path')->move(public_path('storage/images/'), $picture);
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

        return redirect()->route('dashboard')->withSuccess("Company Profile updated successfully");
        //return redirect()->route('registration')->with('success', 'Company registered successfully.');

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

    public function approve(Request $request)
    {
        $id = $request->input('id');
        $status = $request->input('status');

        if($status == 'approved'){
            $cstatus = 1;
        }else{
            $cstatus = 0;
        }

        $recruiter = User::find($id);

        if (!$recruiter) {
            return response()->json(['success' => false, 'message' => 'Item not found']);
        }

        $recruiter->user_status = $cstatus; 
        $recruiter->save();

        if($status == 'approved'){

        return response()->json(['success' => true, 'message' => 'Company approved successfully']);

        }else{
            return response()->json(['success' => true, 'message' => 'Company disapprove successfully']); 
            
        }
    }

    public function deletecompany(Request $request)
    {

        $company = User::findOrFail($request->input('id'));
        if (!$company) {
        return response()->json(['error' => 'Company not found.'], 404);
        }

       
        $company->forceDelete(); 
        return response()->json(['success' => 'The Company has been deleted!']);
    
    }
}
