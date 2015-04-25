<!DOCTYPE html>
<html lang="es">
<head>
    <title>@yield("titulo","ViaOptima")</title>
    <meta charset="UTF-8">
    <meta name=description content="">
    <meta name=viewport content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    {!! HTML::style('css/bootstrap.min.css') !!}
    {!! HTML::style('css/principal.css') !!}
    <link href="http://fonts.googleapis.com/css?family=Irish+Grover" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=La+Belle+Aurore" rel="stylesheet" type="text/css">
    @yield("css")
</head>
<body>
<div class="container">
    <div class="row">
        <nav role="navigation" class="navbar navbar-default navbar-inverse navbar-fixed-top">
            <!-- Grouping Brand with Toggle for better mobile display -->
            <div class="navbar-header">
                <button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="" class="navbar-brand">VIAOPTIMA</a>
            </div>
            <!-- Next nav links in the Navbar -->
            <div id="navbarCollapse" class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li>{!! link_to ('entradas', 'Quiero Contratar') !!}</li>
                    @if (Auth::check())
                        <li>{!! link_to ('categorias', 'Categorias') !!}</li>
                        <li>{!! link_to ('entradas', 'Entradas') !!}</li>
                        <li>{!! link_to ('comentarios', 'Comentarios') !!}</li>
                        @if(Auth::user()->rol>0)
                            <li>{!! link_to ('usuarios', 'Usuarios') !!}</li>
                        @endif
                    @else
                        <li>{!! link_to ('contacto', 'Quiero Trabajar') !!}</li>
                        <li>{!! link_to ('acercade', 'Proyectos') !!}</li>
                        <li>{!! link_to ('acercade', 'Iniciativas') !!}</li>
                        <li>{!! link_to ('acercade', 'Comunidad Virtual') !!}</li>
                    @endif
                </ul>

                <ul class="nav navbar-nav navbar-right">
                    @if (Auth::check())
                        <li class="dropdown">
                            <a data-toggle="dropdown" class="dropdown-toggle" href=""><img
                                        style="width:24px;height:24px"
                                        src=" {!!asset('uploads/usuario/'.Auth::user()->imagen) !!}">  {!!Auth::user()->nombre!!}
                                <b class="caret"></b></a>
                            <ul role="menu" class="dropdown-menu">
                                @if(Auth::user()->rol<1)
                                    {!!link_to('usuarios', 'Perfil',array('class'=>'btn btn-default btn-block'))!!}
                                @endif
                                {!!link_to('logout', 'Log-Out',array('class'=>'btn btn-default btn-block'))!!}
                            </ul>
                        </li>
                    @else
                        <li class="dropdown">
                            <a class="dropdown-toggle login" href="login" data-toggle="dropdown">LOGIN <strong
                                        class="caret"></strong></a>

                            <div class="dropdown-menu" style="padding: 20px;margin-right:15px;width:240px">
                                {!! FORM::open(array('url' => 'login')) !!}

                                {!! FORM::label('username', 'Nombre de Usuario') !!} <br/>
                                {!! FORM::text ('username','',array("placeholder"=>"Nombre de Usuario", "class"=>"form-control")) !!}
                                <br/>

                                {!! FORM::label ('password', 'Contraseña') !!} <br/>
                                {!! FORM::password ('password',array("class"=>"form-control")) !!}  <br/>

                                {!! FORM::submit('Login',array("class"=>"btn btn-success btn-block")) !!}
                                {!! FORM::close() !!}
                            </div>
                        </li>
                    @endif
                </ul>
                @if (!Auth::check())
                    <ul class="nav navbar-nav navbar-right">

                        <li class="dropdown">
                            <a class="dropdown-toggle register" href="register" data-toggle="dropdown">Registro<strong
                                        class="caret"></strong></a>

                            <div class="dropdown-menu" style="padding: 20px;margin-top:0px;width:240px">
                                {!! FORM::open(array('url' => 'registro')) !!}

                                {!! FORM::label('nombre', 'Nombre') !!} <br/>
                                {!! FORM::text ('nombre',"",array("class"=>"form-control")) !!} <br/>

                                {!! FORM::label('username', 'Usuario') !!} <br/>
                                {!! FORM::text ('username',"",array("class"=>"form-control")) !!} <br/>

                                {!! FORM::label ('email', 'Email') !!} <br/>
                                {!! FORM::text('email',"",array("class"=>"form-control")) !!} <br/>

                                {!! FORM::label ('password', 'Contraseña') !!} <br/>
                                {!! FORM::password ('password',array("class"=>"form-control")) !!} <br/>

                                {!! FORM::label ('repass', 'Repetir Contraseña') !!} <br/>
                                {!! FORM::password ('password_confirmation',array("class"=>"form-control")) !!}

                                {!! FORM::hidden ('activo', 1) !!}

                                <br/>

                                {!! FORM::submit('Registrarse',array("class"=>"btn btn-success btn-block")) !!}

                                {!! FORM::close() !!}
                            </div>
                        </li>
                    </ul>
                @endif
            </div>
        </nav>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="mititulo" >VIAOPTIMA</div>

            <p style="font-family: La Belle Aurore;font-size: 25px;text-align: center;color: orange">Tu portal de Ofertas y Demandas.</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            @if(Session::has('mensaje'))
                <div class="alert alert-info alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <strong>¡Aviso!</strong> {!! Session::get('mensaje') !!}
                </div>

            @endif
            @if($errors->has())
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <strong>Errores</strong>
                    <ol>
                        @foreach ($errors->all('<p>:message</p>') as $message)
                            <li>{!! $message !!}</li>
                        @endforeach
                    </ol>
                </div>
            @endif
            @yield("contenido")
        </div>
    </div>
    <div class="row">
        <div class="col-md-12;margin-top: 1em;">
            <p class="panel panel-footer"
               style="font-family: La Belle Aurore;font-size: 15px;text-align: right;color: orange">MENTABLOG - Creado
                por Francisco Luis Mentado Manzanares</p>
        </div>
    </div>
</div>
<!-- jQuery -->
{!! HTML::script('js/jquery-2.1.1.js') !!}
<!-- Bootstrap JavaScript -->
{!! HTML::script('js/bootstrap.min.js') !!}
<!--User JavaScript -->
@yield("js")
</body>
</html>
