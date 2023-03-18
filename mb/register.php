<?php session_start();?>
<?php
session_start();
include '../db.php';

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
<html>
<head>
<title>Register</title>
<meta name="robots" content="noindex, nofollow">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<link rel="shortcut icon" href="favicon.ico?099" type="image/x-icon">
<link rel="icon" href="favicon.ico?099" type="image/x-icon">
<meta name="robots" content="noindex, nofollow">
<script type="text/javascript" src="//code.jquery.com/jquery-1.11.2.min.js"></script>
<style>
/*

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
	display: table;
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
}
.invisible {
	opacity: 0;
}

*/



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
    padding: 50px 0;
    height: 100%;
    width: 100%;
    background-image: url("../../img/main_bg.jpg");
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
    height: 73px;
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


<body xmlns="http://www.w3.org/1999/xhtml">
<div class="main">









<? if($admin_limiti+$toplam_kullanici<1) { ?>
<? } else { ?>

 

<form method="post" id="loginform" style="width: 100%; height: 100%; margin: 0 auto;">
<div class="container">
    <div id="login" class="login">
      
	  
	  <div id="login_layer">
       
		
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
	  
	  <div class="login-icon-field">
        <svg class="login-icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="5.0 -10.0 100.0 135.0" enable-background="new 0 0 100 100" xml:space="preserve" height="160px" width="160px">
            <g>
            <path fill="#fff" class="ball-path" d="M93.853,50C93.853,25.471,74.181,5.515,50,5.515C25.819,5.515,6.147,25.471,6.147,50  S25.819,94.485,50,94.485c16.206,0,31.035-9.036,38.698-23.575l0.118-0.193l-0.014-0.009C92.107,64.361,93.853,57.204,93.853,50z   M51.941,7.896c-0.248-0.213-0.52-0.408-0.814-0.586c1.072,0.029,2.145,0.099,3.21,0.21C53.422,7.647,52.582,7.784,51.941,7.896z   M63.378,25.518l-2.597,16.013c-0.018-0.001-0.037-0.002-0.053-0.001l-0.113,0.009c-1.551,0.221-12.914,4.092-16.522,5.33  L30.442,35.902c1.224-6.101,3.005-13.031,3.917-13.943c1.26-1.26,11.494-6.129,16.433-6.129c0.532,0,0.984,0.058,1.323,0.165  C53.438,16.615,58.712,21.214,63.378,25.518z M40.063,66.207c0.752-3.58,3.125-14.789,3.898-17.415l0.246-0.085  c5.741-1.973,14.807-5.012,16.506-5.381c0.474,0.203,1.705,1.083,3.318,2.372c2.84,2.455,6.587,5.934,8.811,8.092  c0.466,0.53,0.836,0.995,1.079,1.343c1.355,3.559-1.241,10.932-2.488,14.475l-0.702,1.973c-0.252,0.202-0.639,0.505-1.883,1.038  c-4.051,1.732-12.558,4.122-15.767,4.433c-2.607-1.262-8.454-6.657-11.28-9.264C41.077,67.123,40.447,66.541,40.063,66.207z   M79.154,25.547l-0.315,0.725c-2.622-0.969-5.798-1.42-9.981-1.42c-1.158,0-2.216,0.033-3.15,0.062l-0.282,0.013l-0.088-0.018  c-1.217-1.131-10.343-9.581-12.536-10.556l-0.072-0.028c-0.191-0.064-0.402-0.115-0.657-0.158c0.226-1.659,0.555-3.708,0.708-4.645  c1.715-0.31,4.847-0.803,7.441-0.803c0.215,0,0.427,0.003,0.594,0.004c7.007,1.893,13.462,5.641,18.669,10.838  C80.469,21.834,79.675,24.074,79.154,25.547z M32.434,21.742c-1.535,3.144-3.253,11.391-3.771,13.991  c-1.339,0.945-7.472,5.443-12.355,11.849c-0.695-0.328-4.078-2.016-6.109-4.651l-0.064-0.254c-0.365-1.432-0.865-3.392,0.652-8.163  c0.675-1.754,1.477-3.486,2.384-5.149L26.56,18.576C28.268,19.356,31.16,20.743,32.434,21.742z M15.835,49.296  c2.606,11.039,4.235,14.948,5.99,17.551c-1.586,2.345-2.771,8.614-2.988,9.826c-0.764-0.233-1.693-0.717-2.764-1.443  C10.742,67.864,7.924,59.14,7.924,50c0-0.919,0.032-1.882,0.097-2.863c0.394-0.944,0.938-1.664,1.618-2.141  C11.01,46.561,14.088,48.701,15.835,49.296z M23.025,68.287c0.535,0.09,1.249,0.181,2.016,0.258  c1.015,0.198,2.228,0.298,3.606,0.298c0.341,0,0.685-0.006,1.022-0.017c0.407,0.009,0.82,0.014,1.236,0.014  c2.451,0,5.867-0.174,8.319-0.999c0.347,0.313,0.819,0.748,1.37,1.256c2.956,2.728,8.425,7.775,11.391,9.388  c-0.397,2.361-1.68,6.473-2.412,8.722c-0.45,1.011-1.873,1.536-4.465,1.652l-12.634-0.349c-4.34-1.211-10.267-8.291-12.07-10.764  C20.693,75.55,21.722,70.32,23.025,68.287z M36.919,90.514c1.643,0.072,3.893,0.169,6.144,0.169c3.585,0,6.07-0.243,7.59-0.743  c0.082,0.043,0.24,0.122,0.549,0.27c2.437,0.881,4.69,1.309,6.888,1.309c0.831,0,1.629-0.061,2.391-0.155  c-3.415,0.893-6.929,1.345-10.482,1.345c-4.542,0-9.017-0.741-13.318-2.205C36.76,90.507,36.839,90.51,36.919,90.514z   M72.516,86.059c2.798-2.577,4.374-5.359,4.96-6.394l0.069-0.121c0.292-0.214,0.742-0.538,1.297-0.937  c1.495-1.076,3.654-2.63,5.596-4.098C81.256,79.099,77.18,83.045,72.516,86.059z M72.501,72.021c0.1-0.342,0.333-1.039,0.608-1.82  c1.319-3.745,3.76-10.68,2.697-14.954c3.718-1.677,8.955-7.223,10.242-8.906c4.067,1.432,5.277,7.773,5.324,7.999  c-0.222,3.551-1.828,9.292-3.128,13.463c-0.329,0.725-0.687,1.459-1.045,2.15c-0.539,0.652-3.049,2.461-5.706,4.377  c-1.648,1.188-3.351,2.415-4.711,3.458c-1.068-1.421-2.946-3.859-4.303-5.283C72.475,72.503,72.393,72.389,72.501,72.021z   M92.076,50c0,0.192-0.002,0.383-0.005,0.573c-0.877-2.121-2.383-4.557-4.877-5.686c-0.204-2.906-1.801-12.047-6.574-18.138  c0.052-0.171,0.134-0.4,0.204-0.598c0.044-0.124,0.091-0.253,0.141-0.388c0.357-0.973,0.832-2.267,0.787-3.754  C88.414,29.787,92.076,39.704,92.076,50z M29.533,12.697l-2.941,3.271l-10.22,8.394C19.905,19.602,24.419,15.601,29.533,12.697z"></path>
            <!-- *Created by le garage studio from the Noun Project* -->
            <animateTransform id="spin" attributeName="transform" type="rotate" dur="2s" from="0 50 50" to="360 50 50" repeatCount=".4" fill="freeze"></animateTransform>
            </g>
        </svg>
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
                <div style="text-align: center;">
            <button type="submit" class="btn btn-success" name="submit" id="kaydet">KAYIT OL</font></button>
                
                
                    
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