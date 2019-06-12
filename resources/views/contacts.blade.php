@extends('layouts.main')

@section('meta')
    <title>{{ trans('site.contacts_title') }}</title>
    <meta name="description" content="{{ trans('site.contacts_description') }}">

    <meta property="og:title" content="{{ trans('site.contacts_title') }}" />
    <meta property="og:description" content="{{ trans('site.contacts_description') }}" />
    <meta property="og:type" content="website" />
    <meta property="og:image" content="http://www.sinjirite.bg/images/kontakti.jpg" />
    <meta property="og:url" content="http://www.sinjirite.bg/kontakti" />
    <meta property="og:site_name" content="{{ trans('site.home_title') }}" />
@endsection

@section('banner')
    <picture>
        <source srcset="{{ asset('/images/mobile/kontakti_767.jpg') }}" media="(max-width: 767px)">
        <img srcset="{{ asset('/images/kontakti.jpg') }}" alt="Контакти" class="img-responsive">
    </picture>
@endsection

@section('content')

    <div style="margin: 30px 0;">
        <div class="container">
            <div class="row">
                <div class="col-md-5 col-md-push-7">
                    <h2 style="color: #855a38; margin-top: 0;">{{ trans('site.hotel_complex') }}</h2>
                    <div class="contact-section">
                        <p><strong>{{ trans('site.reception') }}</strong> 0890 20 27 27</p>
                        <p><strong>{{ trans('site.manager') }}</strong> 0895 600 186</p>
                        <p><strong>E-mail:</strong> <span id="emailDisplay"></span></p>
                        <p><strong>{{ trans('site.address') }}</strong> {{ trans('site.address_text') }}</p>
                    </div>
                    <div>
                        <p><strong>{{ trans('site.bank_account') }}</strong></p>
                        <p><strong>{{ trans('site.bank') }}</strong> {{ trans('site.bank_text') }}</p>
                        <p><strong>IBAN:</strong> BG06STSA93000020000606</p>
                        <p><strong>BIC:</strong> STSABGSF</p>
                        <p><strong>{{ trans('site.beneficiary') }}</strong> {{ trans('site.firm_name') }}</p>
                    </div>
                </div>
                <div class="col-md-1 col-md-pull-5"></div>
                <div class="col-md-6 col-md-pull-6">
                    @if (Session::has('message'))
                        <div class="alert alert-success">{{ Session::get('message') }}</div>
                    @endif

                    @include('partials.contact_form')
                </div>
            </div>
        </div>
    </div>

    <div id="mapContacts"></div>
@endsection

@section('scripts')
    <script src="https://maps.googleapis.com/maps/api/js?language={{ LaravelLocalization::getCurrentLocale() }}"></script>
    <script>

        document.getElementById("emailDisplay").innerHTML=email;

        function initialize() {
            var mapCanvas = document.getElementById('mapContacts');

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

            marker.setMap(map);
            infowindow.open(map, marker);
        }

        google.maps.event.addDomListener(window, 'load', initialize);

    </script>
@endsection