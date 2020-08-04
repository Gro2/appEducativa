
//var cacheVersion = '1';
//var cacheName = 'appEduc'+'-'+cacheVersion;

/*
self.addEventListener('install', function(e) {
    e.waitUntil(
      caches.open(cacheName).then(function(cache) {
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
      caches.open(cacheName)
        .then(cache => cache.match(event.request, {ignoreSearch: true}))
        .then(response => {
        return response || fetch(event.request);
      })
    );
  });
  
  
  self.addEventListener('fetch', function(event) {
    event.respondWith(
      caches.match(event.request)
      .then((response) => {
        if (response) {
          return response;
        }
        
        let fetchRequest = event.request.clone();
        
        return fetch(fetchRequest).then(
          (fetchResponse) => {
            if(!fetchResponse || fetchResponse.status !== 200) {
              return fetchResponse;
            }
            
            let responseToCache = fetchResponse.clone();
            
            caches.open(cacheName)
            .then((cache) => {
              cache.put(event.request, responseToCache);
            })
            
            return fetchResponse;
          }
          )
        })
        )
      })
      
      */

     let STATIC_CACHE = 'appEduS-v1'
     let DYNAMIC_CACHE = 'appEduD-v1'
     let STATIC_FILES = [
      'favicon.ico',
      '/',
      '/db.js',
      '/envio.js',
      '/est/mat',
      '/ejemTar',
      'https://unpkg.com/dexie@latest/dist/dexie.js',
     //  '/est/mat/tareas',
    //   '/est/mat/tares/resp',
       '/est/rec'
    //   '/est/rec/mat'
     ]
     
     self.addEventListener('install', function (event) {
       // console.log('[SW] Installing  ...', event)
       event.waitUntil(
         caches.open(STATIC_CACHE)
           .then(function (cache) {
             // console.log('[SW] App Shell cache ')
             cache.addAll(STATIC_FILES)
           }).catch(function (error){ console.log('[SW] App shell cache wrong error!', error)})
       )
     })
     
     self.addEventListener('activate', function (event) {
       // console.log('[SW] Activate ....', event)
       event.waitUntil(
         caches.keys()
           .then(function (keyList) {
             return Promise.all(keyList.map(function (key) {
               if (key !== STATIC_CACHE && key !== DYNAMIC_CACHE) {
                 // console.log('[SW] clean older cache', key)
                 return caches.delete(key)
               }
             }))
           })
       )
       return self.clients.claim()
     })
     
     function isInArray(string, array) {
       let cachePath
       if (string.indexOf(self.origin) === 0) {
         // console.log('matched ', string)
         cachePath = string.substring(self.origin.length)
       } else {
         cachePath = string
       }
       return array.indexOf(cachePath) > -1
     }
     
     self.addEventListener('fetch', function (event) {
     
       var url = 'https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css'
       if (event.request.url.indexOf(url) > -1) {
         event.respondWith(
           caches.open(DYNAMIC_CACHE)
             .then(function (cache) {
               return fetch(event.request)
                 .then(function (res) {
                   // trimCache(DYNAMIC_CACHE, 3)
                   cache.put(event.request, res.clone())
                   return res
                 })
             })
         )
       } else if (isInArray(event.request.url, STATIC_FILES)) {
         // console.log("url req: ",event.request.url)
         event.respondWith(
           caches.match(event.request).catch(function (e){console.log('Error: ', e)})
         )
       } else {
         event.respondWith(
           caches.match(event.request)
             .then(function (response) {
               if (response) {
                 return response
               } else {
                 return fetch(event.request)
                   .then(function (res) {
                     return caches.open(DYNAMIC_CACHE)
                       .then(function (cache) {
                         // trimCache(DYNAMIC_CACHE, 3)
                         cache.put(event.request.url, res.clone())
                         return res
                       })
                   })
                   .catch(function (err) {
                     return caches.open(STATIC_CACHE)
                       .then(function (cache) {
                         if (event.request.headers.get('accept').includes('text/html')) {
                           return cache.match('/offline.html')
                         }
                       })
                   })
               }
             })
         )
       }
     })

    
     