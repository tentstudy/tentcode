function secondToTime(seconds) {
  var now = (new Date().getTime()) / 1000;
  var ago = now - seconds;
  if (ago > 86400) { //lớn hơn 1 ngày thì để ngày tháng
    var date = new Date(seconds * 1000);
    var month = date.getUTCMonth() + 1; //months from 1-12
    var day = date.getUTCDate();
    var year = date.getUTCFullYear();
    if (day < 10) {day = "0"+day;}
    if (month < 10) {month = "0"+month;}
    // This formats your string to HH:MM:SS
    return t = day+"-"+month+"-"+year;
  } else {
    var h = Math.floor(ago / 3600);
    var m = Math.floor(ago / 60);
    if (h == 0) {
      m = m == 0 || m == 1 ? '2' : m;
      return m + ' minutes ago';
    }
    if (h == 1) {
      return '1 hour ago';        
    }
    return h + ' hours ago';
  }
}
function copyToClipboard(text) {
  var $temp = $("<input>");
  $("body").append($temp);
  $temp.val(text).select();
  document.execCommand("copy");
  $temp.remove();
}
function showInfo(msg) {
  $('#alert-info > span:nth-child(2)').html(msg);
  $('#alert-info').slideDown(300);
  setTimeout(() => {
		$('#alert-info').slideUp(300);
	}, 3000);
}
function showError(msg) {
  $('#alert-error > span:nth-child(2)').html(msg);
  $('#alert-error').slideDown(300);
  setTimeout(() => {
		$('#alert-error').slideUp(300);
	}, 3000);
}
