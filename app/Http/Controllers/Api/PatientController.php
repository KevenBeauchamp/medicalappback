<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use function PHPUnit\Framework\returnSelf;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Patient::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = Validator::make(
            $request->all(),[
                'first_name' => 'required|string|max:50',
                'last_name'  => 'required|string|max:50',
                'dob'        => 'required|date',
                'gender'     => 'required|in:Male,Female',
                'phone'      => 'nullable|string|max:15',
                'email'      => 'nullable|email|max:100|unique:patients,email',
                'address'    => 'nullable|string',     
            ]
            );
        if($validate->fails()){
            return response()->json(['errors'=>$validate->errors()],422);
        }
        $patient = Patient::create($request->all());
        return response()->json($patient,201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
        return Patient::find($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $patient = Patient::find($id);

        if (! $patient) {
            return response()->json(['message' => 'Patient not found'], 404);
        }
        $validate = Validator::make(
            $request->all(),[
                'first_name' => 'sometimes|string|max:50',
                'last_name'  => 'sometimes|string|max:50',
                'dob'        => 'sometimes|date',
                'gender'     => 'sometimes|in:Male,Female',
                'phone'      => 'nullable|string|max:15',
                'email'      => 'nullable|email|max:100|unique:patients,email,' . $id,
                'address'    => 'nullable|string', 
            ]
            );
        
        if($validate->fails()){
            return response()->json(['errors'=>$validate->errors()],422);
        }
        $patient->update($request->all());
        return response()->json($patient,200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $patient = Patient::find($id);

        if (! $patient) {
            return response()->json(['message' => 'Patient not found'], 404);
        }

        $patient->delete();

        return response()->json(['message' => 'Patient deleted successfully'], 200);
    }
    
}
