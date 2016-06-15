<nav class="navbar navbar-fixed-top navbar-inverse">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            {{ Html::image('img/logo.png', 'logo', array('class' => 'logo img-responsive')) }}
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li><a href="/create">Create</a></li>
                <li><a href="/explore">Explore</a></li>
                <li><a href="/library">Library</a></li>
            </ul>

            <div class="dropdown pull-right">
                <button class="dropbtn">{{ Auth::user()->name }}</button>
                <div class="dropdown-content">
                    {{--<a class="profile" href="#">Profile--}}
                        {{--<span class="glyphicon glyphicon-user pull-left"></span>--}}
                    {{--</a>--}}
                    <a class="logout" href="/logout"><span class="glyphicon glyphicon-log-out"></span> Logout</a>
                </div>
            </div>
        </div>

    </div>
</nav>