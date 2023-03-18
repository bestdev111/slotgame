<?php
session_start();
include 'db.php';
if($ub['wkyetki']<2) { header("Location:kasa"); }
if(isset($_GET['logout'])) { 
sed_sql_query("delete from kupon where session_id='$session_id'");
session_unset(); }
if(isset($_SESSION['betuser'])) { $user = $_SESSION['betuser']; } else { header("Location:login"); exit(); }
if($ub['adminpanel']=="1") { header("Location:admin"); }

?>
<!doctype html>
<script src="js/jquery-1.7.2.min.js"></script>
<script src="js/jquery-ui-1.8.21.custom.min.js"></script>
<script src="js/mousehold.js"></script>

<?php include 'header.php'; ?>
<?php include 'solbahisler.php'; ?>

<script>
var tiklananid=0;
var secildispid=1;
var copunbet=new Object();
var activesystem = 0;
var thisbets = new Object();
var secilisistem = new Array();
var toplamkupon = 1;
var totalrate = 0;
var toplambedel = '0.00';
var betnum=0;

var Bahis = {};
Bahis.oyunlar={ "1": { "ad": "1X2 (N. Süre)", "kad": "MS", "sad": "Maç Sonucu", "grup": "1", "SPID": {"1":"1","5":"5","3":"3"} }, "2": { "ad": "Handikap 1:0", "kad": "H (1:0)", "grup": "1", "SPID": {"1":"1"} }, "3": { "ad": "Handikap 2:0", "kad": "H (2:0)", "grup": "1", "SPID": {"1":"1"} }, "4": { "ad": "Handikap 3:0", "kad": "H (3:0)", "grup": "1", "SPID": {"1":"1"} }, "9": { "ad": "Handikap 0:1", "kad": "H (0:1)", "grup": "1", "SPID": {"1":"1"} }, "10": { "ad": "Handikap 0:2", "kad": "H (0:2)", "grup": "1", "SPID": {"1":"1"} }, "11": { "ad": "Handikap 0:3", "kad": "H (0:3)", "grup": "1", "SPID": {"1":"1"} }, "12": { "ad": "Müsabakada kaç gol atılır?", "kad": "MS A/U", "grup": "2", "SPID": {"1":"1"} }, "13": { "ad": "İlk Yarıda kaç gol atılır?", "kad": "IY A/U", "grup": "2", "SPID": {"1":"1"} }, "14": { "ad": "Evsahibi Alt/Üst", "kad": "EUA", "grup": "7", "SPID": {"1":"1"} }, "15": { "ad": "Deplasman Alt/Üst", "kad": "DUA", "grup": "7", "SPID": {"1":"1"} }, "16": { "ad": "\u00c7ifte \u015fans", "kad": "\u00c7\u015e", "grup": "1", "SPID": {"1":"1"} }, "17": { "ad": "\u0130lkyar\u0131 \u00e7ifte \u015fans", "kad": "\u0130Y \u00c7\u015e", "grup": "4", "SPID": {"1":"1"} }, "18": { "ad": "\u0130lk Yar\u0131 Sonucu", "kad": "\u0130lkYar\u0131", "grup": "4", "SPID": {"1":"1"} }, "19": { "ad": "Beraberlikte \u0130ade", "kad": "B.\u0130ade", "grup": "1", "SPID": {"1":"1"} }, "20": { "ad": "1. Yar\u0131 0.5 gol +/-", "kad": "1.Y AU 0.5", "grup": "2", "SPID": {"1":"1"} }, "21": { "ad": "1. Yar\u0131 1.5 gol +/-", "kad": "1.Y AU 1.5", "grup": "2", "SPID": {"1":"1"} }, "22": { "ad": "1. Yar\u0131 2.5 gol +/-", "kad": "1.Y AU 2.5", "grup": "2", "SPID": {"1":"1"} }, "23": { "ad": "1. Yar\u0131 3.5 gol +/-", "kad": "1.Y AU 3.5", "grup": "2", "SPID": {"1":"1"} }, "24": { "ad": "1. Yarı Evsahibi +/-", "kad": "1.Y EAU", "grup": "7", "SPID": {"1":"1"} }, "25": { "ad": "1. Yarı Deplasman +/-", "kad": "1.Y DAU", "grup": "7", "SPID": {"1":"1"} }, "26": { "ad": "Toplam gol 0.5 +/-", "kad": "AU 0.5", "grup": "2", "SPID": {"1":"1"} }, "27": { "ad": "Toplam gol 1.5 +/-", "kad": "AU 1.5", "grup": "2", "SPID": {"1":"1"} }, "28": { "ad": "Toplam gol 2.5 +/-", "kad": "AU 2.5", "grup": "1", "SPID": {"1":"1"} }, "29": { "ad": "Toplam gol 3.5 +/-", "kad": "AU 3.5", "grup": "2", "SPID": {"1":"1"} }, "30": { "ad": "Toplam gol 4.5 +/-", "kad": "AU 4.5", "grup": "2", "SPID": {"1":"1"} }, "31": { "ad": "Toplam gol 5.5 +/-", "kad": "AU 5.5", "grup": "2", "SPID": {"1":"1"} }, "32": { "ad": "Toplam gol 6.5 +/-", "kad": "AU 6.5", "grup": "2", "SPID": {"1":"1"} }, "36": { "ad": "2. Yar\u0131 0.5 gol +/-", "kad": "2.Y AU 0.5", "grup": "2", "SPID": {"1":"1"} }, "37": { "ad": "2. Yar\u0131 1.5 gol +/-", "kad": "2.Y AU 1.5", "grup": "2", "SPID": {"1":"1"} }, "38": { "ad": "2. Yar\u0131 2.5 gol +/-", "kad": "2.Y AU 2.5", "grup": "2", "SPID": {"1":"1"} }, "39": { "ad": "2. Yar\u0131 3.5 gol +/-", "kad": "2.Y AU 3.5", "grup": "2", "SPID": {"1":"1"} }, "43": { "ad": "1. Yar\u0131 \/ ma\u00e7 sonucu", "kad": "\u0130Y\/MS", "grup": "3", "SPID": {"1":"1","5":"5"} }, "44": { "ad": "\u0130lk yar\u0131da her iki tak\u0131m da gol atar m\u0131?", "kad": "1.Y K.G", "grup": "4", "SPID": {"1":"1"} }, "45": { "ad": "Her iki tak\u0131m da gol atar m\u0131?", "kad": "K.G", "grup": "1", "SPID": {"1":"1"} }, "46": { "ad": "Evsahibi m\u00fcsabakada gol atar m\u0131?", "kad": "EGA", "grup": "7", "SPID": {"1":"1"} }, "47": { "ad": "Deplasman m\u00fcsabakada gol atar m\u0131?", "kad": "DGA", "grup": "8", "SPID": {"1":"1"} }, "48": { "ad": "Hangi yar\u0131da daha fazla gol at\u0131l\u0131r?", "kad": "FG", "grup": "1", "SPID": {"1":"1"} }, "54": { "ad": "Toplam gol tek mi olur yoksa \u00e7ift mi?", "kad": "T\u00c7", "grup": "1", "SPID": {"1":"1"} }, "55": { "ad": "\u0130lkyar\u0131 toplam gol tek mi olur yoksa \u00e7ift mi?", "kad": "1.Y. T\u00c7", "grup": "4", "SPID": {"1":"1"} }, "56": { "ad": "Evsahibi 0.5 gol alt\/\u00fcst", "kad": "EAU 0.5", "grup": "7", "SPID": {"1":"1"} }, "57": { "ad": "Evsahibi 1.5 gol alt\/\u00fcst", "kad": "EAU 1.5", "grup": "7", "SPID": {"1":"1"} }, "58": { "ad": "Evsahibi 2.5 gol alt\/\u00fcst", "kad": "EAU 2.5", "grup": "7", "SPID": {"1":"1"} }, "59": { "ad": "Evsahibi 3.5 gol alt\/\u00fcst", "kad": "EAU 3.5", "grup": "7", "SPID": {"1":"1"} }, "60": { "ad": "Evsahibi 4.5 gol alt\/\u00fcst", "kad": "EAU 4.5", "grup": "7", "SPID": {"1":"1"} }, "61": { "ad": "Evsahibi 5.5 gol alt\/\u00fcst", "kad": "EAU 5.5", "grup": "7", "SPID": {"1":"1"} }, "62": { "ad": "Deplasman 0.5 gol alt\/\u00fcst", "kad": "DAU 0.5", "grup": "8", "SPID": {"1":"1"} }, "63": { "ad": "Deplasman 1.5 gol alt\/\u00fcst", "kad": "DAU 1.5", "grup": "8", "SPID": {"1":"1"} }, "64": { "ad": "Deplasman 2.5 gol alt\/\u00fcst", "kad": "DAU 2.5", "grup": "8", "SPID": {"1":"1"} }, "65": { "ad": "Deplasman 3.5 gol alt\/\u00fcst", "kad": "DAU 3.5", "grup": "8", "SPID": {"1":"1"} }, "66": { "ad": "Deplasman 4.5 gol alt\/\u00fcst", "kad": "DAU 4.5", "grup": "8", "SPID": {"1":"1"} }, "67": { "ad": "Deplasman 5.5 gol alt\/\u00fcst", "kad": "DAU 5.5", "grup": "8", "SPID": {"1":"1"} }, "73": { "ad": "1.gol\u00fc hangi tak\u0131m atar?", "grup": "1", "kad": "1.Gol" }, "74": { "ad": "2.gol\u00fc hangi tak\u0131m atar?", "grup": "1", "kad": "2.Gol" }, "75": { "ad": "3.gol\u00fc hangi tak\u0131m atar?", "grup": "1", "kad": "3.Gol" }, "76": { "ad": "4.gol\u00fc hangi tak\u0131m atar?", "grup": "1", "kad": "4.Gol" }, "77": { "ad": "5.gol\u00fc hangi tak\u0131m atar?", "grup": "1", "kad": "5.Gol" }, "78": { "ad": "6.gol\u00fc hangi tak\u0131m atar?", "grup": "1", "kad": "6.Gol" }, "85": { "ad": "1. yar\u0131da 1.gol\u00fc hangi tak\u0131m atar?", "grup": "1", "kad": "1.Y 1.Gol" }, "88": { "ad": "Ma\u00e7ta toplam ka\u00e7 gol at\u0131l\u0131r?", "grup": "3", "kad": "Toplam Gol", "SPID": {"1":"1"} }, "96": { "ad": "Evsahibi toplam ka\u00e7 gol atar?", "kad": "ETG", "grup": "7", "SPID": {"1":"1"} }, "97": { "ad": "Deplasman toplam ka\u00e7 gol atar?", "kad": "DTG", "grup": "8", "SPID": {"1":"1"} }, "100": { "ad": "1X2 ve Alt/Üst 2.5", "kad": "MS ve AU 2.5", "grup": "2", "SPID": {"1":"1"} }, "101": { "ad": "Skor bahsi (ilkyari)", "kad": "1.Y Skor", "grup": "3", "SPID": {} }, "102": { "ad": "Skor bahsi (normal s\u00fcre)", "kad": "Skor", "grup": "3", "SPID": {"1":"1"} }, "116": { "ad": "Handikap (Özel)", "kad": "HÖ", "grup": "1", "SPID": {"5":"5"} }, "117": { "ad": "Alt/Üst (Özel)", "kad": "AUÖ", "grup": "1", "SPID": {"5":"5"} }, "118": { "ad": "İkyarı Handikap (Özel)", "kad": "1Y HÖ", "grup": "1", "SPID": {"5":"5"} }, "127": { "ad": "1. yar\u0131da 2. gol\u00fc hangi tak\u0131m atar?", "grup": "1", "kad": "1.Y. 2.Gol" }, "128": { "ad": "1. yar\u0131da 3. gol\u00fc hangi tak\u0131m atar?", "grup": "1", "kad": "1.Y. 3.Gol" }, "129": { "ad": "Evsahibi \u0130lk Yar\u0131 Alt\/Üst 0.5 Gol", "grup": "7", "kad": "1.Y EAU 0.5", "SPID": {"1":"1"} }, "130": { "ad": "Evsahibi \u0130lk Yar\u0131 Alt\/Üst 1.5 Gol", "grup": "7", "kad": "1.Y EAU 1.5", "SPID": {"1":"1"} }, "131": { "ad": "Evsahibi \u0130lk Yar\u0131 Alt\/Üst 2.5 Gol", "kad": "1.Y EAU 2.5", "grup": "7", "SPID": {"1":"1"} }, "132": { "ad": "Evsahibi \u0130lk Yar\u0131 Alt\/Üst 3.5 Gol", "kad": "1.Y EAU 3.5", "grup": "7", "SPID": {"1":"1"} }, "133": { "ad": "Deplasman \u0130lk Yar\u0131 Alt\/Üst 0.5 Gol", "kad": "1.Y DAU 0.5", "grup": "8", "SPID": {"1":"1"} }, "134": { "ad": "Deplasman \u0130lk Yar\u0131 Alt\/Üst 1.5 Gol", "kad": "1.Y DAU 1.5", "grup": "8", "SPID": {"1":"1"} }, "135": { "ad": "Deplasman \u0130lk Yar\u0131 Alt\/Üst 2.5 Gol", "kad": "1.Y DAU 2.5", "grup": "8", "SPID": {"1":"1"} }, "136": { "ad": "Deplasman \u0130lk Yar\u0131 Alt\/Üst 3.5 Gol", "kad": "1.Y DAU 3.5", "grup": "8", "SPID": {"1":"1"} }, "137": { "ad": "Toplam gol aral\u0131\u011f\u0131", "kad": "TGA", "grup": "3", "SPID": {"1":"1"} }, "138": { "ad": "Ma\u00e7 sonucu ve iki tak\u0131m da gol atar", "kad": "MS \/ KG", "grup": "3", "SPID": {"1":"1"} }, "139": { "ad": "Evsahibi ilk yar\u0131da ka\u00e7 gol atar?", "kad": "1Y ETG", "grup": "7", "SPID": {"1":"1"} }, "140": { "ad": "Evsahibi ikinci yar\u0131da ka\u00e7 gol atar?", "kad": "2Y ETG", "grup": "7", "SPID": {"1":"1"} }, "141": { "ad": "Deplasman ilk yar\u0131da ka\u00e7 gol atar?", "kad": "1Y DTG", "grup": "8", "SPID": {"1":"1"} }, "142": { "ad": "Deplasman ikinci yar\u0131da ka\u00e7 gol atar?", "kad": "2Y DTG", "grup": "8", "SPID": {"1":"1"} }, "143": { "ad": "Herhangi bir tak\u0131m bir gol farkla kazan\u0131r m\u0131?", "kad": "1FG", "grup": "3", "SPID": {"1":"1"} }, "144": { "ad": "Herhangi bir tak\u0131m iki gol farkla kazan\u0131r m\u0131?", "kad": "2FG", "grup": "3", "SPID": {"1":"1"} }, "145": { "ad": "Herhangi bir tak\u0131m \u00fc\u00e7 gol farkla kazan\u0131r m\u0131?", "kad": "3FG", "grup": "3", "SPID": {"1":"1"} }, "146": { "ad": "2. yar\u0131y\u0131 hangi tak\u0131m kazan\u0131r?", "kad": "2Y", "grup": "5", "SPID": {"1":"1"} }, "147": { "ad": "2. yar\u0131da toplam ka\u00e7 gol olur?", "kad": "2Y-TG", "grup": "5", "SPID": {"1":"1"} }, "148": { "ad": "Toplam skor tek \/ \u00e7ift (Uzatma Hariç)", "kad": "T\u00c7", "grup": "1", "SPID": {"5":"5"} }, "149": { "ad": "\u0130lkyar\u0131 toplam skor tek \/ \u00e7ift", "kad": "\u0130T\u00c7", "grup": "4", "SPID": {"5":"5"} }, "150": { "ad": "iki tak\u0131m da gol atar ve Alt/Üst 2.5", "kad": "KG A/U 2.5", "grup": "3", "SPID": {"1":"1"} }, "151": { "ad": "Maç Sonucu ve Gol Farkı", "kad": "MS Fark", "grup": "3", "SPID": {"1":"1"} }, "162": { "ad": "1. Çeyrek Tek Çift", "grup": "1", "kad": "1Ç TÇ" }, "163": { "ad": "2. Çeyrek Tek Çift", "grup": "1", "kad": "2Ç TÇ" }, "164": { "ad": "3. Çeyrek Tek Çift", "kad": "3Ç TÇ" }, "165": { "ad": "4. Çeyrek Tek Çift", "kad": "4Ç TÇ" }, "166": { "ad": "Çoklu Skor Bahsi", "kad": "ÇSB" }, "167": { "ad": "Müsabakada kaç gol atılır? (0-4+)", "grup": "3", "kad": "MSG 0-4" }, "168": { "ad": "Müsabakada kaç gol atılır? (0-5+)", "grup": "3", "kad": "MSG 0-5" }, "169": { "ad": "Müsabakada kaç gol atılır? (0-6+)", "grup": "3", "kad": "MSG 0-6" }, "173": { "ad": "2. Yarı Tek Çift", "kad": "2Y TC", "grup": "5", "SPID": {"1":"1"} }, "180": { "ad": "3. Çeyrek - Toplam", "desc": "Sadece 3. Çeyrekte toplam kaç sayı olur ?", "kad": "3.C. T", "SPID": {"5":"5"} }, "181": { "ad": "1. Çeyrek - Toplam", "desc": "Sadece 1. Çeyrekte toplam kaç sayı olur ?", "kad": "1.C. T", "SPID": {"5":"5"} }, "185": { "ad": "2. Çeyrek - Toplam", "desc": "Sadece 2. Çeyrekte toplam kaç sayı olur ?", "kad": "2.C. T", "SPID": {"5":"5"} }, "186": { "ad": "4. Çeyrek - Toplam", "desc": "Sadece 4. Çeyrekte toplam kaç sayı olur ?", "kad": "4.C. T", "SPID": {"5":"5"} }, "182": { "ad": "3. çeyrek - kim kazanır?", "desc": "Sadece 3. çeyrek sonucuna göre hangi takım kazanır ?", "kad": "3.C. K" }, "194": { "ad": "1. çeyrek - kim kazanır?", "desc": "Sadece 1. Çeyrek sonucuna göre kim kazanır ?", "kad": "1.C. K", "SPID": {"5":"5"} }, "195": { "ad": "2. çeyrek - kim kazanır?", "desc": "Sadece 2. Çeyrek sonucuna göre kim kazanır ?", "kad": "2.C. K", "SPID": {"5":"5"} }, "196": { "ad": "4. çeyrek - kim kazanır?", "desc": "Sadece 4. Çeyrek sonucuna göre kim kazanır ?", "kad": "4.C. K", "SPID": {"5":"5"} }, "202": { "ad": "2.Yarı Karşılıklı Gol", "kad": "2Y KG", "grup": "5", "SPID": {"1":"1"} }, "330": { "ad": "Evsahibi Tek/Çift", "kad": "E TC", "grup": "7", "SPID": {"1":"1"} }, "331": { "ad": "Deplasman Tek/Çift", "kad": "D TC", "grup": "8", "SPID": {"1":"1"} }, "269": { "ad": "Hangi Takım Gol Atar", "grup": "3", "kad": "HTG ATAR" }, "203": { "ad": "1.Y Beraberlikte iade", "kad": "1Y B.IADE", "grup": "4", "SPID": {"1":"1"} }, "10204": { "ad": "Evsahibi her iki yarıdada gol atarmı ?", "kad": "E Her iki devre GOL", "grup": "7", "SPID": {"1":"1"} }, "10205": { "ad": "Deplasman her iki yarıdada gol atarmı ?", "kad": "D Her iki devre GOL", "grup": "8", "SPID": {"1":"1"} }, "176": { "ad": "Evsahibi Hangi devre fazla gol atar ?", "kad": "E FG", "grup": "7", "SPID": {"1":"1"} }, "177": { "ad": "Deplasman Hangi devre fazla gol atar ?", "kad": "D FG", "grup": "8", "SPID": {"1":"1"} }, "184": { "ad": "Handikap (N. Süre)", "desc": "Takımlara özel averaj verilmiştir.", "grup": "1", "kad": "HCAP" }, "183": { "ad": "2. yarıyı kim kazanır?", "desc": "Sadece 2. Devre sonucuna göre hangi takım kazanır ?", "grup": "5", "kad": "2.Y. K" }, "170": { "ad": "Kim Kazanır ?", "desc": "Karşılaşma sonucunda uzatmalar dahil hangi takım kazanır ?", "kad": "KK" }, "172": { "ad": "Toplam Skor (Uzatma Hariç)", "desc": "Normal süre sonucunda toplam kaç sayı olur ?", "kad": "TS" }, "1511": { "ad": "Set bahisi (5 Set)", "desc": "Maç Sonucunda Set Bahisi 5 set üzerinden", "grup": "1", "kad": "SBM5", "SPID": {"22":"22"} }, "1500": { "ad": "1. Seti Kim Kazanır ?", "kad": "1. Set Kazananı ?", "grup": 1, "desc": "Sadece 1. Set sonucuna göre kim kazanır ?", "kad": "1S KK", "SPID": {"7":"7","6":"6","22":"22"} }, "1501": { "ad": "1. Set Alt/Üst", "grup": 1, "kad": "1. Set Alt/Üst ?", "desc": "Sadece 1. Set sonucuna göre Alt/Üst ?", "kad": "1S AU", "SPID": {"6":"6"} }, "1502": { "ad": "Set bahisi", "grup": 1, "kad": "Set bahisi", "desc": "Maç Sonucunda Set Bahisi", "kad": "SBM", "SPID": {"7":"7","3":"3"} }, "1503": { "ad": "2. Seti Kim Kazanır ?", "kad": "2. Set Kazananı ?", "grup": 1, "desc": "Sadece 2. Set sonucuna göre kim kazanır ?", "kad": "2S KK", "SPID": {"7":"7","6":"6","22":"22"} }, "1504": { "ad": "2. Set Alt/Üst", "grup": 1, "kad": "2. Set Alt/Üst ?", "desc": "Sadece 2. Set sonucuna göre Alt/Üst ?", "kad": "2S AU" }, "1505": { "ad": "3. Seti Kim Kazanır ?", "kad": "3. Set Kazananı ?", "grup": 1, "desc": "Sadece 3. Set sonucuna göre kim kazanır ?", "kad": "3S KK", "SPID": {"22":"22"} }, "1506": { "ad": "3. Set Alt/Üst", "grup": 1, "kad": "3. Set Alt/Üst ?", "desc": "Sadece 3. Set sonucuna göre Alt/Üst ?", "kad": "3S AU" }, "1507": { "ad": "4. Seti Kim Kazanır ?", "grup": 1, "kad": "4. Set Kazananı ?", "desc": "Sadece 4. Set sonucuna göre kim kazanır ?", "kad": "4S KK" }, "1508": { "ad": "4. Set Alt/Üst", "kad": "4. Set Alt/Üst ?", "grup": 1, "desc": "Sadece 4. Set sonucuna göre Alt/Üst ?", "kad": "4S AU" }, "1509": { "ad": "5. Seti Kim Kazanır ?", "grup": 1, "kad": "5. Set Kazananı ?", "desc": "Sadece 5. Set sonucuna göre kim kazanır ?", "kad": "5S KK" }, "1510": { "ad": "5. Set Alt/Üst", "kad": "5. Set Alt/Üst ?", "grup": 1, "desc": "Sadece 5. Set sonucuna göre Alt/Üst ?", "kad": "5S AU" },"1800": { "ad": "Kalan Süre Tahmini - skor: 0:0", "kad": "KLST 0:0", "desc": "Maçta Sadece Kalan Süreyi Kim Kazanır ?", "kad": "KLST 0:0", "SPID": {"1":"1"} },"1801": { "ad": "Kalan Süre Tahmini - skor: 1:1", "kad": "KLST 1:1", "desc": "Maçta Sadece Kalan Süreyi Kim Kazanır ?", "kad": "KLST 1:1" },"1802": { "ad": "Kalan Süre Tahmini - skor: 2:2", "kad": "KLST 2:2", "desc": "Maçta Sadece Kalan Süreyi Kim Kazanır ?", "kad": "KLST 2:2" },"1803": { "ad": "Kalan Süre Tahmini - skor: 3:3", "kad": "KLST 3:3", "desc": "Maçta Sadece Kalan Süreyi Kim Kazanır ?", "kad": "KLST 3:3" },"1804": { "ad": "Kalan Süre Tahmini - skor: 4:4", "kad": "KLST 4:4", "desc": "Maçta Sadece Kalan Süreyi Kim Kazanır ?", "kad": "KLST 4:4" },"1805": { "ad": "Kalan Süre Tahmini - skor: 5:5", "kad": "KLST 5:5", "desc": "Maçta Sadece Kalan Süreyi Kim Kazanır ?", "kad": "KLST 5:5" },"1806": { "ad": "Kalan Süre Tahmini - skor: 0:1", "kad": "KLST 0:1", "desc": "Maçta Sadece Kalan Süreyi Kim Kazanır ?", "kad": "KLST 0:1" },"1807": { "ad": "Kalan Süre Tahmini - skor: 1:0", "kad": "KLST 1:0", "desc": "Maçta Sadece Kalan Süreyi Kim Kazanır ?", "kad": "KLST 1:0" },"1808": { "ad": "Kalan Süre Tahmini - skor: 0:2", "kad": "KLST 0:2", "desc": "Maçta Sadece Kalan Süreyi Kim Kazanır ?", "kad": "KLST 0:2" },"1809": { "ad": "Kalan Süre Tahmini - skor: 2:0", "kad": "KLST 2:0", "desc": "Maçta Sadece Kalan Süreyi Kim Kazanır ?", "kad": "KLST 2:0" },"1810": { "ad": "Kalan Süre Tahmini - skor: 0:3", "kad": "KLST 0:3", "desc": "Maçta Sadece Kalan Süreyi Kim Kazanır ?", "kad": "KLST 0:3" },"1811": { "ad": "Kalan Süre Tahmini - skor: 3:0", "kad": "KLST 3:0", "desc": "Maçta Sadece Kalan Süreyi Kim Kazanır ?", "kad": "KLST 3:0" },"1812": { "ad": "Kalan Süre Tahmini - skor: 0:4", "kad": "KLST 0:4", "desc": "Maçta Sadece Kalan Süreyi Kim Kazanır ?", "kad": "KLST 0:4" },"1813": { "ad": "Kalan Süre Tahmini - skor: 4:0", "kad": "KLST 4:0", "desc": "Maçta Sadece Kalan Süreyi Kim Kazanır ?", "kad": "KLST 4:0" },"1814": { "ad": "Kalan Süre Tahmini - skor: 0:5", "kad": "KLST 0:5", "desc": "Maçta Sadece Kalan Süreyi Kim Kazanır ?", "kad": "KLST 0:5" },"1815": { "ad": "Kalan Süre Tahmini - skor: 5:0", "kad": "KLST 5:0", "desc": "Maçta Sadece Kalan Süreyi Kim Kazanır ?", "kad": "KLST 5:0" },"1816": { "ad": "Kalan Süre Tahmini - skor: 1:2", "kad": "KLST 1:2", "desc": "Maçta Sadece Kalan Süreyi Kim Kazanır ?", "kad": "KLST 1:2" },"1817": { "ad": "Kalan Süre Tahmini - skor: 2:1", "kad": "KLST 2:1", "desc": "Maçta Sadece Kalan Süreyi Kim Kazanır ?", "kad": "KLST 2:1" },"1818": { "ad": "Kalan Süre Tahmini - skor: 1:3", "kad": "KLST 1:3", "desc": "Maçta Sadece Kalan Süreyi Kim Kazanır ?", "kad": "KLST 1:3" },"1819": { "ad": "Kalan Süre Tahmini - skor: 3:1", "kad": "KLST 3:1", "desc": "Maçta Sadece Kalan Süreyi Kim Kazanır ?", "kad": "KLST 3:1" },"1820": { "ad": "Kalan Süre Tahmini - skor: 1:4", "kad": "KLST 1:4", "desc": "Maçta Sadece Kalan Süreyi Kim Kazanır ?", "kad": "KLST 1:4" },"1821": { "ad": "Kalan Süre Tahmini - skor: 4:1", "kad": "KLST 4:1", "desc": "Maçta Sadece Kalan Süreyi Kim Kazanır ?", "kad": "KLST 4:1" },"1822": { "ad": "Kalan Süre Tahmini - skor: 1:5", "kad": "KLST 1:5", "desc": "Maçta Sadece Kalan Süreyi Kim Kazanır ?", "kad": "KLST 1:5" },"1823": { "ad": "Kalan Süre Tahmini - skor: 5:1", "kad": "KLST 5:1", "desc": "Maçta Sadece Kalan Süreyi Kim Kazanır ?", "kad": "KLST 5:1" },"1824": { "ad": "Kalan Süre Tahmini - skor: 2:3", "kad": "KLST 2:3", "desc": "Maçta Sadece Kalan Süreyi Kim Kazanır ?", "kad": "KLST 2:3" },"1825": { "ad": "Kalan Süre Tahmini - skor: 3:2", "kad": "KLST 3:2", "desc": "Maçta Sadece Kalan Süreyi Kim Kazanır ?", "kad": "KLST 3:2" },"2800": { "ad": "İlkyarı handikap", "kad": "İY. HCAP", "desc": "İlk yarı sonucuna göre takımlara özel averaj verilmiştir ?", "SPID": {"5":"5"} },"2801": { "ad": "1.Çeyrek Handikap", "kad": "1Ç HCAP", "desc": "1. Çeyrek sonucuna göre takımlara özel averaj verilmiştir ?", "SPID": {"5":"5"} },"2802": { "ad": "2.Çeyrek Handikap", "kad": "2Ç HCAP", "desc": "2. Çeyrek sonucuna göre takımlara özel averaj verilmiştir ?", "SPID": {"5":"5"} },"2803": { "ad": "3.Çeyrek Handikap", "kad": "3Ç HCAP", "desc": "3. Çeyrek sonucuna göre takımlara özel averaj verilmiştir ?", "SPID": {"5":"5"} },"2804": { "ad": "4.Çeyrek Handikap", "kad": "4Ç HCAP", "desc": "4. Çeyrek sonucuna göre takımlara özel averaj verilmiştir ?", "SPID": {"5":"5"} },"2805": { "ad": "1X2 bahisi - 1. çeyrek", "kad": "1X2 1Ç", "desc": "Sadece 1. Çeyrek Sonucuna Göre Kim Kazanır ?", "SPID": {"5":"5"} },"2806": { "ad": "1X2 bahisi - 2. çeyrek", "kad": "1X2 2Ç", "desc": "Sadece 2. Çeyrek Sonucuna Göre Kim Kazanır ?", "SPID": {"5":"5"} },"2807": { "ad": "1X2 bahisi - 3. çeyrek", "kad": "1X2 3Ç", "desc": "Sadece 3. Çeyrek Sonucuna Göre Kim Kazanır ?", "SPID": {"5":"5"} },"2808": { "ad": "1X2 bahisi - 4. çeyrek", "kad": "1X2 4Ç", "desc": "Sadece 4. Çeyrek Sonucuna Göre Kim Kazanır ?", "SPID": {"5":"5"} },"2809": { "ad": "1.Takım Alt/Üst (N. Süre)", "kad": "1T TS AU", "desc": "1.Takım Toplam Skor Alt/Üst", "SPID": {"5":"5"} },"2810": { "ad": "2.Takım Alt/Üst (N. Süre)", "kad": "2T TS AU", "desc": "2.Takım Toplam Skor Alt/Üst", "SPID": {"5":"5"} },"2811": { "ad": "1.Takım İlk yarı Alt/Üst", "kad": "1T İY TS AU", "desc": "1.Takım İlk yarı Toplam Skor Alt/Üst", "SPID": {"5":"5"} },"2812": { "ad": "2.Takım İlk yarı Alt/Üst", "kad": "2T İY TS AU", "desc": "2.Takım İlk yarı Toplam Skor Alt/Üst", "SPID": {"5":"5"} } };

