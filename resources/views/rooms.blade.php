@extends('layouts.main')



@section('meta')

    <title>{{ trans('site.accommodation_title') }}</title>

    <meta name="description" content="{{ trans('site.accommodation_description') }}">



    <meta property="og:title" content="{{ trans('site.accommodation_title') }}" />

    <meta property="og:description" content="{{ trans('site.accommodation_description') }}" />

    <meta property="og:type" content="website" />

    <meta property="og:image" content="http://www.sinjirite.bg/images/nastanyavane.jpg" />

    <meta property="og:url" content="http://www.sinjirite.bg/nastanyavane" />

    <meta property="og:site_name" content="{{ trans('site.home_title') }}" />

@endsection



@section('banner')

    <picture>

        <source srcset="{{ asset('/images/mobile/nastanyavane_767.jpg') }}" media="(max-width: 767px)">

        <img srcset="{{ asset('/images/nastanyavane.jpg') }}" alt="Настаняване" class="img-responsive">

    </picture>

@endsection



@section('content')



    <div class="container">

        <div class="margin-40 hidden-sm hidden-xs"></div>

        <div class="row">

            <div class="col-md-4">

                <h2>{{ trans('site.guest_house_3') }}</h2>

                <p>{{ trans('site.guest_house_3_1') }}</p>

                <p>{!! trans('site.guest_house_3_2') !!}</p>

            </div>

            <div class="margin-20 hidden-md hidden-lg"></div>

            <div class="col-md-4">

                <img class="img-responsive" src="{{ asset('/images/kyshta_za_gosti.jpg') }}" alt="Къща за гости">

            </div>

            <div class="margin-20 hidden-md hidden-lg"></div>

            <div class="col-md-4">

                <img class="img-responsive" src="{{ asset('/images/trapezariya.jpg') }}" alt="Трапезария">

            </div>

        </div>



        <div class="margin-40 hidden-sm hidden-xs"></div>



        <div class="row">

            <div class="col-md-4 col-md-push-8">

                <h2>{{ trans('site.guest_house_2') }}</h2>

                <p>{{ trans('site.guest_house_2_1') }}</p>

                <p>{!! trans('site.guest_house_2_2') !!}</p>

            </div>

            <div class="margin-20 hidden-md hidden-lg"></div>

            <div class="col-md-4 col-md-pull-4">

                <img class="img-responsive" src="{{ asset('/images/spalnya3.jpg') }}" alt="Спалня">

            </div>

            <div class="margin-20 hidden-md hidden-lg"></div>

            <div class="col-md-4 col-md-pull-4">

                <img class="img-responsive" src="{{ asset('/images/spalnya4_1.jpg') }}" alt="Спалня">

            </div>

        </div>



        <div class="margin-40 hidden-sm hidden-xs"></div>



        <div class="row" style="padding-bottom: 30px;">

            <div class="margin-20 hidden-md hidden-lg"></div>

            <div class="col-md-4">

                <p>{!! trans('site.guest_house_text') !!}</p>

            </div>



            <div class="margin-20 hidden-md hidden-lg"></div>

            <div class="col-md-4">

                <img class="img-responsive" src="{{ asset('/images/dnevna.jpg') }}" alt="Дневна">

            </div>



            <div class="margin-20 hidden-md hidden-lg"></div>

            <div class="col-md-4">

                <img class="img-responsive" src="{{ asset('/images/kuhnya.jpg') }}" alt="Кухня">

            </div>

        </div>



        <div class="row" style="padding-bottom: 80px;">

            <div class="col-md-4 col-md-push-8">

                <p>{!! trans('site.guest_house_text_1') !!}</p>

                <p>{!! trans('site.guest_house_text_2') !!}</p>

                <p>{!! trans('site.guest_house_text_4') !!}</p>

                <p>{!! trans('site.guest_house_text_3') !!}</p>

                <div class="ornament hidden-sm hidden-xs" style="margin-top: 30px;"></div>

            </div>

            <div class="margin-20 hidden-md hidden-lg"></div>

            <div class="col-md-4 col-md-pull-4">

                <img class="img-responsive" src="{{ asset('/images/spalnya2.jpg') }}" alt="Спалня">

            </div>

            <div class="margin-20 hidden-md hidden-lg"></div>

            <div class="col-md-4 col-md-pull-4">

                <img class="img-responsive" src="{{ asset('/images/banya.jpg') }}" alt="Баня">

            </div>



        </div>



    </div>



@endsection