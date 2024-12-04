@extends(Auth::user()->isStudent() ? 'layouts.blank' : 'layouts.admin')

@section('content')

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
										<!-- <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Invoice 3</h1> -->
										<!--end::Title-->
									</div>
                                    <div class="d-flex align-items-center gap-2 gap-lg-3">
                                        <a href="{{ route('job.index') }}" class="link fs-6">
                                            <u>Back to List</u>
                                        </a>
									</div>
								</div>
								<!--end::Toolbar container-->
							</div>
							<!--end::Toolbar-->
							<!--begin::Content-->
							<div id="kt_app_content" class="app-content flex-column-fluid">
								<!--begin::Content container-->
								<div id="kt_app_content_container" class="app-container container-xxl">
									<!-- begin::Invoice 3-->
									<div class="card">
										<!-- begin::Body-->
										<div class="card-body p-20">
											<!-- begin::Wrapper-->
											<div class="mw-lg-950px mx-auto w-100">
												<!-- begin::Header-->
												<div class="">
													<h4 class="fw-bolder text-primary fs-2qx pe-5 pb-5">{{ $job->job_title }}</h4>
													
													<div class="d-flex flex-column flex-sm-row pb-5">
                                                        <div class="flex-root d-flex flex-column fw-semibold fs-4">
                                                            <span class="d-inline-flex align-items-center">
                                                                <i class="fa-solid fa-building me-2"></i>{{ $job->user->first_name ?? 'Unknown Company' }}
                                                            </span>
                                                        </div>
                                                        <div class="flex-root d-flex flex-column fw-semibold fs-4">
                                                            <span class="d-inline-flex align-items-center">
                                                                <i class="fa-solid fa-location-dot me-2"></i>{{ $job->job_location }}
                                                            </span>
                                                        </div>
                                                        <div class="flex-root d-flex flex-column fw-semibold fs-4">
                                                            <span class="d-inline-flex align-items-center">
                                                                <i class="fa-regular fa-calendar me-2"></i>{{ \Carbon\Carbon::parse($job->submission_date)->format('d M Y') }}
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="pb-5">
                                                        <div class="fs-4 fw-semibold">Salary : <span>&#8377;{{ number_format($job->salary, 0) }}</span>
                                                        </div>
                                                    </div>
													<div class="separator pb-5"></div>
												</div>
												
												<div class="pt-5">
                                                    <div class="pb-10 mb-xl-0 pe-5">
                                                        <h4 class="mb-0">Job Description</h4>
                                                        <div class="fs-6 fw-semibold text-gray-600 py-4 m-0">
                                                            {!!  $job->job_description !!}
                                                        </div>
                                                    </div>
                                                    <div class="pb-10 mb-xl-0 pe-5">
                                                        <h4 class="mb-0">Job Criteria</h4>
                                                        <div class="fs-6 fw-semibold text-gray-600 py-4 m-0">
                                                            {!!  $job->criteria !!}
                                                        </div>
                                                    </div>

                                                    <div class="pb-10 mb-xl-0 pe-5">
                                                        <h4 class="mb-0">Additional Skills</h4>
                                                        <ul class="fs-6 fw-semibold py-4 m-0">
                                                            @foreach(json_decode($job->skill, true) as $skill)
                                                                <li class="py-2">
                                                                    <span class="text-gray-700">{{ $skill }}</span>
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="d-flex flex-stack flex-wrap">
													<div class="my-1 me-5">
														<button type="button" class="btn btn-success my-1 me-12">Apply Now</button>
													</div>
												</div>
											</div>
											<!-- end::Wrapper-->
										</div>
										<!-- end::Body-->
									</div>
									<!-- end::Invoice 1-->
								</div>
								<!--end::Content container-->
							</div>
							<!--end::Content-->
						</div>
						<!--end::Content wrapper-->						
					</div>


@endsection