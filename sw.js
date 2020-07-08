
var appVersion = 'v1';

var files =[

       './',
       './index.php',
       './notes.php',
       './notice.php',
       './profile.php',
       './notice.php',
       './css/style.css',
       './css/notice.css',
       './img/favicon.ico',
       './img/logo-512.png',
       './img/logo-192.png',
       './manifest.json'

       
 
]

// Install Event

 self.addEventListener('install', event =>{
        event.waitUntil(
               caches.open(appVersion)
                     .then(cache => {
                            return cache.addAll(files)
                            .catch(err =>{
                                   console.error('Error in caching files',err);
                            })
                     })
        )
      
        console.info('SW is Installed');
        self.skipWaiting();
 })
 

 // Activate Event

 self.addEventListener('activate', event => {
        event.waitUntil(
               caches.keys()
               .then(cacheNames => {
                      return Promise.all(
                            cacheNames.map(cache => {
                                   if(cache !== appVersion){
                                          console.info('Deleting Old Cache',cache)
                                          return caches.delete(cache);
                                   }
                            })     

                      )
               })
        )
        return self.clients.claim();
 })

 // Fetch Cache

 self.addEventListener('fetch', event =>{
        console.log('SW fetched successfully',event.request.url);
        event.respondWith(
               caches.match(event.request)
               .then(res =>{
                      return res || fetch(event.request);
               })
        )

 })

