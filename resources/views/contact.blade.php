<x-meta-card />
   <x-navbar />
      <div class="contact_section layout_padding margin_90">
         <div class="container">
            <h1 class="contact_taital">What we do</h1>
            <div class="news_section_2">
               <div class="row">
                  <div class="col-md-6">
                     <div class="icon_main">
                        <div class="icon_7"><img src="{{ asset('assets/images/icon-7.png') }}"></div>
                        <h4 class="diabetes_text">Diabetes and obesity Counselling </h4>
                     </div>
                     <div class="icon_main">
                        <div class="icon_7"><img src="{{ asset('assets/images/icon-5.png') }}"></div>
                        <h4 class="diabetes_text">Obstetrics and Gynsecology</h4>
                     </div>
                     <div class="icon_main">
                        <div class="icon_7"><img src="{{ asset('assets/images/icon-6.png') }}"></div>
                        <h4 class="diabetes_text">Surgical and medical Oncology</h4>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="contact_box">
                        <h1 class="book_text">Book Appoinment</h1>
                        
                        <form action="{{-- route('book_appointment') --}}" method="POST">
                           @csrf
                           <div class="mb-2">
                              <input type="text" id="firstname" class="form-control" name="firstname" placeholder="First Name" value="{{ auth()->user() ? auth()->user()->firstname : '' }}">
                           </div>
                           <div class="mb-2">
                              <input type="text" id="name" class="form-control" name="lastname" placeholder="Last Name" value="{{ auth()->user() ? auth()->user()->lastname : '' }}">
                           </div>
                           <div class="mb-2">
                              <input type="email" id="email" class="form-control" name="email" placeholder="email" value="{{ auth()->user() ? auth()->user()->email : '' }}">
                           </div>
                           <div class="mb-2">
                              <input type="date" id="email" class="form-control" name="date" placeholder="Appoinment date">
                           </div>
                           <div class="mb-3 mr-2">
                              <select name="description" class="form-select form-select-sm">
                                   <option selected>Choose purpose</option>
                                   <option value="Counselling">Counselling</option>
                                   <option value="Consultation">Consultation</option>
                                   <option value="Diagnosis">Diagnosis</option>
                                   <option value="Treatment">Treatment</option>
                              </select>
                           </div>

                           <div class="mb-2">
                              <button type="submit" class="btn btn-info">
                                 Send
                              </button>
                           </div>
                        </form>

                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   <x-footer-card />
<x-scripts />