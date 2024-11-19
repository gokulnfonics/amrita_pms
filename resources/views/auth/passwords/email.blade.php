@extends('layouts.login')

@section('content')
<!--begin::Theme mode setup on page load-->
		<!--end::Theme mode setup on page load-->
		<!--begin::Root-->
		<div class="d-flex flex-column flex-root kt_app_root-login" id="kt_app_root">
			<!--begin::Page bg image-->
			<style>body { background-image: url("{{ url('/') }}/assets/media/auth/bg4.jpg"); } [data-theme="dark"] body { background-image: url('assets/media/auth/bg4-dark.jpg'); }</style>
			<!--end::Page bg image-->
			<!--begin::Authentication - Sign-in -->
			<div class="d-flex flex-column flex-column-fluid flex-lg-row">
			
				<!--begin::Body-->
				<div class="d-flex flex-center w-lg-100 p-10">
					<!--begin::Card-->
					<div class="card rounded-3 w-md-500px login-div">
						<!--begin::Card body-->
						<div class="card-body p-10 p-lg-20">
							<!--begin::Form-->
							<form method="POST" action="{{ route('password.email') }}">
                            @csrf

								<!--begin::Heading-->
								<div class="text-center mb-11">
									<!--begin::Title-->
									
									<img alt="Logo" src="{{ url('/') }}/assets/media/logos/logo.svg" />
									<h6 class="text-white fw-normal mt-2 pt-3 br-t-3">
										PLACEMENT MANAGEMENT SYSTEM
									</h6>
									
									@if (session('status'))
										<div class="alert alert-success mt-5" role="alert">
											{{ session('status') }}
										</div>
                    				@endif
									
								</div>
								<!--begin::Heading-->
								
								<!--begin::Input group=-->
								<div class="text-light text-center mb-8">Please enter your email address and we'll send you a link to reset your password</div>
								<div class="fv-row mb-5 mt-5">
									<!--begin::Email-->
									

                            <div class="col-md-12">
                                <input id="email" type="email" placeholder="Email Address"  class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                                    <!--end::Email-->
								</div>
								<!--end::Input group=-->
								
								<!--begin::Submit button-->
							
								<div class="d-grid mb-10">
									<button type="submit" class="btn btn-primary mt-5">
										<!--begin::Indicator label-->
										<span class="indicator-label">  {{ __('Submit') }}</span>
										<!--end::Indicator label-->
										<!--begin::Indicator progress-->
										<span class="indicator-progress">Please wait...
										<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
										<!--end::Indicator progress-->
									</button>
							
								</div>
								<!--end::Submit button-->
								
							</form>
							<p class="text-center fs-5"><a href="{{route('login')}}"><u>Sign In</u></a></p>
							<footer class="page-copyright-inverse footer-label">
								© 2024. Amrita Vishwa Vidyapeetham. All Rights Reserved.
							</footer>
							<!--end::Form-->
						</div>
						<!--end::Card body-->
					</div>
					<!--end::Card-->
				</div>
				<!--end::Body-->
			</div>
			<!--end::Authentication - Sign-in-->
		</div>
		
        @endsection	