Bahis.idcol={ "1": { "gameid": "1", "tercih": "1", "ktercih": "1" }, "2": { "gameid": "1", "tercih": "X", "ktercih": "X" }, "3": { "gameid": "1", "tercih": "2", "ktercih": "2" }, "4": { "gameid": "2", "tercih": "1", "ktercih": "1" }, "5": { "gameid": "2", "tercih": "X", "ktercih": "X" }, "6": { "gameid": "2", "tercih": "2", "ktercih": "2" }, "7": { "gameid": "3", "tercih": "1", "ktercih": "1" }, "8": { "gameid": "3", "tercih": "X", "ktercih": "X" }, "9": { "gameid": "3", "tercih": "2", "ktercih": "2" }, "10": { "gameid": "4", "tercih": "1", "ktercih": "1" }, "11": { "gameid": "4", "tercih": "X", "ktercih": "X" }, "12": { "gameid": "4", "tercih": "2", "ktercih": "2" }, "25": { "gameid": "9", "tercih": "1", "ktercih": "1" }, "26": { "gameid": "9", "tercih": "X", "ktercih": "X" }, "27": { "gameid": "9", "tercih": "2", "ktercih": "2" }, "28": { "gameid": "10", "tercih": "1", "ktercih": "1" }, "29": { "gameid": "10", "tercih": "X", "ktercih": "X" }, "30": { "gameid": "10", "tercih": "2", "ktercih": "2" }, "31": { "gameid": "11", "tercih": "1", "ktercih": "1" }, "32": { "gameid": "11", "tercih": "X", "ktercih": "X" }, "33": { "gameid": "11", "tercih": "2", "ktercih": "2" }, "46": { "gameid": "16", "tercih": "1-X", "ktercih": "1-X" }, "47": { "gameid": "16", "tercih": "1-2", "ktercih": "1-2" }, "48": { "gameid": "16", "tercih": "X-2", "ktercih": "X-2" }, "49": { "gameid": "17", "tercih": "1-X", "ktercih": "1-X" }, "50": { "gameid": "17", "tercih": "1-2", "ktercih": "1-2" }, "51": { "gameid": "17", "tercih": "X-2", "ktercih": "X-2" }, "52": { "gameid": "18", "tercih": "1", "ktercih": "1" }, "53": { "gameid": "18", "tercih": "X", "ktercih": "X" }, "54": { "gameid": "18", "tercih": "2", "ktercih": "2" }, "55": { "gameid": "19", "tercih": "1", "ktercih": "1" }, "56": { "gameid": "19", "tercih": "2", "ktercih": "2" }, "57": { "gameid": "20", "tercih": "Alt 0.5", "ktercih": "A", "kadtercih": "-" }, "58": { "gameid": "20", "tercih": "Üst 0.5", "ktercih": "U", "kadtercih": "+" }, "59": { "gameid": "21", "tercih": "Alt 1.5", "ktercih": "A", "kadtercih": "-" }, "60": { "gameid": "21", "tercih": "Üst 1.5", "ktercih": "U", "kadtercih": "+" }, "61": { "gameid": "22", "tercih": "Alt 2.5", "ktercih": "A", "kadtercih": "-" }, "62": { "gameid": "22", "tercih": "Üst 2.5", "ktercih": "U", "kadtercih": "+" }, "63": { "gameid": "23", "tercih": "Alt 3.5", "ktercih": "A", "kadtercih": "-" }, "64": { "gameid": "23", "tercih": "Üst 3.5", "ktercih": "U", "kadtercih": "+" }, "69": { "gameid": "26", "tercih": "Alt 0.5", "ktercih": "A", "kadtercih": "-" }, "70": { "gameid": "26", "tercih": "Üst 0.5", "ktercih": "U", "kadtercih": "+" }, "71": { "gameid": "27", "tercih": "Alt 1.5", "ktercih": "A", "kadtercih": "-" }, "72": { "gameid": "27", "tercih": "Üst 1.5", "ktercih": "U", "kadtercih": "+" }, "73": { "gameid": "28", "tercih": "Alt 2.5", "ktercih": "A", "kadtercih": "-" }, "74": { "gameid": "28", "tercih": "Üst 2.5", "ktercih": "U", "kadtercih": "+" }, "75": { "gameid": "29", "tercih": "Alt 3.5", "ktercih": "A", "kadtercih": "-" }, "76": { "gameid": "29", "tercih": "Üst 3.5", "ktercih": "U", "kadtercih": "+" }, "77": { "gameid": "30", "tercih": "Alt 4.5", "ktercih": "A", "kadtercih": "-" }, "78": { "gameid": "30", "tercih": "Üst 4.5", "ktercih": "U", "kadtercih": "+" }, "79": { "gameid": "31", "tercih": "Alt 5.5", "ktercih": "A", "kadtercih": "-" }, "80": { "gameid": "31", "tercih": "Üst 5.5", "ktercih": "U", "kadtercih": "+" }, "81": { "gameid": "32", "tercih": "Alt 6.5", "ktercih": "A", "kadtercih": "-" }, "82": { "gameid": "32", "tercih": "Üst 6.5", "ktercih": "U", "kadtercih": "+" }, "89": { "gameid": "36", "tercih": "Alt 0.5", "ktercih": "A", "kadtercih": "-" }, "90": { "gameid": "36", "tercih": "Üst 0.5", "ktercih": "U", "kadtercih": "+" }, "91": { "gameid": "37", "tercih": "Alt 1.5", "ktercih": "A", "kadtercih": "-" }, "92": { "gameid": "37", "tercih": "Üst 1.5", "ktercih": "U", "kadtercih": "+" }, "93": { "gameid": "38", "tercih": "Alt 2.5", "ktercih": "A", "kadtercih": "-" }, "94": { "gameid": "38", "tercih": "Üst 2.5", "ktercih": "U", "kadtercih": "+" }, "95": { "gameid": "39", "tercih": "Alt 3.5", "ktercih": "A", "kadtercih": "-" }, "96": { "gameid": "39", "tercih": "Üst 3.5", "ktercih": "U", "kadtercih": "+" }, "104": { "gameid": "43", "tercih": "1\/1", "ktercih": "1\/1" }, "105": { "gameid": "43", "tercih": "1\/X", "ktercih": "1\/X" }, "106": { "gameid": "43", "tercih": "1\/2", "ktercih": "1\/2" }, "107": { "gameid": "43", "tercih": "X\/1", "ktercih": "X\/1" }, "108": { "gameid": "43", "tercih": "X\/X", "ktercih": "X\/X" }, "109": { "gameid": "43", "tercih": "X\/2", "ktercih": "X\/2" }, "110": { "gameid": "43", "tercih": "2\/1", "ktercih": "2\/1" }, "111": { "gameid": "43", "tercih": "2\/X", "ktercih": "2\/X" }, "112": { "gameid": "43", "tercih": "2\/2", "ktercih": "2\/2" }, "113": { "gameid": "44", "tercih": "Evet", "ktercih": "Evet", "kadtercih": "E" }, "114": { "gameid": "44", "tercih": "Hay\u0131r", "ktercih": "Hay\u0131r", "kadtercih": "H" }, "115": { "gameid": "45", "tercih": "Evet", "ktercih": "Evet", "kadtercih": "E" }, "116": { "gameid": "45", "tercih": "Hay\u0131r", "ktercih": "Hay\u0131r", "kadtercih": "H" }, "117": { "gameid": "46", "tercih": "Evet", "ktercih": "Evet", "kadtercih": "E" }, "118": { "gameid": "46", "tercih": "Hay\u0131r", "ktercih": "Hay\u0131r", "kadtercih": "H" }, "119": { "gameid": "47", "tercih": "Evet", "ktercih": "Evet", "kadtercih": "E" }, "120": { "gameid": "47", "tercih": "Hay\u0131r", "ktercih": "Hay\u0131r", "kadtercih": "H" }, "121": { "gameid": "48", "tercih": "1.Devre", "ktercih": "1" }, "122": { "gameid": "48", "tercih": "E\u015fit say\u0131da", "ktercih": "X", "kadtercih": "Eşit" }, "123": { "gameid": "48", "tercih": "2.Devre", "ktercih": "2" }, "137": { "gameid": "54", "tercih": "Tek", "ktercih": "Tek", "kadtercih": "T" }, "138": { "gameid": "54", "tercih": "\u00c7ift", "ktercih": "\u00c7ift", "kadtercih": "Ç" }, "139": { "gameid": "55", "tercih": "Tek", "ktercih": "Tek", "kadtercih": "T" }, "140": { "gameid": "55", "tercih": "\u00c7ift", "ktercih": "\u00c7ift", "kadtercih": "Ç" }, "141": { "gameid": "56", "tercih": "Alt 0.5", "ktercih": "A", "kadtercih": "-" }, "142": { "gameid": "56", "tercih": "Üst 0.5", "ktercih": "U", "kadtercih": "+" }, "143": { "gameid": "57", "tercih": "Alt 1.5", "ktercih": "A", "kadtercih": "-" }, "144": { "gameid": "57", "tercih": "Üst 1.5", "ktercih": "U", "kadtercih": "+" }, "145": { "gameid": "58", "tercih": "Alt 2.5", "ktercih": "A", "kadtercih": "-" }, "146": { "gameid": "58", "tercih": "Üst 2.5", "ktercih": "U", "kadtercih": "+" }, "147": { "gameid": "59", "tercih": "Alt 3.5", "ktercih": "A", "kadtercih": "-" }, "148": { "gameid": "59", "tercih": "Üst 3.5", "ktercih": "U", "kadtercih": "+" }, "149": { "gameid": "60", "tercih": "Alt 4.5", "ktercih": "A", "kadtercih": "-" }, "150": { "gameid": "60", "tercih": "Üst 4.5", "ktercih": "U", "kadtercih": "+" }, "151": { "gameid": "61", "tercih": "Alt 5.5", "ktercih": "A", "kadtercih": "-" }, "152": { "gameid": "61", "tercih": "Üst 5.5", "ktercih": "U", "kadtercih": "+" }, "153": { "gameid": "62", "tercih": "Alt 0.5", "ktercih": "A", "kadtercih": "-" }, "154": { "gameid": "62", "tercih": "Üst 0.5", "ktercih": "U", "kadtercih": "+" }, "155": { "gameid": "63", "tercih": "Alt 1.5", "ktercih": "A", "kadtercih": "-" }, "156": { "gameid": "63", "tercih": "Üst 1.5", "ktercih": "U", "kadtercih": "+" }, "157": { "gameid": "64", "tercih": "Alt 2.5", "ktercih": "A", "kadtercih": "-" }, "158": { "gameid": "64", "tercih": "Üst 2.5", "ktercih": "U", "kadtercih": "+" }, "159": { "gameid": "65", "tercih": "Alt 3.5", "ktercih": "A", "kadtercih": "-" }, "160": { "gameid": "65", "tercih": "Üst 3.5", "ktercih": "U", "kadtercih": "+" }, "161": { "gameid": "66", "tercih": "Alt 4.5", "ktercih": "A", "kadtercih": "-" }, "162": { "gameid": "66", "tercih": "Üst 4.5", "ktercih": "U", "kadtercih": "+" }, "163": { "gameid": "67", "tercih": "Alt 5.5", "ktercih": "A", "kadtercih": "-" }, "164": { "gameid": "67", "tercih": "Üst 5.5", "ktercih": "U", "kadtercih": "+" }, "175": { "gameid": "73", "tercih": "1", "ktercih": "1" }, "176": { "gameid": "73", "tercih": "0 gol", "ktercih": "X" }, "177": { "gameid": "73", "tercih": "2", "ktercih": "2" }, "178": { "gameid": "74", "tercih": "1", "ktercih": "1" }, "179": { "gameid": "74", "tercih": "2. gol olmaz", "ktercih": "X" }, "180": { "gameid": "74", "tercih": "2", "ktercih": "2" }, "181": { "gameid": "75", "tercih": "1", "ktercih": "1" }, "182": { "gameid": "75", "tercih": "3. gol olmaz", "ktercih": "X" }, "183": { "gameid": "75", "tercih": "2", "ktercih": "2" }, "184": { "gameid": "76", "tercih": "1", "ktercih": "1" }, "185": { "gameid": "76", "tercih": "4. gol olmaz", "ktercih": "X" }, "186": { "gameid": "76", "tercih": "2", "ktercih": "2" }, "187": { "gameid": "77", "tercih": "1", "ktercih": "1" }, "188": { "gameid": "77", "tercih": "5. gol olmaz", "ktercih": "X" }, "189": { "gameid": "77", "tercih": "2", "ktercih": "2" }, "190": { "gameid": "78", "tercih": "1", "ktercih": "1" }, "191": { "gameid": "78", "tercih": "6. gol olmaz", "ktercih": "X" }, "192": { "gameid": "78", "tercih": "2", "ktercih": "2" }, "211": { "gameid": "85", "tercih": "1", "ktercih": "1" }, "212": { "gameid": "85", "tercih": "Gol olmaz", "ktercih": "X" }, "213": { "gameid": "85", "tercih": "2", "ktercih": "2" }, "220": { "gameid": "88", "tercih": "0 Gol", "ktercih": "0 gol" }, "221": { "gameid": "88", "tercih": "1 Gol", "ktercih": "1 Gol" }, "222": { "gameid": "88", "tercih": "2 Gol", "ktercih": "2 Gol" }, "223": { "gameid": "88", "tercih": "3 Gol", "ktercih": "3 Gol" }, "224": { "gameid": "88", "tercih": "4 Gol", "ktercih": "4 Gol" }, "225": { "gameid": "88", "tercih": "5 Gol", "ktercih": "5 Gol" }, "226": { "gameid": "88", "tercih": "5 veya daha fazla gol", "ktercih": "5+ Gol" }, "227": { "gameid": "88", "tercih": "6 Gol", "ktercih": "6 Gol" }, "228": { "gameid": "88", "tercih": "6 veya daha fazla gol", "ktercih": "6+ Gol" }, "229": { "gameid": "88", "tercih": "7 Gol", "ktercih": "7 Gol" }, "230": { "gameid": "88", "tercih": "7 veya daha fazla gol", "ktercih": "7+ Gol" }, "231": { "gameid": "88", "tercih": "8 Gol", "ktercih": "8 Gol" }, "232": { "gameid": "88", "tercih": "8 veya daha fazla gol", "ktercih": "8+ Gol" }, "259": { "gameid": "96", "tercih": "0 gol", "ktercih": "0 Gol" }, "260": { "gameid": "96", "tercih": "1 gol", "ktercih": "1 Gol" }, "261": { "gameid": "96", "tercih": "2 gol", "ktercih": "2 Gol" }, "262": { "gameid": "96", "tercih": "3 veya daha fazla gol", "ktercih": "3+" }, "263": { "gameid": "97", "tercih": "0 gol", "ktercih": "0 Gol" }, "264": { "gameid": "97", "tercih": "1 gol", "ktercih": "1 Gol" }, "265": { "gameid": "97", "tercih": "2 gol", "ktercih": "2 Gol" }, "266": { "gameid": "97", "tercih": "3 veya daha fazla gol", "ktercih": "3+" }, "271": { "gameid": "100", "tercih": "1 ve 2.5 Üst", "ktercih": "1-Üst" }, "272": { "gameid": "100", "tercih": "1 ve 2.5 Alt", "ktercih": "1-Alt" }, "273": { "gameid": "100", "tercih": "2 ve 2.5 Üst", "ktercih": "2-Üst" }, "274": { "gameid": "100", "tercih": "2 ve 2.5 Alt", "ktercih": "2-Alt" }, "590": { "gameid": "100", "tercih": "X ve 2.5 Üst", "ktercih": "X-Üst" }, "591": { "gameid": "100", "tercih": "X ve 2.5 Alt", "ktercih": "X-Alt" }, "275": { "gameid": "100", "tercih": "Berabere", "ktercih": "X" }, "276": { "gameid": "101", "tercih": "0:0", "ktercih": "0:0" }, "277": { "gameid": "101", "tercih": "1:0", "ktercih": "1:0" }, "278": { "gameid": "101", "tercih": "1:1", "ktercih": "1:1" }, "279": { "gameid": "101", "tercih": "0:1", "ktercih": "0:1" }, "280": { "gameid": "101", "tercih": "2:0", "ktercih": "2:0" }, "281": { "gameid": "101", "tercih": "2:1", "ktercih": "2:1" }, "282": { "gameid": "101", "tercih": "2:2", "ktercih": "2:2" }, "283": { "gameid": "101", "tercih": "1:2", "ktercih": "1:2" }, "284": { "gameid": "101", "tercih": "0:2", "ktercih": "0:2" }, "285": { "gameid": "101", "tercih": "3:0", "ktercih": "3:0" }, "286": { "gameid": "101", "tercih": "3:1", "ktercih": "3:1" }, "287": { "gameid": "101", "tercih": "3:2", "ktercih": "3:2" }, "288": { "gameid": "101", "tercih": "3:3", "ktercih": "3:3" }, "289": { "gameid": "101", "tercih": "2:3", "ktercih": "2:3" }, "290": { "gameid": "101", "tercih": "1:3", "ktercih": "1:3" }, "291": { "gameid": "101", "tercih": "0:3", "ktercih": "0:3" }, "292": { "gameid": "101", "tercih": "4:0", "ktercih": "4:0" }, "293": { "gameid": "101", "tercih": "4:1", "ktercih": "4:1" }, "294": { "gameid": "101", "tercih": "4:2", "ktercih": "4:2" }, "295": { "gameid": "101", "tercih": "4:3", "ktercih": "4:3" }, "296": { "gameid": "101", "tercih": "4:4", "ktercih": "4:4" }, "297": { "gameid": "101", "tercih": "3:4", "ktercih": "3:4" }, "298": { "gameid": "101", "tercih": "2:4", "ktercih": "2:4" }, "299": { "gameid": "101", "tercih": "1:4", "ktercih": "1:4" }, "300": { "gameid": "101", "tercih": "0:4", "ktercih": "0:4" }, "301": { "gameid": "102", "tercih": "0:0", "ktercih": "0:0" }, "302": { "gameid": "102", "tercih": "1:0", "ktercih": "1:0" }, "303": { "gameid": "102", "tercih": "1:1", "ktercih": "1:1" }, "304": { "gameid": "102", "tercih": "0:1", "ktercih": "0:1" }, "305": { "gameid": "102", "tercih": "2:0", "ktercih": "2:0" }, "306": { "gameid": "102", "tercih": "2:1", "ktercih": "2:1" }, "307": { "gameid": "102", "tercih": "2:2", "ktercih": "2:2" }, "308": { "gameid": "102", "tercih": "1:2", "ktercih": "1:2" }, "309": { "gameid": "102", "tercih": "0:2", "ktercih": "0:2" }, "310": { "gameid": "102", "tercih": "3:0", "ktercih": "3:0" }, "311": { "gameid": "102", "tercih": "3:1", "ktercih": "3:1" }, "312": { "gameid": "102", "tercih": "3:2", "ktercih": "3:2" }, "313": { "gameid": "102", "tercih": "3:3", "ktercih": "3:3" }, "314": { "gameid": "102", "tercih": "2:3", "ktercih": "2:3" }, "315": { "gameid": "102", "tercih": "1:3", "ktercih": "1:3" }, "316": { "gameid": "102", "tercih": "0:3", "ktercih": "0:3" }, "317": { "gameid": "102", "tercih": "4:0", "ktercih": "4:0" }, "318": { "gameid": "102", "tercih": "4:1", "ktercih": "4:1" }, "319": { "gameid": "102", "tercih": "4:2", "ktercih": "4:2" }, "320": { "gameid": "102", "tercih": "4:3", "ktercih": "4:3" }, "321": { "gameid": "102", "tercih": "4:4", "ktercih": "4:4" }, "322": { "gameid": "102", "tercih": "3:4", "ktercih": "3:4" }, "323": { "gameid": "102", "tercih": "2:4", "ktercih": "2:4" }, "324": { "gameid": "102", "tercih": "1:4", "ktercih": "1:4" }, "325": { "gameid": "102", "tercih": "0:4", "ktercih": "0:4" }, "353": { "gameid": 116, "tercih": "1", "ktercih": "1" }, "354": { "gameid": 116, "tercih": "X", "ktercih": "X" }, "355": { "gameid": 116, "tercih": "2", "ktercih": "2" }, "356": { "gameid": 117, "tercih": "Alt", "ktercih": "Alt", "kadtercih": "A" }, "357": { "gameid": 117, "tercih": "Üst", "ktercih": "Üst", "kadtercih": "Ü" }, "358": { "gameid": 118, "tercih": "1", "ktercih": "1" }, "359": { "gameid": 118, "tercih": "X", "ktercih": "X" }, "360": { "gameid": 118, "tercih": "2", "ktercih": "2" }, "379": { "gameid": "127", "tercih": "1", "ktercih": "1" }, "380": { "gameid": "127", "tercih": "2. gol olmaz", "ktercih": "X" }, "381": { "gameid": "127", "tercih": "2", "ktercih": "2" }, "382": { "gameid": "128", "tercih": "1", "ktercih": "1" }, "383": { "gameid": "128", "tercih": "3. gol olmaz", "ktercih": "X" }, "384": { "gameid": "128", "tercih": "2", "ktercih": "2" }, "385": { "gameid": "129", "tercih": "Alt 0.5", "ktercih": "A" }, "386": { "gameid": "129", "tercih": "Üst 0.5", "ktercih": "U" }, "387": { "gameid": "130", "tercih": "Alt 1.5", "ktercih": "A" }, "388": { "gameid": "130", "tercih": "Üst 1.5", "ktercih": "U" }, "389": { "gameid": "131", "tercih": "Alt 2.5", "ktercih": "A" }, "390": { "gameid": "131", "tercih": "Üst 2.5", "ktercih": "U" }, "391": { "gameid": "132", "tercih": "Alt 3.5", "ktercih": "A" }, "392": { "gameid": "132", "tercih": "Üst 3.5", "ktercih": "U" }, "393": { "gameid": "133", "tercih": "Alt 0.5", "ktercih": "A" }, "394": { "gameid": "133", "tercih": "Üst 0.5", "ktercih": "U" }, "395": { "gameid": "134", "tercih": "Alt 1.5", "ktercih": "A" }, "396": { "gameid": "134", "tercih": "Üst 1.5", "ktercih": "U" }, "397": { "gameid": "135", "tercih": "Alt 2.5", "ktercih": "A" }, "398": { "gameid": "135", "tercih": "Üst 2.5", "ktercih": "U" }, "399": { "gameid": "136", "tercih": "Alt 3.5", "ktercih": "A" }, "400": { "gameid": "136", "tercih": "Üst 3.5", "ktercih": "U" }, "401": { "gameid": "137", "tercih": "0-1", "ktercih": "0-1" }, "402": { "gameid": "137", "tercih": "2-3", "ktercih": "2-3" }, "403": { "gameid": "137", "tercih": "4-5", "ktercih": "4-5" }, "404": { "gameid": "138", "tercih": "MS 1 KG Var", "ktercih": "1 ve Evet" }, "405": { "gameid": "138", "tercih": "MS 2 KG Var", "ktercih": "2 ve Evet" }, "406": { "gameid": "138", "tercih": "MS 1 KG Yok", "ktercih": "1 ve Hay\u0131r" }, "407": { "gameid": "138", "tercih": "MS 2 KG Yok", "ktercih": "2 ve Hay\u0131r" }, "408": { "gameid": "138", "tercih": "Gol Yok", "ktercih": "Gol Yok" }, "409": { "gameid": "138", "tercih": "MS X \/ KG Var", "ktercih": "X ve Evet" }, "410": { "gameid": "139", "tercih": "0 Gol", "ktercih": "0 Gol" }, "411": { "gameid": "139", "tercih": "1 Gol", "ktercih": "1 Gol" }, "412": { "gameid": "139", "tercih": "2 Gol", "ktercih": "2 Gol" }, "413": { "gameid": "139", "tercih": "3 veya daha fazla gol", "ktercih": "3+" }, "414": { "gameid": "140", "tercih": "0 Gol", "ktercih": "0 Gol" }, "415": { "gameid": "140", "tercih": "1 Gol", "ktercih": "1 Gol" }, "416": { "gameid": "140", "tercih": "2 Gol", "ktercih": "2 Gol" }, "417": { "gameid": "140", "tercih": "3 veya daha fazla gol", "ktercih": "3+" }, "418": { "gameid": "141", "tercih": "0 Gol", "ktercih": "0 Gol" }, "419": { "gameid": "141", "tercih": "1 Gol", "ktercih": "1 Gol" }, "420": { "gameid": "141", "tercih": "2 Gol", "ktercih": "2" }, "421": { "gameid": "141", "tercih": "3 veya daha fazla gol", "ktercih": "3+" }, "422": { "gameid": "142", "tercih": "0 Gol", "ktercih": "0 Gol" }, "423": { "gameid": "142", "tercih": "1 Gol", "ktercih": "1 Gol" }, "424": { "gameid": "142", "tercih": "2 Gol", "ktercih": "2 Gol" }, "425": { "gameid": "142", "tercih": "3 veya daha fazla gol", "ktercih": "3+" }, "426": { "gameid": "143", "tercih": "Evet", "ktercih": "Evet", "kadtercih": "E" }, "427": { "gameid": "143", "tercih": "Hay\u0131r", "ktercih": "Hay\u0131r", "kadtercih": "H" }, "428": { "gameid": "144", "tercih": "Evet", "ktercih": "Evet", "kadtercih": "E" }, "429": { "gameid": "144", "tercih": "Hay\u0131r", "ktercih": "Hay\u0131r", "kadtercih": "H" }, "430": { "gameid": "145", "tercih": "Evet", "ktercih": "Evet", "kadtercih": "E" }, "431": { "gameid": "145", "tercih": "Hay\u0131r", "ktercih": "Hay\u0131r", "kadtercih": "H" }, "432": { "gameid": "146", "tercih": "1", "ktercih": "1" }, "433": { "gameid": "146", "tercih": "X", "ktercih": "X" }, "434": { "gameid": "146", "tercih": "2", "ktercih": "2" }, "435": { "gameid": "147", "tercih": "0 Gol", "ktercih": "0 Gol" }, "436": { "gameid": "147", "tercih": "1 Gol", "ktercih": "1 Gol" }, "437": { "gameid": "147", "tercih": "2 Gol", "ktercih": "2 Gol" }, "438": { "gameid": "147", "tercih": "3 veya daha fazla gol", "ktercih": "3+" }, "439": { "gameid": "148", "tercih": "Tek", "ktercih": "Tek", "kadtercih": "T" }, "440": { "gameid": "148", "tercih": "\u00c7ift", "ktercih": "\u00c7ift", "kadtercih": "Ç" }, "441": { "gameid": "149", "tercih": "Tek", "ktercih": "Tek", "kadtercih": "T" }, "442": { "gameid": "149", "tercih": "\u00c7ift", "ktercih": "\u00c7ift", "kadtercih": "Ç" }, "443": { "gameid": "150", "tercih": "Evet ve Üst 2.5", "ktercih": "Evet ve Üst" }, "444": { "gameid": "150", "tercih": "Evet ve Alt 2.5", "ktercih": "Evet ve Alt" }, "445": { "gameid": "150", "tercih": "Hayır ve Üst 2.5", "ktercih": "Hayır ve Üst" }, "446": { "gameid": "150", "tercih": "Hayır ve Alt 2.5", "ktercih": "Hayır ve Alt" }, "447": { "gameid": "151", "tercih": "1 ve en az 3 fark", "ktercih": "1 ve 3+ gol" }, "448": { "gameid": "151", "tercih": "1 ve 2 fark", "ktercih": "1 ve 2 gol" }, "449": { "gameid": "151", "tercih": "1 ve 1 fark", "ktercih": "1 ve 1 gol" }, "450": { "gameid": "151", "tercih": "2 ve en az 3 fark", "ktercih": "2 ve 3+ gol" }, "451": { "gameid": "151", "tercih": "2 ve 2 fark", "ktercih": "2 ve 2 gol" }, "452": { "gameid": "151", "tercih": "2 ve 1 fark", "ktercih": "2 ve 1 gol" }, "462": { "gameid": "162", "tercih": "Tek", "ktercih": "T" }, "463": { "gameid": "162", "tercih": "Çift", "ktercih": "Ç" }, "464": { "gameid": "163", "tercih": "Tek", "ktercih": "T" }, "465": { "gameid": "163", "tercih": "Çift", "ktercih": "Ç" }, "466": { "gameid": "164", "tercih": "Tek", "ktercih": "T" }, "467": { "gameid": "164", "tercih": "Çift", "ktercih": "Ç" }, "468": { "gameid": "165", "tercih": "Tek", "ktercih": "T" }, "469": { "gameid": "165", "tercih": "Çift", "ktercih": "Ç" }, "470": { "gameid": "101", "tercih": "Ba\u015fka bir sonu\u00e7", "ktercih": "Di\u011fer" }, "471": { "gameid": "12", "tercih": "Alt 0.5", "ktercih": "A 0.5" }, "472": { "gameid": "12", "tercih": "Alt 1.5", "ktercih": "A 1.5" }, "473": { "gameid": "12", "tercih": "Alt 2.5", "ktercih": "A 2.5" }, "474": { "gameid": "12", "tercih": "Alt 3.5", "ktercih": "A 3.5" }, "475": { "gameid": "12", "tercih": "Alt 4.5", "ktercih": "A 4.5" }, "476": { "gameid": "12", "tercih": "Alt 5.5", "ktercih": "A 5.5" }, "477": { "gameid": "12", "tercih": "Alt 6.5", "ktercih": "A 6.5" }, "478": { "gameid": "12", "tercih": "Alt 7.5", "ktercih": "A 7.5" }, "479": { "gameid": "12", "tercih": "Alt 8.5", "ktercih": "A 8.5" }, "480": { "gameid": "12", "tercih": "Alt 9.5", "ktercih": "A 9.5" }, "481": { "gameid": "12", "tercih": "Üst 0.5", "ktercih": "U 0.5" }, "482": { "gameid": "12", "tercih": "Üst 1.5", "ktercih": "U 1.5" }, "483": { "gameid": "12", "tercih": "Üst 2.5", "ktercih": "U 2.5" }, "484": { "gameid": "12", "tercih": "Üst 3.5", "ktercih": "U 3.5" }, "485": { "gameid": "12", "tercih": "Üst 4.5", "ktercih": "U 4.5" }, "486": { "gameid": "12", "tercih": "Üst 5.5", "ktercih": "U 5.5" }, "487": { "gameid": "12", "tercih": "Üst 6.5", "ktercih": "U 6.5" }, "488": { "gameid": "12", "tercih": "Üst 7.5", "ktercih": "U 7.5" }, "489": { "gameid": "12", "tercih": "Üst 8.5", "ktercih": "U 8.5" }, "490": { "gameid": "12", "tercih": "Üst 9.5", "ktercih": "U 9.5" }, "491": { "gameid": "13", "tercih": "Alt 0.5", "ktercih": "A 0.5" }, "492": { "gameid": "13", "tercih": "Alt 1.5", "ktercih": "A 1.5" }, "493": { "gameid": "13", "tercih": "Alt 2.5", "ktercih": "A 2.5" }, "494": { "gameid": "13", "tercih": "Alt 3.5", "ktercih": "A 3.5" }, "495": { "gameid": "13", "tercih": "Alt 4.5", "ktercih": "A 4.5" }, "496": { "gameid": "13", "tercih": "Alt 5.5", "ktercih": "A 5.5" }, "497": { "gameid": "13", "tercih": "Üst 0.5", "ktercih": "U 0.5" }, "498": { "gameid": "13", "tercih": "Üst 1.5", "ktercih": "U 1.5" }, "499": { "gameid": "13", "tercih": "Üst 2.5", "ktercih": "U 2.5" }, "500": { "gameid": "13", "tercih": "Üst 3.5", "ktercih": "U 3.5" }, "501": { "gameid": "13", "tercih": "Üst 4.5", "ktercih": "U 4.5" }, "502": { "gameid": "13", "tercih": "Üst 5.5", "ktercih": "U 5.5" }, "503": { "gameid": "14", "tercih": "Alt 0.5", "ktercih": "A 0.5" }, "504": { "gameid": "14", "tercih": "Alt 1.5", "ktercih": "A 1.5" }, "505": { "gameid": "14", "tercih": "Alt 2.5", "ktercih": "A 2.5" }, "506": { "gameid": "14", "tercih": "Alt 3.5", "ktercih": "A 3.5" }, "507": { "gameid": "14", "tercih": "Üst 0.5", "ktercih": "U 0.5" }, "508": { "gameid": "14", "tercih": "Üst 1.5", "ktercih": "U 1.5" }, "509": { "gameid": "14", "tercih": "Üst 2.5", "ktercih": "U 2.5" }, "510": { "gameid": "14", "tercih": "Üst 3.5", "ktercih": "U 3.5" }, "511": { "gameid": "166", "tercih": "1:0,2:0 veya 3:0", "ktercih": "1:0,2:0,3:0" }, "512": { "gameid": "166", "tercih": "0:1,0:2 veya 0:3", "ktercih": "0:1,0:2,0:3" }, "513": { "gameid": "166", "tercih": "4:0,5:0 veya 6:0", "ktercih": "4:0,5:0,6:0" }, "514": { "gameid": "166", "tercih": "0:4,0:5 veya 0:6", "ktercih": "0:4,0:5,0:6" }, "515": { "gameid": "166", "tercih": "2:1,3:1 veya 4:1", "ktercih": "2:1,3:1,4:1" }, "516": { "gameid": "166", "tercih": "1:2,1:3 veya 1:4", "ktercih": "1:2,1:3,1:4" }, "517": { "gameid": "166", "tercih": "3:2,4:2,4:3 veya 5:1", "ktercih": "3:2,4:2,4:3,5:1" }, "518": { "gameid": "166", "tercih": "2:3,2:4,3:4 veya 1:5", "ktercih": "2:3,2:4,3:4,1:5" }, "519": { "gameid": "166", "tercih": "MS 1 ve DİĞER", "ktercih": "1 ve D" }, "520": { "gameid": "166", "tercih": "MS 2 ve DİĞER", "ktercih": "2 ve D" }, "521": { "gameid": "166", "tercih": "X", "ktercih": "X" }, "522": { "gameid": "167", "tercih": "0-1", "ktercih": "0-1" }, "523": { "gameid": "167", "tercih": "2-3", "ktercih": "2-3" }, "524": { "gameid": "167", "tercih": "4+", "ktercih": "4+" }, "525": { "gameid": "168", "tercih": "0-2", "ktercih": "0-2" }, "526": { "gameid": "168", "tercih": "3-4", "ktercih": "3-4" }, "527": { "gameid": "168", "tercih": "5+", "ktercih": "5+" }, "528": { "gameid": "169", "tercih": "0-3", "ktercih": "0-3" }, "529": { "gameid": "169", "tercih": "4-5", "ktercih": "4-5" }, "530": { "gameid": "169", "tercih": "6+", "ktercih": "6+" }, "536": { "gameid": "173", "tercih": "Çift", "ktercih": "C" }, "537": { "gameid": "173", "tercih": "Tek", "ktercih": "T" }, "582": { "gameid": "202", "tercih": "Evet", "ktercih": "E" }, "583": { "gameid": "202", "tercih": "Hayır", "ktercih": "H" }, "850": { "gameid": "330", "tercih": "Tek", "ktercih": "T" }, "851": { "gameid": "330", "tercih": "Çift", "ktercih": "C" }, "852": { "gameid": "331", "tercih": "Tek", "ktercih": "T" }, "853": { "gameid": "331", "tercih": "Çift", "ktercih": "C" }, "683": { "gameid": "269", "tercih": "Sadece Evsahibi", "ktercih": "S E" }, "684": { "gameid": "269", "tercih": "Sadece Deplasman", "ktercih": "S D" }, "584": { "gameid": "203", "tercih": "1", "ktercih": "1" }, "585": { "gameid": "203", "tercih": "2", "ktercih": "2" }, "586": { "gameid": "10204", "tercih": "Evet", "ktercih": "E" }, "587": { "gameid": "10204", "tercih": "Hayır", "ktercih": "H" }, "3079": { "gameid": "10205", "tercih": "Evet", "ktercih": "E" }, "103079": { "gameid": "10205", "tercih": "Hayır", "ktercih": "H" }, "822": { "gameid": "176", "tercih": "1.Devre", "ktercih": "1" }, "823": { "gameid": "176", "tercih": "Eşit", "ktercih": "X", "kadtercih": "Eşit" }, "824": { "gameid": "176", "tercih": "2.Devre", "ktercih": "2" }, "825": { "gameid": "177", "tercih": "1.Devre", "ktercih": "1" }, "826": { "gameid": "177", "tercih": "Eşit", "ktercih": "X" }, "827": { "gameid": "177", "tercih": "2.Devre", "ktercih": "2" }, "592": { "gameid": "167", "tercih": "X ve KG VAR", "ktercih": "X/VAR" }, "593": { "gameid": "167", "tercih": "1 ve KG VAR", "ktercih": "1/VAR" }, "594": { "gameid": "167", "tercih": "2 ve KG YOK", "ktercih": "2/YOK" }, "595": { "gameid": "167", "tercih": "1 ve KG YOK", "ktercih": "1/YOK" }, "596": { "gameid": "167", "tercih": "2 ve KG VAR", "ktercih": "2/VAR" }, "597": { "gameid": "166", "tercih": "2 ve Alt", "ktercih": "2/Alt" }, "598": { "gameid": "166", "tercih": "X ve Alt", "ktercih": "X/Alt" }, "599": { "gameid": "166", "tercih": "1 ve Alt", "ktercih": "1/Alt" }, "600": { "gameid": "166", "tercih": "2 ve Üst", "ktercih": "2/Ust" }, "601": { "gameid": "166", "tercih": "X ve Üst", "ktercih": "X/Ust" }, "602": { "gameid": "166", "tercih": "1 ve Üst", "ktercih": "1/Ust" }, "542": { "gameid": "184", "tercih": "dynamic", "ktercih": "dynamic" }, "540": { "gameid": "183", "tercih": "1", "ktercih": "1" }, "541": { "gameid": "183", "tercih": "2", "ktercih": "2" }, "531": { "gameid": "170", "tercih": "1", "ktercih": "1" }, "532": { "gameid": "170", "tercih": "2", "ktercih": "2" }, "534": { "gameid": "172", "tercih": "dynamic", "ktercih": "dynamic" }, "640": { "gameid": "15", "tercih": "Alt 0.5", "ktercih": "A 0.5" }, "641": { "gameid": "15", "tercih": "Alt 1.5", "ktercih": "A 1.5" }, "642": { "gameid": "15", "tercih": "Alt 2.5", "ktercih": "A 2.5" }, "643": { "gameid": "15", "tercih": "Alt 3.5", "ktercih": "A 3.5" }, "644": { "gameid": "15", "tercih": "Üst 0.5", "ktercih": "U 0.5" }, "645": { "gameid": "15", "tercih": "Üst 1.5", "ktercih": "U 1.5" }, "546": { "gameid": "15", "tercih": "Üst 2.5", "ktercih": "U 2.5" }, "647": { "gameid": "15", "tercih": "Üst 3.5", "ktercih": "U 3.5" }, "740": { "gameid": "24", "tercih": "Alt 0.5", "ktercih": "A 0.5" }, "741": { "gameid": "24", "tercih": "Alt 1.5", "ktercih": "A 1.5" }, "742": { "gameid": "24", "tercih": "Alt 2.5", "ktercih": "A 2.5" }, "743": { "gameid": "24", "tercih": "Alt 3.5", "ktercih": "A 3.5" }, "744": { "gameid": "24", "tercih": "Üst 0.5", "ktercih": "U 0.5" }, "745": { "gameid": "24", "tercih": "Üst 1.5", "ktercih": "U 1.5" }, "746": { "gameid": "24", "tercih": "Üst 2.5", "ktercih": "U 2.5" }, "747": { "gameid": "24", "tercih": "Üst 3.5", "ktercih": "U 3.5" }, "748": { "gameid": "25", "tercih": "Alt 0.5", "ktercih": "A 0.5" }, "749": { "gameid": "25", "tercih": "Alt 1.5", "ktercih": "A 1.5" }, "750": { "gameid": "25", "tercih": "Alt 2.5", "ktercih": "A 2.5" }, "751": { "gameid": "25", "tercih": "Alt 3.5", "ktercih": "A 3.5" }, "752": { "gameid": "25", "tercih": "Üst 0.5", "ktercih": "U 0.5" }, "753": { "gameid": "25", "tercih": "Üst 1.5", "ktercih": "U 1.5" }, "754": { "gameid": "25", "tercih": "Üst 2.5", "ktercih": "U 2.5" }, "755": { "gameid": "25", "tercih": "Üst 3.5", "ktercih": "U 3.5" }, "535": { "gameid": "180", "tercih": "dynamic", "ktercih": "dynamic" }, "538": { "gameid": "182", "tercih": "1", "ktercih": "1" }, "539": { "gameid": "182", "tercih": "2", "ktercih": "2" }, "558": { "gameid": "194", "tercih": "1", "ktercih": "1" }, "559": { "gameid": "194", "tercih": "X", "ktercih": "X" }, "560": { "gameid": "194", "tercih": "2", "ktercih": "2" }, "561": { "gameid": "195", "tercih": "1", "ktercih": "1" }, "562": { "gameid": "195", "tercih": "X", "ktercih": "X" }, "563": { "gameid": "195", "tercih": "2", "ktercih": "2" }, "564": { "gameid": "196", "tercih": "1", "ktercih": "1" }, "565": { "gameid": "196", "tercih": "X", "ktercih": "X" }, "566": { "gameid": "196", "tercih": "2", "ktercih": "2" }, "567": { "gameid": "181", "tercih": "dynamic", "ktercih": "dynamic" }, "568": { "gameid": "185", "tercih": "dynamic", "ktercih": "dynamic" }, "569": { "gameid": "186", "tercih": "dynamic", "ktercih": "dynamic" }, "2001": { "gameid": "1500", "tercih": "1", "ktercih": "1" }, "2002": { "gameid": "1500", "tercih": "2", "ktercih": "2" }, "2003": { "gameid": "1501", "tercih": "dynamic", "ktercih": "dynamic" }, "2004": { "gameid": "1502", "tercih": "2:0", "ktercih": "2:0" }, "2005": { "gameid": "1502", "tercih": "2:1", "ktercih": "2:1" }, "2006": { "gameid": "1502", "tercih": "1:2", "ktercih": "1:2" }, "2007": { "gameid": "1502", "tercih": "0:2", "ktercih": "0:2" }, "2008": { "gameid": "1503", "tercih": "1", "ktercih": "1" }, "2009": { "gameid": "1503", "tercih": "2", "ktercih": "2" }, "2010": { "gameid": "1504", "tercih": "dynamic", "ktercih": "dynamic" }, "2011": { "gameid": "1505", "tercih": "1", "ktercih": "1" }, "2012": { "gameid": "1505", "tercih": "2", "ktercih": "2" }, "2013": { "gameid": "1506", "tercih": "dynamic", "ktercih": "dynamic" }, "2014": { "gameid": "1507", "tercih": "1", "ktercih": "1" }, "2015": { "gameid": "1507", "tercih": "2", "ktercih": "2" }, "2016": { "gameid": "1508", "tercih": "dynamic", "ktercih": "dynamic" }, "2017": { "gameid": "1509", "tercih": "1", "ktercih": "1" }, "2018": { "gameid": "1509", "tercih": "2", "ktercih": "2" }, "2019": { "gameid": "1510", "tercih": "dynamic", "ktercih": "dynamic" }, "2020": { "gameid": "1511", "tercih": "3:0", "ktercih": "3:0" }, "2021": { "gameid": "1511", "tercih": "3:1", "ktercih": "3:1" }, "2022": { "gameid": "1511", "tercih": "3:2", "ktercih": "3:2" }, "2023": { "gameid": "1511", "tercih": "2:3", "ktercih": "2:3" }, "2024": { "gameid": "1511", "tercih": "1:3", "ktercih": "1:3" }, "2025": { "gameid": "1511", "tercih": "0:3", "ktercih": "0:3" }, "3001": { "gameid": "1800", "tercih": "1", "ktercih": "1" }, "3002": { "gameid": "1800", "tercih": "X", "ktercih": "X" }, "3003": { "gameid": "1800", "tercih": "2", "ktercih": "2" }, "3004": { "gameid": "1801", "tercih": "1", "ktercih": "1" }, "3005": { "gameid": "1801", "tercih": "X", "ktercih": "X" }, "3006": { "gameid": "1801", "tercih": "2", "ktercih": "2" }, "3007": { "gameid": "1802", "tercih": "1", "ktercih": "1" }, "3008": { "gameid": "1802", "tercih": "X", "ktercih": "X" }, "3009": { "gameid": "1802", "tercih": "2", "ktercih": "2" }, "3010": { "gameid": "1803", "tercih": "1", "ktercih": "1" }, "3011": { "gameid": "1803", "tercih": "X", "ktercih": "X" }, "3012": { "gameid": "1803", "tercih": "2", "ktercih": "2" }, "3013": { "gameid": "1804", "tercih": "1", "ktercih": "1" }, "3014": { "gameid": "1804", "tercih": "X", "ktercih": "X" }, "3015": { "gameid": "1804", "tercih": "2", "ktercih": "2" }, "3016": { "gameid": "1805", "tercih": "1", "ktercih": "1" }, "3017": { "gameid": "1805", "tercih": "X", "ktercih": "X" }, "3018": { "gameid": "1805", "tercih": "2", "ktercih": "2" }, "3019": { "gameid": "1806", "tercih": "1", "ktercih": "1" }, "3020": { "gameid": "1806", "tercih": "X", "ktercih": "X" }, "3021": { "gameid": "1806", "tercih": "2", "ktercih": "2" }, "3022": { "gameid": "1807", "tercih": "1", "ktercih": "1" }, "3023": { "gameid": "1807", "tercih": "X", "ktercih": "X" }, "3024": { "gameid": "1807", "tercih": "2", "ktercih": "2" }, "3025": { "gameid": "1808", "tercih": "1", "ktercih": "1" }, "3026": { "gameid": "1808", "tercih": "X", "ktercih": "X" }, "3027": { "gameid": "1808", "tercih": "2", "ktercih": "2" }, "3028": { "gameid": "1809", "tercih": "1", "ktercih": "1" }, "3029": { "gameid": "1809", "tercih": "X", "ktercih": "X" }, "3030": { "gameid": "1809", "tercih": "2", "ktercih": "2" }, "3031": { "gameid": "1810", "tercih": "1", "ktercih": "1" }, "3032": { "gameid": "1810", "tercih": "X", "ktercih": "X" }, "3033": { "gameid": "1810", "tercih": "2", "ktercih": "2" }, "3034": { "gameid": "1811", "tercih": "1", "ktercih": "1" }, "3035": { "gameid": "1811", "tercih": "X", "ktercih": "X" }, "3036": { "gameid": "1811", "tercih": "2", "ktercih": "2" }, "3037": { "gameid": "1812", "tercih": "1", "ktercih": "1" }, "3038": { "gameid": "1812", "tercih": "X", "ktercih": "X" }, "3039": { "gameid": "1812", "tercih": "2", "ktercih": "2" }, "3040": { "gameid": "1823", "tercih": "1", "ktercih": "1" }, "3041": { "gameid": "1813", "tercih": "X", "ktercih": "X" }, "3042": { "gameid": "1813", "tercih": "2", "ktercih": "2" }, "3043": { "gameid": "1814", "tercih": "1", "ktercih": "1" }, "3044": { "gameid": "1814", "tercih": "X", "ktercih": "X" }, "3045": { "gameid": "1814", "tercih": "2", "ktercih": "2" }, "3046": { "gameid": "1815", "tercih": "1", "ktercih": "1" }, "3047": { "gameid": "1815", "tercih": "X", "ktercih": "X" }, "3048": { "gameid": "1815", "tercih": "2", "ktercih": "2" }, "3049": { "gameid": "1816", "tercih": "1", "ktercih": "1" }, "3050": { "gameid": "1816", "tercih": "X", "ktercih": "X" }, "3051": { "gameid": "1816", "tercih": "2", "ktercih": "2" }, "3052": { "gameid": "1817", "tercih": "1", "ktercih": "1" }, "3053": { "gameid": "1817", "tercih": "X", "ktercih": "X" }, "3054": { "gameid": "1817", "tercih": "2", "ktercih": "2" }, "3055": { "gameid": "1818", "tercih": "1", "ktercih": "1" }, "3056": { "gameid": "1818", "tercih": "X", "ktercih": "X" }, "3057": { "gameid": "1818", "tercih": "2", "ktercih": "2" }, "3058": { "gameid": "1819", "tercih": "1", "ktercih": "1" }, "3059": { "gameid": "1819", "tercih": "X", "ktercih": "X" }, "3060": { "gameid": "1819", "tercih": "2", "ktercih": "2" }, "3061": { "gameid": "1820", "tercih": "1", "ktercih": "1" }, "3062": { "gameid": "1820", "tercih": "X", "ktercih": "X" }, "3063": { "gameid": "1820", "tercih": "2", "ktercih": "2" }, "3064": { "gameid": "1821", "tercih": "1", "ktercih": "1" }, "3065": { "gameid": "1821", "tercih": "X", "ktercih": "X" }, "3066": { "gameid": "1821", "tercih": "2", "ktercih": "2" }, "3067": { "gameid": "1822", "tercih": "1", "ktercih": "1" }, "3068": { "gameid": "1822", "tercih": "X", "ktercih": "X" }, "3069": { "gameid": "1822", "tercih": "2", "ktercih": "2" }, "3070": { "gameid": "1823", "tercih": "1", "ktercih": "1" }, "3071": { "gameid": "1823", "tercih": "X", "ktercih": "X" }, "3072": { "gameid": "1823", "tercih": "2", "ktercih": "2" }, "3073": { "gameid": "1824", "tercih": "1", "ktercih": "1" }, "3074": { "gameid": "1824", "tercih": "X", "ktercih": "X" }, "3075": { "gameid": "1824", "tercih": "2", "ktercih": "2" }, "3076": { "gameid": "1825", "tercih": "1", "ktercih": "1" }, "3077": { "gameid": "1825", "tercih": "X", "ktercih": "X" }, "3078": { "gameid": "1825", "tercih": "2", "ktercih": "2" }, "4001": { "gameid": "2805", "tercih": "1", "ktercih": "1" }, "4002": { "gameid": "2805", "tercih": "X", "ktercih": "X" }, "4003": { "gameid": "2805", "tercih": "2", "ktercih": "2" }, "4004": { "gameid": "2806", "tercih": "1", "ktercih": "1" },"4005": { "gameid": "2806", "tercih": "X", "ktercih": "X" }, "4006": { "gameid": "2806", "tercih": "2", "ktercih": "2" },"4007": { "gameid": "2807", "tercih": "1", "ktercih": "1" },"4008": { "gameid": "2807", "tercih": "X", "ktercih": "X" },"4009": { "gameid": "2807", "tercih": "2", "ktercih": "2" },"4010": { "gameid": "2808", "tercih": "1", "ktercih": "1" },"4011": { "gameid": "2808", "tercih": "X", "ktercih": "X" },"4012": { "gameid": "2808", "tercih": "2", "ktercih": "2" },"4013": { "gameid": "2800", "tercih": "dynamic", "ktercih": "dynamic" },"4014": { "gameid": "2801", "tercih": "dynamic", "ktercih": "dynamic" },"4015": { "gameid": "2802", "tercih": "dynamic", "ktercih": "dynamic" },"4016": { "gameid": "2803", "tercih": "dynamic", "ktercih": "dynamic" },"4017": { "gameid": "2804", "tercih": "dynamic", "ktercih": "dynamic" },"4018": { "gameid": "2809", "tercih": "dynamic", "ktercih": "dynamic" },"4019": { "gameid": "2810", "tercih": "dynamic", "ktercih": "dynamic" },"4020": { "gameid": "2811", "tercih": "dynamic", "ktercih": "dynamic" },"4021": { "gameid": "2812", "tercih": "dynamic", "ktercih": "dynamic" } };

