@extends('layouts.login')

@section('content')
<div class="d-flex flex-column flex-root kt_app_root-login" id="kt_app_root">
			<!--begin::Page bg image-->
			<style>body { background-image: url("{{ url('/') }}/assets/media/auth/bg4.jpg"); } [data-theme="dark"] body { background-image: url('assets/media/auth/bg4-dark.jpg'); }</style>
			<!--end::Page bg image-->
			<!--begin::Authentication - Sign-in -->
			<div class="d-flex flex-column flex-column-fluid flex-lg-row">
				<!--begin::Aside-->
				<!--begin::Aside-->
				<!--begin::Body-->
				<div class="d-flex flex-center w-lg-100 p-10">
					<!--begin::Card-->
					<div class="card rounded-3 w-md-500px login-div">
						<!--begin::Card body-->
						<div class="card-body p-10 p-lg-20">
							<!--begin::Form-->
							<form method="POST" action="{{ route('password.update') }}">
                        @csrf

                            <!--begin::Heading-->
								<div class="text-center mb-8">
									<!--begin::Title-->
									
									<img alt="Logo" src="{{ url('/') }}/assets/media/logos/logo.svg" />
									<h6 class="text-white fw-normal mt-2 pt-3 br-t-3">
										PLACEMENT MANAGEMENT SYSTEM
									</h6>

								</div>
								<!--begin::Heading-->

                                <input type="hidden" name="token" value="{{ $token }}">

                                <div class="fv-row">
                                    <label for="email" class="text-gray-600 col-form-label text-md-end  py-0 pb-2 mt-5">{{ __('Email Address') }}</label>

                                    <div class="col-md-12">
                                        <input id="email" readonly type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="fv-row ">
                                    <label for="password" class="text-gray-600 col-form-label text-md-end py-0 pb-2 mt-5">{{ __('Password') }}</label>

                                    <div class="col-md-12">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="fv-row" >
                                    <label for="password-confirm" class="text-gray-600 col-form-label text-md-end  py-0 pb-2 mt-5">{{ __('Confirm Password') }}</label>

                                    <div class="col-md-12">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                    </div>
                                </div>

                                <div class="d-grid mt-10 mb-5">
									<button type="submit" id="kt_sign_in_submit" class="btn btn-primary">
										<!--begin::Indicator label-->
										<span class="indicator-label">Reset</span>
										<!--end::Indicator label-->
										<!--begin::Indicator progress-->
										<span class="indicator-progress">Please wait...
										<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
										<!--end::Indicator progress-->
									</button>
								</div>
    
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
