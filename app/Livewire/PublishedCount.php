<?php

namespace App\Livewire;

use App\Models\Article;
use Livewire\Attributes\Lazy;
use Livewire\Component;

#[Lazy]
class PublishedCount extends Component
{
    public $count = 0;
    public $placeholderText = '';

    public function mount() {
        sleep(1);

        $this->count = Article::where('published', 1)->count();
    }

    public function placeholder() {
        return view('livewire.placeholder', [
            'message' => $this->placeholderText,
        ]);
    }

    public function render()
    {
        return view('livewire.published-count');
    }
}
