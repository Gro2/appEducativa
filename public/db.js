





  // Your web app's Firebase configuration
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
  // firebase.initializeApp(firebaseConfig);
  // firebase.analytics();

   var db = new Dexie("idb");

   db.version(1).stores({
     friends: "++id,name,shoeSize"
    
 });
//  db.friends.put({ name: "Nicolas", shoeSize: 8}).then (function(){
   
//    return db.friends.get('Nicolas');
//  })

// Now, add another version, just to trigger an upgrade for Dexie.Syncable
//db.version(2).stores({}); 
  

   

  /*
var db = new Dexie('friend');

db.version(1).stores({
    friends: 'name,shoeSize'
});
*/

  db.syncable.connect ("websocket", firebaseConfig);  
   db.syncable.on('statusChanged', function (newStatus, url) {
       console.log ("Sync Status changed: " + Dexie.Syncable.StatusTexts[newStatus]);
  });

/*
//
// Put some data into it
//
db.friends.put({name: "Nicolas", shoeSize: 8}).then (function(){
    //
    // Then when data is stored, read from it
    //
    return db.friends.get('Nicolas');
}).then(function (friend) {
    //
    // Display the result
    //
    alert ("Nicolas has shoe size " + friend.shoeSize);
}).catch(function(error) {
   //
   // Finally don't forget to catch any error
   // that could have happened anywhere in the
   // code blocks above.
   //
   alert ("Ooops: " + error);
});

*/




//import 'your-sync-protocol-implementation';

// var db = new Dexie('myExistingDb');
//     db.version(1).stores({
//         friends: "$$oid,name,shoeSize",
//         pets: "$$oid,name,kind"
//     });