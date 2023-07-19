//token update
$("form").submit(function () {
    $("input[name='" + csfr_token_name + "']").val($.cookie(csfr_cookie_name));
});

$(document).ready(function () {
    $(".form-newsletter").submit(function (event) {
        event.preventDefault();
        var email = $('.newsletter-input').val();
        var emailFld = $('.newsletter-input');
      
        var data = {
            "email": email,
        };
        data[csfr_token_name] = $.cookie(csfr_cookie_name);
        $.ajax({
            url: base_url + "ajax_controller/add_to_newsletter",
            type: "post",
            data: data,
            success: function (response) {
                var obj = JSON.parse(response);
                        document.getElementById("form_newsletter_response").innerHTML = obj.response;
                $(emailFld).val('');
                    
                    
            }
        });
    });
});

function isNumberKey(evt) {
    var charCode = (evt.which) ? evt.which : evt.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true;
}
/*
* STUDENT JS
*
*/

function setResetPermanentAddress() {
    let isChecked = $("#permacheck").is(':checked');
    var present_add_add_1 = $('input[name="present_add_add_1"]').val();
    var present_add_add_2 = $('input[name="present_add_add_2"]').val();
    var present_add_district = $('input[name="present_add_district"]').val();
    var present_add_state = $('select[name="present_add_state"]').val();
    var present_add_pin = $('input[name="present_add_pin"]').val();
    if (isChecked == true) {
        if (present_add_add_1 == "" || present_add_district == "" || present_add_state == "" || present_add_pin == "") {
            alert("Please fillup the present address first");
            $('#permacheck').prop('checked', false);
        } else {
            $('input[name="premanemt_add_1"]').val(present_add_add_1);
            $('input[name="premanemt_add_2"]').val(present_add_add_2);
            $('input[name="premanemt_add_district"]').val(present_add_district);
            $('select[name="premanemt_add_state"]').val(present_add_state);
            $('input[name="premanemt_add_pin"]').val(present_add_pin);
        }
    } else {
        $('input[name="premanemt_add_1"]').val("");
        $('input[name="premanemt_add_2"]').val("");
        $('input[name="premanemt_add_district"]').val("");
        $('select[name="premanemt_add_state"]').val("");
        $('input[name="premanemt_add_pin"]').val("");
    }
}

function catCheck(cat) {
    if (cat == "OBC" || cat == "SC" || cat == "ST") {
        $(".cast").text("*");
        $("#cast_certi_img").prop('required', true);
    } else {
        $(".cast").text("");
        $("#cast_certi_img").prop('required', false);
    }
}
function idProveSelector(id_prove) {
    if (id_prove == "dl") {
        $(".idprove").text("Driving Licence");
    } else if (id_prove == "aadhaar") {
        $(".idprove").text("Aadhaar");
    } else if (id_prove == "voter") {
        $(".idprove").text("Voter Card");
    } else {
        $(".idprove").text("Id Prove");
    }
}

function uploadstudentImage() {
    var name = document.getElementById("avatar").files[0].name;
    var form_data = new FormData();
    var ext = name.split('.').pop().toLowerCase();
    form_data.append("avatar", document.getElementById('avatar').files[0]);
    form_data.append(csfr_token_name, $.cookie(csfr_cookie_name));
    $.ajax({
        url: base_url + "ajax_controller/uploadstudentImage",
        method: "POST",
        data: form_data,
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function () {
            $("#ajaxloaderModal").show();
        },
        success: function (resp) {
            $("#ajaxloaderModal").hide();
            var obj = JSON.parse(resp);
            if (obj.error == 0) {
                // var image = 
                $('input[name="avatar"]').val(obj.uploded_message);
                $(".avatar").attr("src", base_url + "uploads/tempimg/" + obj.uploded_message);
                $('.avatar_div').html("<a class='cross-image' href='javascript:void(0)' onclick='remove_student_img()'><i class='fa fa-times' aria-hidden='true'></i></a>");


            } else {
                $(".avatar-error").html(obj.message);
            }
        }
    });
}

function remove_student_img() {
    var images = $('input[name="avatar"]').val();
    images = $.trim(images);
    var data = {
        "image": images
    };
    data[csfr_token_name] = $.cookie(csfr_cookie_name);

    $.ajax({
        type: "POST",
        url: base_url + "ajax_controller/remove_student_img",
        data: data,
        beforeSend: function () {
            $("#ajaxloaderModal").show();
        },
        success: function (response) {
            $("#ajaxloaderModal").hide();
            var obj = JSON.parse(response);
            if (obj.error == 0) {
                $('input[name="avatar"]').val("");
                $('#avatar').val("");
                $('.avatar').attr("src", base_url + "assets/frontend/images/noimg.png");
                $('.avatar_div').html("");
                $('.avatar-error').html("");
            } else {
                $('input[name="avatar"]').val("");
                $('#avatar').val("");
                $('.avatar').attr("src", base_url + "assets/frontend/images/noimg.png");
                $('.avatar_div').html("");
                $('.avatar-error').html("");
            }
        }
    });
}


