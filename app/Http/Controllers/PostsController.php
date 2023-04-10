<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use App\Models\Post;
use App\Models\Tag;
class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('blog.index', [
            'posts'=>Post::with(['tags'])->latest()->filter(
                request(['search']))->simplePaginate(4),
        ]);
    }


    public function create()
    {
        $tags = Tag::all();
        return view('blog.create',compact('tags'));
    }


    public function store(Request $request)
    {
    $createPost =   Post::create(array_merge($this->validatePost(), [
            'user_id' => request()->user()->id,
            'slug' => str::slug($request->title,'-'),
            'image' => request()->file('image')->store('images')
        ]));

    if ($request->has('tags')) {
        $createPost->tags()->attach($request->tags);
    }
    return redirect('/blog')->with('successCreated','It Is Created');
    }

    public function show($slug)
    {
        return view('blog.show')
        ->with('post',Post::where('slug',$slug)->first())->with('tags',Tag::get());
    }


    public function edit($slug)
    {
        return view('blog.edit')
        ->with('post',Post::where('slug',$slug)->first());
    }

    public function update(Post $post,$slug)
    {
        $attributes = $this->validatePost($post);

    
        $attributes['image'] = request()->file('image')->store('images');

        Post::where('slug',$slug)->first()->update($attributes);

        

        return redirect('/blog/' . $slug)
        ->with('successUpdated','It Is Updated');

    }

    public function destroy($slug)
    {
        Post::where('slug',$slug)->first()->delete();
        return redirect('/blog')
        ->with('successDeleted','It Is Deleted');
    }

    protected function validatePost(?Post $post = null): array
        {
            $post ??= new Post();
    
            return request()->validate([
                'title' => ['required', 'string','unique:posts'],
                'description' => 'required',
                'image' =>'required|image'
            ]);
        }
}
