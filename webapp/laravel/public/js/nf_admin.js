//CMS ADMIN
//-----Delete site
function del_site(sid) {
	var url = $("#site_url_"+sid).val();
	$("#confirm_del_input").val(sid);
	$("#show_del_site").text(url);
	
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
	window.location.replace('/site/delete/'+sid+'/admin');
});

//-----Block site
function block_site(sid) {
	var url = $("#site_url_"+sid).val();
	$("#confirm_block_input").val(sid);
	$("#show_block_site").text(url);
	
	$('#modalConfirmBlockSite').modal({
            show: true,
            keyboard: false,
            backdrop: 'static'
        });
}

$("#confirm_block_btn").click(function() {
	$("#modalBlockText").hide();
	$("#modalBlockFooter").hide();
	$("#modalBlockLoading").show();
	var sid = $("#confirm_block_input").val();
	window.location.replace('/site/block/'+sid);
});

//-----Unblock site
function unblock_site(sid) {
	var url = $("#site_url_"+sid).val();
	$("#confirm_unblock_input").val(sid);
	$("#show_unblock_site").text(url);
	
	$('#modalConfirmUnblockSite').modal({
            show: true,
            keyboard: false,
            backdrop: 'static'
        });
}

$("#confirm_unblock_btn").click(function() {
	$("#modalUnblockText").hide();
	$("#modalUnblockFooter").hide();
	$("#modalUnblockLoading").show();
	var sid = $("#confirm_unblock_input").val();
	window.location.replace('/site/unblock/'+sid);
});

//-----Ban User
function ban_user(uid) {
	var name = $("#user_name_"+uid).val();
	$("#confirm_ban_input").val(uid);
	$("#show_block_user").text(name);
	
	$('#modalConfirmBanSite').modal({
            show: true,
            keyboard: false,
            backdrop: 'static'
        });
}

$("#confirm_ban_btn").click(function() {
	$("#modalBanText").hide();
	$("#modalBanFooter").hide();
	$("#modalBanLoading").show();
	var uid = $("#confirm_ban_input").val();
	window.location.replace('/user/ban/'+uid);
});