var marketisimleri={"1":"Ana Bahisler","2":"Alt\/Üst Bahisleri","3":"Skor Bahisleri","4":"1. Devre Bahisleri","5":"2. Devre Bahisleri","6":"Gol bahisleri","7":"Evsahibi Bahisleri","8":"Deplasman Bahisleri","9":"Diğer Bahisler"};

</script>

<script type="text/javascript">
function addZero(i) {
    if (i < 10) {
        i = "0" + i;
    }
    return i;
}
var dsd = new Date();
var serversaat=<?=date("H");?>;
var pcsaat=addZero(dsd.getHours());
$(document).ready(function() {
if(serversaat!=pcsaat){
	if(serversaat!=pcsaat){
		var innets='<div class="divDerbiBantSayac">Saatinizi kontrol edin!</div>';
		$('.logo').html(innets);
	}
}
ServerTime.Start('<?=date("Y-m-d H:i:s");?>');
ServerTime._tstamp=<?=time();?>;
$(".campaingCnt span.closeBtn").click(function () {
$('#divNotice').slideUp(1000);
var expire = new Date();
expire.setTime(expire.getTime() + (120 * 60 * 1000)); 
$.cookie("notice",1,{expires:expire});
});

User.ptip				 = 3;
User.parnt				 = 10831;
User.token				 = '82228824f5f57374559ed8fc69015733';
});

