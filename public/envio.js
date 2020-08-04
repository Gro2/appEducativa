
function enviarAlerta(){
  var dato = document.getElementsByName('texto')[0].value;
    console.log(dato);
  
  if(confirm("¿Seguro de enviar la tarea?.No podra modificarla"))
       {
        
        
        // Initialize Firebase
      
           localStorage['sync'] = '1';  
            
            var db = new Dexie("appEdu");
             db.version(1).stores({
                 actividad: '++id,archivo,curso,descripcion,materia,nombre',
                 alumno: '++id,curso,nombre',
                 recurso: '++id,archivo,curso,descripcion,materia,nombre',
                 materia: '++id,curso,nombre',
                 tarea: '++id,estudiante,actividad,respuesta'

             });
            db.tarea.add({estudiante: '1',actividad: '1',respuesta: dato}).then(function(){
                window.location.replace("/");
            })
            var notification = new Notification("Tarea Enviada :D");

         
       

            
          //  var leadsRef = fire.ref('tarea');
            // db.transaction('rw', 'tarea', function (tarea, trans) {
            //     tarea.put({estudiante: '1',actividad: '1',respuesta: dato});
            // });
           // db.table('tarea').add({estudiante: '1',actividad: '1',respuesta: dato});
                    //db.materia.put({archivo: childData.archivo, curso: childData.curso,descripcion:childData.descripcion,materia: childData.materia,nombre:childData.nombre});
                    //console.log(childData.archivo);
              
            
             }  
        }
