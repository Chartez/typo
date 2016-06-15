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

            <ul class="nav navbar-nav pull-right">
                <li><a href="/auth/login">
                        <span class="glyphicon glyphicon-log-in" aria-hidden="true"></span>Login
                    </a>
                </li>

            </ul>
        </div>
    </div>
</nav>