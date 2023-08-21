<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use App\Notifications\CreatePost;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('blog.index', [
            'posts' => Post::latest()->filter(
                request(['search'])
            )->simplePaginate(4),
        ]);
    }


    public function create()
    {
        $tags = Tag::all();
        return view('blog.create', compact('tags'));
    }


    public function store(Request $request)
    {
        $createPost =   Post::create(array_merge($this->validatePost(), [
            'user_id' => request()->user()->id,
            'slug' => str::slug($request->title, '-'),
            'image' => request()->file('image')->store('images')
        ]));

        if ($request->has('tags')) {
            $createPost->tags()->attach($request->tags);
        }
        $users = User::where('id', '!=', auth()->user()->id)->get();
        $user_create = auth()->user()->username;
        Notification::send($users, new CreatePost($createPost->id, $user_create, $createPost->title, $createPost->slug));
        return redirect('/blog')->with('successCreated', 'It Is Created');
    }

    public function show($slug)
    {
        $getID = DB::table('notifications')->where('data->slug', $slug)->pluck('id');
        DB::table('notifications')->where('id', $getID)->update(['read_at' => now()]);
        return view('blog.show')
            ->with('post', Post::where('slug', $slug)->first())->with('tags', Tag::get());
    }


    public function edit($slug)
    {
        return view('blog.edit')
            ->with('post', Post::where('slug', $slug)->first());
    }

    public function update(Post $post, $slug)
    {
        $attributes = $this->validatePost($post);


        $attributes['image'] = request()->file('image')->store('images');

        Post::where('slug', $slug)->first()->update($attributes);



        return redirect('/blog/' . $slug)
            ->with('successUpdated', 'It Is Updated');
    }

    public function destroy($slug)
    {
        Post::where('slug', $slug)->first()->delete();
        return redirect('/blog')
            ->with('successDeleted', 'It Is Deleted');
    }

    protected function validatePost(?Post $post = null): array
    {
        $post ??= new Post();

        return request()->validate([
            'title' => ['required', 'string', 'unique:posts'],
            'description' => 'required',
            'image' => 'required|image'
        ]);
    }


    public function markASRead()
    {
        $user = User::find(auth()->user()->id);
        foreach ($user->unreadNotifications as $item) {
            $item->markASRead();
        }
        return redirect()->back();
    }
}
