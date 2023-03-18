
function postApi(posturl, form, redirecturl, modal, val, reload, btndisabled) {
    if (btndisabled != '') { $(btndisabled).attr("disabled", true); }
    $('#success').hide();
    $('#error').hide();
    $('#info').show().html('İşleminiz yapılıyor lütfen bekleyiniz');
    var self = $(form);
    $.post(posturl, $(form).serialize()).done(function (res) {
        if (res==1) {
            $('#info').hide();
            $('#success').show().html("İşleminiz Gerçekleştirildi");
            $('#error').hide();
            if (btndisabled != '') { $(btndisabled).attr("disabled", true); }
            if (reload != '') { var x = setTimeout('window.location.reload()', 3000); }
        } else if (res==2) {
            $('#error').show().html("İşleminiz Gerçekleştirilemedi.");
            $('#info').hide();
            $('#success').hide();
            if (btndisabled != '') { $(btndisabled).attr("disabled", false); }
        }
        // else
            // window.location.href = res.redirect

        // if (redirecturl != '')
            // window.location.href = redirecturl;

        if (val != '') {
            self.find('input').val('');
            self.find('#type').val(1);
            self.find('select').val('');
        }

        if (modal != '') {
            if (btndisabled != '') { $(btndisabled).attr("disabled", false); }
            $(modal).modal('hide')
        }

    });
}

function getApi(confstr, thiss, posturl, redirect, redirecturl) {
    var conf = confirm(confstr);
    if (!conf) return false
    var self = $(thiss);
    var id = self.data('id');
    var tur = self.data('tur');
    $('#success').hide();
    $('#error').hide();
    $('#info').show().html('İşleminiz yapılıyor, lütfen bekleyiniz');
    $.get(posturl + '?ID=' + id + '&Islem=' + tur, function (res) {
        if (res.success) {
            $('#success').show().html(res.success);
            $('#error').hide();
            $('#info').hide();
            self.hide()
        } else if (res.error) {
            $('#error').show().html(res.error);
            $('#info').hide();
        }
        else
            window.location.href = res.redirect;

        if (redirect == true)
            window.location.href = redirecturl;

         if (redirect == '2'){
            window.history.back();
         }
    })
}

function getKupon(confstr, thiss, posturl, redirect, redirecturl) {
    var conf = confirm(confstr);
    if (!conf) return false
    var self = $(thiss);
    var id = self.data('id');
    var tur = self.data('tur');
    $('#success').hide();
    $('#error').hide();
    $('#info').show().html('İşleminiz yapılıyor, lütfen bekleyiniz');
    $.get(posturl + '?ID=' + id + '&Islem=' + tur, function (res) {
        if (res.success) {
            $('#success').show().html(res.success);
            $('#error').hide();
            $('#info').hide();
            self.hide()
        } else if (res.error) {
            $('#error').show().html(res.error);
            $('#info').hide();
        }
        else
            window.location.href = res.redirect;

        if (redirect == true)
            window.location.href = redirecturl;
    })
}