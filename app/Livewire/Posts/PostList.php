<?php

namespace App\Livewire\Posts;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class PostList extends Component
{
    use WithPagination;

    public $search_date = '';

    public function render()
    {
        $posts = Post::query()
            ->when($this->search_date, function($query) {
                return $query->whereDate('published_at', $this->search_date);
            })
            ->latest('published_at')
            ->paginate(10);

        return view('livewire.posts.post-list', [
            'posts' => $posts
        ])->layout('layouts.app');
    }
}
