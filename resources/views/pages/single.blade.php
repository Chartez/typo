@extends('master')

@section('content')
    <h2 class="animated fadeInDown">{{ $card->title }} <small> by: {{ $card->user->name }}</small></h2>
    <hr>

    <div class="col-md-5 single_view">

        <div>
            <button type="button" class="btn btn-lg btn-default btn-block disabled" data-font="{{ $card->headline }}">{{ $card->headline }}</button>
        </div>

        <div>
            <button type="button" class="btn btn-lg btn-default btn-block disabled" data-font="{{ $card->main_text }}">{{ $card->main_text }}</button>
        </div>
        <ul class="list-unstyled list-inline pull-left">
            <li>{{ count($card->likes) }} likes</li>|
            <li>{{ count($comments) }} Comments</li>
        </ul>

        @if($card->user->id === Auth::user()->id)
            <form method="POST" action="{{ $card->id }}" accept-charset="UTF-8" class="pull-right">
                {{ method_field('DELETE') }}
                {!! csrf_field() !!}
                <button class="btn btn-danger btn-mini" type="submit" onclick="return confirm('Are you sure you want to delete this item?');">
                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>Delete</button>
            </form>
            <a href="{{ $card->id }}/edit" class="btn btn-warning btn-mini pull-right" type="button">
                <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>Edit
            </a>
        @else
            @if(App\Like::where(['card_id' => $card->id, 'user_id' => Auth::user()->id])->first())
                <button class="btn btn-primary btn-mini disabled pull-right" type="button">
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
        @endif

    </div>

    <div class="col-md-7">
        <div class="preview">
            <h4>Preview:</h4>
            <h1 class="headline" data-font="{{ $card->headline }}">The Headline</h1>
            <div class="maintext" data-font="{{ $card->main_text }}">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus, beatae deserunt dolorem ea incidunt iste maxime molestias officiis quaerat quasi qui quod sequi temporibus! Aperiam corporis officia quas sapiente vitae.</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. At expedita explicabo maxime nulla pariatur porro quis sint, veritatis. Amet dolor doloribus expedita id incidunt laudantium mollitia nam quis repellendus totam.</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequuntur dicta dolore ea enim error eveniet ipsam minima praesentium similique voluptatum? Architecto, deserunt dolor dolore facere iure nam obcaecati repudiandae vero.</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid amet, mollitia? Adipisci alias aut commodi consectetur dolor dolore doloremque doloribus esse et eveniet, laborum obcaecati recusandae repellat tempore unde voluptas.</p>
            </div>
        </div>
    </div>

    <div class="row">
        @include('partials.comments')
    </div>
@endsection

