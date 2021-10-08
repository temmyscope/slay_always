importScripts('https://www.gstatic.com/firebasejs/5.8.4/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/5.8.4/firebase-messaging.js');
var config = {
    apiKey: "AIzaSyBm-9Tb10j-gGJUrUz40h5Xyvkc0SMN7WU",
    authDomain: "qloverdotorg.firebaseapp.com",
    databaseURL: "https://qloverdotorg.firebaseio.com",
    projectId: "qloverdotorg",
    storageBucket: "qloverdotorg.appspot.com",
    messagingSenderId: "20855341827"
};
firebase.initializeApp(config);
const messaging = firebase.messaging();
messaging.setBackgroundMessageHandler(function(payload) {
  console.log('[firebase-messaging-sw.js] Received background message ', payload);
  var notificationTitle = payload.data.title;
  var notificationOptions = {
    body: payload.data.body,
    icon: "https://bookevritin.herokuapp.com/img/36d1df30-cf5c-4343-358b-3fcbef697bba.webPlatform.png"
  };
  return self.registration.showNotification(notificationTitle, notificationOptions);
});

self.addEventListener('install', function(event){
  event.waitUntil(
    caches.open('be-offline').then(function(cache){
      return cache.addAll(['/offline','favicon.ico',
      "/img/a818a889-1581-d02e-9f86-749259c2ba8b.webPlatform.png","/img/f6b58e77-f81d-2a39-851f-37424389c75a.webPlatform.png",
      "/img/f313bd9f-fe2f-3ffd-8909-e2269e4a5d18.webPlatform.png","/img/64d5961b-64f3-8c4f-5993-a3f4e342c6c0.webPlatform.png",
      "/img/96a4785e-a1ae-98dc-28b2-d899e771b619.webPlatform.png","/img/bcb08c4e-9e63-b974-2cb8-e7d948a1ce8a.webPlatform.png",
      "/img/aa0382cd-35f6-5933-bece-9a7214938622.webPlatform.png","/img/0e9049f1-64c0-5f56-61c4-e55fae7d30f5.webPlatform.png",
      "/img/d7daf86d-1057-efb9-39ec-008fa89afc28.webPlatform.png","/img/36d1df30-cf5c-4343-358b-3fcbef697bba.webPlatform.png",
      "/img/ec87946c-4345-fddb-48a7-3bfcd2c3d129.webPlatform.png","/img/762045c4-0534-6a7f-728a-b9df544a3f08.webPlatform.png",
      "/img/15f3e301-240a-647a-fda6-54a5ac3fbeaa.webPlatform.png","/img/b9a695a9-0d14-52f4-a109-256fb82348c1.webPlatform.png",
      "/img/2fa1929a-1321-5b96-7b8f-b367cc888441.webPlatform.png","/img/f7037e06-7717-61fe-0f33-c59289d69fac.webPlatform.png",
      "/img/a1ad5e53-f8e0-1abd-f191-9b566415a16e.webPlatform.png","/img/4100d17e-74f1-67f9-e773-1be90ebb751a.webPlatform.png",
      "/img/26091f36-aa48-4f78-8788-9b0697e51c4c.webPlatform.png", "/faq", "/contact"
    ]);
    }).then(function(){
      return self.skipWaiting();
    })
  );
});
self.addEventListener('fetch', function(event) {
  event.respondWith(
    fetch(event.request).catch(function(error) {
      console.error( 'Network request Failed. Serving offline page ' + error );
      return caches.open('be-offline').then(function(cache) {
        return cache.match('offline');
      });
    }
  ));
});
self.addEventListener('refreshOffline', function(response) {
  return caches.open('be-offline').then(function(cache) {
    console.log('Offline page updated from refreshOffline event: '+ response.url);
    return cache.put(offlinePage, response);
  });
});