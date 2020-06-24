@include('layout.app')
@section('contend')
<div class="container">
    <div>
    <br>
        <h3 align="center" style= "color: Black;">Recursos</h3> 
        <h4 align="center" style= "color: Green;">{{$_GET['materia']}}</h4> 
    </div>
    <div>
    <br>
   
    <br>
    <details class="card" >
        <summary type="button" class="btn btn-info btn-lg">Recurso 1</summary>
        <div class="card">
            <div class="card-body">
                Texto de prueba donde se escribira la descripcion de un recurso.
                <br>
                <br>
                <a href="#" class="badge badge-light"><i class="fas fa-file-alt fa-3x"></i> Doc 1</a>
                
            </div>
            
        </div>
    </details>
    <details class="card" >
        <summary type="button" class="btn btn-info btn-lg">Recurso 2</summary>
        <div class="card">
            <div class="card-body">
                
                
                <a href="#" class="badge badge-light"><i class="fas fa-file-alt fa-3x"></i> Doc 1</a>
                
            </div>
            
        </div>
    </details>
    <details class="card" >
        <summary type="button" class="btn btn-info btn-lg">Recurso 3</summary>
        <div class="card">
            <div class="card-body">
            Texto de prueba donde se escribira la descripcion de un recurso.
                
                
            </div>
            
        </div>
    </details>
       
    </div>
</div>