<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Doctor::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = Validator::make(
            $request->all(),[
                'specialty' => 'required|string|max:150',
                'license_number'  => 'required|string|max:150',    
            ]
            );
        if($validate->fails()){
            return response()->json(['errors'=>$validate->errors()],422);
        }
        $doctor = Doctor::create($request->all());
        return response()->json($doctor,201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Doctor::find($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $doctor = Doctor::find($id);

        if (! $doctor) {
            return response()->json(['message' => 'Patient not found'], 404);
        }
        $validate = Validator::make(
            $request->all(),[
                'specialty' => 'nullable|string',
                'license_number'  => 'nullable|string',
            ]
            );
        
        if($validate->fails()){
            return response()->json(['errors'=>$validate->errors()],422);
        }
        $doctor->update($request->all());
        return response()->json($doctor,200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $doctor = Doctor::find($id);

        if (! $doctor) {
            return response()->json(['message' => 'Patient not found'], 404);
        }

        $doctor->delete();

        return response()->json(['message' => 'Doctor deleted successfully'], 200);
    }
}
