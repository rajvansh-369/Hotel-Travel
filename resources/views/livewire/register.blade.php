<div class="container-fluid"> 




        {{-- <section class="vh-100"> --}}
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6 text-black mt-5">

                        <div class="px-5 ms-xl-4">
                            <i class="fas fa-crow fa-2x me-3 pt-5 mt-xl-4" style="color: #709085;"></i>
                            <span class="h1 fw-bold mb-0">Logo</span>
                        </div>

                        <div class="d-flex align-items-center h-custom-2 px-5 ms-xl-4 mt-5 pt-5 pt-xl-0 mt-xl-n5">

                            <form wire:submit.prevent="create" style="width: 23rem;">
                                @csrf
                                <h2 class="mt-3">Register</h2>
                                {{-- <h3 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Register</h3> --}}

                                <div class="form-outline mb-2 mt-3">
                                    <label class="form-label" for="name">Name</label>
                                    <input type="text" wire:model="name" id="name" name="name"
                                        class="form-control form-control-lg" />
                                        @error('name') <span class="error text-danger">{{ $message }}</span> @enderror


                                </div>

                                <div class="form-outline mb-2">
                                    <label class="form-label" for="email">Email</label>
                                    <input type="email" wire:model="email" id="email" name="email"
                                        class="form-control form-control-lg" />
                                        @error('email') <span class="error text-danger">{{ $message }}</span> @enderror

                                </div>

                                <div class="form-outline mb-2">
                                    <label class="form-label" for="password">Password</label>
                                    <input type="password" wire:model="password" id="password" name="password"
                                        class="form-control form-control-lg" />
                                        @error('password') <span class="error text-danger">{{ $message }}</span> @enderror

                                </div>


                                <div class="form-outline mb-2">
                                    <label class="form-label" for="password_confirmation">Confirm Password</label>
                                    <input type="password" wire:model="password_confirmation" id="password_confirmation" name="password_confirmation"
                                        class="form-control form-control-lg" />
                                        @error('confirmPassword') <span class="error text-danger">{{ $message }}</span> @enderror

                                </div>
                                @if (session()->has('message'))
                                <div class="alert alert-success">
                                    {{ session('message') }}
                                </div>
                                  @endif
                                <div class="pt-1">
                                    <button class="btn2 btn-info btn-lg btn-block" type="submit">Register</button>
                                </div>
                                <p>Have an account? <a href="{{route('loginView')}}" class="link-info">Login here</a></p>

                            </form>


                            

                        </div>

                    </div>
                    <div class="col-sm-6 px-0 d-none d-sm-block">
                        <img src="{{ asset('storage/login.jpg') }}" alt="Login image" class="w-100 vh-100 registerImage"
                            style="object-fit: cover; object-position: left;">
                    </div>
                </div>
            </div>
        {{-- </section> --}}
</div>
