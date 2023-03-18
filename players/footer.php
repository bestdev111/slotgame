<div id="printerlock"></div>

<div id="tooltip_2" class="tooltip_2" style="display: none; left: 691px; top: 936px;">
	<div id="tooltip_2_inner" class="tooltip_2_inner"></div>
</div>

<div id="comp-betradar_tip">
	<div id="betradar_layer" style="display: none;"></div>
</div>

<link rel="stylesheet" type="text/css" href="/assets/css/sweetalert.css">
<style>
/* Sweet Alert */
.sweet-overlay {
  background: rgba(0, 0, 0, 0.5);
}
.sweet-alert {
  background: #fff;
  border: 1px solid #323232;
  border-radius: 0;
  padding: 0;
}
.sweet-alert h2 {
  color: #2a7394;
  margin: 0;
  border-bottom: 3px solid #2A7394;
  line-height: 20px;
  padding: 12px 0px 4px 12px;
  font-size: 16px;
  text-align: left;
}
.sweet-alert p {
  color: #666666;
  padding: 20px;
  font-size: 14px;
}
.sweet-alert button {
  background-color: #3c3c3c !important;
  margin: 10px 5px 15px 5px;
  border-radius: 0;
}
.sweet-alert button:hover {
  background: #323232 !important;
}
.sweet-alert .sa-icon.sa-error {
  border-color: #bf0101;
}
.sweet-alert .sa-icon.sa-error .sa-line {
  background-color: #bf0101;
}
.sweet-alert .sa-icon.sa-success::before,
.sweet-alert .sa-icon.sa-success::after {
  background: none;
}
.sweet-alert .sa-icon.sa-success .sa-fix {
  background: none;
}
</style>
<script>
function kuponyazdir(id) { 
if(id=="son") {
$("#printerlock").html('<iframe src="printKupon.php?son=1" style="width:0px; height:0px;"></iframe>'); 
} else {
$("#printerlock").html('<iframe src="printKupon.php?id='+id+'" style="width:0px; height:0px;"></iframe>'); 
}
}
function failcont(msg1,msg2) {
	$(".sweet-overlay").fadeIn();
	$(".showSweetAlert").fadeIn();
	$(".showSweetAlert").html('<h2>'+msg1+'</h2><p style="display: block;">'+msg2+'</p><fieldset><div class="sa-input-error"></div></fieldset><div class="sa-error-container"><div class="icon">!</div><p>Not valid!</p></div><div class="sa-button-container"><div class="sa-confirm-button-container"><button class="confirm" tabindex="1" style="display: inline-block; background-color: rgb(140, 212, 245); box-shadow: rgba(140, 212, 245, 0.8) 0px 0px 2px, rgba(0, 0, 0, 0.05) 0px 0px 0px 1px inset;" onclick="kapatuyari();">OK</button><div class="la-ball-fall"><div></div><div></div><div></div></div></div></div>');
	$("#kapatuyari").focus();
}
function kapatuyari() {
	$(".sweet-overlay").hide();
	$(".showSweetAlert").hide();
	$(".showSweetAlert").html('');
}
</script>
<div class="sweet-overlay" tabindex="-1" style="opacity: 1.04; display: none;"></div>
<div class="sweet-alert showSweetAlert visible" style="display: none; margin-top: -84px;"></div>

<div id="foot">
	<div id="ci_b"></div>
	<div class="container">
<div id="foot">
    <div class="foot_left">
        <h2><?=getTranslation('footerver1')?></h2>
        <ul>
            <li><a href="#"><?=getTranslation('footerver2')?></a></li>
            <li><a href="#"><?=getTranslation('footerver3')?></a></li>
            <li><a href="#"><?=getTranslation('footerver4')?></a></li>
            <li><a href="#"><?=getTranslation('footerver5')?></a>
			</li>
            <li><a href="#"><?=getTranslation('footerver6')?></a></li>
            <li><a href="#"><?=getTranslation('footerver7')?></a></li>
        </ul>

    </div>
    <div class="foot_right">
    </div>
</div>
<div class="space_9 clear"></div>
	</div>
