
Integrante: Grover Jhon Moscoso Apaza


Para la ejecucion se va al directorio de la app y ejecutamos en consola: php artisan serve
la aplicacion correra en la direccion "localhost:8000" o en la que indique en la consola.
Se debe dejar la aplicacion en la pagina principal almenos 5 sec para que termine de sincronizar dexie 
con firebase.
una ves terminada esta espera se puede acceder de forma offline u online al boton "ejemplo de tarea" para subir
una tarea del niño.
para subir una tarea se escribira la respuesta del niño en el espacio de texto "respuesta" y despues se
presionara el boton "entregar" para enviar la tarea.
La sincronizacion de datos se dara una ves se detecte la conexion a vuelto.
Las notificaciones se pueden activar desde el boton "activar notificaciones" que notificara cada ves que 
se envie una tarea.

para ver los datos almacenados en firebase bastara con ir a la direccion "localhost:8000/get", se listara 
los elementos en forma de arraylist

si se desea cambiar la base de datos de firebase se debera cambiar las credenciales del archivo firebase_key.json
que se genera en la pagina oficial de firebase desde la base de datos que se quiere usar. Tambien se debe cambiar 
la configuracion de "firebaseConfig" dentro del archivo "db.js", esto tambien se obtiene desde la base de datos 
de firebase que se desea usar.
Una ves cambiada la base de datos se puede ingresar datos visitando la direccion "localhost:8000/add".

Complicaciones:
como se hablo en previas reuniones, se tuvo complicaciones en aplicar la base de datos indexada y la aplicacion 
de alternativas como dexie, pouchdb o idb debido a los frameworks usados en el proyecto.
tambien se tuvo complicacion en hacer a la aplicacion instalable debido a varios puntos, como la inexistencia de 
un archivo manifest, el protocolo Https o asi mismo la falta de tiempo y conocimiento para aplicarlo.




