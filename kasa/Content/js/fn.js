(function ($) {
    //-----------------------------------------------------------------------------------------------------------------------------------------------------
    $(".webtill-reset-password").on("click", function () {
        var GetAdresi = '../kasa/index.php?s=userediting';
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
		var PostAdresi = '../kasa/index.php?s=userediting';
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
		var PostAdresi = '../kasa/index.php?s=userediting';
        postApi(PostAdresi, '#payout-form', '', '.modal-payout', 'true', 'true', $('.btn-payout'));
    });
    //-----------------------------------------------------------------------------------------------------------------------------------------------------
	$(document).on('click', '.customer-payin-bakiye', function (e) {
        e.preventDefault()

        var self = $(this),
        modalid = self.data('customerid') + '-' + self.data('islem'),
        modal = $('.modal-payin-bakiye')

        modal.modal('show')
        var form = modal.find('#payin-form-bakiye')
        form.find('#customerid').val(self.data('customerid'))
        form.find('#islem').val(self.data('islem'))
    })

    $('.modal-payin-bakiye').on('shown.bs.modal', function () {
        $(this).find('#limitstr').focus()
    })

    $(".btn-payin-bakiye").on("click", function () {
		var PostAdresi = '../kasa/index.php?s=userediting';
        postApi(PostAdresi, '#payin-form-bakiye', '', '.modal-payin-bakiye', 'true', 'true', $('.btn-payin-bakiye'));
    });
	//-----------------------------------------------------------------------------------------------------------------------------------------------------
	$(document).on('click', '.customer-payout-bakiye', function (e) {
        e.preventDefault()
        var self = $(this),
        modalid = self.data('customerid') + '-' + self.data('islem'),
        modal = $('.modal-payout-bakiye')

        modal.modal('show')
        var form = modal.find('#payout-form-bakiye')
        form.find('#customerid').val(self.data('customerid'))
        form.find('#islem').val(self.data('islem'))
    })

    $('.modal-payout-bakiye').on('shown.bs.modal', function () {
        $(this).find('#limitstr').focus()
        $(this).find('#pay_type').val("Diğer");
    })

    $(".btn-payout-bakiye").on("click", function () {
		var PostAdresi = '../kasa/index.php?s=userediting';
        postApi(PostAdresi, '#payout-form-bakiye', '', '.modal-payout-bakiye', 'true', 'true', $('.btn-payout-bakiye'));
    });
    //-----------------------------------------------------------------------------------------------------------------------------------------------------
	$(document).on('click', '.customer-payin-casinobakiye', function (e) {
        e.preventDefault()

        var self = $(this),
        modalid = self.data('customerid') + '-' + self.data('islem'),
        modal = $('.modal-payin-casinobakiye')

        modal.modal('show')
        var form = modal.find('#payin-form-casinobakiye')
        form.find('#customerid').val(self.data('customerid'))
        form.find('#islem').val(self.data('islem'))
    })

    $('.modal-payin-casinobakiye').on('shown.bs.modal', function () {
        $(this).find('#limitstr').focus()
    })

    $(".btn-payin-casinobakiye").on("click", function () {
		var PostAdresi = '../kasa/index.php?s=userediting';
        postApi(PostAdresi, '#payin-form-casinobakiye', '', '.modal-payin-casinobakiye', 'true', 'true', $('.btn-payin-casinobakiye'));
    });
	//-----------------------------------------------------------------------------------------------------------------------------------------------------
	$(document).on('click', '.customer-payout-casinobakiye', function (e) {
        e.preventDefault()
        var self = $(this),
        modalid = self.data('customerid') + '-' + self.data('islem'),
        modal = $('.modal-payout-casinobakiye')

        modal.modal('show')
        var form = modal.find('#payout-form-casinobakiye')
        form.find('#customerid').val(self.data('customerid'))
        form.find('#islem').val(self.data('islem'))
    })

    $('.modal-payout-casinobakiye').on('shown.bs.modal', function () {
        $(this).find('#limitstr').focus()
        $(this).find('#pay_type').val("Diğer");
    })

    $(".btn-payout-casinobakiye").on("click", function () {
		var PostAdresi = '../kasa/index.php?s=userediting';
        postApi(PostAdresi, '#payout-form-casinobakiye', '', '.modal-payout-casinobakiye', 'true', 'true', $('.btn-payout-casinobakiye'));
    });
	//-----------------------------------------------------------------------------------------------------------------------------------------------------
	$(document).on('click', '.customer-payin-kupondegisim', function (e) {
        e.preventDefault()

        var self = $(this),
        modalid = self.data('kuponid') + '-' + self.data('kuponicid') + '-' + self.data('islem') + '-' + self.data('durum'),
        modal = $('.modal-payin-kupondegisim')

        modal.modal('show')
        var form = modal.find('#payin-form-kupondegisim')
        form.find('#kuponid').val(self.data('kuponid'))
        form.find('#kuponicid').val(self.data('kuponicid'))
        form.find('#islem').val(self.data('islem'))
        form.find('#durum').val(self.data('durum'))
    })
	
	$('.modal-payin-kupondegisim').on('shown.bs.modal', function () {
        $(this).find('#cdurum').focus()
    })

    $(".btn-payin-kupondegisim").on("click", function () {
		var PostAdresi = '../kasa/index.php?s=kupondegistir';
        postApi(PostAdresi, '#payin-form-kupondegisim', '', '.modal-payin-kupondegisim', 'true', 'true', $('.btn-payin-kupondegisim'));
    });
	//-----------------------------------------------------------------------------------------------------------------------------------------------------
	$(document).on('click', '.customer-payin-casinokupondegisim', function (e) {
        e.preventDefault()

        var self = $(this),
        modalid = self.data('kuponid') + '-' + self.data('kuponicid') + '-' + self.data('islem') + '-' + self.data('durum'),
        modal = $('.modal-payin-casinokupondegisim')

        modal.modal('show')
        var form = modal.find('#payin-form-casinokupondegisim')
        form.find('#kuponid').val(self.data('kuponid'))
        form.find('#kuponicid').val(self.data('kuponicid'))
        form.find('#islem').val(self.data('islem'))
        form.find('#durum').val(self.data('durum'))
    })
	
	$('.modal-payin-casinokupondegisim').on('shown.bs.modal', function () {
        $(this).find('#cdurum').focus()
    })

    $(".btn-payin-casinokupondegisim").on("click", function () {
		var PostAdresi = '../kasa/index.php?s=kupondegistir';
        postApi(PostAdresi, '#payin-form-casinokupondegisim', '', '.modal-payin-casinokupondegisim', 'true', 'true', $('.btn-payin-casinokupondegisim'));
    });
	//-----------------------------------------------------------------------------------------------------------------------------------------------------
	$(document).on('click', '.customer-payin-casinokupondegisimrulet', function (e) {
        e.preventDefault()

        var self = $(this),
        modalid = self.data('kuponid') + '-' + self.data('kuponicid') + '-' + self.data('islem') + '-' + self.data('durum'),
        modal = $('.modal-payin-casinokupondegisimrulet')

        modal.modal('show')
        var form = modal.find('#payin-form-casinokupondegisimrulet')
        form.find('#kuponid').val(self.data('kuponid'))
        form.find('#kuponicid').val(self.data('kuponicid'))
        form.find('#islem').val(self.data('islem'))
        form.find('#durum').val(self.data('durum'))
    })
	
	$('.modal-payin-casinokupondegisimrulet').on('shown.bs.modal', function () {
        $(this).find('#cdurum').focus()
    })

    $(".btn-payin-casinokupondegisimrulet").on("click", function () {
		var PostAdresi = '../kasa/index.php?s=kupondegistir';
        postApi(PostAdresi, '#payin-form-casinokupondegisimrulet', '', '.modal-payin-casinokupondegisimrulet', 'true', 'true', $('.btn-payin-casinokupondegisimrulet'));
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
