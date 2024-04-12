var pusher = new Pusher(pusherKey, {
    cluster: 'eu'
});

var channel = pusher.subscribe(subChannel);
channel.bind('received', function (data) {
    window.location.href = authEndpoint + '?token=' + data.token
});
