<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Traits\ApiResponse;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
class PostController extends Controller
{
    use ApiResponse;
    public function index(){
        $posts =  PostResource::collection(Post::get());
         return $this->apiResponse($posts,'ok',200);
    }

    public function show($id){
        $post = Post::find($id);
       if($post){
            return $this->apiResponse(new PostResource($post),'ok',200);
       }
       return $this->apiResponse($post,'The Post Not Found',404);
    }


    public function store(Request $request){

        $validator = Validator::make($request->all(),[
            'title' => ['required', 'string', 'unique:posts'],
            'description' => 'required',
            'image' => 'required|number',

        ]);
        if($validator->fails()){
            return $this->apiResponse(null,$validator->errors(),400);
        }

        $post = Post::create(array_merge($validator, [
            'user_id' => request()->user()->id,
            'slug' => str::slug($request->title, '-'),
            'image' => request()->file('image')->store('images')
        ]));
        if($post){
            return $this->apiResponse(new PostResource($post),'The Post Save',201);
       }
       return $this->apiResponse(null,'The Post Not Save',400);
    }



    public function update(Request $request, $id){

        $validator = Validator::make($request->all(),[
            'title' => ['required', 'string', 'unique:posts'],
            'description' => 'required',
            'image' => 'required|number',

        ]);
        if($validator->fails()){
            return $this->apiResponse(null,$validator->errors(),400);
        }
        $post= Post::find($id);
        if(!$post){
            return $this->apiResponse($post,'The Post Not Found',404);
       }
        $post->update($request->all());
        if($post){
            return $this->apiResponse(new PostResource($post),'The Post update',201);
        }
    }

    public function destroy($id){
        $post= Post::find($id);
        if(!$post){
            return $this->apiResponse($post,'The Post Not Found',404);
       }
       $post->delete($id);
       if($post){
        return $this->apiResponse(null,'The Post delete',200);
    }
    }
}
