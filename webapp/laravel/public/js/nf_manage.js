//CMS MANAGE
function del_site(sid,count) {
	var url = $("#site_"+count).val();
	$("#confirm_del_input").val(sid);
	$("#show_del_site").text(url);
	$('#webSite'+count).modal('hide');
	$('#modalConfirmDeleteSite').modal('show');
}

$("#confirm_del_btn").click(function() {
	var sid = $("#confirm_del_input").val();
	//alert(sid);
	window.location.replace('/site/delete/'+sid);
});