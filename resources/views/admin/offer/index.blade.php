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
                <a href="{{ route('admin.offer.create') }}" class="btn btn-success">
                    <span class="glyphicon glyphicon-plus"></span> Нова Оферта
                </a>
            </div>
            <div class="col-md-6">
            </div>
        </div>

        @if ($offers->count())
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>Снимка</th>
                    <th>Заглавие</th>
                    <th>Текст</th>
                    <th>Старт</th>
                    <th>Край</th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($offers as $offer)
                    <tr <?= $offer->status() ? 'class="' . $offer->status() . '"' : null ?>>
                        <td>
                            <img src="{{ asset($offer->pic) }}" width="100" />
                        </td>
                        <td>
                            <a href="{{ route('admin.offer.edit', $offer->id) }}">{{ $offer->title }}</a>
                        </td>
                        <td>{!! str_limit(strip_tags($offer->body), 100) !!}</td>
                        <td>{{ $offer->published_at }}</td>
                        <td>{{ $offer->down_at }}</td>
                        <td>
                            <a href="{{ route('admin.offer.edit', $offer->id) }}" class="btn btn-info" title="Редактирай">
                                <span class="glyphicon glyphicon-edit"></span>
                            </a>
                        </td>
                        <td>
                            <a href="{{ route('admin.offer.confirm', $offer->id) }}" class="btn btn-danger" title="Изтрий">
                                <span class="glyphicon glyphicon-remove"></span>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            {!! $offers->links() !!}
        @else
            Няма създадени оферти.
        @endif
    </div>
@endsection