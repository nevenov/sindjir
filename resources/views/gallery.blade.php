@extends('layouts.main')

@section('meta')
    <title>{{ trans('site.gallery_title') }}</title>
    <meta name="description" content="{{ trans('site.gallery_description') }}">

    <meta property="og:title" content="{{ trans('site.gallery_title') }}" />
    <meta property="og:description" content="{{ trans('site.gallery_description') }}" />
    <meta property="og:type" content="website" />
    <meta property="og:image" content="http://www.sinjirite.bg/images/galeriya.jpg" />
    <meta property="og:url" content="http://www.sinjirite.bg/galeriya" />
    <meta property="og:site_name" content="{{ trans('site.home_title') }}" />
@endsection

@section('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/fancybox.css') }}" />
@endsection

@section('banner')
    <picture>
        <source srcset="{{ asset('/images/mobile/galeriya_767.jpg') }}" media="(max-width: 767px)">
        <img srcset="{{ asset('/images/galeriya.jpg') }}" alt="Галерия" class="img-responsive">
    </picture>
@endsection

@section('content')
    <div class="container padding">
        <div id="gallery">
            <?php
                $files = scandir($_SERVER["DOCUMENT_ROOT"] . '/' . 'images/gallery');

                $photos = array_where($files, function ($key, $value) {
                    return ends_with($value, '.jpg');
                });
            ?>
            @foreach($photos as $photo)
                <a class="fancybox" rel="group" href="{{ asset('/images/gallery/'. $photo) }}">
                    <picture>
                        <source srcset="{{ asset('/images/gallery/'. $photo) }}" media="(max-width: 767px)">
                        <source srcset="{{ asset('/images/gallery/'. $photo) }}" media="(max-width: 991px)">
                        <img srcset="{{ asset('/images/gallery/thumbs/'. $photo) }}" class="img-responsive">
                    </picture>
                </a>
            @endforeach
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript" src="{{ asset('js/jquery.fancybox.pack.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $(".fancybox").fancybox();
        });
    </script>
@endsection