<form id="updateReservationForm" class="form-horizontal">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-5">
                <div class="form-group required">
                    {!! Form::label('start_date', 'От Дата') !!}
                    <div class="input-group date" id="arriveDatePicker">
                        {!! Form::text('start_date', null, ['class' => 'form-control']) !!}
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-md-1"></div>
            <div class="col-md-5">
                <div class="form-group required">
                    {!! Form::label('end_date', 'До Дата') !!}
                    <div class="input-group date"  id="leaveDatePicker">
                        {!! Form::text('end_date', null, ['class' => 'form-control']) !!}
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    {!! Form::label('comment', 'Коментар') !!}
                    <textarea id="comment" class="form-control" rows="4"></textarea>
                </div>
            </div>
        </div>
    </div>

    <input type="hidden" class="reservation-id" value=""/>
    <input type="hidden" class="start-date" value=""/>
    <input type="hidden" class="end-date" value=""/>
</form>

<script>
    $(document).ready(function() {

        var arriveDatePicker = $('#arriveDatePicker');
        var leaveDatePicker = $('#leaveDatePicker');

        arriveDatePicker.datetimepicker({
            allowInputToggle: true,
            locale: 'bg',
            format: 'DD MMMM YYYY',
            showClear: true,
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

        leaveDatePicker.datetimepicker({
            allowInputToggle: true,
            locale: 'bg',
            format: 'DD MMMM YYYY',
            showClear: true,
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
//            leaveDatePicker.data("DateTimePicker").minDate(e.date);
            $('#updateReservationForm .start-date').val(e.date);
        });

        leaveDatePicker.on("dp.change", function (e) {
//            arriveDatePicker.data("DateTimePicker").maxDate(e.date);
            $('#updateReservationForm .end-date').val(e.date);
        });
    });


</script>