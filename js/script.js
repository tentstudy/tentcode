function secondToTime(seconds) {
  var now = (new Date().getTime()) / 1000;
  var ago = now - seconds;
  if (ago > 86400) { //lớn hơn 1 ngày thì để ngày tháng
    var date = new Date(new Date().getTime() - ago * 1000 + 7 * 86400000);
    var hh = date.getUTCHours();
    var mm = date.getUTCMinutes();
    var ss = date.getSeconds();
    if (hh < 10) {hh = "0"+hh;}
    if (mm < 10) {mm = "0"+mm;}
    if (ss < 10) {ss = "0"+ss;}
    // This formats your string to HH:MM:SS
    return t = hh+":"+mm+":"+ss;
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
