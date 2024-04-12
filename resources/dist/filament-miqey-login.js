// resources/js/index.js
var pusher = new Pusher(pusherKey, {
  cluster: "eu"
});
var channel = pusher.subscribe(subChannel);
channel.bind("received", function(data) {
  window.location.href = authEndpoint + "?token=" + data.token;
});
//# sourceMappingURL=data:application/json;base64,ewogICJ2ZXJzaW9uIjogMywKICAic291cmNlcyI6IFsiLi4vanMvaW5kZXguanMiXSwKICAic291cmNlc0NvbnRlbnQiOiBbInZhciBwdXNoZXIgPSBuZXcgUHVzaGVyKHB1c2hlcktleSwge1xuICAgIGNsdXN0ZXI6ICdldSdcbn0pO1xuXG52YXIgY2hhbm5lbCA9IHB1c2hlci5zdWJzY3JpYmUoc3ViQ2hhbm5lbCk7XG5jaGFubmVsLmJpbmQoJ3JlY2VpdmVkJywgZnVuY3Rpb24gKGRhdGEpIHtcbiAgICB3aW5kb3cubG9jYXRpb24uaHJlZiA9IGF1dGhFbmRwb2ludCArICc/dG9rZW49JyArIGRhdGEudG9rZW5cbn0pO1xuIl0sCiAgIm1hcHBpbmdzIjogIjtBQUFBLElBQUksU0FBUyxJQUFJLE9BQU8sV0FBVztBQUFBLEVBQy9CLFNBQVM7QUFDYixDQUFDO0FBRUQsSUFBSSxVQUFVLE9BQU8sVUFBVSxVQUFVO0FBQ3pDLFFBQVEsS0FBSyxZQUFZLFNBQVUsTUFBTTtBQUNyQyxTQUFPLFNBQVMsT0FBTyxlQUFlLFlBQVksS0FBSztBQUMzRCxDQUFDOyIsCiAgIm5hbWVzIjogW10KfQo=