<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />


    <div class="container wrapper">
		<div class="section-authentication-cover">
			<div class="">
				<div class="row g-0">

					<div class="col-12 col-xl-7 col-xxl-8 auth-cover-left align-items-center justify-content-center d-none d-xl-flex">

                        <div class="mb-0 bg-transparent shadow-none card rounded-0">
							<div class="card-body">
                                 <img src="assets/images/login-images/login-cover.svg" class="img-fluid auth-img-cover-login" width="650" alt=""/>
							</div>
						</div>
						
					</div>


                    <div class="rounded shadow col-12 col-xl-5 col-xxl-4 auth-cover-right align-items-center justify-content-center">
                        <div class="m-3 mb-0 bg-transparent shadow-none card rounded-0">
                            <div class="card-body p-sm-5">
                                <div class="">
                                    <div class="mb-3 text-center">
                                        <img src="assets/images/logo-icon.png" width="60" alt="">
                                    </div>
                                    <div class="mb-4 text-center">
                                        <h5 class="">Bettcash</h5>
                                        <p class="mb-0">Please log in to your account</p>
                                    </div>
                                    <div class="form-body">
                                        <form class="row g-3" method="POST" action="{{ route('login') }}">
                                            @csrf
                                            <div class="col-12">
                                                <label for="email" class="form-label">Email</label>
                                                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username" placeholder="john@example.com">
                                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                            </div>
                                            <div class="col-12">
                                                <label for="password" class="form-label">Password</label>
                                                <div class="input-group" id="show_hide_password">
                                                    <input type="password" class="form-control border-end-0" id="password" name="password" required autocomplete="current-password" placeholder="Enter Password"> 
                                                    <a href="javascript:;" class="bg-transparent input-group-text"><i class="bx bx-hide"></i></a>
                                                </div>
                                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox" id="remember_me" name="remember">
                                                    <label class="form-check-label" for="remember_me">Remember Me</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6 text-end">
                                                @if (Route::has('password.request'))
                                                    <a href="{{ route('password.request') }}">Forgot Password?</a>
                                                @endif
                                            </div>
                                            <div class="col-12">
                                                <div class="d-grid">
                                                    <button type="submit" class="btn btn-primary">Sign in</button>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="text-center ">
                                                    <p class="mb-0">Don't have an account yet? <a href="{{ route('register') }}">Sign up here</a></p>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="mb-5 text-center login-separater"> <span>OR SIGN IN WITH</span>
                                        <hr>
                                    </div>
                                    <div class="text-center list-inline contacts-social">
                                        <a href="javascript:;" class="text-white border-0 list-inline-item bg-facebook rounded-3"><i class="bx bxl-facebook"></i></a>
                                        <a href="javascript:;" class="text-white border-0 list-inline-item bg-twitter rounded-3"><i class="bx bxl-twitter"></i></a>
                                        <a href="javascript:;" class="text-white border-0 list-inline-item bg-google rounded-3"><i class="bx bxl-google"></i></a>
                                        <a href="javascript:;" class="text-white border-0 list-inline-item bg-linkedin rounded-3"><i class="bx bxl-linkedin"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

					

				</div>
				<!--end row-->
			</div>
		</div>
	</div>

    
    
</x-guest-layout>
