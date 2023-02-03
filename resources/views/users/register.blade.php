<x-meta-card />
   <div class="container w-25 mb-5 p-5" style="padding-top: 20vh;">
      <div class="mb-4 text-center">
         <img src="{{ asset('assets/images/logo.png') }}" class="img-fluid mx-auto" />
      </div>
      <p>Register your account</p>
      <form action="{{ route('store_user') }}" method="POST" >
         @csrf
         <div class="mb-3">
            <label for="firstname" class="form-label">First Name</label>
            <input type="text" class="form-control" id="firstname" name="firstname" value="{{ old('firstname')}}">
            @error('firstname')
               <p> {{ $message }} </p>
            @enderror
         </div>
         <div class="mb-3">
            <label for="lasttname" class="form-label">Last Name</label>
            <input type="text" id="lastname" class="form-control" name="lastname" value="{{ old('laststname')}}">
             @error('lastname')
               <p> {{ $message }} </p>
            @enderror
         </div>

         <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" id="email" class="form-control" name="email" value="{{ old('email')}}">
             @error('email')
               <p> {{ $message }} </p>
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
            <label for="password_confirmation" class="form-label">Password</label>
            <input type="password" id="password_confirmation" class="form-control" name="password_confirmation">
             @error('password_confirmation')
               <p> {{ $message }} </p>
            @enderror
         </div>

         <div class="mb-3">
            <input type="submit" class="form-control btn btn-info" name="submit">
         </div>
          <div class="mb-3">
            <p>
              Already have an account? <a href="{{ route('login') }}" class="text-info"> Sign in</a>
            </div>
      </form>
   </div>
<x-scripts />
