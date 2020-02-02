<?php

namespace Modules\ImageGallery\Http\Controllers;

use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Modules\ImageGallery\Entities\ImageGallery;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class ImageGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $images = ImageGallery::paginate(9);
        SEOMeta::setTitle('Images');
        return view('imagegallery::admin.index', compact('images'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        SEOMeta::setTitle('Upload image');
        return view('imagegallery::admin.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:100',
            'image' => 'required|max:2000',
        ]);

        $file = $request->file('image');
        // dd($request->image->getClientOriginalExtension());
        $title = $request->title;
        $extension = $file->getClientOriginalExtension(); // getting image extension
        $filename = time() . '.' . $extension;
        $file->move('img/', $filename);

        $image = new ImageGallery;

        $image->image = $filename;
        $image->title = $title;
        $image->save();

        return redirect()->route('imagegallery.index')
            ->with('success', 'Image is uploaded');
    }



    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        $image = ImageGallery::findOrFail($id);
        $imgPath = 'img/' . $image->image;
        $image->delete();
        //delete image locally
        if (File::exists($imgPath)) {
            File::delete($imgPath);
        }

        return redirect()->route('imagegallery.index')
            ->with('success', 'Image is deleted');
    }
}
