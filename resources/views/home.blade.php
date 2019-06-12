@extends('layouts.home')

@section('meta')
    <title>{{ trans('site.home_title') }}</title>
    <meta name="description" content="{{ trans('site.home_description') }}">

    <meta property="og:title" content="{{ trans('site.home_title') }}" />
    <meta property="og:description" content="{{ trans('site.home_description') }}" />
    <meta property="og:type" content="website" />
    <meta property="og:image" content="http://www.sinjirite.bg/images/slide1.jpg" />
    <meta property="og:url" content="http://www.sinjirite.bg" />
    <meta property="og:site_name" content="{{ trans('site.home_title') }}" />
@endsection

@section('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/fancybox.css') }}" />
@endsection

@section('content')

    <div id="lang_bar">
        @if(LaravelLocalization::getCurrentLocale() == 'bg')
            <a rel="alternate" hreflang="en" href="{{ LaravelLocalization::getLocalizedURL('en') }}">EN</a>
        @else
            <a rel="alternate" hreflang="bg" href="{{ LaravelLocalization::getLocalizedURL('bg') }}">BG</a>
        @endif
    </div>

    <div id="logo">
        <a href="{{ url('/') }}">
            <img src="{{ asset('/images/logo.png') }}" alt="Лого" width="190" height="123">
        </a>
    </div>

    <!-- Start main carosusel -->
    <div id="carousel-main" class="carousel slide carousel-fade" data-ride="carousel" data-duration="2000">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#carousel-main" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-main" data-slide-to="1"></li>
            <li data-target="#carousel-main" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
            <div class="item active">
                <picture>
                    <source srcset="{{ asset('/images/mobile/slide1_767.jpg') }}" media="(max-width: 767px)">
                    <img srcset="{{ asset('/images/slide1.jpg') }}" class="img-responsive">
                </picture>
            </div>
            <div class="item">
                <picture>
                    <source srcset="{{ asset('/images/mobile/slide2_767.jpg') }}" media="(max-width: 767px)">
                    <img srcset="{{ asset('/images/slide2.jpg') }}" class="img-responsive">
                </picture>
            </div>
            <div class="item">
                <picture>
                    <source srcset="{{ asset('/images/mobile/slide3_767.jpg') }}" media="(max-width: 767px)">
                    <img srcset="{{ asset('/images/slide3.jpg') }}" class="img-responsive">
                </picture>
            </div>
        </div>
    </div>

    <nav class="navbar navbar-default">
        <div class="container">
            @include('partials.navigation')
        </div>
    </nav>


    <div class="welcome">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <h1 class="text-center" style="color: #855a38; margin: 45px 0 25px 0;">{{ trans('site.welcome') }}</h1>
                    <p class="text-center font-16" style="color: #51382f; margin-bottom: 25px;">
                        {{ trans('site.home_intro') }}
                        <a href="{{ LaravelLocalization::getLocalizedURL(null, url('za-kompleksa'), null) }}">{{ trans('site.Learn_more') }}</a>
                    </p>
                    <div class="ornament"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="gallery-intro">
        <div class="container">
            <img class="img-responsive" src="{{ asset('/images/gallery_intro.jpg') }}" alt="Галерия">
        </div>
    </div>

    <div class="padding">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h2>{{ trans('site.why_our_guests') }}</h2>
                    <ul class="choose-us list-unstyled">
                        <li class="font-16">
                            <span class="diamond"></span>
                            {{ trans('site.luxury_houses') }}
                            <a href="{{ LaravelLocalization::getLocalizedURL(null, url('za-kompleksa'), null) }}">{{ trans('site.Learn_more') }}</a>
                        </li>
                        <li class="font-16">
                            <span class="leaf"></span>
                            {{ trans('site.great_location') }}
                            <a href="{{ LaravelLocalization::getLocalizedURL(null, url('za-kompleksa'), null) }}">{{ trans('site.Learn_more') }}</a>
                        </li>
                        <li class="font-16">
                            <span class="fork"></span>
                            {{ trans('site.great_food') }}
                            <a href="{{ LaravelLocalization::getLocalizedURL(null, url('za-kompleksa'), null) }}">{{ trans('site.Learn_more') }}</a>
                        </li>
                        <li class="font-16">
                            <span class="booking"></span>
                            {{ trans('site.booking_award') }} <strong>Booking<span style="color: #5598FF;">.com</span></strong>&nbsp;
                            <a href="{{ asset('images/booking_award_2016.jpg') }}" class="fancybox">{{ trans('site.Learn_more') }}
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-5">
                    <h2>{{ trans('site.our_location') }}</h2>
                    <div class="map-container">
                        <div id="map"></div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="testimonials">
        <div class="container">
            <div class="testimonials-container">
                <div class="header">{{ trans('site.testimonials') }}</div>

                <span class="left-quote hidden-sm hidden-xs"></span>
                <span class="right-quote hidden-sm hidden-xs"></span>

                <!-- Start testimonials carosusel -->
                <div id="carousel-testimonials" class="carousel slide carousel-fade" data-ride="carousel" data-interval="false" data-duration="2000">

                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                        <li data-target="#carousel-testimonials" data-slide-to="0" class="active"></li>
                        <li data-target="#carousel-testimonials" data-slide-to="1"></li>
                        <li data-target="#carousel-testimonials" data-slide-to="2"></li>
                    </ol>

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner" role="listbox">
                        <div class="item active">
                            <div class="text">{{ trans('site.testimonial1') }}</div>
                            <div class="author">{{ trans('site.testimonial1name') }}<div class="ornament"></div></div>
                        </div>
                        <div class="item">
                            <div class="text">{{ trans('site.testimonial2') }}</div>
                            <div class="author">{{ trans('site.testimonial2name') }}<div class="ornament"></div></div>
                        </div>
                        <div class="item">
                            <div class="text">{{ trans('site.testimonial3') }}</div>
                            <div class="author">{{ trans('site.testimonial3name') }}<div class="ornament"></div></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script src="https://maps.googleapis.com/maps/api/js?language={{ LaravelLocalization::getCurrentLocale() }}"></script>
    <script type="text/javascript" src="{{ asset('js/jquery.fancybox.pack.js') }}"></script>
    <script>
        function initialize() {
            var mapCanvas = document.getElementById('map');

            var mapOptions = {
                center: new google.maps.LatLng(42.929576, 25.879995),
                zoom: 8,
                mapTypeId: google.maps.MapTypeId.ROADMAP,
                disableDefaultUI: true
            };

            var map = new google.maps.Map(mapCanvas, mapOptions);

            var contentString = '<div class="map-info" xmlns="http://www.w3.org/1999/html">'+
                    '<p><strong>{{ trans('site.address') }}</strong> {{ trans('site.address_text') }}<br/>' +
                    '<strong>{{ trans('site.reception') }}</strong> 0890 20 27 27<br/>' +
                    '<strong>E-mail:</strong> contact@sinjirite.bg<br/>' +
                    '<strong>GPS:</strong> 42°54\'47.6"N 25°54\'57.2"E</p>' +
                    '</div>';

            var infowindow = new google.maps.InfoWindow({
                content: contentString
            });

            var marker = new google.maps.Marker({
                position: {lat: 42.91305819999999, lng: 25.915774400000032},
                map: map
            });

            marker.addListener('click', function() {
                infowindow.open(map, marker);
            });
        }

        google.maps.event.addDomListener(window, 'load', initialize);

        $(".fancybox").fancybox();
    </script>
@endsection