//CMS MANAGE
function del_site(sid,count) {
	var url = $("#site_"+count).val();
	$("#confirm_del_input").val(sid);
	$("#show_del_site").text(url);
	$('#webSite'+count).modal('hide');
	$('#modalConfirmDeleteSite').modal({
            show: true,
            keyboard: false,
            backdrop: 'static'
        });
}

$("#confirm_del_btn").click(function() {
	$("#modalDelText").hide();
	$("#modalDelFooter").hide();
	$("#modalDelLoading").show();
	var sid = $("#confirm_del_input").val();
	window.location.replace('/site/delete/'+sid+'/user');
});