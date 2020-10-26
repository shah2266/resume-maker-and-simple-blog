<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use DB;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $companies  = Company::all();
        return  view('admin.company.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $company = new Company();
        return view('admin.company.create', compact('company'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $company = Company::create($this->validateRequest());
        $this->storeImage($company);
        $this->publish($company);

        return redirect('/control/company')->with('success', 'Company add successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        /*$company = Company::find($company);
        $company = Company::where('id', $company)->firstOrFail();*/

        return view('admin.company.show', compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        return view('admin.company.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
        //Delete previous image from directory
        if(request()->hasFile('image')){
            //$getImage = DB::table('companies')->where('id', '=', $company->id)->select('image')->first();
            Storage::delete('public/'.$company->image);
        }

        $company->update($this->validateRequest());
        $this->storeImage($company);
        $this->publish($company);

        return redirect('control/company/'. $company->id)->with('success', 'Company updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        $company = Company::where('status','!=', 1)->where('id', request()->company_id)->first();

        if(!is_null($company)) {
            $company->delete();

            $path = 'storage/'.$company->image;

            if(file_exists($path)) {
                unlink(public_path($path));
            }

            return redirect('control/company')->with('success', 'Company deleted!');

        } else {
            return redirect('control/company')->with('danger', 'Delete operation doesn\'t work for active value');
        }

    }

    //Request validation
    private function validateRequest() {
        return tap(request()->validate([
            'company_name'          => "required|string|max:100",
            'address'               => 'required|string|max:120',
            'email'                 => 'required|string|max:50',
            'phone'                 => 'nullable|numeric',
            'telephone'             => 'nullable|numeric',
            'help_line'             => 'nullable|numeric',
            'copy_right_text'       => 'required|string|max:120',
            'social_link_icon_1'    => 'nullable',
            'social_link_icon_2'    => 'nullable',
            'social_link_icon_3'    => 'nullable',
            'social_link_icon_4'    => 'nullable',
            'social_link_icon_5'    => 'nullable',
            'social_link1'          => 'nullable',
            'social_link2'          => 'nullable',
            'social_link3'          => 'nullable',
            'social_link4'          => 'nullable',
            'social_link5'          => 'nullable',
            'latitude'              => 'nullable|numeric',
            'longitude'             => 'nullable|numeric',
            'map_content'           => 'nullable|string|max:120',
            'image'                 => 'nullable|mimes:jpeg,jpg,png|max:2048',
            'status'                => 'nullable',

        ]), function () {
            if(request()->method() == 'POST') {
                request()->validate([
                    'company_name'  => 'required|unique:companies',
                ]);
            }
        });
    }

    //Store image
    private function  storeImage($company) {

        if (request()->hasFile('image')) {
            $company->update ([
                'image' => request()->file('image')->store('company','public'),
            ]);
            Image::make(public_path('storage/'.$company->image))->resize(300,102)->save();
        }
    }

    //Only single company publish and others unpublished
    public function publish($company) {

        if(request()->status == '1') {
            Company::where('id', '!=', $company->id)->update(['status' => 0]);
        }

    }

}
