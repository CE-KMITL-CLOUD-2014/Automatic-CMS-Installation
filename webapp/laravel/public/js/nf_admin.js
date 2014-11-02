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

//-----Delete User
function del_user(uid) {
	var name = $("#user_name_"+uid).val();
	$("#confirm_del_input").val(uid);
	$("#show_del_user").text(name);
	
	$('#modalConfirmDelUser').modal({
            show: true,
            keyboard: false,
            backdrop: 'static'
        });
}

$("#confirm_del_btn").click(function() {
	$("#modalDelText").hide();
	$("#modalDelFooter").hide();
	$("#modalDelLoading").show();
	var uid = $("#confirm_del_input").val();
	window.location.replace('/user/delete/'+uid);
});

//-----Ban User
function ban_user(uid) {
	var name = $("#user_name_"+uid).val();
	$("#confirm_ban_input").val(uid);
	$("#show_ban_user").text(name);
	
	$('#modalConfirmBanUser').modal({
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

//-----Unban User
function unban_user(uid) {
	var name = $("#user_name_"+uid).val();
	$("#confirm_unban_input").val(uid);
	$("#show_unban_user").text(name);
	
	$('#modalConfirmUnbanUser').modal({
            show: true,
            keyboard: false,
            backdrop: 'static'
        });
}

$("#confirm_unban_btn").click(function() {
	$("#modalUnbanText").hide();
	$("#modalUnbanFooter").hide();
	$("#modalUnbanLoading").show();
	var uid = $("#confirm_unban_input").val();
	window.location.replace('/user/unban/'+uid);
});

//-----Hide Domain
function hide_domain(did) {
	var name = $("#domain_name_"+did).val();
	$("#confirm_hide_input").val(did);
	$("#show_hide_domain").text(name);
	
	$('#modalConfirmHideDomain').modal({
            show: true,
            keyboard: false,
            backdrop: 'static'
        });
}

$("#confirm_hide_btn").click(function() {
	$("#modalHideText").hide();
	$("#modalHideFooter").hide();
	$("#modalHideLoading").show();
	var did = $("#confirm_hide_input").val();
	window.location.replace('/admin/domain/hide/'+did);
});

//-----Show Domain
function show_domain(did) {
	var name = $("#domain_name_"+did).val();
	$("#confirm_show_input").val(did);
	$("#show_show_domain").text(name);
	
	$('#modalConfirmShowDomain').modal({
            show: true,
            keyboard: false,
            backdrop: 'static'
        });
}

$("#confirm_show_btn").click(function() {
	$("#modalShowText").hide();
	$("#modalShowFooter").hide();
	$("#modalShowLoading").show();
	var did = $("#confirm_show_input").val();
	window.location.replace('/admin/domain/show/'+did);
});

