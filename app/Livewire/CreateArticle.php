<?php

namespace App\Livewire;

use App\Livewire\Forms\ArticleForm;
use App\Models\Article;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateArticle extends AdminComponent
{
    use WithFileUploads;

    public ArticleForm $form;

    public function save() {
        $this->form->store();

        $this->redirectRoute('dashboard.articles.index', navigate: true);
    }


    public function render()
    {
        return view('livewire.create-article');
    }
}
