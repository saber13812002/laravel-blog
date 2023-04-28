@auth
    <comment-form
        :post-id="{{ $post->id }}"
        placeholder="@lang('comments.placeholder.content')"
        button="@lang('comments.comment')">
    </comment-form>
@else
    <x-alert type="warning">
        <a href="/login?redirect={{ $post->id }}">
            @lang('comments.sign_in_to_comment') <a/>
    </x-alert>
@endauth
