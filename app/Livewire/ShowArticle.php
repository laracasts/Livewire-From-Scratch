<?php

namespace App\Livewire;

use App\Models\Article;
use Livewire\Component;

class ShowArticle extends Component
{
    public Article $article;

    public function mount(Article $article) {
        $this->article = $article;
    }

    public function render()
    {
        return view('livewire.show-article');
    }
}
