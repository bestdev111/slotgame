var agai;
var ksleep;
var klm;
var llmatch;
var isMobile = false; //initiate as false
var generalTo = 0;
// device detection
if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|ipad|iris|kindle|Android|Silk|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i.test(navigator.userAgent) 
    || /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(navigator.userAgent.substr(0,4))) isMobile = true;


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
$.get('ajax.php?a=kuponguncelle&toplamoran='+toplamoran+'&after=1&rand='+rand+'&kuponyatan='+kuponyatan+'&telefon='+telefon+'&kuponisim='+kuponisim+'',function(data) { $("#kuponalan").html(data); });
}
function hash() {
	clearTimeout(agai);
	clearTimeout(ksleep);
	clearTimeout(klm);
	clearTimeout(llmatch);
	updateLimit();
	$("#footkupon #kuponalan").remove();
	var hash = location.hash;
	a('page',{ h: hash }).success(function(data) { 
	$("#hashcontent").html(data);
	locker(0);
	favori(0);
});
}
function kuponPosition() {
	
	if(isMobile == false) {
		
	$(".windowback").css('height',$(document).outerHeight()); 
	var nowsc = $(window).scrollTop();
	var nowh = $("#kuponalan").height()+100;
	var noww = $(window).outerWidth();
	if(nowsc > nowh && noww > 1359 && isMobile == false) {
		$("#kuponalan").appendTo("#footkupon");
		$("#footkupon").show();
		var wh = $(window).outerHeight()-20;
		$("#footkupon").css('max-height',wh);
	} else {
		$("#kuponalan").appendTo("#afterk");	
		$("#footkupon").hide();
	}
	
	}
		
}
$(function() { 
	$(window).bind('scroll',function() {
	kuponPosition();
	});
	$(window).bind('resize',function() { 
	kuponPosition();
	});
	
});
function sistem(i) {
	bilocker(1);
	k('sistem',{s:i}).success(function() { 
		kuponalan(0,0);
		bilocker(0);
	});	
}

function kombinasyon_goster() {
	$("#window").hide();
	var h = $(document).outerHeight();
	$(".windowback").css('height',h).fadeIn(50);
	a('kombs',{ kid: Math.random() }).success(function(data) { $("#window").html(data); 
	var st = $(window).scrollTop()+20;
	$("#window").css('margin-top',st);
	});
}


function sistemli_kombinasyon_goster() {
	$("#window").hide();
	var h = $(document).outerHeight();
	$(".windowback").css('height',h).fadeIn(50);
	a('skombs',{ kid: Math.random() }).success(function(data) { $("#window").html(data); 
	var st = $(window).scrollTop()+20;
	$("#window").css('margin-top',st);
	});
}
function livemorebet(eid) {
	$("body").animate({scrollTop: 0},500);
	self.location.href='#canli-'+eid+'';
}
var do_proc = 0;
function updatelivelist() {
	kpr('livematchlist',$("#flt").serialize()).success(function(data) { 
		$(".live_maclist").html(data);
	});
}
$(function() { 
	$(".menu a").click(function() { 
	$(".menu a").removeClass('hovered');
	$(this).addClass('hovered');
	});
	});
function favekle(eventid) {
var rand = Math.random();
$.get('ajax.php?a=favoriekle&eventid='+eventid+'',function(data) { canlimaclist(); });	
}

