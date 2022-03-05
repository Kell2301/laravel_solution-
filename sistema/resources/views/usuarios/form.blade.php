
<h1>{{$modo}} Usuario</h1>

@if(count($errors)>0)

    <div class="alert alert-danger" role="alert">
        <ul>
    @foreach($errors->all() as $error)
       <li> {{$error}}</li>
    @endforeach
        </ul>
    </div>
   
@endif
    <div class="form-group">

    <label for="Nombre">Nombre</label>
    <input type="text" class="form-control" name="Nombre" value="{{isset($usuario->Nombre)?$usuario->Nombre:old('Nombre') }}" id="Nombre">
    

    </div>
    <div class="form-group">    
    <label for="Apellido">Apellido</label>
    <input type="text" class="form-control" name="Apellido" value="{{isset($usuario->Apellido)?$usuario->Apellido:old('Apellido') }}" id="Apellido">
    
    </div>
    <div class="form-group">
    <label for="Genero">Genero</label>
    <input type="text" class="form-control" name="Genero" value="{{isset($usuario->Genero)?$usuario->Genero:old('Genero') }}" id="Genero">
   
    </div>
    <div class="form-group">
    <label for="Edad">Edad</label>
    <input type="text" class="form-control" name="Edad" value="{{isset($usuario->Edad)?$usuario->Edad:old('Edad') }}" id="Edad">
    
    </div>
    <br>
    <input class="btn btn-secondary" type="submit" value="{{$modo}} Datos">
  
    <a class="btn btn-info" href="{{ url('usuarios/')}}">Regresar</a>
    <br>