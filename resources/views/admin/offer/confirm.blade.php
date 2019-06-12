@extends('admin.layouts.layout')

@section('title', 'Delete '. $offer->title)

@section('content')
    <div class="container">
        {!! Form::open(['method' => 'delete', 'route' => ['admin.offer.destroy', $offer->id]]) !!}
            <div class="alert alert-danger">
                <strong>Внимание!</strong>
                Сигурни ли сте, че искате да изтриете офертата <strong>"{{ $offer->title }}"</strong>?
            </div>

            {!! Form::submit('Да, изтрий офертата!', ['class' => 'btn btn-danger']) !!}

            <a href="{{ route('admin.offer.index') }}" class="btn btn-success">
                <strong>Не, върни ме обратно!</strong>
            </a>
        {!! Form::close() !!}
    </div>
@endsection