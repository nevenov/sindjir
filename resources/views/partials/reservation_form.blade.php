{!! Form::open(['route' => 'reservation_store', 'class' => 'form reservation-form']) !!}

<div class="panel panel-default">
    <div class="panel-heading"><span></span>{{ trans('site.make_reservation') }}</div>
    <div class="panel-body">
        <div class="form-group required {{ $errors->has('name') ? ' has-error' : '' }}">
            {!! Form::label('name', trans('site.name')) !!}
            {!! Form::text('name', null, ['class'=>'form-control', 'placeholder'=> trans('site.your_name')]) !!}
            @if ($errors->has('name')) <p class="help-block">{{ $errors->first('name') }}</p> @endif
        </div>

        <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
            {!! Form::label('email', trans('site.e-mail')) !!}
            {!! Form::text('email', null, ['class'=>'form-control', 'placeholder'=> trans('site.your_e-mail')]) !!}
            @if ($errors->has('email')) <p class="help-block">{{ $errors->first('email') }}</p> @endif
        </div>

        <div class="form-group required {{ $errors->has('phone') ? ' has-error' : '' }}">
            {!! Form::label('phone', trans('site.phone')) !!}
            {!! Form::text('phone', null, ['class'=>'form-control', 'placeholder'=> trans('site.your_phone')]) !!}
            @if ($errors->has('phone')) <p class="help-block">{{ $errors->first('phone') }}</p> @endif
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group required {{ $errors->has('arrive_date') ? ' has-error' : '' }}">
                    {!! Form::label('arrive_date', trans('site.arrive')) !!}
                    <div class="input-group date" id="arriveDatePicker">
                        {!! Form::text('arrive_date', null, ['class' => 'form-control']) !!}
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>
                    @if ($errors->has('arrive_date')) <p class="help-block">{{ $errors->first('arrive_date') }}</p> @endif
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group required {{ $errors->has('leave_date') ? ' has-error' : '' }}">
                    {!! Form::label('leave_date', trans('site.leave')) !!}
                    <div class="input-group date"  id="leaveDatePicker">
                        {!! Form::text('leave_date', null, ['class' => 'form-control']) !!}
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>
                    @if ($errors->has('leave_date')) <p class="help-block">{{ $errors->first('leave_date') }}</p> @endif
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group required {{ $errors->has('adults') ? ' has-error' : '' }}">
                    {!! Form::label('adults', trans('site.adults')) !!}
                    {!! Form::text('adults', null, ['class'=>'form-control', 'placeholder'=> trans('site.adults_number')]) !!}
                    @if ($errors->has('adults')) <p class="help-block">{{ $errors->first('adults') }}</p> @endif
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group {{ $errors->has('children') ? ' has-error' : '' }}">
                    {!! Form::label('children', trans('site.children')) !!}
                    {!! Form::text('children', null, ['class'=>'form-control', 'placeholder'=> trans('site.children_number')]) !!}
                    @if ($errors->has('children')) <p class="help-block">{{ $errors->first('children') }}</p> @endif
                </div>
            </div>
        </div>

        <div class="form-group {{ $errors->has('details') ? ' has-error' : '' }}">
            {!! Form::label('details', trans('site.details')) !!}
            {!! Form::textarea('details', null,
                [
                    'class'=>'form-control',
                    'placeholder'=> trans('site.details_text'),
                    'rows' => 4
                ])
            !!}
            @if ($errors->has('details')) <p class="help-block">{{ $errors->first('details') }}</p> @endif
        </div>

        <div class="form-group required">
            {!! Form::label('captcha', trans('site.captcha_text')) !!}
            {!! app('captcha')->display(null, LaravelLocalization::getCurrentLocale()) !!}
        </div>

        <div class="form-group text-center">
            {!! Form::submit(trans('site.reserve'), ['class'=>'btn btn-primary']) !!}
        </div>
    </div>
</div>

{!! Form::close() !!}