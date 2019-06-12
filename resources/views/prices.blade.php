@extends('layouts.main')



@section('meta')

    <title>{{ trans('site.prices_title') }}</title>

    <meta name="description" content="{{ trans('site.prices_description') }}">



    <meta property="og:title" content="{{ trans('site.prices_title') }}" />

    <meta property="og:description" content="{{ trans('site.prices_description') }}" />

    <meta property="og:type" content="website" />

    <meta property="og:image" content="http://www.sinjirite.bg/images/rezervatsii.jpg" />

    <meta property="og:url" content="http://www.sinjirite.bg/tseni" />

    <meta property="og:site_name" content="{{ trans('site.home_title') }}" />

@endsection



@section('banner')

    <picture>

        <source srcset="{{ asset('/images/mobile/rezervatsii_767.jpg') }}" media="(max-width: 767px)">

        <img srcset="{{ asset('/images/rezervatsii.jpg') }}" alt="Цени и резервации" class="img-responsive">

    </picture>

@endsection



@section('content')



    <div class="container padding">



        <div class="row">



            <div class="col-md-8 col-md-push-4">



                @if ($messages->count())

                    @include('partials.messages')

                    <hr>

                @endif



                @if ($offers->count())

                    @include('partials.promo_offers')

                    <hr>

                @endif



                <h2 class="text-center">{{ trans('site.house_rental') }}</h2>

                <p class="font-16">{{ trans('site.house_rental1') }}</p>

                <div class="row">

                    <div class="col-md-6">

                        <div class="price-card">

                            <div class="circle text-center">

                                <div class="price">250<span>{{ trans('site.lv.') }}</span></div>

                            </div>

                            <div class="description text-center">{!! trans('site.house_rental_price1') !!}</div>

                        </div>

                    </div>

                    <div class="col-md-6">

                        <div class="price-card">

                            <div class="circle text-center">

                                <div class="price">230<span>{{ trans('site.lv.') }}</span></div>

                            </div>

                            <div class="description text-center">{!! trans('site.house_rental_price2') !!}</div>

                        </div>

                    </div>

                </div>



                <hr>



                <h2 class="text-center">{{ trans('site.room_rental') }}</h2>

                <p class="font-16">{{ trans('site.room_rental1') }}</p>

                <div class="row">

                    <div class="col-md-6">

                        <div class="price-card">

                            <div class="circle text-center">

                                <div class="price">180<span>{{ trans('site.lv.') }}</span></div>

                            </div>

                            <div class="description text-center">{!! trans('site.house_rental_price1') !!}</div>

                        </div>

                    </div>

                    <div class="col-md-6">

                        <div class="price-card">

                            <div class="circle text-center">

                                <div class="price">165<span>{{ trans('site.lv.') }}</span></div>

                            </div>

                            <div class="description text-center">{!! trans('site.house_rental_price2') !!}</div>

                        </div>

                    </div>

                </div>



                <hr>



                <h2 class="text-center">{{ trans('site.menu') }}</h2>

                <div style="padding: 30px 0;" class="text-center">

                    @if(LaravelLocalization::getCurrentLocale() == 'bg')

                        <a class="btn btn-primary btn-lg" style="margin-right: 30px;"

                           href="{{ asset('menu/menu_sinjirite_hrana_2017_1.pdf') }}" target="_blank">{{ trans('site.food') }}</a>

                        <a class="btn btn-primary btn-lg"

                           href="{{ asset('menu/menu_sinjirite_napitki_2017.pdf') }}" target="_blank">{{ trans('site.beverages') }}</a>

                    @else

                        <a class="btn btn-primary btn-lg" style="margin-right: 30px;"

                           href="{{ asset('menu/food_menu_sinjirite_2017_1.pdf') }}" target="_blank">{{ trans('site.food') }}</a>

                        <a class="btn btn-primary btn-lg"

                           href="{{ asset('menu/beverages_menu_sinjirite_2017.pdf') }}" target="_blank">{{ trans('site.beverages') }}</a>

                    @endif



                </div>



                <hr>



                {{--<p class="font-16 text-center" style="color: red;">Няма свободни места за Нова Година!</p>--}}

                {{--<hr>--}}



                <p class="font-16">{{ trans('site.prices1') }}</p>

                <p class="font-16">{!! trans('site.prices3') !!}</p>

                <p class="font-16">{!! trans('site.prices5') !!}</p>

                <br/>

                <p><i>{{ trans('site.prices4') }}</i></p>



                <div class="ornament" style="margin-top: 30px;"></div>

            </div>



            <div class="col-md-4 col-md-pull-8">

                @if (Session::has('message'))

                    <div class="alert alert-success">{{ Session::get('message') }}</div>

                @endif

                @include('partials.reservation_form')

            </div>



        </div>

    </div>

@endsection



@section('scripts')

    <script type="text/javascript" src="{{ asset('js/reservation.js') }}"></script>



    <script>



        var arriveDatePicker = $('#arriveDatePicker');

        var leaveDatePicker = $('#leaveDatePicker');



        arriveDatePicker.datetimepicker({

            allowInputToggle: true,

            locale: '{{ LaravelLocalization::getCurrentLocale() }}',

            format: 'L',

            showClear: true,

            minDate: moment(),

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

            {{--defaultDate: '{{ old('published_at', $post->published_at) }}'--}}

        });



        leaveDatePicker.datetimepicker({

            allowInputToggle: true,

            locale: '{{ LaravelLocalization::getCurrentLocale() }}',

            format: 'L',

            showClear: true,

            minDate: moment(),

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



        arriveDatePicker.on("dp.change", function (e) {

            leaveDatePicker.data("DateTimePicker").minDate(e.date);

        });



    </script>

@endsection