function uploadstSignImage() {
    var name = document.getElementById("sign_img").files[0].name;
    var form_data = new FormData();
    var ext = name.split('.').pop().toLowerCase();
    form_data.append("sign_img", document.getElementById('sign_img').files[0]);
    form_data.append(csfr_token_name, $.cookie(csfr_cookie_name));
    $.ajax({
        url: base_url + "ajax_controller/uploadstSignImage",
        method: "POST",
        data: form_data,
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function () {
            $("#ajaxloaderModal").show();
        },
        success: function (resp) {
            $("#ajaxloaderModal").hide();
            var obj = JSON.parse(resp);
            if (obj.error == 0) {
                // var image = 
                $('input[name="sign_img"]').val(obj.uploded_message);
                $(".sign_img").attr("src", base_url + "uploads/tempimg/" + obj.uploded_message);
                $('.sign_img_div').html("<a class='cross-image' href='javascript:void(0)' onclick='removeSignImg()'><i class='fa fa-times' aria-hidden='true'></i></a>");


            } else {
                $(".sign_img-error").html(obj.message);
            }
        }
    });
}

function removeSignImg() {
    var images = $('input[name="sign_img"]').val();
    images = $.trim(images);
    var data = {
        "image": images
    };
    data[csfr_token_name] = $.cookie(csfr_cookie_name);

    $.ajax({
        type: "POST",
        url: base_url + "ajax_controller/removeSignImg",
        data: data,
        beforeSend: function () {
            $("#ajaxloaderModal").show();
        },
        success: function (response) {
            $("#ajaxloaderModal").hide();
            var obj = JSON.parse(response);
            if (obj.error == 0) {
                $('input[name="sign_img"]').val("");
                $('#sign_img').val("");
                $('.sign_img').attr("src", base_url + "assets/frontend/images/noimg.png");
                $('.sign_img_div').html("");
                $('.sign_img-error').html("");
            } else {
                $('input[name="sign_img"]').val("");
                $('#sign_img').val("");
                $('.sign_img').attr("src", base_url + "assets/frontend/images/noimg.png");
                $('.sign_img_div').html("");
                $('.sign_img-error').html("");
            }
        }
    });
}


function uploadstCertificateImage() {
    var name = document.getElementById("cast_certi_img").files[0].name;
    var form_data = new FormData();
    var ext = name.split('.').pop().toLowerCase();
    form_data.append("cast_certi_img", document.getElementById('cast_certi_img').files[0]);
    form_data.append(csfr_token_name, $.cookie(csfr_cookie_name));
    $.ajax({
        url: base_url + "ajax_controller/uploadstCertificateImage",
        method: "POST",
        data: form_data,
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function () {
            $("#ajaxloaderModal").show();
        },
        success: function (resp) {
            $("#ajaxloaderModal").hide();
            var obj = JSON.parse(resp);
            if (obj.error == 0) {
                // var image = 
                $('input[name="cast_certi_img"]').val(obj.uploded_message);
                $(".cast_certi_img").attr("src", base_url + "uploads/tempimg/" + obj.uploded_message);
                $('.cast_certi_img_div').html("<a class='cross-image' href='javascript:void(0)' onclick='removeCustImg()'><i class='fa fa-times' aria-hidden='true'></i></a>");


            } else {
                $(".cast_certi_img-error").html(obj.message);
            }
        }
    });
}

function removeCustImg() {
    var images = $('input[name="cast_certi_img"]').val();
    images = $.trim(images);
    var data = {
        "image": images
    };
    data[csfr_token_name] = $.cookie(csfr_cookie_name);

    $.ajax({
        type: "POST",
        url: base_url + "ajax_controller/removeCustImg",
        data: data,
        beforeSend: function () {
            $("#ajaxloaderModal").show();
        },
        success: function (response) {
            $("#ajaxloaderModal").hide();
            var obj = JSON.parse(response);
            if (obj.error == 0) {
                $('input[name="cast_certi_img"]').val("");
                $('#cast_certi_img').val("");
                $('.cast_certi_img').attr("src", base_url + "assets/frontend/images/noimg.png");
                $('.cast_certi_img_div').html("");
                $('.cast_certi_img-error').html("");
            } else {
                $('input[name="cast_certi_img"]').val("");
                $('#cast_certi_img').val("");
                $('.cast_certi_img').attr("src", base_url + "assets/frontend/images/noimg.png");
                $('.cast_certi_img_div').html("");
                $('.cast_certi_img-error').html("");
            }
        }
    });
}

