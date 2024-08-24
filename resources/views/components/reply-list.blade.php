<div>
    @foreach($replies as $reply)
        <div>
            <strong>{{ $reply->user->name }}</strong>: {{ $reply->content }}
        </div>
    @endforeach
</div>
