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
    $('#NotiCount').html(payload.data.number_of_noti);
    var notifications = JSON.parse(payload.data.notifications)
    var contentHTML = '';
    contentHTML += `<ul className="notification_ul">`;
    notifications.forEach(element => {
        contentHTML += `<li>
                             <a href="/my-account/order/id=${element.order_id}">
                                <div class="notify_data">
                                    <div class="title">
                                        ${element.title}
                                    </div>
                                    <div class="sub_title">
                                         ${element.sub_title}
                                    </div>
                                </div>`;
        if (element.read_at == null){
            contentHTML += `<div class="notify_status">
                                <i class="fas fa-circle"></i>
                            </div>`
        }
        contentHTML += ` </a>
                      </li>`;
    });
    contentHTML += `<li class="show_all">
                        <p>Xem tất cả</p>
                    </li>`
    $('.notification_dd').html(contentHTML);
    // var contentHTML = '';
    // var notifications = payload.data.notifications;
    // notifications.forEach(element => {
    //     console.log(element.sub_title)
    // })

    $.toast({
        heading: payload.data.heading,
        text: payload.data.text,
        position: 'bottom-left',
        showHideTransition: 'slide',
        hideAfter: false,
        icon: 'success',
        stack: 5
    })

})
