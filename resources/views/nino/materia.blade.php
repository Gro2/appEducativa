@include('layout.app')
@section('contend')
<div class="container">
    <div>
    <br>
    
        <h3 align="center" style= "color: Black;">Actividades</h3> 
        <h4 align="center" style= "color: Green;">Estudiante</h4> 
    </div>
    <div>
    <br>
    
    <br>
         <a role="button" href="{{route('nino.tarea', ['materia' => 'Matematicas'])}}" class="btn btn-info btn-lg btn-block">Matematicas  <span style="color:yellow; background:yellow" class="badge">new</span></a>
        <a role="button" href="{{route('nino.tarea', ['materia' => 'Biologia'])}}" class="btn btn-info btn-lg btn-block">Biologia <span style="color:LIGHTGRAY; background:LIGHTGRAY" class="badge">new</span></a>
        <a role="button" href="{{route('nino.tarea', ['materia' => 'Quimica'])}}" class="btn btn-info btn-lg btn-block">Quimica <span style="color:LIGHTGRAY; background:LIGHTGRAY" class="badge badge- primary">new</span></a>        
             
    </div>
</div>