function uploadIdProveImage() {
    var name = document.getElementById("id_prof_img").files[0].name;
    var form_data = new FormData();
    var ext = name.split('.').pop().toLowerCase();
    form_data.append("id_prof_img", document.getElementById('id_prof_img').files[0]);
    form_data.append(csfr_token_name, $.cookie(csfr_cookie_name));
    $.ajax({
        url: base_url + "ajax_controller/uploadIdProveImage",
        method: "POST",
        data: form_data,
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function () {
            $("#ajaxloaderModal").show();
        },
        success: function (resp) {
            $("#ajaxloaderModal").hide();
            var obj = JSON.parse(resp);
            if (obj.error == 0) {
                // var image = 
                $('input[name="id_prof_img"]').val(obj.uploded_message);
                $(".id_prof_img").attr("src", base_url + "uploads/tempimg/" + obj.uploded_message);
                $('.id_prof_img_div').html("<a class='cross-image' href='javascript:void(0)' onclick='removeIdProveImg()'><i class='fa fa-times' aria-hidden='true'></i></a>");


            } else {
                $(".id_prof_img-error").html(obj.message);
            }
        }
    });
}

function removeIdProveImg() {
    var images = $('input[name="id_prof_img"]').val();
    images = $.trim(images);
    var data = {
        "image": images
    };
    data[csfr_token_name] = $.cookie(csfr_cookie_name);

    $.ajax({
        type: "POST",
        url: base_url + "ajax_controller/removeIdProveImg",
        data: data,
        beforeSend: function () {
            $("#ajaxloaderModal").show();
        },
        success: function (response) {
            $("#ajaxloaderModal").hide();
            var obj = JSON.parse(response);
            if (obj.error == 0) {
                $('input[name="id_prof_img"]').val("");
                $('#id_prof_img').val("");
                $('.id_prof_img').attr("src", base_url + "assets/frontend/images/noimg.png");
                $('.id_prof_img_div').html("");
                $('.id_prof_img-error').html("");
            } else {
                $('input[name="id_prof_img"]').val("");
                $('#id_prof_img').val("");
                $('.id_prof_img').attr("src", base_url + "assets/frontend/images/noimg.png");
                $('.id_prof_img_div').html("");
                $('.id_prof_img-error').html("");
            }
        }
    });
}

function uploadGraduateImg() {
    var name = document.getElementById("graduate_marksheet_img").files[0].name;
    var form_data = new FormData();
    var ext = name.split('.').pop().toLowerCase();
    form_data.append("graduate_marksheet_img", document.getElementById('graduate_marksheet_img').files[0]);
    form_data.append(csfr_token_name, $.cookie(csfr_cookie_name));
    $.ajax({
        url: base_url + "ajax_controller/uploadGraduateImg",
        method: "POST",
        data: form_data,
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function () {
            $("#ajaxloaderModal").show();
        },
        success: function (resp) {
            $("#ajaxloaderModal").hide();
            var obj = JSON.parse(resp);
            if (obj.error == 0) {
                // var image = 
                $('input[name="graduate_marksheet_img"]').val(obj.uploded_message);
                $(".graduate_marksheet_img").attr("src", base_url + "uploads/tempimg/" + obj.uploded_message);
                $('.graduate_marksheet_img_div').html("<a class='cross-image' href='javascript:void(0)' onclick='removeGraduateImg()'><i class='fa fa-times' aria-hidden='true'></i></a>");


            } else {
                $(".graduate_marksheet_img-error").html(obj.message);
            }
        }
    });
}

function removeGraduateImg() {
    var images = $('input[name="graduate_marksheet_img"]').val();
    images = $.trim(images);
    var data = {
        "image": images
    };
    data[csfr_token_name] = $.cookie(csfr_cookie_name);

    $.ajax({
        type: "POST",
        url: base_url + "ajax_controller/removeGraduateImg",
        data: data,
        beforeSend: function () {
            $("#ajaxloaderModal").show();
        },
        success: function (response) {
            $("#ajaxloaderModal").hide();
            var obj = JSON.parse(response);
            if (obj.error == 0) {
                $('input[name="graduate_marksheet_img"]').val("");
                $('#graduate_marksheet_img').val("");
                $('.graduate_marksheet_img').attr("src", base_url + "assets/frontend/images/noimg.png");
                $('.graduate_marksheet_img_div').html("");
                $('.graduate_marksheet_img-error').html("");
            } else {
                $('input[name="graduate_marksheet_img"]').val("");
                $('#graduate_marksheet_img').val("");
                $('.graduate_marksheet_img').attr("src", base_url + "assets/frontend/images/noimg.png");
                $('.graduate_marksheet_img_div').html("");
                $('.graduate_marksheet_img-error').html("");
            }
        }
    });
}

function uploadHsImge() {
    var name = document.getElementById("hs_marksheet_img").files[0].name;
    var form_data = new FormData();
    var ext = name.split('.').pop().toLowerCase();
    form_data.append("hs_marksheet_img", document.getElementById('hs_marksheet_img').files[0]);
    form_data.append(csfr_token_name, $.cookie(csfr_cookie_name));
    $.ajax({
        url: base_url + "ajax_controller/uploadHsImge",
        method: "POST",
        data: form_data,
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function () {
            $("#ajaxloaderModal").show();
        },
        success: function (resp) {
            $("#ajaxloaderModal").hide();
            var obj = JSON.parse(resp);
            if (obj.error == 0) {
                // var image = 
                $('input[name="hs_marksheet_img"]').val(obj.uploded_message);
                $(".hs_marksheet_img").attr("src", base_url + "uploads/tempimg/" + obj.uploded_message);
                $('.hs_marksheet_img_div').html("<a class='cross-image' href='javascript:void(0)' onclick='removeHSImage()'><i class='fa fa-times' aria-hidden='true'></i></a>");


            } else {
                $(".hs_marksheet_img-error").html(obj.message);
            }
        }
    });
}

