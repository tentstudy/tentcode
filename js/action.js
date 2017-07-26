// function showError(error) {
// 	if(error ==)
// }
function checkSaved(res) {
	console.log(res);
}
function saveCode() {
	var code = editor.getValue();
	var filename = $("#documentName").val();
	var url = 'action/save-code.php';
	var data = {
		'code': code,
		'filename': filename,
		'idCode': idCode
	};
	// check before save
	if(code === ''){
		return;
	}
	$.post(url, data, checkSaved);
}
$(function action() {
	$("#save-code").click(saveCode);
});