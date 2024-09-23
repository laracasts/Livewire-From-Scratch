<?php

use App\Livewire\ArticleIndex;
use App\Livewire\ArticleList;
use App\Livewire\CreateArticle;
use App\Livewire\Dashboard;
use App\Livewire\EditArticle;
use App\Livewire\Login;
use App\Livewire\Search;
use App\Livewire\ShowArticle;
use Illuminate\Support\Facades\Route;

Route::get('/', ArticleIndex::class)->name('home');
Route::get('/login', Login::class)->name('login');
Route::get('/logout', function() {
    Auth::logout();

    return redirect()->route('home');
});

Route::get('/articles/{article}', ShowArticle::class);

 Route::middleware([
     'auth',
 ])->group(function () {
     Route::get('/dashboard', Dashboard::class)->name('dashboard');
     Route::get('/dashboard/articles', ArticleList::class)->name('dashboard.articles.index');//->lazy();
     Route::get('/dashboard/articles/create', CreateArticle::class);
     Route::get('/dashboard/articles/{article}/edit', EditArticle::class);
 });
