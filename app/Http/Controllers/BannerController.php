<?php

namespace App\Http\Controllers;

use App\Banner;
use App\BannerType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;


class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bannerType = BannerType::first();
        $sliders    = Banner::Slider()->get();
        $images     = Banner::Image()->get();

        return view('admin.banner.index', compact('sliders','images', 'bannerType'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $banner = new Banner();
        return view('admin.banner.create', compact('banner'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $banner = Banner::create($this->validateRequest());
        $this->storeImage($banner);

        return redirect('/control/banner/')->with('success', 'Banner add successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function show(Banner $banner)
    {
        return view('admin.banner.show', compact('banner'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function edit(Banner $banner)
    {
        return view('admin.banner.edit', compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Banner $banner)
    {
        if(request()->hasFile('image')) {
            Storage::delete('public/'.$banner->image);
        }

        $banner->update($this->validateRequest());
        $this->storeImage($banner);

        return redirect('/control/banner/')->with('success', 'Content updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Banner $banner)
    {
        $banner = Banner::where('status','!=', 1)->where('id', request()->banner_id)->first();

        if(!is_null($banner)) {
            $banner->delete();
            unlink(public_path('storage/'. $banner->image));

            return redirect('control/banner')->with('success', 'Banner deleted!');
        } else {
            return redirect('control/banner')->with('danger', 'Delete operation dosen\'t work for active value');
        }
    }


    private function validateRequest() {
        return tap(request()->validate([
            'name'          => 'required|string',
            'short_info_1'  => 'nullable',
            'short_info_2'  => 'nullable',
            'button1_label' => 'nullable',
            'button1_link'  => 'nullable',
            'button2_label' => 'nullable',
            'button2_link'  => 'nullable',
            'banner_type'   => 'required|numeric',
            'status'        => 'required',
            'image'         => 'sometimes|mimes:jpeg,jpg,png|max:2048',
        ]), function () {
            if(request()->method() == 'POST') {
                request()->validate([
                    'name'  => 'required|unique:banners',
                    'image' => 'required|mimes:jpeg,jpg,png|max:2048',
                ]);
            }
        });
    }

    private function storeImage ($banner) {
        if(request()->hasFile('image')) {
            $banner->update([
                'image' => request()->file('image')->store('banner', 'public'),
            ]);
            Image::make(public_path('storage/'. $banner->image))->resize(1920, 1080)->save();
        }
    }


    public function bannerActive(Request $request) {
        $bannerType = BannerType::find($request->request_id);
        $bannerType->active_value = $request->banner_type;
        $bannerType->status = $request->status;
        $bannerType->save();
        return redirect('control/banner')->with('success', 'Status change successfully!');
        //return response()->json(['success'=>'Status change successfully.']);
    }
}
