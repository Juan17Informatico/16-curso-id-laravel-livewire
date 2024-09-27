<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Thread;

class ThreadController extends Controller
{
    
    public function edit(Thread $thread)
    {
        $categories = Category::get();

        return view('thread.edit', compact('categories', 'thread'));

    }
    
    public function update(Request $request, Thread $thread)
    {
        $request->validate([
            'category_id' => 'required',
            'title' => 'required',
            'body' => 'required'
        ]);

        $thread->update($request->all());

        return redirect()->route('thread', $thread);

    }

}
