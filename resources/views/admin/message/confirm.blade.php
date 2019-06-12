@extends('admin.layouts.layout')

@section('title', 'Delete '. str_limit(strip_tags($message->body), 100))

@section('content')
    <div class="container">
        {!! Form::open(['method' => 'delete', 'route' => ['admin.message.destroy', $message->id]]) !!}
            <div class="alert alert-danger">
                <strong>Внимание!</strong>
                Сигурни ли сте, че искате да изтриете съобщението <strong>"{!! str_limit(strip_tags($message->body), 50) !!}"</strong>?
            </div>

            {!! Form::submit('Да, изтрий съобщението!', ['class' => 'btn btn-danger']) !!}

            <a href="{{ route('admin.message.index') }}" class="btn btn-success">
                <strong>Не, върни ме обратно!</strong>
            </a>
        {!! Form::close() !!}
    </div>
@endsection