@extends('admin.layouts.layout')

@section('styles')
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.6.1/fullcalendar.min.css"/>
    <link rel="stylesheet" href="{{ asset('css/bootstrap-datetimepicker.min.css') }}"/>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div id="calendar"></div>
            </div>
        </div>


        {{--New reservation dialog--}}
        <div id="createReservationModal" class="modal fade" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Нова Резервация <br/><span class="subtitle"></span></h4>
                    </div>
                    <div class="modal-body">
                        <div id="loading">Loading...</div>
                        <div class="error"></div>
                        {{--Return new reservation form from ajax request--}}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Отказ</button>
                        <button type="submit" class="btn btn-primary" id="submitButton">Запази</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

        {{--Update reservation dialog--}}
        <div id="updateReservationModal" class="modal fade" tabindex="-1" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" id="closeUpdateDialog" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Редактиране на Резервация<br/><span class="subtitle"></span></h4>
                    </div>
                    <div class="modal-body">
                        @include('admin.partials.update_reservation_form')
                        <div class="error"></div>
                    </div>
                    <div class="modal-footer">
                        <div class="row">
                            <div class="col-md-4 text-left">
                                <button type="button" id="deleteReservation" class="btn btn-danger">Изтрий</button>
                            </div>
                            <div class="col-md-8">
                                <button type="button" id="cancelUpdateButton" class="btn btn-default" data-dismiss="modal">Отказ</button>
                                <button type="submit" class="btn btn-primary" id="updateSubmitButton">Запази</button>
                            </div>
                        </div>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
    </div>

@endsection

