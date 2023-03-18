<?php
session_start();
include 'db.php';
if($ub['wkyetki']<2) { header("Location:kasa"); }
if(isset($_SESSION['betuser'])) { $user = $_SESSION['betuser']; } else { header("Location:login.php"); die(); exit(); }
?>
<script src="js/jquery-1.7.2.min.js"></script>
<script src="js/jquery-ui-1.8.21.custom.min.js"></script>
<script src="js/mousehold.js"></script>
<link rel="stylesheet" type="text/css" href="assets/css/css2.css">
<?php include 'header.php'; ?>
<link rel="stylesheet" type="text/css" href="/assets/YhgdfAS/YhgdfAS.css?v=3.4.8"/>
<script type="text/javascript" src="/assets/YhgdfAS/YhgdfAS.js?v=3.4.8"></script>
<script>
var A_TCALCONF={'cssprefix':'tcal','months':['<?=getTranslation('tarihsecmeay_1');?>','<?=getTranslation('tarihsecmeay_2');?>','<?=getTranslation('tarihsecmeay_3');?>','<?=getTranslation('tarihsecmeay_4');?>','<?=getTranslation('tarihsecmeay_5');?>','<?=getTranslation('tarihsecmeay_6');?>','<?=getTranslation('tarihsecmeay_7');?>','<?=getTranslation('tarihsecmeay_8');?>','<?=getTranslation('tarihsecmeay_9');?>','<?=getTranslation('tarihsecmeay_10');?>','<?=getTranslation('tarihsecmeay_11');?>','<?=getTranslation('tarihsecmeay_12');?>'],'weekdays':['<?=getTranslation('tarihsecmegun_kisa_1');?>','<?=getTranslation('tarihsecmegun_kisa_2');?>','<?=getTranslation('tarihsecmegun_kisa_3');?>','<?=getTranslation('tarihsecmegun_kisa_4');?>','<?=getTranslation('tarihsecmegun_kisa_5');?>','<?=getTranslation('tarihsecmegun_kisa_6');?>','<?=getTranslation('tarihsecmegun_kisa_7');?>'],'longwdays':['<?=getTranslation('tarihsecmegun_1');?>','<?=getTranslation('tarihsecmegun_2');?>','<?=getTranslation('tarihsecmegun_3');?>','<?=getTranslation('tarihsecmegun_4');?>','<?=getTranslation('tarihsecmegun_5');?>','<?=getTranslation('tarihsecmegun_6');?>','<?=getTranslation('tarihsecmegun_7');?>'],'yearscroll':true,'weekstart':0,'prevyear':'Previous Year','nextyear':'Next Year','prevmonth':'Previous Month','nextmonth':'Next Month','format':'d-m-Y'};
</script>
<style>
#wrapper .box-static {
  display: block;
  background: #fff;
  border: 1px solid #999;
  padding: 0;
}
#wrapper .box-static .sky-form {
  overflow: hidden;
}
#wrapper .box-static h2 {
  padding: 12px 0px 4px 12px;
  color: #f74835;
  font-size: 16px;
  font-weight: normal;
  line-height: 20px;
  border-bottom: 3px solid #f74835;
}
#wrapper .box-static .box-title {
  position: relative;
}
#wrapper .box-static .box-title.with-padd {
  padding: 0 10px;
}
#wrapper .box-static .box-title .back-button {
  display: block;
  position: absolute;
  right: 5px;
  top: 5px;
}
#wrapper .box-static .box_action {
  padding: 0 10px;
  height: 42px;
  margin-bottom: 20px;
}
#wrapper .box-static .box-title {
  position: relative;
}
#wrapper .box-static .box-title.with-padd {
  padding: 0 10px;
}
#wrapper .box-static .box-title .back-button {
  display: block;
  position: absolute;
  right: 5px;
  top: 5px;
}
#wrapper .box-static .box_action {
  padding: 0 10px;
  height: 42px;
  margin-bottom: 20px;
}
#wrapper .box-static .box_action table {
  margin: 10px auto;
  height: 42px;
  background: url('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAtwAAAAqCAIAAAAPnxsTAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAA2hpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuMy1jMDExIDY2LjE0NTY2MSwgMjAxMi8wMi8wNi0xNDo1NjoyNyAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wTU09Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9tbS8iIHhtbG5zOnN0UmVmPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvc1R5cGUvUmVzb3VyY2VSZWYjIiB4bWxuczp4bXA9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC8iIHhtcE1NOk9yaWdpbmFsRG9jdW1lbnRJRD0ieG1wLmRpZDowNDgwMTE3NDA3MjA2ODExODA4MzlENDUxRUU0M0MxNyIgeG1wTU06RG9jdW1lbnRJRD0ieG1wLmRpZDpCOTkzMzU4MThGMEExMUUyQTc3MUUwOEE5RjQ3OTE4OCIgeG1wTU06SW5zdGFuY2VJRD0ieG1wLmlpZDpCOTkzMzU4MDhGMEExMUUyQTc3MUUwOEE5RjQ3OTE4OCIgeG1wOkNyZWF0b3JUb29sPSJBZG9iZSBQaG90b3Nob3AgQ1M2IChNYWNpbnRvc2gpIj4gPHhtcE1NOkRlcml2ZWRGcm9tIHN0UmVmOmluc3RhbmNlSUQ9InhtcC5paWQ6MDg4MDExNzQwNzIwNjgxMTgwODM5RDQ1MUVFNDNDMTciIHN0UmVmOmRvY3VtZW50SUQ9InhtcC5kaWQ6MDQ4MDExNzQwNzIwNjgxMTgwODM5RDQ1MUVFNDNDMTciLz4gPC9yZGY6RGVzY3Jp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') no-repeat left top;
}
#wrapper .box-static .box_action table.step2 {
  background: url('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAtwAAAAqCAIAAAAPnxsTAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAA2hpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuMy1jMDExIDY2LjE0NTY2MSwgMjAxMi8wMi8wNi0xNDo1NjoyNyAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wTU09Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9tbS8iIHhtbG5zOnN0UmVmPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvc1R5cGUvUmVzb3VyY2VSZWYjIiB4bWxuczp4bXA9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC8iIHhtcE1NOk9yaWdpbmFsRG9jdW1lbnRJRD0ieG1wLmRpZDowNDgwMTE3NDA3MjA2ODExODA4MzlENDUxRUU0M0MxNyIgeG1wTU06RG9jdW1lbnRJRD0ieG1wLmRpZDoxNjMwNjI1NjhGMEQxMUUyQTc3MUUwOEE5RjQ3OTE4OCIgeG1wTU06SW5zdGFuY2VJRD0ieG1wLmlpZDoxNjMwNjI1NThGMEQxMUUyQTc3MUUwOEE5RjQ3OTE4OCIgeG1wOkNyZWF0b3JUb29sPSJBZG9iZSBQaG90b3Nob3AgQ1M2IChNYWNpbnRvc2gpIj4gPHhtcE1NOkRlcml2ZWRGcm9tIHN0UmVmOmluc3RhbmNlSUQ9InhtcC5paWQ6MDg4MDExNzQwNzIwNjgxMTgwODM5RDQ1MUVFNDNDMTciIHN0UmVmOmRvY3VtZW50SUQ9InhtcC5kaWQ6MDQ4MDExNzQwNzIwNjgxMTgwODM5RDQ1MUVFNDNDMTciLz4gPC9yZGY6RGVzY3Jp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') no-repeat left top;
}
#wrapper .box-static .box_action table.step3 {
  background: url('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAtwAAAAqCAIAAAAPnxsTAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAA2hpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuMy1jMDExIDY2LjE0NTY2MSwgMjAxMi8wMi8wNi0xNDo1NjoyNyAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wTU09Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9tbS8iIHhtbG5zOnN0UmVmPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvc1R5cGUvUmVzb3VyY2VSZWYjIiB4bWxuczp4bXA9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC8iIHhtcE1NOk9yaWdpbmFsRG9jdW1lbnRJRD0ieG1wLmRpZDowNDgwMTE3NDA3MjA2ODExODA4MzlENDUxRUU0M0MxNyIgeG1wTU06RG9jdW1lbnRJRD0ieG1wLmRpZDoxNjMwNjI1QThGMEQxMUUyQTc3MUUwOEE5RjQ3OTE4OCIgeG1wTU06SW5zdGFuY2VJRD0ieG1wLmlpZDoxNjMwNjI1OThGMEQxMUUyQTc3MUUwOEE5RjQ3OTE4OCIgeG1wOkNyZWF0b3JUb29sPSJBZG9iZSBQaG90b3Nob3AgQ1M2IChNYWNpbnRvc2gpIj4gPHhtcE1NOkRlcml2ZWRGcm9tIHN0UmVmOmluc3RhbmNlSUQ9InhtcC5paWQ6MDg4MDExNzQwNzIwNjgxMTgwODM5RDQ1MUVFNDNDMTciIHN0UmVmOmRvY3VtZW50SUQ9InhtcC5kaWQ6MDQ4MDExNzQwNzIwNjgxMTgwODM5RDQ1MUVFNDNDMTciLz4gPC9yZGY6RGVzY3Jp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') no-repeat left top;
}
#wrapper .box-static .box_action table td {
  width: 245px;
  font-size: 12px;
  padding-top: 2px;
  padding-left: 44px;
  padding-right: 11px;
  color: #000;
}
#wrapper .box-static .box_action table td.active {
  color: #fff;
}
#wrapper .box-static .box-content {
  padding: 10px;
}
#wrapper .box-static .box-content .box_action {
  height: 42px;
  margin-bottom: 20px;
  background: url("http://cdn.megmagaming.com/static/web/assets/images/steps_1.png") no-repeat center top;
}
#wrapper .box-static .box-content .information {
  display: block;
  line-height: 40px;
  margin-bottom: 50px;
}
#wrapper .box-static .box-content .form-lists .form-fields {
  display: block;
  width: 50%;
  margin: 0 auto;
}
#wrapper .box-static .box-content .form-lists .form-fields .form-group.row label {
  color: #666;
  padding: 3px 0;
}
#wrapper .box-static .box-content .form-lists .form-fields .form-group.row .form-control {
  height: 25px;
}
#wrapper .box-static .box-content .form-lists .form-fields .form-group.row .ui-select-bootstrap .ui-select-placeholder {
  line-height: 25px;
}
#wrapper .box-static .box-content .form-lists .form-fields .form-group.row .ui-select-bootstrap .ui-select-toggle .caret {
  background: url(data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTkuMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iQ2FwYV8xIiB4PSIwcHgiIHk9IjBweCIgdmlld0JveD0iMCAwIDI1NiAyNTYiIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDI1NiAyNTY7IiB4bWw6c3BhY2U9InByZXNlcnZlIiB3aWR0aD0iMjRweCIgaGVpZ2h0PSIyNHB4Ij4KPGc+Cgk8Zz4KCQk8cG9seWdvbiBwb2ludHM9IjIyNS44MTMsNDguOTA3IDEyOCwxNDYuNzIgMzAuMTg3LDQ4LjkwNyAwLDc5LjA5MyAxMjgsMjA3LjA5MyAyNTYsNzkuMDkzICAgIiBmaWxsPSIjMmE3Mzk0Ii8+Cgk8L2c+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPC9zdmc+Cg==) no-repeat left top;
  background-size: 80% 80%;
  top: 30%;
  right: 0;
  height: 18px;
}
#wrapper .box-static .box-content .form-lists .form-fields .form-group.row .ui-select-bootstrap .ui-select-toggle .caret:before {
  width: 34px;
  height: 24px;
  left: -5px;
  top: -5px;
}
#wrapper .box-static .box-content .form-lists .form-fields .form-group.row .ui-select-bootstrap p {
  margin-bottom: 0;
  font-size: 11px;
}
#wrapper .box-static .box-content .form-lists .form-fields .form-group.row .ui-select-match-text {
  line-height: 24px;
  font-weight: bold;
}
#wrapper .box-static .box-content .form-lists .form-fields .form-group.row .dropdown-menu {
  border-radius: 0;
}
#wrapper .box-static .box-content .form-lists .form-fields b.tooltip {
  width: 91.6%;
  padding: 6px;
  left: 15px !important;
  box-shadow: none;
  border: none;
}
#wrapper .box-action {
  display: block;
  clear: both;
  height: 42px;
  padding: 0 16px;
  margin-top: 20px;
}
.table {
  width: 100%;
  max-width: 100%;
  margin-bottom: 20px;
}
.table > thead > tr > th,
.table > tbody > tr > th,
.table > tfoot > tr > th,
.table > thead > tr > td,
.table > tbody > tr > td,
.table > tfoot > tr > td {
  padding: 8px;
  line-height: 1.42857143;
  vertical-align: top;
  border-top: 1px solid #ddd;
}
.table > thead > tr > th {
  vertical-align: bottom;
  border-bottom: 2px solid #ddd;
}
.table > caption + thead > tr:first-child > th,
.table > colgroup + thead > tr:first-child > th,
.table > thead:first-child > tr:first-child > th,
.table > caption + thead > tr:first-child > td,
.table > colgroup + thead > tr:first-child > td,
.table > thead:first-child > tr:first-child > td {
  border-top: 0;
}
.table > tbody + tbody {
  border-top: 2px solid #ddd;
}
.table .table {
  background-color: #fff;
}
.table-condensed > thead > tr > th,
.table-condensed > tbody > tr > th,
.table-condensed > tfoot > tr > th,
.table-condensed > thead > tr > td,
.table-condensed > tbody > tr > td,
.table-condensed > tfoot > tr > td {
  padding: 5px;
}
.table-bordered {
  border: 1px solid #ddd;
}
.table-bordered > thead > tr > th,
.table-bordered > tbody > tr > th,
.table-bordered > tfoot > tr > th,
.table-bordered > thead > tr > td,
.table-bordered > tbody > tr > td,
.table-bordered > tfoot > tr > td {
  border: 1px solid #ddd;
}
.table-bordered > thead > tr > th,
.table-bordered > thead > tr > td {
  border-bottom-width: 2px;
}
.table-striped > tbody > tr:nth-of-type(odd) {
  background-color: #f9f9f9;
}
.table-hover > tbody > tr:hover {
  background-color: #f5f5f5;
}
table col[class*="col-"] {
  position: static;
  display: table-column;
  float: none;
}
table td[class*="col-"],
table th[class*="col-"] {
  position: static;
  display: table-cell;
  float: none;
}
.table > thead > tr > td.active,
.table > tbody > tr > td.active,
.table > tfoot > tr > td.active,
.table > thead > tr > th.active,
.table > tbody > tr > th.active,
.table > tfoot > tr > th.active,
.table > thead > tr.active > td,
.table > tbody > tr.active > td,
.table > tfoot > tr.active > td,
.table > thead > tr.active > th,
.table > tbody > tr.active > th,
.table > tfoot > tr.active > th {
  background-color: #f5f5f5;
}
.table-hover > tbody > tr > td.active:hover,
.table-hover > tbody > tr > th.active:hover,
.table-hover > tbody > tr.active:hover > td,
.table-hover > tbody > tr:hover > .active,
.table-hover > tbody > tr.active:hover > th {
  background-color: #e8e8e8;
}
.table > thead > tr > td.success,
.table > tbody > tr > td.success,
.table > tfoot > tr > td.success,
.table > thead > tr > th.success,
.table > tbody > tr > th.success,
.table > tfoot > tr > th.success,
.table > thead > tr.success > td,
.table > tbody > tr.success > td,
.table > tfoot > tr.success > td,
.table > thead > tr.success > th,
.table > tbody > tr.success > th,
.table > tfoot > tr.success > th {
  background-color: #dff0d8;
}
.table-hover > tbody > tr > td.success:hover,
.table-hover > tbody > tr > th.success:hover,
.table-hover > tbody > tr.success:hover > td,
.table-hover > tbody > tr:hover > .success,
.table-hover > tbody > tr.success:hover > th {
  background-color: #d0e9c6;
}
.table > thead > tr > td.info,
.table > tbody > tr > td.info,
.table > tfoot > tr > td.info,
.table > thead > tr > th.info,
.table > tbody > tr > th.info,
.table > tfoot > tr > th.info,
.table > thead > tr.info > td,
.table > tbody > tr.info > td,
.table > tfoot > tr.info > td,
.table > thead > tr.info > th,
.table > tbody > tr.info > th,
.table > tfoot > tr.info > th {
  background-color: #d9edf7;
}
.table-hover > tbody > tr > td.info:hover,
.table-hover > tbody > tr > th.info:hover,
.table-hover > tbody > tr.info:hover > td,
.table-hover > tbody > tr:hover > .info,
.table-hover > tbody > tr.info:hover > th {
  background-color: #c4e3f3;
}
.table > thead > tr > td.warning,
.table > tbody > tr > td.warning,
.table > tfoot > tr > td.warning,
.table > thead > tr > th.warning,
.table > tbody > tr > th.warning,
.table > tfoot > tr > th.warning,
.table > thead > tr.warning > td,
.table > tbody > tr.warning > td,
.table > tfoot > tr.warning > td,
.table > thead > tr.warning > th,
.table > tbody > tr.warning > th,
.table > tfoot > tr.warning > th {
  background-color: #fcf8e3;
}
.table-hover > tbody > tr > td.warning:hover,
.table-hover > tbody > tr > th.warning:hover,
.table-hover > tbody > tr.warning:hover > td,
.table-hover > tbody > tr:hover > .warning,
.table-hover > tbody > tr.warning:hover > th {
  background-color: #faf2cc;
}
.table > thead > tr > td.danger,
.table > tbody > tr > td.danger,
.table > tfoot > tr > td.danger,
.table > thead > tr > th.danger,
.table > tbody > tr > th.danger,
.table > tfoot > tr > th.danger,
.table > thead > tr.danger > td,
.table > tbody > tr.danger > td,
.table > tfoot > tr.danger > td,
.table > thead > tr.danger > th,
.table > tbody > tr.danger > th,
.table > tfoot > tr.danger > th {
  background-color: #f2dede;
}
.table-hover > tbody > tr > td.danger:hover,
.table-hover > tbody > tr > th.danger:hover,
.table-hover > tbody > tr.danger:hover > td,
.table-hover > tbody > tr:hover > .danger,
.table-hover > tbody > tr.danger:hover > th {
  background-color: #ebcccc;
}
.table-responsive {
  min-height: .01%;
  overflow-x: auto;
}
@media screen and (max-width: 767px) {
  .table-responsive {
    width: 100%;
    margin-bottom: 15px;
    overflow-y: hidden;
    -ms-overflow-style: -ms-autohiding-scrollbar;
    border: 1px solid #ddd;
  }
  .table-responsive > .table {
    margin-bottom: 0;
  }
  .table-responsive > .table > thead > tr > th,
  .table-responsive > .table > tbody > tr > th,
  .table-responsive > .table > tfoot > tr > th,
  .table-responsive > .table > thead > tr > td,
  .table-responsive > .table > tbody > tr > td,
  .table-responsive > .table > tfoot > tr > td {
    white-space: nowrap;
  }
  .table-responsive > .table-bordered {
    border: 0;
  }
  .table-responsive > .table-bordered > thead > tr > th:first-child,
  .table-responsive > .table-bordered > tbody > tr > th:first-child,
  .table-responsive > .table-bordered > tfoot > tr > th:first-child,
  .table-responsive > .table-bordered > thead > tr > td:first-child,
  .table-responsive > .table-bordered > tbody > tr > td:first-child,
  .table-responsive > .table-bordered > tfoot > tr > td:first-child {
    border-left: 0;
  }
  .table-responsive > .table-bordered > thead > tr > th:last-child,
  .table-responsive > .table-bordered > tbody > tr > th:last-child,
  .table-responsive > .table-bordered > tfoot > tr > th:last-child,
  .table-responsive > .table-bordered > thead > tr > td:last-child,
  .table-responsive > .table-bordered > tbody > tr > td:last-child,
  .table-responsive > .table-bordered > tfoot > tr > td:last-child {
    border-right: 0;
  }
  .table-responsive > .table-bordered > tbody > tr:last-child > th,
  .table-responsive > .table-bordered > tfoot > tr:last-child > th,
  .table-responsive > .table-bordered > tbody > tr:last-child > td,
  .table-responsive > .table-bordered > tfoot > tr:last-child > td {
    border-bottom: 0;
  }
}
.table-list tbody tr.highlight-red {
    background-color: rgba(157, 12, 28, 0.15);
}

