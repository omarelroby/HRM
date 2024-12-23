
    importScripts(
      'https://www.gstatic.com/firebasejs/9.6.10/firebase-app-compat.js'
    )
    importScripts(
      'https://www.gstatic.com/firebasejs/9.6.10/firebase-messaging-compat.js'
    )
    firebase.initializeApp({"apiKey":"AIzaSyDXbTa3UZqb6IJgRjm9E665dgblRriSvPw","authDomain":"mstare-musallha.firebaseapp.com","projectId":"mstare-musallha","storageBucket":"mstare-musallha.appspot.com","messagingSenderId":"843576382095","appId":"1:843576382095:web:89f0d188aa0cb7250a96fa"})

    // Retrieve an instance of Firebase Messaging so that it can handle background
    // messages.
    const messaging = firebase.messaging()

    self.addEventListener('push', function (e) {
    data = e.data.json();
      var options = {
        body: data.notification.body,
        icon: data.notification.icon,
        vibrate: [100, 50, 100],
        data: {
        dateOfArrival: Date.now(),
        primaryKey: '2'
      },
    }
})

self.addEventListener('notificationclick', function(event) {
    console.log('test', event)
    event.notification.close();
    const url = 'home';
    event.waitUntil(
        self.clients.matchAll({type: 'window'}).then( windowClients => {
            // Check if there is already a window/tab open with the target URL
            for (var i = 0; i < windowClients.length; i++) {
                var client = windowClients[i];
                // If so, just focus it.
                if (client.url === url && 'focus' in client) {
                    return client.focus();
                }
            }
            if (self.clients.openWindow) {
                console.log("open window")
            }
        })
    )
  }, false);
    