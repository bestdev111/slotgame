<div id="delay_layer" class="overlay_layer" style="display:none;">
<div class="innerWrap">
<div class="contentBlock">
<div class="headline"><?=getTranslation('lutfen1')?> <span class="highlighted"><?=getTranslation('lutfen2')?></span></div>
<div class="bodyText"><?=getTranslation('lutfen3')?></div>
<div class="progressbar"><div class="progressbarInner"></div></div>
</div>
</div>
</div>

<div id="printerlock"></div>

<div class="clear">
</div>
<div id="layer_bg"></div>
<div id="comp-layer"></div>


<div id="delay_layer_live" class="overlay_layer hide">
	<div class="innerWrap">
		<div class="contentBlock">
			<div class="headline">
				<?=getTranslation('lutfen1')?> 
				<span class="highlighted"><?=getTranslation('lutfen2')?></span>
			</div>
			<div class="bodyText"><?=getTranslation('yeniyerler_kasa357')?></div>
				<div class="progressbar">
				<div class="progressbarInner"></div>
			</div>
		</div>
	</div>
</div>

	
<div id="delay_layer" class="overlay_layer hide">
	<div class="innerWrap">
		<div class="contentBlock">
			<div class="headline">
				<?=getTranslation('lutfen1')?> 
				<span class="highlighted"><?=getTranslation('lutfen2')?></span>
			</div>
			<div class="bodyText"><?=getTranslation('lutfen3')?></div>
			<div class="progressbar">
				<div class="progressbarInner"></div>
			</div>
		</div>
	</div>
</div>
</div>
</div>

<link rel="stylesheet" type="text/css" href="assets/css/sweetalert.css">
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

<? if(userayar('wattsap')!=0){ ?>

<script>
function closeopenwhats(){
$( ".whatsappgo" ).toggle();
}
</script>

<div class="whatsappgo" onclick="closeopenwhats();" style="
    width: 250px;
    text-align: center;
    padding: 8px;
    position: fixed;
    right: 17px;
    bottom: 48px;
    background: #b9b9b9;
    border-radius: 7px;
    z-index: 99;
">
<?=getTranslation('yeniyerler_kasa358')?> <b>+9<?=userayar('wattsap');?></b> <?=getTranslation('yeniyerler_kasa359')?>

</div>

<svg  onclick="closeopenwhats();" style="
    fill: #ffffff;
    width: 42px;
    height: 42px;
    background: #009e02;
    border-radius: 27px;
    position: fixed;
    right: 4px;
    bottom: 5px;
    cursor: pointer;
	z-index: 99;
    " xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 32 32" class="wh-messenger-svg-whatsapp wh-svg-icon"><path d=" M19.11 17.205c-.372 0-1.088 1.39-1.518 1.39a.63.63 0 0 1-.315-.1c-.802-.402-1.504-.817-2.163-1.447-.545-.516-1.146-1.29-1.46-1.963a.426.426 0 0 1-.073-.215c0-.33.99-.945.99-1.49 0-.143-.73-2.09-.832-2.335-.143-.372-.214-.487-.6-.487-.187 0-.36-.043-.53-.043-.302 0-.53.115-.746.315-.688.645-1.032 1.318-1.06 2.264v.114c-.015.99.472 1.977 1.017 2.78 1.23 1.82 2.506 3.41 4.554 4.34.616.287 2.035.888 2.722.888.817 0 2.15-.515 2.478-1.318.13-.33.244-.73.244-1.088 0-.058 0-.144-.03-.215-.1-.172-2.434-1.39-2.678-1.39zm-2.908 7.593c-1.747 0-3.48-.53-4.942-1.49L7.793 24.41l1.132-3.337a8.955 8.955 0 0 1-1.72-5.272c0-4.955 4.04-8.995 8.997-8.995S25.2 10.845 25.2 15.8c0 4.958-4.04 8.998-8.998 8.998zm0-19.798c-5.96 0-10.8 4.842-10.8 10.8 0 1.964.53 3.898 1.546 5.574L5 27.176l5.974-1.92a10.807 10.807 0 0 0 16.03-9.455c0-5.958-4.842-10.8-10.802-10.8z" fill-rule="evenodd"></path></svg>

<? } ?>
<? if($_SERVER['PHP_SELF'] == "/index.php") { ?>
<div id="foot">
<div id="ci_b"></div>
<div class="container">
<div id="foot">

<div class="foot_left">
<div class="footer-paymentlist">
<h2 translate="footer.title.paymanets" class="ng-scope"><?=getTranslation('yeniyerler_kasa360')?></h2>
</div>
</div>

<div class="foot_right">
<div class="footer-paymentlist">
<?=getTranslation('odemeolanaklari_1')?>

<?=$site_adi;?> <?=getTranslation('odemeolanaklari_2')?> <?=$site_adi;?> <?=getTranslation('odemeolanaklari_3')?>

<?=getTranslation('odemeolanaklari_4')?>

</div>
</div>
</div>
</div>
</div>
<? } ?>
<div class="tooltip" id="tooltip" style="display: none; left: 623px; top: 339px;"><?=getTranslation('yeniyerler_kasa361')?></div>
<div id="tooltip_2" class="tooltip_2" style="display: none; left: 691px; top: 936px;">
	<div id="tooltip_2_inner" class="tooltip_2_inner"></div>
</div>
<div id="comp-betradar_tip">
	<div id="betradar_layer" style="display: none;"></div>
</div>
<div id="comp-layer"></div>

<div id="help_resultType_layer" class="layerClass" style="display: none;">
	<div id="help_resultType_layer_inner" class="left"></div>
	<div class="but_close right" onclick="javascript:closeHelp();"></div>
	<div class="clear"></div>
</div>

<div class="okmsg" id="okdurum"></div>
<div class="failmsg" id="faildurum"></div>
<input type="hidden" id="cupdate" value="1">
<input type="hidden" id="typer" value="ticket_but_combi" />

<script type="text/javascript" src="assets/js/ebet-0AE2F72B17BC90EE6C49D786D7F54877.js"></script>
<script type="text/javascript" src="assets/js/jquery-ui-334D59F1CB807842DCB6A330B53BEF4E.js"></script>
<script type="text/javascript" src="assets/js/jquery.slides-D4F90A1D2EAD0F81811BC15D5B557025.js"></script>
<script type="text/javascript">
jQuery("#slider").slider({
range: "min",
value: 4,
min: 0,
max: 4,
step: 1,
slide: function(event, ui){
jQuery(".nav_slider_txt div").removeClass('on');
jQuery("#slider_" + ui.value).addClass('on');
},
change: function(event, ui){
	if(ui.value==0){
		var gel = 1;
	}
	if(ui.value==1){
		var gel = 3;
	}
	if(ui.value==2){
		var gel = 24;
	}
	if(ui.value==3){
		var gel = "3days";
	}
		if(ui.value==4){
		var gel = "all";
	}
	whodate(gel);
}
});
</script>
<script>(function(d,t,u,s,e){e=d.getElementsByTagName(t)[0];s=d.createElement(t);s.src=u;s.async=1;e.parentNode.insertBefore(s,e);})(document,'script','//jackpotmatic.store/livechat/php/app.php?widget-init.js');</script>
<? 
@ob_end_flush();
@ob_end_flush();

sed_sql_close($connection_id);
?>
