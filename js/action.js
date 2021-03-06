'use strict';
function saveCode() {
  var code = editor.getValue();
  var action = $("#save-code").attr('button-action');
  var title = $("#documentName").val();
  var language = $('#selectLanguage :selected').val();
	var url = '/action/save-code.php';
	var data = {
		'code': code,
    'title': title,
    'language': language,
    'idCode': idCode,
    'action': action
  };

	// code rỗng thì không lưu
	if(code.trim() === ''){
    showError('Code cannot empty!');
		return;
  }
  //nếu có modal thì hiện modal (có modal nghĩa là chưa đăng nhập)
  if ($("#save-code").attr('data-toggle') === 'modal') {
    $("#myModal").modal();
  }
    console.log(data);
	$.post(url, data, function(res) {
    console.log(res);
    res = JSON.parse(res);
    idCode = res.idCode;
    if (!res.success) { //không thành công thì về ngay trang chủ
      location.href = '/';
      return;
    }
		if(parseInt(res.idUser) !== 0){ //id != 0 => đã đăng nhập, đã đăng nhập thì đến ngay trang xem
			location.href = '/' + res.idCode;
		}
	});
}
function notNow() { // chọn lúc khác => đến trang xem
	location.href = '/' + idCode;
}
$(function action() {
	$("#save-code").click(function () {
    saveCode();
  });
	$("#not-now").click(notNow);
  $("#btn-fork").click( function(){
    var code = editor.getValue();
    var url = '/action/fork.php';
    var data = {
      'code': code
    };
    $.post(url, data, function(res) {
      console.log(res);
      res = JSON.parse(res);
      if (!res.success) { //không thành công thì về ngay trang chủ
        alert("An error occurred");
        
      }
      location.href = '/';
      return false;
    });
  });
});
