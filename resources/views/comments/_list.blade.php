
@include ('comments/_form')

<comment-list
    :post-id="{{ $post->id }}"
    loading-comments="@lang('comments.loading_comments')"
    data-confirm="@lang('forms.comments.delete')">
</comment-list>
