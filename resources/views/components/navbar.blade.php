@if(session()->has('message'))
<div class="alert alert-success w-25 mx-auto fixed-top  mt-5" x-data="{ show: true }" x-init="setTimeout(() => show = false, 5000)" x-show="show">
   <button type="button" class="close" data-dismiss='alert'>x</button>
   <p class="text-center">{{ session()->get('message') }} </p>
</div>
@endif
         <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="logo">
               <a href="{{ route('index')}}">
                  <img src="{{ asset('assets/images/logo.png') }}"></a>
               </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
               <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
               <ul class="navbar-nav mr-auto">
                  
                  <li class="nav-item">
                     <a class="nav-link" href="{{ route('index') }}">Home</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="{{ route('health') }}">Health</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="{{ route('medicine') }}">Medicine</a>
                  </li>
                  <!--<li class="nav-item">
                     <a class="nav-link" href="{{ route('news') }}">News</a> 
                  </li>-->
                  <li class="nav-item">
                     <a class="nav-link" href="{{ route('contact') }}">Contact Us</a>
                  </li>
                 
                  @if(auth()->user())
                   <li class="nav-item">
                     <a class="nav-link" href="{{ route('dashboard')}}">Dashboard</a>
                  </li>
                  @else
                  <li class="nav-item">
                     <a class="nav-link" href="{{ route('login') }}">Login </a>
                  </li>
                   <li class="nav-item">
                     <a class="nav-link" href="{{ route('register') }}">Register</a>
                  </li>
                  @endif
               </ul>
            </div>
         </nav>

      