function removeHSImage() {
    var images = $('input[name="hs_marksheet_img"]').val();
    images = $.trim(images);
    var data = {
        "image": images
    };
    data[csfr_token_name] = $.cookie(csfr_cookie_name);

    $.ajax({
        type: "POST",
        url: base_url + "ajax_controller/removeHSImage",
        data: data,
        beforeSend: function () {
            $("#ajaxloaderModal").show();
        },
        success: function (response) {
            $("#ajaxloaderModal").hide();
            var obj = JSON.parse(response);
            if (obj.error == 0) {
                $('input[name="hs_marksheet_img"]').val("");
                $('#hs_marksheet_img').val("");
                $('.hs_marksheet_img').attr("src", base_url + "assets/frontend/images/noimg.png");
                $('.hs_marksheet_img_div').html("");
                $('.hs_marksheet_img-error').html("");
            } else {
                $('input[name="hs_marksheet_img"]').val("");
                $('#hs_marksheet_img').val("");
                $('.hs_marksheet_img').attr("src", base_url + "assets/frontend/images/noimg.png");
                $('.hs_marksheet_img_div').html("");
                $('.hs_marksheet_img-error').html("");
            }
        }
    });
}
function uploadMpimg() {
    var name = document.getElementById("mp_marksheet_img").files[0].name;
    var form_data = new FormData();
    var ext = name.split('.').pop().toLowerCase();
    form_data.append("mp_marksheet_img", document.getElementById('mp_marksheet_img').files[0]);
    form_data.append(csfr_token_name, $.cookie(csfr_cookie_name));
    $.ajax({
        url: base_url + "ajax_controller/uploadMpimg",
        method: "POST",
        data: form_data,
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function () {
            $("#ajaxloaderModal").show();
        },
        success: function (resp) {
            $("#ajaxloaderModal").hide();
            var obj = JSON.parse(resp);
            if (obj.error == 0) {
                // var image = 
                $('input[name="mp_marksheet_img"]').val(obj.uploded_message);
                $(".mp_marksheet_img").attr("src", base_url + "uploads/tempimg/" + obj.uploded_message);
                $('.mp_marksheet_img_div').html("<a class='cross-image' href='javascript:void(0)' onclick='removeMpImage()'><i class='fa fa-times' aria-hidden='true'></i></a>");


            } else {
                $(".mp_marksheet_img-error").html(obj.message);
            }
        }
    });
}

function removeMpImage() {
    var images = $('input[name="mp_marksheet_img"]').val();
    images = $.trim(images);
    var data = {
        "image": images
    };
    data[csfr_token_name] = $.cookie(csfr_cookie_name);

    $.ajax({
        type: "POST",
        url: base_url + "ajax_controller/removeMpImage",
        data: data,
        beforeSend: function () {
            $("#ajaxloaderModal").show();
        },
        success: function (response) {
            $("#ajaxloaderModal").hide();
            var obj = JSON.parse(response);
            if (obj.error == 0) {
                $('input[name="mp_marksheet_img"]').val("");
                $('#mp_marksheet_img').val("");
                $('.mp_marksheet_img').attr("src", base_url + "assets/frontend/images/noimg.png");
                $('.mp_marksheet_img_div').html("");
                $('.mp_marksheet_img-error').html("");
            } else {
                $('input[name="mp_marksheet_img"]').val("");
                $('#mp_marksheet_img').val("");
                $('.mp_marksheet_img').attr("src", base_url + "assets/frontend/images/noimg.png");
                $('.mp_marksheet_img_div').html("");
                $('.mp_marksheet_img-error').html("");
            }
        }
    });
}

/* FRANCHISE DOCUMENT UPLOAD*/
 function uploadRegistrationCertificateImg() 
{
    var name = document.getElementById("registration_certificate_img").files[0].name;
    var form_data = new FormData();
    var ext = name.split('.').pop().toLowerCase();
    form_data.append("registration_certificate_img", document.getElementById('registration_certificate_img').files[0]);
    form_data.append(csfr_token_name, $.cookie(csfr_cookie_name));
    $.ajax({
        url: base_url + "ajax_controller/uploadRegistrationCertificateImg",
        method: "POST",
        data: form_data,
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function () {
            $("#ajaxloaderModal").show();
        },
        success: function (resp) {
            $("#ajaxloaderModal").hide();
            var obj = JSON.parse(resp);
            if (obj.error == 0) {
                // var image = 
                $('input[name="registration_certificate_img"]').val(obj.uploded_message);
                $(".registration_certificate_img").attr("src", base_url + "uploads/tempimg/" + obj.uploded_message);
                $('.registration_certificate_img_div').html("<a class='cross-image' href='javascript:void(0)' onclick='removeRegistrationCertificateImg()'><i class='fa fa-times' aria-hidden='true'></i></a>");
                $(".registration_certificate_img-error").html(''); 

            } else {
                $(".registration_certificate_img-error").html(obj.message);
            }
        }
    });
}

