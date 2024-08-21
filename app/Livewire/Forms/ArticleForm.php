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

    public $published = false;
    public $notifications = [];
    public $allowNotifications = false;

    public function setArticle(Article $article) {
        $this->title = $article->title;
        $this->content = $article->content;
        $this->published = $article->published;
        $this->notifications = $article->notifications ?? [];

        $this->allowNotifications = count($this->notifications) > 0;

        $this->article = $article;
    }

    public function store() {
        $this->validate();

        if (!$this->allowNotifications) {
            $this->notifications = [];
        }

        Article::create($this->only(['title', 'content', 'published', 'notifications']));

        cache()->forget('published-count');

    }

    public function update() {
        $this->validate();

        if (!$this->allowNotifications) {
            $this->notifications = [];
        }

        $this->article->update(
            $this->only(['title', 'content', 'published', 'notifications'])
        );

        cache()->forget('published-count');
        
    }
}