</div>
<style>
.modal-open{overflow:hidden}.modal{position:fixed;top:0;right:0;bottom:0;left:0;z-index:1050;display:none;background-color:rgba(0, 0, 0, 0.5);overflow:hidden;-webkit-overflow-scrolling:touch;outline:0}.modal.fade .modal-dialog{-webkit-transition:-webkit-transform .3s ease-out;-o-transition:-o-transform .3s ease-out;transition:transform .3s ease-out;-webkit-transform:translate3d(0,-25%,0);-o-transform:translate3d(0,-25%,0);transform:translate3d(0,-25%,0)}.modal.in .modal-dialog{-webkit-transform:translate3d(0,0,0);-o-transform:translate3d(0,0,0);transform:translate3d(0,0,0)}.modal-open .modal{overflow-x:hidden;overflow-y:auto}.modal-dialog{position:relative;width:auto;margin:10px}.modal-content{position:relative;background-color:#fff;-webkit-background-clip:padding-box;background-clip:padding-box;border:1px solid #999;border:1px solid rgba(0,0,0,.2);border-radius:6px;outline:0;-webkit-box-shadow:0 3px 9px rgba(0,0,0,.5);box-shadow:0 3px 9px rgba(0,0,0,.5)}.modal-backdrop{position:fixed;top:0;right:0;bottom:0;left:0;z-index:1040;background-color:#000}.modal-backdrop.fade{filter:alpha(opacity=0);opacity:0}.modal-backdrop.in{filter:alpha(opacity=50);opacity:.5}.modal-header{min-height:16.43px;padding:15px;border-bottom:1px solid #e5e5e5}.modal-header .close{margin-top:-2px}.modal-title{margin:0;line-height:1.42857143}.modal-body{position:relative;padding:15px}.modal-footer{padding:15px;text-align:right;border-top:1px solid #e5e5e5}.modal-footer .btn+.btn{margin-bottom:0;margin-left:5px}.modal-footer .btn-group .btn+.btn{margin-left:-1px}.modal-footer .btn-block+.btn-block{margin-left:0}.modal-scrollbar-measure{position:absolute;top:-9999px;width:50px;height:50px;overflow:scroll}@media (min-width:768px){.modal-dialog{width:600px;margin:30px auto}.modal-content{-webkit-box-shadow:0 5px 15px rgba(0,0,0,.5);box-shadow:0 5px 15px rgba(0,0,0,.5)}.modal-sm{width:300px}}@media (min-width:992px){.modal-lg{width:900px}}

.modal-large{
    z-index:9999999;
}
.modal-large .modal-body{
    padding:0px;
}
.modal-large .modal-dialog{
    width:70%;
    min-width:1100px;
}
.modal-large .modal-content{
    -webkit-box-shadow: 0px 1px 23px 3px rgba(0,0,0,1);
    -moz-box-shadow: 0px 1px 23px 3px rgba(0,0,0,1);
    box-shadow: 0px 1px 23px 3px rgba(0,0,0,1);
    background:#888888;
    border: 5px solid #888888;
}

.modal-large .modal-backdrop{
    overflow-y:auto;
}
.modal-small{
    z-index:9999999;
}
.modal-small .modal-dialog{
    width:50%;
    min-width:790px;
}
.modal-small .modal-content{
    border: 0px solid #000000;
    background:#000000;
}
.modal-small .modal-body{
    padding:0;
}
.modal-small .modal-backdrop{
    overflow-y:auto;
}
.modal-xsmall{
    z-index:9999999;
}
.modal-xsmall .modal-dialog{
    width:300px !important;
    min-width:300px;
}
.modal-xsmall .modal-content{
    border: 0px solid #ffffff;
    background: #15607D;
    padding:0px;
}
.modal-xsmall .modal-header{
    background: #15607D;
    background: -moz-linear-gradient(top,  rgb(22, 34, 51)  0%, rgba(0,0,0,1) 100%);
    background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgb(20, 93, 122) ), color-stop(100%,rgb(8, 50, 66)));
    background: -webkit-linear-gradient(top,  rgb(32, 102, 128)  0%,rgb(7, 48, 63) 100%);
    background: -o-linear-gradient(top,  rgb(22, 34, 51)  0%,rgba(0,0,0,1) 100%);
    background: -ms-linear-gradient(top,  rgb(22, 34, 51)  0%,rgba(0,0,0,1) 100%);
    background: linear-gradient(to bottom,  #15607d  0%,#062d3c 100%);
    filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#222222', endColorstr='#000000',GradientType=0 );
    border-bottom:1px solid rgba(0,0,0,0.1);
    border-radius:4px 4px 0 0;
    padding:10px;
}
.modal-xsmall .modal-title{
    color:#fffffd;
}
.modal-xsmall .modal-footer{
    padding:10px 20px;
    background-color:#000000;
    border-radius: 0 0 4px 4px;
    border-top:#000000;
}
.modal-xsmall .modal-body{
    padding:20px 0;
}
.modal-xsmall .modal-backdrop{
    overflow-y:auto;
}
.modal-mormal{
    z-index:9999999;
}
.modal-normal .modal-dialog{

}
.modal-normal .modal-content{
    border: 5px solid rgba(0,0,0,0.9);
    background:#555555;
    width:auto;
    height:auto;
}

.modal-normal .modal-backdrop{
    overflow-y:auto;
}
.main-title-modal {
    overflow:hidden;
    display:block;
    border-bottom:1px solid rgba(0,0,0,0.1);
    font-size:16px;
    color:#fffffd;
    padding:5px 10px;
    background: rgb(37,59,90);
    background: -moz-linear-gradient(top,  rgba(37,59,90,1) 0%, rgba(27,42,64,1) 100%);
    background: -webkit-linear-gradient(top,  rgba(37,59,90,1) 0%,rgba(27,42,64,1) 100%);
    background: linear-gradient(to bottom,  rgba(37,59,90,1) 0%,rgba(27,42,64,1) 100%);
    filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#253b5a', endColorstr='#1b2a40',GradientType=0 );
}
.main-title-modal .glyphicon-remove{
    margin-top: 3px;
}

.main-content-modal {
    background: #ffffff;
    overflow:hidden;
    border-top:1px solid rgba(255,255,255,0.05);
    display:block;
    padding:10px;
    color:#848484;
}
</style>
<div id="cboxOverlay" class="kupongoruntule1 kupond" onclick="kuponkapat();" style="opacity: 0.9; cursor: pointer; display: none;"></div>
<div id="cboxOverlay" class="kupongoruntule2 kupond" onclick="kuponkapat2();" style="opacity: 0.9; cursor: pointer; display: none;"></div>
<div id="colorbox" class="kuponici" style="display:none;"></div>
<div id="colorbox" class="kuponici2" style="display:none;"></div>