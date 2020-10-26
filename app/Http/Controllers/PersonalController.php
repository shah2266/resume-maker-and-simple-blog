<?php

namespace App\Http\Controllers;

use App\Personal;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class PersonalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $personal = Personal::first();
        return view('admin.resume.personal.index', compact('personal'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $personal = new Personal();
        return view('admin.resume.personal.create', compact('personal'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $personal = Personal::create($this->validateRequest());

        $this->storedImage($personal);

        return redirect('control/resume/personal')->with('success', 'Personal info added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function show(Personal $personal)
    {
        dd('test');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function edit(Personal $personal)
    {
        return view('admin.resume.personal.edit', compact('personal'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Personal $personal)
    {

        //Delete previous image from directory
        if(request()->hasFile('image')) {
            //$getImage = DB::table('companies')->where('id', '=', $company->id)->select('image')->first();
            Storage::delete('public/' . $personal->image);
        }

        //Delete previous image from directory
        if(request()->hasFile('bg_image')) {
            Storage::delete('public/' . $personal->bg_image);
        }

        //Delete previous image from directory
        if(request()->hasFile('file')) {
            Storage::delete('public/' . $personal->file);
        }

        $personal->update($this->validateRequest());
        $this->storedImage($personal);

        return redirect('control/resume/personal')->with('success','Personal info updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Personal $personal)
    {
        //
    }

    public function validateRequest() {
        return tap(request()->validate([
            'bg_image'      => 'nullable|mimes:jpeg,jpg,png,gif|max:2048',
            'file'          => 'nullable|mimes:docx,doc,pdf',
            'image'         => 'nullable|mimes:jpeg,jpg,png,gif|max:2048',
            'name'          => 'required|string|max:100',
            'email'         => 'required|string|max:100',
            'contact'       => 'required',
            'address'       => 'required|string',
            'objective'     => 'nullable',
            'summary'       => 'required',
            'keywords'      => 'required|max:150',
            'skills'        => 'required'
        ]), function () {

            if(request()->method() == 'POST'){
                request()->validate([
                    'image'     => 'required|mimes:jpeg,jpg,png,gif|max:2048',
                    'bg_image'  => 'required|mimes:jpeg,jpg, png, gif|max:2048',
                ]);
            }

        });
    }


    public function storedImage($personal) {
        if(request()->hasFile('image')){
            $personal->update([
                'image' => request()->file('image')->store('resume','public'),
            ]);
            Image::make(public_path('storage/'.$personal->image))->resize(200,210)->save();
        }

        if(request()->hasFile('bg_image')){
            $personal->update([
                'bg_image' => request()->file('bg_image')->store('resume','public'),
            ]);
            Image::make(public_path('storage/'.$personal->bg_image))->resize(1920,1080)->save();
        }

        if(request()->hasFile('file')){
            $personal->update([
                'file' => request()->file('file')->store('resume','public'),
            ]);
        } else {
            if(request()->method() == 'POST') {
                $personal->update([
                    'file' => 'null',
                ]);
            }
        }
    }

}
