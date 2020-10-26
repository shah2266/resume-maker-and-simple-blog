<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Response;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->ajax()) {
            $data = Category::all()->where('visibility', 1);

            $table = DataTables::of($data);
            $table->addIndexColumn();
            $table->addColumn('slug', function ($slug){
                return str_replace('-', ' ', $slug->slug);
            });
            $table->addColumn('action', function ($row){
                $actionBtn = '<div class="margin"><div class="btn-group">
                                <button type="button" class="dropdown-toggle" data-toggle="dropdown">
                                    <span class="fa fa-ellipsis-h"></span>
                                    <span class="sr-only">Toggle Dropdown</span>
                                </button>';
                $actionBtn .= '<ul class="dropdown-menu dropdown-menu-right" role="menu">';
                $actionBtn .= '<li>
                                    <a href="javascript:void(0)" id="edit-category" data-id="'.$row->id.'"><i class="fa fa-pencil"></i> Edit this info</a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)" id="delete-category" data-id="'.$row->id.'" class="delete-category"><i class="fa fa-trash"></i> Delete this info</a>
                                </li>';
                $actionBtn .= '</ul>';
                $actionBtn .= '</div></div>';
                return $actionBtn;

            });

            $table->rawColumns(['action']);
            return $table->make(true);
        }

        return view('admin.blog.category.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $slug = Str::slug($request->get('slug'));
        $data = Category::where('slug', $slug)->count();

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
        $categoryID = $request->category_id;
        return Category::updateOrCreate(['id' => $categoryID],
            [
                'name' => $request->name,
                'slug' => Str::slug($request->slug),
                'description' => $request->description,
                'status' => $request->status,
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
        $category  = Category::where($where)->first();
        return response()->json($category);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $status = Category::where('status','!=', 1)->where('id', $id)->first();

        if(!is_null($status)) {
            Category::where('id',$id)->update(['slug' => \Carbon\Carbon::now()->format('YmdHis').'__'.$status->slug, 'visibility' => 0]);
            return response()->json(true);
        } else {
            return response()->json(false);
        }

    }
}
