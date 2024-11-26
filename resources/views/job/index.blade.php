@extends('layouts.admin')

@section('content')
<div class="d-flex flex-column flex-column-fluid">
	<div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
		<!--begin::Toolbar container-->
		<div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
			<!--begin::Page title-->
			<div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
				<!--begin::Title-->
				<h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Job Listing</h1>
				<!--end::Title-->
				<!--begin::Breadcrumb-->
				<!-- <ul class="breadcrumb fw-semibold fs-7 my-0 pt-1">
											
										</ul> -->
				<!--end::Breadcrumb-->
			</div>
			<!--end::Page title-->
			<!--begin::Button-->
			<div class="card-toolbar">
				<a href="{{ route('job.create') }}" class="btn btn-sm btn-primary">
					Create
				</a>
			</div>
			<!--end::Button-->
		</div>
		<!--end::Toolbar container-->
	</div>
	<div id="kt_app_content" class="app-content flex-column-fluid">
		<!--begin::Content container-->
		<div id="kt_app_content_container" class="app-container container-xxl">
			<div class="card mb-5 mb-xl-8">
				<!--begin::Body-->
				<div class="card-body py-3">
					<!--begin::Table container-->
					<div class="table-responsive">
						<!--begin::Table-->
						<table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4" id="campustable">
							<!--begin::Table head-->
							<thead>
								<tr class="fw-bold">
									<th class="w-50px">#</th>
									<th class="min-w-150px">Date</th>
									<th class="min-w-150px">Title</th>
									<th class="min-w-150px">Location</th>
									<th class="min-w-150px">Salary</th>
									<th class="min-w-150px">Skill</th>
									<!-- <th class="min-w-150px text-center">Actions</th> -->
								</tr>
							</thead>
							<!--end::Table head-->
							<!--begin::Table body-->
							<tbody>
								@forelse($jobs as $key => $job)
								<tr>
									<td>
										<div class="">
											<div class="">
												{{ $key+1 }}
											</div>
										</div>
									<td>
										<div class="">
											<div class="">
												{{$job->submission_date}}

											</div>
										</div>
									</td>
									<td>
										<div class="">
											<div class="">
												{{$job->job_title}} 

											</div>
										</div>
									</td>
                                    <td>
										<div class="">
											<div class="">
												{{$job->job_location}} 

											</div>
										</div>
									</td>
                                    <td>
										<div class="">
											<div class="">
                                                {{$job->salary}}

											</div>
										</div>
									</td>									
                                    <td>
										<div class="">
											<div class="">
                                                {{ implode(', ', json_decode($job->skill)) }}
											</div>
										</div>
									</td>
									
								</tr>
								@empty
								<tr>
									<td colspan="4">No data found</td>
								</tr>
								@endforelse


							</tbody>
							<!--end::Table body-->
						</table>
						<!--end::Table-->
					</div>
					<!--end::Table container-->
				</div>
				<!--begin::Body-->
			</div>
		</div>
	</div>
</div>
@endsection

@section('pageScripts')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script>
	$(document).ready(function() {
		$('#departmenttable').DataTable({
			"iDisplayLength": 10,
			"searching": true,
			"recordsTotal": 3615,
			"pagingType": "full_numbers"
		});
	});
</script>


@endsection