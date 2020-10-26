<?php

namespace App\Http\Controllers;

use App\Training;
use Illuminate\Http\Request;

class TrainingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trainings = Training::all();
        return view('admin.resume.training.index', compact('trainings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $training = new Training();
        return view('admin.resume.training.create', compact('training'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Training::create($this->validateRequest());

        return redirect('control/resume/training')->with('success', 'New training record added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Training  $training
     * @return \Illuminate\Http\Response
     */
    public function show(Training $training)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Training  $training
     * @return \Illuminate\Http\Response
     */
    public function edit(Training $training)
    {
        return view('admin.resume.training.edit', compact('training'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Training  $training
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Training $training)
    {
        $training->update($this->validateRequest());

        return redirect('control/resume/training')->with('success', 'Training record updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Training  $training
     * @return \Illuminate\Http\Response
     */
    public function destroy(Training $training)
    {
        $training->delete();

        return redirect('control/resume/training')->with('success', 'Training deleted!');
    }


    public function validateRequest() {
        return request()->validate([
            'training_title'    => "required|string|max:120",
            'topics_covered'    => 'nullable|string|max:255',
            'institute'         => 'required|string|max:120',
            'address'           => 'nullable|string|max:120',
            'training_Year'     => 'required|string|max:20',
            'duration'          => 'nullable|string|max:20',
        ]);
    }
}
