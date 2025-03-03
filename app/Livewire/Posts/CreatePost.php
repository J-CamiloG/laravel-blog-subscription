<?php

namespace App\Livewire\Posts;

use App\Models\Post;
use Livewire\Component;
use Illuminate\Support\Carbon;

class CreatePost extends Component
{
    public $title = '';
    public $description = '';

    protected $rules = [
        'title' => 'required|min:5|max:255',
        'description' => 'required|min:10',
    ];

    protected $messages = [
        'title.required' => 'El título es obligatorio',
        'title.min' => 'El título debe tener al menos 5 caracteres',
        'description.required' => 'La descripción es obligatoria',
        'description.min' => 'La descripción debe tener al menos 10 caracteres',
    ];

    public function save()
    {
        $this->validate();

        $now = Carbon::now();

        Post::create([
            'title' => $this->title,
            'description' => $this->description,
            'user_id' => auth()->id(),
            'published_at' => $now 
        ]);

        session()->flash('message', 'Post creado correctamente.');
        
        return redirect()->route('home');
    }

    public function render()
    {
        return view('livewire.posts.create-post')
            ->layout('layouts.app');
    }
}