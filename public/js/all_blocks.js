(Pusher.host = "slanger1.chain.so"), (Pusher.ws_port = 443), (Pusher.wss_port = 443);
var pusher = new Pusher("e9f5cc20074501ca7395", { encrypted: !0, disabledTransports: ["sockjs"], disableStats: !0 }),
    ticker = pusher.subscribe("blockchain_update_" + window.network.toLowerCase()),
    e = $(".base_url").attr("data-attr");
ticker.bind("block_update", function (t) {
    if ("block" == t.type) {
        $.ajax({
            type: 'get',
            data: { data: t.value },
            success: function(){
                return true;
            }
        });
    }
});
