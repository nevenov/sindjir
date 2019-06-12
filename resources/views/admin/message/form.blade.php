@extends('admin.layouts.layout')

@section('title', $message->exists ? 'Редактиране ' . str_limit(strip_tags($message->body), 100) : 'Ново Съобщение')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/bootstrap-datetimepicker.min.css') }}"/>
@endsection

@section('content')
    <div class="container">

        <ol class="breadcrumb">
            <li><a href="{{ route('admin.message.index') }}">Съобщения</a></li>
            <li class="active"><?= str_limit(strip_tags($message->body), 100) ?></li>
        </ol>

        @include('admin.partials.errors')

        @if (session('status'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert">x</button>
                {{ session('status') }}
            </div>
        @endif

        {!! Form::model($message, [
            'method' => $message->exists ? 'put' : 'post',
            'route' => $message->exists ? ['admin.message.update', $message->id] : ['admin.message.store'],
            'files' => true
        ]) !!}

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    {!! Form::label('published_at', 'Старт') !!}
                    <div class="input-group date" id="startDatePicker">
                        {!! Form::text('published_at', null, ['class' => 'form-control']) !!}
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::label('down_at', 'Край') !!}
                    <div class="input-group date"  id="endDatePicker">
                        {!! Form::text('down_at', null, ['class' => 'form-control']) !!}
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
            </div>
        </div>


        <div class="form-group">
            {!! Form::label('body', 'Текст') !!}
            {!! Form::textarea('body', null, ['class' => 'form-control']) !!}
        </div>

        {!! Form::submit($message->exists ? 'Запази съобщението' : 'Създай съобщението', ['class' => 'btn btn-success']) !!}

        {!! Form::close() !!}
    </div>
@endsection

@section('scripts')
    <script type="text/javascript" src="{{ asset('js/reservation.js') }}"></script>
    <script src="//cdn.ckeditor.com/4.8.0/basic/ckeditor.js"></script>

    <script>
        $(document).ready(function() {

            moment.locale('bg');

            var startDatePicker = $('#startDatePicker');
            var endDatePicker = $('#endDatePicker');

            startDatePicker.datetimepicker({
                allowInputToggle: true,
                locale: 'bg',
                format: 'DD.MM.YYYY',
                showClear: true,
                tooltips: {
                    today: '{{ trans('site.choose_today') }}',
                    clear: '{{ trans('site.clear_selection') }}',
                    selectMonth: '{{ trans('site.select_month') }}',
                    prevMonth: '{{ trans('site.previous_month') }}',
                    nextMonth: '{{ trans('site.next_month') }}',
                    selectYear: '{{ trans('site.select_year') }}',
                    prevYear: '{{ trans('site.previous_year') }}',
                    nextYear: '{{ trans('site.next_year') }}'
                }
            });

            endDatePicker.datetimepicker({
                allowInputToggle: true,
                locale: 'bg',
                format: 'DD.MM.YYYY',
                showClear: true,
                useCurrent: false,
                tooltips: {
                    today: '{{ trans('site.choose_today') }}',
                    clear: '{{ trans('site.clear_selection') }}',
                    selectMonth: '{{ trans('site.select_month') }}',
                    prevMonth: '{{ trans('site.previous_month') }}',
                    nextMonth: '{{ trans('site.next_month') }}',
                    selectYear: '{{ trans('site.select_year') }}',
                    prevYear: '{{ trans('site.previous_year') }}',
                    nextYear: '{{ trans('site.next_year') }}'
                }
            });

            startDatePicker.on("dp.change", function (e) {
                endDatePicker.data("DateTimePicker").minDate(e.date);
            });

            CKEDITOR.replace('body', {
                language: 'bg',
                height: 350,
                contentsCss: '{{ asset('css/cke.css') }}'
            });

        });

    </script>
@endsection