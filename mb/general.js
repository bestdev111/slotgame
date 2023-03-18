function failcont(msg) {
	$("#black").fadeIn();
	$(".failcont").fadeIn();
	$(".failcontt").html(msg);
	$("#failkap").focus();
}
function blackkapat() {
$("#black #macdetay").hide(); 
$("#black .failcont").hide();
$("#black").hide(); 
$("body").css('overflow','auto');	
}
function afterkuponguncelle() {
var rand = Math.random();
var kuponyatan = $("#kuponyatan").val();
var telefon = $("#telefon").val();
var kuponisim = $("#kuponisim").val();
var toplamoran = $("#toplamoran").val();
$.get('../ajaxmobil.php?a=kuponguncelle&toplamoran='+toplamoran+'&after=1&rand='+rand+'&kuponyatan='+kuponyatan+'&telefon='+telefon+'&kuponisim='+kuponisim+'',function(data) { $("#kuponalan").html(data); });
}

function favekle(eventid) {
var rand = Math.random();
$.get('../ajaxmobil.php?a=favoriekle&eventid='+eventid+'',function(data) { canlimaclist(); });	
}

function kupontemizle() {
var rand = Math.random();
$("#cupdate").val('1');
$.get('../ajaxmobil.php?a=kupontemizle&rand='+rand+'',function() { 
kuponguncelle(1);
});	
}

function msg(durum,msg) {
var setle;
clearInterval(setle);
$("#"+durum+"").hide();
$("#"+durum+"").html(msg);
$("#"+durum+"").show('pulsate', { times:2 },100);
var setle = setTimeout(function() { $("#"+durum+"").hide(); },2000);
}

function kuponsil(id) {
var rand = Math.random();
loadgir("kuponalan");
$.get('../ajaxmobil.php?a=kuponsil&rand='+rand+'&id='+id+'',function(data) { kuponguncelle(1);kuponadet(); });	
}

function curs(val) {
if(val==1) {
$(document).css('cursor','wait');
$("body").css('cursor','wait');
} else
if(val==2) {
$(document).css('cursor','default');
$("body").css('cursor','default');	
}	
}


function kuponguncelle(val) {
	if(val==1) { $("#kuponalan").html(''); }
	var cupdate = $("#cupdate").val();
	if(cupdate=="1") {
	var rand = Math.random();
	var kuponyatan = $("#kuponyatan").val();
	var telefon = $("#telefon").val();
	var kuponisim = $("#kuponisim").val();
	var req = $.ajax({
    url: '../ajaxmobil.php?a=kuponguncelle&alowa=1&rand='+rand+'&kuponyatan='+kuponyatan+'&telefon='+telefon+'&kuponisim='+kuponisim+'',
    error: function(data){
	kuponguncelle(val);
    },
    success: function(data){
	$("#kuponalan").html(data);
	$('#kuponyatan').trigger('keyup');
	}, timeout: 5000
	});	
		
	}
}


function kupon(val) {
blackkapat();
curs(1);
var rand = Math.random();
$.get('../ajaxmobil.php?a=kuponekle&val='+val+'',function(data) {  
curs(2);
if(data=="201") { kuponguncelle(1); } else
if(data=="200") { kuponguncelle(1); }
});
}

$(document).ready(function(e) {
    $("#failkap").click(function() { 
	$("#black").hide();
	$(".inmorebet").hide();
	$(".morebetarea").hide();
	$(".failcont").hide();
	});
});
jQuery(function($){
	$.datepicker.regional['tr'] = {
		closeText: 'kapat',
		prevText: ' Önceki Ay ',
		nextText: ' Sonraki Ay ',
		currentText: 'bugün',
		monthNames: ['Ocak','Şubat','Mart','Nisan','Mayıs','Haziran',
		'Temmuz','Ağustos','Eylül','Ekim','Kasım','Aralık'],
		monthNamesShort: ['Ocak','Şubat','Mart','Nisan','Mayıs','Haziran',
		'Temmuz','Ağustos','Eylül','Ekim','Kasım','Aralık'],
		dayNames: ['Pazar','Pazartesi','Salı','Çarşamba','Perşembe','Cuma','Cumartesi'],
		dayNamesShort: ['Pz','Pt','Sa','Ça','Pe','Cu','Ct'],
		dayNamesMin: ['Pz','Pt','Sa','Ça','Pe','Cu','Ct'],
		weekHeader: 'Hf',
		dateFormat: 'dd-mm-yy',
		firstDay: 1,
		isRTL: false,
		showMonthAfterYear: false,
		yearSuffix: ''};
	$.datepicker.setDefaults($.datepicker.regional['tr']);
});
function kupond(id) {
$("#gordum_"+id+"").show();
$(".kupond").fadeIn('fast');
$(".kuponici").html('<div class="kuponload"><img src="img/kuponload.GIF"><span>Bekleyin...</span></div>');
var rand = Math.random();
$.get('../ajaxmobil.php?a=kupond&id='+id+'&rand='+rand+'',function(data) { $(".kuponici").html(data); });
}

