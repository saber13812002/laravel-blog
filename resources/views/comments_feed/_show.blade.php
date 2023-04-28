<item>
    <title>{{ $comment->title }}</title>
    <guid>{{ route('comments.show', $comment) }}</guid>
    <pubDate>{{ $comment->posted_at->format('r') }}</pubDate>
    <author>{{ $comment->author->email }} ({{ $comment->author->fullname }})</author>
    <description>{{ $comment->excerpt() }}</description>
</item>
