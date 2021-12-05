
const firebaseConfig = {
    apiKey: "AIzaSyDN4hzD-WrwPdEFq1BtPbyPq0qUZOGYvW4",
    authDomain: "testing-noti-fd929.firebaseapp.com",
    projectId: "testing-noti-fd929",
    storageBucket: "testing-noti-fd929.appspot.com",
    messagingSenderId: "307712832200",
    appId: "1:307712832200:web:ba47e871c5a750c7b82bfd"
};

firebase.initializeApp(firebaseConfig);

const messaging = firebase.messaging();

messaging.requestPermission()
    .then(function () {
        console.log("Permission granted");
        return messaging.getToken();

    })

    .then(function (token) {
        $('#device_token').val(token)
         console.log(token)
    })

    .catch(function (error) {
        console.log("Unable to get permission", error);
    });

messaging.onMessage((payload) => {
    $('#NotiCount').html(123);
    // console.log(payload.data.badgeCount);
    $.toast({
        heading: 'Thành công',
        text: payload,
        position: 'top-center',
        showHideTransition: 'slide',
        hideAfter: 5000,
        icon: 'success',
        stack: 5
    })

})
