@extends('layouts.blank')


@section('content')
    <style>
        .custom-popup {
            width: 600px;
            /* Set the desired width */
            max-width: 100%;
            /* Ensure it doesn't exceed the viewport */
        }

        #kt_app_main {
            width: 80%;
            /* Set the desired width */
            max-width: 80%;
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
                            Recruiter </h1>
                        <!--end::Title-->
                        <!--begin::Breadcrumb-->
                        <ul class="breadcrumb fw-semibold fs-7 my-0 pt-1">
                            <li class="breadcrumb-item text-muted">
                                <!-- To complete your sign-up, please update all the required fields in your profile. This step
                                                is necessary to activate your account. -->
                            </li>
                        </ul>
                        <!--end::Breadcrumb-->
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
                            <form id="kt_account_profile_details_form" class="form" method="POST" action=""
                                enctype="multipart/form-data">



                                <input type="hidden" name="vid" value="" />
                                <!-- <div class="card-body border-top p-9 pt-5">

                                                    <div class="d-flex flex-column gap-5 gap-md-7">
                                                        <div class="d-flex flex-column flex-md-row gap-5">
                                                            <div class="flex-row-fluid">
                                                                <label class="required form-label">Name</label>
                                                                <input type="text" name="name"
                                                                    class="form-control  @error('name') is-invalid @enderror"
                                                                    placeholder="Name" value="" />
                                                                @error('name')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
                                                            </div>

                                                            <div class="flex-row-fluid">
                                                                
                                                                <label class="required form-label">Email</label>
                                                                <input type="text" name="email"
                                                                    class="form-control  @error('email') is-invalid @enderror"
                                                                    placeholder="Email"
                                                                    value="" />
                                                                @error('email')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
                                                            </div>
                                                        </div>
                                                      
                                                        <div class="d-flex flex-column flex-md-row gap-5 ">
                                                            <div class="flex-row-fluid">
                                                                <label class="required form-label">Phone</label>
                                                                <input type="text" name="phone"
                                                                    class="form-control  @error('phone') is-invalid @enderror"
                                                                    placeholder="Phone Number"
                                                                    value="" />
                                                                @error('phone')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
                                                            </div>

                                                            <div class="flex-row-fluid">
                                                                <label class="required form-label">Address</label>
                                                                <input type="text" name="address"
                                                                    class="form-control @error('address') is-invalid @enderror"
                                                                    placeholder="Address" value="" />
                                                                @error('address')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
                                                            </div>
                                                        </div>
                                                       

                                                    </div>
                                                </div> -->

                                <div class="row border-top p-9 pt-5">
                                    <div class="col-12">
                                        <!-- <h2 class="fw-bold br-btm py-4 mb-10">Personal Information</h2> -->
                                        <div class="form-outline mb-4">
                                            <input type="hidden" id="user_id" name="user_id" class="form-control" />
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
                                                                placeholder="Company Name" class="form-control" required />
                                                        </div>
                                                    </div>
                                                    <div class="d-flex flex-column flex-md-row gap-5 ">
                                                        <div class="flex-row-fluid">
                                                            <label class="required form-label">Email</label>
                                                            <input type="text" name="email"
                                                                class="form-control  @error('email') is-invalid @enderror"
                                                                placeholder="Email" value="" />
                                                            @error('email')
                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>

                                                        <div class="flex-row-fluid">
                                                            <label class="required form-label">Phone</label>
                                                            <input type="text" name="phone"
                                                                class="form-control @error('phone') is-invalid @enderror"
                                                                placeholder="Phone" value="" />
                                                            @error('phone')
                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
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
                                                        src="{{ asset('assets/media/logos/dummy-logo.png') }}"
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
                                                
                                                <textarea class="form-control @error('address') is-invalid @enderror" name="address" placeholder="Address">{{ old('address') }}</textarea>
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
                                            placeholder="Profile Description">{{ old('profile') }}</textarea>
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
        document.addEventListener('DOMContentLoaded', function() {
            const useCompanyDetailsCheckbox = document.querySelector('input[name="use_company_details"]');
            const companySelect = document.getElementById('company');

            useCompanyDetailsCheckbox.addEventListener('change', function() {
                if (this.checked) {
                    const selectedOption = companySelect.options[companySelect.selectedIndex];
                    document.querySelector('input[name="email"]').value = selectedOption.getAttribute(
                        'data-email');
                    document.querySelector('input[name="phone"]').value = selectedOption.getAttribute(
                        'data-phone');
                    document.querySelector('input[name="gst"]').value = selectedOption.getAttribute(
                        'data-gst');
                    document.querySelector('input[name="pan"]').value = selectedOption.getAttribute(
                        'data-pan');
                    document.querySelector('textarea[name="address"]').value = selectedOption.getAttribute(
                        'data-address');
                } else {
                    // Optionally clear the fields if the checkbox is unchecked
                    document.querySelector('input[name="email"]').value = '';
                    document.querySelector('input[name="phone"]').value = '';
                    document.querySelector('input[name="gst"]').value = '';
                    document.querySelector('input[name="pan"]').value = '';
                    document.querySelector('textarea[name="address"]').value = '';
                }
            });
        });
    </script>

    @if (session('success'))
        <script>
            // Display the success message in a popup
            Swal.fire({
                icon: 'success',
                title: 'Your vendor sign-up is successful..!',
                text: "{{ trans('auth.profileupdate') }}",
                timer: 7000,
                showConfirmButton: false,
                customClass: {
                    popup: 'custom-popup' // Apply the custom class here
                }
            }).then(() => {
                // Submit the hidden logout form to perform POST request
                document.getElementById('logout-form').submit();
            });
        </script>
    @endif
    <script>
        $('#kt_account_profile_details_form').on('submit', function() {
            document.getElementById('loaderOverlay').style.display = 'flex';
        });
    </script>
@endsection
