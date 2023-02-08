<x-meta-card />
    @if(session('status'));
        <x-alert type="success" message="{{ session('status') }}" />
      @endif
   <div class="container w-25 mb-5 p-5" style="padding-top: 20vh !important;">
      <div class="mb-4 text-center">
         <img src="{{ asset('assets/images/logo.png') }}" class="img-fluid mx-auto" />
      </div>


      <div class="mt-5">
        <h2> Reset Password </h2>
        <p>Please provide your email</p>
      </div>
      <form action="{{ route('forgot-password') }}" method="POST">
         @csrf
         <div class="mb-3">
            <input type="email" placeholder="Email" id="email" class="form-control" name="email" value="{{ old('email')}}">
             @error('email')
               <p> {{ $message }} </p>
            @enderror
         </div>
        <div class="mb-3">
          <button class="btn btn-info" type="submit">Reset Password</button>
        </div>
        </div>
      </form>

      
   </div>
<x-scripts /> 
</body>
</html>