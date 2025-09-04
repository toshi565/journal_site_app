<?php

use function Livewire\Volt\{state, mount, rules};
use App\Models\Article;

state(['article', 'title', 'body']);

rules([
    'title' => 'required|string|max:50',
    'body' => 'required|string|max:2000',
]);

mount(function (Article $article) {
    $this->article = $article;
    $this->title = $article->title;
    $this->body = $article->body;
});

$update = function () {
    $this->validate();
    $this->article->update($this->all());
    return redirect()->route('articles.show', $this->article);
};

?>

<div>
    <h1>投稿論文編集</h1>
    <form wire:submit="update">
        <p>
            <label for="title">論文タイトル</label>
            @error('title')
                <spam class="error">({{ $message }})</spam>
            @enderror
            <br>
            <input type="text" wire:model="title" id="title">
        </p>
        <p>
            <label for="body">本文</label>
            @error('body')
                <spam class="error">({{ $message }})</spam>
            @enderror
            <br>
            <textarea wire:model="body" id="body"></textarea>
        </p>
        <button type="submit">更新</button>
    </form>
</div>
