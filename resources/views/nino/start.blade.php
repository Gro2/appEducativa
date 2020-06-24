@include('layout.app')
@section('contend')
<div class="container">
    <div>
    <br>
 
        <h3 align="center" style= "color: Black;">Aplicación Educativa</h3> 
        <h4 align="center" style= "color: Green;">Estudiante</h4> 
    </div>
    <div>
    <br>
    
    <br>
      
        <a role="buttom" href= "{{ route('nino.materia') }}" class="btn btn-info btn-lg btn-block" >Actividades</a>
        <a role="button" href= "{{ route('nino.recurso') }}" class="btn btn-success btn-lg btn-block">Recursos</a>
    </div>
</div>


