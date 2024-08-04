<?php

namespace App\Livewire\Forms;

use App\Models\Article;
use Livewire\Attributes\Validate;
use Livewire\Form;

class ArticleForm extends Form
{
    public ?Article $article;

    #[Validate('required')]
    public $title = '';

    #[Validate('required')]
    public $content = '';

    public function setArticle(Article $article) {
        $this->title = $article->title;
        $this->content = $article->content;

        $this->article = $article;
    }

    public function store() {
        $this->validate();

        Article::create($this->only(['title', 'content']));
    }

    public function update() {
        $this->validate();

        $this->article->update(
            $this->only(['title', 'content'])
        );
    }
}