function removeRegistrationCertificateImg() {
    var images = $('input[name="registration_certificate_img"]').val();
    images = $.trim(images);
    var data = {
        "image": images
    };
    data[csfr_token_name] = $.cookie(csfr_cookie_name);

    $.ajax({
        type: "POST",
        url: base_url + "ajax_controller/removeRegistrationCertificateImg",
        data: data,
        beforeSend: function () {
            $("#ajaxloaderModal").show();
        },
        success: function (response) {
            $("#ajaxloaderModal").hide();
            var obj = JSON.parse(response);
            if (obj.error == 0) {
                $('input[name="registration_certificate_img"]').val("");
                $('#registration_certificate_img').val("");
                $('.registration_certificate_img').attr("src", base_url + "assets/frontend/images/noimg.png");
                $('.registration_certificate_img').html("");
                $('.registration_certificate_img-error').html("");
            } else {
                $('input[name="registration_certificate_img"]').val("");
                $('#registration_certificate_img').val("");
                $('.registration_certificate_img').attr("src", base_url + "assets/frontend/images/noimg.png");
                $('.registration_certificate_img_div').html("");
                $('.registration_certificate_img-error').html("");
            }
        }
    });
}

function uploadFrPanCard() 
{
    var name = document.getElementById("franchise_pan_card_img").files[0].name;
    var form_data = new FormData();
    var ext = name.split('.').pop().toLowerCase();
    form_data.append("franchise_pan_card_img", document.getElementById('franchise_pan_card_img').files[0]);
    form_data.append(csfr_token_name, $.cookie(csfr_cookie_name));
    $.ajax({
        url: base_url + "ajax_controller/uploadFrPanCard",
        method: "POST",
        data: form_data,
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function () {
            $("#ajaxloaderModal").show();
        },
        success: function (resp) {
            $("#ajaxloaderModal").hide();
            var obj = JSON.parse(resp);
            if (obj.error == 0) {
                // var image = 
                $('input[name="franchise_pan_card_img"]').val(obj.uploded_message);
                $(".franchise_pan_card_img").attr("src", base_url + "uploads/tempimg/" + obj.uploded_message);
                $('.franchise_pan_card_img_div').html("<a class='cross-image' href='javascript:void(0)' onclick='removeFrPanCard()'><i class='fa fa-times' aria-hidden='true'></i></a>");
                $(".franchise_pan_card_img-error").html('');

            } else {
                $(".franchise_pan_card_img-error").html(obj.message);
            }
        }
    });   
}
function removeFrPanCard() 
{
  var images = $('input[name="franchise_pan_card_img"]').val();
    images = $.trim(images);
    var data = {
        "image": images
    };
    data[csfr_token_name] = $.cookie(csfr_cookie_name);

    $.ajax({
        type: "POST",
        url: base_url + "ajax_controller/removeFrPanCard",
        data: data,
        beforeSend: function () {
            $("#ajaxloaderModal").show();
        },
        success: function (response) {
            $("#ajaxloaderModal").hide();
            var obj = JSON.parse(response);
            if (obj.error == 0) {
                $('input[name="franchise_pan_card_img"]').val("");
                $('#franchise_pan_card_img').val("");
                $('.franchise_pan_card_img').attr("src", base_url + "assets/frontend/images/noimg.png");
                $('.franchise_pan_card_img').html("");
                $('.franchise_pan_card_img-error').html("");
            } else {
                $('input[name="franchise_pan_card_img"]').val("");
                $('#franchise_pan_card_img').val("");
                $('.franchise_pan_card_img').attr("src", base_url + "assets/frontend/images/noimg.png");
                $('.franchise_pan_card_img_div').html("");
                $('.franchise_pan_card_img-error').html("");
            }
        }
    });   
}

