@extends('admin.layout')
@section('content')
<div>

  <div class="d-flex justify-content-end mb-5"><button data-toggle="modal" class="btn btn-outline-dark" data-target="#exampleModal">Create Patient</button></div>
         <div class="d-block">
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create Patient</h5>
              </div>
              <div class="modal-body">
                  <form action="{{ route('store_patient') }}" method="POST">
                                   @csrf
                                   <input type="hidden" value="{{ auth()->user()->id }}" name='user_id'>
                                   <div class="mb-2">
                                     @error('firstname')
                                        <small class="text-danger">s
                                          {{ $message }}
                                        </small>
                                      @enderror
                                      <input type="text" id="firstname" class="form-control" name="firstname" placeholder="First Name" value="{{ old('firstname')}}">
                                     
                                   </div>
                                   <div class="mb-2">
                                     @error('lastname')
                                        <small class="text-danger">
                                          {{ $message }}
                                        </small>
                                      @enderror
                                      <input type="text" id="lastname" class="form-control" name="lastname" placeholder="Last Name" value="{{ old('lastname')}}">
                                     
                                   </div>

                                   <div class="mb-2">
                                     @error('email')
                                        <small class="text-danger">
                                          {{ $message }}
                                        </small>
                                      @enderror
                                      <input type="email" id="email" class="form-control" name="email" placeholder="Email" value="{{ old('email')}}">
                                     
                                   </div>

                                   <div>

                                   <div class="mb-2">
                                     @error('phone')
                                        <small class="text-danger">
                                          {{ $message }}
                                        </small>
                                      @enderror
                                      <input type="tel" id="phone" class="form-control" name="phone" placeholder="Phone Number" value="{{ old('phone')}}">
                                     
                                   </div>

                                   <div class="mb-2">
                                     @error('address')
                                        <small class="text-danger">
                                          {{ $message }}
                                        </small>
                                      @enderror
                                      <input type="text" id="address" class="form-control" name="address" placeholder="Address" value="{{ old('address')}}">
                                     
                                   </div>
                                   <div class="mt-4 text-center">
                                      <button type="submit" class="btn btn-info text-light">
                                         Create
                                      </button>
                                   </div>
                                </form>
                              </div>
                          </div>
                        </div>
          </div>
        </div>
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
      @foreach($patients as $patient)
      <tr>
        <td>{{ $loop->index + 1 }}</td>
        <td><img style="width: 40px; height: auto; border-radius: 50%; " src="{{ $patient['photo'] ? asset('storage/'. $patient['photo']) : asset('assets/images/no-image.png')  }}" alt="{{ $patient['profile_image'] }}"></td>
        <td>{{ $patient['firstname'] }}</td>
        <td>{{ $patient['lastname'] }}</td>
        <td>
          <a href="{{ route('view_patient', [ 'id' => $patient['id'] ]) }}" class="btn btn-outline-dark">view</a>
          <form class="d-inline" method="POST" action="{{ route('delete_patient', [ 'id' => $patient['id'] ]) }}">
            @csrf
            @method('DELETE')
            <button type='submit' class="btn btn-danger" onclick="return confirm('Are you sure?')">
              delete
            </button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>

@endsection