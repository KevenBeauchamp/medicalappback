<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Appointment::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = Validator::make(
            $request->all(),[
                'patient_id' => 'nullable|int',
                'doctor_id'  => 'nullable|int',
                'date_time'        => 'nullable|date',
                'status'     => 'nullable|in:scheduled,completed,cancelled',
                'reason'      => 'nullable|string|max:15',    
            ]
            );
        if($validate->fails()){
            return response()->json(['errors'=>$validate->errors()],422);
        }
        $patient = Appointment::create($request->all());
        return response()->json($patient,201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Appointment::find($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $appointment = Appointment::find($id);

        if (! $appointment) {
            return response()->json(['message' => 'Patient not found'], 404);
        }
        $validate = Validator::make(
            $request->all(),[
                 'patient_id' => 'nullable|int',
                'doctor_id'  => 'nullable|int',
                'date_time'        => 'nullable|date',
                'status'     => 'nullable|in:scheduled,completed,cancelled',
                'reason'      => 'nullable|string|max:15', 
            ]
            );
        
        if($validate->fails()){
            return response()->json(['errors'=>$validate->errors()],422);
        }
        $appointment->update($request->all());
        return response()->json($appointment,200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $appointment = Appointment::find($id);

        if (! $appointment) {
            return response()->json(['message' => 'Patient not found'], 404);
        }

        $appointment->delete();

        return response()->json(['message' => 'appointment deleted successfully'], 200);
    }
}
