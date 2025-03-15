<x-guest-layout>
    <div class="section-authentication-cover">
        <div class="">
            <div class="row g-0">
    
                <!-- Left Side (Image Cover) -->
                <div class="col-12 col-xl-7 col-xxl-8 auth-cover-left align-items-center justify-content-center d-none d-xl-flex">
                    <div class="mb-0 bg-transparent shadow-none card rounded-0">
                        <div class="card-body align-items-center justify-content-center">
                            <img src="{{ asset('assets/images/login-images/login-cover.svg') }}" class="img-fluid auth-img-cover-login" width="650" alt=""/>
                        </div>
                    </div>
                </div>
    
                <!-- Right Side (Registration Form) -->
                <div class="col-12 col-xl-5 col-xxl-4 auth-cover-right align-items-center justify-content-center">
                    <div class="m-3 mb-0 bg-transparent shadow-none card rounded-0">
                        <div class="card-body p-sm-5">
                            <div class="text-center">
                                <img src="{{ asset('assets/images/logo-icon.png') }}" width="60" alt="">
                            </div>
                            <div class="mb-4 text-center">
                                <h5 class="">Rocker Admin</h5>
                                <p class="mb-0">Create your account</p>
                            </div>
    
                            <div class="form-body">
                                <form class="row g-3" method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                                    @csrf
    
                                    <!-- First Name & Last Name -->
                                    <div class="col-md-6">
                                        <label for="first_name" class="form-label">First Name</label>
                                        <input type="text" id="first_name" name="first_name" class="form-control" value="{{ old('first_name') }}" required autofocus>
                                        @error('first_name') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
    
                                    <div class="col-md-6">
                                        <label for="last_name" class="form-label">Last Name</label>
                                        <input type="text" id="last_name" name="last_name" class="form-control" value="{{ old('last_name') }}" required>
                                        @error('last_name') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
    
                                    <!-- Username & Email -->
                                    <div class="col-md-6">
                                        <label for="username" class="form-label">Username</label>
                                        <input type="text" id="username" name="username" class="form-control" value="{{ old('username') }}" required>
                                        @error('username') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
    
                                    <div class="col-md-6">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}" required>
                                        @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
    
                                    <!-- Phone -->
                                    <div class="col-md-6">
                                        <label for="phone" class="form-label">Phone Number</label>
                                        <input type="text" id="phone" name="phone" class="form-control" value="{{ old('phone') }}" required>
                                        @error('phone') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
    
                                    <!-- Password & Confirm Password -->
                                    <div class="col-md-6">
                                        <label for="password" class="form-label">Password</label>
                                        <div class="input-group" id="show_hide_password">
                                            <input type="password" id="password" name="password" class="form-control border-end-0" required>
                                            <a href="javascript:;" class="bg-transparent input-group-text"><i class="bx bx-hide"></i></a>
                                        </div>
                                        @error('password') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
    
                                    <div class="col-md-6">
                                        <label for="password_confirmation" class="form-label">Confirm Password</label>
                                        <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required>
                                        @error('password_confirmation') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
    
                                    <!-- Register Button -->
                                    <div class="col-12">
                                        <div class="d-grid">
                                            <button type="submit" class="btn btn-primary">Register</button>
                                        </div>
                                    </div>
    
                                    <!-- Already Registered? -->
                                    <div class="text-center col-12">
                                        <p class="mb-0">Already have an account? <a href="{{ route('login') }}">Log in here</a></p>
                                    </div>
                                </form>
                            </div>
    
                            <div class="my-4 text-center login-separater">
                                <span>OR SIGN UP WITH</span>
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
            <!--end row-->
        </div>
    </div>
</x-guest-layout>
