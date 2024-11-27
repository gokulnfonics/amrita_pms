@extends('layouts.admin')

@section('content')
<style>
    table tr:first-child td:nth-child(2) button {
    display: none;
}
</style>
<div class="app-main flex-column flex-row-fluid" id="kt_app_main" data-select2-id="select2-data-kt_app_main">
    <!--begin::Content wrapper-->
    <div class="d-flex flex-column flex-column-fluid" data-select2-id="select2-data-122-9irx">
        <!--begin::Toolbar-->
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <!--begin::Toolbar container-->
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                <!--begin::Page title-->
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <!--begin::Title-->
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                        Edit Job</h1>
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
                <div class="d-flex flex-column flex-lg-row">
                    <!--begin::Content-->
                    <div class="flex-lg-row-fluid mb-10 mb-lg-0 me-lg-7 me-xl-10">
                        <!--begin::Card-->
                        <div class="card">
                            <!--begin::Card body-->
                            <div class="card-body p-12">
                            <div class="overlay" id="loaderOverlay">
                             <div class="loader"></div>
                         </div>
                                <!--begin::Form-->
                                <form id="kt_invoice_form" method="POST" action="{{route('job.update',$jobs->id)}}"
                                    enctype="multipart/form-data">
                                    @csrf
									@method('PUT')

                                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}" />
                                    <!--begin::Wrapper-->
                                    <div class="mb-0">
                                        <!--begin::Row-->
                                        <div class="row gx-10 mb-5">
                                            <div class="row pe-0 pb-5">
                                                <div class="col-lg-12">
                                                    <div class="fv-row  d-flex justify-content-between">
                                                        <div class="fs-6 fw-bold text-gray-700 col-lg-3">
                                                            <label class="required form-label">Final Submission Date</label>
                                                            <div class="d-flex align-items-center justify-content-start flex-equal order-3 fw-row"
                                                                data-bs-toggle="tooltip" data-bs-trigger="hover"
                                                                data-kt-initialized="1">
                                                                <div
                                                                    class="position-relative d-flex align-items-center">
                                                                    <!--begin::Datepicker-->
                                                                    <input
                                                                        class="form-control fw-bold pe-5 @error('job_date') is-invalid @enderror"
                                                                        placeholder="Select date" id="job_date"
                                                                        name="job_date"
                                                                        value="{{ old('job_date', $jobs->submission_date) }}">
                                                                    @error('job_date')<div
                                                                        class="invalid-feedback">{{ $message }}</div>
                                                                    @enderror
                                                                    
                                                                    <span
                                                                        class="svg-icon svg-icon-2 position-absolute end-0 me-4">
                                                                        <svg width="24" height="24" viewBox="0 0 24 24"
                                                                            fill="none"
                                                                            xmlns="http://www.w3.org/2000/svg">
                                                                            <path
                                                                                d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z"
                                                                                fill="currentColor"></path>
                                                                        </svg>
                                                                    </span>
                                                                    <!--end::Svg Icon-->
                                                                    <!--end::Icon-->
                                                                </div>
                                                                <!--end::Input-->
                                                            </div>
                                                            <!--end::Input group-->
                                                        </div>
                                                        <div class="fs-6 fw-bold text-gray-700 col-lg-8">
                                                            <!--begin::Label-->
                                                            <label class="required form-label">Title</label>
                                                            <!--end::Label-->
                                                            <!--begin::Select2-->
                                                            <!--begin::Editor-->
                                                            <input id="" name="job_title" placeholder="Job Title"
                                                                class="form-control mb-2 @error('job_title') is-invalid @enderror"
                                                                value="{{ old('job_title',$jobs->job_title) }}" />
                                                            @error('job_title')<div class="invalid-feedback">{{ $message }}
                                                            </div> @enderror
                                                            <!--end::Editor-->
                                                            <!--end::Select2-->
                                                        </div>
                                                    </div>
                                                    <div class="fv-row mt-5">
                                                        <div class="fs-6 fw-bold text-gray-700 col-lg-12">
                                                            <!--begin::Label-->
                                                            <label class="required form-label">Description</label>
                                                            <!--end::Label-->
                                                            <!--begin::Editor-->
                                                            <textarea id="summernote" name="description" 
                                                                class="form-control mb-2 @error('description') is-invalid @enderror summernote">
                                                                {{ $jobs->job_description }}
                                                            </textarea>
                                                            @error('description')
                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                            <!--end::Editor-->
                                                        </div>
                                                    </div>
                                                    <div class="fv-row d-flex justify-content-between mt-5">
                                                        <div class="fs-6 fw-bold text-gray-700 col-lg-6">
                                                            <!--begin::Label-->
                                                            <label class="required form-label">Job Location</label>
                                                            <!--end::Label-->
                                                            <!--begin::Select2-->
                                                            <!--begin::Editor-->
                                                            <input id="" type="text" name="job_location" placeholder="Job Location"
                                                                class="form-control mb-2 @error('job_location') is-invalid @enderror"
                                                                value="{{ old('job_location', $jobs->job_location) }}" />
                                                            @error('job_location')<div class="invalid-feedback">{{ $message }}
                                                            </div> @enderror
                                                            <!--end::Editor-->
                                                            <!--end::Select2-->
                                                        </div>
                                                        <div class="fs-6 fw-bold text-gray-700 col-lg-4">
                                                            <!--begin::Label-->
                                                            <label class="required form-label">Salary</label>
                                                            <input id="" type="number" name="salary" placeholder="Salary"
                                                                class="form-control mb-2 @error('salary') is-invalid @enderror"
                                                                value="{{ old('salary',$jobs->salary ) }}" />
                                                            @error('salary')<div class="invalid-feedback">{{ $message }}
                                                            </div> @enderror
                                                            <!--end::Editor-->
                                                            <!--end::Select2-->
                                                        </div>
                                                    </div>
    
                                                    <div class="fv-row mt-5">
                                                        <div class="fs-6 fw-bold text-gray-700 col-lg-12">
                                                            <!--begin::Label-->
                                                            <label class="required form-label">Eligibility Criteria</label>
                                                            <!--end::Label-->
                                                            <!--begin::Editor-->
                                                            <textarea name="criteria" class="form-control mb-2 @error('criteria') is-invalid @enderror summernote">
                                                                {{ $jobs->criteria }}
                                                            </textarea>
                                                            @error('criteria')<div class="invalid-feedback">
                                                                {{ $message }}</div> @enderror
                                                            <!--end::Editor-->
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                           
                                            <!--begin::Table wrapper-->
                                            <div class="table-responsive mb-5 col-lg-12 mt-5">
                                                <!--begin::Table-->
                                                <div class="min-h-300px me-10 ">
                                                    <h4 class="color-blue">Additional Skills</h4>
                                                    <table class="table g-5 gs-0 mb-0 fw-bold text-gray-700"
                                                        data-kt-element="items">
                                                        <!--begin::Table head-->
                                                        <thead>
                                                            <tr
                                                                class="border-bottom fs-7 fw-bold text-gray-700 text-uppercase">
                                                                <th class="min-w-200px w-275px">Skill</th>
                                                                <th class="min-w-75px w-75px text-end">Remove</th>
                                                            </tr>
                                                        </thead>
                                                        <!--end::Table head-->
                                                        <!--begin::Table body-->
                                                        <tbody data-kt-element="item-template">
                                                        @php
                                                            $skill= json_decode($jobs->skill);
                                                        @endphp
                                                        @foreach ($skill as $skill)
                                                            <tr class="border-bottom border-bottom-dashed"
                                                                data-kt-element="item">
                                                                <td class="pe-7">
                                                                    <input type="text"
                                                                        class="form-control form-control-solid mb-2 @error('name.*') is-invalid @enderror"
                                                                        name="name[]" value="{{ $skill }}" placeholder="Skill">
                                                                        @error('name.*')<div class="invalid-feedback Skill-error" >
                                                                        Skill is required</div> @enderror
                                                                </td>
                                                                
                                                                <td class="pt-5 text-end">
                                                                    <button type="button"
                                                                        class="btn btn-sm btn-icon btn-active-color-primary"
                                                                        data-kt-element="remove-item">
                                                                        <!--begin::Svg Icon | path: icons/duotune/general/gen027.svg-->
                                                                        <span class="svg-icon svg-icon-3">
                                                                            <svg width="24" height="24"
                                                                                viewBox="0 0 24 24" fill="none"
                                                                                xmlns="http://www.w3.org/2000/svg">
                                                                                <path
                                                                                    d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z"
                                                                                    fill="currentColor"></path>
                                                                                <path opacity="0.5"
                                                                                    d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z"
                                                                                    fill="currentColor"></path>
                                                                                <path opacity="0.5"
                                                                                    d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z"
                                                                                    fill="currentColor"></path>
                                                                            </svg>
                                                                        </span>
                                                                        <!--end::Svg Icon-->
                                                                    </button>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                        <!--end::Table body-->
                                                        <!--begin::Table foot-->
                                                        <tfoot>
                                                            <tr
                                                                class="border-top border-top-dashed align-top fs-6 fw-bold text-gray-700">
                                                                <th class="text-primary">
                                                                    <button
                                                                        class="btn btn-sm btn-success w-150px mt-0 mb-1"
                                                                        data-kt-element="add-item">Add
                                                                        Skill</button>
                                                                </th>
                                                            </tr>

                                                        </tfoot>
                                                        <!--end::Table foot-->
                                                    </table>
                                                    <span class="invalid-feedback" id="error-message"></span>

                                                </div>
                                                <!--end::Order details-->
                                                <div class="d-flex justify-content-end border-top mt-0 pt-5">
                                                    <!--begin::Button-->
                                                    <a href="{{ route('job.index') }}"
                                                        id="kt_ecommerce_edit_order_cancel"
                                                        class="btn btn-light me-5">Cancel</a>
                                                    <!--end::Button-->
                                                    <!--begin::Button-->
                                                    <button type="submit" id="kt_ecommerce_edit_order_submit"
                                                        class="btn btn-primary">
                                                        <span class="indicator-label">Submit</span>
                                                        <span class="indicator-progress">Please wait...
                                                            <span
                                                                class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                                    </button>
                                                    <!--end::Button-->
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <!--end::Wrapper-->

                                </form>
                                <!--end::Form-->
                            </div>
                            <!--end::Card body-->
                        </div>
                        <!--end::Card-->
                    </div>
                    <!--end::Content-->
                    <!--begin::Sidebar-->

                    <!--end::Sidebar-->
                </div>
                <!--end::Layout-->
            </div>
            <!--end::Content container-->
        </div>
        <!--end::Content-->
    </div>
    <!--end::Content wrapper-->
    <!--begin::Footer-->
    <!--end::Footer-->
