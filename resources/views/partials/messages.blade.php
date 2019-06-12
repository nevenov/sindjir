@foreach($messages as $message)
<div class="alert alert-warning font-16">
    {!! $message->body !!}
</div>
@endforeach
