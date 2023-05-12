<div class="card">
  <div class="card-body">
    <h4 v-pre class="card-title">{{ $comment->content }}</h4>

      <p class="card-text"><small v-pre
                                  class="text-muted">{{ link_to_route('users.show', $comment->post?$comment->post->author->fullname:"", $comment->post?$comment->post->author:"") }}</small>
      </p>

      <p class="card-text">
          <small class="text-muted">{{ humanize_date($comment->post?$comment->post->posted_at:"") }}</small><br>
    </p>
  </div>
</div>
