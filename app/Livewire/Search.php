<?php

namespace App\Livewire;

use App\Models\Article;
use Livewire\Attributes\Isolate;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;
use Livewire\Attributes\Validate;
use Livewire\Component;

#[Isolate]
class Search extends Component
{

    #[Url(as: 'q', except: '')]
    public $searchText = '';
    public $placeholder;

   #[On('search:clear-results')]
    public function clear() {
        $this->reset('searchText');
    }

    protected function queryString() {
       return [
           'searchText' => [
               'as' => 'q',
               'history' => true,
               'except' => ''
           ]
       ];
    }


    public function render()
    {
        return view('livewire.search', [
            'results' => Article::where('title', 'LIKE', "%{$this->searchText}%")->get()
        ]);
    }
}
