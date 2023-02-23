
@extends('admin.layout')
@section('content')


  <section class="section profile">
        <div class="row">
          <div class="col-xl-4">
            <div class="card">
              <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

                <img src="{{ $patient['photo'] ? asset('storage/'. $patient['photo']) : asset('assets/images/no-image.png')  }}" alt="{{ $patient['profile_image'] }}">
                <p class="mt-3"><b> {{ $patient->firstname . ' ' . $patient->lastname }}</b></p>
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

                  <li class="nav-item">
                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#history">History</button>
                  </li>

                  <li class="nav-item">
                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#addcomment">Add Comment</button>
                  </li>
                </ul>

                <div class="tab-content pt-2">
                  <div class="tab-pane fade show active profile-overview" id="profile-overview">
                    <h5 class="card-title">Profile Details</h5>

                    <div class="row">
                      <div class="col-lg-3 col-md-4 label ">Full Name: </div>
                      <div class="col-lg-9 col-md-8">{{ $patient->firstname . ' ' . $patient->lastname }}</div>
                    </div>

                    <div class="row">
                      <div class="col-lg-3 col-md-4 label">Email: </div>
                      <div class="col-lg-9 col-md-8">{{ $patient->email ?? 'information yet to be provided'}}</div>
                    </div>

                    <div class="row">
                      <div class="col-lg-3 col-md-4 label">Phone: </div>
                      <div class="col-lg-9 col-md-8">{{ $patient->phone ?? 'information yet to be provided' }}</div>
                    </div>

                    <div class="row">
                      <div class="col-lg-3 col-md-4 label">Address: </div>
                      <div class="col-lg-9 col-md-8">{{ $patient->address ?? 'information yet to be provided' }}</div>
                    </div>
                  </div>

                  <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                    <!-- Profile Edit Form -->
                    <form method="POST" action="{{ route('update_patient', [ 'id' => $patient['id'] ]) }}" enctype="multipart/form-data">
                      @csrf
                      @method('PUT')

                     
                      <div class="row mb-3">
                        <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                        <div class="col-md-8 col-lg-9">
                          <img src="{{$patient->photo ? asset('storage/'. $patient->photo) : asset('assets/images/no-image.png') }}" alt="Profile">
                          <div class="pt-2">
                            <input type="file" name="photo" class="form-file">

                            <a href="{{-- route('delete_profile_image') --}}" onclick="return confirm('Are you sure want to delete')" class="btn btn-danger btn-sm" title="Remove my profile image"><i class="bi bi-trash"></i></a>
                          </div>
                        </div>
                      </div>

                      <div class="row mb-3">
                        <label for="firstname" class="col-md-4 col-lg-3 col-form-label">First Name</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="firstname" type="text" class="form-control" id="firstname" value="{{ $patient->firstname }}">
                        </div>
                        @error('firstname')
                              <p class="text-danger"> {{ $message }}</p>
                        @enderror
                      </div>

                      <div class="row mb-3">
                        <label for="firstname" class="col-md-4 col-lg-3 col-form-label">Last Name</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="lastname" type="text" class="form-control" id="lastname" value="{{ $patient->lastname}}">
                        </div>
                        @error('lastname')
                              <p class="text-danger"> {{ $message }}</p>
                         @enderror
                      </div>

                      <div class="row mb-3">
                        <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Phone</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="phone" type="text" class="form-control" id="Phone" value="{{ $patient->phone ?? ''}}" placeholder="{{ $patient->phone ?? 'Your telephone' }}">
                          @error('phone')
                              <p class="text-danger"> {{ $message }}</p>
                          @enderror
                        </div>
                      </div>

                      <div class="row mb-3">
                        <label for="address" class="col-md-4 col-lg-3 col-form-label">Phone</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="address" type="text" class="form-control" id="address" value="{{ $patient->address ?? ''}}" placeholder="{{ $patient->phone ?? 'Your telephone' }}">
                          @error('address')
                              <p class="text-danger"> {{ $message }}</p>
                          @enderror
                        </div>
                      </div>

                      <div class="text-center">
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                      </div>
                    </form><!-- End Profile Edit Form -->
                  </div>

                  <div class="tab-pane fade profile-edit pt-3" id="history">
                    @if(count($appointments) > 0);
                      <table class="table">
                        <thead class="thead-dark">
                          <tr>
                            <th scope="col">S/N</th>
                            <th scope="col">Appointment Date</th>
                            <th scope="col">Doctors</th>
                            <th scope="col">Created at</th>
                            <th scope="col"></th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($appointments as $appointment)
                          <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ $appointment['appointment_date'] }}</td>
                            <td>{{ $appointment['doctor'] ? 'Dr.' . $appointment['doctor']['firstname'] . $appointment['doctor']['lastname'] : 'No Doctor' }}</td>
                            <td>
                              {{ $appointment['created_at'] }}
                            </td>
                            <td>
                              <a href="{{ route('appointment_details', [ 'id' => $appointment['id'] ]) }} ">Details</a>
                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                    @else
                      <p class="muted text-center">No record found</p>
                    @endif
                  </div>

                  <div class="tab-pane fade profile-edit pt-4" id="addcomment">
                    <h5>Comment: </h5>
                  <form method="POST" action="{{ route('store_appointment') }}">
                      @csrf
                       <input type="hidden" name="patient_id" value="{{ $patient['id'] }}">
                      <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                      <div class="pt-2">
                        @error('comment')
                        <p>{{ $message }}</p>
                        @enderror
                        <label for="comment" class="form-label">Add comment:</label>
                        <textarea id="comment" class="form-control" name="comment">{{ old('comment') }}</textarea>
                      </div>
                      
                      <div class="d-flex justify-content-around mt-3">
                        <div class="col-6 pt-2">

                          <label for="appointment_date" class="form-label">Next Appointment Date</label>
                          <input type="date" class="form-date" name="appointment_date" value="{{ old('appointment_date') }}" id="appointment_date">
                          @error('appointment_date')
                          <p>{{ $message }}</p>
                          @enderror
                        </div>
                        <div class="col-6 pt-2">
                          <label for="appointment_time" class="form-label">Next Appointment Time</label>
                          <input type="time" value="{{ old('appointment_time') }}" class="form-time" name="appointment_time" id="appointment_time">
                        </div>
                        @error('appointment_time')
                        <p>{{ $message }}</p>
                        @enderror
                      </div>
                      
                      <div class="text-center mt-5">
                        <button type="submit" class="btn btn-info text-light">Save</button>
                      </div>
                    </form>
                  </div>

                </div><!-- End Bordered Tabs -->

              </div>
            </div>

          </div>
        </div>
  </section>
@endsection