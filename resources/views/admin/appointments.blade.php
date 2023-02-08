@extends('admin.layout')
@section('content')


<div class="container" >
   <table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">s/n</th>
        <th scope="col">First Name</th>
        <th scope="col">Last Name</th>
        <th scope="col">Date</th>
        <th scope="col">Description</th>
        <th scope="col">Status</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      @for($i = 0, $j = $i+1; $i < count($appointments); $i++ )
      <tr>
        <th scope="row">{{ $j++ }}</th>
        <td>{{$appointments[$i]['firstname']}}</td>
        <td>{{$appointments[$i]['lastname']}}</td>
        <td>{{$appointments[$i]['date']}}</td>
        <td>{{$appointments[$i]['description']}}</td>
        <td>{{$appointments[$i]['status']}}</td>
        <td>
          <div class="d-block">
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Reschedule appointment</h5>
      </div>
      <div class="modal-body">
        <form action="{{ route('reschedule_appointment', ['id' => $appointments[$i]['id'] ]) }}" method="POST">
                           @csrf
                           @method('PUT')
                           <div class="mb-2">
                             @error('date')
                                <small class="text-danger">
                                  {{ $message }}
                                </small>
                              @enderror
                              <input type="date" id="email" class="form-control" name="date" placeholder="Appoinment date">
                             
                           </div>
                           <div class="mb-3 mr-2">
                              <select name="description" class="form-select">
                                @php 
                                  $descs = ['Counselling','Consultation','Diagnosis','Treatment']
                                @endphp

                                @error('date')
                                <small class="text-danger">
                                  {{ $message }}
                                </small>
                              @enderror
                                @foreach($descs as $desc)
                                   <option value="{{ $desc }}" @selected($appointments[$i]['description'] == $desc) >{{ $desc }}</option>
                                @endforeach
                              </select>

                           </div>

                           <div class="mb-2 text-center">
                              <button type="submit" class="btn btn-info text-light">
                                 Update
                              </button>
                           </div>
                        </form>
      </div>
    </div>
  </div>
</div>
          </div>
          <button data-toggle="modal" class="btn btn-outline-dark" data-target="#exampleModal">reschedule</button>
          <form class="d-inline" action="{{ route('cancel_appointment', ['id' => $appointments[$i]['id']]) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" onclick="return confirm('are you sure you want to cancel appointment?')"class="btn btn-danger"> cancel </button> 
          </form>
        </td>
      </tr>
      @endfor
    </tbody>
  </table>
</div>
   <script src="{{asset('assets/js/jquery.min.js')}}"></script>
   <script src="{{asset('assets/js/popper.min.js')}}"></script>
   <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
   <script src="{{asset('assets/js/jquery-3.0.0.min.js')}}"></script>
   <script src="{{asset('assets/js/plugin.js')}}"></script>
   <!-- sidebar -->
   <script src="{{asset('assets/js/jquery.mCustomScrollbar.concat.min.js')}}"></script>
   <script src="{{asset('assets/js/custom.js')}}"></script>
      <script src="//unpkg.com/alpinejs" defer></script>
   <!-- javascript -->
   </body>
 </htm>
@endsection