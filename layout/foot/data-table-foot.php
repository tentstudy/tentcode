<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/datatables/1.10.15/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/datatables/1.10.15/js/dataTables.bootstrap.min.js"></script>
<script>
  var from = 0, numberRows = 20, max = -1;
  function loadMore(table) {
    $.ajax({
      url: '/ajax/list-code.php',
      type: "POST",
      data: {
        from,
        numberRows,
        max
      },
      dataType: 'json'
    })
    .then(function(response) {
      // console.log(response);
      if (response.success) {
        from += response.data.length;
        max = response.max;
        $('#now').text(from); 
        $('#total').text(max); 
        var tbdata = response.data.map(function(row, index){
          return [
            `<a href="/${row.id_code}">${row.title}</a>`,
            row.language,
            secondToTime(row.update_time)
          ];
        });
        table.rows.add(tbdata).draw(false);
      } else {
        showInfo('Cannot load more data');
      } 
    });
  }
  $.fn.dataTableExt.oSort['customString-asc']  = function(x,y) {
    var a = parseInt(x.match(/\d/g).join(""));
    var b = parseInt(y.match(/\d/g).join(""));
    return a > b;
  };
  
  $.fn.dataTableExt.oSort['customString-desc'] = function(x,y) {
      return $.fn.dataTableExt.oSort["customString-asc"](y, x);
  };
  $(document).ready(function() {
    var table = $('#tbl-all-code').DataTable({
      "bInfo": false,
      "deferRender": true,
      "order": [[ 2, "asc" ]],
      "aoColumnDefs": [{
        "sType": "customString",
        "bSortable": true,
        "aTargets": [2]
      }]
    });
    loadMore(table);
    $('button#load-more').on('click', function(){
      loadMore(table);
    });
  });
</script>