function uploadUniqueId() 
{
    var name = document.getElementById("unique_id_img").files[0].name;
    var form_data = new FormData();
    var ext = name.split('.').pop().toLowerCase();
    form_data.append("unique_id_img", document.getElementById('unique_id_img').files[0]);
    form_data.append(csfr_token_name, $.cookie(csfr_cookie_name));
    $.ajax({
        url: base_url + "ajax_controller/uploadUniqueId",
        method: "POST",
        data: form_data,
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function () {
            $("#ajaxloaderModal").show();
        },
        success: function (resp) {
            $("#ajaxloaderModal").hide();
            var obj = JSON.parse(resp);
            if (obj.error == 0) 
            {
                // var image = 
                $('input[name="unique_id_img"]').val(obj.uploded_message);
                $(".unique_id_img").attr("src", base_url + "uploads/tempimg/" + obj.uploded_message);
                $('.unique_id_img_div').html("<a class='cross-image' href='javascript:void(0)' onclick='removeUniqueId()'><i class='fa fa-times' aria-hidden='true'></i></a>");
                $(".unique_id_img-error").html('');

            } 
            else 
            {
                $(".unique_id_img-error").html(obj.message);
            }
        }
    });  
}
function removeUniqueId()
{
   var images = $('input[name="unique_id_img"]').val();
    images = $.trim(images);
    var data = {
        "image": images
    };
    data[csfr_token_name] = $.cookie(csfr_cookie_name);

    $.ajax({
        type: "POST",
        url: base_url + "ajax_controller/removeUniqueId",
        data: data,
        beforeSend: function () {
            $("#ajaxloaderModal").show();
        },
        success: function (response) {
            $("#ajaxloaderModal").hide();
            var obj = JSON.parse(response);
            if (obj.error == 0) {
                $('input[name="unique_id_img"]').val("");
                $('#unique_id_img').val("");
                $('.unique_id_img').attr("src", base_url + "assets/frontend/images/noimg.png");
                $('.unique_id_img').html("");
                $('.unique_id_img-error').html("");
            } else {
                $('input[name="unique_id_img"]').val("");
                $('#unique_id_img').val("");
                $('.unique_id_img').attr("src", base_url + "assets/frontend/images/noimg.png");
                $('.unique_id_img_div').html("");
                $('.unique_id_img-error').html("");
            }
        }
    });
}

function uploadMsmeCertificate() 
{
    var name = document.getElementById("msme_certificate_img").files[0].name;
    var form_data = new FormData();
    var ext = name.split('.').pop().toLowerCase();
    form_data.append("msme_certificate_img", document.getElementById('msme_certificate_img').files[0]);
    form_data.append(csfr_token_name, $.cookie(csfr_cookie_name));
    $.ajax({
        url: base_url + "ajax_controller/uploadMsmeCertificate",
        method: "POST",
        data: form_data,
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function () {
            $("#ajaxloaderModal").show();
        },
        success: function (resp) {
            $("#ajaxloaderModal").hide();
            var obj = JSON.parse(resp);
            if (obj.error == 0) 
            {
                // var image = 
                $('input[name="msme_certificate_img"]').val(obj.uploded_message);
                $(".msme_certificate_img").attr("src", base_url + "uploads/tempimg/" + obj.uploded_message);
                $('.msme_certificate_img_div').html("<a class='cross-image' href='javascript:void(0)' onclick='removeMsmeCertificate()'><i class='fa fa-times' aria-hidden='true'></i></a>");
                $(".msme_certificate_img-error").html('');

            } 
            else 
            {
                $(".msme_certificate_img-error").html(obj.message);
            }
        }
    });
}
function removeMsmeCertificate() 
{
    var images = $('input[name="msme_certificate_img"]').val();
    images = $.trim(images);
    var data = {
        "image": images
    };
    data[csfr_token_name] = $.cookie(csfr_cookie_name);

    $.ajax({
        type: "POST",
        url: base_url + "ajax_controller/removeMsmeCertificate",
        data: data,
        beforeSend: function () {
            $("#ajaxloaderModal").show();
        },
        success: function (response) {
            $("#ajaxloaderModal").hide();
            var obj = JSON.parse(response);
            if (obj.error == 0) {
                $('input[name="msme_certificate_img"]').val("");
                $('#msme_certificate_img').val("");
                $('.msme_certificate_img').attr("src", base_url + "assets/frontend/images/noimg.png");
                $('.msme_certificate_img').html("");
                $('.msme_certificate_img-error').html("");
            } else {
                $('input[name="msme_certificate_img"]').val("");
                $('#msme_certificate_img').val("");
                $('.msme_certificate_img').attr("src", base_url + "assets/frontend/images/noimg.png");
                $('.msme_certificate_img_div').html("");
                $('.msme_certificate_img-error').html("");
            }
        }
    });
}

function uploadAadharCard() 
{
    var name = document.getElementById("president_aadhar_img").files[0].name;
    var form_data = new FormData();
    var ext = name.split('.').pop().toLowerCase();
    form_data.append("president_aadhar_img", document.getElementById('president_aadhar_img').files[0]);
    form_data.append(csfr_token_name, $.cookie(csfr_cookie_name));
    $.ajax({
        url: base_url + "ajax_controller/uploadAadharCard",
        method: "POST",
        data: form_data,
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function () {
            $("#ajaxloaderModal").show();
        },
        success: function (resp) {
            $("#ajaxloaderModal").hide();
            var obj = JSON.parse(resp);
            if (obj.error == 0) 
            {
                // var image = 
                $('input[name="president_aadhar_img"]').val(obj.uploded_message);
                $(".president_aadhar_img").attr("src", base_url + "uploads/tempimg/" + obj.uploded_message);
                $('.president_aadhar_img_div').html("<a class='cross-image' href='javascript:void(0)' onclick='removeAadharCard()'><i class='fa fa-times' aria-hidden='true'></i></a>");
                $(".president_aadhar_img-error").html('');

            } 
            else 
            {
                $(".president_aadhar_img-error").html(obj.message);
            }
        }
    });  
}
function removeAadharCard() 
{
   var images = $('input[name="president_aadhar_img"]').val();
    images = $.trim(images);
    var data = {
        "image": images
    };
    data[csfr_token_name] = $.cookie(csfr_cookie_name);

    $.ajax({
        type: "POST",
        url: base_url + "ajax_controller/removeAadharCard",
        data: data,
        beforeSend: function () {
            $("#ajaxloaderModal").show();
        },
        success: function (response) {
            $("#ajaxloaderModal").hide();
            var obj = JSON.parse(response);
            if (obj.error == 0) {
                $('input[name="president_aadhar_img"]').val("");
                $('#president_aadhar_img').val("");
                $('.president_aadhar_img').attr("src", base_url + "assets/frontend/images/noimg.png");
                $('.president_aadhar_img').html("");
                $('.president_aadhar_img-error').html("");
            } else {
                $('input[name="president_aadhar_img"]').val("");
                $('#president_aadhar_img').val("");
                $('.president_aadhar_img').attr("src", base_url + "assets/frontend/images/noimg.png");
                $('.president_aadhar_img_div').html("");
                $('.president_aadhar_img-error').html("");
            }
        }
    });
}

