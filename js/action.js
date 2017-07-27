// function showError(error) {
// 	if(error ==)
// }
function checkSaved(idCode) {
}
function saveCode() {
	var code = editor.getValue();
	var title = $("#documentName").val();
	var url = 'action/save-code.php';
	var data = {
		'code': code,
		'title': title,
		'idCode': idCode
	};
	// check before save
	if(code.trim() === ''){
		return;
	}
	console.log('savecode');
	$.post(url, data, function(res) {
		res = JSON.parse(res);
		idCode = res.idCode;
		// console.log(res);
		if(parseInt(res.idUser) !== 0){
			console.log(res);
			// location.href = './' + res.idCode;
		}
		// console.log('res');
	});
}
// function loginToSave() {
// 	saveCode(function(res) {
// 		console.log(res);
// 		location.href = 'login.php?action=save';
// 		console.log('aaaa');
// 	});
// }
function notNow() {
	location.href = './' + idCode;
}
$(function action() {
	$("#save-code").click(saveCode);
	$("#not-now").click(notNow);
	// $("#login-to-save").click(loginToSave);
});