.table-list tbody tr.highlight-red td {
    border-color: #efefef;
}
.table-list tbody tr.highlight-red td:last-child {
    border-right: 2px solid #c70000;
}
.table-list tbody tr.highlight-green {
    background-color: rgba(76, 174, 76, 0.1);
}
.table-list tbody tr.highlight-green td:last-child {
    border-right: 2px solid #40986e;
}

.zindexyukselt {
    z-index: 33 !important;
}
#ui-datepicker-div .ui-state-hover a, .ui-state-hover a:hover, #ui-datepicker-div .ui-state-hover a:link, #ui-datepicker-div .ui-state-hover a:visited, #ui-datepicker-div .ui-state-active, #ui-datepicker-div .ui-widget-content .ui-state-active, #ui-datepicker-div .ui-widget-header .ui-state-active, #ui-datepicker-div .ui-state-active a, #ui-datepicker-div .ui-state-active a:link, #ui-datepicker-div .ui-state-active a:visited {
    color: #f74835 !important;
    border: 1px solid #fbd850;
    background: #fff url(players/img/ui-bg_glass_65_ffffff_1x400.png) 50% 50% repeat-x;
    font-weight: bold;
}
</style>
<body style="background-image: url('img/main_bg.jpg');">
<div id="content" class="left">

