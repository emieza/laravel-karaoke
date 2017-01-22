<nav class="navbar navbar-default">
    <div class="container">

        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{url('/')}}">
                <span class="glyphicon glyphicon-music" aria-hidden="true"></span>
                Karaoke Party Jolgorio
            </a>
        </div>

        @if( true || Auth::check() )
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li{{ Request::is('llistes*') && !Request::is('llista/crea')? ' class=active' : ''}}>
                    <a href="{{url('/llistes')}}">
                        <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                        Totes les llistes
                    </a>
                </li>
                <li{{ Request::is('llista*') && !Request::is('llista/crea')? ' class=active' : ''}}>
                    <a href="{{url('/llista')}}/{{$llista}}">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                        La meva llista
                    </a>
                </li>
                <li{{ Request::is('llista/crea*') ? ' class=active' : ''}}>
                    <a href="{{url('/llista/crea')}}/{{$llista}}">
                        <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span>
                        Nou tema
                    </a>
                </li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="{{url('busca')}}">
                        <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                        Tancar sessió
                    </a>
                </li>
            </ul>
        </div>
        @endif
    </div>
</nav>
