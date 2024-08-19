<?php

namespace App\Http\Controllers;

use App\Models\Cover;
use Illuminate\Http\Request;
use Storage;

class UploadCoverController extends Controller
{
    public function __invoke(Request $request)
    {
        $cover = $request->file;

        if (!Storage::directoryExists('covers')) {
            Storage::makeDirectory('covers');
        }

        $folder = uniqid('cover-');
        $path = 'covers/' . $folder;
        $filename = $cover->getClientOriginalName();

        Storage::putFileAs($path, $cover, $filename);

        Cover::create([
            'filename' => $filename,
            'path' => $path,
            'folder' => $folder
        ]);
    }
}
