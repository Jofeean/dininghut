<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Tags;
use Illuminate\Http\Request;
use DataTables;
use Validator;

class TagsCategoryController extends Controller
{
    public function index1(Request $request)
    {
        if ($request->ajax()) {
            $data = Category::all();
            return DataTables::of($data)
                ->smart()
                ->toJson();
        }
    }

    public function store1(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'category' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $category = new Category();
        $category->category = $request->category;
        $category->save();

        return redirect()->back()->with('success1', 'success');
    }

    public function store2(Request $request)
    {
        if ($request->tags) {
            foreach ($request->tags as $tag1) {
                $tag = new Tags();
                $tag->menu_id = $request->id;
                $tag->category_id = $tag1;
                $tag->save();
            }
        }

        return redirect()->back()->with('success3', 'success');
    }

    public function update1(Request $request, $id)
    {
        $category = Category::find($id);

        $validator = Validator::make($request->all(), [
            'category' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $category->category = $request->category;
        $category->save();


        return redirect()->back()->with('edit1', 'success');
    }

    public function destroy1($id)
    {
        Category::destroy($id);

        return redirect()->back()->with('delete1', 'success');
    }

    public function destroy2($id)
    {
        Tags::destroy($id);

        return redirect()->back()->with('delete3', 'success');
    }
}
