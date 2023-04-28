@foreach($comments as $comment)
    <div class="p-2" >
        @include('comments/_show')
    </div>
@endforeach
