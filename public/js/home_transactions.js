(Pusher.host = "slanger1.chain.so"), (Pusher.ws_port = 443), (Pusher.wss_port = 443);
var t = new Pusher("e9f5cc20074501ca7395", { encrypted: !0, disabledTransports: ["sockjs"], disableStats: !0 }).subscribe("blockchain_update_" + window.network.toLowerCase()),
	e = $(".base_url").attr("data-attr");
t.bind("tx_update", function (t) {
	if ("tx" === t.type) {
	    var n = "<tr>";
        async function getapi() {	 
            const response = await fetch('https://xcoins-exchangerate-api.herokuapp.com/api/v1/coin/'+window.network);	            
            var res = await response.json();
            return Promise.resolve(res);            
        }
        var currentPrice = getapi();
        currentPrice.then(function(result) {
			var finalPrice = result.data * t.value.sent_value;
		    (n +=
		        '<td class="dataMore"><a href="' +
		        e +
		        window.locale_path.substring(1, window.locale_path.length) +
		        window.network +
		        "/transactions/" +
		        t.value.txid +
		        '">' +
		        t.value.txid +
		        "</a></td><td>" +
		        new Date(t.value.time).getHours() +
		        ":" +
		        new Date(t.value.time).getMinutes() +
		        "</td><td>" +
		        t.value.sent_value +
		        " " +
		        window.network +
		        "</td><td>" +
		        finalPrice +
		        "</td></tr>"),
		        $("#tbl-transactions").prepend(n),
		        $("#tbl-transactions > tr").slice(window.show_transactions_on_main).detach();
		});
	}
});
