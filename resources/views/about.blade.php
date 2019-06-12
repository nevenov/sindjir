@extends('layouts.main')

@section('meta')
    <title>{{ trans('site.about_title') }}</title>
    <meta name="description" content="{{ trans('site.about_description') }}">

    <meta property="og:title" content="{{ trans('site.about_title') }}" />
    <meta property="og:description" content="{{ trans('site.about_description') }}" />
    <meta property="og:type" content="website" />
    <meta property="og:image" content="http://www.sinjirite.bg/images/za_kompleksa.jpg" />
    <meta property="og:url" content="http://www.sinjirite.bg/za-kompleksa" />
    <meta property="og:site_name" content="{{ trans('site.home_title') }}" />
@endsection

@section('banner')
    <picture>
        <source srcset="{{ asset('/images/mobile/za_kompleksa_767.jpg') }}" media="(max-width: 767px)">
        <img srcset="{{ asset('/images/za_kompleksa.jpg') }}" alt="За Комплекса" class="img-responsive">
    </picture>
@endsection

@section('content')

    <div class="padding" style="background: #f6efda;">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <p class="text-center font-16" style="margin-bottom: 25px; color: #51382f;">{!! trans('site.about_intro') !!}</p>
                    <div class="ornament" style="margin-bottom: 0;"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="container padding">
        <div class="row padding">
            <div class="col-md-8 col-md-push-4">
                <img class="img-responsive" src="{{ asset('/images/priroda.jpg') }}" alt="Природата в Еленския балкан">
            </div>
            <div class="col-md-4 col-md-pull-8">
                <h2>{{ trans('site.balkan_mountains_magic') }}</h2>
                <p>{{ trans('site.balkan_mountains_text1') }}</p>
                <br/>
                <p>{{ trans('site.balkan_mountains_text2') }}</p>
            </div>
        </div>

        <div class="row padding">
            <div class="col-md-8">
                <img class="img-responsive" src="{{ asset('/images/luksozni_stai.jpg') }}" alt="Луксозни хотелски стаи">
            </div>
            <div class="col-md-4">
                <h2>{{ trans('site.luxury_interior') }}</h2>
                <p>{{ trans('site.luxury_text') }}</p>
            </div>

        </div>

        <div class="row padding">
            <div class="col-md-8 col-md-push-4">
                <img class="img-responsive" src="{{ asset('/images/kachestvena_hrana.jpg') }}" alt="Външно барбекю">
            </div>
            <div class="col-md-4 col-md-pull-8">
                <h2>{{ trans('site.delicious_food') }}</h2>
                <p>{{ trans('site.delicious_food_text_1') }}</p>
                <p>{{ trans('site.delicious_food_text_2') }}</p>
                <p>{{ trans('site.delicious_food_text_3') }}</p>
            </div>
        </div>

        <div class="row padding">
            <div class="col-md-8">
                <img class="img-responsive" src="{{ asset('/images/snack_bar.jpg') }}" alt="Снекбар">
            </div>
            <div class="col-md-4">
                <h2>{{ trans('site.bar') }}</h2>
                <p>{{ trans('site.bar_text') }}</p>
            </div>

        </div>

        <div class="row padding">
            <div class="col-md-8 col-md-push-4">
                <img class="img-responsive" src="{{ asset('/images/kids_playground.jpg') }}" alt="Влакче за деца и футболни вратички">
            </div>
            <div class="col-md-4 col-md-pull-8">
                <h2>{{ trans('site.kids') }}</h2>
                <p>{{ trans('site.kids_text') }}</p>
                <div class="ornament" style="margin-top: 30px;"></div>
            </div>
        </div>

    </div>

@endsection