function canlitipgoster(div) {

if (div==1) {
$('#futboldivgoster').show();
$('#basketboldivgoster').hide();
$('#tenisdivgoster').hide();
$('#voleyboldivgoster').hide();
$('#buzhokeyidivgoster').hide();
$('#masatenisidivgoster').hide();
$('#liveEventsRight_live').show();
$('#liveEventsRightb_live').hide();
$('#liveEventsRightt_live').hide();
$('#liveEventsRightv_live').hide();
$('#futbolcanlidiv').addClass('on');
$('#liveEventsRightbuz_live').hide();
$('#liveEventsRightmt_live').hide();
$('#basketbolcanlidiv').removeClass('on');
$('#teniscanlidiv').removeClass('on');
$('#voleybolcanlidiv').removeClass('on');
$('#buzhokeyicanlidiv').removeClass('on');
$('#masatenisicanlidiv').removeClass('on');
} else if (div==2) {
$('#futboldivgoster').hide();
$('#basketboldivgoster').show();
$('#tenisdivgoster').hide();
$('#voleyboldivgoster').hide();
$('#buzhokeyidivgoster').hide();
$('#masatenisidivgoster').hide();
$('#liveEventsRight_live').hide();
$('#liveEventsRightb_live').show();
$('#liveEventsRightt_live').hide();
$('#liveEventsRightv_live').hide();
$('#liveEventsRightbuz_live').hide();
$('#liveEventsRightmt_live').hide();
$('#futbolcanlidiv').removeClass('on');
$('#basketbolcanlidiv').addClass('on');
$('#teniscanlidiv').removeClass('on');
$('#voleybolcanlidiv').removeClass('on');
$('#buzhokeyicanlidiv').removeClass('on');
$('#masatenisicanlidiv').removeClass('on');
} else if (div==3) {
$('#futboldivgoster').hide();
$('#basketboldivgoster').hide();
$('#tenisdivgoster').show();
$('#voleyboldivgoster').hide();
$('#buzhokeyidivgoster').hide();
$('#masatenisidivgoster').hide();
$('#liveEventsRight_live').hide();
$('#liveEventsRightb_live').hide();
$('#liveEventsRightt_live').show();
$('#liveEventsRightv_live').hide();
$('#liveEventsRightbuz_live').hide();
$('#liveEventsRightmt_live').hide();
$('#futbolcanlidiv').removeClass('on');
$('#basketbolcanlidiv').removeClass('on');
$('#teniscanlidiv').addClass('on');
$('#voleybolcanlidiv').removeClass('on');
$('#buzhokeyicanlidiv').removeClass('on');
$('#masatenisicanlidiv').removeClass('on');
} else if (div==4) {
$('#futboldivgoster').hide();
$('#basketboldivgoster').hide();
$('#tenisdivgoster').hide();
$('#voleyboldivgoster').show();
$('#buzhokeyidivgoster').hide();
$('#masatenisidivgoster').hide();
$('#liveEventsRight_live').hide();
$('#liveEventsRightb_live').hide();
$('#liveEventsRightt_live').hide();
$('#liveEventsRightv_live').show();
$('#liveEventsRightbuz_live').hide();
$('#liveEventsRightmt_live').hide();
$('#futbolcanlidiv').removeClass('on');
$('#basketbolcanlidiv').removeClass('on');
$('#teniscanlidiv').removeClass('on');
$('#voleybolcanlidiv').addClass('on');
$('#buzhokeyicanlidiv').removeClass('on');
$('#masatenisicanlidiv').removeClass('on');
} else if (div==5) {
$('#futboldivgoster').hide();
$('#basketboldivgoster').hide();
$('#tenisdivgoster').hide();
$('#voleyboldivgoster').hide();
$('#buzhokeyidivgoster').show();
$('#masatenisidivgoster').hide();
$('#liveEventsRight_live').hide();
$('#liveEventsRightb_live').hide();
$('#liveEventsRightt_live').hide();
$('#liveEventsRightv_live').hide();
$('#liveEventsRightbuz_live').show();
$('#liveEventsRightmt_live').hide();
$('#futbolcanlidiv').removeClass('on');
$('#basketbolcanlidiv').removeClass('on');
$('#teniscanlidiv').removeClass('on');
$('#voleybolcanlidiv').removeClass('on');
$('#buzhokeyicanlidiv').addClass('on');
$('#masatenisicanlidiv').removeClass('on');
} else if (div==6) {
$('#futboldivgoster').hide();
$('#basketboldivgoster').hide();
$('#tenisdivgoster').hide();
$('#voleyboldivgoster').hide();
$('#buzhokeyidivgoster').hide();
$('#masatenisidivgoster').show();
$('#liveEventsRight_live').hide();
$('#liveEventsRightb_live').hide();
$('#liveEventsRightt_live').hide();
$('#liveEventsRightv_live').hide();
$('#liveEventsRightbuz_live').hide();
$('#liveEventsRightmt_live').show();
$('#futbolcanlidiv').removeClass('on');
$('#basketbolcanlidiv').removeClass('on');
$('#teniscanlidiv').removeClass('on');
$('#voleybolcanlidiv').removeClass('on');
$('#buzhokeyicanlidiv').removeClass('on');
$('#masatenisicanlidiv').addClass('on');
}

}
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.2/rollups/md5.js"></script>
<script type="text/javascript" src="assets/js/Live_Yeni5.js?v=1.2.1590857609"></script>
<script type="text/javascript" src="assets/js/loadmask.js?v=3.4.8"></script>
<script type="text/javascript" src="assets/js/jquery.json.js?v=3.4.8"></script>
<script type="text/javascript" src="assets/js/UHnWESdfrtgbOOkCCrtAzC.js?v=42.37.911590395166"></script>
<script type="text/javascript" src="assets/js/OnbVgaHkNgTjcXsUKGkimJiNgBSAD.js?v=1.5.11590395166"></script>
<script type="text/javascript" src="assets/js/dRVG_Yeni.js?v=1.5.11590395166"></script>

