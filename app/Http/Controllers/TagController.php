<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('tags.index',[
            'tags'=>Tag::latest()->filter(
                request(['search']))->simplePaginate(8),
        ]);
    }


    public function create()
    {
        return view('tags.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'tag' => 'required',
        ]);

        Tag::create([
            'tag' => $request->input('tag'),
        ]);

        return redirect('/tag')->with('successCreated','Tag It Is Created');
    }


    public function edit(Tag $tag)
    {
        //
    }


    public function update(Request $request, Tag $tag)
    {
        //
    }


    public function destroy(Tag $tag)
    {
        $tag->delete();
        return redirect('/tag')
        ->with('successDeleted','It Is Deleted');
    }
}
