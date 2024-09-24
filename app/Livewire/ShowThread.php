<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Thread;
use Livewire\Component;

class ShowThread extends Component
{
    public function render()
    {
        $categories = Category::get();
        $threads = Thread::latest()->get();

        return view('livewire.show-thread', [
            'categories' => $categories,
            'threads' => $threads,
        ]);
    }
}
