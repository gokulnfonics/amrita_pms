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
use App\Models\TblLanguage;
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
        $students = User::where('role', 'student')->where('profile_updated', TRUE)  
        ->with(['personalInformation', 'contactInformation']) 
        ->get();

       //print_r($recruiters);exit();

        return view('student.index', ['students' => $students]);
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
                $student->profile_updated = TRUE;
                $student->save();

                  $userId = $request->sid;
                $personalInfo = PersonalInformation::where('user_id', $userId)->first();

                if ($personalInfo) {
                    $personalInfo->forceDelete();
                }
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

        $contactInfo = ContactInformation::where('user_id', $userId)->first();

        if ($contactInfo) {
            $contactInfo->forceDelete();
        }
        $contact_info = new ContactInformation();
        $contact_info->user_id          = $student->id;
        $contact_info->email            = $request->email;
        $contact_info->phone_number     = $request->phone_number;
       // $contact_info->website          = $request->website;
        $contact_info->linkedin_link    = $request->linkedin_link;
        //$contact_info->github_link      = $request->github_link;
        //$contact_info->twitter          = $request->twitter;
        $contact_info->save();


        $educationInfo = Education::where('user_id', $userId)->forceDelete();


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

        $experienceInfo = Experience::where('user_id', $userId)->forceDelete();

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

        $projectsInfo = Projects::where('user_id', $userId)->forceDelete();
        
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

        $SkillsInfo = Skills::where('user_id', $userId)->forceDelete();
        

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

        $LanguagesInfo = Languages::where('user_id', $userId)->forceDelete();

        

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

        $InterestsInfo = Interests::where('user_id', $userId)->forceDelete();

        

        $interest_count = count($request->interest);
        if ($interest_count != 0) {
            for ($i = 0; $i < $interest_count; $i++) {

                $interest_info = new Interests();
                $interest_info->user_id         = $student->id;
                $interest_info->interest        = $request->interest[$i];
                $interest_info->save();
            }
        }

        return redirect()->route('student.show', $student->id)->withSuccess("User Profile created successfully");
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
            //$language_information       = Languages::where('user_id', $id)->get()->toArray();
            $language_information = Languages::where('user_id', $id)
            ->with('fetchlanguage') 
                ->get();

            $interest_information       = Interests::where('user_id', $id)->get()->toArray();

           // print_r($language_information);exit();


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
        if (!empty($id)) {
            $student = User::findOrFail($id);
            $personal_information       = PersonalInformation::where('user_id', $id)->get()->first()->toArray();
            $contact_information        = ContactInformation::where('user_id', $id)->get()->toArray();
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

            $alllanguages = TblLanguage::all();

            return view('student.edit', ['information' => $info,'languages'=>$alllanguages]);
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

            $student = User::findOrFail($id);

            $student->first_name = $request->first_name;
            $student->last_name = $request->last_name;
            $student->profile_updated = TRUE;
            $student->save();

            $personal_info = PersonalInformation::where('user_id', $id)->get()->first();
            $personal_info->profile_title     = $request->profile_title;
            $personal_info->about_me          = $request->about_me;
            if ($request->file('image_path')) {
                $picture       = !empty($request->file('image_path')) ? $request->file('image_path')->getClientOriginalName() : '';
                $request->file('image_path')->move(public_path('assets/images/'), $picture);
            }
            if (!empty($request->file('image_path'))) {
                $personal_info->image_path        = isset($picture) && !empty($picture) ? $picture : '';
            }
            $personal_info->save();

            $contact_info = ContactInformation::where('user_id', $id)->get()->first();
            $contact_info->user_id          = $id;
            $contact_info->email            = $request->email;
            $contact_info->phone_number     = $request->phone_number;
            //$contact_info->website          = $request->website;
            $contact_info->linkedin_link    = $request->linkedin_link;
            //$contact_info->github_link      = $request->github_link;
            //$contact_info->twitter          = $request->twitter;
            $contact_info->save();


            $education_info     = Education::where('user_id', $id)->get();
            $edu_count_local    = !empty($request->degree_title) ? count($request->degree_title) : 0;
            $edu_count_live     = count($education_info);

            $edu_count_live >= $edu_count_local ? $edu_count = $edu_count_live : $edu_count = $edu_count_local;

            if ($edu_count != 0) {
                for ($i = 0; $i < $edu_count; $i++) {

                    if ($edu_count_local > 0 && $edu_count_live <= 0) {

                        $edu_info = new Education();
                        $edu_info->user_id                = $id;
                        $edu_info->degree_title           = $request->degree_title[$i];
                        $edu_info->institute              = $request->institute[$i];
                        $edu_info->edu_start_date         = $request->edu_start_date[$i];
                        $edu_info->edu_end_date           = $request->edu_end_date[$i];
                        $edu_info->education_description  = $request->education_description[$i];
                        $edu_info->save();
                    } elseif ($edu_count_live > 0 && $edu_count_local <= 0) {

                        Education::find($education_info[$i]['id'])->delete();
                    } else {

                        $education_info[$i]->user_id                = $id;
                        $education_info[$i]->degree_title           = $request->degree_title[$i];
                        $education_info[$i]->institute              = $request->institute[$i];
                        $education_info[$i]->edu_start_date         = $request->edu_start_date[$i];
                        $education_info[$i]->edu_end_date           = $request->edu_end_date[$i];
                        $education_info[$i]->education_description  = $request->education_description[$i];
                        $education_info[$i]->save();
                    }

                    $edu_count_local--;
                    $edu_count_live--;
                }
            }



            $experience_info    = Experience::where('user_id', $id)->get();
            $exp_count_local    = !empty($request->job_title) ? count($request->job_title) : 0;
            $exp_count_live     = count($experience_info);

            $exp_count_live >= $exp_count_local ? $exp_count = $exp_count_live : $exp_count = $exp_count_local;

            if ($exp_count != 0) {
                for ($i = 0; $i < $exp_count; $i++) {

                    if ($exp_count_local > 0 && $exp_count_live <= 0) {

                        $exp_info = new Experience();
                        $exp_info->user_id          = $id;
                        $exp_info->job_title        = $request->job_title[$i];
                        $exp_info->organization     = $request->organization[$i];
                        $exp_info->job_start_date   = $request->job_start_date[$i];
                        $exp_info->job_end_date     = $request->job_end_date[$i];
                        $exp_info->job_description  = $request->job_description[$i];
                        $exp_info->save();
                    } elseif ($exp_count_live > 0 && $exp_count_local <= 0) {

                        Experience::find($experience_info[$i]['id'])->delete();
                    } else {
                        $experience_info[$i]->user_id          = $id;
                        $experience_info[$i]->job_title        = $request->job_title[$i];
                        $experience_info[$i]->organization     = $request->organization[$i];
                        $experience_info[$i]->job_start_date   = $request->job_start_date[$i];
                        $experience_info[$i]->job_end_date     = $request->job_end_date[$i];
                        $experience_info[$i]->job_description  = $request->job_description[$i];
                        $experience_info[$i]->save();
                    }

                    $exp_count_local--;
                    $exp_count_live--;
                }
            }



            $project_info           = Projects::where('user_id', $id)->get();
            $project_count_local    = !empty($request->project_title) ? count($request->project_title) : 0;
            $project_count_live     = count($project_info);

            $project_count_live >= $project_count_local ? $project_count = $project_count_live : $project_count = $project_count_local;

            if ($project_count != 0) {
                for ($i = 0; $i < $project_count; $i++) {

                    if ($project_count_local > 0 && $project_count_live <= 0) {

                        $pro_info = new Projects();
                        $pro_info->user_id              = $id;
                        $pro_info->project_title        = $request->project_title[$i];
                        $pro_info->project_description  = $request->project_description[$i];
                        $pro_info->save();
                    } elseif ($project_count_live > 0 && $project_count_local <= 0) {

                        Projects::find($project_info[$i]['id'])->delete();
                    } else {

                        $project_info[$i]->user_id              = $id;
                        $project_info[$i]->project_title        = $request->project_title[$i];
                        $project_info[$i]->project_description  = $request->project_description[$i];
                        $project_info[$i]->save();
                    }

                    $project_count_live--;
                    $project_count_local--;
                }
            }


            $skill_info           = Skills::where('user_id', $id)->get();
            $skill_count_local    = !empty($request->skill_name) ? count($request->skill_name) : 0;
            $skill_count_live     = count($skill_info);

            $skill_count_live >= $skill_count_local ? $skill_count = $skill_count_live : $skill_count = $skill_count_local;

            if ($skill_count != 0) {
                for ($i = 0; $i < $skill_count; $i++) {

                    if ($skill_count_local > 0 && $skill_count_live <= 0) {

                        $sk_info = new Skills();
                        $sk_info->user_id           = $id;
                        $sk_info->skill_name        = $request->skill_name[$i];
                        $sk_info->skill_percentage  = $request->skill_percentage[$i];
                        $sk_info->save();
                    } elseif ($skill_count_live > 0 && $skill_count_local <= 0) {

                        Skills::find($skill_info[$i]['id'])->delete();
                    } else {

                        $skill_info[$i]->user_id           = $id;
                        $skill_info[$i]->skill_name        = $request->skill_name[$i];
                        $skill_info[$i]->skill_percentage  = $request->skill_percentage[$i];
                        $skill_info[$i]->save();
                    }

                    $skill_count_live--;
                    $skill_count_local--;
                }
            }



            $language_info          = Languages::where('user_id', $id)->get();
            $lang_count_local       = !empty($request->language) ? count($request->language) : 0;
            $lang_count_live        = count($language_info);

            $lang_count_live >= $lang_count_local ? $lang_count = $lang_count_live : $lang_count = $lang_count_local;

            if ($lang_count != 0) {
                for ($i = 0; $i < $lang_count; $i++) {

                    if ($lang_count_local > 0 && $lang_count_live <= 0) {

                        $lang_info = new Languages();
                        $lang_info->user_id         = $id;
                        $lang_info->language        = $request->language[$i];
                        $lang_info->language_level  = $request->language_level[$i];
                        $lang_info->save();
                    } elseif ($lang_count_live > 0 && $lang_count_local <= 0) {

                        Languages::find($language_info[$i]['id'])->delete();
                    } else {

                        $language_info[$i]->user_id         = $id;
                        $language_info[$i]->language        = $request->language[$i];
                        $language_info[$i]->language_level  = $request->language_level[$i];
                        $language_info[$i]->save();
                    }

                    $lang_count_live--;
                    $lang_count_local--;
                }
            }


            $interest_info              = Interests::where('user_id', $id)->get();
            $interest_count_local       = !empty($request->interest) ? count($request->interest) : 0;
            $interest_count_live        = count($interest_info);

            $interest_count_live >= $interest_count_local ? $interest_count = $interest_count_live : $interest_count = $interest_count_local;

            if ($interest_count != 0) {
                for ($i = 0; $i < $interest_count; $i++) {

                    if ($interest_count_local > 0 && $interest_count_live <= 0) {

                        $int_info = new Interests();
                        $int_info->user_id         = $id;
                        $int_info->interest        = $request->interest[$i];
                        $int_info->save();
                    } elseif ($interest_count_live > 0 && $interest_count_local <= 0) {

                        Interests::find($interest_info[$i]['id'])->delete();
                    } else {

                        $interest_info[$i]->user_id         = $id;
                        $interest_info[$i]->interest        = $request->interest[$i];
                        $interest_info[$i]->save();
                    }

                    $interest_count_live--;
                    $interest_count_local--;
                }
            }
        
            return redirect()->route('student.show', $student->id)->withSuccess("User Profile updated successfully");
        //return redirect()->back()->withSuccess("User Profile updated successfully");
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

    public function getLanguages()
    {
        $languages = TblLanguage::all(); // Fetch all languages from the database
        return response()->json($languages); // Return the languages as JSON
    }

    public function deletestudent(Request $request)
    {

        $student = User::findOrFail($request->input('id'));
        if (!$student) {
        return response()->json(['error' => 'Student not found.'], 404);
        }

       
        $student->forceDelete(); 
        return response()->json(['success' => 'The student has been deleted!']);
    
    }

    public function studentDetails($id)
{
    if (!empty($id)) {
        $student = User::findOrFail($id);
        $personal_information       = PersonalInformation::where('user_id', $id)->get()->first()->toArray();
        $contact_information        = ContactInformation::where('user_id', $id)->get()->first()->toArray();
        $education_information      = Education::where('user_id', $id)->get()->toArray();
        $experience_information     = Experience::where('user_id', $id)->get()->toArray();
        $project_information        = Projects::where('user_id', $id)->get()->toArray();
        $skill_information          = Skills::where('user_id', $id)->get()->toArray();
        //$language_information       = Languages::where('user_id', $id)->get()->toArray();
        $language_information = Languages::where('user_id', $id)
        ->with('fetchlanguage') 
            ->get();

        $interest_information       = Interests::where('user_id', $id)->get()->toArray();

       // print_r($language_information);exit();


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

    return view('student.studentprofile', ['information' => $info]);
}
}
