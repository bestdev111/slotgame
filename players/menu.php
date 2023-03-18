<?php
$mesajvarmimenuicin = sed_sql_numrows(sed_sql_query("select okundu,alan_id,gonderen_id from chat where alan_id='$ub[id]' and okundu='0' group by gonderen_id"));
?>
<style>
#content
{
width: 1024px !important;
}
.lwkSelector
{
    width: 758px;
    float: left;
    margin-left: 22px;
}
</style>
<div id="side" class="left" style="margin-top: 11px;">
<div id="editorForm" name="editorForm" method="post">

<?php if($ub['hesap_root_root_id']=="") {  // Patron ?>

<div id="serviceBox" class="asideBox">
<h1>Patron</h1>
<ul>
<li><a id="tumkuponlar" href="tumkuponlar.php"><?=getTranslation('menutumkuponlar')?></a></li>
<li><a id="yogunluk" href="yogunluk.php"><?=getTranslation('menuyogunlukanalizi')?></a></li>
<li><a id="kuponananaliz" href="kuponananaliz.php"><?=getTranslation('menukuponanalizi')?></a></li>
<li><a id="sistemdekiler2" href="sistemdekiler.php"><?=getTranslation('menusistemdekiler')?></a></li>
<li><a id="gollist" href="gollist.php">Gol Listesi Düzenle</a></li>
<li><a id="bakiyeraporu" href="bakiyeraporu.php"><?=getTranslation('menubakiyeraporu')?></a></li>
<li><a id="yasakcanli" href="yasakcanli.php">Canlı Kaldır</a></li>
<li><a id="yasakmaclar" href="yasakmaclar.php">Genel Maç Kaldır</a></li>
<li><a id="kupondegisimlog" href="kupondegisimlog.php"><?=getTranslation('menukuponloglari')?></a></li>
<li><a id="user_sorgula" href="user_sorgula.php"><?=getTranslation('menudavranisraporu')?></a></li>
</ul>
</div>

<div id="serviceBox" class="asideBox">
<h1><?=getTranslation('menuuyelik')?></h1>
<ul>
<li><a id="users2" href="users.php"><?=getTranslation('menuuyelistesi')?></a></li>
<li><a id="adduser" href="adduser.php"><?=getTranslation('menuuyeolustur')?></a></li>
<li><a id="girislog2" href="girislog.php"><?=getTranslation('menugirisloglari')?></a></li>
</ul>
</div>

<div id="serviceBox" class="asideBox">
<h1><?=getTranslation('menuhizmetler')?></h1>
<ul>
<li><a id="duyurular" href="duyurular.php"><?=getTranslation('menuduyurular')?></a></li>
<li><a id="yaziciayar" href="yaziciayar.php"><?=getTranslation('menuyaziciayarlari')?></a></li>
<li><a id="mesajlar" href="mesajlar.php"><?=getTranslation('mesajpaneli1')?> ( <?php if($mesajvarmimenuicin>0) { ?><?=$mesajvarmimenuicin;?><?php } else { ?>0<?php } ?> )</a></li>

</ul>
</div>

<?php } else if($ub['sahip']=="1") { // Joker Admin ?>

<div id="serviceBox" class="asideBox">
<h1><?=getTranslation('menujoker')?></h1>
<ul>
<li><a id="tumkuponlar" href="tumkuponlar.php"><?=getTranslation('menutumkuponlar')?></a></li>
<li><a id="sistemdekiler2" href="sistemdekiler.php"><?=getTranslation('menusistemdekiler')?></a></li>
</ul>
</div>

<div id="serviceBox" class="asideBox">
<h1><?=getTranslation('menuuyelik')?></h1>
<ul>
<li><a id="users2" href="users.php"><?=getTranslation('menuuyelistesi')?></a></li>
<li><a id="adduser" href="addusersuperadmin.php"><?=getTranslation('menuuyeolustur')?></a></li>
<li><a id="girislog2" href="girislog.php"><?=getTranslation('menugirisloglari')?></a></li>
<li><a id="karaliste" href="karaliste.php"><?=getTranslation('menukaraliste')?></a></li>
<li><a id="krediekle" href="kredieklesuperadmin.php"><?=getTranslation('menukrediekle')?></a></li>

</ul>
</div>

<?php } else if($ub['alt_alt_durum']>0) { // Super Admin ?>

<div id="serviceBox" class="asideBox">
<h1><?=getTranslation('menusuper')?></h1>
<ul>
<li><a id="tumkuponlar" href="tumkuponlar.php"><?=getTranslation('menutumkuponlar')?></a></li>
<li><a id="kuponraporlari" href="kuponraporlari.php"><?=getTranslation('menukuponraporlari')?></a></li>
<li><a id="bakiyeraporu" href="bakiyeraporu.php"><?=getTranslation('menubakiyeraporu')?></a></li>
<li><a id="hesaprapor" href="hesaprapor.php"><?=getTranslation('menuhesapraporu')?></a></li>
<li><a id="sistemdekiler2" href="sistemdekiler.php"><?=getTranslation('menusistemdekiler')?></a></li>
</ul>
</div>

<div id="serviceBox" class="asideBox">
<h1><?=getTranslation('menuhesabim')?></h1>
<ul>
<li><a id="profil" href="profil.php"><?=getTranslation('menubilgilerim')?></a></li>
<li><a id="sifredegistir" href="sifredegistir.php"><?=getTranslation('menusifredegistir')?></a></li>
</ul>
</div>

<div id="serviceBox" class="asideBox">
<h1><?=getTranslation('menuuyelik')?></h1>
<ul>
<li><a id="users2" href="users.php"><?=getTranslation('menuuyelistesi')?></a></li>
<li><a id="addusersuper" href="addusersuper.php"><?=getTranslation('menuuyeolustur')?></a></li>
<li><a id="girislog2" href="girislog.php"><?=getTranslation('menugirisloglari')?></a></li>
<li><a id="karaliste" href="karaliste.php"><?=getTranslation('menukaraliste')?></a></li>
<li><a id="krediekle" href="krediekleadmin.php"><?=getTranslation('menukrediekle')?></a></li>
</ul>
</div>

<?php } else if($ub['wkyetki']=="1") { // Süper Bayi ?>

<div id="serviceBox" class="asideBox">
<h1><?=getTranslation('menuyonetim')?></h1>
<ul>
<li><a id="tumkuponlar" href="tumkuponlar.php"><?=getTranslation('menutumkuponlar')?></a></li>
<li><a id="komisyonraporu" href="komisyonraporu.php"><?=getTranslation('menukomisyonraporu')?></a></li>
<li><a id="bakiyeraporu" href="bakiyeraporu.php"><?=getTranslation('menubakiyeraporu')?></a></li>
<li><a id="kuponraporlari" href="kuponraporlari.php"><?=getTranslation('menukuponraporlari')?></a></li>
<li><a id="hesaprapor" href="hesaprapor.php"><?=getTranslation('menuhesapraporu')?></a></li>
<li><a id="bakiye_isle" href="bakiye_isle.php"><?=getTranslation('menubakiye_isle')?></a></li>
</ul>
</div>

<div id="serviceBox" class="asideBox">
<h1><?=getTranslation('menuuyelik')?></h1>
<ul>
<li><a id="users2" href="users.php"><?=getTranslation('menuuyelistesi')?></a></li>
<li><a id="adduser" href="adduser.php"><?=getTranslation('menuuyeolustur')?></a></li>
<li><a id="girislog2" href="girislog.php"><?=getTranslation('menugirisloglari')?></a></li>
<li><a id="karaliste" href="karaliste.php"><?=getTranslation('menukaraliste')?></a></li>
</ul>
</div>

<div id="serviceBox" class="asideBox">
<h1><?=getTranslation('menuhizmetler')?></h1>
<ul>
<li><a id="yaziciayar" href="yaziciayar.php"><?=getTranslation('menuyaziciayarlari')?></a></li>
<li><a id="sifredegistir" href="sifredegistir.php"><?=getTranslation('menusifredegistir')?></a></li>
<li><a id="mesajlar" href="mesajlar.php"><?=getTranslation('mesajpaneli1')?> ( <? if($mesajvarmimenuicin>0) { ?><?=$mesajvarmimenuicin;?><? } else { ?>0<? } ?> )</a></li>

</ul>
</div>

<?php } else if($ub['wkyetki']=="3") { // Web Kullanıcı ?>

<div id="serviceBox" class="asideBox">
<h1><?=getTranslation('menuwebkullanici')?></h1>
<ul>
<li><a id="kuponlarim" href="kuponlarim.php"><?=getTranslation('menukuponlarim')?></a></li>
<li><a id="kuponraporlari" href="kuponraporum.php"><?=getTranslation('menukuponraporlari')?></a></li>
<li><a id="bakiyeraporu" href="bakiyeraporum.php"><?=getTranslation('menubakiyeraporu')?></a></li>
<li><a id="hesaprapor" href="hesaprapor.php"><?=getTranslation('menuhesapraporu')?></a></li>
<?php if(userayar('casino_yetki')>0) { ?>
<li><a id="ckuponlarim" href="ckuponlarim.php">Casino <?=getTranslation('menukuponlarim')?></a></li>
<li><a id="ckuponraporlari" href="ckuponraporum.php">Casino <?=getTranslation('menukuponraporlari')?></a></li>
<li><a id="cbakiyeraporu" href="cbakiyeraporum.php">Casino <?=getTranslation('menubakiyeraporu')?></a></li>
<?php } ?>
</ul>
</div>

<div id="serviceBox" class="asideBox">
<h1><?=getTranslation('menuhizmetler')?></h1>
<ul>
<li><a id="yaziciayar" href="yaziciayar.php"><?=getTranslation('menuyaziciayarlari')?></a></li>
<li><a id="sifredegistir" href="sifredegistir.php"><?=getTranslation('menusifredegistir')?></a></li>
<li><a id="mesajlar" href="mesajlar.php"><?=getTranslation('mesajpaneli1')?> ( <?php if($mesajvarmimenuicin>0) { ?><?=$mesajvarmimenuicin;?><?php } else { ?>0<?php } ?> )</a></li>

</ul>
</div>

<?php } else if($ub['wkyetki']=="2") { // Normal Bayi ?>

<div id="serviceBox" class="asideBox">
<h1><?=getTranslation('menubayi')?></h1>
<ul>
<li><a id="kuponlarim" href="kuponlarim.php"><?=getTranslation('menukuponlarim')?></a></li>
<li><a id="kuponraporlari" href="kuponraporum.php"><?=getTranslation('menukuponraporlari')?></a></li>
<li><a id="bakiyeraporu" href="bakiyeraporum.php"><?=getTranslation('menubakiyeraporu')?></a></li>
<li><a id="hesaprapor" href="hesaprapor.php"><?=getTranslation('menuhesapraporu')?></a></li>
</ul>
</div>

<div id="serviceBox" class="asideBox">
<h1><?=getTranslation('menuhizmetler')?></h1>
<ul>
<li><a id="yaziciayar" href="yaziciayar.php"><?=getTranslation('menuyaziciayarlari')?></a></li>
<li><a id="sifredegistir" href="sifredegistir.php"><?=getTranslation('menusifredegistir')?></a></li>
<li><a id="mesajlar" href="mesajlar.php"><?=getTranslation('mesajpaneli1')?> ( <? if($mesajvarmimenuicin>0) { ?><?=$mesajvarmimenuicin;?><? } else { ?>0<? } ?> )</a></li>

</ul>
</div>

<?php } else if($ub['alt_durum']>0) { // Admin ?>

<div id="serviceBox" class="asideBox">
<h1><?=getTranslation('menuadmin')?></h1>
<ul>
<li><a id="tumkuponlar" href="tumkuponlar.php"><?=getTranslation('menutumkuponlar')?></a></li>
<?php if($ub['sistemayarlaryetki']==1){ ?>
<li><a id="ayar" href="ayar.php"><?=getTranslation('menuayarlar')?></a></li>
<?php } ?>
<li><a id="kuponraporlari" href="kuponraporlari.php"><?=getTranslation('menukuponraporlari')?></a></li>
<li><a id="bakiyeraporu" href="bakiyeraporu.php"><?=getTranslation('menubakiyeraporu')?></a></li>
<li><a id="hesaprapor" href="hesaprapor.php"><?=getTranslation('menuhesapraporu')?></a></li>
<li><a id="komisyonraporu" href="komisyonraporu.php"><?=getTranslation('menukomisyonraporu')?></a></li>
<li><a id="bakiye_isle" href="bakiyeisleadmin.php"><?=getTranslation('menubakiye_isle')?></a></li>
</ul>
</div>

<div id="serviceBox" class="asideBox">
<h1><?=getTranslation('menuadmin')?> 2</h1>
<ul>
<li><a id="yogunluk" href="yogunluk.php"><?=getTranslation('menuyogunlukanalizi')?></a></li>
<li><a id="kupondegisimlog" href="kupondegisimlog.php"><?=getTranslation('menukuponloglari')?></a></li>
<li><a id="sistemdekiler2" href="sistemdekiler.php"><?=getTranslation('menusistemdekiler')?></a></li>
<li><a id="hizligiris" href="hizligiris.php"><?=getTranslation('menuhizlikupongiris')?></a></li>
</ul>
</div>

<div id="serviceBox" class="asideBox">
<h1><?=getTranslation('menusistemmenu')?></h1>
<ul>
<li><a id="profil" href="profil.php"><?=getTranslation('menubilgilerim')?></a></li>
<li><a id="sifredegistir" href="sifredegistir.php"><?=getTranslation('menusifredegistir')?></a></li>
<li><a id="sistemackapat" href="sistemackapat.php"><?=getTranslation('menusistemackapat')?></a></li>
</ul>
</div>

<div id="serviceBox" class="asideBox">
<h1><?=getTranslation('menuuyelik')?></h1>
<ul>
<li><a id="users2" href="users.php"><?=getTranslation('menuuyelistesi')?></a></li>
<li><a id="adduseradmin" href="adduseradmin.php"><?=getTranslation('menuuyeolustur')?></a></li>
<li><a id="girislog2" href="girislog.php"><?=getTranslation('menugirisloglari')?></a></li>
<li><a id="karaliste" href="karaliste.php"><?=getTranslation('menukaraliste')?></a></li>
<li><a id="krediekle" href="krediekle.php"><?=getTranslation('menukrediekle')?></a></li>
</ul>
</div>

<div id="serviceBox" class="asideBox">
<h1><?=getTranslation('menubahisyonetimi')?></h1>
<ul>
<li><a id="spordallari2" href="spordallari.php"><?=getTranslation('menusporlar')?></a></li>
<li><a id="oyunlar" href="oyunlar.php"><?=getTranslation('menuoyunlar')?></a></li>
<li><a id="oyunlar_canli" href="oyunlar_canli.php"><?=getTranslation('menucanlioyunlar')?></a></li>
<li><a id="bahisler2" href="bahisler.php"><?=getTranslation('menubahisler')?></a></li>
<li><a id="canlibahisler" href="canlibahisler.php"><?=getTranslation('menucanlibahisler')?></a></li>
<li><a id="ligler" href="ligler.php"><?=getTranslation('menuligler')?></a></li>
<li><a id="toplumbs2" href="toplumbs.php"><?=getTranslation('menutoplumbs')?></a></li>
<li><a id="oranmetre" href="oranmetre.php"><?=getTranslation('menucanlioranmetre')?></a></li>
<li><a id="macoranarttirazalt" href="macoranarttirazalt.php"><?=getTranslation('menumacoranarttirazalt')?></a></li>
<li><a id="ayar2" href="ayar2.php"><?=getTranslation('menuayarlar')?></a></li>
</ul>
</div>

<div id="serviceBox" class="asideBox">
<h1><?=getTranslation('menuhizmetler')?></h1>
<ul>
<li><a id="duyurular" href="duyurular.php"><?=getTranslation('menuduyurular')?></a></li>
<li><a id="yaziciayar" href="yaziciayar.php"><?=getTranslation('menuyaziciayarlari')?></a></li>
<li><a id="mesajlar" href="mesajlar.php"><?=getTranslation('mesajpaneli1')?> ( <? if($mesajvarmimenuicin>0) { ?><?=$mesajvarmimenuicin;?><? } else { ?>0<? } ?> )</a></li>

</ul>
</div>

<?php } ?>

</div>
</div>