<?php

namespace App\Http\Controllers\resource;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\ContactInformation;
use App\Models\Education;
use App\Models\Experience;
use App\Models\Interests;
use App\Models\Languages;
use App\Models\PersonalInformation;
use App\Models\Projects;
use App\Models\Skills;
use Illuminate\Http\Request;

class student extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

        $student = User::findOrFail($request->sid);

                $student->first_name = $request->first_name;
                $student->last_name = $request->last_name;
                $student->save();

        $personal_info = new PersonalInformation();
        $personal_info->user_id        = $student->id;
        $personal_info->profile_title     = $request->profile_title;
        $personal_info->about_me          = $request->about_me;
        if ($request->file('image_path')) {
            $picture       = !empty($request->file('image_path')) ? $request->file('image_path')->getClientOriginalName() : '';
            $request->file('image_path')->move(public_path('assets/images/'), $picture);
        }
        $personal_info->image_path        = isset($picture) && !empty($picture) ? $picture : '';
        $personal_info->save();

       
        $contact_info = new ContactInformation();
        $contact_info->user_id          = $student->id;
        $contact_info->email            = $request->email;
        $contact_info->phone_number     = $request->phone_number;
        $contact_info->website          = $request->website;
        $contact_info->linkedin_link    = $request->linkedin_link;
        $contact_info->github_link      = $request->github_link;
        $contact_info->twitter          = $request->twitter;
        $contact_info->save();


        $edu_count = count($request->degree_title);
        if ($edu_count != 0) {
            for ($i = 0; $i < $edu_count; $i++) {

                $education_info = new Education();
                $education_info->user_id                = $student->id;
                $education_info->degree_title           = $request->degree_title[$i];
                $education_info->institute              = $request->institute[$i];
                $education_info->edu_start_date         = $request->edu_start_date[$i];
                $education_info->edu_end_date           = $request->edu_end_date[$i];
                $education_info->education_description  = $request->education_description[$i];
                $education_info->save();
            }
        }


        $exp_count = count($request->job_title);
        if ($exp_count != 0) {
            for ($i = 0; $i < $exp_count; $i++) {

                $experience_info = new Experience();
                $experience_info->user_id          = $student->id;
                $experience_info->job_title        = $request->job_title[$i];
                $experience_info->organization     = $request->organization[$i];
                $experience_info->job_start_date   = $request->job_start_date[$i];
                $experience_info->job_end_date     = $request->job_end_date[$i];
                $experience_info->job_description  = $request->job_description[$i];
                $experience_info->save();
            }
        }

        $project_count = count($request->project_title);
        if ($project_count != 0) {
            for ($i = 0; $i < $project_count; $i++) {

                $project_info = new Projects();
                $project_info->user_id              = $student->id;
                $project_info->project_title        = $request->project_title[$i];
                $project_info->project_description  = $request->project_description[$i];
                $project_info->save();
            }
        }

        $skill_count = count($request->skill_name);
        if ($skill_count != 0) {
            for ($i = 0; $i < $skill_count; $i++) {

                $skill_info = new Skills();
                $skill_info->user_id           = $student->id;
                $skill_info->skill_name        = $request->skill_name[$i];
                $skill_info->skill_percentage  = $request->skill_percentage[$i];
                $skill_info->save();
            }
        }

        $lang_count = count($request->language);
        if ($lang_count != 0) {
            for ($i = 0; $i < $lang_count; $i++) {

                $language_info = new Languages();
                $language_info->user_id         = $student->id;
                $language_info->language        = $request->language[$i];
                $language_info->language_level  = $request->language_level[$i];
                $language_info->save();
            }
        }

        $interest_count = count($request->interest);
        if ($interest_count != 0) {
            for ($i = 0; $i < $interest_count; $i++) {

                $interest_info = new Interests();
                $interest_info->user_id         = $student->id;
                $interest_info->interest        = $request->interest[$i];
                $interest_info->save();
            }
        }

        return redirect()->route('students.show', $student->id)->withSuccess("User Profile created successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (!empty($id)) {
            $student = User::findOrFail($id);
            $personal_information       = PersonalInformation::where('user_id', $id)->get()->first()->toArray();
            $contact_information        = ContactInformation::where('user_id', $id)->get()->first()->toArray();
            $education_information      = Education::where('user_id', $id)->get()->toArray();
            $experience_information     = Experience::where('user_id', $id)->get()->toArray();
            $project_information        = Projects::where('user_id', $id)->get()->toArray();
            $skill_information          = Skills::where('user_id', $id)->get()->toArray();
            $language_information       = Languages::where('user_id', $id)->get()->toArray();
            $interest_information       = Interests::where('user_id', $id)->get()->toArray();


            $info['student']      = $student;
            $info['personal_info']      = $personal_information;
            $info['contact_info']       = $contact_information;
            $info['education_info']     = $education_information;
            $info['experience_info']    = $experience_information;
            $info['project_info']       = $project_information;
            $info['skill_info']         = $skill_information;
            $info['language_info']      = $language_information;
            $info['interest_info']      = $interest_information;
        }

        return view('student.view', ['information' => $info]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
