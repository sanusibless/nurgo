@extends('admin.layout')
@section('content')

<div class="container" >
    <div>
      <p class="d-flex justify-content-between">
        <span>
          <a href="{{ route('view_patient', [ 'id' => $patient['id'] ]) }}" class="text-info" ><i class="bi bi-arrow-left"></i> Back</a>
        </span>
        <span>Date: {{ $details['appointment_date'] }}</span>
      </p>
      <p>Patient Name: {{ $patient->firstname . " " . $patient->lastname }}</p>
      <p>Doctor: Dr. {{ $doctor->firstname . " " . $doctor->lastname }} ({{ $doctor->specialty }} )</p>
    </div>
    <div>
      <h5> Comments </h5>
      <p class="w-50">{{ $details['comment'] }} </p>
    </div>
</div>

@endsection