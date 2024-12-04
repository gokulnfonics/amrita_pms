@extends('layouts.empty')
@section('content')
<style>
.content-wrapper {
    width: 80%;
    margin: 0px auto;
    max-width: 1240px;
}

h2 {
    font-size: 1.24rem;
    padding-bottom: 10px;
    color: #00bcd4;
}

.br-btm {
    border-bottom: 1px solid #e2e2e2;
}

.br-btm .col-8 {
    padding-left: 0px !important;
}

.add-btn {
    background: none !important;
    text-decoration: underline;
    font-size: 1.1rem;
    color: #f66505 !important;
}

.add-btn:hover {
    background: none !important;
    text-decoration: underline;
    font-size: 1.1rem;
    color: #00bcd4 !important;
}

#submitbtn {
    float: right;
    margin-top: 30px;
}

.card-body {
    padding-left: 0px !important;
    padding-right: 0px !important;
}

span.position-absolute {
    background: #F44336;
    padding: 2px 8px;
    right: 0px !important;
    color: #fff !important;
}

span.position-absolute i {
    color: #fff !important;
}
</style>

<div class="content-wrapper mt-0">


    <div class="container-fluid">
        <div class="row mt-3">
            <div class="col-12">
                <div class="card mb-5">
                    <div class="card-header h-50px px-0">
                        <h3 class="card-title">Build Resume | {{$student['email']}}</h3>
                    </div>
                    <div class="card-body px-0 pt-0">
                        <div class="row">
                            <div class="col-12 p-md-5 p-sm-4 p-3">
                                <form action="{{route('student.store')}}" id="createform" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf

                                    <input type="hidden" name="sid" value="{{ Auth::user()->id }}" />
                                    {{-- Personal Information --}}
                                    <div class="row">
                                        <div class="col-12">
                                            <h2 class="fw-bold br-btm py-4 mb-10">Personal Information</h2>
                                            <div class="form-outline mb-4">
                                                <input type="hidden" id="user_id" name="user_id" class="form-control" />
                                            </div>
                                            <div class="row mb-4">
                                                <div class="col-sm-6 col-12">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="form-outline mb-4">
                                                                <label class="form-label fw-bold text-secondary">First
                                                                    name</label>
                                                                <input type="text" id="first_name" name="first_name"
                                                                    placeholder="First name"
                                                                    value="{{ old('first_name', $student['first_name']) }}"
                                                                    class="form-control" required />
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-outline">
                                                                <label class="form-label fw-bold text-secondary">Last
                                                                    name</label>
                                                                <input type="text" id="last_name" name="last_name"
                                                                    placeholder="Last name"
                                                                    value="{{ old('last_name', $student['last_name']) }}"
                                                                    class="form-control" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-12">
                                                    <div class="profile_picture text-center">
                                                        <input type="file" name="image_path"
                                                            accept="image/png, image/jpeg, image/jpg"
                                                            onchange="display_image(this);"
                                                            class="d-none upload-box-image">
                                                        <img class="box-image-preview img-fluid"
                                                            src="{{ asset('assets/images/user-thumb.jpg') }}"
                                                            alt="Profile picture"
                                                            onclick="$(this).closest('.profile_picture').find('input').click();"
                                                            style="height:150px; width:150px;">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-outline mb-4">
                                                <label class="form-label fw-bold text-secondary">Profile
                                                    Title</label>
                                                <input type="text" id="profile_title" name="profile_title"
                                                    class="form-control" placeholder="Profile Title" required />
                                            </div>
                                            <div class="form-outline mb-4">
                                                <label class="form-label fw-bold text-secondary">About</label>
                                                <textarea class="form-control" placeholder="Descripton" id="about_me"
                                                    name="about_me" rows="4"></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- Contact Information --}}
                                    <div class="row">
                                        <div class="col-12 ">
                                            <h2 class="fw-bold br-btm py-4 mb-10 pt-10">Contact Information</h2>
                                            <div class="row mb-4">
                                                <div class="col-md-4 col-sm-6 col-12 mb-4">
                                                    <div class="form-outline">
                                                        <label class="form-label fw-bold text-secondary">Email</label>
                                                        <input type="email" id="email" name="email"
                                                            value="{{ old('email', $student['email']) }}"
                                                            placeholder="Email" class="form-control" />
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-sm-6 col-12 mb-4">
                                                    <div class="form-outline">
                                                        <label class="form-label fw-bold text-secondary">Phone
                                                            number</label>
                                                        <input type="number" id="phone_number" name="phone_number"
                                                            placeholder="Phone Number" class="form-control" />
                                                    </div>
                                                </div>
                                                <!--<div class="col-md-4 col-sm-6 col-12 mb-4">
                                                    <div class="form-outline">
                                                        <label class="form-label fw-bold text-secondary">Website</label>
                                                        <input type="url" id="website" name="website"
                                                            class="form-control" placeholder="Website" />
                                                    </div>
                                                </div>-->
                                                <div class="col-md-4 col-sm-6 col-12 mb-4">
                                                    <div class="form-outline">
                                                        <label
                                                            class="form-label fw-bold text-secondary">LinkedIn</label>
                                                        <input type="url" id="linkedin_link" name="linkedin_link"
                                                            class="form-control" placeholder="LinkedIn" />
                                                    </div>
                                                </div>
                                                <!--<div class="col-md-4 col-sm-6 col-12 mb-4">
                                                    <div class="form-outline">
                                                        <label class="form-label fw-bold text-secondary">Github</label>
                                                        <input type="url" id="github_link" name="github_link"
                                                            class="form-control" placeholder="Github" />
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-sm-6 col-12 mb-4">
                                                    <div class="form-outline">
                                                        <label class="form-label fw-bold text-secondary">Twitter</label>
                                                        <input type="text" id="twitter" name="twitter"
                                                            class="form-control" placeholder="Twitter" />
                                                    </div>
                                                </div>-->
                                            </div>
                                        </div>
                                    </div>

                                    {{-- Education --}}
                                    <div class="row">
                                        <div class="col-12 ">
                                            <div class="row br-btm pt-10">
                                                <div class="col-8">
                                                    <h2 class="fw-bold ">Education</h2>
                                                </div>
                                                <div class="col-4 text-end">
                                                    <button class="btn btn-sm add-btn" id="add_education">Add
                                                        Education</button>
                                                </div>
                                            </div>
                                            <section class="education_section">
                                                <div class="card mb-4">
                                                    <div class="card-body px-0">
                                                        <div class="form-outline mb-4">
                                                            <label
                                                                class="form-label fw-bold text-secondary">Degree</label>
                                                            <input type="text" id="degree_title" name="degree_title[]"
                                                                class="form-control" placeholder="Degree" />
                                                        </div>
                                                        <div class="form-outline mb-4">
                                                            <label
                                                                class="form-label fw-bold text-secondary">Institute</label>
                                                            <input type="text" id="institute" name="institute[]"
                                                                class="form-control" placeholder="Institute" />
                                                        </div>
                                                        <div class="row mb-4">
                                                            <div class="col-sm-6 col-12">
                                                                <div class="form-outline">
                                                                    <label
                                                                        class="form-label fw-bold text-secondary">Start
                                                                        Date</label>
                                                                    <input type="date" id="edu_start_date"
                                                                        name="edu_start_date[]" class="form-control" />
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6 col-12">
                                                                <div class="form-outline">
                                                                    <label class="form-label fw-bold text-secondary">End
                                                                        Date</label>
                                                                    <input type="date" id="edu_end_date"
                                                                        name="edu_end_date[]" class="form-control" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-outline mb-4">
                                                            <label class="form-label fw-bold text-secondary">Degree
                                                                Description</label>
                                                            <textarea class="form-control" placeholder="Descripton"
                                                                id="education_description"
                                                                name="education_description[]" rows="4"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </section>
                                        </div>
                                    </div>

                                    {{-- Experiencce --}}
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="row br-btm">
                                                <div class="col-8">
                                                    <h2 class="fw-bold ">Experience</h2>
                                                </div>
                                                <div class="col-4 text-end">
                                                    <button class="btn btn-sm add-btn" id="add_experience">Add
                                                        Experience</button>
                                                </div>
                                            </div>
                                            <section class="experience_section">
                                                <div class="card mb-4">
                                                    <div class="card-body px-0">
                                                        <div class="form-outline mb-4">
                                                            <label class="form-label fw-bold text-secondary">Job
                                                                Title</label>
                                                            <input type="text" id="job_title" name="job_title[]"
                                                                class="form-control" placeholder="Job Title" />
                                                        </div>
                                                        <div class="form-outline mb-4">
                                                            <label
                                                                class="form-label fw-bold text-secondary">Organization</label>
                                                            <input type="text" id="organization" name="organization[]"
                                                                class="form-control" placeholder="Organization" />
                                                        </div>
                                                        <div class="row mb-4">
                                                            <div class="col-sm-6 col-12">
                                                                <div class="form-outline">
                                                                    <label
                                                                        class="form-label fw-bold text-secondary">Start
                                                                        Date</label>
                                                                    <input type="date" id="job_start_date"
                                                                        name="job_start_date[]" class="form-control" />
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6 col-12">
                                                                <div class="form-outline">
                                                                    <label class="form-label fw-bold text-secondary">End
                                                                        Date</label>
                                                                    <input type="date" id="job_end_date"
                                                                        name="job_end_date[]" class="form-control" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-outline mb-4">
                                                            <label class="form-label fw-bold text-secondary">Job
                                                                Description</label>
                                                            <textarea class="form-control" placeholder="Job Descripton"
                                                                id="job_description" name="job_description[]"
                                                                rows="4"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </section>
                                        </div>
                                    </div>

                                    {{-- Projects --}}
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="row br-btm">
                                                <div class="col-8">
                                                    <h2 class="fw-bold ">Projects</h2>
                                                </div>
                                                <div class="col-4 text-end">
                                                    <button class="btn btn-sm add-btn" id="add_project">Add
                                                        Project</button>
                                                </div>
                                            </div>
                                            <section class="project_section">
                                                <div class="card mb-4">
                                                    <div class="card-body px-0">
                                                        <div class="form-outline mb-4">
                                                            <label class="form-label fw-bold text-secondary">Project
                                                                Title</label>
                                                            <input type="text" id="project_title" name="project_title[]"
                                                                class="form-control" placeholder="Project Title" />
                                                        </div>
                                                        <div class="form-outline mb-4">
                                                            <label class="form-label fw-bold text-secondary">Project
                                                                Description</label>
                                                            <textarea class="form-control"
                                                                placeholder="Project Descripton"
                                                                id="project_description" name="project_description[]"
                                                                rows="4"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </section>
                                        </div>
                                    </div>

                                    {{-- SKILLS & PROFICIENCY --}}
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="row br-btm">
                                                <div class="col-8">
                                                    <h2 class="fw-bold ">Skills & Proficiency</h2>
                                                </div>
                                                <div class="col-4 text-end">
                                                    <button class="btn btn-sm add-btn" id="add_skill">Add
                                                        Skill</button>
                                                </div>
                                            </div>
                                            <section class="skill_section">
                                                <div class="card mb-4">
                                                    <div class="card-body px-0">
                                                        <div class="row">
                                                            <div class="col-12 col-sm-12 col-md-8">
                                                                <div class="form-outline">
                                                                    <label class="form-label fw-bold text-secondary">Add
                                                                        Skill</label>
                                                                    <input type="text" id="skill_name"
                                                                        name="skill_name[]" class="form-control"
                                                                        placeholder="Add Skill" value="" />
                                                                </div>
                                                            </div>
                                                            <div class="col-12 col-sm-12 col-md-4">
                                                                <div class="form-outline">
                                                                    <label
                                                                        class="form-label fw-bold text-secondary">Percentage</label>
                                                                    <div class="input-group">
                                                                        <input type="number" step="5"
                                                                            id="skill_percentage"
                                                                            name="skill_percentage[]" placeholder="%"
                                                                            class="form-control"
                                                                            aria-describedby="percentage">
                                                                        <span class="input-group-text"
                                                                            id="percentage">%</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </section>
                                        </div>
                                    </div>

                                    {{-- Languages --}}
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="row br-btm">
                                                <div class="col-8">
                                                    <h2 class="fw-bold ">Languages</h2>
                                                </div>
                                                <div class="col-4 text-end">
                                                    <button class="btn btn-sm add-btn" id="add_language">Add
                                                        Language</button>
                                                </div>
                                            </div>
                                            <section class="language_section">
                                                <div class="card mb-4">
                                                    <div class="card-body px-0">
                                                        <div class="row">
                                                            <div class="col-12 col-sm-12 col-md-8">
                                                                <div class="form-outline">
                                                                    <label class="form-label fw-bold text-secondary">Add
                                                                        langauge</label>
                                                                    <select class="form-control" id="language"
                                                                        name="language[]">
                                                                        <option value="">Add Language</option>
                                                                        @foreach($languages as $language)
                                                                        <option value="{{ $language->code }}">{{$language->name}}</option>
                                                                        @endforeach
                                                                        
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-12 col-sm-12 col-md-4">
                                                                <div class="form-outline">
                                                                    <label
                                                                        class="form-label fw-bold text-secondary">Level</label>
                                                                    <div class="input-group">
                                                                        <span class="input-group-text"
                                                                            id="percentage">Level</span>
                                                                        <select id="language_level"
                                                                            name="language_level[]" placeholder="level"
                                                                            class="form-control"
                                                                            aria-describedby="percentage">
                                                                            <option value="">Select level
                                                                            </option>
                                                                            <option value="Native">Native</option>
                                                                            <option value="Fluent">Fluent</option>
                                                                            <option value="Basic">Basic</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </section>
                                        </div>
                                    </div>

                                    {{-- Interests --}}
                                    <div class="row br-btm">
                                        <div class="col-12">
                                            <div class="row br-btm">
                                                <div class="col-8">
                                                    <h2 class="fw-bold ">Interests</h2>
                                                </div>
                                                <div class="col-4 text-end">
                                                    <button class="btn btn-sm add-btn" id="add_interest">Add
                                                        interest</button>
                                                </div>
                                            </div>
                                            <section class="interest_section">
                                                <div class="card mb-4">
                                                    <div class="card-body px-0">
                                                        <div class="form-outline">
                                                            <label class="form-label fw-bold text-secondary">Add
                                                                Interest</label>
                                                            <input type="text" id="interest" name="interest[]"
                                                                class="form-control" placeholder="Add Interest" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </section>
                                        </div>
                                    </div>




                                    <!-- Submit button -->
                                    <button type="submit" id="submitbtn" class="btn btn-lg btn-success w-200px">Create
                                        Resume</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body px-0 -->
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div>
</div>

@endsection
@section('pageScripts')
<script>
function display_image(input) {

if (input.files && input.files[0]) {

    var reader = new FileReader();
    reader.onload = function(e) {

        $(input).closest('div').find('.box-image-preview').attr('src', e.target.result);
    };

    reader.readAsDataURL(input.files[0]);
}

}
</script>
@endsection