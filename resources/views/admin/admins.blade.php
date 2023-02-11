@extends('admin.layout')
@section('content')
<div>

  <div class="d-flex justify-content-end mb-5"><button data-toggle="modal" class="btn btn-outline-dark" data-target="#exampleModal">Create Admin</button></div>
         <div class="d-block">
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create Admin</h5>
              </div>
              <div class="modal-body">
                  <form action="{{ route('store_admin') }}" method="POST" enctype="multipart/form-data">
                                   @csrf

                                   <input type="hidden" value="1" name='role'>
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

                                   <div>

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
                                     @error('office_num')
                                        <small class="text-danger">
                                          {{ $message }}
                                        </small>
                                      @enderror
                                      <input type="number" id="officeNum" class="form-control" name="office_num" placeholder="Office Number">
                                   </div>
                                   <div class="mb-2">
                                      <input type="file" id="profile_image" class="form-control" name="photo">
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
      @foreach($admins as $admin)
      <tr>
        <td>{{ $loop->index + 1 }}</td>
        <td><img style="width: 40px; height: auto; border-radius: 50%; " src="{{ $admin['photo'] ? asset('storage/'. $admin['photo']) : asset('assets/images/no-image.png')  }}" alt="{{ $admin['profile_image'] }}"></td>
        <td>{{ $admin['firstname'] }}</td>
        <td>{{ $admin['lastname'] }}</td>
        <td>
          <a href="{{ route('view_admin', [ 'id' => $admin['id'] ]) }}" class="btn btn-outline-dark">view</a>
          <form class="d-inline" method="POST" action="{{ route('delete_admin', [ 'id' => $admin['id'] ]) }}">
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