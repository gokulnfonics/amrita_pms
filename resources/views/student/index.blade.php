@extends('layouts.admin')

@section('content')
<div class="d-flex flex-column flex-column-fluid">
	<div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
		<!--begin::Toolbar container-->
		<div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
			<!--begin::Page title-->
			<div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
				<!--begin::Title-->
				<h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Student Listing</h1>
				<!--end::Title-->
				<!--begin::Breadcrumb-->
				<!-- <ul class="breadcrumb fw-semibold fs-7 my-0 pt-1">
											
										</ul> -->
				<!--end::Breadcrumb-->
			</div>
			<!--end::Page title-->
			
		</div>
		<!--end::Toolbar container-->
	</div>
	<div id="kt_app_content" class="app-content flex-column-fluid">
		<!--begin::Content container-->
		<div id="kt_app_content_container" class="app-container container-xxl">
			<div class="card mb-5 mb-xl-8">
				<!--begin::Header-->
				<!-- <div class="card-header border-0 pt-5">
											<h3 class="card-title align-items-start flex-column">
												<span class="card-label fw-bold fs-3 mb-1">Category List</span>
											</h3>
										</div> -->
				<!--end::Header-->
				<!--begin::Body-->
				<div class="card-body py-3">
					<!--begin::Table container-->
					<div class="table-responsive">
						<!--begin::Table-->
						<table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4" id="categorytable">
							<!--begin::Table head-->
							<thead>
								<tr class="fw-bold">
									<th class="w-50px">#</th>
									<th class="min-w-200px">Name</th>
									<th class="min-w-200px">Email</th>
									<th class="min-w-150px">Phone</th>
									<th class="min-w-150px text-center">Actions</th>
								</tr>
							</thead>
							<!--end::Table head-->
							<!--begin::Table body-->
							<tbody>
								@forelse($students as $key => $std)
								<tr>
									<td>
										<div class="d-flex align-items-center">
											<div class="fw-400 d-block fs-6">
												{{ $key+1 }}
											</div>
										</div>
									<td>
										<div class="d-flex align-items-center">
								
											<div class="d-flex justify-content-start flex-column">
												<div class="fw-400 d-block fs-6">
													{{ucfirst($std->first_name)}}
												</div>
											</div>
										</div>
									</td>

									<td>
										<div class="d-flex align-items-center">
								
											<div class="d-flex justify-content-start flex-column">
												<div class="fw-400 d-block fs-6">
													{{ucfirst($std->email)}}
												</div>
											</div>
										</div>
									</td>
									<td>
										<div class="d-flex align-items-center">
								
											<div class="d-flex justify-content-start flex-column">
												<div class="fw-400 d-block fs-6">
												{{ $std->contactInformation->phone_number ?? 'N/A' }}
												</div>
											</div>
										</div>
									</td>
									<td class="text-center">
																<div class="d-flex justify-content-center flex-shrink-0">
																	<a  href="{{ route('student.profile', ['id' => $std->id]) }}" class="color-green mx-2 me-0" >
                                  										<i class="fa-regular fa-eye  p-0 me-0 color-green"></i> view
																	</a>
																	
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

<script>
	$(document).ready(function() {
		$('#categorytable').DataTable({
			"iDisplayLength": 10,
			"searching": true,
			"recordsTotal": 3615,
			"pagingType": "full_numbers"
		});
	});
</script>



@endsection