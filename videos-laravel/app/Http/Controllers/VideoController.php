<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
//use Symphony\Component\HttpFoundation\Response;
use Illuminate\Http\Response;
use App\Video;
use App\Comment;

class VideoController extends Controller
{
    public function createVideo(){
        return view('video.createVideo');
    }

    public function saveVideo(Request $request) {
        //validate form
        $validateData = $this->validate($request, [
            'title' => 'required|min:5',
            'description' => 'required|max:100',
            'video' => 'mimes:mp4'
        ]);

        $video = new Video();
        $user = \Auth::user();
        $video->user_id = $user->id;
        $video->title = $request->input('title');
        $video->description = $request->input('description');

        // Upload image and video

        $image = $request->file('image');
        if($image) {
            $imagen_path = time().$image->getClientOriginalName();
            \Storage::disk('images')->put($imagen_path, \File::get($image));
            $video->image = $imagen_path;
        } 

        $video_file = $request->file('video');
        if($video_file) {
            $video_path = time().$video_file->getClientOriginalName();
            \Storage::disk('videos')->put($video_path, \File::get($video_file));

            $video->video_path = $video_path;
        }

        $video->save(); //save to db

        return redirect()->route('home')->with(array(
            'message' => 'Video Upload Correctly'
        ));
    }

    public function getImage($filename) {
        $file = Storage::disk('images')->get($filename);
        return new Response($file, 200);
    }
}
