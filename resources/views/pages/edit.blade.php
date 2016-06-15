@extends('master')

@section('content')
    <h2>Edit the card</h2>
    <hr>
    <div class="col-md-5">
        <div class="create">
            <form method="POST" action="/explore/{{ $card->id }}">
                {{ method_field('PATCH') }}
                {!! csrf_field() !!}

                <div class="field">
                    <label for="inputTitle">Update title</label>
                    <input type="text" name="title" value="{{ $card->title }}" id="inputTitle" class="form-control" placeholder="" autofocus required>
                </div>

                <div class="font-selector" data-target="headline" >
                    <h5>Headline:</h5>
                    <select type="select" id="headline" name="headline" class="btn btn-lg btn-default btn-block"></select>
                </div>

                <div class="font-selector" data-target="maintext">
                    <h5>Main Text:</h5>
                    <select type="select" id="main-text" name="main_text" class="btn btn-lg btn-default btn-block"></select>
                </div>

                <div>
                    <button type="submit" class="btn btn-mini btn-warning">Update</button>
                </div>
            </form>

            @if (count($errors) > 0)
                <div class="alert alert-danger animated flipInX">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>

    <div class="col-md-7">
        <div class="preview">
            <h4>Preview:</h4>
            <h1 class="headline">The Headline</h1>
            <div class="maintext">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus, beatae deserunt dolorem ea incidunt iste maxime molestias officiis quaerat quasi qui quod sequi temporibus! Aperiam corporis officia quas sapiente vitae.</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. At expedita explicabo maxime nulla pariatur porro quis sint, veritatis. Amet dolor doloribus expedita id incidunt laudantium mollitia nam quis repellendus totam.</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequuntur dicta dolore ea enim error eveniet ipsam minima praesentium similique voluptatum? Architecto, deserunt dolor dolore facere iure nam obcaecati repudiandae vero.</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloremque et eum excepturi molestiae quia repudiandae temporibus? Alias facere laborum, neque nobis officiis perferendis quasi, quibusdam quidem reiciendis reprehenderit, vero voluptatibus.</p>
            </div>
        </div>
    </div>

@endsection