//CMS MANAGE
function del_site(sid,count) {
	var url = $("#site_"+count).val();
	$("#confirm_del_input").val(sid);
	$("#show_del_site").text(url);
	$('#webSite'+count).modal('hide');
	$('#modalConfirmDeleteSite').modal('show');
}

$("#confirm_del_btn").click(function() {
	$(this).attr('disabled', 'disabled');
	$("#show_del_status").html("<h4 class='text-center'>กำลังลบเว็บไซต์ กรุณารอสักครู่...</h4>");
	var sid = $("#confirm_del_input").val();
	window.location.replace('/site/delete/'+sid);
});