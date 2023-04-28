@extends('layouts.rss')

@section('content')
    @each('comments_feed/_show', $comments, 'comment')
@endsection
