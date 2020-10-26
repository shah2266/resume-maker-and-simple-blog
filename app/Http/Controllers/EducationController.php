<?php

namespace App\Http\Controllers;

use App\Education;
use Illuminate\Http\Request;

class EducationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $educations = Education::all();
        return view('admin.resume.education.index', compact('educations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $education = new Education();
        return view('admin.resume.education.create', compact('education'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Education::create($this->validateRequest());
        return redirect('/control/resume/education')->with('success', 'education add successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Education  $education
     * @return \Illuminate\Http\Response
     */
    public function show(Education $education)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Education  $education
     * @return \Illuminate\Http\Response
     */
    public function edit(Education $education)
    {
        return view('admin.resume.education.edit', compact('education'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Education  $education
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Education $education)
    {
        $education->update($this->validateRequest());

        return redirect('control/resume/education')->with('success','Education fields updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Education  $education
     * @return \Illuminate\Http\Response
     */
    public function destroy(Education $education)
    {
        $education->delete();
        return redirect('control/resume/education')->with('success','Delete!!');
    }


    public function validateRequest() {
        return request()->validate([
            'degree_title'      => "required|string",
            'grade_point'       => 'nullable|string|max:120',
            'concentration'     => 'required|string|max:120',
            'institute_name'    => 'required|string|max:120',
            'year_of_passing'   => 'nullable|string|max:20',
            'duration'          => 'nullable|string|max:20',
            'thesis'            => 'nullable|string|max:255',
            'achievement'       => 'nullable|string|max:255',
        ]);
    }
}
