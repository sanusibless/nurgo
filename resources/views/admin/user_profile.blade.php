
@extends('admin.layout')
@section('content')
<section class="section profile">
      <div class="row">
        <div class="col-xl-4">
          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

              <img src="{{auth()->user()->photo ? asset('storage/'. auth()->user()->photo) : asset('assets/images/no-image.png') }}" alt="Profile" class="rounded-circle">
              <h2>{{ auth()->user()->firstname . ' ' . auth()->user()->lastname }}</h2>

              @if(auth()->user()->role == 2)
              <p class="text-cente">Specialty : {{ auth()->user()->specialty }} </p>
              @elseif(auth()->user()->role == 3) 
              <p class="text-cente">Nurse</p>
              @else
                <p>Role: Administrator</p>
              @endif
            </div>
          </div>
        </div>

        <div class="col-xl-8">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">

                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
                </li>
              </ul>
              <div class="tab-content pt-2">

                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                  @if(auth()->user()->role == 1)
                  <h5 class="card-title"> Role: Admin</h5>
                  @elseif(auth()->user()->role == 2)
                  <h5 class="card-title"> Role: Doctor ({{ auth()->user()->specialty }})</h5>
                  @else
                  <h5 class="card-title"> Role: Nurse</h5>
                  @endif
                  <h5 class="card-title">Profile Details</h5>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Full Name</div>
                    <div class="col-lg-9 col-md-8">{{ auth()->user()->firstname . ' ' . auth()->user()->lastname }}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Phone</div>
                    <div class="col-lg-9 col-md-8">{{ auth()->user()->phone ?? 'information yet to be provided' }}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Email</div>
                    <div class="col-lg-9 col-md-8">{{ auth()->user()->email ?? 'information yet to be provided'}}</div>
                  </div>

                </div>

                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                  <!-- Profile Edit Form -->
                  <div class="row">
                    <img src="{{auth()->user()->photo ? asset('storage/'. auth()->user()->photo) : asset('assets/images/no-image.png') }}" alt="Profile">
                    <form method="POST" action="{{ route('delete_profile_image') }}">
                        @csrf
                        @method('PATCH')
                        <button onclick="return confirm('Are you sure you want to delete')" class="btn btn-danger btn-sm mt-3" title="Remove my profile image"><i class="bi bi-trash"></i></button>
                    </form>
                  </div>
                  <form method="POST" action="{{ route('update_user') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-3">
                      <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                      
                        <div class="pt-2">
                          <input type="file" name="photo" class="form-file">
                        </div>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="firstname" class="col-md-4 col-lg-3 col-form-label">First Name</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="firstname" type="text" class="form-control" id="firstname" value="{{ auth()->user()->firstname }}">
                      </div>
                      @error('firstname')
                            <p class="text-danger"> {{ $message }}</p>
                      @enderror
                    </div>

                    <div class="row mb-3">
                      <label for="firstname" class="col-md-4 col-lg-3 col-form-label">Last Name</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="lastname" type="text" class="form-control" id="lastname" value="{{ auth()->user()->lastname}}">
                      </div>
                      @error('lastname')
                            <p class="text-danger"> {{ $message }}</p>
                       @enderror
                    </div>

                    <div class="row mb-3">
                      <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Phone</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="phone" type="text" class="form-control" id="Phone" value="{{ auth()->user()->phone ?? ''}}" placeholder="{{ auth()->user()->phone ?? 'Your telephone' }}">
                        @error('phone')
                            <p class="text-danger"> {{ $message }}</p>
                          @enderror
                      </div>
                    </div>

                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                  </form><!-- End Profile Edit Form -->

                </div>
              </div><!-- End Bordered Tabs -->

            </div>
          </div>

        </div>
      </div>
</section>
@endsection