<div id="main" class="right">

<div class="e_active e_noCache ">

<div style="height:195px;overflow:hidden;" class="carousel" id="slides">
<div class="carousel_container">
<div>
<img src="assets/img/slider-gif.gif" alt=""  style="cursor:pointer">
</div>
</div>
<div class="carousel_prev carousel_prevnext">
</div>
<div class="carousel_next carousel_prevnext">
</div>
</div>

<?php if(userayar('canlifutbol')=="1") { ?>

<div id="start" class="margin_r_12">
<div class="space clear"></div>
<div id="comp-smallconference" class="e_active " e:url="@smallconference/program/smallConference" e:hash="1xfwfhf" e:next="1598477765221">
<div class="border_ccc">

<div class="t_head cf">
<a class="boxTitle" href="canli-bahis"><span><?=getTranslation('selectoptionraporcanli')?></span></a>
<div class="t_head_but right">
<div class="left on" id="futbolcanlidiv" onclick="canlitipgoster(1);"><?=getTranslation('ajaxoyunturleri7')?></div>
<div class="left" id="basketbolcanlidiv" onclick="canlitipgoster(2);"><?=getTranslation('ajaxoyunturleri8')?></div>
<div class="left" id="teniscanlidiv" onclick="canlitipgoster(3);"><?=getTranslation('ajaxoyunturleri9')?></div>
<div class="left" id="voleybolcanlidiv" onclick="canlitipgoster(4);"><?=getTranslation('ajaxoyunturleri10')?></div>
<div class="left" id="buzhokeyicanlidiv" onclick="canlitipgoster(5);"><?=getTranslation('yeniyerler_kasa398')?></div>
<div class="left" id="masatenisicanlidiv" onclick="canlitipgoster(6);"><?=getTranslation('yeniyerler_kasa397')?></div>
</div>
</div>

<div id="futboldivgoster" class="t_subhead cf ">
<div class="align_c left"><?=getTranslation('ajaxcanlibahisler5')?></div>
<div style="width: 280px;" class="left">&nbsp;</div>
<div class="type-small">1</div>
<div class="type-small">X</div>
<div class="type-small">2</div>
<div class="w_117 grey_999 left align_c">
<span class="truncateText"><?=getTranslation('yeniyerler_kasa393')?> +/-</span>
</div>
</div>

<div id="basketboldivgoster" class="t_subhead cf " style="display:none;">
<div class="align_c left"><?=getTranslation('ajaxcanlibahisler5')?></div>
<div style="width: 280px;" class="left">&nbsp;</div>
<div class="type-small">1</div>
<div class="type-small">2</div>
<div class="w_117 grey_999 left align_c" style="width:168px;">
<span class="truncateText"><?=getTranslation('yeniyerler_kasa394')?> +/-</span>
</div>
</div>

<div id="tenisdivgoster" class="t_subhead cf " style="display:none;">
<div class="align_c left"><?=getTranslation('ajaxcanlibahisler5')?></div>
<div style="width: 323px;" class="left">&nbsp;</div>
<div class="type-small">1</div>
<div class="type-small">2</div>
<div class="w_117 grey_999 left align_c">
<span class="truncateText"><?=getTranslation('yeniyerler_kasa395')?></span>
</div>
</div>

<div id="voleyboldivgoster" class="t_subhead cf " style="display:none;">
<div class="align_c left"><?=getTranslation('ajaxcanlibahisler5')?></div>
<div style="width: 323px;" class="left">&nbsp;</div>
<div class="type-small">1</div>
<div class="type-small">2</div>
<div class="w_117 grey_999 left align_c">
<span class="truncateText"><?=getTranslation('yeniyerler_kasa395')?></span>
</div>
</div>

<div id="buzhokeyidivgoster" class="t_subhead cf " style="display:none;">
<div class="align_c left"><?=getTranslation('ajaxcanlibahisler5')?></div>
<div style="width: 390px;" class="left">&nbsp;</div>
<div class="type-small">1</div>
<div class="type-small">X</div>
<div class="type-small">2</div>
</div>

<div id="masatenisidivgoster" class="t_subhead cf " style="display:none;">
<div class="align_c left"><?=getTranslation('ajaxcanlibahisler5')?></div>
<div style="width: 323px;" class="left">&nbsp;</div>
<div class="type-small">1</div>
<div class="type-small">2</div>
<div class="w_117 grey_999 left align_c">
<span class="truncateText"><?=getTranslation('yeniyerler_kasa395')?></span>
</div>
</div>

<div id="liveEventsRight_live"></div>

<div id="liveEventsRightb_live" style="display:none;"></div>

<div id="liveEventsRightt_live" style="display:none;"></div>

<div id="liveEventsRightv_live" style="display:none;"></div>

<div id="liveEventsRightbuz_live" style="display:none;"></div>

<div id="liveEventsRightmt_live" style="display:none;"></div>

</div>
</div>
</div>

<div class="t_foot big cf" style="margin-top: -1.7%;width: 98%;background-color: #fff;">
<div class="button_new_bg inline">
<a href="/canli-bahis" class="button_new"><span><?=getTranslation('yeniyerler_kasa396')?></span></a>
</div>
</div>
<?php } ?>

