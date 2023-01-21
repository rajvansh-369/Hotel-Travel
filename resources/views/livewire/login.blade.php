<div>
    <div class="container-fluid">



        <section class="vh-100">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6 text-black mt-5">

                        <div class="px-5 ms-xl-4">
                            <i class="fas fa-crow fa-2x me-3 pt-5 mt-xl-4" style="color: #709085;"></i>
                            <span class="h1 fw-bold mb-0">Logo</span>
                        </div>

                        <div class="d-flex align-items-center h-custom-2 px-5 ms-xl-4 mt-5 pt-5 pt-xl-0 mt-xl-n5">

                            <form wire:submit.prevent="login"  style="width: 23rem;">
                                @csrf
                                <h3 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Log in</h3>

                                <div class="form-outline mb-4">
                                    <label class="form-label" for="email">Email address</label>
                                    <input type="email" wire:model="email" id="email" name="email"
                                        class="form-control form-control-lg" />
                                        @error('email') <span class="error text-danger">{{ $message }}</span> @enderror


                                </div>

                                <div class="form-outline mb-4">
                                    <label class="form-label" for="password">Password</label>
                                    <input type="password" wire:model="password" id="password" name="password"
                                    class="form-control form-control-lg" />
                                    @error('password') <span class="error text-danger">{{ $message }}</span> @enderror
                                    
                            
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" wire:model="remember_token" id="remember_token" name="remember_token">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        Remember Me
                                    </label>
                                  </div>

                                  @if (session()->has('message'))
                                  <div class="alert alert-danger">
                                      {{ session('message') }}
                                  </div>
                                    @endif
                                <div class="pt-1 mb-4">
                                    <button class="btn btn-info btn-lg btn-block" type="submit">Login</button>
                                </div>

                                <p class="small mb-5 pb-lg-2"><a class="text-muted" href="#!">Forgot password?</a></p>
                                <p>Don't have an account? <a href="{{ route('registerView') }}" class="link-info">Register
                                        here</a></p>

                            </form>

                        </div>

                    </div>
                    <div class="col-sm-6 px-0 d-none d-sm-block">
                        <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/img3.webp"
                            alt="Login image" class="w-100 vh-100" style="object-fit: cover; object-position: left;">
                    </div>
                </div>
            </div>
        </section>


    </div>
</div>
