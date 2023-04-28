<h2 class="mt-2">{{ $post->comments_count == 0 ? "هیچ نظری وجود ندارد" :trans_choice('comments.count', $post->comments_count) }}</h2>

@include ('comments/_form')

<comment-list
    :post-id="{{ $post?$post->id:$comment->post->id }}"
    loading-comments="@lang('comments.loading_comments')"
    data-confirm="@lang('forms.comments.delete')">
</comment-list>
