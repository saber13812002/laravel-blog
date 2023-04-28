@extends('layouts.app')

@section('content')
    @guest
    @else
        <a href="{{ route('admin.posts.edit', $post) }}"
           class="btn btn-primary btn-sm {{ request()->route()->named('admin.dashboard') ? 'active' : '' }}">
            <i class="fa fa-pencil" aria-hidden="true"></i>
        </a>
    @endguest
    <div class="bg-white p-3 post-card">
        @if ($post->hasThumbnail())
            {{ Html::image($post->thumbnail->getUrl('thumb'), $post->name, ['class' => 'card-img-top']) }}
        @endif

        <h1 v-pre>{{ $post->title }}</h1>

        <div class="mb-3">
            <small v-pre
                   class="text-muted"> نوشته شده توسط: {{ link_to_route('users.show', $post->author->fullname, $post->author) }}</small>,
            <small class="text-muted"> در تاریخ: {{ verta($post->posted_at)->formatDifference() }}</small>
        </div>

        <div v-pre class="post-content">
            {!! $post->content !!}
        </div>

        <p class="mt-3">
            <like
                :likes-count="{{ $post->likes_count }}"
                :liked="{{ json_encode($post->isLiked()) }}"
                :item-id="{{ $post->id }}"
                item-type="posts"
                :logged-in="{{ json_encode(Auth::check()) }}"
            />
        </p>
    </div>

    @include ('comments/_list')
@endsection
