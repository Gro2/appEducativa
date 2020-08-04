<script>
if('serviceWorker' in navigator) {
  navigator.serviceWorker
           .register('/sw.js')
           .then(function() { console.log("Service Worker Registered"); });
  
           navigator.serviceWorker.ready.then(function(registration) {
           console.log('Service Worker Ready');
        });
}


function confirmNotification(){
  if ('serviceWorker' in navigator) {
    let options = {
      body: 'Activaste las notificaciones!',
      icon: '/favicon.ico',
      dir: 'ltr',
      lang: 'en-US', // BCP 47,
      vibrate: [90, 30, 120],
      badge: '/favicon.ico',
      tag: 'confirm-notification',
      renotify: true,
      actions: [
        { action: 'confirm', title: 'OK', icon: '/favicon.ico' },
        { action: 'cancel', title: 'Dismiss', icon: '/favicon.ico' }
      ]
    };
    navigator.serviceWorker.ready
      .then(function(reg) {
        Notification.requestPermission().then(function(permission) {
          reg.showNotification('Notificaciones!', options);

         });
    })        
  }
}


</script>
