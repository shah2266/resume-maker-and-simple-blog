<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Tag;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;


class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function index(Request $request)
    {

        if ($request->ajax()) {

            $data = Tag::latest()->get();

            $table = DataTables::of($data);

            $table->addIndexColumn();
            $table->addColumn('action', function ($row){
                $actionBtn = '<div class="margin"><div class="btn-group">
                                <button type="button" class="dropdown-toggle" data-toggle="dropdown">
                                    <span class="fa fa-ellipsis-h"></span>
                                    <span class="sr-only">Toggle Dropdown</span>
                                </button>';
                $actionBtn .= '<ul class="dropdown-menu dropdown-menu-right" role="menu">';
                $actionBtn .= '<li>
                                    <a href="javascript:void(0)" id="edit-tag" data-id="'.$row->id.'"><i class="fa fa-pencil"></i> Edit this info</a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)" id="delete-tag" data-id="'.$row->id.'" class="delete-tag"><i class="fa fa-trash"></i> Delete this info</a>
                                </li>';
                $actionBtn .= '</ul>';
                $actionBtn .= '</div></div>';
                return $actionBtn;

            });

            $table->rawColumns(['action']);
            return $table->make(true);
        }

        return view('admin.blog.tag.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $slug = $request->get('slug');
        $data = Tag::where('slug', $slug)->count();

        if($request->get('submit') == 'create') {
            if($data > 0 ) {
                return response()->json(['unique'=>$data]);
            } else {
                return response()->json($this->insert($request));
            }
        } else {
            return response()->json($this->insert($request));
        }
    }

    public function insert($request) {
        $tagID = $request->tag_id;
        return Tag::updateOrCreate(['id' => $tagID],
            [
                'name' => $request->name,
                'slug' => Str::slug($request->slug),
                'description' => $request->description,
            ]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $where = array('id' => $id);
        $tag  = Tag::where($where)->first();
        return response()->json($tag);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tag = Tag::where('id',$id)->delete();
        return response()->json($tag);
    }
}