</div>

<div class="space_15 shadow_bot_564"></div>

<span id="mainPage">
<div class="e_active e_noCache margin_r_12" id="comp-selection">
<div class="space"></div>
<div id="mainsfutbol"></div>
<div id="mainsbasketbol"></div>
<div id="mainstenis"></div>
<div id="mainsvoleybol"></div>
<div id="mainsbuzhokeyi"></div>
<div id="mainsmasatenisi"></div>
<div id="mainsbeyzbol"></div>
<div id="mainsrugby"></div>
<div id="mainsdovus"></div>
</div>
</span>


<div id="yaklasanmaclardivi" class="e_active e_noCache ">
<div id="start" class="margin_r_12">
<div id="lastminute"></div>

<?php $ayar_id_ver = userayar('ayar_id'); ?>
<script type="text/javascript">
<? if(canlida_oran_yasaklimi($ayar_id_ver,'1X2','futbol')==0){ ?>Live.agames[16]=1;<? } ?>
<? if(canlida_oran_yasaklimi($ayar_id_ver,'Handikap 1:0','futbol')==0){ ?>Live.agames[54]=2;<? } ?>
<? if(canlida_oran_yasaklimi($ayar_id_ver,'Handikap 2:0','futbol')==0){ ?>Live.agames[502]=3;<? } ?>
<? if(canlida_oran_yasaklimi($ayar_id_ver,'Handikap 0:1','futbol')==0){ ?>Live.agames[52]=9;<? } ?>
<? if(canlida_oran_yasaklimi($ayar_id_ver,'Handikap 0:2','futbol')==0){ ?>Live.agames[501]=10;<? } ?>
<? if(canlida_oran_yasaklimi($ayar_id_ver,'Çifte Şans','futbol')==0){ ?>Live.agames[3187]=16;<? } ?>
<? if(canlida_oran_yasaklimi($ayar_id_ver,'1.Yarı Çifte Şans','futbol')==0){ ?>Live.agames[11748]=17;<? } ?>
<? if(canlida_oran_yasaklimi($ayar_id_ver,'1.Yarı 0.5 Gol Alt Üst','futbol')==0){ ?>Live.agames[7688]=20;<? } ?>
<? if(canlida_oran_yasaklimi($ayar_id_ver,'1.Yarı 1.5 Gol Alt Üst','futbol')==0){ ?>Live.agames[7689]=13;<? } ?>
<? if(canlida_oran_yasaklimi($ayar_id_ver,'1.Yarı 2.5 Gol Alt Üst','futbol')==0){ ?>Live.agames[7890]=22;<? } ?>
<? if(canlida_oran_yasaklimi($ayar_id_ver,'Toplam 0.5 Gol Alt Üst','futbol')==0){ ?>Live.agames[7233]=26;<? } ?>
<? if(canlida_oran_yasaklimi($ayar_id_ver,'Toplam 1.5 Gol Alt Üst','futbol')==0){ ?>Live.agames[1772]=27;<? } ?>
<? if(canlida_oran_yasaklimi($ayar_id_ver,'Toplam 2.5 Gol Alt Üst','futbol')==0){ ?>Live.agames[173]=28;<? } ?>
<? if(canlida_oran_yasaklimi($ayar_id_ver,'Toplam 3.5 Gol Alt Üst','futbol')==0){ ?>Live.agames[8933]=29;<? } ?>
<? if(canlida_oran_yasaklimi($ayar_id_ver,'Toplam 4.5 Gol Alt Üst','futbol')==0){ ?>Live.agames[1791]=30;<? } ?>
<? if(canlida_oran_yasaklimi($ayar_id_ver,'Toplam 5.5 Gol Alt Üst','futbol')==0){ ?>Live.agames[859]=31;<? } ?>
<? if(canlida_oran_yasaklimi($ayar_id_ver,'2.Yarı 0.5 Gol Alt Üst','futbol')==0){ ?>Live.agames[19595]=36;<? } ?>
<? if(canlida_oran_yasaklimi($ayar_id_ver,'2.Yarı 1.5 Gol Alt Üst','futbol')==0){ ?>Live.agames[19596]=37;<? } ?>
<? if(canlida_oran_yasaklimi($ayar_id_ver,'2.Yarı 2.5 Gol Alt Üst','futbol')==0){ ?>Live.agames[19597]=38;<? } ?>
<? if(canlida_oran_yasaklimi($ayar_id_ver,'2.Yarı 3.5 Gol Alt Üst','futbol')==0){ ?>Live.agames[20506]=39;<? } ?>
<? if(canlida_oran_yasaklimi($ayar_id_ver,'Karşılıklı Gol Olurmu ?','futbol')==0){ ?>Live.agames[7824]=45;<? } ?>
<? if(canlida_oran_yasaklimi($ayar_id_ver,'Ev Sahibi Müsabakada Gol Atarmı ?','futbol')==0){ ?>Live.agames[11087]=46;<? } ?>
<? if(canlida_oran_yasaklimi($ayar_id_ver,'Deplasman Müsabakada Gol Atarmı ?','futbol')==0){ ?>Live.agames[11086]=47;<? } ?>
<? if(canlida_oran_yasaklimi($ayar_id_ver,'Toplam Gol Tek / Çift','futbol')==0){ ?>Live.agames[4665]=54;<? } ?>
<? if(canlida_oran_yasaklimi($ayar_id_ver,'1.Yarı Tek / Çift','futbol')==0){ ?>Live.agames[16449]=55;<? } ?>
<? if(canlida_oran_yasaklimi($ayar_id_ver,'1.Yarı Karşılıklı Gol','futbol')==0){ ?>Live.agames[15085]=44;<? } ?>
<? if(canlida_oran_yasaklimi($ayar_id_ver,'Maç Sonucu ve Karşılıklı Gol','futbol')==0){ ?>Live.agames[24392]=138;<? } ?>
<? if(canlida_oran_yasaklimi($ayar_id_ver,'Ev Sahibi 0.5 Gol Alt Üst','futbol')==0){ ?>Live.agames[20083]=56;<? } ?>
<? if(canlida_oran_yasaklimi($ayar_id_ver,'Ev Sahibi 1.5 Gol Alt Üst','futbol')==0){ ?>Live.agames[16454]=57;<? } ?>
<? if(canlida_oran_yasaklimi($ayar_id_ver,'Ev Sahibi 2.5 Gol Alt Üst','futbol')==0){ ?>Live.agames[24138]=58;<? } ?>
<? if(canlida_oran_yasaklimi($ayar_id_ver,'Deplasman 0.5 Gol Alt Üst','futbol')==0){ ?>Live.agames[20084]=62;<? } ?>
<? if(canlida_oran_yasaklimi($ayar_id_ver,'Deplasman 1.5 Gol Alt Üst','futbol')==0){ ?>Live.agames[16455]=63;<? } ?>
<? if(canlida_oran_yasaklimi($ayar_id_ver,'Deplasman 2.5 Gol Alt Üst','futbol')==0){ ?>Live.agames[20085]=64;<? } ?>
<? if(canlida_oran_yasaklimi($ayar_id_ver,'Toplam Kaç Gol Atılır ?','futbol')==0){ ?>Live.agames[2196]=88;<? } ?>
<? if(canlida_oran_yasaklimi($ayar_id_ver,'Ev Sahibi Toplam Kaç Gol Atar ?','futbol')==0){ ?>Live.agames[4726]=96;<? } ?>
<? if(canlida_oran_yasaklimi($ayar_id_ver,'Deplasman Toplam Kaç Gol Atar ?','futbol')==0){ ?>Live.agames[4727]=97;<? } ?>
<? if(canlida_oran_yasaklimi($ayar_id_ver,'1.Yarı Skoru','futbol')==0){ ?>Live.agames[26644]=101;<? } ?>
<? if(canlida_oran_yasaklimi($ayar_id_ver,'Maç Skoru','futbol')==0){ ?>Live.agames[19193]=102;<? } ?>
<? if(canlida_oran_yasaklimi($ayar_id_ver,'Ev Sahibi 1.Yarı 0.5 Gol Alt Üst','futbol')==0){ ?>Live.agames[31316]=129;<? } ?>
<? if(canlida_oran_yasaklimi($ayar_id_ver,'Ev Sahibi 1.Yarı 1.5 Gol Alt Üst','futbol')==0){ ?>Live.agames[31317]=130;<? } ?>
<? if(canlida_oran_yasaklimi($ayar_id_ver,'Ev Sahibi 1.Yarı 2.5 Gol Alt Üst','futbol')==0){ ?>Live.agames[31318]=131;<? } ?>
<? if(canlida_oran_yasaklimi($ayar_id_ver,'Deplasman 1.Yarı 0.5 Gol Alt Üst','futbol')==0){ ?>Live.agames[31319]=133;<? } ?>
<? if(canlida_oran_yasaklimi($ayar_id_ver,'Deplasman 1.Yarı 1.5 Gol Alt Üst','futbol')==0){ ?>Live.agames[31320]=134;<? } ?>
<? if(canlida_oran_yasaklimi($ayar_id_ver,'Deplasman 1.Yarı 2.5 Gol Alt Üst','futbol')==0){ ?>Live.agames[31321]=135;<? } ?>
<? if(canlida_oran_yasaklimi($ayar_id_ver,'Ev Sahibi İlk Yarı Tam Gol Sayısı','futbol')==0){ ?>Live.agames[4720]=139;<? } ?>
<? if(canlida_oran_yasaklimi($ayar_id_ver,'Ev Sahibi İkinci Yarı Tam Gol Sayısı','futbol')==0){ ?>Live.agames[4733]=140;<? } ?>
<? if(canlida_oran_yasaklimi($ayar_id_ver,'Deplasman İlk Yarı Tam Gol Sayısı','futbol')==0){ ?>Live.agames[4721]=141;<? } ?>
<? if(canlida_oran_yasaklimi($ayar_id_ver,'Deplasman İkinci Yarı Tam Gol Sayısı','futbol')==0){ ?>Live.agames[4734]=142;<? } ?>
<? if(canlida_oran_yasaklimi($ayar_id_ver,'Herhangi Bir Takım 1 Gol Farkla Kazanirmi ?','futbol')==0){ ?>Live.agames[19508]=143;<? } ?>
<? if(canlida_oran_yasaklimi($ayar_id_ver,'Herhangi Bir Takım 2 Gol Farkla Kazanirmi ?','futbol')==0){ ?>Live.agames[19509]=144;<? } ?>
<? if(canlida_oran_yasaklimi($ayar_id_ver,'Herhangi Bir Takım 3 Gol Farkla Kazanirmi ?','futbol')==0){ ?>Live.agames[19510]=145;<? } ?>
<? if(canlida_oran_yasaklimi($ayar_id_ver,'1.Yarı Sonucu','futbol')==0){ ?>Live.agames[2488]=18;<? } ?>
<? if(canlida_oran_yasaklimi($ayar_id_ver,'2.Yarı Sonucu','futbol')==0){ ?>Live.agames[4778]=146;<? } ?>
<? if(canlida_oran_yasaklimi($ayar_id_ver,'İlk Yarıda Kaç Gol Olur ?','futbol')==0){ ?>Live.agames[27536]=158;<? } ?>
<? if(canlida_oran_yasaklimi($ayar_id_ver,'2.Yarıda Toplam Kaç Gol Olur ?','futbol')==0){ ?>Live.agames[4732]=147;<? } ?>
<? if(canlida_oran_yasaklimi($ayar_id_ver,'Müsabakada kaç gol atılır? (0-4+)','futbol')==0){ ?>Live.agames[27531]=167;<? } ?>
<? if(canlida_oran_yasaklimi($ayar_id_ver,'Müsabakada kaç gol atılır? (0-5+)','futbol')==0){ ?>Live.agames[27534]=168;<? } ?>
<? if(canlida_oran_yasaklimi($ayar_id_ver,'Müsabakada kaç gol atılır? (0-6+)','futbol')==0){ ?>Live.agames[27535]=169;<? } ?>
<? if(canlida_oran_yasaklimi($ayar_id_ver,'1. yarıda 1.golü hangi takım atar?','futbol')==0){ ?>Live.agames[4956]=85;<? } ?>
<? if(canlida_oran_yasaklimi($ayar_id_ver,'1. yarıda 2.golü hangi takım atar?','futbol')==0){ ?>Live.agames[13461]=127;<? } ?>
<? if(canlida_oran_yasaklimi($ayar_id_ver,'1.golü hangi takım atar?','futbol')==0){ ?>Live.agames[118]=73;<? } ?>
<? if(canlida_oran_yasaklimi($ayar_id_ver,'2.golü hangi takım atar?','futbol')==0){ ?>Live.agames[1344]=74;<? } ?>
<? if(canlida_oran_yasaklimi($ayar_id_ver,'3.golü hangi takım atar?','futbol')==0){ ?>Live.agames[1345]=75;<? } ?>
<? if(canlida_oran_yasaklimi($ayar_id_ver,'4.golü hangi takım atar?','futbol')==0){ ?>Live.agames[1346]=76;<? } ?>
<? if(canlida_oran_yasaklimi($ayar_id_ver,'5.golü hangi takım atar?','futbol')==0){ ?>Live.agames[1347]=77;<? } ?>
<? if(canlida_oran_yasaklimi($ayar_id_ver,'6.golü hangi takım atar?','futbol')==0){ ?>Live.agames[1348]=78;<? } ?>
<? if(canlida_oran_yasaklimi($ayar_id_ver,'Toplam Korner 5.5 Alt/Üst','futbol')==0){ ?>Live.agames[4523]=15000;<? } ?>
<? if(canlida_oran_yasaklimi($ayar_id_ver,'Toplam Korner 6.5 Alt/Üst','futbol')==0){ ?>Live.agames[4524]=15001;<? } ?>
<? if(canlida_oran_yasaklimi($ayar_id_ver,'Toplam Korner 7.5 Alt/Üst','futbol')==0){ ?>Live.agames[4525]=15002;<? } ?>
<? if(canlida_oran_yasaklimi($ayar_id_ver,'Toplam Korner 8.5 Alt/Üst','futbol')==0){ ?>Live.agames[4526]=15003;<? } ?>
<? if(canlida_oran_yasaklimi($ayar_id_ver,'Toplam Korner 9.5 Alt/Üst','futbol')==0){ ?>Live.agames[4527]=15004;<? } ?>
<? if(canlida_oran_yasaklimi($ayar_id_ver,'Toplam Korner 10.5 Alt/Üst','futbol')==0){ ?>Live.agames[4528]=15005;<? } ?>
<? if(canlida_oran_yasaklimi($ayar_id_ver,'Toplam Korner 11.5 Alt/Üst','futbol')==0){ ?>Live.agames[4529]=15006;<? } ?>
<? if(canlida_oran_yasaklimi($ayar_id_ver,'Toplam Korner 12.5 Alt/Üst','futbol')==0){ ?>Live.agames[4530]=15007;<? } ?>
<? if(canlida_oran_yasaklimi($ayar_id_ver,'Toplam Korner 13.5 Alt/Üst','futbol')==0){ ?>Live.agames[4531]=15008;<? } ?>
<? if(canlida_oran_yasaklimi($ayar_id_ver,'Toplam Korner 14.5 Alt/Üst','futbol')==0){ ?>Live.agames[4532]=15009;<? } ?>
<? if(canlida_oran_yasaklimi($ayar_id_ver,'Toplam Korner 15.5 Alt/Üst','futbol')==0){ ?>Live.agames[4533]=15010;<? } ?>
<? if(canlida_oran_yasaklimi($ayar_id_ver,'Toplam Sarı Kart 1.5 Alt/Üst','futbol')==0){ ?>Live.agames[9922]=15011;<? } ?>
<? if(canlida_oran_yasaklimi($ayar_id_ver,'Toplam Sarı Kart 2.5 Alt/Üst','futbol')==0){ ?>Live.agames[9923]=15012;<? } ?>
<? if(canlida_oran_yasaklimi($ayar_id_ver,'Toplam Sarı Kart 3.5 Alt/Üst','futbol')==0){ ?>Live.agames[9924]=15013;<? } ?>
<? if(canlida_oran_yasaklimi($ayar_id_ver,'Toplam Sarı Kart 4.5 Alt/Üst','futbol')==0){ ?>Live.agames[9925]=15014;<? } ?>
<? if(canlida_oran_yasaklimi($ayar_id_ver,'Kırmızı Kart Çıkarmı ?','futbol')==0){ ?>Live.agames[19976]=15015;<? } ?>
<? if(canlida_oran_yasaklimi($ayar_id_ver,'Kaç Penaltı Olur ?','futbol')==0){ ?>Live.agames[1328]=15016;<? } ?>
<? if(canlida_oran_yasaklimi($ayar_id_ver,'1.Takım Toplam Sarı Kart 1.5 Alt/Üst','futbol')==0){ ?>Live.agames[18739]=15017;<? } ?>
<? if(canlida_oran_yasaklimi($ayar_id_ver,'1.Takım Toplam Sarı Kart 2.5 Alt/Üst','futbol')==0){ ?>Live.agames[187398]=15018;<? } ?>
<? if(canlida_oran_yasaklimi($ayar_id_ver,'1.Takım Toplam Sarı Kart 3.5 Alt/Üst','futbol')==0){ ?>Live.agames[187399]=15019;<? } ?>
<? if(canlida_oran_yasaklimi($ayar_id_ver,'2.Takım Toplam Sarı Kart 1.5 Alt/Üst','futbol')==0){ ?>Live.agames[18740]=15020;<? } ?>
<? if(canlida_oran_yasaklimi($ayar_id_ver,'2.Takım Toplam Sarı Kart 2.5 Alt/Üst','futbol')==0){ ?>Live.agames[187408]=15021;<? } ?>
<? if(canlida_oran_yasaklimi($ayar_id_ver,'2.Takım Toplam Sarı Kart 3.5 Alt/Üst','futbol')==0){ ?>Live.agames[187409]=15022;<? } ?>
<? if(canlida_oran_yasaklimi($ayar_id_ver,'Sarı Kart Tek/Çift','futbol')==0){ ?>Live.agames[17929]=15023;<? } ?>
<? if(canlida_oran_yasaklimi($ayar_id_ver,'Hangi Takım Çok Sarı Kart Yer ?','futbol')==0){ ?>Live.agames[4753]=15024;<? } ?>
<? if(canlida_oran_yasaklimi($ayar_id_ver,'1.Takım Toplam Korner 2.5 Alt/Üst','futbol')==0){ ?>Live.agames[4784]=15025;<? } ?>
<? if(canlida_oran_yasaklimi($ayar_id_ver,'1.Takım Toplam Korner 3.5 Alt/Üst','futbol')==0){ ?>Live.agames[47841]=15026;<? } ?>
<? if(canlida_oran_yasaklimi($ayar_id_ver,'1.Takım Toplam Korner 4.5 Alt/Üst','futbol')==0){ ?>Live.agames[47842]=15027;<? } ?>
<? if(canlida_oran_yasaklimi($ayar_id_ver,'1.Takım Toplam Korner 5.5 Alt/Üst','futbol')==0){ ?>Live.agames[47843]=15028;<? } ?>
<? if(canlida_oran_yasaklimi($ayar_id_ver,'1.Takım Toplam Korner 6.5 Alt/Üst','futbol')==0){ ?>Live.agames[47844]=15029;<? } ?>
<? if(canlida_oran_yasaklimi($ayar_id_ver,'1.Takım Toplam Korner 7.5 Alt/Üst','futbol')==0){ ?>Live.agames[47845]=15030;<? } ?>
<? if(canlida_oran_yasaklimi($ayar_id_ver,'1.Takım Toplam Korner 8.5 Alt/Üst','futbol')==0){ ?>Live.agames[47846]=15031;<? } ?>
<? if(canlida_oran_yasaklimi($ayar_id_ver,'1.Takım Toplam Korner 9.5 Alt/Üst','futbol')==0){ ?>Live.agames[47847]=15032;<? } ?>
<? if(canlida_oran_yasaklimi($ayar_id_ver,'1.Takım Toplam Korner 10.5 Alt/Üst','futbol')==0){ ?>Live.agames[47848]=15033;<? } ?>
<? if(canlida_oran_yasaklimi($ayar_id_ver,'2.Takım Toplam Korner 2.5 Alt/Üst','futbol')==0){ ?>Live.agames[4785]=15034;<? } ?>
<? if(canlida_oran_yasaklimi($ayar_id_ver,'2.Takım Toplam Korner 3.5 Alt/Üst','futbol')==0){ ?>Live.agames[47851]=15035;<? } ?>
<? if(canlida_oran_yasaklimi($ayar_id_ver,'2.Takım Toplam Korner 4.5 Alt/Üst','futbol')==0){ ?>Live.agames[47852]=15036;<? } ?>
<? if(canlida_oran_yasaklimi($ayar_id_ver,'2.Takım Toplam Korner 5.5 Alt/Üst','futbol')==0){ ?>Live.agames[47853]=15037;<? } ?>
<? if(canlida_oran_yasaklimi($ayar_id_ver,'2.Takım Toplam Korner 6.5 Alt/Üst','futbol')==0){ ?>Live.agames[47854]=15038;<? } ?>
<? if(canlida_oran_yasaklimi($ayar_id_ver,'2.Takım Toplam Korner 7.5 Alt/Üst','futbol')==0){ ?>Live.agames[47855]=15039;<? } ?>
<? if(canlida_oran_yasaklimi($ayar_id_ver,'2.Takım Toplam Korner 8.5 Alt/Üst','futbol')==0){ ?>Live.agames[47856]=15040;<? } ?>
<? if(canlida_oran_yasaklimi($ayar_id_ver,'2.Takım Toplam Korner 9.5 Alt/Üst','futbol')==0){ ?>Live.agames[47857]=15041;<? } ?>
<? if(canlida_oran_yasaklimi($ayar_id_ver,'2.Takım Toplam Korner 10.5 Alt/Üst','futbol')==0){ ?>Live.agames[47858]=15042;<? } ?>
<? if(canlida_oran_yasaklimi($ayar_id_ver,'Korner Tek/Çift','futbol')==0){ ?>Live.agames[17925]=15043;<? } ?>
<? if(canlida_oran_yasaklimi($ayar_id_ver,'Hangi Takım Daha Çok Korner Kullanır ?','futbol')==0){ ?>Live.agames[4793]=15044;<? } ?>