<div id="main_wide">
<div class="e_active e_noCache " id="comp-myContent">
<div id="mybettings" class="margin_r_12">
<div class="space_20"></div>
<div class="space clear"></div>
<div class="e_active e_noCache status" id="_common_errorMessage"></div>
<div>
<div>
<table class="tab_box_2">
<tbody>
<tr>
<td id="sayi_1_durum" class="tab_2_select on"><a href="javascript:;" onclick="kazananlar_islem(1);"><?=getTranslation('kuponlarimozel1')?></a></td>
<td id="sayi_2_durum" class="tab_2_select"><a href="javascript:;" onclick="kazananlar_islem(2);"><?=getTranslation('selectoptioncikarilanlar')?></a></td>
<td id="sayi_3_durum" class="tab_2_select"><a href="javascript:;" onclick="kazananlar_islem(3);"><?=getTranslation('selectoptioneklenenler')?></a></td>
<td class="tab_2_empty">&nbsp;</td>
</tr>
<tr>
<td colspan="6" style="height: 32px; border: 1px solid #cccccc;">
<div class="tab_2_cont num_1" style="float:left'">
<div class="drop_box">
<div class="drop_layer" id="drop_layer">
<div id="drop_1" class="box_main left button_drop grey" onclick="drop_menue('drop_1');" onmouseout="close_menue('drop_1')">
<div id="ust_tarafi_aciklama" class="drop_title"><?=getTranslation('kuponlarimozel6')?></div>

