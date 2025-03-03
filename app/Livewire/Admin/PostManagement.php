<?php

namespace App\Livewire\Admin;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class PostManagement extends Component
{
    use WithPagination;

    public $search = '';
    public $sortField = 'created_at';
    public $sortDirection = 'desc';
    public $confirmingPostDeletion = false;
    public $postToDelete = null;

    public function confirmPostDeletion($postId)
    {
        $this->confirmingPostDeletion = true;
        $this->postToDelete = $postId;
    }

    public function deletePost()
    {
        $post = Post::find($this->postToDelete);
        
        if ($post) {
            $post->delete();
            session()->flash('message', 'Publicación eliminada correctamente.');
        }

        $this->confirmingPostDeletion = false;
        $this->postToDelete = null;
    }

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortField = $field;
            $this->sortDirection = 'asc';
        }
    }

    public function render()
    {
        return view('livewire.admin.post-management', [
            'posts' => Post::where('title', 'like', "%{$this->search}%")
                ->orderBy($this->sortField, $this->sortDirection)
                ->paginate(10)
        ])->layout('layouts.app');
    }
}