<? if(canlida_oran_yasaklimi($ayar_id_ver,'1X2','basketbol')==0){ ?>Live.agames[15025]=1;<? } ?>
<? if(canlida_oran_yasaklimi($ayar_id_ver,'1X2(1.YARI)','basketbol')==0){ ?>Live.agames[19849]=18;<? } ?>
<? if(canlida_oran_yasaklimi($ayar_id_ver,'1X2(2.YARI)','basketbol')==0){ ?>Live.agames[31511]=146;<? } ?>
<? if(canlida_oran_yasaklimi($ayar_id_ver,'Kim Kazanır','basketbol')==0){ ?>Live.agames[66]=170;<? } ?>
<? if(canlida_oran_yasaklimi($ayar_id_ver,'1.Çeyrek Kim Kazanır','basketbol')==0){ ?>Live.agames[14610]=194;<? } ?>
<? if(canlida_oran_yasaklimi($ayar_id_ver,'2.Çeyrek Kim Kazanır','basketbol')==0){ ?>Live.agames[20127]=195;<? } ?>
<? if(canlida_oran_yasaklimi($ayar_id_ver,'3.Çeyrek Kim Kazanır','basketbol')==0){ ?>Live.agames[20128]=182;<? } ?>
<? if(canlida_oran_yasaklimi($ayar_id_ver,'4.Çeyrek Kim Kazanır','basketbol')==0){ ?>Live.agames[20129]=196;<? } ?>
<? if(canlida_oran_yasaklimi($ayar_id_ver,'Toplam Skor Alt/Üst','basketbol')==0){ ?>Live.agames[102]=172;<? } ?>
<? if(canlida_oran_yasaklimi($ayar_id_ver,'1.Çeyrek Toplam Alt/Üst','basketbol')==0){ ?>Live.agames[7356]=181;<? } ?>
<? if(canlida_oran_yasaklimi($ayar_id_ver,'2.Çeyrek Toplam Alt/Üst','basketbol')==0){ ?>Live.agames[17588]=185;<? } ?>
<? if(canlida_oran_yasaklimi($ayar_id_ver,'3.Çeyrek Toplam Alt/Üst','basketbol')==0){ ?>Live.agames[17589]=180;<? } ?>
<? if(canlida_oran_yasaklimi($ayar_id_ver,'4.Çeyrek Toplam Alt/Üst','basketbol')==0){ ?>Live.agames[17590]=186;<? } ?>
<? if(canlida_oran_yasaklimi($ayar_id_ver,'Handikap','basketbol')==0){ ?>Live.agames[7699]=184;<? } ?>
<? if(canlida_oran_yasaklimi($ayar_id_ver,'1.Çeyrek Handikap','basketbol')==0){ ?>Live.agames[7332]=2801;<? } ?>
<? if(canlida_oran_yasaklimi($ayar_id_ver,'2.Çeyrek Handikap','basketbol')==0){ ?>Live.agames[7357]=2802;<? } ?>
<? if(canlida_oran_yasaklimi($ayar_id_ver,'3.Çeyrek Handikap','basketbol')==0){ ?>Live.agames[11306]=2803;<? } ?>
<? if(canlida_oran_yasaklimi($ayar_id_ver,'4.Çeyrek Handikap','basketbol')==0){ ?>Live.agames[2837]=2804;<? } ?>
<? if(canlida_oran_yasaklimi($ayar_id_ver,'1.Çeyrek Toplam Tek/Çift','basketbol')==0){ ?>Live.agames[12140]=162;<? } ?>
<? if(canlida_oran_yasaklimi($ayar_id_ver,'2.Çeyrek Toplam Tek/Çift','basketbol')==0){ ?>Live.agames[12141]=163;<? } ?>
<? if(canlida_oran_yasaklimi($ayar_id_ver,'3.Çeyrek Toplam Tek/Çift','basketbol')==0){ ?>Live.agames[12142]=164;<? } ?>
<? if(canlida_oran_yasaklimi($ayar_id_ver,'4.Çeyrek Toplam Tek/Çift','basketbol')==0){ ?>Live.agames[12143]=165;<? } ?>
<? if(canlida_oran_yasaklimi($ayar_id_ver,'Toplam Tek/Çift','basketbol')==0){ ?>Live.agames[7970]=148;<? } ?>


