@extends('layouts.admin')

@section('content')
<div class="d-flex flex-column flex-column-fluid">
    <!--begin::Toolbar-->
    <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
        <!--begin::Toolbar container-->
        <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
            <!--begin::Page title-->
            <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                <!--begin::Title-->
                <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Company Details</h1>
                <!--end::Title-->
            </div>
        </div>
        <!--end::Toolbar container-->
    </div>
    <!--end::Toolbar-->
    <!--begin::Content-->
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <!--begin::Content container-->
        <div id="kt_app_content_container" class="app-container container-xxl">
            <!--begin::Layout-->
            <div class="d-flex flex-column flex-row">
                <!--begin::Sidebar-->
                <div class="flex-lg-row-auto w-100 mb-0">
                    <!--begin::Card-->
                    <div class="card mb-5 mb-xl-8">
                        <!--begin::Card body-->
                        <div class="card-body d-flex">
                            <!--begin::Summary-->
                            <div class="d-flex flex-center flex-column me-10 br-right pe-10">
                                <!--begin::Avatar-->
                                <div class="profile_picture">
                                    <img class="profile box-image-preview img-fluid"  src="{{ isset($recruiter->personalInformation->image_path) && !empty($recruiter->personalInformation->image_path) ? asset('assets/images/'. $recruiter->personalInformation->image_path)  : asset('assets/media/logos/dummy-logo.png') }}" 
                                    alt="Logo"
                                    style="height:150px; width:150px;" />
                                </div>
                                <!--end::Avatar-->
                                <!--begin::Name-->
                                <a href=""
                                    class="fs-3 text-gray-800 text-hover-primary fw-bold mb-2 mt-2">{{$recruiter->first_name}}</a>
                                <!--end::Name-->
                                <!--begin::Position-->
                                <div class="fs-5 fw-semibold text-muted mb-6">{{$recruiter->email}}</div>
                            </div>
                            <!--end::Summary-->

                            <div class="separator separator-dashed my-3"></div>
                            <!--begin::Details content-->
                            <div id="kt_customer_view_details" class="collapse show">
                                <div class="pb-5 fs-6">
                                    <!--begin::Badge-->
                                    <!-- <div class="badge badge-light-info d-inline">Premium user</div> -->
                                    <!--begin::Badge-->
                                    <div class="d-flex justify-content-md-start fs-6 py-3">
                                        <div class="flex-column mb-0">
                                            <div class="fw-bold mt-5">Phone</div>
                                            <div class="text-gray-600">
                                                <a href="#"
                                                    class="text-gray-600 text-hover-primary">{{ $recruiter->contactInformation->phone_number }}</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-md-start fs-6 py-3">
                                        <!--begin::Details item-->
                                        <div class="flex-column mb-0  w-300px">
                                            <div class="fw-bold mt-0">Website</div>
                                            <div class="text-gray-600">{{ $recruiter->contactInformation->website }}</div>
                                        </div>
                                    </div>

                                    <div class="d-flex justify-content-md-start fs-6 py-3">
                                        <!--begin::Details item-->
                                        <div class="flex-column mb-0 w-50 me-10">
                                            <div class="fw-bold mt-5 ">Address</div>
                                            <div class="text-gray-600">
                                                {{ $recruiter->contactInformation->address }}
                                            </div>
                                        </div>
                                        <!--begin::Details item-->
                                        <!--begin::Details item-->
                                    </div>
                                    <!--begin::Details item-->
                                    <div class="d-flex justify-content-md-start fs-6 py-3">
                                        <!--begin::Details item-->
                                        <div class="flex-column mb-0 w-50 me-10">
                                            <div class="fw-bold mt-5 ">Profile Description</div>
                                            <div class="text-gray-600">
                                                {{ $recruiter->personalInformation->about_me }}
                                            </div>
                                        </div>
                                        <!--begin::Details item-->
                                        <!--begin::Details item-->
                                    </div>
                                </div>
                            </div>
                            <!--end::Details content-->
                        </div>
                        <!--end::Card body-->
                    </div>
                    
                </div>
              
            </div>
            
        </div>
        <!--end::Content container-->
    </div>
    <!--end::Content-->
</div>
@endsection
