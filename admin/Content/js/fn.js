(function ($) {
    //-----------------------------------------------------------------------------------------------------------------------------------------------------
    $(".webtill-reset-password").on("click", function () {
        var GetAdresi = '/superadmin/index.php?s=userediting';
        getApi('Kullanıcının şifresini sıfırlamak istediğinizden emin misiniz ?', $(".webtill-reset-password"), GetAdresi, 'false', '');
    });
    //-----------------------------------------------------------------------------------------------------------------------------------------------------
    $(document).on('click', '.customer-payin', function (e) {
        e.preventDefault()

        var self = $(this),
        modalid = self.data('customerid') + '-' + self.data('islem'),
        modal = $('.modal-payin')

        modal.modal('show')
        var form = modal.find('#payin-form')
        form.find('#customerid').val(self.data('customerid'))
        form.find('#islem').val(self.data('islem'))
    })

    $('.modal-payin').on('shown.bs.modal', function () {
        $(this).find('#limitstr').focus()
    })

    $(".btn-payin").on("click", function () {
		var PostAdresi = '/superadmin/index.php?s=userediting';
        postApi(PostAdresi, '#payin-form', '', '.modal-payin', 'true', 'true', $('.btn-payin'));
    });
    //-----------------------------------------------------------------------------------------------------------------------------------------------------
    $(document).on('click', '.customer-payout', function (e) {
        e.preventDefault()
        var self = $(this),
        modalid = self.data('customerid') + '-' + self.data('islem'),
        modal = $('.modal-payout')

        modal.modal('show')
        var form = modal.find('#payout-form')
        form.find('#customerid').val(self.data('customerid'))
        form.find('#islem').val(self.data('islem'))
    })

    $('.modal-payout').on('shown.bs.modal', function () {
        $(this).find('#limitstr').focus()
        $(this).find('#pay_type').val("Diğer");
    })

    $(".btn-payout").on("click", function () {
		var PostAdresi = '/superadmin/index.php?s=userediting';
        postApi(PostAdresi, '#payout-form', '', '.modal-payout', 'true', 'true', $('.btn-payout'));
    });
    //-----------------------------------------------------------------------------------------------------------------------------------------------------
    $('#start-date').pickadate({
        formatSubmit: 'yyyy-mm-dd',
        hiddenSuffix: 'start'
    })
    $('#end-date').pickadate({
        formatSubmit: 'yyyy-mm-dd',
        hiddenSuffix: 'end'
    })
    //-----------------------------------------------------------------------------------------------------------------------------------------------------

    $("#myModal").on("show.bs.modal", function (e) {
        var link = $(e.relatedTarget);
        $("iframe").attr("src", link.attr("href"));
        $("iframe").attr("height", screen.height - 150);
        $("iframe").attr("width", "99%");
    });
    //-----------------------------------------------------------------------------------------------------------------------------------------------------

    $('form').on('keyup keypress', function (e) {
        var keyCode = e.keyCode || e.which;
        if (keyCode === 13) {
            e.preventDefault();
            return false;
        }
    });
    //-----------------------------------------------------------------------------------------------------------------------------------------------------

    $(".update-all-balances").on("click", function () {
        window.location.reload();
    });
    //-----------------------------------------------------------------------------------------------------------------------------------------------------

    $(".CustomerBalance").on("click", function () {
        $("#frm").submit();
    });
})(jQuery)
