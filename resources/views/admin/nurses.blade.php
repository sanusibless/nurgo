@extends('admin.layout')
@section('content')
<div>

@if(auth()->user()->role == 1)
  <div class="d-flex justify-content-end mb-5"><button data-toggle="modal" class="btn btn-outline-dark" data-target="#exampleModal">Create A Nurse</button></div>
         <div class="d-block">
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create A Nurse</h5>
              </div>
              <div class="modal-body">
                  <form action="{{ route('store_nurse') }}" method="POST" enctype="multipart/form-data">
                                   @csrf
                                   <input type="hidden" value="3" name='role'>
                                   <div>
                                      <div class="mb-2">
                                       @error('firstname')
                                          <small class="text-danger">s
                                            {{ $message }}
                                          </small>
                                        @enderror
                                        <input type="text" id="firstname" class="form-control" name="firstname" placeholder="First Name">
                                     </div>
                                     <div class="mb-2">
                                       @error('lastname')
                                          <small class="text-danger">
                                            {{ $message }}
                                          </small>
                                        @enderror
                                        <input type="text" id="lastname" class="form-control" name="lastname" placeholder="Last Name">
                                     </div>

                                     <div class="mb-2">
                                       @error('email')
                                          <small class="text-danger">
                                            {{ $message }}
                                          </small>
                                        @enderror
                                        <input type="email" id="email" class="form-control" name="email" placeholder="Email">
                                     </div>
                                     <div class="mb-2">
                                       @error('password')
                                          <small class="text-danger">
                                            {{ $message }}
                                          </small>
                                        @enderror
                                        <input type="password" id="password" class="form-control" name="password" placeholder="password">
                                     </div>

                                     <div class="mb-2">
                                       @error('password_confirmation')
                                          <small class="text-danger">
                                            {{ $message }}
                                          </small>
                                        @enderror
                                        <input type="password" id="password_confirmation" class="form-control" name="password_confirmation" placeholder="Confirm Password">
                                     </div>
                                     <div class="mb-2">
                                       @error('phone')
                                          <small class="text-danger">
                                            {{ $message }}
                                          </small>
                                        @enderror
                                        <input type="tel" id="phone" class="form-control" name="phone" placeholder="Phone Number">
                                     </div>
                                     <div class="mb-2">
                                       @error('date_of_birth')
                                          <small class="text-danger">s
                                            {{ $message }}
                                          </small>
                                        @enderror
                                        <label for="date_of_birth">DOB:</label>
                                        <input type="date" id="date_of_birth" class="form-control" name="date_of_birth">
                                     </div>
                                        <input type="hidden" name="specialty" value="General">
                                     <div class="mb-2">
                                        <input type="file" id="profile_image" class="form-control" name="photo">
                                     </div>
                                     <div class="mt-4 text-center">
                                        <button type="submit" class="btn btn-info text-light">
                                           Create
                                        </button>
                                     </div>
                                  </div>
                                   <div>
                                    <fieldset>
                                      <legend>Address</legend>
                                      <div class="mb-2">
                                       @error('address1')
                                          <small class="text-danger">
                                            {{ $message }}
                                          </small>
                                        @enderror
                                        <input type="text" id="address" class="form-control" name="address" placeholder="Address 1">
                                     </div>
                                     <div class="mb-2">
                                       @error('address2')
                                          <small class="text-danger">s
                                            {{ $message }}
                                          </small>
                                        @enderror
                                        <input type="text" id="address2" class="form-control" name="address2" placeholder="Address 2">
                                     </div>
                                     <div class="mb-2">
                                       @error('city')
                                          <small class="text-danger">s
                                            {{ $message }}
                                          </small>
                                        @enderror
                                        <input type="text" id="city" class="form-control" name="city" placeholder="City">
                                     </div>
                                     <div class="mb-2">
                                       @error('postal_code')
                                          <small class="text-danger">s
                                            {{ $message }}
                                          </small>
                                        @enderror
                                        <input type="text" id="postal_code" class="form-control" name="postal_code" placeholder="Postal Code">
                                     </div>
                                    </fieldset>
                                    <fieldset>
                                      <legend>Education</legend>
                                      <div class="mb-2">
                                       @error('school')
                                          <small class="text-danger">s
                                            {{ $message }}
                                          </small>
                                        @enderror
                                        <label for="School">School</label>
                                        <input type="text" id="school" class="form-control" name="school" placeholder="school">
                                     </div>
                                     <div class="mb-2">
                                       @error('degree')
                                          <small class="text-danger">s
                                            {{ $message }}
                                          </small>
                                        @enderror
                                        <label for="degree">Degree</label>
                                        <select name="degree" form="select">
                                          <option value="PhD">PhD</option>
                                          <option value="Master">Master</option>
                                          <option value="Bachelor's/HND" selected>Bachelor's/HND</option>
                                          <option value="NCE/ND">NCE/ND</option>
                                        </select>
                                     </div>
                                     <div class="row">
                                          <div class="col-6 mb-2">
                                       @error('degree')
                                          <small class="text-danger">s
                                            {{ $message }}
                                          </small>
                                        @enderror
                                      <label for="year_of_admin" class="mr-2">Year of Admission: </label>
                                      <input type="date" class="form-date" name="year_of_admin">
                                     </div>

                                     <div class="col-6 mb-2">
                                       @error('degree')
                                          <small class="text-danger">s
                                            {{ $message }}
                                          </small>
                                        @enderror
                                      <label for="year_of_admin" class="mr-2">Year of Graduation: </label>
                                      <input type="date" class="form-date" name="year_of_grad">
                                     </div>  
                                     </div>
                                    </fieldset>
                                    <fieldset>
                                      <legend>Licensing</legend>
                                      <div class="col-6 mb-2">
                                       @error('license_num')
                                          <small class="text-danger">s
                                            {{ $message }}
                                          </small>
                                        @enderror
                                      <label for="license_num"class="mr-2">License Number</label>
                                      <input type="number" class="form-control" name="license_num">
                                     </div>
                                     <div class="col-6 mb-2">
                                       @error('license_expire_date')
                                          <small class="text-danger">s
                                            {{ $message }}
                                          </small>
                                        @enderror
                                      <label for="license_expire_date"class="mr-2">License Number</label>
                                      <input type="date" class="form-control" name="license_expire_date">
                                     </div>
                                     <div class="col-6 mb-2">
                                       @error('license')
                                          <small class="text-danger">s
                                            {{ $message }}
                                          </small>
                                        @enderror
                                      <label for="license"class="mr-2">License Number</label>
                                      <input type="file" class="form-control" name="license">
                                     </div>
                                    </fieldset>
                                   </div>
                                </form>
                              </div>
            </div>
          </div>
              </div>
          </div>
