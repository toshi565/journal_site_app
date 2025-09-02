<?php

use function Livewire\Volt\{state};
use App\Models\Article;

// ルートモデルバインディング
state(['article' => fn(Article $article) => $article]);

// 一覧ページに戻るメソッド（上のコードをstateだけにしていなくて何回もエラー出て泣いた）
$index = function () {
    return redirect()->route('articles.index');
};

// 編集へリダイレクト
$edit = function () {
    return redirect()->route('articles.edit', $this->article);
};

// 削除機能
$destroy = function () {
    $this->article->delete();
    return redirect()->route('articles.index');
};

?>


<div>
    <p>タイトル:{{ $article->title }}</p>
    <p>{!! nl2br(e($article->body)) !!}</p>
    <button wire:click="index">一覧へ戻る</button>
    <button wire:click="edit">編集する</button>
    <button wire:click="destroy" wire:confirm="本当に削除しますか？">削除する</button>
</div>
