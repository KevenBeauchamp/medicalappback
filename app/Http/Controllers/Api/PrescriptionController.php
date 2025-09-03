<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Prescription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PrescriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Prescription::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $validate = Validator::make(
            $request->all(),[
                'medication' => 'nullable|string',
                'dosage'  => 'nullable|string',
                'instructions'        => 'nullable|string',
                'appointment_id'     => 'nullable|int',
            ]
            );
        if($validate->fails()){
            return response()->json(['errors'=>$validate->errors()],422);
        }
        $prescription = Prescription::create($request->all());
        return response()->json($prescription,201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Prescription::find($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $prescription = Prescription::find($id);

        if (! $prescription) {
            return response()->json(['message' => 'Patient not found'], 404);
        }
        $validate = Validator::make(
            $request->all(),[
                'instructions' => 'nullable|string',
                'medication'  => 'nullable|string',
                'dosage'        => 'nullable|string',
                'appointment_id'      => 'nullable|int',
            ]
            );
        
        if($validate->fails()){
            return response()->json(['errors'=>$validate->errors()],422);
        }
        $prescription->update($request->all());
        return response()->json($prescription,200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $prescription = Prescription::find($id);

        if (! $prescription) {
            return response()->json(['message' => 'Patient not found'], 404);
        }

        $prescription->delete();

        return response()->json(['message' => 'Patient deleted successfully'], 200);
    }
}
