@extends('admin.layouts.layout')

@section('content')
    <div class="container-fluid">

        @if (session('status'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert">x</button>
                {!! session('status') !!}
            </div>
        @endif

        <div class="row" style="margin-top: 20px; margin-bottom: 20px;">
            <div class="col-md-6">
                <a href="{{ route('admin.message.create') }}" class="btn btn-success">
                    <span class="glyphicon glyphicon-plus"></span> Ново Съобщение
                </a>
            </div>
            <div class="col-md-6">
            </div>
        </div>

        @if ($messages->count())
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>Текст</th>
                    <th>Старт</th>
                    <th>Край</th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($messages as $message)
                    <tr <?= $message->status() ? 'class="' . $message->status() . '"' : null ?>>
                        <td>
                            <a href="{{ route('admin.message.edit', $message->id) }}">
                                {!! str_limit(strip_tags($message->body), 100) !!}
                            </a>
                        </td>
                        <td>{{ $message->published_at }}</td>
                        <td>{{ $message->down_at }}</td>
                        <td>
                            <a href="{{ route('admin.message.edit', $message->id) }}" class="btn btn-info" title="Редактирай">
                                <span class="glyphicon glyphicon-edit"></span>
                            </a>
                        </td>
                        <td>
                            <a href="{{ route('admin.message.confirm', $message->id) }}" class="btn btn-danger" title="Изтрий">
                                <span class="glyphicon glyphicon-remove"></span>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            {!! $messages->links() !!}
        @else
            Няма създадени съобщения.
        @endif
    </div>
@endsection