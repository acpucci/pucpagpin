<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use Illuminate\Http\Request;
use App\Mail\SendStorePersona;
use Illuminate\Support\Facades\Mail;

class PersonaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Select * FROM personas WHERE delete_at IS NULL

        $personas = Persona::all();

        return response()->json([
            'mensaje' => 'Applicants List',
            'data' => $personas
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|unique:personas,email|max:255',
            'phone' => 'required|max:15',
            'message' => 'required|max:500',
        ]);

        $persona = Persona::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'phone' => $request['phone'],
            'message' => $request['message'],
        ]);

        //email
        $details = [
            'name' => $persona->name,
            'email' => $persona->email,
        ];

        Mail::to('andreacpucci@gmail.com')->send(new SendStorePersona($details));
        
        return response()->json([
            'message' => 'Thank you! Your information has been received.',
            'data' =>$persona
        ]);

    }

    /**
     * Display the specified resource.
     */
    public function show(Persona $persona)

    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Persona $persona)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Persona $persona)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Persona $persona)
    {
        //
    }
}
?>