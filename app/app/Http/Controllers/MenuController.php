<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Menu;
use App\Models\Tags;
use App\Models\User;
use Illuminate\Http\Request;
use DataTables;
use Validator;
use Image;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Menu::with(["tags" => function ($q) {
                $q->with("categories");
            }]);
            return DataTables::of($data)
                ->addColumn('tags', function (Menu $menu) {
                    return $menu->tags->map(function ($tag) {
                        return "<h5><span class='badge  badge-lg badge-secondary'><span>" . $tag->categories->category .
                            "</span> <a onclick='del3(" . $tag->id . ")'><i class='remove nav-icon far fa-times-circle'></i></a> </span> </h5>";
                    })->implode(' ');
                })
                ->addColumn('tag2', function (Menu $menu) {
                    return $menu->tags->map(function ($tag) {
                        return $tag->category_id;
                    })->implode(', ');
                })
                ->rawColumns(["tags"]) //to render html tags as actual html not as plain text
                ->filterColumn('tags', function ($query, $keyword) {
                    $query->whereHas("tags", function ($q) use ($keyword) {
                        $q->whereHas("categories", function ($query) use ($keyword) {
                            $query->where("category", "like", "%" . $keyword . "%");
                        });
                    });
                })
                ->toJson();
        }
        $data["categories"] = Category::all();
        return view("admin.menu", $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "dish" => 'required',
            "description" => 'required',
            "price" => "required",
            "stock" => "required",
            "image" => "required|image",
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $filename = time() . '.' . $request->image->extension();
        $fpath = 'images/thumbs/' . $filename;
        Image::make($request->image)->save($fpath);

        $menu = new Menu();
        $menu->image = $filename;
        $menu->dish = $request->dish;
        $menu->description = $request->description;
        $menu->price = $request->price;
        $menu->stock = $request->stock;
        if ($request->is_recommended == "on") {
            $menu->is_recommended = true;
        }
        $menu->save();
        if ($request->tags) {
            foreach ($request->tags as $tag) {
                $menu->tags()->save(new Tags(["category_id" => $tag]));
            }
        }
        return redirect()->back()->with('success2', 'success');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if ($request->hasFile('image')) {
            $validator = Validator::make($request->all(), [
                "dish" => 'required',
                "description" => 'required',
                "price" => "required",
                "stock" => "required",
                "image" => "required|image",
            ]);
        } else {
            $validator = Validator::make($request->all(), [
                "dish" => 'required',
                "description" => 'required',
                "price" => "required",
                "stock" => "required"
            ]);
        }

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        $menu = Menu::find($id);

        if ($request->hasFile('image')) {
            $filename = time() . '.' . $request->image->extension();
            $fpath = 'images/thumbs/' . $filename;
            Image::make($request->image)->save($fpath);
            $menu->image = $filename;
        }

        $menu->dish = $request->dish;
        $menu->description = $request->description;
        $menu->price = $request->price;
        $menu->stock = $request->stock;

        if ($request->is_recommended == "on") {
            $menu->is_recommended = true;
        }
        $menu->save();

        return redirect()->back()->with('success2', 'success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Menu::destroy($id);

        return redirect()->back()->with('delete2', 'success');
    }
}