</div>
@endsection
@section('pageScripts')
<!--begin::Fonts(mandatory for all pages)-->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
<!--end::Fonts-->

<!--begin::Vendor Stylesheets(used for this page only)-->
<link href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
<!--end::Vendor Stylesheets-->

<!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
<link href="{{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
<!--end::Global Stylesheets Bundle-->
<!-- Flatpickr CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<!-- Flatpickr JS -->
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

<script>
var hostUrl = "{{ asset('assets/') }}";
</script>

<!--begin::Global Javascript Bundle(mandatory for all pages)-->
<script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
<script src="{{ asset('assets/js/scripts.bundle.js') }}"></script>
<!--end::Global Javascript Bundle-->

<!--begin::Vendors Javascript(used for this page only)-->
<script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
<!--end::Vendors Javascript-->

<!--begin::Custom Javascript(used for this page only)-->
<script src="{{ asset('assets/js/custom/apps/invoices/create.js') }}"></script>
<script src="{{ asset('assets/js/widgets.bundle.js') }}"></script>
<script src="{{ asset('assets/js/custom/widgets.js') }}"></script>
<script src="{{ asset('assets/js/custom/apps/chat/chat.js') }}"></script>
<script src="{{ asset('assets/js/custom/utilities/modals/upgrade-plan.js') }}"></script>
<script src="{{ asset('assets/js/custom/utilities/modals/create-app.js') }}"></script>
<script src="{{ asset('assets/js/custom/utilities/modals/users-search.js') }}"></script>
<!-- Summernote CSS & JS -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
$(document).ready(function() {
    $('.summernote').summernote({
        height: 125, // Set the editor height
        placeholder: '',
        tabsize: 2,
        toolbar: [
            // [groupName, [list of buttons]]
            ['style', ['bold', 'italic', 'underline', 'clear']],
            ['font', ['superscript', 'subscript']],
            ['para', ['ul', 'ol']],
        ]
    });

});

document.addEventListener("DOMContentLoaded", function () {
    flatpickr("#job_date", {
        //defaultDate: new Date(), // Sets the default date to the current date
        dateFormat: "Y-m-d", // Use a standard format for backend compatibility
        placeholder: "Select date" // Placeholder text
    });
});

</script>


@endsection