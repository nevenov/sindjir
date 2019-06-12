<form id="createReservationForm" class="form-horizontal">

    @if ($availableReservations)
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    @foreach ($availableReservations as $reservation)
                        @if ($reservation['type'] >= 1 && $reservation['type'] < 10)
                            <div class="form-group">
                                <div class="checkbox checkbox-success">
                                    <input type="checkbox" id="house{{ $reservation['type'] }}" value="{{ $reservation['type'] }}">
                                    <label for="house{{ $reservation['type'] }}">
                                        {{ $reservation['title'] }}
                                    </label>
                                </div>
                            </div>
                        @endif
                    @endforeach

                </div>
                <div class="col-md-6">
                    @foreach ($availableReservations as $reservation)
                        @if ($reservation['type'] >= 10)
                            <div class="form-group">
                                <div class="checkbox checkbox-success">
                                    <input type="checkbox" id="room{{ $reservation['type'] }}" value="{{ $reservation['type'] }}">
                                    <label for="room{{ $reservation['type'] }}">
                                        {{ $reservation['title'] }}
                                    </label>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>

    </div>
    @else
        Всичко е заето!
    @endif

    <input type="hidden" class="start-date" value="{{ $start }}"/>
    <input type="hidden" class="end-date" value="{{ $endRaw }}"/>
</form>