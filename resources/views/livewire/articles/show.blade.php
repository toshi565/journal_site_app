<?php

use function Livewire\Volt\{state};
use App\Models\Article;

// ルートモデルバインディング
state(['article' => fn(Article $article) => $article]);

// 一覧ページに戻るメソッド
$index = function () {
    return redirect()->route('articles.index');
};

?>

<div>
    <p>タイトル:{{ $article->title }}</p>
    <p>{!! nl2br(e($article->body)) !!}</p>
    <button wire:click="index">一覧へ戻る</button>
</div>
