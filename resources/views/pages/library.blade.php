@extends('master')

@section('content')

    <h2 class="animated fadeInDown">{{ Auth::user()->name }}'s library<small> | Cards you made.</small></h2>
    <hr>

    @if(Session::has('flash_message'))
        <div class="alert alert-success animated flipInX">{{ Session::get('flash_message') }}</div>
    @endif

    @if(Session::has('deleted_message'))
        <div class="alert alert-danger animated flipInX">{{ Session::get('deleted_message') }}</div>
    @endif

    @if(count($cards))
        @foreach($cards as $card)
            <div class="grid cs-style-1">
                <figure>
                    <div class="col-md-2 animated fadeIn card">
                        <h5>{{ $card->title }}</h5>
                        <a href="#" class="btn btn-default btn-block disabled" role="button" data-font="{{ $card->headline }}">{{ $card->headline }}</a>
                        <a href="#" class="btn btn-default btn-block disabled" role="button" data-font="{{ $card->main_text }}">{{ $card->main_text }}</a>
                        <figcaption>
                            <a href="{{ $card->path() }}" class="btn btn-primary btn-mini" type="button">
                                <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>View
                            </a>
                            <a href="explore/{{ $card->id }}/edit" class="btn btn-warning btn-mini" type="button">
                                <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>Edit
                            </a>

                            <form method="POST" action="explore/{{ $card->id }}">
                                {{ method_field('DELETE') }}
                                {!! csrf_field() !!}
                                <button class="btn btn-danger btn-mini figbtn" type="submit" onclick="return confirm('Are you sure you want to delete this item?');">
                                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>Delete
                                </button>
                            </form>
                        </figcaption>
                    </div>
                </figure>
            </div>
        @endforeach
    @else
        <p>No cards.</p>
    @endif


@endsection