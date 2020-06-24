@include('layout.app')
@section('contend')
<div class="container">
    <div>
    <br>
    
 
        <h3 align="center" style= "color: Black;">Actividades</h3> 
        <h4 align="center" style= "color: Green;">{{$_GET['materia']}}</h4> 
        <h4 align="center" style= "color: Green;">Tarea {{$_GET['tarea']}}</h4> 
    </div>
    <div>
    <br>
    
    
    <div class="card">
        <div class="card-body">
            Texto de prueba donde se escribira la descripcion de la tarea.
            <br>
            <br>
            <a href="#" class="badge badge-light"><i class="fas fa-file-alt fa-3x"></i> Doc 1</a>
            
         </div>
         
    </div>
    <br>
    <h4 align="left" style= "color: Black;">Respuesta</h4> 
    <form>
        <div class="form-group">
            <div class="input-group">
                <textarea class="form-control" aria-label="With textarea" rows="4"></textarea>
                    </div>
                    <br>
                    <h5 align="left" style= "color: Black;">Archivos Adjuntos</h5> 
                    <div class="card">
                        <div class="card-body">
                        <ul class="fa-ul">
                        
                            
                            <li><span class="fa-ar"><a href="#" >Tarea_resuelta</a><i class="fas fa-trash " style="float: right"></i></span></li>
                            
                        </ul>
                        </div>    
                            
                            
                    </div>
                <br>
                <input type="file" class="form-control-file " id="exampleFormControlFile1"><br>
                    
                   <div >
                   <a style="color:black" href=#> <i style="margin: 10px" class="fas fa-microphone fa-2x"></i>   </a>
                    <a style="color:black" href=#><i style="margin-left: 10px" class="fas fa-camera fa-2x"></i> </a>
                   </div>
                  
                   
            </div>
            <div style="text-align: center;">
                  <button  type="button" class="btn btn-success btn-lg">Entregar</button>
            
            </div>
    </form>
         
    </div>
    </div>
</div>