//BASKETBOL İÇİN//
<? if(canlida_oran_yasaklimi($ayar_id_ver,'1X2(1.Çeyrek)','basketbol')==0){ ?>Live.agames[31512]=2805;<? } ?>
<? if(canlida_oran_yasaklimi($ayar_id_ver,'1X2(2.Çeyrek)','basketbol')==0){ ?>Live.agames[31513]=2806;<? } ?>
<? if(canlida_oran_yasaklimi($ayar_id_ver,'1X2(3.Çeyrek)','basketbol')==0){ ?>Live.agames[31514]=2807;<? } ?>
<? if(canlida_oran_yasaklimi($ayar_id_ver,'1X2(4.Çeyrek)','basketbol')==0){ ?>Live.agames[31515]=2808;<? } ?>
<? if(canlida_oran_yasaklimi($ayar_id_ver,'1.Takım Toplam Alt/Üst','basketbol')==0){ ?>Live.agames[12426]=2809;<? } ?>
<? if(canlida_oran_yasaklimi($ayar_id_ver,'2.Takım Toplam Alt/Üst','basketbol')==0){ ?>Live.agames[18191]=2810;<? } ?>
<? if(canlida_oran_yasaklimi($ayar_id_ver,'1.Takım 1.Yarı Toplam Alt/Üst','basketbol')==0){ ?>Live.agames[12811]=2811;<? } ?>
<? if(canlida_oran_yasaklimi($ayar_id_ver,'2.Takım 1.Yarı Toplam Alt/Üst','basketbol')==0){ ?>Live.agames[18188]=2812;<? } ?>
<? if(canlida_oran_yasaklimi($ayar_id_ver,'1.Yarı Handikap','basketbol')==0){ ?>Live.agames[7698]=2800;<? } ?>
<? if(canlida_oran_yasaklimi($ayar_id_ver,'2.Yarı Handikap','basketbol')==0){ ?>Live.agames[11305]=2813;<? } ?>
<? if(canlida_oran_yasaklimi($ayar_id_ver,'1.Yarı Toplam Tek/Çift','basketbol')==0){ ?>Live.agames[12173]=149;<? } ?>
<? if(canlida_oran_yasaklimi($ayar_id_ver,'2.Yarı Toplam Tek/Çift','basketbol')==0){ ?>Live.agames[12174]=2814;<? } ?>
<? if(canlida_oran_yasaklimi($ayar_id_ver,'1.Yarı Kim Kazanır','basketbol')==0){ ?>Live.agames[13974]=2815;<? } ?>
<? if(canlida_oran_yasaklimi($ayar_id_ver,'2.Yarı Kim Kazanır','basketbol')==0){ ?>Live.agames[7764]=183;<? } ?>
//BASKETBOL İÇİN//

//VOLEYBOL İÇİN//
<? if(canlida_oran_yasaklimi($ayar_id_ver,'Kim Kazanır','voleybol')==0){ ?>Live.agames[1545]=6000;<? } ?>
<? if(canlida_oran_yasaklimi($ayar_id_ver,'1.Seti Kim Kazanır ?','voleybol')==0){ ?>Live.agames[1547]=6001;<? } ?>
<? if(canlida_oran_yasaklimi($ayar_id_ver,'2.Seti Kim Kazanır ?','voleybol')==0){ ?>Live.agames[8263]=6002;<? } ?>
<? if(canlida_oran_yasaklimi($ayar_id_ver,'3.Seti Kim Kazanır ?','voleybol')==0){ ?>Live.agames[1550]=6003;<? } ?>
<? if(canlida_oran_yasaklimi($ayar_id_ver,'4.Seti Kim Kazanır ?','voleybol')==0){ ?>Live.agames[1551]=6004;<? } ?>
<? if(canlida_oran_yasaklimi($ayar_id_ver,'Set bahisi (5 maç üzerinden)','voleybol')==0){ ?>Live.agames[499]=6005;<? } ?>
<? if(canlida_oran_yasaklimi($ayar_id_ver,'Toplam Kaç Set Oynanır ?','voleybol')==0){ ?>Live.agames[6355]=6006;<? } ?>
<? if(canlida_oran_yasaklimi($ayar_id_ver,'1.Takım Toplam Sayı Alt/Üst','voleybol')==0){ ?>Live.agames[31887]=6007;<? } ?>
<? if(canlida_oran_yasaklimi($ayar_id_ver,'2.Takım Toplam Sayı Alt/Üst','voleybol')==0){ ?>Live.agames[31894]=6008;<? } ?>
<? if(canlida_oran_yasaklimi($ayar_id_ver,'1.Takım 1.Set Toplam Sayı Alt/Üst','voleybol')==0){ ?>Live.agames[31881]=6009;<? } ?>
<? if(canlida_oran_yasaklimi($ayar_id_ver,'2.Takım 1.Set Toplam Sayı Alt/Üst','voleybol')==0){ ?>Live.agames[31888]=6010;<? } ?>
<? if(canlida_oran_yasaklimi($ayar_id_ver,'1.Takım 2.Set Toplam Sayı Alt/Üst','voleybol')==0){ ?>Live.agames[31882]=6011;<? } ?>
<? if(canlida_oran_yasaklimi($ayar_id_ver,'2.Takım 2.Set Toplam Sayı Alt/Üst','voleybol')==0){ ?>Live.agames[31889]=6012;<? } ?>
<? if(canlida_oran_yasaklimi($ayar_id_ver,'1.Takım 3.Set Toplam Sayı Alt/Üst','voleybol')==0){ ?>Live.agames[31883]=6013;<? } ?>
<? if(canlida_oran_yasaklimi($ayar_id_ver,'2.Takım 3.Set Toplam Sayı Alt/Üst','voleybol')==0){ ?>Live.agames[31890]=6014;<? } ?>
<? if(canlida_oran_yasaklimi($ayar_id_ver,'1.Takım 4.Set Toplam Sayı Alt/Üst','voleybol')==0){ ?>Live.agames[31884]=6015;<? } ?>
<? if(canlida_oran_yasaklimi($ayar_id_ver,'2.Takım 4.Set Toplam Sayı Alt/Üst','voleybol')==0){ ?>Live.agames[31891]=6016;<? } ?>
<? if(canlida_oran_yasaklimi($ayar_id_ver,'Toplam Sayı Alt/Üst','voleybol')==0){ ?>Live.agames[9210]=6017;<? } ?>
<? if(canlida_oran_yasaklimi($ayar_id_ver,'Toplam Sayı Tek/Çift','voleybol')==0){ ?>Live.agames[14437]=6018;<? } ?>
<? if(canlida_oran_yasaklimi($ayar_id_ver,'1.Set Toplam Sayı Tek/Çift','voleybol')==0){ ?>Live.agames[11950]=6019;<? } ?>
<? if(canlida_oran_yasaklimi($ayar_id_ver,'2.Set Toplam Sayı Tek/Çift','voleybol')==0){ ?>Live.agames[11951]=6020;<? } ?>
<? if(canlida_oran_yasaklimi($ayar_id_ver,'3.Set Toplam Sayı Tek/Çift','voleybol')==0){ ?>Live.agames[11952]=6021;<? } ?>
<? if(canlida_oran_yasaklimi($ayar_id_ver,'4.Set Toplam Sayı Tek/Çift','voleybol')==0){ ?>Live.agames[11953]=6022;<? } ?>
<? if(canlida_oran_yasaklimi($ayar_id_ver,'Müsabaka 5.Set Sürermi','voleybol')==0){ ?>Live.agames[14484]=6023;<? } ?>
//VOLEYBOL İÇİN//

//BUZHOKEYİ İÇİN//
<? if(canlida_oran_yasaklimi($ayar_id_ver,'1X2','buzhokeyi')==0){ ?>Live.agames[51]=6024;<? } ?>
<? if(canlida_oran_yasaklimi($ayar_id_ver,'Cifte Sans','buzhokeyi')==0){ ?>Live.agames[14464]=6025;<? } ?>
<? if(canlida_oran_yasaklimi($ayar_id_ver,'Hangi periyod daha cok gol olur?','buzhokeyi')==0){ ?>Live.agames[2771]=6026;<? } ?>
//BUZHOKEYİ İÇİN//

//MASA TENİSİ İÇİN//
<? if(canlida_oran_yasaklimi($ayar_id_ver,'Kim Kazanır','masatenis')==0){ ?>Live.agames[5421]=6027;<? } ?>
<? if(canlida_oran_yasaklimi($ayar_id_ver,'Set Bahisi','masatenis')==0){ ?>Live.agames[17547]=6028;<? } ?>
<? if(canlida_oran_yasaklimi($ayar_id_ver,'1.Seti Kim Kazanır','masatenis')==0){ ?>Live.agames[5424]=6029;<? } ?>
<? if(canlida_oran_yasaklimi($ayar_id_ver,'2.Seti Kim Kazanır','masatenis')==0){ ?>Live.agames[8261]=6030;<? } ?>
<? if(canlida_oran_yasaklimi($ayar_id_ver,'3.Seti Kim Kazanır','masatenis')==0){ ?>Live.agames[5426]=6031;<? } ?>
<? if(canlida_oran_yasaklimi($ayar_id_ver,'4.Seti Kim Kazanır','masatenis')==0){ ?>Live.agames[5427]=6032;<? } ?>
<? if(canlida_oran_yasaklimi($ayar_id_ver,'5.Seti Kim Kazanır','masatenis')==0){ ?>Live.agames[5428]=6033;<? } ?>
//MASA TENİSİ İÇİN//

Live.agames[5421]=170;Live.agames[2]=12;Live.agames[17547]=1511;Live.agames[3]=13;Live.agames[7891]=13;Live.agames[20087]=59;Live.agames[20088]=65;Live.agames[20090]=66;Live.agames[5424]=1500;Live.agames[8261]=1503;Live.agames[5426]=1505;Live.agames[62]=170;Live.agames[480]=1505;Live.agames[79]=1502;Live.agames[8695]=1503;Live.agames[635]=11;Live.agames[12119]=19;Live.agames[7689]=21;Live.agames[27542]=24;Live.agames[27543]=25;Live.agames[7891]=23;Live.agames[313]=32;Live.agames[13462]=128;Live.agames[21077]=1800;Live.agames[21078]=1801;Live.agames[21079]=1802;Live.agames[21080]=1803;Live.agames[21081]=1804;Live.agames[21082]=1805;Live.agames[21056]=1806;Live.agames[21057]=1807;Live.agames[21058]=1808;Live.agames[21059]=1809;Live.agames[21060]=1810;Live.agames[21061]=1811;Live.agames[21062]=1812;Live.agames[21063]=1813;Live.agames[21064]=1814;Live.agames[21065]=1815;Live.agames[21092]=1816;Live.agames[21093]=1817;Live.agames[21094]=1818;Live.agames[21095]=1819;Live.agames[21096]=1820;Live.agames[21097]=1821;Live.agames[21098]=1822;Live.agames[21099]=1823;Live.agames[21101]=1824;Live.agames[21102]=1825;

Live.lmy = <?=userayar('canli_ilkyari_yayindan_kaldir');?>;
Live.lm = <?=userayar('canli_yayindan_kaldir');?>;
Live.maxliveodd = <?=userayar('orankorumamaxoran');?>;
Live.orktr = <?=userayar('canlifutbolkademe');?>;
Live.cborktr = <?=userayar('canlibasketbolkademe');?>;
Live.cmtorktr = <?=userayar('canlimasateniskademe');?>;
Live.ctorktr = <?=userayar('canliteniskademe');?>;
Live.cvorktr = <?=userayar('canlivoleybolkademe');?>;
Live.cbuzorktr = <?=userayar('canlibuzhokeyikademe');?>;
var livematch = new Array();
var livematchb = new Array();
var livefootballmainint;


function canliekle(tahminadi,secenek,oran,eventid,spid) {
var rand = Math.random();

if(spid=="4"){
$.get('ajax.php?a=canliekle&rand=' + rand + '&tahminadi=' + tahminadi + '&secenek=' + secenek + '&oran=' + oran + '&eventid=' + eventid + '', function (data) {
if (data == "2") {
failcont('<?=getTranslation('failconthata')?>', '<?=getTranslation('mobilmacsuanaskida')?>');
} else if (data == "1") {
kuponguncelle();
}
});
} else if(spid=="7"){
$.get('ajax.php?a=canliekleb&rand=' + rand + '&tahminadi=' + tahminadi + '&secenek=' + secenek + '&oran=' + oran + '&eventid=' + eventid + '', function (data) {
if (data == "2") {
failcont('<?=getTranslation('failconthata')?>', '<?=getTranslation('mobilmacsuanaskida')?>');
} else if (data == "1") {
kuponguncelle();
}
});
} else if(spid=="5"){
$.get('ajax.php?a=canlieklet&rand=' + rand + '&tahminadi=' + tahminadi + '&secenek=' + secenek + '&oran=' + oran + '&eventid=' + eventid + '', function (data) {
if (data == "2") {
alert('<?=getTranslation('failconthata')?>', '<?=getTranslation('mobilmacsuanaskida')?>');
} else if (data == "1") {
kuponguncelle();
}
});
} else if(spid=="18"){
$.get('ajax.php?a=canlieklev&rand=' + rand + '&tahminadi=' + tahminadi + '&secenek=' + secenek + '&oran=' + oran + '&eventid=' + eventid + '', function (data) {
if (data == "2") {
failcont('<?=getTranslation('failconthata')?>', '<?=getTranslation('mobilmacsuanaskida')?>');
} else if (data == "1") {
kuponguncelle();
}
});
} else if(spid=="12"){
$.get('ajax.php?a=canlieklebuz&rand=' + rand + '&tahminadi=' + tahminadi + '&secenek=' + secenek + '&oran=' + oran + '&eventid=' + eventid + '', function (data) {
if (data == "2") {
failcont('<?=getTranslation('failconthata')?>', '<?=getTranslation('mobilmacsuanaskida')?>');
} else if (data == "1") {
kuponguncelle();
}
});
} else if(spid=="56"){
$.get('ajax.php?a=canlieklemt&rand=' + rand + '&tahminadi=' + tahminadi + '&secenek=' + secenek + '&oran=' + oran + '&eventid=' + eventid + '', function (data) {
if (data == "2") {
failcont('<?=getTranslation('failconthata')?>', '<?=getTranslation('mobilmacsuanaskida')?>');
} else if (data == "1") {
kuponguncelle();
}
});
}

}

$(document).ready(function(){
Live.Play2();
kuponguncelle(1);
});

function loadbulten(val) {
$("#lastminute").html('<div id="preloader"><div class="cssload-loader"><div class="cssload-side"></div><div class="cssload-side"></div><div class="cssload-side"></div><div class="cssload-side"></div><div class="cssload-side"></div><div class="cssload-side"></div><div class="cssload-side"></div><div class="cssload-side"></div></div></div>');
var bultentip = $("#bultentip").val(); 
var rand = Math.random();
$.get('ajax.php?a=yaklasanmaclar&rand='+rand+'&bultentip='+bultentip+'',function(data) {
$("#lastminute").html(data);
});
}
loadbulten(10);
</script>


</div>
</div>
</div>
</div>

<?php include 'sag.php'; ?>
<? include 'footer.php'; ?>

</body>
</html>