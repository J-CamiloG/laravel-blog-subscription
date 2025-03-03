<?php

namespace App\Livewire\Posts;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class PostList extends Component
{
    use WithPagination;

    public $search = '';
    public $dateFrom = '';
    public $dateTo = '';

    public function deletePost($postId)
    {
        // Verificar si el usuario es administrador
        if (Auth::check() && Auth::user()->hasRole('admin')) {
            $post = Post::find($postId);
            if ($post) {
                $post->delete();
                session()->flash('message', 'Post eliminado correctamente.');
            }
        } else {
            session()->flash('error', 'No tienes permisos para eliminar posts.');
        }
    }

    public function render()
    {
        $query = Post::query()->with('user')->orderBy('published_at', 'desc');

        if ($this->dateFrom) {
            $query->whereDate('published_at', '>=', $this->dateFrom);
        }

        if ($this->dateTo) {
            $query->whereDate('published_at', '<=', $this->dateTo);
        }

        $posts = $query->paginate(10);

        return view('livewire.posts.post-list', [
            'posts' => $posts,
            'isAdmin' => Auth::check() && Auth::user()->hasRole('admin')
        ])->layout('layouts.app'); // Especificamos el layout correcto
    }
}