@extends('layouts.app')

@section('title', 'Profile')

@push('scripts')
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
@endpush

@section('content')