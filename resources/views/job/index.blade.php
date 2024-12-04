@extends(Auth::user()->isStudent() ? 'layouts.blank' : 'layouts.admin')

@section('content')

<style>
div#kt_app_main {
    background: #f5f8fa;
}
</style>
<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
    <!--begin::Content wrapper-->
    <div class="d-flex flex-column flex-column-fluid">
        <!--begin::Content-->
        <div id="kt_app_content" class="app-content flex-column-fluid pt-0">
            <!--begin::Content container-->
            <div id="kt_app_content_container" class="app-container container-xxl py-10">
                <div class="d-flex flex-wrap flex-stack mb-6">
                    <!--begin::Title-->
                    <h3 class="fw-bold my-2">Job Listing
                        <span class="fs-6 text-gray-400 fw-semibold ms-1"></span>
                    </h3>
                    <!--end::Title-->
                    <!--begin::Controls-->
                    <div class="d-flex align-items-center my-2">
                        <!--begin::Select wrapper-->
                        <div class="w-100px me-5">
                            <!--begin::Select-->

                            <!--end::Select-->
                        </div>
                        <!--end::Select wrapper-->
                        <div class="card-toolbar">
                            @if(Auth::user()->isRecruiter())
                            <a href="{{ route('job.create') }}" class="btn btn-sm btn-primary">
                                Create Job
                            </a>
                            @endif
                        </div>
                    </div>
                    <!--end::Controls-->
                </div>
                <!--end::Toolbar-->
                <!--begin::Row-->
                <div class="row g-3 g-xl-6">
                    @if($jobs->isEmpty())
                    <!-- Message when no jobs are available -->
                    <div class="col-12">
                        <div class="text-center py-5">
                            <h3 class="fw-semibold text-hover-primary">No Jobs available at the moment.</h3>
                        </div>
                    </div>
                    @else
                    <!--begin::Col-->
                    @foreach($jobs as $job)
                    <div class="col-sm-6 col-xl-6">
                        <!--begin::Card-->
                        <a href="{{ route('job.show', $job->id) }}">
                            <div class="card d-flex flex-row align-items-center border py-7 px-5 pe-7">
                                <div class="symbol symbol-70px w-70px me-5">
                                    <img src="{{ $job->user->personalInformation->image_path ? asset('storage/images/' . $job->user->personalInformation->image_path) : asset('assets/media/logos/dummy-logo.png') }}"
                                        alt="image" class="img-fluid">
                                </div>
                                <div class="flex-grow-1">
                                    <span class="fs-3 fw-bold text-primary mb-2 ">
                                        {{ $job->job_title }}
                                    </span>
                                    <div class="d-flex align-items-center justify-content-between py-2">
                                        <div class="fs-5 fw-semibold mb-0">
                                            {{ $job->user->first_name ?? 'Unknown Company' }}</div>
                                        <div class="fs-6 text-muted">
                                            <i class="fa-solid fa-location-dot"></i> {{ $job->job_location }}
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="text-gray-700 fs-6 py-0">&#8377;
                                            {{ number_format($job->salary, 0) }}</div>
                                        <div class="fs-6 text-muted">
                                            <i class="fa-regular fa-calendar me-1"></i>
                                            {{ \Carbon\Carbon::parse($job->submission_date)->format('d M Y') }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                    @endif
                </div>
            </div>
            <!--end::Content container-->
        </div>
        <!--end::Content-->
    </div>
    <!--end::Content wrapper-->
</div>


@endsection