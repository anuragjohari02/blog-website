@extends('layouts.masterblog')

@section('content')
    <!-- Post preview-->
    @foreach ($posts as $post)
        <div class="post-preview">
            <a href="/{{ $post->slug }}">
                <h2 class="post-title">{{ $post->title }}</h2>
                <h5 class="post-subtitle">{!! Str::limit($post->content, 100) !!}</h5>
            </a>
            <p class="post-meta">
                Posted by <a href="">{{ $post->user->name }}</a>
                on {{ $post->created_at->format('M d, Y') }}
            </p>
        </div>
        <!-- Divider-->
        <hr class="my-4" />
    @endforeach

    <!-- Pager-->
    {{ $posts->links() }}
@endsection
