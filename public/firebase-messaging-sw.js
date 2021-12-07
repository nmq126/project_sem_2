// Scripts for firebase and firebase messaging

// importScripts('https://www.gstatic.com/firebasejs/7.23.0/firebase-app.js');
// importScripts('https://www.gstatic.com/firebasejs/7.23.0/firebase-messaging.js');

importScripts('https://www.gstatic.com/firebasejs/9.2.0/firebase-app-compat.js');
importScripts('https://www.gstatic.com/firebasejs/9.2.0/firebase-messaging-compat.js');

// Initialize the Firebase app in the service worker by passing the generated config
var firebaseConfig = {
    apiKey: "AIzaSyDN4hzD-WrwPdEFq1BtPbyPq0qUZOGYvW4",
    authDomain: "testing-noti-fd929.firebaseapp.com",
    projectId: "testing-noti-fd929",
    storageBucket: "testing-noti-fd929.appspot.com",
    messagingSenderId: "307712832200",
    appId: "1:307712832200:web:ba47e871c5a750c7b82bfd"
};

firebase.initializeApp(firebaseConfig);

// Retrieve firebase messaging
const messaging = firebase.messaging();

messaging.onBackgroundMessage(function(payload) {
    console.log('Received background message ', payload);

    const notificationTitle = payload.notification.title;
    const notificationOptions = {
        body: payload.notification.body,
        icon: 'https://res.cloudinary.com/dz0vbjbye/image/upload/v1638807022/logo/logo-removebg-preview_fvw3oj.png'
    };

    self.registration.showNotification(notificationTitle,
        notificationOptions);
    self.clients.matchAll({includeUncontrolled: true}).then(function (clients) {
        console.log(clients);
        //you can see your main window client in this list.
        clients.forEach(function(client) {
            client.postMessage('YOUR_MESSAGE_HERE');
        })
    })

});

