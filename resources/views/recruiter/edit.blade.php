@extends('layouts.admin')


@section('content')
    <style>
        .custom-popup {
            width: 600px;
            /* Set the desired width */
            max-width: 100%;
            /* Ensure it doesn't exceed the viewport */
        }

        #kt_app_main {
           
            margin: 0px auto;
        }
    </style>

    <!--begin::Main-->
    <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
        <!--begin::Content wrapper-->
        <div class="d-flex flex-column flex-column-fluid">
            <!--begin::Toolbar-->
            <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
                <!--begin::Toolbar container-->
                <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                    <!--begin::Page title-->
                    <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                        <!--begin::Title-->
                        <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                        Edit Profile | {{$information['recruiter']['first_name']}} </h1>
                        <!--end::Title-->
                    </div>
                    <!--end::Page title-->

                </div>
                <!--end::Toolbar container-->
            </div>
            <!--end::Toolbar-->
            <!--begin::Content-->
            <div id="kt_app_content" class="app-content flex-column-fluid pt-0">
                <!--begin::Content container-->
                <div id="kt_app_content_container" class="app-container container-xxl">
                    <!--begin::Basic info-->
                    <div class="card mb-5 mb-10 pt-5">
                        <!--begin::Card header-->
                        <div class="card-header border-0 cursor-pointer min-h-50px">
                            <!--begin::Card title-->
                            <div class="card-title m-0">
                                <h3 class="fw-bold m-0 fs-6  color-blue">Company Information</h3>
                            </div>
                            <!--end::Card title-->
                        </div>
                        <!--begin::Card header-->
                        <!--begin::Content-->
                        <div id="kt_account_settings_profile_details" class="collapse show">

                            <div class="overlay" id="loaderOverlay">
                                <div class="loader"></div>
                            </div>
                            <!--begin::Form-->
                            <form id="kt_account_profile_details_form" class="form" method="POST" action="{{ route('recruiter.update', ['recruiter' => $information['recruiter']['id']]) }}"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <!-- <input type="hidden" name="rid" value="{{ Auth::user()->id }}" /> -->

                                <div class="row border-top p-9 pt-5">
                                    <div class="col-12">
                                        <!-- <h2 class="fw-bold br-btm py-4 mb-10">Personal Information</h2> -->
                                        <div class="form-outline mb-4">
                                            <input type="hidden" id="user_id" name="user_id" class="form-control" value="{{ isset($information['recruiter']['id']) ? $information['recruiter']['id'] : '' }}" />
                                        </div>
                                        <div class="row mb-4">
                                            <div class="col-sm-6 col-12">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-outline mb-4">
                                                            <label
                                                                class="required form-label fw-bold text-secondary">Company
                                                                Name</label>
                                                            <input type="text" id="company_name" name="company_name"
                                                                placeholder="Company Name"  value="{{ isset($information['recruiter']['first_name']) ? $information['recruiter']['first_name'] : '' }}" class="form-control" required />
                                                        </div>
                                                    </div>
                                                    <div class="d-flex flex-column flex-md-row gap-5 mb-4">
                                                        <div class="flex-row-fluid">
                                                            <label class="required form-label">Email</label>
                                                            <input type="text" name="email"
                                                                class="form-control  @error('email') is-invalid @enderror"
                                                                placeholder="Email" value="{{ $information['contact_info']->email ?? '' }}"
" />
                                                            @error('email')
                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>

                                                        <div class="flex-row-fluid">
                                                            <label class="required form-label">Phone</label>
                                                            <input type="text" name="phone"
                                                                class="form-control @error('phone') is-invalid @enderror"
                                                                placeholder="Phone" value="{{ $information['contact_info']->phone_number ?? '' }}" />
                                                            @error('phone')
                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-outline mb-4">
                                                            <label
                                                                class="required form-label fw-bold text-secondary">Website</label>
                                                            <input type="url" id="website" name="website"
                                                                placeholder="Website"  value="{{ $information['contact_info']->website ?? '' }}" class="form-control" required/>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-12">
                                                <div class="profile_picture text-center">
                                                    <input type="file" name="image_path"
                                                        accept="image/png, image/jpeg, image/jpg"
                                                        onchange="display_image(this);" class="d-none upload-box-image">
                                                    <img class="box-image-preview img-fluid img-circle elevation-2"
                                                        src="{{ isset($information['personal_info']['image_path']) && !empty($information['personal_info']['image_path']) ? asset('storage/images/' . $information['personal_info']['image_path']) : asset('assets/media/logos/dummy-logo.png') }}"
                                                        alt="Logo"
                                                        onclick="$(this).closest('.profile_picture').find('input').click();"
                                                        style="height:150px; width:150px;">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>



                                <!--begin::Card header-->
                                <div class="card-header border-0 cursor-pointer min-h-50px">
                                    <!--begin::Card title-->
                                    <div class="card-title m-0">
                                        <h3 class="fw-bold m-0 fs-6  color-blue">Address</h3>
                                    </div>
                                    <!--end::Card title-->
                                </div>
                                <!--begin::Card header-->
                                <div class="card-body border-top p-9 pt-5">
                                    <div class="d-flex flex-column gap-5 gap-md-7">

                                        <!--begin::Input group-->
                                        <div class="d-flex flex-column flex-md-row gap-5">

                                            <div class="fv-row flex-row-fluid">
                                                
                                                <textarea class="form-control @error('address') is-invalid @enderror" name="address" placeholder="Address" rows="5">{{ $information['contact_info']->address ?? '' }}</textarea>
                                                @error('address')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                                <!--end::Input-->
                                            </div>

                                        </div>
                                    </div>

                                </div>

                        </div>
                        <!--begin::Card header-->
                        <div class="card-header border-0 cursor-pointer min-h-50px">

                            <div class="card-title m-0">
                                <h3 class="fw-bold m-0 fs-6 color-blue">Profile Description</h3>
                            </div>

                        </div>

                        <div class="card-body border-top p-9 pt-5">
                            <div class="d-flex flex-column gap-5 gap-md-7">

                                <!--begin::Input group-->
                                <div class="d-flex flex-column flex-md-row gap-5">

                                    <div class="fv-row flex-row-fluid">
                                        <!--begin::Label-->
                                        <!-- <label class="required form-label">Profile Description</label> -->
                                        <textarea class="form-control @error('profile') is-invalid @enderror" name="profile"
                                            placeholder="Profile Description" rows="5">{{ isset($information['personal_info']['about_me']) ? $information['personal_info']['about_me'] : '' }}</textarea>
                                        @error('profile')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        <!--end::Input-->
                                    </div>

                                </div>
                            </div>

                        </div>

                    </div>

                    <!--end::Card body-->
                    <!--begin::Actions-->
                    <div class="card-footer d-flex justify-content-end py-6 px-9">

                        <button type="submit" class="btn btn-success"
                            id="kt_account_profile_details_submit">Save</button>
                    </div>
                    <!--end::Actions-->
                    </form>
                    <!--end::Form-->

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">




                    </form>
                </div>
                <!--end::Content-->
            </div>
            <!--end::Basic info-->
        </div>
        <!--end::Content container-->
    </div>
    <!--end::Content-->
    </div>
    <!--end::Content wrapper-->
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