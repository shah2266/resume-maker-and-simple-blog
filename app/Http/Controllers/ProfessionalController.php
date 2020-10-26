<?php

namespace App\Http\Controllers;

use App\Professional;
use Illuminate\Http\Request;

class ProfessionalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $professionals = Professional::all();
        return view('admin.resume.professional.index', compact('professionals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $professional = new Professional();
        return view('admin.resume.professional.create', compact('professional'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Professional::create($this->validateRequest());

        return redirect('control/resume/professional')->with('success', 'Professional info added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Professional  $professional
     * @return \Illuminate\Http\Response
     */
    public function show(Professional $professional)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Professional  $professional
     * @return \Illuminate\Http\Response
     */
    public function edit(Professional $professional)
    {

        return view('admin.resume.professional.edit', compact('professional'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Professional  $professional
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Professional $professional)
    {
        $professional->update($this->validateRequest());

        return redirect('control/resume/professional')->with('success', 'Professional info updated!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Professional  $professional
     * @return \Illuminate\Http\Response
     */
    public function destroy(Professional $professional)
    {
        $professional->delete();

        return redirect('control/resume/professional')->with('success', 'Record deleted!');

    }
    public function validateRequest() {
        return request()->validate([
            'company_name'      => "required|string|max:120",
            'designation'       => 'required|string|max:120',
            'department'        => 'nullable|string|max:120',
            'responsibilities'  => 'nullable|string',
            'employment_period' => 'nullable|string|max:20',
            'address'           => 'nullable|string|max:120',
        ]);
    }
}