function uploadPresidentPanCard() 
{
    var name = document.getElementById("president_pan_img").files[0].name;
    var form_data = new FormData();
    var ext = name.split('.').pop().toLowerCase();
    form_data.append("president_pan_img", document.getElementById('president_pan_img').files[0]);
    form_data.append(csfr_token_name, $.cookie(csfr_cookie_name));
    $.ajax({
        url: base_url + "ajax_controller/uploadPresidentPanCard",
        method: "POST",
        data: form_data,
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function () {
            $("#ajaxloaderModal").show();
        },
        success: function (resp) {
            $("#ajaxloaderModal").hide();
            var obj = JSON.parse(resp);
            if (obj.error == 0) 
            {
                // var image = 
                $('input[name="president_pan_img"]').val(obj.uploded_message);
                $(".president_pan_img").attr("src", base_url + "uploads/tempimg/" + obj.uploded_message);
                $('.president_pan_img_div').html("<a class='cross-image' href='javascript:void(0)' onclick='removePresidentPanCard()'><i class='fa fa-times' aria-hidden='true'></i></a>");
                $(".president_pan_img-error").html('');

            } 
            else 
            {
                $(".president_pan_img-error").html(obj.message);
            }
        }
    });  
}
function removePresidentPanCard() 
{
    var images = $('input[name="president_pan_img"]').val();
    images = $.trim(images);
    var data = {
        "image": images
    };
    data[csfr_token_name] = $.cookie(csfr_cookie_name);

    $.ajax({
        type: "POST",
        url: base_url + "ajax_controller/removePresidentPanCard",
        data: data,
        beforeSend: function () {
            $("#ajaxloaderModal").show();
        },
        success: function (response) {
            $("#ajaxloaderModal").hide();
            var obj = JSON.parse(response);
            if (obj.error == 0) {
                $('input[name="president_pan_img"]').val("");
                $('#president_pan_img').val("");
                $('.president_pan_img').attr("src", base_url + "assets/frontend/images/noimg.png");
                $('.president_pan_img').html("");
                $('.president_pan_img-error').html("");
            } else {
                $('input[name="president_pan_img"]').val("");
                $('#president_pan_img').val("");
                $('.president_pan_img').attr("src", base_url + "assets/frontend/images/noimg.png");
                $('.president_pan_img_div').html("");
                $('.president_pan_img-error').html("");
            }
        }
    });
}

function uploadPresidentImage() 
{
    var name = document.getElementById("president_photograph_img").files[0].name;
    var form_data = new FormData();
    var ext = name.split('.').pop().toLowerCase();
    form_data.append("president_photograph_img", document.getElementById('president_photograph_img').files[0]);
    form_data.append(csfr_token_name, $.cookie(csfr_cookie_name));
    $.ajax({
        url: base_url + "ajax_controller/uploadPresidentImage",
        method: "POST",
        data: form_data,
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function () {
            $("#ajaxloaderModal").show();
        },
        success: function (resp) {
            $("#ajaxloaderModal").hide();
            var obj = JSON.parse(resp);
            if (obj.error == 0) 
            {
                // var image = 
                $('input[name="president_photograph_img"]').val(obj.uploded_message);
                $(".president_photograph_img").attr("src", base_url + "uploads/tempimg/" + obj.uploded_message);
                $('.president_photograph_img_div').html("<a class='cross-image' href='javascript:void(0)' onclick='removePresidentImage()'><i class='fa fa-times' aria-hidden='true'></i></a>");
                $(".president_photograph_img-error").html('');

            } 
            else 
            {
                $(".president_photograph_img-error").html(obj.message);
            }
        }
    });
}
function removePresidentImage() 
{
  var images = $('input[name="president_photograph_img"]').val();
    images = $.trim(images);
    var data = {
        "image": images
    };
    data[csfr_token_name] = $.cookie(csfr_cookie_name);

    $.ajax({
        type: "POST",
        url: base_url + "ajax_controller/removePresidentImage",
        data: data,
        beforeSend: function () {
            $("#ajaxloaderModal").show();
        },
        success: function (response) {
            $("#ajaxloaderModal").hide();
            var obj = JSON.parse(response);
            if (obj.error == 0) {
                $('input[name="president_photograph_img"]').val("");
                $('#president_photograph_img').val("");
                $('.president_photograph_img').attr("src", base_url + "assets/frontend/images/noimg.png");
                $('.president_photograph_img').html("");
                $('.president_photograph_img-error').html("");
            } else {
                $('input[name="president_photograph_img"]').val("");
                $('#president_photograph_img').val("");
                $('.president_photograph_img').attr("src", base_url + "assets/frontend/images/noimg.png");
                $('.president_photograph_img_div').html("");
                $('.president_photograph_img-error').html("");
            }
        }
    });  
}

