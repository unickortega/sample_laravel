@extends('layouts.master')

@section('title')
@endsection

@section('content')
    <section class="row new-post">
        <div class="col-md-6 col-md-offset-3">
            @include('includes.message-block')
            <header><h3>What do you have to say?</h3></header>
            <form action="{{ route('post.create') }}" method="post">
                <div class="form-group">
                    <textarea class="form-control" name="body" rows="5" placeholder=""></textarea>
                </div>
                <button class="btn btn-primary" type="submit">Create Post</button>
                <input type="hidden" name="_token" value="{{ Session::token() }}">
            </form>
        </div>
    </section>
    <section class="row posts">
        <div class="col-md-6 col-md-offset-3">
            <header><h3>What other people say...</h3></header>
            @foreach($posts as $post)
            <article class="post">
                <p>{{ $post->body }}</p>
                <div class="info">
                    Posted by {{ $post->user->first_name }} on {{ $post->created_at }}
                </div>
                <div class="interaction">
                    <a href="#">Like</a>|
                    <a href="#">Dislike</a>|
                    <a href="#">Edt</a>|
                    <a href="{{ route('post.delete', ['post_id'=>$post->id]) }}">Delete</a>
                </div>
            </article>
            @endforeach
        </div>
    </section>
@endsection