$(document).ready(function(e) {
	$(".kupond").click(function() { 
	var klose = $("#kuponclose").val();
	if(klose=="1") {
	$(".kupond").fadeOut('fast'); 
	}
	});
	$(".kuponici").mouseenter(function() { $("#kuponclose").val('0'); }).mouseleave(function() { $("#kuponclose").val('1'); });
    $(".kuponkapat").click(function() { 
	$(".kupond").fadeOut('fast');
	});
	$("#istat").click(function(e) {
        $("#istat").hide();
		$("body").css('overflow','auto');
    });
});
function kuponyazdir(id) { 
if(id=="son") {
$("#printerlock").html('<iframe src="printKupon.php?son=1" style="width:0px; height:0px;"></iframe>'); 
} else {
$("#printerlock").html('<iframe src="printKupon.php?id='+id+'" style="width:0px; height:0px;"></iframe>'); 
}
}

function userkontrol() {
var user = $("#ouser").val();
var rand = Math.random();
$.get('../ajaxmobil.php?a=userkontrol&user='+user+'&rand='+rand+'',function(data) { 
if(data=="400") { failcont('Bu kullanıcı adı önceden alınmıştır. Lütfen başka bir kullanıcı adı yazın'); $("#ussecure").val('0'); } else {
$("#ussecure").val('1');
}
});		
}

function userkontroledit() {
var user = $("#ouser").val();
var normuser = $("#normuser").val();
var rand = Math.random();
if(normuser!=user) {
$.get('../ajaxmobil.php?a=userkontrol&user='+user+'&rand='+rand+'',function(data) { 
if(data=="400") { failcont('Bu kullanıcı adı önceden alınmıştır. Lütfen başka bir kullanıcı adı yazın'); $("#ussecure").val('0'); } else {
$("#ussecure").val('1');
}
});	
}
}


function loadgir(div) { $("#"+div+"").show(); $("#"+div+"").html(''); }
function bakiye(tip,id) {
if(tip=="ekle") { $("#eklecikar_"+id+"").html('<div style="color:#14892c;font-weight:bold;font-size:16px;">(+) eklenecek tutar</div>'); } else
if(tip=="cikar") { $("#eklecikar_"+id+"").html('<div style="color:#f00;font-weight:bold;font-size:16px;">(-) çıkarılacak tutar</div>'); }
$("#bakiyedurum_"+id+"").val(tip);
$("#b_"+id+"").fadeIn('fast');
$("#bakiye_"+id+"").focus();
}
function nowbak(id) {
var tutar = $("#bakiye_"+id+"").val();
var tip = $("#bakiyedurum_"+id+"").val();
var rand = Math.random();
$.get('../ajaxmobil.php?a=bakiyeislem&tip='+tip+'&tutar='+tutar+'&rand='+rand+'&uid='+id+'',function(data) {
if(data=="400") { failcont('Bu bayi için bu işlemi yapabilecek yetkiniz yoktur.'); 
$("#b_"+id+"").fadeOut();
} else
if(data=="304") { failcont('Sizde ya da kullanıcıda bu işlemi yapabilecek kadar bakiye görünmüyor.'); } else
if(data=="200") { failcont('Bakiye işlendi.');
limitupdate();
var defotime = $("#defotime").val();
bayiler(defotime);
$("#b_"+id+"").fadeOut();
}
});
}
function istatistik(id) {
$("#istat").fadeIn();
$("body").css('overflow','hidden');	
$("#istatcont").html('<iframe src="istatistik.php?id='+id+'" class="scra"></iframe>');
}
function limitupdate() {
var rand = Math.random();
$.get('../ajaxmobil.php?a=limitupdate&rand='+rand+'',function(data) { $("#bubakiye").html(data); });
}
function toggle(source) {
  checkboxes = document.getElementsByName('users[]');
  for(var i=0, n=checkboxes.length;i<n;i++) {
    checkboxes[i].checked = source.checked;
  }
}
function sonkupon() {
var rand = Math.random();
$.get('../ajaxmobil.php?a=sonkupon&rand='+rand+'',function(data) { 
if(data=="23") { failcont('Son kupon bulunamadı.'); } else {
kuponguncelle(); 
}
});
}
function nf(number)
{
    var number = number.toFixed(2) + '';
    var x = number.split('.');
    var x1 = x[0];
    var x2 = x.length > 1 ? '.' + x[1] : '';
    var rgx = /(\d+)(\d{3})/;
    while (rgx.test(x1)) {
        x1 = x1.replace(rgx, '$1' + ',' + '$2');
    }
    return x1 + x2;
}