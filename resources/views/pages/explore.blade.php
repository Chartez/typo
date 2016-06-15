@extends('master')

@section('content')

    <h2 class="animated fadeInDown">Explore</h2>
    <hr>

    <div class="row">
        <div class="col-md-4 animated flipInX">
            <form class="" role="search">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Search...">
                </div>
            </form>
        </div>
    </div>

    @if(count($cards))
        @foreach($cards as $card)
            <div class="grid cs-style-1">
                <figure>
                    <div class="col-md-2 animated fadeIn card">

                        <h5>{{ $card->title }}<small class="pull-right">{{ count($card->likes) }} likes - {{ count($card->comments) }} comments</small></h5>
                        <a href="#" class="btn btn-default btn-block disabled" role="button"  data-font="{{ $card->headline }}">{{ $card->headline }}</a>
                        <a href="#" class="btn btn-default btn-block disabled" role="button" data-font="{{ $card->main_text }}">{{ $card->main_text }}</a>
                        <figcaption>
                            <h4>Author: {{ $card->user->name }}</h4>
                            <hr class="caption_separator">
                            {!! Form::open() !!}
                            <a href="{{ $card->path() }}" class="btn btn-primary btn-mini pull-left" type="button">
                                <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>View
                            </a>
                            {!! Form::close() !!}
                            @if(App\Like::where(['card_id' => $card->id, 'user_id' => Auth::user()->id])->first())
                                <button class="btn btn-default btn-mini disabled pull-right" type="button">
                                    <span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span>Like
                                </button>
                            @else
                                {!! Form::open() !!}
                                {!! Form::hidden('likes', $card->id) !!}
                                <button class="btn btn-primary btn-mini pull-right" type="submit">
                                    <span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span>Like
                                </button>
                                {!! Form::close() !!}
                            @endif
                        </figcaption>
                    </div>
                </figure>
            </div>
        @endforeach
    @else
        <p>No cards.</p>
    @endif

@endsection