function uploadSignatureImages() 
{
    var name = document.getElementById("president_signature_img").files[0].name;
    var form_data = new FormData();
    var ext = name.split('.').pop().toLowerCase();
    form_data.append("president_signature_img", document.getElementById('president_signature_img').files[0]);
    form_data.append(csfr_token_name, $.cookie(csfr_cookie_name));
    $.ajax({
        url: base_url + "ajax_controller/uploadSignatureImages",
        method: "POST",
        data: form_data,
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function () {
            $("#ajaxloaderModal").show();
        },
        success: function (resp) {
            $("#ajaxloaderModal").hide();
            var obj = JSON.parse(resp);
            if (obj.error == 0) 
            {
                // var image = 
                $('input[name="president_signature_img"]').val(obj.uploded_message);
                $(".president_signature_img").attr("src", base_url + "uploads/tempimg/" + obj.uploded_message);
                $('.president_signature_img_div').html("<a class='cross-image' href='javascript:void(0)' onclick='removeSignatureImages()'><i class='fa fa-times' aria-hidden='true'></i></a>");
                $(".president_signature_img-error").html('');

            } 
            else 
            {
                $(".president_signature_img-error").html(obj.message);
            }
        }
    });  
}
function removeSignatureImages() 
{
  var images = $('input[name="president_signature_img"]').val();
    images = $.trim(images);
    var data = {
        "image": images
    };
    data[csfr_token_name] = $.cookie(csfr_cookie_name);

    $.ajax({
        type: "POST",
        url: base_url + "ajax_controller/removeSignatureImages",
        data: data,
        beforeSend: function () {
            $("#ajaxloaderModal").show();
        },
        success: function (response) {
            $("#ajaxloaderModal").hide();
            var obj = JSON.parse(response);
            if (obj.error == 0) {
                $('input[name="president_signature_img"]').val("");
                $('#president_signature_img').val("");
                $('.president_signature_img').attr("src", base_url + "assets/frontend/images/noimg.png");
                $('.president_signature_img').html("");
                $('.president_signature_img-error').html("");
            } else {
                $('input[name="president_signature_img"]').val("");
                $('#president_signature_img').val("");
                $('.president_signature_img').attr("src", base_url + "assets/frontend/images/noimg.png");
                $('.president_signature_img_div').html("");
                $('.president_signature_img-error').html("");
            }
        }
    });  
}
function sendVerificationCode() 
{
        $(document).ready(function() 
        {
            var email = $("#franchise_email").val();
            var user_id = $("#franchise_user_id").val();
            if (email!= '' && email != null) 
            {
                var data = {email_type:'verification',email:email,user_id:user_id,verification_type:'email'};
                data[csfr_token_name] = $.cookie(csfr_cookie_name);
                $.ajax({
                    type: "POST",
                    url: base_url+"auto-send-email-post",
                    data: data,
                    dataType:'json',
                    beforeSend: function () {
                        $("#ajaxloaderModal").show();
                    },
                    success: function(response) 
                    {
                       $("#ajaxloaderModal").hide(); 
                       alert(response.message);
                       if (response.status) 
                       {
                         $("#verified-modal").modal('show');
                         console.log(response.verification_id);
                         $("#verification_id").val(response.verification_id);
                       }
                    }
                });
            }
            else
            {
                alert("Email must be null.");
            }    
        });   
}
function verifiedEmail() 
{
   $(document).ready(function() 
        {
            var verification_code = $("#verification_code").val();
            var verification_id = $("#verification_id").val();
            var data = {verification_code:verification_code,verification_id:verification_id};
            data[csfr_token_name] = $.cookie(csfr_cookie_name);
            $.ajax({
                type: "POST",
                url: base_url+"ajax_controller/verified_email",
                data: data,
                dataType:'json',
                beforeSend: function () {
                        $("#ajaxloaderModal").show();
                    },
                success: function(response) 
                {
                   $("#ajaxloaderModal").hide(); 
                   alert(response.message);
                   if (response.status) 
                   {
                     $("#verified-modal").modal('hide');
                     $(".verification_div").html('<span class="pull-right" style="background-color: green;border-radius: 2px;"> Email Verified</span>');
                     $("#email_verification").val(1)
                   }
                }
            });  
        });
}