function kupontemizle() {
var rand = Math.random();
$("#cupdate").val('1');
$.get('ajax.php?a=kupontemizle&rand='+rand+'',function() { 
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
$.get('ajax.php?a=kuponsil&rand='+rand+'&id='+id+'',function(data) { kuponguncelle(1); });	
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
	var cupdate = $("#cupdate").val();
	if(cupdate=="1") {
	var rand = Math.random();
	var kuponyatan = $("#kuponyatan").val();
	var telefon = $("#telefon").val();
	var kuponisim = $("#kuponisim").val();
	var req = $.ajax({
    url: 'ajax.php?a=kuponguncelle&alowa=1&rand='+rand+'&kuponyatan='+kuponyatan+'&telefon='+telefon+'&kuponisim='+kuponisim+'',
    error: function(data){
	kuponguncelle(val);
    },
    success: function(data){
	$("#kuponalan").html(data);
	$('#kuponyatan').trigger('keyup');
	kuponadet();
	}, timeout: 5000
	});	
		
	}
}

function kuponadet() {
var rand = Math.random();
$.get('ajax.php?a=kuponadetbul&rand='+rand+'',function(data) { $("#cont_refresh").html(data); });	
}

function kupon(val) {
blackkapat();
curs(1);
kuponadet();
var rand = Math.random();
$.get('ajax.php?a=kuponekle&val='+val+'',function(data) {  
curs(2);
if(data=="201") { kuponguncelle(1); } else
if(data=="200") { kuponguncelle(1); }
});
}

$(document).ready(function(e) {
    $("#failkap").click(function() { 
	$("#black").hide();
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
$(".kuponici").html('<div class="haydut"><span>Yükleniyor</span><div class="loader"></div>');
var rand = Math.random();
$.get('ajax.php?a=kupond&id='+id+'&rand='+rand+'',function(data) { $(".kuponici").html(data); });
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
$.get('ajax.php?a=userkontrol&user='+user+'&rand='+rand+'',function(data) { 
if(data=="400") { alertify.error('Bu kullanıcı adı önceden alınmıştır. Lütfen başka bir kullanıcı adı yazın'); $("#ussecure").val('0'); } else {
$("#ussecure").val('1');
}
});		
}

function userkontroledit() {
var user = $("#ouser").val();
var normuser = $("#normuser").val();
var rand = Math.random();
if(normuser!=user) {
$.get('ajax.php?a=userkontrol&user='+user+'&rand='+rand+'',function(data) { 
if(data=="400") { alertify.error('Bu kullanıcı adı önceden alınmıştır. Lütfen başka bir kullanıcı adı yazın'); $("#ussecure").val('0'); } else {
$("#ussecure").val('1');
}
});	
}
}


function loadgir(div) { $("#"+div+"").show(); $("#"+div+"").html('<div class="haydut"><span>Yükleniyor</span><div class="loader"></div>'); }
function bakiye(tip,id) {
if(tip=="ekle") { $("#eklecikar_"+id+"").html('<div style="color:#14892c;font-weight:bold;font-size:14px;">(+) eklenecek tutar</div>'); } else
if(tip=="cikar") { $("#eklecikar_"+id+"").html('<div style="color:#f00;font-weight:bold;font-size:14px;">(-) çıkarılacak tutar</div>'); }
$("#bakiyedurum_"+id+"").val(tip);
$("#b_"+id+"").fadeIn('fast');
$("#bakiye_"+id+"").focus();
}
function nowbak(id) {
var tutar = $("#bakiye_"+id+"").val();
var tip = $("#bakiyedurum_"+id+"").val();
var rand = Math.random();
$.get('ajax.php?a=bakiyeislem&tip='+tip+'&tutar='+tutar+'&rand='+rand+'&uid='+id+'',function(data) {
if(data=="400") { alertify.error('Bu bayi için bu işlemi yapabilecek yetkiniz yoktur.'); 
$("#b_"+id+"").fadeOut();
} else
if(data=="304") { alertify.error('Sizde ya da kullanıcıda bu işlemi yapabilecek kadar bakiye görünmüyor.'); } else
if(data=="200") { alertify.success('Bakiye işlendi.');
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
$.get('ajax.php?a=limitupdate&rand='+rand+'',function(data) { $("#bubakiye").html(data); });
}
function toggle(source) {
  checkboxes = document.getElementsByName('users[]');
  for(var i=0, n=checkboxes.length;i<n;i++) {
    checkboxes[i].checked = source.checked;
  }
}
function sonkupon() {
var rand = Math.random();
$.get('ajax.php?a=sonkupon&rand='+rand+'',function(data) { 
if(data=="403") { failcont('Hata','Canlı Maçlar Geri Yüklenemez.'); } else
if(data=="23") { failcont('Hata','Kupon Tekrar Yüklenmiyor.'); } else { kuponguncelle(); }
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