{!! Form::open(['route' => 'contact_store', 'class' => 'form']) !!}

<div class="panel panel-default" style="margin-bottom: 50px;">
    <div class="panel-heading">{{ trans('site.contact_form') }}</div>
    <div class="panel-body">

        <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
            {!! Form::label('name', trans('site.name')) !!}
            {!! Form::text('name', null, ['class'=>'form-control', 'placeholder'=> trans('site.your_name')]) !!}
            @if ($errors->has('name')) <p class="help-block">{{ $errors->first('name') }}</p> @endif
        </div>

        <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
            {!! Form::label('email', trans('site.e-mail')) !!}
            {!! Form::text('email', null, ['class'=>'form-control', 'placeholder'=> trans('site.your_e-mail')]) !!}
            @if ($errors->has('email')) <p class="help-block">{{ $errors->first('email') }}</p> @endif
        </div>

        <div class="form-group {{ $errors->has('about') ? ' has-error' : '' }}">
            {!! Form::label('about', trans('site.about')) !!}
            {!! Form::select('about', [
                    'Запитване' => trans('site.enquiry'),
                    'Резервация' => trans('site.reservation'),
                    'Препоръка' => trans('site.recommendation')
                ], null, ['class'=>'form-control']) !!}
            @if ($errors->has('about')) <p class="help-block">{{ $errors->first('about') }}</p> @endif
        </div>

        <div class="form-group {{ $errors->has('message') ? ' has-error' : '' }}">
            {!! Form::label('message', trans('site.message')) !!}
            {!! Form::textarea('message', null, ['class'=>'form-control', 'placeholder'=> trans('site.message_text'), 'rows' => 4]) !!}
            @if ($errors->has('message')) <p class="help-block">{{ $errors->first('message') }}</p> @endif
        </div>

        <div class="form-group">
            {!! Form::label('captcha', trans('site.captcha_text')) !!}
            {!! app('captcha')->display(null, LaravelLocalization::getCurrentLocale()) !!}
        </div>

        <div class="form-group">
            {!! Form::submit(trans('site.submit'), ['class'=>'btn btn-primary']) !!}
        </div>

    </div>
</div>

{!! Form::close() !!}