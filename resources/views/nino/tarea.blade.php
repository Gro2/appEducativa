@include('layout.app')
@section('contend')
<div class="container">
    <div>
    <br>
        <h3 align="center" style= "color: Black;">Actividades</h3> 
        <h4 align="center" style= "color: Green;">{{$tareas[0]['materia']}}</h4> 
    </div>
    <div>
    <br>
   
    <br>
        @foreach($tareas as $tarea)
         <a role="button" href="{{route('nino.respuesta', $tarea)}}" class="btn btn-info btn-lg btn-block">{{$tarea['nombre']}} <span  style="color:lime; background:lime" class="badge">new</span></a>
        @endforeach
       
        <!-- <a role="button" href="{{route('nino.respuesta', ['tarea' => '2','materia' => $_GET['materia']])}}" class="btn btn-info btn-lg btn-block">Tarea 2 <span style="color:red; background:red" class="badge">new</span></a>
        <a role="button" href="{{route('nino.respuesta', ['tarea' => '3','materia' => $_GET['materia']])}}" class="btn btn-info btn-lg btn-block">Tarea 3 <span style="color:LIGHTGRAY; background:LIGHTGRAY" class="badge badge- primary">new</span></a>        
        -->
    </div>
</div>


