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
						updateInstallBar(0, 'กำลังสร้างเว็บไซต์');
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
        async: false,
        success: function(data, textStatus, jqXHR) {
            if (data.status == "ok") {
             	alert('pass');
            } else {
               	alert('error');
            }
        }, //end success
        error: function(jqXHR, textStatus, errorThrown) {
                $(".modalCheckAvailable_msg").html(jqXHR.responseText);
                $('#modalCheckAvailable_0').modal('show');
            } //end error         
    });
}