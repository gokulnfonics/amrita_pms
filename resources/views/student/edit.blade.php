{{ view('layouts.blank') }}

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

<div class="content-wrapper mt-4">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-8">
                    <h1 class="m-0">Edit User Profile</h1>
                </div>
                
            </div>
           
        </div>
    </div>

    <div class="container-fluid">
        <div class="row mt-3">
            <div class="col-12">
                <div class="card mb-5">
                    <div class="card-header">
                        <h3 class="card-title">Edit user Profile</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 p-md-5 p-sm-4 p-3">
                            <form action="{{ route('student.update', ['student' => $information['student']['id']]) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    {{-- Personal Information --}}
                                    <div class="row">
                                        <div class="col-12">
                                            <h2 class="fw-bold br-btm py-4 mb-10 pt-10">Personal Information</h2>
                                            <div class="form-outline mb-4">
                                                <input type="hidden" id="user_id" name="user_id" class="form-control"
                                                    value="{{ isset($information['student']['id']) ? $information['student']['id'] : '' }}" />
                                            </div>
                                            <div class="row mb-4">
                                                <div class="col-12">
                                                    <div class="row">
                                                        <div class="col-sm-6 col-12">
                                                            <div class="col-12">
                                                                <div class="form-outline mb-4">
                                                                    <label
                                                                        class="form-label fw-bold text-secondary">First
                                                                        name</label>
                                                                    <input type="text" id="first_name"
                                                                        name="first_name" placeholder="First name"
                                                                        class="form-control"
                                                                        value="{{ isset($information['student']['first_name']) ? $information['student']['first_name'] : '' }}" />
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="form-outline">
                                                                    <label
                                                                        class="form-label fw-bold text-secondary">Last
                                                                        name</label>
                                                                    <input type="text" id="last_name"
                                                                        name="last_name" placeholder="Last name"
                                                                        class="form-control"
                                                                        value="{{ isset($information['student']['last_name']) ? $information['student']['last_name'] : '' }}" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6 col-12">
                                                            <div class="profile_picture text-center">
                                                                <input type="file" name="image_path"
                                                                    accept="image/png, image/jpeg, image/jpg"
                                                                    onchange="display_image(this);"
                                                                    class="d-none upload-box-image">
                                                                <img class="box-image-preview img-fluid img-circle elevation-2"
                                                                    src="{{ isset($information['personal_info']['image_path']) && !empty($information['personal_info']['image_path']) ? asset('assets/images/' . $information['personal_info']['image_path']) : asset('assets/images/user-thumb.jpg') }}"
                                                                    alt="Profile picture"
                                                                    onclick="$(this).closest('.profile_picture').find('input').click();"
                                                                    style="height:150px; width:150px;">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-outline mb-4">
                                                <label class="form-label fw-bold text-secondary">Profile
                                                    Title</label>
                                                <input type="text" id="profile_title" name="profile_title"
                                                    class="form-control" placeholder="Profile Title"
                                                    value="{{ isset($information['personal_info']['profile_title']) ? $information['personal_info']['profile_title'] : '' }}" />
                                            </div>
                                            <div class="form-outline mb-4">
                                                <label class="form-label fw-bold text-secondary">About</label>
                                                <textarea class="form-control" placeholder="Descripton" id="about_me" name="about_me" rows="4">{{ isset($information['personal_info']['about_me']) ? $information['personal_info']['about_me'] : '' }}</textarea>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- Contact Information --}}
                                    <div class="row">
                                        <div class="col-12">
                                            <h2 class="fw-bold br-btm py-4 mb-10 pt-10">Contact Information</h2>
                                            @foreach ($information['contact_info'] as $contact_info)
                                                <div class="card mb-4">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-md-4 col-sm-6 col-12 mb-4">
                                                                <div class="form-outline">
                                                                    <label
                                                                        class="form-label fw-bold text-secondary">Email</label>
                                                                    <input type="email" id="email"
                                                                        name="email" placeholder="Email"
                                                                        class="form-control"
                                                                        value="{{ isset($contact_info['email']) ? $contact_info['email'] : '' }}" />
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4 col-sm-6 col-12 mb-4">
                                                                <div class="form-outline">
                                                                    <label
                                                                        class="form-label fw-bold text-secondary">Phone
                                                                        number</label>
                                                                    <input type="number" id="phone_number"
                                                                        name="phone_number" placeholder="Phone Number"
                                                                        class="form-control"
                                                                        value="{{ isset($contact_info['phone_number']) ? $contact_info['phone_number'] : '' }}" />
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4 col-sm-6 col-12 mb-4">
                                                                <div class="form-outline">
                                                                    <label
                                                                        class="form-label fw-bold text-secondary">Website</label>
                                                                    <input type="url" id="website"
                                                                        name="website" class="form-control"
                                                                        placeholder="Website"
                                                                        value="{{ isset($contact_info['website']) ? $contact_info['website'] : '' }}" />
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4 col-sm-6 col-12 mb-4">
                                                                <div class="form-outline">
                                                                    <label
                                                                        class="form-label fw-bold text-secondary">LinkedIn</label>
                                                                    <input type="url" id="linkedin_link"
                                                                        name="linkedin_link" class="form-control"
                                                                        placeholder="LinkedIn"
                                                                        value="{{ isset($contact_info['linkedin_link']) ? $contact_info['linkedin_link'] : '' }}" />
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4 col-sm-6 col-12 mb-4">
                                                                <div class="form-outline">
                                                                    <label
                                                                        class="form-label fw-bold text-secondary">Github</label>
                                                                    <input type="url" id="github_link"
                                                                        name="github_link" class="form-control"
                                                                        placeholder="Github"
                                                                        value="{{ isset($contact_info['github_link']) ? $contact_info['github_link'] : '' }}" />
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4 col-sm-6 col-12 mb-4">
                                                                <div class="form-outline">
                                                                    <label
                                                                        class="form-label fw-bold text-secondary">Twitter</label>
                                                                    <input type="text" id="twitter"
                                                                        name="twitter" class="form-control"
                                                                        placeholder="Twitter"
                                                                        value="{{ isset($contact_info['twitter']) ? $contact_info['twitter'] : '' }}" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>

                                    {{-- Education --}}
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-8">
                                                    <h2 class="fw-bold br-btm py-4 mb-10 pt-10">Education</h2>
                                                </div>
                                                <div class="col-4 text-end">
                                                    <button class="btn btn-sm add-btn" id="add_education">Add
                                                        Education</button>
                                                </div>
                                            </div>
                                            <section class="education_section">
                                                @foreach ($information['education_info'] as $edu_info)
                                                    <div class="card mb-4">
                                                        <div class="card-body">
                                                            <span onclick="remove_section(this)"
                                                                class="position-absolute"
                                                                style="top: 10px; right: 15px; cursor: pointer;"><i
                                                                    class="fa fa-close"></i></span>
                                                            <div class="form-outline mb-4">
                                                                <label
                                                                    class="form-label fw-bold text-secondary">Degree</label>
                                                                <input type="text" id="degree_title"
                                                                    name="degree_title[]" class="form-control"
                                                                    placeholder="Degree"
                                                                    value="{{ isset($edu_info['degree_title']) ? $edu_info['degree_title'] : '' }}" />
                                                            </div>
                                                            <div class="form-outline mb-4">
                                                                <label
                                                                    class="form-label fw-bold text-secondary">Institute</label>
                                                                <input type="text" id="institute"
                                                                    name="institute[]" class="form-control"
                                                                    placeholder="Institute"
                                                                    value="{{ isset($edu_info['institute']) ? $edu_info['institute'] : '' }}" />
                                                            </div>
                                                            <div class="row mb-4">
                                                                <div class="col-sm-6 col-12">
                                                                    <div class="form-outline">
                                                                        <label
                                                                            class="form-label fw-bold text-secondary">Start
                                                                            Date</label>
                                                                        <input type="date" id="edu_start_date"
                                                                            name="edu_start_date[]"
                                                                            class="form-control"
                                                                            value="{{ isset($edu_info['edu_start_date']) ? $edu_info['edu_start_date'] : '' }}" />
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-6 col-12">
                                                                    <div class="form-outline">
                                                                        <label
                                                                            class="form-label fw-bold text-secondary">End
                                                                            Date</label>
                                                                        <input type="date" id="edu_end_date"
                                                                            name="edu_end_date[]" class="form-control"
                                                                            value="{{ isset($edu_info['edu_end_date']) ? $edu_info['edu_end_date'] : '' }}" />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-outline mb-4">
                                                                <label
                                                                    class="form-label fw-bold text-secondary">Description</label>
                                                                <textarea class="form-control" placeholder="Descripton" id="education_description" name="education_description[]"
                                                                    rows="4">{{ isset($edu_info['education_description']) ? $edu_info['education_description'] : '' }}</textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </section>
                                        </div>
                                    </div>

                                    {{-- Experiencce --}}
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-8">
                                                    <h2 class="fw-bold br-btm py-4 mb-10 pt-10">Experience</h2>
                                                </div>
                                                <div class="col-4 text-end">
                                                    <button class="btn btn-sm add-btn" id="add_experience">Add
                                                        Experience</button>
                                                </div>
                                            </div>
                                            <section class="experience_section">
                                                @foreach ($information['experience_info'] as $exp_info)
                                                    <div class="card mb-4">
                                                        <div class="card-body">
                                                            <span onclick="remove_section(this)"
                                                                class="position-absolute"
                                                                style="top: 10px; right: 15px; cursor: pointer;"><i
                                                                    class="fa fa-close"></i></span>
                                                            <div class="form-outline mb-4">
                                                                <label class="form-label fw-bold text-secondary">Job
                                                                    Title</label>
                                                                <input type="text" id="job_title"
                                                                    name="job_title[]" class="form-control"
                                                                    placeholder="Job Title"
                                                                    value="{{ isset($exp_info['job_title']) ? $exp_info['job_title'] : '' }}" />
                                                            </div>
                                                            <div class="form-outline mb-4">
                                                                <label
                                                                    class="form-label fw-bold text-secondary">Organization</label>
                                                                <input type="text" id="organization"
                                                                    name="organization[]" class="form-control"
                                                                    placeholder="Organization"
                                                                    value="{{ isset($exp_info['organization']) ? $exp_info['organization'] : '' }}" />
                                                            </div>
                                                            <div class="row mb-4">
                                                                <div class="col-sm-6 col-12">
                                                                    <div class="form-outline">
                                                                        <label
                                                                            class="form-label fw-bold text-secondary">Start
                                                                            Date</label>
                                                                        <input type="date" id="job_start_date"
                                                                            name="job_start_date[]"
                                                                            class="form-control"
                                                                            value="{{ isset($exp_info['job_start_date']) ? $exp_info['job_start_date'] : '' }}" />
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-6 col-12">
                                                                    <div class="form-outline">
                                                                        <label
                                                                            class="form-label fw-bold text-secondary">End
                                                                            Date</label>
                                                                        <input type="date" id="job_end_date"
                                                                            name="job_end_date[]" class="form-control"
                                                                            value="{{ isset($exp_info['job_end_date']) ? $exp_info['job_end_date'] : '' }}" />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-outline mb-4">
                                                                <label class="form-label fw-bold text-secondary">Job
                                                                    Description</label>
                                                                <textarea class="form-control" placeholder="Job Descripton" id="job_description" name="job_description[]"
                                                                    rows="4">{{ isset($exp_info['job_description']) ? $exp_info['job_description'] : '' }}</textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </section>
                                        </div>
                                    </div>

                                    {{-- Projects --}}
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-8">
                                                    <h2 class="fw-bold br-btm py-4 mb-10 pt-10">Projects</h2>
                                                </div>
                                                <div class="col-4 text-end">
                                                    <button class="btn btn-sm add-btn" id="add_project">Add
                                                        Project</button>
                                                </div>
                                            </div>
                                            <section class="project_section">
                                                @foreach ($information['project_info'] as $project_info)
                                                    <div class="card mb-4">
                                                        <div class="card-body">
                                                            <span onclick="remove_section(this)"
                                                                class="position-absolute"
                                                                style="top: 10px; right: 15px; cursor: pointer;"><i
                                                                    class="fa fa-close"></i></span>
                                                            <div class="form-outline mb-4">
                                                                <label
                                                                    class="form-label fw-bold text-secondary">Project
                                                                    Title</label>
                                                                <input type="text" id="project_title"
                                                                    name="project_title[]" class="form-control"
                                                                    placeholder="Project Title"
                                                                    value="{{ isset($project_info['project_title']) ? $project_info['project_title'] : '' }}" />
                                                            </div>
                                                            <div class="form-outline mb-4">
                                                                <label
                                                                    class="form-label fw-bold text-secondary">Project
                                                                    Description</label>
                                                                <textarea class="form-control" placeholder="Project Descripton" id="project_description" name="project_description[]"
                                                                    rows="4">{{ isset($project_info['project_description']) ? $project_info['project_description'] : '' }}</textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </section>
                                        </div>
                                    </div>

                                    {{-- SKILLS & PROFICIENCY --}}
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-8">
                                                    <h2 class="fw-bold br-btm py-4 mb-10 pt-10">Skills & Proficiency</h2>
                                                </div>
                                                <div class="col-4 text-end">
                                                    <button class="btn btn-sm add-btn" id="add_skill">Add
                                                        Skill</button>
                                                </div>
                                            </div>
                                            <section class="skill_section">
                                                @foreach ($information['skill_info'] as $skill_info)
                                                    <div class="card mb-4">
                                                        <div class="card-body">
                                                            <span onclick="remove_section(this)"
                                                                class="position-absolute"
                                                                style="top: 10px; right: 15px; cursor: pointer;"><i
                                                                    class="fa fa-close"></i></span>
                                                            <div class="row">
                                                                <div class="col-10">
                                                                    <div class="form-outline">
                                                                        <label
                                                                            class="form-label fw-bold text-secondary">Add
                                                                            Skill</label>
                                                                        <input type="text" id="skill_name"
                                                                            name="skill_name[]" class="form-control"
                                                                            placeholder="Add Skill"
                                                                            value="{{ isset($skill_info['skill_name']) ? $skill_info['skill_name'] : '' }}" />
                                                                    </div>
                                                                </div>
                                                                <div class="col-2">
                                                                    <div class="form-outline">
                                                                        <label
                                                                            class="form-label fw-bold text-secondary">Percentage</label>
                                                                        <div class="input-group">
                                                                            <input type="number" step="5"
                                                                                min="0" max="100"
                                                                                id="skill_percentage"
                                                                                name="skill_percentage[]"
                                                                                placeholder="%" class="form-control"
                                                                                aria-describedby="percentage"
                                                                                value="{{ isset($skill_info['skill_percentage']) ? $skill_info['skill_percentage'] : '' }}" />
                                                                            <span class="input-group-text"
                                                                                id="percentage">%</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </section>
                                        </div>
                                    </div>

                                    {{-- Languages --}}
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-8">
                                                    <h2 class="fw-bold br-btm py-4 mb-10 pt-10">Languages</h2>
                                                </div>
                                                <div class="col-4 text-end">
                                                    <button class="btn btn-sm add-btn" id="add_language">Add
                                                        Language</button>
                                                </div>
                                            </div>
                                            <section class="language_section">
                                                @foreach ($information['language_info'] as $language_info)
                                                    <div class="card mb-4">
                                                        <div class="card-body">
                                                            <span onclick="remove_section(this)"
                                                                class="position-absolute"
                                                                style="top: 10px; right: 15px; cursor: pointer;"><i
                                                                    class="fa fa-close"></i></span>
                                                            <div class="row">
                                                                <div class="col-10">
                                                                    <div class="form-outline">
                                                                        <label
                                                                            class="form-label fw-bold text-secondary">Add
                                                                            langauge</label>
                                                                        <select class="form-control" id="language"
                                                                            name="language[]">
                                                                            <option value="">Add Language
                                                                            </option>
                                                                            @foreach($languages as $language)
                                                                        <option value="{{ $language->code }}" {{ isset($language_info['language']) && $language_info['language'] == $language->code ? 'selected' : '' }}>{{$language->name}}</option>
                                                                        @endforeach
                                                                            
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-2">
                                                                    <div class="form-outline">
                                                                        <label
                                                                            class="form-label fw-bold text-secondary">Level</label>
                                                                        <div class="input-group">
                                                                            <span class="input-group-text"
                                                                                id="percentage">Level</span>
                                                                            <select id="language_level"
                                                                                name="language_level[]"
                                                                                placeholder="level"
                                                                                class="form-control"
                                                                                aria-describedby="percentage">
                                                                                <option value="">Select level
                                                                                </option>
                                                                                <option value="Native"
                                                                                    {{ isset($language_info['language_level']) && $language_info['language_level'] == 'Native' ? 'selected' : '' }}>
                                                                                    Native</option>
                                                                                <option value="Fluent"
                                                                                    {{ isset($language_info['language_level']) && $language_info['language_level'] == 'Fluent' ? 'selected' : '' }}>
                                                                                    Fluent</option>
                                                                                <option value="Basic"
                                                                                    {{ isset($language_info['language_level']) && $language_info['language_level'] == 'Basic' ? 'selected' : '' }}>
                                                                                    Basic</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </section>
                                        </div>
                                    </div>

                                    {{-- Interests --}}
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-8">
                                                    <h2 class="fw-bold br-btm py-4 mb-10 pt-10">Interests</h2>
                                                </div>
                                                <div class="col-4 text-end">
                                                    <button class="btn btn-sm add-btn" id="add_interest">Add
                                                        interest</button>
                                                </div>
                                            </div>
                                            <section class="interest_section">
                                                @foreach ($information['interest_info'] as $interest_info)
                                                    <div class="card mb-4">
                                                        <div class="card-body">
                                                            <span onclick="remove_section(this)"
                                                                class="position-absolute"
                                                                style="top: 10px; right: 15px; cursor: pointer;"><i
                                                                    class="fa fa-close"></i></span>
                                                            <div class="form-outline">
                                                                <label class="form-label fw-bold text-secondary">Add
                                                                    Interest</label>
                                                                <input type="text" id="interest"
                                                                    name="interest[]" class="form-control"
                                                                    placeholder="Add Interest"
                                                                    value="{{ isset($interest_info['interest']) ? $interest_info['interest'] : '' }}" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </section>
                                        </div>
                                    </div>


                                    <!-- Checkbox -->
                                    <div class="form-check d-flex justify-content-center mb-4">
                                        <input class="form-check-input me-2" type="checkbox" value="1"
                                            id="verify" name="verify" required />
                                        <label for="verify" class="form-check-label text-dark"> Are you sure you
                                            want to save these changes?
                                        </label>
                                    </div>

                                    <!-- Submit button -->
                                    <button type="submit" id="submitbtn" class="btn btn-lg btn-success w-100">Save
                                        Changes</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div>
</div>
