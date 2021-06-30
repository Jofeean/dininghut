<?php

namespace App\Http\Controllers;

use App\Models\Cms;
use Illuminate\Http\Request;
use Image;
use Validator;

class CMSController extends Controller
{
    public function contentImage(Request $request)
    {

        $fpath = 'images\content/' . time() . '.' . $request->file->extension();
        Image::make($request->file)->save($fpath);

        // Send response.
        return response()->json(['link' => url($fpath)]);

    }

    public function deleteContentImage($file)
    {
        $src = $file;

        // Check if file exists.
        chdir('./images/content');
        chmod(getcwd() . '/' . $src, 0644);
        if (file_exists(getcwd() . '/' . $src)) {
            // Delete file.
            unlink(getcwd() . '/' . $src);
        }
    }

    public function index()
    {
        $data["image"] = Cms::find(1);
        $data["about"] = Cms::find(2);
        $data["dining"] = Cms::find(3);
        $data["contacts"] = Cms::find(4);
        $data["footer"] = Cms::find(5);
        return view("admin.cms", $data);
    }

    public function update($id, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'contents' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $cms = Cms::find($id);
        $cms->content = $request->contents;
        $cms->save();


        return redirect()->back()->with('success', 'success');
    }


    public function imageUpload($id, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'image' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

//        dd($request->image->extension());
        $filename = time() . '.' . $request->image->extension();
        $fpath = 'images/' . $filename;
        Image::make($request->image)->save($fpath);

        Cms::find($id)
            ->update(['content' => $filename]);

        return redirect()->back()->with('success', 'success');
    }
}
