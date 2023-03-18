
<?php
session_start();
include 'db.php';

function domain($domain){
    preg_match('#(?:https://)?(?:www\.)?([a-zA-Z0-9\-\.]+)/?#is', $domain, $d);
    return $d[1];
}

$toplam_kullanici = sed_sql_numrows(sed_sql_query("select hesap_sahibi_id,root from kullanici where hesap_sahibi_id='6731' and root='0'"));
$admin_limiti = 100000;

if(isset($_POST['submit'])) {

$username = pd("user");
$password = pd("sifre");
$email = pd("emailadres");
$hatirlatmaad = pd("hatirlatmaad");
$websitesi = domain($_SERVER["SERVER_NAME"]);
$kontrol = sed_sql_query("select * from kullanici where username='$username'");
$zaman = time();
$telefon = pd("ceptelefonu");
//$site = $_SERVER['HTTP_HOST']

$hesapla_limit = $admin_limiti-$toplam_kullanici;

if(strlen($username)<4) {
$onaylandi = 111;
} else if(sed_sql_numrows($kontrol)>0) { 
$onaylandi = 3;
} else if(empty($password)) {
$onaylandi = 4;
} 
else if($hesapla_limit>0) {

sed_sql_query("INSERT INTO kullanici SET 
username='".sed_sql_prep($username)."',
password='".sed_sql_prep($password)."',
hatirlatmaad='testkasa üyesi',
durum='1',
hesap_sahibi_user='testkasa',
hesap_sahibi_id='6732',
hesap_root_id='1',
hesap_root_root_id='2',
wkyetki='3',
wkdurum='1',
alt_sinir='0',
olusturma_zaman='".$zaman."',
site_adi='".sed_sql_prep($email)."',
ceptelefonu='".sed_sql_prep($telefon)."',
websitesi='".sed_sql_prep($websitesi)."'
");
//
$bakiye = pd("bakiye");
if($bakiye>0 && $bakiye<=$ub['bakiye']) {
$buid = bilgi("select id,hesap_sahibi_id from kullanici where hesap_sahibi_id='6732' order by id desc limit 1");
hesap_hareketweb('ekle',$username,$buid['id'],$ub['id'],$bakiye,'Hesap açılırken eklendi.');
}

$onaylandi = 1;

} else {

$onaylandi = 2;

}

}
?>
<?php include 'header2.php'; ?>
<style>



body {
	font-family: helvetica,sans-serif; display: table;
	width: 100%; height: 100%;
}
.main {
	display: table-cell;
	vertical-align: middle;
}
input {
	padding: 2px;
	font-size: 1em;
	width: 130px;
}
input[type="submit"] {
	margin: 5px;
}
.row {
	margin: auto;
}
.left {
	text-align: right;
	padding-right: 7px;
	vertical-align: middle;
}
.left, .right {
	display: table-cell;
	width: 120px;
}
.submitButton {
	padding: 5px;
}
.error {
	transition: 2s opacity;
	color: red;
	font-size:16px;
	display: table;
}
.invisible {
	opacity: 0;
}


*, *:before, *:after {
box-sizing: border-box;
margin:0; padding:0;
}

html, body {
height: 100%;
width: 100%;
overflow: hidden;
}

.container {
padding: 1px 0;
height: 100%;
width: 100%;
background-image: url("img/main_bg.jpg");
background-size: cover;
color: #fff;
font-family: "Comfortaa", "Helvetica", sans-serif;
}

.login {
max-width: 280px;
min-height: 500px;
margin: 30px auto;
background-color: rgba(10,10,10,.68);
}

.login-icon-field {
height: 250px;
width: 100%;
background-color: #F64835
}

.login-icon {
margin: 50px 65px;
}

.login-form {
padding: 8px 20px 20px;
height: 120px;
width: 100%;
/*background-color: green;*/
}

.row {
    
}

.username-row {
position: relative;
height: 40px;
/*background-color: pink;*/
border-bottom: 1px solid;
margin-bottom: 10px;
}

.password-row {
position: relative;
height: 40px;
/* background-color: grey;*/
border-bottom: 1px solid;
}

.password-icon,
.user-icon {
margin: 5px;
}

.password-icon .key-path,
.user-icon .user-path{
fill: rgba(10,10,10,0);
stroke: #fff;
stroke-width: 3.5;
stroke-linecap: round;
stroke-linejoin: round;
stroke-miterlimit: 10;
stroke-dasharray: 300;
stroke-dashoffset: 300;
-webkit-animation: dash 3s .3s linear forwards;
animation: dash 3s .3s linear forwards;
}

.user-icon .user-path {
-webkit-animation: dash 3s .8s linear forwards;
animation: dash 3s .8s linear forwards;
}

input {
position: absolute;
width: 195px;
height: 30px;
margin: 5px 0;
background: transparent;
border: none;
color:#fff;
}

input:focus,
button:focus {
outline: none;
}

input::-webkit-input-placeholder {
color: rgba(255,255,255,.4);
}

input::-moz-placeholder {
color: rgba(255,255,255,.4);
}

.call-to-action {
margin: 22px 0;
height: 130px;
width: 100%;
/*background-color: blue;*/
}

button {
display: block;
width: 240px;
height: 40px;
padding: 0;
margin: 10px 20px 10px;
font-weight: 700;
color: #fff;
background-color: #F64835;
border: none;
border-radius: 20px;
transition: background-color .10s ease-in-out;
-webkit-user-select:none;
-moz-user-select:none;
-ms-user-select:none;
user-select:none;
}

button:hover {
background-color: #26d69a;
}

button:active {
background-color: #1eaa7a;
}

p {
display: inline-block;
width: 200px;
margin: 0 40px;
font-size: .8rem;
color: rgba(255,255,255,.4);
/*background-color: yellow;*/
}

p a {
color: #fff;
}

label,
p a:hover {
-webkit-cursor: pointer;
cursor: pointer;
}

@-webkit-keyframes dash {
to {
    stroke-dashoffset: 0;
}
}

@keyframes  dash {
to {
    stroke-dashoffset: 0;
}
}
</style>


<div class="main">
<div class="container">









<? if($admin_limiti+$toplam_kullanici<1) { ?>
<? } else { ?>

 

<form method="post" id="loginform" style="width: 100%; height: 100%; margin: 0 auto;">
<div class="container">
    <div id="login" class="login">
      
	  
	  <div id="login_layer">
       <div class="breadcrumb-item"><?=getTranslation('yeniyerler_kasa143')?></div>
		
		<? if($onaylandi==1) { ?>
<div class="alert alert-success mb-0" id="success" style="display:block;"><?=getTranslation('yeniyerler_kasa144')?></div>
<? } else if($onaylandi==2) { ?>
<div class="alert alert-danger mb-0" id="error" style="display:block;"><?=$error_string?></div>
<? } else if($onaylandi==3) { ?>
<div class="alert alert-info mb-0" id="info" style="display:block;"><?=getTranslation('yeniyerler_kasa146')?></div>
<? } else if($onaylandi==4) { ?>
<div class="alert alert-danger mb-0" id="error" style="display:block;"><?=getTranslation('yeniyerler_kasa147')?></div>
<? } else if($onaylandi==111) { ?>
<div class="alert alert-info mb-0" id="info" style="display:block;">En az 4 Harfli Kullanıcı Adı Belirlemelisiniz.</div>
<? } ?>
        </div>  
	  
	  
	  
        <form id="dealer-form" method="post" name="newu">
            <div class="login-form">
                <div class="username-row row">
                    <label for="username_input">
                    <svg version="1.1" class="user-icon" x="0px" y="0px"
                    viewBox="-255 347 100 100" xml:space="preserve" height="36px" width="30px">
                    <path class="user-path" d="
                    M-203.7,350.3c-6.8,0-12.4,6.2-12.4,13.8c0,4.5,2.4,8.6,5.4,11.1c0,0,2.2,1.6,1.9,3.7c-0.2,1.3-1.7,2.8-2.4,2.8c-0.7,0-6.2,0-6.2,0
                    c-6.8,0-12.3,5.6-12.3,12.3v2.9v14.6c0,0.8,0.7,1.5,1.5,1.5h10.5h1h13.1h13.1h1h10.6c0.8,0,1.5-0.7,1.5-1.5v-14.6v-2.9
                    c0-6.8-5.6-12.3-12.3-12.3c0,0-5.5,0-6.2,0c-0.8,0-2.3-1.6-2.4-2.8c-0.4-2.1,1.9-3.7,1.9-3.7c2.9-2.5,5.4-6.5,5.4-11.1
                    C-191.3,356.5-196.9,350.3-203.7,350.3L-203.7,350.3z"/>
                    </svg>
                    </label>
                    <input type="text" id="username_input" name="user" class="username-input" placeholder="Username" required></input>
                </div>
                <div class="password-row row">
                    <label for="password_input">
                    <svg version="1.1" class="password-icon" x="0px" y="0px"
                    viewBox="-255 347 100 100" height="36px" width="30px">
                    <path class="key-path" d="M-191.5,347.8c-11.9,0-21.6,9.7-21.6,21.6c0,4,1.1,7.8,3.1,11.1l-26.5,26.2l-0.9,10h10.6l3.8-5.7l6.1-1.1
                    l1.6-6.7l7.1-0.3l0.6-7.2l7.2-6.6c2.8,1.3,5.8,2,9.1,2c11.9,0,21.6-9.7,21.6-21.6C-169.9,357.4-179.6,347.8-191.5,347.8z"/>
                    </svg>
                    </label>
                    <input type="password" id="password_input" name="sifre" class="password-input" class="input" placeholder="Password" required></input>
                    
                </div>
				
				<div class="password-row row">
                    <label for="password_input">
                    <svg version="1.1" class="password-icon" x="0px" y="0px"
                    viewBox="-255 347 100 100" height="36px" width="30px">
                    <path class="key-path" d="M-191.5,347.8c-11.9,0-21.6,9.7-21.6,21.6c0,4,1.1,7.8,3.1,11.1l-26.5,26.2l-0.9,10h10.6l3.8-5.7l6.1-1.1
                    l1.6-6.7l7.1-0.3l0.6-7.2l7.2-6.6c2.8,1.3,5.8,2,9.1,2c11.9,0,21.6-9.7,21.6-21.6C-169.9,357.4-179.6,347.8-191.5,347.8z"/>
                    </svg>
                    </label>
                    <input type="text" name="ceptelefonu" class="username_input" class="input" placeholder="Telefon" required></input>
                    
                </div>
				
				
				
				
				 <div class="password-row row">
                    <label for="password_input">
                    <svg version="1.1" class="password-icon" x="0px" y="0px"
                    viewBox="-255 347 100 100" height="36px" width="30px">
                    <path class="key-path" d="M-191.5,347.8c-11.9,0-21.6,9.7-21.6,21.6c0,4,1.1,7.8,3.1,11.1l-26.5,26.2l-0.9,10h10.6l3.8-5.7l6.1-1.1
                    l1.6-6.7l7.1-0.3l0.6-7.2l7.2-6.6c2.8,1.3,5.8,2,9.1,2c11.9,0,21.6-9.7,21.6-21.6C-169.9,357.4-179.6,347.8-191.5,347.8z"/>
                    </svg>
                    </label>
                    <input type="text" name="emailadres" class="username_input" class="input" placeholder="Email" required></input>
                    
                </div>
				
				<input type="hidden" class="form-control" maxlength="150" name="hatirlatmaad" id="huser" value="testkasa user" autocomplete="off">
				
				
            </div>
			<br /> <br /><br />
            <div class="call-to-action">
            <button type="submit" class="btn btn-success" name="submit" id="kaydet">Kaydet</button>
                <div style="text-align: center;">
                </div>
        </form>
		
        <p></p>
        </div>
		
 </div>


<script>
function randomize(length, chars){
if (!chars) {
var chars = "abcdefghijklmnopqrstuvyz1234567890";
}
var str = "";
for (var x = 0; x < length; x++) {
var i = Math.floor(Math.random() * chars.length);
str += chars.charAt(i);
}
return str;
}

function generatePassword(){
var passwordChars = randomize(6, 'abcdefghikmnprstuvyz1234567890');
$('#sifre').val(passwordChars);
}
generatePassword();
$(document).ready(function(e) {
    $("#kaydet").click(function(e) {
    var f = self.document.newu;
	if(f.user.value.length<2) { alertify.error('<?=getTranslation('playersaddusersuper23')?>'); f.user.select(); } else
	if(f.sifre.value.length<1) { alertify.error('<?=getTranslation('playersaddusersuper24')?>'); f.sifre.focus(); } else {
	f.submit();
	}
    });
});
</script>

<script>
$(document).ready(function(e) {
    $("input").attr('autocomplete','off');
});
</script>

<? } ?>
</div>
</main>

</body>
</html>