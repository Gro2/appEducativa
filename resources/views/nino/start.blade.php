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

<script src="https://www.gstatic.com/firebasejs/7.17.1/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/7.17.1/firebase-analytics.js"></script>
<script type="text/javascript" src="db.js"></script>
<!-- @include('partials.serviceW')  -->
<!-- 



  <script src="./js/idb.js"></script>
    <script src="./js/db-utils.js"></script>

    <script src="./js/add.js"></script>
  <script src="./js/fetch.js"></script>
<script src="./js/promise.js"></script>
    <script src="./js/app.js"></script>


    <script src="db.js" type="module"></script> 

<script>
    var db = new Dexie("Orders");
    db.version(1).stores({
      orders: "++id,item,quantity,address,driver_id,completed,created_at,updated_at"
    });
    console.console.log("done");
</script>
-->
