<h2 class="text-center">{{ trans('site.special_offers') }}</h2>
<div class="row">

    @foreach($offers as $offer)

            <div class="col-md-4 padding">
                <a href="#" data-toggle="modal" data-target="#{{ $offer->id }}">
                    <img style="margin: 0 auto;" src="{{ asset($offer->pic) }}" alt="{{ $offer->title }}" class="img-responsive img-circle">
                    <h3 class="text-center">{{ $offer->title }}</h3>
                </a>

                <div class="modal fade" id="{{ $offer->id }}" tabindex="-1" role="dialog" aria-labelledby="{{ $offer->id }}" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                                <h2 class="modal-title" id="myModalLabel">{{ $offer->title }}</h2>
                            </div>
                            <div class="modal-body">
                                {!! $offer->body !!}
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('site.close') }}</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

    @endforeach

</div>