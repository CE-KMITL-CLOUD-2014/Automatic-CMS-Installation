//CMS INSTALLER    
//--Step2 check available website
$("#checkAvailable").click(function() {
    $(this).attr('disabled', 'disabled');
    //Callback handler for form submit event
    $("#sitenameForm").submit(function(e) {
        var formObj = $(this);
        var formURL = formObj.attr("action");
        var formData = new FormData(this);
        $.ajax({
            url: formURL,
            type: 'POST',
            data: formData,
            mimeType: "multipart/form-data",
            dataType: "json",
            contentType: false,
            cache: false,
            processData: false,
            async: false,
            success: function(data, textStatus, jqXHR) {
                if (data.status == 'ok') {
                    $("#CMS-Sitename").val($("#setSiteName").val());
                    $("#CMS-DomainID").val($("#setDomain").val());
                    $("#CMS-DomainName").val($("#setDomain option:selected").text());
                    $(".modalCheckAvailable_msg").html(data.message);
                    $('#modalCheckAvailable_1').modal('show');

                } else {
                    $(".modalCheckAvailable_msg").html(data.message);
                    $('#modalCheckAvailable_0').modal('show');
                }
                //$.mobile.changePage('#show_dialog', "{transition: 'pop', role: 'dialog'}");                                       
            },
            //end success
            error: function(jqXHR, textStatus, errorThrown) {
                    //alert("ERROR");
                    $(".modalCheckAvailable_msg").html(jqXHR.responseText);
                    $('#modalCheckAvailable_0').modal('show');
                    //alert(thrownError);
                } //end error         
        });
        e.preventDefault(); //Prevent Default action. 
        e.unbind();
    }); //--end ajax
    $(this).removeAttr('disabled');
});

//--Step 3 enter CMS details
String.prototype.capitalize = function() {
    return this.charAt(0).toUpperCase() + this.slice(1);
}
$("#createSiteButton").click(function() {
    $("#cms_msg").text($("#CMS-Selected").val().capitalize());
    $("#sitename_msg").text($("#CMS-Sitename").val() + '.' + $("#CMS-DomainName").val());
    $("#sitetitle_msg").text($("#inputSiteTitle").val());
    $("#site_username").text($("#inputUsername").val());
    $("#site_email").text($("#inputEmail").val());
    $('#modalVerifySite').modal('show');
});

$("#createConfirmButton").click(function() {
    $('#modalVerifySite').modal('hide');
    //Callback handler for form submit event
    $("#createsiteForm").submit(function(e) {
        var formObj = $(this);
        var formURL = formObj.attr("action");
        var formData = new FormData(this);
        $.ajax({
            url: formURL,
            type: 'POST',
            data: formData,
            mimeType: "multipart/form-data",
            dataType: "json",
            contentType: false,
            cache: false,
            processData: false,
            async: false,
            success: function(data, textStatus, jqXHR) {
                if (data.status == 'ok') {
                    cN();
                    setTimeout(function() {
						updateInstallBar(0, 'กำลังจัดสรรทรัพยากรสำหรับเว็บไซต์');
						stepInstall(1,data.params.sid,data.params.install_token);
					}, 3000);
                } else {
                    $(".modalCheckAvailable_msg").html(data.message);
                    $('#modalCheckAvailable_0').modal('show');
                }
                //$.mobile.changePage('#show_dialog', "{transition: 'pop', role: 'dialog'}");                                       
            },
            //end success
            error: function(jqXHR, textStatus, errorThrown) {
                    //alert("ERROR");
                    $(".modalCheckAvailable_msg").html(jqXHR.responseText);
                    $('#modalCheckAvailable_0').modal('show');
                    //alert(thrownError);
                } //end error         
        });
        e.preventDefault(); //Prevent Default action. 
        e.unbind();
    }); //--end ajax
});

//--Step 4 CMS installation
function updateInstallBar(percent, message) {
    $("#nf_install_bar").attr('aria-valuenow', percent);
    $("#nf_install_bar").width(percent + '%');
    $("#createSiteStatus").html(message);
}

function stepInstall(step,sid,install_token) {
	var base_url = $("#NF_BASE_URL").val();
	var postData = {step:step,sid:sid,install_token:install_token};

    $.ajax({
        url: base_url+"/site/install",
        type: 'POST',
        data: postData,
        dataType: "json",
        async: true,
        success: function(data, textStatus, jqXHR) {
            if (data.status == "ok") {
            	if(step == 1) {
            		updateInstallBar(15, data.message);            		
            	} else if(step == 2) {
            		updateInstallBar(25, data.message); 
            	} else if(step == 3) {
            		updateInstallBar(45, data.message); 
            	} else if(step == 4) {
            		updateInstallBar(60, data.message); 
            	} else if(step == 5) {
            		updateInstallBar(90, data.message); 
            	} else if(step == 6) {
            		updateInstallBar(100, data.message); 
            		setTimeout(function() {						
						getSiteUrl();
						cN();
					}, 1500);            		
            	}
            	            	
            	//Recursive stepInstall
            	if(step >= 1 && step < 6)
            		stepInstall(step+1,sid,install_token);            	
            	
            } else {
               	$("#nf_install_error_msg").html(data.message);
                $("#nf_install_ok").hide();
                $("#nf_install_error").show();
            }
        }, //end success
        error: function(jqXHR, textStatus, errorThrown) {                
                $("#nf_install_error_msg").html(jqXHR.responseText);
                $("#nf_install_ok").hide();
                $("#nf_install_error").show();
            } //end error         
    });
}

function getSiteUrl() {
	var cms_type = $("#CMS-Selected").val();
    var site_url = $("#CMS-Sitename").val() + '.' + $("#CMS-DomainName").val();
    var main_url = 'http://'+site_url;
    var admin_url = main_url;
    var url_image = '';
    if(cms_type == 'wordpress') {
    	admin_url += '/wp-admin';
    	url_image = '/img/icon/w-icon-200.png';
    } else if (cms_type == 'joomla') {
    	admin_url += '/administrator';
    	url_image = '/img/icon/j-icon-200.png';
    } else if (cms_type == 'drupal') {
    	admin_url += '/admin';
    	url_image = '/img/icon/d-icon-200.png';
    }
    
    //update url main
	$("#nf_url_main").attr('href',main_url);
	$("#nf_url_main").text(main_url);
	
	//update url admin
	$("#nf_url_admin").attr('href',admin_url);
	$("#nf_url_admin").text(admin_url);
	
	//update url image
	$("#nf_url_image").attr('src',url_image);
}
