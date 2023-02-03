<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Http\Resources\V1\AppointmentResource;
use App\Http\Resources\V1\AppointmentCollection;
use App\Filters\V1\AppointmentsFilter;
use App\Http\Requests\V1\StoreAppointmentRequest;

class AppointmentsApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        $filters = new AppointmentsFilter();

        $filterItems = $filters->transform($request);

        if(count($filterItems) == 0 ) {
         return new AppointmentCollection(Appointment::paginate());
        } else {
            $appointment = Appointment::where($filterItems)->paginate();

         return new AppointmentCollection($appointment->appends($request->query()));
        }
    }
   
    public function store(StoreAppointmentRequest $request)
    {
        return new AppointmentResource(Appointment::create($request->all()));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Appointment $appointment)
    {
        return new AppointmentResource($appointment);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
