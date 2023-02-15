<x-meta-card />
   <div class="container w-25 mb-5 p-5" style="padding-top: 20vh !important;">
      <div class="mb-4 text-center">
         <img src="{{ asset('assets/images/logo.png') }}" class="img-fluid mx-auto" />
         <div class="mt-4 ">
            <a class="text-info" href="{{ route('index') }}">Go Home</a>
         </div>
      </div>
      <form action="{{ route('authenticate') }}" method="POST">
         @csrf
         <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" id="email" class="form-control" name="email" value="{{ old('email')}}">
             @error('email')
               <p class="text-danger"> {{ $message }} </p>
            @enderror
         </div>

         <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" name="password">
             @error('password')
               <p> {{ $message }} </p>
            @enderror
          </div>

         <div class="mb-3">
            <input type="submit" class="form-control btn btn-info" value="Sign in" name="submit">
         </div>
      </form>
      <div class="mb-3">
            <p>
           
              <a href="{{ route('forgot_password') }}" class="text-info"> Forgot Password? </a>
            </p>
        </div>
      <div class="mb-3">
            <p>
              Don't have an account? 
              <a href="{{ route('register') }}" class="text-info">Register</a>
            </p>
        </div>
   </div>
<x-scripts />
