<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Thread;
use Livewire\Component;

class ShowThreads extends Component
{

    public $search = '';
    public $category = '';

    public function render()
    {
        $categories = Category::get();
        
        $threads = Thread::query();
        $threads->where('title', 'like', "%$this->search%");
        $threads->withCount('replies');
        $threads->latest();

        if($this->category) {
            $threads->where('category_id', $this->category);
        }


        return view('livewire.show-threads', [
            'categories' => $categories,
            'threads' => $threads->get(),
        ]);
    }

    public function filterByCategory($category)
    {
        $this->category = $category;
    }

}
