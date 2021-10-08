<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <title> @yield('title') | StaySlay - Fashion</title>
    <link rel='icon' href='/favicon.ico' />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name='description' content="Unisex Ready To Wear brand & custom made; @yield('description')" />
    <meta name='keywords' content="Stay, Slay, Fashion, Clothing, @yield('keywords')" />
    <meta name='viewport' content='width=device-width, initial-scale=1.0' />

    <link rel="apple-touch-icon" href="/logo192.png" />
    <link rel="manifest" href="/manifest.json" />
    <link href='/css/app.css' rel='stylesheet'>
    <meta name='author' content='Elisha Temiloluwa a.k.a TemmyScope'/>
    <meta name='robots' content='index, follow' />
    <link rel='canonical' href='http://' />
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap' />
    <link rel='stylesheet' href='https://fonts.googleapis.com/icon?family=Material+Icons' />
    @livewireStyles
    <script src="https://www.gstatic.com/firebasejs/7.17.1/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/7.17.1/firebase-messaging.js"></script>
    <script type="text/javascript">
    var config = {
      apiKey: "AIzaSyC7iKRAAKkWmWsYSqeGfYSL4lo98FoC6U0",
      authDomain: "bookevritin.firebaseapp.com",
      databaseURL: "https://bookevritin.firebaseio.com",
      projectId: "bookevritin",
      storageBucket: "bookevritin.appspot.com",
      messagingSenderId: "112016927417",
      appId: "1:112016927417:web:8dfa9861edb6380fae0968"
    };
    firebase.initializeApp(config);
    const messaging = firebase.messaging();
    navigator.serviceWorker.register('/firebase-messaging-sw.js', {scope : '/'})
    .then((registration)=>{messaging.useServiceWorker(registration);});
    messaging.requestPermission().then(function(){
        console.log('Notification permission granted.');
        if(isTokenSentToServer()){ console.log('Token already saved'); }else{ getUserToken(); } 
    }).catch(function(err){ console.log('Unable to get permission to notify.', err); });
    function getUserToken(){
        messaging.getToken().then(function(currentToken){
          if(currentToken){ saveToken(currentToken); setTokenSentToServer(true);
          }else{ console.log('No Instance ID token available. Request permission to generate one.'); setTokenSentToServer(false); }
        }).catch(function(err){  console.log('An error occurred while retrieving token. ', err); setTokenSentToServer(false); });
    }
    function setTokenSentToServer(sent){
      window.localStorage.setItem('sentToServer', sent ? '1' : '0');
    }
    function isTokenSentToServer(){
      return window.localStorage.getItem('sentToServer') === '1';
    }
    function saveToken(currentToken){
      localStorage.setItem('pushToken', currentToken);
    }
    messaging.onMessage(function(payload){
      var notification= new Notification(payload.data.title, {body: payload.data.body, icon: "/logo.png"});
    });
    </script>
  </head>

  <body class="">

    <!-- subsequently smaller layer views can be included here -->

    <!-- Start main-content -->
    <main class="main">

      @yield('content')

    </main>
    
    @livewireScripts
  
  </body>

</html>