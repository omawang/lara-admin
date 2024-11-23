<?php

namespace App\Livewire\Posts;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Rule;
use Livewire\Component;

class Create extends Component
{
    #[Rule(['required'])]
    public $title = '';

    #[Rule(['required'])]
    public $body = '';

    public $isPublished = true;

    public function create()
    {
        $validated = $this->validate();
        $validated['added_at'] = now();

        $user = Auth::user();
        $user->posts()->create($validated);

        // Optionally reset the form fields
        $this->reset(['title', 'body', 'isPublished']);
        $this->dispatch('close-post-create-modal');
    }

    public function render()
    {
        return view('livewire.posts.create');
    }
}
