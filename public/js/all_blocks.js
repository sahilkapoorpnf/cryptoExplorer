Pusher.host="slanger1.chain.so",Pusher.ws_port=443,Pusher.wss_port=443;var pusher=new Pusher("e9f5cc20074501ca7395",{encrypted:!0,disabledTransports:["sockjs"],disableStats:!0}),ticker=pusher.subscribe("blockchain_update_"+window.network.toLowerCase()),e=$(".base_url").attr("data-attr");ticker.bind("block_update",function(a){if("block"==a.type){var s="<tr>";s+='<td><a href="'+e+window.locale_path.substring(1,window.locale_path.length)+"blocks/"+t.value.block_no+'">'+t.value.block_no+"</a></td><td>"+new Date(t.value.time).getHours()+":"+new Date(t.value.time).getMinutes()+"</td><td>"+t.value.total_txs+"</td><td>"+t.value.mined_by+"</td></tr>",$("#all-blocks").prepend(s).prepend(s)}});