@extends('layouts.app')

@section('content')
<div class="container">
@if(Session::has('mensaje'))
<div class="alert alert-info alert-dismissible" role="alert">

{{Session::get('mensaje')}}

</div>
@endif



<a href="{{ url('usuarios/create')}}" class="btn btn-secondary">Registrar</a>
<br>
<br>

<table class="table table-light">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Genero</th>
            <th>Edad</th>
            <th>Acciones</th>

        </tr>
    </thead>
    <tbody>
        @foreach($usuarios as $usuario)
        <tr>
            <td>{{$usuario->id}}</td>
            <td>{{$usuario->Nombre}}</td>
            <td>{{$usuario->Apellido}}</td>
            <td>{{$usuario->Genero}}</td>
            <td>{{$usuario->Edad}}</td>
            <td>
            <a href="{{url('/usuarios/'.$usuario->id.'/edit') }}"class="btn btn-dark">
            Editar
            </a>    
             |
                <form action="{{url('/usuarios/'.$usuario->id) }}" class="d-inline" method="post">
                    @csrf
                    {{method_field('DELETE') }}
                    <input class= "btn btn-danger" type="submit" onclick="return confirm('¿Quieres borrar?')" value="Borrar">
                </form>
                
             </td>
        </tr>
        @endforeach
    </tbody>
</table>
{!!$usuarios->links()!!}
</div>
@endsection