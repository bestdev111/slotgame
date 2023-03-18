<style>
.afterkupon {
	border-bottom:5px dashed #fff;
	display:none;
}
.panelBox {
    background: #7c7c7c;
    color: #fff;
    margin-bottom: 15px;
    
    
}
.panelTitle {
    background: #f74835;
    color: #fff;
    text-align: center;
    padding: 3px;
    font-size: 15px;
}
.panelBox .navMenu.nm2 > li > a img {
    filter: none;
    vertical-align: -5px;
    width: 19px;
    margin-right: 5px;
}
.panelBox .navMenu > li > a {
    color: #fff;
    font-size: 12px;
    border-bottom: 1px solid #0f0f0f;
    position: relative;
    display: block;
    padding: 7px;
}
.navMenu > ul {
    margin-bottom: 0;
}

    .navMenu > ul > li {
        list-style: none;
        display: inline-block;
    }

        .navMenu > ul > li > a {
            display: block;
            padding: 0px 10px;
            color: #333;
            font-weight: 600;
            height: 42px;
            line-height: 42px;
        }

            .navMenu > ul > li > a:hover {
                background: #fafafa;
                text-decoration: none;
            }

            .navMenu > ul > li > a:focus {
                background: #eee;
            }
.panelBox .navMenu li {
    position: relative;
}
.panelBox .navMenu > li > a img {
    filter: brightness(0) invert(1);
    vertical-align: -4px;
    width: 16px;
    margin-right: 3px;
}
.panelBox .navMenu.nm2 > li > a img {
    filter: none;
    vertical-align: -5px;
    width: 19px;
    margin-right: 5px;
}
.panelBox .navMenu li a .nvicn img, .panelBox .navMenu > li > a img {
    filter: brightness(0) invert(1);
    vertical-align: -4px;
    width: 16px;
    margin-right: 3px;
}
.panelBox .navMenu .subUl > li > a,
.panelBox .navMenu > li > a {
    color: #fff;
    font-size: 12px;
    border-bottom: 1px solid #0f0f0f;
    position: relative;
    display: block;
    padding: 7px;
}

.panelBox .navMenu > li a:hover {
    color: #f74835;
    text-decoration: none;
}

.panelBox .navMenu li a .nvicn {
    margin-right: 3px;
}

    .panelBox .navMenu li a .nvicn img,
    .panelBox .navMenu > li > a img {
        filter: brightness(0) invert(1);
        vertical-align: -4px;
        width: 16px;
        margin-right: 3px;
    }
</style>
<div id="side" class="right">
<form id="editorForm" name="editorForm" method="post" action="javascript:;" target="" class="">

<div class="slider_name top" onclick="javascript:toggleEditor();jQuery('#ticket_body').slideToggle('slow');jQuery('#ticket_foot div').toggle()"><?=getTranslation('bahiskuponu')?>&nbsp; <span id="cont_refresh" class="cont"></span></div>

<div id="ticket">
<div id="ticket_body" style="display:block;">
<div class="slider"></div>
<div id="ticket_content"><input id="editorForm:selected" type="hidden" name="editorForm:selected" value="">
<div class="ticketText" id="kuponalan"></div>
<div class="ticketText" id="kuponalan2" style="display:none;"></div>
</div>
</div>
</div>
</form>

<div id="leftSide">

<div class="e_active e_noCache " e:url="rightside/boxes_side?conference=false" e:hash="0" e:interval="-1" id="_rightside_boxes_side_conference_false" e:next="-1">
<div class="space box_side_shadow"></div>
<div class="e_active e_noCache " e:url="rightside/openBets" e:hash="zyemhf" e:interval="-1" e:onupdate="hideDelayLayer();initBetsHover()" id="_rightside_openBets" e:next="-1"></div>
</div>
<div class="panelBox">
        <div class="panelTitle"><h1><?=getTranslation('digeroneriler')?></h1></div>
        <ul class="navMenu nm2">
            <li><a href="/slots"><img src="assets/img/is1.png"> Slot</a></li>
            <li><a href="/livecasino"><img src="assets/img/is2.png"> Canlı Casino</a></li>
            <li><a href="/sanal-spor"><img src="assets/img/is3.png"> Sanal Spor</a></li>
            <li><a href="#"><img src="assets/img/is4.png"> Tombala</a></li>
            

        </ul>
    </div>

<!-- <a id="mobileBox" style="position:relative" class="asideBox" href="livecasino">
<h1>Live Casino</h1>
<img src="assets/images.png" alt="teaser">
<span style="position: absolute;top: 70px;font-size: 24px;text-align: center;width: 300px;height: 550px;display: block;" class="headetlogo2"></span>

</a> -->
<div class="e_active e_noCache asideBox winner" e:url="/ticket2/topWinner" e:hash="1grooi6" e:interval="-1" id="_ticket2_topWinner" e:next="-1">

<h1><?=getTranslation('talihliler')?></h1>
<div id="topwinnerWidget" class="">
<ul>
<?
$tarihi = time() -604800 ;
$sorgu = sed_sql_query("select id,user_id,tutar from kuponlar where kupon_time >= $tarihi group by user_id ORDER BY tutar DESC LIMIT 5");
while($row = sed_sql_fetcharray($sorgu)){
$usersorgu = sed_sql_query("select id, username, bakiye from kullanici WHERE id='".$row['user_id']."'");
$userrow = sed_sql_fetcharray($usersorgu);
?>
<li>
<div>
<?=substr($userrow['username'],0,3);?>***
</div>
<div class="align_r"><?=nf($userrow['bakiye']);?></div>

</li>
<? } ?>
</ul>
</div>
<div class="space">
</div>
</div>

