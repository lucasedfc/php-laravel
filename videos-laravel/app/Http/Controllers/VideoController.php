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

    public function getVideoDetail($video_id) {
        $video = Video::find($video_id);
        return view('video.detail', array(
            'video' => $video
        ));
    }

    public function getVideo($filename) {
        $file = Storage::disk('videos')->get($filename);
        return new Response($file, 200);
    }

    public function delete($video_id) {
        $user =  \Auth::user();
        $video = Video::find($video_id);
        $comments = Comment::where('video_id', $video_id)->get();


        if($user && $video->user_id == $user->id) {
            // Delete comments
            if($comments && count($comments) >= 1) {
                foreach($comments as $comment) {
                    $comment->delete();                
                }
            }
            //Delete files
            Storage::disk('images')->delete($video->image);
            Storage::disk('videos')->delete($video->video_path);
            //Delete video
            $video->delete();

            $message = array(
                'message' => 'Video removed'
            );
        } else {
            $message = array(
                'message' => 'Video cannot be removed'
            );
        }

        return redirect()->route('home')->with($message);
    }

    public function edit($id) {
        $user =  \Auth::user();
        $video = Video::findOrFail($id);
        if($user && $video->user_id == $user->id) {
            return view('video.edit', array(
                'video' => $video
            )); 
        } else {
            return redirect()->route('home');
        }
    }

    public function update($id, Request $request) {
        $validate = $this->validate($request, array(
            'title' => 'required|min:5',
            'description' => 'required|max:100',
            'video' => 'mimes:mp4'
        ));
        $user = \Auth::user();
        $video = Video::findOrFail($id);
        $video->user_id = $user->id;
        $video->title = $request->input('title');
        $video->description = $request->input('description');

        $image = $request->file('image');
        if($image) {
            // Delete old image
            Storage::disk('images')->delete($video->image);
            // update image
            $imagen_path = time().$image->getClientOriginalName();
            \Storage::disk('images')->put($imagen_path, \File::get($image));
            $video->image = $imagen_path;
        } 

        $video_file = $request->file('video');
        if($video_file) {
            // Delete old video
            Storage::disk('videos')->delete($video->video_path);
            // Update video
            $video_path = time().$video_file->getClientOriginalName();
            \Storage::disk('videos')->put($video_path, \File::get($video_file));

            $video->video_path = $video_path;
        }

        $video->update(); //update video to db

        return redirect()->route('home')->with(array(
            'message' => 'Video updated'
        ));


    }

    public function search($search = null, $filter = null) {

        if(is_null($search)) {
            $search = \Request::get('search');

            if(is_null($search)) {
                return redirect()->route('home');
            }
            return redirect()->route('videoSearch', array(
                'search_string' => $search
            ));
        }

        if(is_null($filter) && \Request::get('filter') && !is_null($search)) {
            $filter = \Request::get('filter');
            return redirect()->route('videoSearch', array(
                'search_string' => $search,
                'filter' => $filter
            ));

        }

        $column = 'id';
        $order = 'desc';

        if(!is_null($filter)){
            if($filter == 'new'){
                $column = 'id';
                $order = 'desc';
            }
            if($filter == 'old'){
                $column = 'id';
                $order = 'asc';
            }
            if($filter == 'alfa'){
                $column = 'title';
                $order = 'asc';
            }
        }

        $result = Video::where('title', 'LIKE', '%'.$search.'%')->orderBy($column, $order)->paginate(5);


        return view('video.search', array(
            'videos' => $result,
            'search' => $search
        ));
    }
}
