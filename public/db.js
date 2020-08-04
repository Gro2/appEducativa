
if(navigator.onLine){


var firebaseConfig = {
  apiKey: "AIzaSyAKBNj9t67HTvJ6ZpSEeqJqVa2Af-ytkto",
  authDomain: "appeduca-55a94.firebaseapp.com",
  databaseURL: "https://appeduca-55a94.firebaseio.com",
  projectId: "appeduca-55a94",
  storageBucket: "appeduca-55a94.appspot.com",
  messagingSenderId: "76029872649",
  appId: "1:76029872649:web:c6ef9d2da32cb7fef986d8",
  measurementId: "G-6MVN9CWFQ0"
};

// Initialize Firebase
firebase.initializeApp(firebaseConfig);
var fire=firebase.database();

Dexie.exists('appEdu').then(function(exist){
if(!exist){
  var db = new Dexie("appEdu");
  console.log(!exist);
db.version(1).stores({
    actividad: '++id,archivo,curso,descripcion,materia,nombre',
    alumno: '++id,curso,nombre',
    recurso: '++id,archivo,curso,descripcion,materia,nombre',
    materia: '++id,curso,nombre',
    tarea: '++id,estudiante,actividad,respuesta'

});



  // Your web app's Firebase configuration
   
  // firebase.analytics();
  var leadsRef = fire.ref('actividad');
  leadsRef.on('value', function(snapshot) {
      snapshot.forEach(function(childSnapshot) {
        var childData = childSnapshot.val();
        db.actividad.put(childData);
        //db.materia.put({archivo: childData.archivo, curso: childData.curso,descripcion:childData.descripcion,materia: childData.materia,nombre:childData.nombre});
       // console.log(childData.archivo);
      });
  });
  var leadsRef = fire.ref('alumno');
  leadsRef.on('value', function(snapshot) {
      snapshot.forEach(function(childSnapshot) {
        var childData = childSnapshot.val();
        db.alumno.put(childData);
        //db.materia.put({archivo: childData.archivo, curso: childData.curso,descripcion:childData.descripcion,materia: childData.materia,nombre:childData.nombre});
        //console.log(childData.archivo);
      });
  });
  var leadsRef = fire.ref('materia');
  leadsRef.on('value', function(snapshot) {
      snapshot.forEach(function(childSnapshot) {
        var childData = childSnapshot.val();
        db.materia.put(childData);
        //db.materia.put({archivo: childData.archivo, curso: childData.curso,descripcion:childData.descripcion,materia: childData.materia,nombre:childData.nombre});
        //console.log(childData.archivo);
      });
  });
  
  var leadsRef = fire.ref('recurso');
  leadsRef.on('value', function(snapshot) {
    snapshot.forEach(function(childSnapshot) {
      var childData = childSnapshot.val();
      db.recurso.put(childData);
      //db.materia.put({archivo: childData.archivo, curso: childData.curso,descripcion:childData.descripcion,materia: childData.materia,nombre:childData.nombre});
      //console.log(childData.archivo);
    });
  });
  var leadsRef = fire.ref('tarea');
  leadsRef.on('value', function(snapshot) {
      snapshot.forEach(function(childSnapshot) {
        var childData = childSnapshot.val();
        db.tarea.put(childData);
      
      });
  });
  
}


});
}
setInterval(function() {
  // your code goes here...

if(localStorage['sync']==1&&navigator.onLine){
  var firebaseConfig = {
    apiKey: "AIzaSyAKBNj9t67HTvJ6ZpSEeqJqVa2Af-ytkto",
    authDomain: "appeduca-55a94.firebaseapp.com",
    databaseURL: "https://appeduca-55a94.firebaseio.com",
    projectId: "appeduca-55a94",
    storageBucket: "appeduca-55a94.appspot.com",
    messagingSenderId: "76029872649",
    appId: "1:76029872649:web:c6ef9d2da32cb7fef986d8",
    measurementId: "G-6MVN9CWFQ0"
  };
  
  // Initialize Firebase
  if (firebase.apps.length === 0) {
    firebase.initializeApp(firebaseConfig);
  }
  var fire=firebase.database();
  
  var tmp1=0;
  
  
  var db = new Dexie("appEdu");
   
  db.version(1).stores({
    actividad: '++id,archivo,curso,descripcion,materia,nombre',
    alumno: '++id,curso,nombre',
    recurso: '++id,archivo,curso,descripcion,materia,nombre',
    materia: '++id,curso,nombre',
    tarea: '++id,estudiante,actividad,respuesta'
    
  });
  
  
  
  db.tarea.count().then(function (cou) {
    tmp1=cou;
   
  })
  var leadsRef = fire.ref('tarea');
  
  leadsRef.once('value', function(snapshot) {  
    //console.log('Count: ' + snapshot.numChildren());
    if(snapshot.numChildren()>tmp1){
      //actualizar dexie
      console.log("Sincronizando Dexie");
      db.tarea.clear();
      var leadsRef = fire.ref('tarea');
      leadsRef.on('value', function(snapshot) {
        snapshot.forEach(function(childSnapshot) {
          var childData = childSnapshot.val();
          db.tarea.put(childData);
          //db.materia.put({archivo: childData.archivo, curso: childData.curso,descripcion:childData.descripcion,materia: childData.materia,nombre:childData.nombre});
          //console.log(childData.archivo);
        });
      });
      localStorage['sync']=0;
      console.log("Sincronizanción Completa");
      
    }
    else{
      
      console.log("Sincronizanción Completa");
      //actualizar firebase
      
      var leadsRef = fire.ref('tarea');
      leadsRef.remove();
      db.tarea.toArray().then(function(tar){
        for (let key in tar) {
          fire.ref('tarea').push({
            respuesta: tar[key].respuesta,
            actividad: tar[key].actividad,
            estudiante:tar[key].estudiante
          });
        }
      });
      
    }
  });
  localStorage['sync']=0;
  console.log("Sincronizando Firebase");
  
}
}, 5 * 1000); // 60 * 1000 milsec
  console.log(localStorage['sync']);