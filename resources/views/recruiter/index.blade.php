@extends('layouts.admin')

@section('content')
<div class="d-flex flex-column flex-column-fluid">
	<div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
		<!--begin::Toolbar container-->
		<div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
			<!--begin::Page title-->
			<div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
				<!--begin::Title-->
				<h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Company Listing</h1>
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
								@forelse($recruiters as $key => $rec)
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
													{{ucfirst($rec->first_name)}}
												</div>
											</div>
										</div>
									</td>

									<td>
										<div class="d-flex align-items-center">
								
											<div class="d-flex justify-content-start flex-column">
												<div class="fw-400 d-block fs-6">
													{{ucfirst($rec->email)}}
												</div>
											</div>
										</div>
									</td>
									<td>
										<div class="d-flex align-items-center">
								
											<div class="d-flex justify-content-start flex-column">
												<div class="fw-400 d-block fs-6">
												{{ $rec->contactInformation->phone_number ?? 'N/A' }}
												</div>
											</div>
										</div>
									</td>
									
									
									<td class="text-center">
										<a href="#" class="btn btn-sm btn-light btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
											<i class="fa-solid fa-angle-down"></i></a>
										<!--begin::Menu-->
										<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
										<!--begin::Menu item-->
										<div class="menu-item px-3">
												<a href="{{route('recruiter.show',$rec->id)}}"  class="menu-link px-3">View</a>
											</div>
											<!--end::Menu item-->
										@if(Auth::user()->isAdmin() && $rec->user_status ==0)
										<!--begin::Menu item-->
											<div class="menu-item px-3">
												<a href="javascript:void(0)" onclick="approve('{{$rec->id}}','approved')" class="menu-link px-3">Approve</a>
											</div>
											<!--end::Menu item-->
											
											<!--begin::Menu item-->
											<!--<div class="menu-item px-3">
												<a href="javascript:void(0)"
												onclick="approve('{{$rec->id}}','disapproved')" class="menu-link px-3">Disapprove</a>
											</div>-->
											@endif
											<!--end::Menu item-->
											<!--begin::Menu item-->
											<div class="menu-item px-3">
												<a href="javascript:void(0)" onclick="removecompany('{{$rec->id}}')" class="menu-link px-3" data-kt-customer-table-filter="delete_row">Delete</a>
											</div>
											<!--end::Menu item-->
										</div>
										<!--end::Menu-->
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
		$('#categorytable').DataTable({
			"iDisplayLength": 10,
			"searching": true,
			"recordsTotal": 3615,
			"pagingType": "full_numbers"
		});
	});
</script>
<script>
	function removecompany(catid) {
		swal({
				title: "Are you sure?",
				text: "You want to remove this company",
				icon: "warning",
				buttons: true,
				dangerMode: true,
			})
			.then((willDelete) => {
				if (willDelete) {
					$.ajax({
						url: "{{ route('recruiter.deletecompany') }}",
						type: 'POST',
						data: {
							_token: '{{ csrf_token() }}',
							id: catid,
						},
						success: function(response) {
							if (response.success) {
								swal(response.success, {
									icon: "success",
									buttons: false,
								});
								setTimeout(() => {
									location.reload();
								}, 1000);
							} else {
								swal(response.error || 'Something went wrong.', {
									icon: "warning",
									buttons: false,
								});
								setTimeout(() => {
									location.reload();
								}, 1000);
							}
						},
						error: function(xhr) {
							swal('Error: Something went wrong.', {
								icon: "error",
							}).then(() => {
								location.reload();
							});
						}
					});
				}
			});
	}

	function approve(proid, status) {
    swal({
        title: "Are you sure?",
        text: `You are about to ${status === 'approved' ? 'approve' : 'disapprove'} this company!`,
        icon: "warning",
        buttons: {
            cancel: "Cancel",
            confirm: {
                text: `Yes, ${status}!`,
                value: true,
                visible: true,
                className: "btn btn-success",
            }
        },
        dangerMode: true,
    }).then((willApprove) => {
        if (willApprove) {
            // Send AJAX request to the backend
            fetch('/approve', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ id: proid, status: status })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {

					swal("success!", `The company has been ${status}.`, "success");
                    location.reload();
                } else {
                    swal("Error!", data.message || "An error occurred while processing your request.", "error");
                }
            })
            .catch(error => {
                swal("Error!", "An unexpected error occurred.", "error");
            });
        }
    });
}

</script>

@endsection