      @extends('admin.layout')

      @section('content')
        <div class="container col-md-6 mt-5">
            <div class="contact_box">
                  <h1 class="book_text">Book Appoinment</h1>
                      <form action="{{ route('book_appointment') }}" method="POST">
                                 @csrf
                                 <div class="mb-2">
                                    <input type="text" id="firstname" class="form-control" name="firstname" placeholder="First Name" value="{{ auth()->user() ? auth()->user()->firstname : '' }}">
                                 </div>
                                 <div class="mb-2">
                                    <input type="text" id="name" class="form-control" name="lastname" placeholder="Last Name" value="{{ auth()->user() ? auth()->user()->lastname : '' }}">
                                 </div>
                                 <div class="mb-2">
                                    <input type="email" id="email" class="form-control" name="email" placeholder="email" value="{{ auth()->user() ? auth()->user()->email : '' }}" />
                                 </div>
                                 <div class="mb-2">
                                    <input type="date" id="email" class="form-control" name="date" placeholder="Appoinment date" />
                                 </div>
                                 <div class="mb-3 mr-2">
                                    <select name="description" class="form-selet form-select-sm">
                                         <option selected>Choose purpose</option>
                                         <option value="Counselling">Counselling</option>
                                         <option value="Consultation">Consultation</option>
                                         <option value="Diagnosis">Diagnosis</option>
                                         <option value="Treatment">Treatment</option>
                                    </select>
                                 </div>

                                 <div class="mb-2 text-center">
                                    <button class="btn btn-info text-light">
                                       Send
                                    </button>
                                 </div>
                              </form>

                           </div>
                        </div>
      @endsection