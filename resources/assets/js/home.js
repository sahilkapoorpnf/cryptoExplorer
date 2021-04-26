"use strict";

$(document).ready(function () {

  var $document = $(this);

  Pusher.host = 'slanger1.chain.so';
  Pusher.ws_port = 443;
  Pusher.wss_port = 443;

  var pusher = new Pusher('e9f5cc20074501ca7395', {
    encrypted: true,
    disabledTransports: ['sockjs'],
    disableStats: true
  });

  var ticker = pusher.subscribe('blockchain_update_' + window.network.toLowerCase());

  var el = document.querySelector('.block');

  window.od = new Odometer({
    el: el,
    value: 111111,
    format: '',
    theme: 'train-station'
  });

  $.ajax({
    url: 'https://chain.so/api/v2/get_info/' + window.network,
    success: function (data) {
      update(data.data.blocks);
    }
  });

  ticker.bind('block_update', function (data) {
    update(data.value.block_no);
  });

  ticker.bind('tx_update', function (data) {
    if (data.type === 'tx') {
      var tr = '<tr>';
      tr += '<td><a href="' + window.locale_path + 'transactions/' + data.value.txid + '">' + ($document.width() < 600 ? '...'+data.value.txid.substr(-10) : data.value.txid) + '</a></td>' +
            '<td>' +
            '  <span class="badge badge-big badge-primary"><i class="fas fa-arrow-down"></i> ' + data.value.total_inputs + '</span>' +
            '  <span class="badge badge-big badge-primary">' + data.value.total_outputs + ' <i class="fas fa-arrow-up"></i></span>' +
            '</td>' +
            '<td class="text-right">' + data.value.sent_value + ' ' + window.network + '</td>' +
            '</tr>';
      $('#tbl-transactions').prepend(tr);
      $('#tbl-transactions > tr').slice(window.show_transactions_on_main).detach();
    }
  });


  function update(block) {
    el.innerHTML = block;
    $('#link-last-block').attr('href', window.locale_path + 'blocks/' + block);
  }

});