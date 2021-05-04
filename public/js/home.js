!(function (t) {
    var a = {};
    function e(n) {
        if (a[n]) return a[n].exports;
        var o = (a[n] = { i: n, l: !1, exports: {} });
        return t[n].call(o.exports, o, o.exports, e), (o.l = !0), o.exports;
    }
    (e.m = t),
        (e.c = a),
        (e.d = function (t, a, n) {
            e.o(t, a) || Object.defineProperty(t, a, { configurable: !1, enumerable: !0, get: n });
        }),
        (e.n = function (t) {
            var a =
                t && t.__esModule
                    ? function () {
                          return t.default;
                      }
                    : function () {
                          return t;
                      };
            return e.d(a, "a", a), a;
        }),
        (e.o = function (t, a) {
            return Object.prototype.hasOwnProperty.call(t, a);
        }),
        (e.p = "/"),
        e((e.s = 141));
})({
    141: function (t, a, e) {
        t.exports = e(142);
    },
    142: function (t, a, e) {
        "use strict";
        $(document).ready(function () {
            var t = $(this);
            (Pusher.host = "slanger1.chain.so"), (Pusher.ws_port = 443), (Pusher.wss_port = 443);
            var a = new Pusher("e9f5cc20074501ca7395", { encrypted: !0, disabledTransports: ["sockjs"], disableStats: !0 }).subscribe("blockchain_update_" + window.network.toLowerCase()),
                /*e = document.querySelector(".block"),*/
                n = $(".base_url").attr("data-attr");
            /*function o(t) {
                (e.innerHTML = t), $("#link-last-block").attr("href", n + window.locale_path.substring(1, window.locale_path.length) + "blocks/" + t);
            }
            (window.od = new Odometer({ el: e, value: 111111, format: "", theme: "train-station" })),
                $.ajax({
                    url: "https://chain.so/api/v2/get_info/" + window.network,
                    success: function (t) {
                        o(t.data.blocks);
                    },
                }),
                a.bind("block_update", function (t) {
                    o(t.value.block_no);
                }),*/

                /*a.bind('block_update', function(a) {
                    if (a.type === "block") {
                        alert('okk');
                    }
                });*/

                a.bind("tx_update", function (a) {
                    if ("tx" === a.type) {
                        var e = "<tr>";
                        (e +=
                            '<td><a href="' +
                            n +
                            window.locale_path.substring(1, window.locale_path.length) +
                            "transactions/" +
                            a.value.txid +
                            '">' +
                            (t.width() > 500 ? "..." + a.value.txid.substr(-20) : a.value.txid) +
                            '</a></td><td>' +
                            new Date(a.value.time).getHours() + ":" + new Date(a.value.time). getMinutes() + 
                            /*a.value.time+*/ 
                            '</td><td class="text-left">' +
                            a.value.sent_value +
                            " " +
                            window.network +
                            "</td></tr>"),
                            $("#tbl-transactions").prepend(e),
                            $("#tbl-transactions > tr").slice(window.show_transactions_on_main).detach();
                    };
                    if (a.type === "block") {
                        alert('okk1');
                    }
                });
        });
    },
});
