<item>
    <title>{{ $post->content }}</title>
    <link>{{ route('posts.show', $post) }}</link>
    <guid>{{ route('posts.show', $post) }}</guid>
    <pubDate>{{ $post->posted_at->format('r') }}</pubDate>
    <author>{{ $post->author->email }} ({{ $post->author->fullname }})</author>
    <category>{{ $post->author->email }} ({{ $post->author->fullname }})</category>
    <description>{{ $post->content }}</description>
</item>
