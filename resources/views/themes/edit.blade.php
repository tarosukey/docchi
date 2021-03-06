@extends('layouts.app')

@section('title', 'テーマ編集')

@section('content')

<div class="p-form">

  <p class="c-form__title">テーマ編集</p>

  <div class="p-form__main">
    <form method="POST" action="{{ route('themes.update', $theme->id) }}" enctype='multipart/form-data'>
      @csrf
      @method('PUT')
      <div class="p-form__one p-form__text">
        <p class="c-form__one__title">テーマ名</p>
        <div class="p-form__input">
          <input id="title" type="text" name="title" value="{{ $theme->title }}" autocomplete="title" class="c-form__text form-control @error('title') is-invalid @enderror">
        </div>
      </div>
      @error('title')
      <div class="invalid__feedback" role="alert">
        <strong>{{ $message }}</strong>
      </div>
      @enderror

      <div class="p-form__one p-form__text">
        <p class="c-form__one__title">タグ</p>
        <theme-tags-input :initial-tags='@json($tagNames)'>
        </theme-tags-input>
      </div>
      @error('tag')
      <div class="invalid__feedback" role="alert">
        <strong>{{ $message }}</strong>
      </div>
      @enderror

      <div class="p-form__one p-form__text">
        <p class="c-form__one__title">選択肢Aの回答</p>
        <div class="p-form__input">
          <input id="answer" type="text" name="answer_a" value="{{ $theme->answer_a }}" autocomplete="answer_a" class="c-form__text form-control @error('answer_a') is-invalid @enderror">
        </div>
      </div>
      @error('answer_a')
      <div class="invalid__feedback" role="alert">
        <strong>{{ $message }}</strong>
      </div>
      @enderror

      <div class="p-form__one p-form__pic">
        <p class="c-form__one__title">選択肢Aの画像</p>
        <div class="p-form__input">
          <label class="p-form__pic__one p-area__drop  form-control @error('pic_a') is-invalid @enderror" :class="{'c-drop__border--a':styleA, 'c-drop__border--b':styleB}" @dragover.prevent="changeStyleA($event,'ok')" @dragleave.prevent="changeStyleA($event,'no')" @drop.prevent="uploadFileA($event)">
            <input type="hidden" name="MAX_FILE_SIZE" value="3145728">
            <input type="file" name="pic_a" id="uploadImageA" value="{{ $theme->pic_a }}" class="c-form__pic" accept="image/*" @change="onFileChangeA($event)" @change="uploadFileA($event)">
            <p class="c-area__drop__text">クリックorドラッグ&ドロップで<br>画像をアップロード</p>
            <img class="c-prev__img" src="{{ $theme->pic_a }}">
            <img class="c-prev__img" :src="imageDataA" v-if="imageDataA">
          </label>
        </div>
      </div>
      @error('pic_a')
      <div class="invalid__feedback c-error__pic__text" role="alert">
        <strong>{{ $message }}</strong>
      </div>
      @enderror

      <div class="p-form__one p-form__text">
        <p class="c-form__one__title">選択肢Bの回答</p>
        <div class="p-form__input">
          <input id="answer" type="text" name="answer_b" value="{{ $theme->answer_b }}" autocomplete="answer_b" class="c-form__text form-control @error('answer_b') is-invalid @enderror">
        </div>
      </div>
      @error('answer_b')
      <div class="invalid__feedback" role="alert">
        <strong>{{ $message }}</strong>
      </div>
      @enderror

      <div class="p-form__one p-form__pic">
        <p class="c-form__one__title">選択肢Bの画像</p>
        <div class="p-form__input">
          <label class="p-form__pic__one p-area__drop  form-control @error('pic_b') is-invalid @enderror" :class="{'c-drop__border--a':styleA, 'c-drop__border--b':styleB}" @dragover.prevent="changeStyleB($event,'ok')" @dragleave.prevent="changeStyleB($event,'no')" @drop.prevent="uploadFileB($event)">
            <input type="hidden" name="MAX_FILE_SIZE" value="3145728">
            <input type="file" name="pic_b" id="uploadImageB" value="{{ $theme->pic_b }}" class="c-form__pic" accept="image/*" @change="onFileChangeA($event)" @change="uploadFileA($event)">
            <p class="c-area__drop__text">クリックorドラッグ&ドロップで<br>画像をアップロード</p>
            <img class="c-prev__img" src="{{ $theme->pic_b }}">
            <img class="c-prev__img" :src="imageDataB" v-if="imageDataB">
          </label>
        </div>
      </div>
      @error('pic_b')
      <div class="invalid__feedback c-error__pic__text" role="alert">
        <strong>{{ $message }}</strong>
      </div>
      @enderror

      <div class="p-btn__area">
        <button type="submit" class="c-form__btn btn">
          編集
        </button>
      </div>
    </form>
    <form method="POST" action="{{ route('themes.destroy', $theme->id) }}" enctype='multipart/form-data'>
      @csrf
      @method('DELETE')
      <div class="p-btn__area__sub">
        <button type="submit" class="c-form__btn btn">
          削除
        </button>
      </div>
    </form>
  </div>

</div>

@endsection