<div class="drop_down">

<div class="hide" id="menue_drop_1" style="display: none;">
<div><a class="grey" href="javascript:;" onclick="kazananlar_islem(4);"><?=getTranslation('kuponlarimozel6')?></a></div>
<div><a class="grey" href="javascript:;" onclick="kazananlar_islem(5);"><?=getTranslation('kuponlarimozel7')?></a></div>
<div><a class="grey" href="javascript:;" onclick="kazananlar_islem(6);"><?=getTranslation('kuponlarimozel8')?></a></div>
<div><a class="grey" href="javascript:;" onclick="kazananlar_islem(7);"><?=getTranslation('kuponlarimozel9')?></a></div>
<div><a class="grey" href="javascript:;" onclick="kazananlar_islem(8);"><?=getTranslation('kuponlarimozel10')?></a></div>
<div><a class="grey" href="javascript:;" onclick="kazananlar_islem(9);"><?=getTranslation('kuponlarimozel11')?></a></div>
</div>

</div>
</div>
</div>

<div id="datepicker" style="display:none;float:right; text-transform: capitalize;">

<input type="text" style="height: 25px;width: 92px;" class="firstNameNew ng-invalid ng-invalid-required ng-valid-pattern ng-dirty placeholder inputText tcal tcalInput" id="datepickerFrom" name="datepickerFrom" autocomplete="off" value="<?=date("d-m-Y",strtotime('Last Tuesday')); ?>" size="7">

