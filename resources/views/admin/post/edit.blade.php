@extends('layouts.master')
@section('title', 'Edit Post')

@section('content')
    <div class="wrapper">
        <div class="rte">
            <h1>Edit post</h1>
        </div>

        <form method="GET" action="">
            @csrf
            <div class="form-fieldset">
                <input class="form-field{{ $errors->has('title') ? ' is-invalid' : '' }}" type="text" name="title" placeholder="Title" value="{{ $post->title }}">
            </div>
            <div class="form-fieldset">
                <div class="form-select{{ $errors->has('type') ? ' is-invalid' : '' }}">
                    <select name="type">
                        <option value="" disabled>Choose Type</option>
                        <option value="text" {{ $post->type === 'text' ? 'selected' : '' }}>Type: Text</option>
                        <option value="photo" {{ $post->type === 'photo' ? 'selected' : '' }}>Type: Photo</option>
                    </select>
                </div>
            </div>
            <div class="form-fieldset">
                <label class="form-label">Date:</label>
                <input class="form-field{{ $errors->has('date') ? ' is-invalid' : '' }}" type="date" name="date" value="{{ $post->date->format('Y-m-d') }}">
            </div>
            <div class="form-fieldset">
                <label class="form-label">Published:</label>
                <input type="checkbox" name="published" value="1">
            </div>
            <div class="form-fieldset">
                <label class="form-label">Premium:</label>
                <input type="checkbox" name="premium" value="1">
            </div>
            <div class="form-fieldset">
                <label class="form-label">Image:</label>
                <input type="file" name="image">
            </div>
            <div class="form-fieldset is-wide">
                <textarea class="form-textarea" name="content" placeholder="Content">{{ $post->content }}</textarea>
            </div>
            <button class="button">Edit post</button>
        </form>
    </div>
@endsection
