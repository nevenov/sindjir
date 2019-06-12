@extends('admin.layouts.layout')

@section('title', $offer->exists ? 'Редактиране ' . $offer->title : 'Нова Оферта')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/bootstrap-datetimepicker.min.css') }}"/>
@endsection

@section('content')
    <div class="container">

        <ol class="breadcrumb">
            <li><a href="{{ route('admin.offer.index') }}">Оферти</a></li>
            <li class="active"><?= $offer->title ?></li>
        </ol>

        @include('admin.partials.errors')

        @if (session('status'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert">x</button>
                {{ session('status') }}
            </div>
        @endif

        {!! Form::model($offer, [
            'method' => $offer->exists ? 'put' : 'post',
            'route' => $offer->exists ? ['admin.offer.update', $offer->id] : ['admin.offer.store'],
            'files' => true
        ]) !!}

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    {!! Form::label('title', 'Заглавие') !!}
                    {!! Form::text('title', null, ['class' => 'form-control']) !!}
                </div>

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
                <div class="row">
                    <div class="col-md-5">
                        <div class="form-group">
                            @if ($offer->exists)
                                <img src="{{ asset($offer->pic) }}" width="220" />
                            @else
                                <img src="{{ asset('/images/no_photo.gif') }}" width="220" />
                            @endif
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="form-group">
                            {!! Form::file('image') !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="form-group">
            {!! Form::label('body', 'Текст') !!}
            {!! Form::textarea('body', null, ['class' => 'form-control']) !!}
        </div>

        {!! Form::submit($offer->exists ? 'Запази офертата' : 'Създай офертата', ['class' => 'btn btn-success']) !!}

        {!! Form::close() !!}
    </div>
@endsection

@section('scripts')
    <script type="text/javascript" src="{{ asset('js/reservation.js') }}"></script>
    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>

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
                extraPlugins: 'justify,font,stylesheetparser',
                contentsCss: '{{ asset('css/cke.css') }}',
                removePlugins: 'image'
            });

            CKEDITOR.stylesSet.add( 'default',
                [
                    // Block styles
                    {
                        name : 'Info Box',
                        element : 'div',
                        attributes : {
                            'class' : 'info-box'
                        }
                    },
                    {
                        name: 'Gray Box',
                        element: 'div',
                        attributes: {
                            'class' : 'gray-box'
                        }
                    }
                ]
            );

        });

    </script>
@endsection