@extends ("plantillas.base")

@section ("contenido")
{!! FORM::open(array('url' => 'categorias/','files'=>true,'method'=>'PUT','name'=>'formCategoria')) !!}
{!! FORM::label ('nombre', 'formulario HTML') !!} <br/>
{!! FORM::close() !!}
@stop