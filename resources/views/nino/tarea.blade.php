@include('layout.app')
@section('contend')
<div class="container">
    <div>
    <br>
        <h3 align="center" style= "color: Black;">Actividades</h3> 
        <h4 align="center" style= "color: Green;">{{$_GET['materia']}}</h4> 
    </div>
    <div>
    <br>
   
    <br>
         <a role="button" href="{{route('nino.respuesta', ['tarea' => '1','materia' => $_GET['materia']])}}" class="btn btn-info btn-lg btn-block">Tarea 1  <span  style="color:lime; background:lime" class="badge">new</span></a>
        <a role="button" href="{{route('nino.respuesta', ['tarea' => '2','materia' => $_GET['materia']])}}" class="btn btn-info btn-lg btn-block">Tarea 2 <span style="color:red; background:red" class="badge">new</span></a>
        <a role="button" href="{{route('nino.respuesta', ['tarea' => '3','materia' => $_GET['materia']])}}" class="btn btn-info btn-lg btn-block">Tarea 3 <span style="color:LIGHTGRAY; background:LIGHTGRAY" class="badge badge- primary">new</span></a>        
       
    </div>
</div>


