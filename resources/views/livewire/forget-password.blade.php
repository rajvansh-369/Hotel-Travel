<div>

    <h2>Forget Password</h2>
    
    <form wire:submit.prevent="reset_password"  style="width: 23rem;">
        @csrf
 

        <div class="form-outline mb-4 mt-2">
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

        <div class="form-outline mb-4">
            <label class="form-label" for="password">Confirm Password</label>
            <input type="password" wire:model="password_confirmation" id="password" name="password"
            class="form-control form-control-lg" />
            @error('password') <span class="error text-danger">{{ $message }}</span> @enderror
            
    
        </div>
{{-- 
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" wire:model="remember_token" id="remember_token" name="remember_token">
            <label class="form-check-label" for="flexCheckDefault">
                Remember Me
            </label>
          </div> --}}
          

          @if (session()->has('message'))
          <div class="alert alert-success">
              {{ session('message') }}
          </div>
            @endif

        <div class="pt-1 mb-4">
            <button class="btn2 btn-info btn-lg btn-block" type="submit">Reset</button>
        </div>
        <p class="small mb-5 pb-lg-2"><a class="text-muted" href="#!">Forgot password?</a></p>
        
        <hr>

        <div class="flex items-center justify-end mt-3 mb-3">
            <a href="{{ url('login/google') }}">
                <img src="https://developers.google.com/identity/images/btn_google_signin_dark_normal_web.png">
            </a>
        </div>

       
        <p>Don't have an account? <a href="{{ route('registerView') }}" class="link-info">Register
                here</a></p>

    </form>
</div>
