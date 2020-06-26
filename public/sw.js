self.addEventListener('install', function(e) {
    e.waitUntil(
      caches.open('appEdu').then(function(cache) {
        return cache.addAll([
          'favicon.ico',
          '/',
          
          '/est/mat',
         //  '/est/mat/tareas',
        //   '/est/mat/tares/resp',
           '/est/rec'
        //   '/est/rec/mat'
        ]);
      })
    );
});
self.addEventListener('activate', event => {
    event.waitUntil(self.clients.claim());
  });
  
  self.addEventListener('fetch', event => {
    event.respondWith(
      caches.open('appEdu')
        .then(cache => cache.match(event.request, {ignoreSearch: true}))
        .then(response => {
        return response || fetch(event.request);
      })
    );
  });