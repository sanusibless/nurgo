{{--
@extends('admin.layout')
@section('content')
  <section class="section">
    <table class="table">
      <thead class="thead-dark">
        <tr>
          <th scope="col">s/n</th>
          <th scope="col">Appointment Date</th>
          <th scope="col"></th>
          <th scope="col">Last Name</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
    <tbody>
      @foreach($appointments as $appointment)
      <tr>
        <td>{{ $loop->index + 1 }}</td>
        <td>{{ $appointment['appointment_date'] }}</td>
        <td>{{ $appointment['lastname'] }}</td>
        <td>
          <a href="{{ route('view_appointment', [ 'id' => $appointment['id'] ]) }}" class="btn btn-outline-dark">view</a>
          <a href="{{-- route('history_appointment', [ 'id' => $doctor['id'] ]) --}}" class="btn btn-outline-info">history</a>
          <form class="d-inline" method="POST" action="{{ route('delete_appointment', [ 'id' => $appointment['id'] ]) }}">
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
    

  </section>
@endsection

--}}