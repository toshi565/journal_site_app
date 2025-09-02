<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::get('/', function () {
    return view('welcome');
});

//一覧ページ
Volt::route('articles', 'articles.index')->name('articles.index');
// 論文の投稿フォーム表示
Volt::route('/articles/create', 'articles.create')->name('articles.create');
//詳細ページ
Volt::route('articles/{article}', 'articles.show')->name('articles.show');
// 編集ページ
Volt::route('/articles/{article}/edit', 'articles.edit')->name('articles.edit');
