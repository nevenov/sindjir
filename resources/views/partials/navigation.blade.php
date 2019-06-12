<div class="navbar-header">

    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sinjiriteCollapse" aria-expanded="false">

        <span class="sr-only">Toggle navigation</span>

        <span class="icon-bar"></span>

        <span class="icon-bar"></span>

        <span class="icon-bar"></span>

    </button>

</div>

<div class="collapse navbar-collapse" id="sinjiriteCollapse">

    <ul class="nav navbar-nav">

        @if (LaravelLocalization::getCurrentLocale() == 'bg')

            <li>

                <a href="{{ LaravelLocalization::getLocalizedURL(null, url('/'), null) }}">{{ trans('site.home') }}</a>

            </li>



            <li class="{{ Request::is('za-kompleksa') ? 'active' : '' }}">

                <a href="{{ LaravelLocalization::getLocalizedURL(null, url('za-kompleksa'), null) }}">{{ trans('site.about') }}</a>

            </li>



            <li class="{{ Request::is('nastanyavane') ? 'active' : '' }}">

                <a href="{{ LaravelLocalization::getLocalizedURL(null, url('nastanyavane'), null) }}">{{ trans('site.rooms') }}</a>

            </li>



            <li class="{{ Request::is('tseni-i-reservatsii') ? 'active' : '' }}">

                <a href="{{ LaravelLocalization::getLocalizedURL(null, url('tseni-i-reservatsii'), null) }}">{{ trans('site.prices') }}</a>

            </li>
            
            
            
            

            <!--- <li class="{{ Request::is('menuto') ? 'active' : '' }}">

                <a href="{{ LaravelLocalization::getLocalizedURL(null, url('menuto'), null) }}">{{ trans('site.menuto') }}</a>

            </li> --->



            <li class="{{ Request::is('galeriya') ? 'active' : '' }}">

                <a href="{{ LaravelLocalization::getLocalizedURL(null, url('galeriya'), null) }}">{{ trans('site.gallery') }}</a>

            </li>



            <li class="{{ Request::is('razvlecheniya') ? 'active' : '' }}">

                <a href="{{ LaravelLocalization::getLocalizedURL(null, url('razvlecheniya'), null) }}">{{ trans('site.entertainment') }}</a>

            </li>



            <li class="{{ Request::is('kontakti') ? 'active' : '' }}">

                <a href="{{ LaravelLocalization::getLocalizedURL(null, url('kontakti'), null) }}">{{ trans('site.contacts') }}</a>

            </li>

        @else

            <li>

                <a href="{{ LaravelLocalization::getLocalizedURL(null, url('/'), null) }}">{{ trans('site.home') }}</a>

            </li>



            <li class="{{ Request::is('en/about') ? 'active' : '' }}">

                <a href="{{ LaravelLocalization::getLocalizedURL(null, url('za-kompleksa'), null) }}">{{ trans('site.about') }}</a>

            </li>



            <li class="{{ Request::is('en/accommodation') ? 'active' : '' }}">

                <a href="{{ LaravelLocalization::getLocalizedURL(null, url('nastanyavane'), null) }}">{{ trans('site.rooms') }}</a>

            </li>



            <li class="{{ Request::is('en/prices-and-reservations') ? 'active' : '' }}">

                <a href="{{ LaravelLocalization::getLocalizedURL(null, url('tseni-i-reservatsii'), null) }}">{{ trans('site.prices') }}</a>

            </li>
            
            
            <!--- <li class="{{ Request::is('en/menuto') ? 'active' : '' }}">

                <a href="{{ LaravelLocalization::getLocalizedURL(null, url('menuto'), null) }}">{{ trans('site.menuto') }}</a>

            </li> --->



            <li class="{{ Request::is('en/gallery') ? 'active' : '' }}">

                <a href="{{ LaravelLocalization::getLocalizedURL(null, url('galeriya'), null) }}">{{ trans('site.gallery') }}</a>

            </li>



            <li class="{{ Request::is('en/entertainment') ? 'active' : '' }}">

                <a href="{{ LaravelLocalization::getLocalizedURL(null, url('razvlecheniya'), null) }}">{{ trans('site.entertainment') }}</a>

            </li>



            <li class="{{ Request::is('en/contacts') ? 'active' : '' }}">

                <a href="{{ LaravelLocalization::getLocalizedURL(null, url('kontakti'), null) }}">{{ trans('site.contacts') }}</a>

            </li>

        @endif

    </ul>

</div>