</div>
@endif

@if(count($nurses) > 0)
  <div class="container" >

     <table class="table">
      <thead class="thead-dark">
        <tr>
          <th scope="col">s/n</th>
          <th scope="col">Profile Image</th>
          <th scope="col">First Name</th>
          <th scope="col">Last Name</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach($nurses as $nurse)
        <tr>
          <td>{{ $loop->index + 1 }}</td>
          <td><img style="width: 40px; height: auto; border-radius: 50%; " src="{{ $nurse['photo'] ? asset('storage/'. $nurse['photo']) : asset('assets/images/no-image.png')  }}" alt="{{ $nurse['profile_image'] }}"></td>
          <td>{{ $nurse['firstname'] }}</td>
          <td>{{ $nurse['lastname'] }}</td>
          <td>
            <a href="{{ route('view_nurse', [ 'id' => $nurse['id'] ]) }}" class="btn btn-outline-dark">view</a>
            @if(auth()->user()->role == 1)
            <form class="d-inline" method="POST" action="{{ route('delete_nurse', [ 'id' => $nurse['id'] ]) }}">
              @csrf
              @method('DELETE')
              <button type='submit' class="btn btn-danger" onclick="return confirm('Are you sure?')">
                delete
              </button>
            </form>
            @endif
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@else
  <div class="text-center"><p class="text-muted">No Records</p></div>
@endif

@endsection