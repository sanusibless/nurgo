
@extends('admin.layout')
@section('content')
  <section class="section profile">
        <div class="row">
          <div class="col-xl-4">
            <div class="card">
              <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

                <img src="{{ $nurse['photo'] ? asset('storage/'. $nurse['photo']) : asset('assets/images/no-image.png')  }}" alt="{{ $nurse['profile_image'] }}">
                <p class="mt-3">Nur. <b> {{ $nurse->firstname . ' ' . $nurse->lastname }}</b></p>
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
                    <h5 class="card-title">Profile Details</h5>

                    <div class="row">
                      <div class="col-lg-3 col-md-4 label ">Full Name</div>
                      <div class="col-lg-9 col-md-8">{{ $nurse->firstname . ' ' . $nurse->lastname }}</div>
                    </div>


                    <div class="row">
                      <div class="col-lg-3 col-md-4 label">Phone</div>
                      <div class="col-lg-9 col-md-8">{{ $nurse->phone ?? 'information yet to be provided' }}</div>
                    </div>

                    <div class="row">
                      <div class="col-lg-3 col-md-4 label">Email</div>
                      <div class="col-lg-9 col-md-8">{{ $nurse->email ?? 'information yet to be provided'}}</div>
                    </div>

                  </div>

                  <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                    <!-- Profile Edit Form -->
                    <form method="POST" action="{{ route('update_nurse', [ 'id' => $nurse['id'] ]) }}" enctype="multipart/form-data">
                      @csrf
                      <div class="row mb-3">
                        <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                        <div class="col-md-8 col-lg-9">
                          <img src="{{$nurse->photo ? asset('storage/'. $nurse->photo) : asset('assets/images/no-image.jpg') }}" alt="Profile">
                          <div class="pt-2">
                            <input type="file" name="photo" class="form-file">

                            <a href="{{-- route('delete_profile_image') --}}" onclick="return confirm('Are you sure want to delete')" class="btn btn-danger btn-sm" title="Remove my profile image"><i class="bi bi-trash"></i></a>
                          </div>
                        </div>
                      </div>

                      <div class="row mb-3">
                        <label for="firstname" class="col-md-4 col-lg-3 col-form-label">First Name</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="firstname" type="text" class="form-control" id="firstname" value="{{ $nurse->firstname }}">
                        </div>
                        @error('firstname')
                              <p class="text-danger"> {{ $message }}</p>
                        @enderror
                      </div>

                      <div class="row mb-3">
                        <label for="firstname" class="col-md-4 col-lg-3 col-form-label">Last Name</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="lastname" type="text" class="form-control" id="lastname" value="{{ $nurse->lastname}}">
                        </div>
                        @error('lastname')
                              <p class="text-danger"> {{ $message }}</p>
                         @enderror
                      </div>

                      <div class="row mb-3">
                        <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Phone</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="phone" type="text" class="form-control" id="Phone" value="{{ $nurse->phone ?? ''}}" placeholder="{{ $nurse->phone ?? 'Your telephone' }}">
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

                  <div class="tab-pane fade pt-3" id="profile-settings">

                  </div>

                  <div class="tab-pane fade pt-3" id="profile-change-password">
                    
                    <form action="" method="POST">
                      @method('PUT')
                      @csrf
                      <div class="row mb-3">
                        <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="password" type="currentpassword" class="form-control" id="currentPassword">
                        </div>
                      </div>

                      <div class="row mb-3">
                        <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="password" type="password" class="form-control" id="newPassword">
                        </div>
                        @error('newpassword')
                          <p class="text-danger"> {{ $message }}</p>
                        @enderror
                      </div>

                      <div class="row mb-3">
                        <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="password_confirmation" type="password" class="form-control" id="renewPassword">
                        </div>
                      </div>

                      <div class="text-center">
                        <button type="submit" class="btn btn-primary">Change Password</button>
                      </div>
                    </form>End Change Password Form -->
                  </div>

                </div><!-- End Bordered Tabs -->

              </div>
            </div>

          </div>
        </div>
  </section>
@endsection