<style>
.headetlogo2 {
    font-weight: bold;
    margin-top: 20px;
    color: #f74835;
    text-shadow: 0 1px 0 #2e303b, 0 2px 0 #c9c9c9, 0 3px 0 #BB9, 0 4px 0 #2e303b, 0 5px 0 #aaa, 0 6px 1px rgba(0,0,0,.1), 0 0 5px rgba(0,0,0,.1), 0 1px 3px rgba(0,0,0,.3), 0 3px 5px rgba(0,0,0,.2), 0 5px 10px rgba(0,0,0,.25), 0 10px 10px rgba(0,0,0,.2), 0 20px 20px rgba(0,0,0,.15);
}
</style>
<div class="space box_side_shadow"></div>
<a id="mobileBox" style="position:relative" class="asideBox" href="/">
<h1>Promosyonlar</h1>
<img src="assets/promo.gif" alt="teaser">
<span style="position: absolute;top: 70px;font-size: 24px;text-align: center;width: 204px;display: block;" class="headetlogo2"></span>
<!--<div class="boxText">

<div class="fakeLink">PROMOSYONLAR</div>
</div>
</a>
-->
<div id="languageChooser">
<a class="mini_teaser block cursor sports_lang_chooser" onclick="jQuery('#lang_layer').toggle();return false;" href="#">
<span class="box_1 white lh_36 left"><?=getTranslation('dilsecimi')?></span>
<div class="right lh_36 pad_r_10">
<? if($dil_bilgisi['language']=='tr'){?>
<span class="box_2">
<img alt="flag" src="assets/img/flags/tr.png" width="16" height="16">
</span>
<span class="box_3">TR</span>
<? } else if($dil_bilgisi['language']=='en'){?>
<span class="box_2">
<img alt="flag" src="assets/img/flags/en.png" width="16" height="16">
</span>
<span class="box_3">EN</span>
<? } else if($dil_bilgisi['language']=='de'){?>
<span class="box_2">
<img alt="flag" src="assets/img/flags/de.png" width="16" height="16">
</span>
<span class="box_3">DE</span>
<? } else if($dil_bilgisi['language']=='ar'){?>
<span class="box_2">
<img alt="flag" src="assets/img/flags/ar.png" width="16" height="16">
</span>
<span class="box_3">AR</span>
<? } else if($dil_bilgisi['language']=='ru'){?>
<span class="box_2">
<img alt="flag" src="assets/img/flags/ru.png" width="16" height="16">
</span>
<span class="box_3">RU</span>
<? } else { ?>
<span class="box_2">
<img alt="flag" src="assets/img/flags/tr.png" width="16" height="16">
</span>
<span class="box_3">TR</span>
<? } ?>
</div>
</a>
<a class="mini_teaser block cursor casino_lang_chooser" onclick="jQuery('#lang_layer').toggle();return false;" href="#">
<span class="box_1 pad_t_10 left">
<img alt="flag" src="assets/img/flags/tr.png" width="16" height="16">
</span>
<span class="box_2 pad_l_2 left">TR</span>
<span class="box_3 white lh_36 left"><?=getTranslation('dilsecimi')?></span>
</a>
<div id="lang_layer" class="layerClass bubble b_right b_shad hide cf" style="display: none;">
<div class="left">
<div>
<a href="spor-bahisleri?language=tr" class="<? if($dil_bilgisi['language']=='tr'){?>on<? } ?>">
<img src="assets/img/flags/tr.png" style="width: 18px;height: 20px;margin-top: 5px;" alt="flag">
<span><?=getTranslation('dilsecimi1')?></span>
</a>
<br>
<a href="spor-bahisleri?language=en" class="<? if($dil_bilgisi['language']=='en'){?>on<? } ?>">
<img src="assets/img/flags/en.png" style="width: 18px;height: 20px;margin-top: 5px;" alt="flag">
<span><?=getTranslation('dilsecimi2')?></span>
</a>
<br>
<a href="spor-bahisleri?language=de" class="<? if($dil_bilgisi['language']=='de'){?>on<? } ?>">
<img src="assets/img/flags/de.png" style="width: 18px;height: 20px;margin-top: 5px;" alt="flag">
<span><?=getTranslation('dilsecimi3')?></span>
</a>
<br>
<a href="spor-bahisleri?language=ar" class="<? if($dil_bilgisi['language']=='ar'){?>on<? } ?>">
<img src="assets/img/flags/ar.png" style="width: 18px;height: 20px;margin-top: 5px;" alt="flag">
<span><?=getTranslation('dilsecimi4')?></span>
</a>
<a href="spor-bahisleri?language=ru" class="<? if($dil_bilgisi['language']=='ru'){?>on<? } ?>">
<img src="assets/img/flags/ru.png" style="width: 18px;height: 20px;margin-top: 5px;" alt="flag">
<span><?=getTranslation('dilsecimi5')?></span>
</a>
</div>
</div>
</div>
</div>
<!-- <div id="oddsFormatChooser">
<a class="mini_teaser block cursor" onclick="jQuery('#oddsFormat_layer').toggle();return false;" href="#">
<span class="box_1 white lh_36 left"><?=getTranslation('oran')?></span>
<div class="right lh_36 pad_r_10">
<span class="box_3">Desimal (1,23)</span>
</div>
</a> -->
<div id="oddsFormat_layer" class="layerClass bubble b_right b_shad hide cf" style="display: none;">
<div class="left">
<form id="j_id327" name="j_id327" method="post" action="" target="">
<a href="#" id="j_id327:j_id328" name="j_id327:j_id328" >
<span>Amerikan (+200)</span>
</a>
<a href="#" id="j_id327:j_id330" name="j_id327:j_id330" >
<span>Desimal (1,23)</span>
</a>

</form>
</div>
</div>
</div>
</div>

</div>