<input type="text" style="height: 25px;width: 92px;" class="firstNameNew ng-invalid ng-invalid-required ng-valid-pattern ng-dirty placeholder inputText tcal tcalInput" id="datepickerTo" name="datepickerTo" autocomplete="off" value="<?=date("d-m-Y"); ?>" size="7">

<button class="btn btn-primary" onclick="raporgetir(10);"><?=getTranslation('mobilara')?></button>

</div>

</div>
</div>
</td>
</tr>
</tbody>
</table>
</div>
<div class="space_9 clear"></div>
<div class="space_9"></div>

<div id="kuponlar_getir"></div>

<div class="space"></div>
<div id="tooltip_10">
<div id="tooltip_10_a"></div>
<div id="tooltip_10_b"></div>
</div>
</div>
</div>
</div>

</div>
</div>

<? include 'sag.php'; ?>

<input type="hidden" id="rapor_tarih1" value="1">
<input type="hidden" id="rapor_tarih2" value="0">
<input type="hidden" id="rapor_tip" value="">
<input type="hidden" id="rapor_pageper" value="10">

<script>
function kazananlar_islem(val){
	if(val==1){
		$("#rapor_tip").val('');
		$("#sayi_1_durum").addClass('on');
		$("#sayi_2_durum").removeClass('on');
		$("#sayi_3_durum").removeClass('on');
		$("#datepicker").hide();
		raporgetir(1,1);
	} else if(val==2){
		$("#rapor_tip").val('cikar');
		$("#sayi_1_durum").removeClass('on');
		$("#sayi_2_durum").addClass('on');
		$("#sayi_3_durum").removeClass('on');
		$("#datepicker").hide();
		raporgetir(1,1);
	} else if(val==3){
		$("#rapor_tip").val('ekle');
		$("#sayi_1_durum").removeClass('on');
		$("#sayi_2_durum").removeClass('on');
		$("#sayi_3_durum").addClass('on');
		$("#datepicker").hide();
		raporgetir(1,1);
	} else if(val==4){
		$("#rapor_tarih1").val(1);
		$("#rapor_tarih2").val(0);
		$("#ust_tarafi_aciklama").html("<?=getTranslation('kuponlarimozel6')?>");
		$("#datepicker").hide();
		raporgetir(1,1);
	} else if(val==5){
		$("#rapor_tarih1").val(2);
		$("#rapor_tarih2").val(0);
		$("#ust_tarafi_aciklama").html("<?=getTranslation('kuponlarimozel7')?>");
		$("#datepicker").hide();
		raporgetir(1,1);
	} else if(val==6){
		$("#rapor_tarih1").val(3);
		$("#rapor_tarih2").val(0);
		$("#ust_tarafi_aciklama").html("<?=getTranslation('kuponlarimozel8')?>");
		$("#datepicker").hide();
		raporgetir(1,1);
	} else if(val==7){
		$("#rapor_tarih1").val(4);
		$("#rapor_tarih2").val(0);
		$("#ust_tarafi_aciklama").html("<?=getTranslation('kuponlarimozel9')?>");
		$("#datepicker").hide();
		raporgetir(1,1);
	} else if(val==8){
		$("#rapor_tarih1").val(5);
		$("#rapor_tarih2").val(0);
		$("#ust_tarafi_aciklama").html("<?=getTranslation('kuponlarimozel10')?>");
		$("#datepicker").hide();
		raporgetir(1,1);
	} else if(val==9){
		$("#rapor_tarih1").val(3);
		$("#rapor_tarih2").val(0);
		$("#ust_tarafi_aciklama").html("<?=getTranslation('kuponlarimozel11')?>");
		$("#datepicker").show();
	} else if(val==10){
		$("#rapor_pageper").val(10);
		$("#ust_tarafi_aciklama").html("<?=getTranslation('kuponlarimozel6')?>");
		$("#datepicker").hide();
		raporgetir(1,1);
	} else if(val==11){
		$("#rapor_pageper").val(20);
		$("#ust_tarafi_aciklama").html("<?=getTranslation('kuponlarimozel6')?>");
		$("#datepicker").hide();
		raporgetir(1,1);
	} else if(val==12){
		$("#rapor_pageper").val(30);
		$("#ust_tarafi_aciklama").html("<?=getTranslation('kuponlarimozel6')?>");
		$("#datepicker").hide();
		raporgetir(1,1);
	}
}
function raporgetir(val, sayfaveri) {

if(val=="10") {
	var tarih1 = $("#datepickerFrom").val();
	var tarih2 = $("#datepickerTo").val();
} else {
	var tarih1 = $("#rapor_tarih1").val();
	var tarih2 = $("#rapor_tarih2").val();
}

$("#suanval").val(1);
$("#kuponlar_getir").html('<div id="delay_layer" class="overlay_layer"><div class="innerWrap"><div class="contentBlock"><div class="headline"><?=getTranslation('lutfen1')?> <span class="highlighted"><?=getTranslation('lutfen2')?></span></div><div class="bodyText"><?=getTranslation('lutfen3')?></div><div class="progressbar"><div class="progressbarInner"></div></div></div></div></div>');
var rapor_tip = $("#rapor_tip").val();
var pageper = $("#rapor_pageper").val();
var rand = Math.random();
$.get('ajax.php?a=kuponraporum&sayfa='+sayfaveri+'&rand='+rand+'&pageper='+pageper+'&tarih1='+tarih1+'&tarih2='+tarih2+'&islemtip='+rapor_tip+'',function(data) { $("#kuponlar_getir").html(data);
});
}
$(document).ready(function(e) {
raporgetir(1,1);
});
</script>
<?php include 'footer.php'; ?>
</body>
</html>