@section('scripts')
    <script type="text/javascript" src="{{ asset('js/reservation.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/fullcalendar.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/bg.js') }}"></script>

    <script>
        $(document).ready(function() {

            var calendar = $('#calendar');

            calendar.fullCalendar({
                header: {left: 'today', center: 'prev title next', right: 'month basicWeek basicDay'},
                editable: false,
                selectable: true,
                events: '/admin/getReservations',
                aspectRatio: 0.9,
                //header and other values
                select: function(start, end) { newReservationForm(start, end); },
                eventClick: function(reservation) { updateReservationForm(reservation); },
                eventRender: function(reservation, element) {
                    element.attr({'data-toggle': 'tooltip', 'data-placement': 'top', 'title': reservation.comment });
                }
            });

            function newReservationForm(start, end) {
                var startDate = start.unix();
                var endDate = end.unix();
                var reservationPeriod = start.format("D MMM YYYY") + ' - ' + end.subtract(1, 'days').format("D MMM YYYY");

                $('#createReservationModal .subtitle').text(reservationPeriod);
                $('#createReservationModal .modal-body').find('*').not('#loading, .error').remove();
                $('#createReservationModal .error').empty();
                $('#createReservationModal').modal('show');

                $.ajax({
                    url: '{{ route('new_reservation_form') }}',
                    data: {start_date: startDate, end_date: endDate, _token: "{{ csrf_token() }}" },
                    type: 'POST',
                    dataType: 'html',
                    beforeSend: function() {
                        $('#loading').show();
                    }
                }).done(function(response) {
                    $('#createReservationModal .modal-body').append(response);
                }).fail(function(e) {
                    $('#createReservationModal .modal-body').append('Грешка!');
                    console.log(e.responseText);
                }).always(function(){
                    $('#loading').hide();
                });
            }

            function updateReservationForm(reservation) {

                var start_date = $('#start_date');
                var end_date = $('#end_date');
                var end_date_exact = reservation.end.clone().subtract(1, 'day');

                $('#updateReservationModal .subtitle').text(reservation.title);
                $('#updateReservationModal .error').empty();

                start_date.val('');
                start_date.val(reservation.start.format('DD MMMM YYYY'));
                end_date.val('');
                end_date.val(end_date_exact.format('DD MMMM YYYY'));

                $('#updateReservationForm .reservation-id').val(reservation.id);
                $('#updateReservationForm .start-date').val(reservation.start);
                $('#updateReservationForm .end-date').val(end_date_exact);

                if (reservation.comment) {
                    $('#comment').val(reservation.comment);
                } else {
                    $('#comment').val('');
                }

                $('#updateReservationModal').modal('show');
            }

            // New reservation submit btn
            $('#submitButton').on('click', function(e){
                // We don't want this to act as a link so cancel the link action
                e.preventDefault();

                doSubmit();
            });

            // Update reservation submit btn
            $('#updateSubmitButton').on('click', function(e){
                // We don't want this to act as a link so cancel the link action
                e.preventDefault();

                doUpdateSubmit();
            });

            // Update reservation submit btn
            $('#deleteReservation').on('click', function(e){
                // We don't want this to act as a link so cancel the link action
                e.preventDefault();

                doDeleteSubmit();
            });

            function doSubmit(){

                var startDate = $('#createReservationModal .start-date').val();
                var endDate = $('#createReservationModal .end-date').val();
                var types = [];
                var errorMessage = $('#createReservationModal .error');

                $('#createReservationForm input:checkbox:checked').each(function () {
                    types.push($(this).val());
                });

                $.ajax({
                    url: '{{ route('make_reservation') }}',
                    data: {start_date: startDate, end_date: endDate, types: types, _token: "{{ csrf_token() }}" },
                    type: 'POST',
                    dataType: 'json',
                    beforeSend: function() {
                        $('#submitButton').attr('disabled', true);
                    }
                }).done(function(response) {

                    if (response.message == 'noTypes') {

                        errorMessage.html('Не е избран обект!')

                    } else {
                        $.each(response, function (index, reservation) {
                            calendar.fullCalendar('renderEvent',
                                    {
                                        id: reservation.id,
                                        title: reservation.title,
                                        start: new moment.unix(reservation.start_date).format("YYYY-MM-DD"),
                                        end: new moment.unix(reservation.end_date).format("YYYY-MM-DD"),
                                        allDay: reservation.all_day,
                                        color: reservation.color
                                    },
                                    false
                            );
                        });

                        $('#createReservationForm').trigger('reset');
                        $("#createReservationModal").modal('hide');

                    }

                }).fail(function(e) {
                    console.log(e.responseText);
                }).always(function(){
                    $('#submitButton').attr('disabled', false);
                });
            }

            function doUpdateSubmit(){

                var id = $('#updateReservationForm .reservation-id').val();
                var startDate = $('#updateReservationForm .start-date').val();
                var endDate = $('#updateReservationForm .end-date').val();
                var comment = $('#comment').val();
                var errorMessage = $('#updateReservationModal .error');

                $.ajax({
                    url: '{{ route('update_reservation') }}',
                    data: {id: id, start_date: startDate, end_date: endDate, comment: comment, _token: "{{ csrf_token() }}" },
                    type: 'POST',
                    dataType: 'json',
                    beforeSend: function() {
                        $('#updateSubmitButton').attr('disabled', true);
                    }
                }).done(function(response) {
                    if (response.message == 'success') {
                        $('#updateReservationModal').modal('hide');

                        var reservation = calendar.fullCalendar('clientEvents', response.id);
                        reservation = reservation[0];
                        reservation.start = moment.unix(response.start_date).format("YYYY-MM-DD");
                        reservation.end = moment.unix(response.end_date).format("YYYY-MM-DD");
                        reservation.comment = response.comment;
                        calendar.fullCalendar('updateEvent', reservation);
                    } else if (response.message == 'exist') {
                        errorMessage.html(response.title + ' е заета в този период!')
                    } else if (response.message == 'smallerEndDate') {
                        errorMessage.html('Крайната дата е по-малка от началната!')
                    }
                }).fail(function(e) {
                    errorMessage.html('Грешка!')
                    console.log(e.responseText);
                }).always(function(){
                    $('#updateSubmitButton').attr('disabled', false);
                });
            }

            function doDeleteSubmit(){

                var id = $('#updateReservationForm .reservation-id').val();

                $.ajax({
                    url: '{{ route('delete_reservation') }}',
                    data: {id: id, _token: "{{ csrf_token() }}" },
                    type: 'POST',
                    dataType: 'json',
                    beforeSend: function() {
                        $('#deleteReservation').attr('disabled', true);
                    }
                }).done(function(response) {
                    if (response.message == 'success') {
                        $('#updateReservationModal').modal('hide');
                        calendar.fullCalendar('removeEvents', response.id);
                    }
                }).fail(function(e) {
                    $('#updateReservationModal .modal-body').append('Грешка!');
                    console.log(e.responseText);
                }).always(function(){
                    $('#deleteReservation').attr('disabled', false);
                });
            }

            $("body").tooltip({ selector: '[data-toggle=tooltip]' });

        });

    </script>
@endsection