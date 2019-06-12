@extends('layouts.main')

@section('meta')
    <title>{{ trans('site.entertainment_title') }}</title>
    <meta name="description" content="{{ trans('site.entertainment_description') }}">

    <meta property="og:title" content="{{ trans('site.entertainment_title') }}" />
    <meta property="og:description" content="{{ trans('site.entertainment_description') }}" />
    <meta property="og:type" content="website" />
    <meta property="og:image" content="http://www.sinjirite.bg/images/razvlecheniya.jpg" />
    <meta property="og:url" content="http://www.sinjirite.bg/razvlecheniya" />
    <meta property="og:site_name" content="{{ trans('site.home_title') }}" />
@endsection

@section('banner')
    <picture>
        <source srcset="{{ asset('/images/mobile/razvlecheniya_767.jpg') }}" media="(max-width: 767px)">
        <img srcset="{{ asset('/images/razvlecheniya.jpg') }}" alt="Развлечения" class="img-responsive">
    </picture>
@endsection

@section('content')

    <div class="container padding">
        <div class="row">
            <div class="col-md-7 col-md-push-5">
                <img style="margin-bottom: 20px;" class="img-responsive" src="{{ asset('/images/entertainment/igri_na_otkrito.jpg') }}" alt="Игри на открито">
            </div>
            <div class="col-md-5 col-md-pull-7">
                <p style="margin-bottom: 40px;">{{ trans('site.entertainment_intro') }}</p>
                <h2>{{ trans('site.fishing') }}</h2>
                <p>{{ trans('site.fishing_text') }}</p>
                <div class="ornament" style="margin-top: 30px;"></div>
            </div>

        </div>
        <div class="margin-40 hidden-sm hidden-xs"></div>
        <div class="row">
            <div class="col-md-5">
                <img class="img-responsive" src="{{ asset('/images/entertainment/eko_pateki.jpg') }}" alt="Еко пътеки">
            </div>
            <div class="col-md-7">
                <h2>{{ trans('site.hiking_trails') }}</h2>
                <p>{{ trans('site.hiking_trails_intro') }}</p>
                <h3 class="hiking">{{ trans('site.trail1_title') }}</h3>
                <p>{{ trans('site.trail1_text') }}</p>
                <h3  class="hiking">{{ trans('site.trail2_title') }}</h3>
                <p>{{ trans('site.trail2_text') }}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-5 col-md-push-7">
                <img style="margin: 30px 0;" class="img-responsive" src="{{ asset('/images/entertainment/hristovski_vodopad.jpg') }}" alt="Христовски водопад">
            </div>
            <div class="col-md-7 col-md-pull-5">
                <h3  class="hiking">{{ trans('site.trail3_title') }}</h3>
                <p>{{ trans('site.trail3_text') }}</p>
                <h3  class="hiking">{{ trans('site.trail4_title') }}</h3>
                <p>{{ trans('site.trail4_text') }}</p>
            </div>

        </div>
        <div class="row padding">
            <div class="col-md-7">
                <img class="img-responsive" src="{{ asset('/images/entertainment/kulturno_nasledstvo.jpg') }}" alt="Културно наследство">
            </div>
            <div class="col-md-5">
                <h2>{{ trans('site.cultural_heritage') }}</h2>
                <p>{{ trans('site.cultural_heritage_intro') }}</p>
                <ul style="padding-left: 15px;">
                    <li>{{ trans('site.cultural_heritage1') }}</li>
                    <li>{{ trans('site.cultural_heritage2') }}</li>
                    <li>{{ trans('site.cultural_heritage3') }}</li>
                    <li>{{ trans('site.cultural_heritage4') }}</li>
                    <li>{{ trans('site.cultural_heritage5') }}</li>
                    <li>{{ trans('site.cultural_heritage6') }}</li>
                </ul>

                <div class="ornament" style="margin-top: 30px;"></div>
            </div>
        </div>
    </div>

@endsection