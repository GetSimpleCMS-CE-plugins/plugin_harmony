<style>
	.harmony-file{
		display:grid;
		align-items: center;
		grid-template-columns: 1fr 1fr 120px;
		width:100%;
		margin-top: 10px;
		border-bottom:solid 1px #ddd;
		padding-bottom: 10px;
		padding-left: 5px;
		padding-right: 5px;
	}
	.copybutton { display: inline-block; position: relative; vertical-align: middle; }
	.copybutton img { transition: transform 0.3s; width:22px; }
	.copybutton:hover img { transform: scale(1.2); }
	.copybutton:active img { transform: scale(0.8); }
	.shortcode{font-size:small; background-color:#f1f1f1; padding:3px 5px; border:1px solid #B2B2B2; margin-right:5px; border-radius: 5px;}
	.tpl{color:royalblue;}
	.cke{color:hotpink;}
</style>

<h3><?php echo i18n_r('harmony/LANG_Harmony_Modules'); ?>  🪗</h3>

<?php
	global $SITEURL;
	global $GSADMIN;
;?>

<div class="my-3">
	<a href="<?php echo $SITEURL.$GSADMIN.'/load.php?id=harmony&addHarmony';?>" style="padding: 10px; background: #007bff; color:#fff; text-decoration: none; display: inline-block; border-radius: 5px;"><?php echo i18n_r('harmony/LANG_Add_New'); ?></a>
	<a href="<?php echo $SITEURL.$GSADMIN.'/load.php?id=harmony&helpHarmony';?>" style="padding: 10px; background: #000; color:#fff; text-decoration: none; display: inline-block; border-radius: 5px;"><?php echo i18n_r('harmony/LANG_Help'); ?></a>
</div>

<hr>

<ul style="margin:0;padding:0;">
	<li class="harmony-file">
		<b><?php echo i18n_r('harmony/LANG_Name'); ?></b>
		<b><?php echo i18n_r('harmony/LANG_Shortcode'); ?></b>
		<b><?php echo i18n_r('harmony/LANG_Edit'); ?></b>
	</li>

	<?php 
		foreach(glob(GSPLUGINPATH.'harmony/harmonyList/*.json') as $file){
			$name =pathinfo($file)['filename'];
			echo '
			<li class="harmony-file">
				<b>'.$name.'</b>
				
				<div>
					<span id="' . $name . '" class="shortcode cke">[% harmony='.$name.' %]</span>
					<a href="javascript:;" class="copybutton">
					<image id="copy-' . $name . '" data-clipboard-target="#' . $name . '" src=" data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAQAAABKfvVzAAAAIGNIUk0AAHomAACAhAAA+gAAAIDoAAB1MAAA6mAAADqYAAAXcJy6UTwAAAACYktHRAAAqo0jMgAAAAlwSFlzAAAAYAAAAGAA8GtCzwAAAAd0SU1FB+cFFgkEJsO3fd8AAADQSURBVDjLvZM7CsJAFEWP0SKSUlJoOi2yiDSJK3ALFindUMBSV2HAzyJEQVHxU0gqm5QWAXWSyWdAPeV9c7nzLjPwa2pS1cPHFJQ7AXMATXp8hpPSHELcvNQpR/SUpnNikpfQZk+c0mJ2dAAaEsOjaGmZYahqiKoYCooU0VSLTBJ8ztipZnS2+NkMrbxIAJr0uOYtLdJijIGNRfBOKGeFx6JaQsQgu4MC/zLc6GYe9KtIkeTHuYRc2AgTG4t+0swndQAOLDAxhMmaEUvVC3+DJ4xiLDPLiEozAAAAJXRFWHRkYXRlOmNyZWF0ZQAyMDIzLTA1LTIyVDA5OjA0OjM4KzAwOjAwa+wQugAAACV0RVh0ZGF0ZTptb2RpZnkAMjAyMy0wNS0yMlQwOTowNDozOCswMDowMBqxqAYAAAAodEVYdGRhdGU6dGltZXN0YW1wADIwMjMtMDUtMjJUMDk6MDQ6MzgrMDA6MDBNpInZAAAAAElFTkSuQmCC"></a>
				</div>

				<div class="harmony-file-btn">
					<a style="width:100px; padding:10px; background:#007bff; color:#fff; text-decoration:none; border-radius: 5px;" href="load.php?id=harmony&addHarmony&editharmony='.$name.'">'. i18n_r('harmony/LANG_Edit').'</a>
					<a style="width:100px; padding:10px; background:red; color:#fff; text-decoration:none; border-radius: 5px;" onclick="return confirm(`'. i18n_r('harmony/LANG_Are_you_sure').'`);" href="load.php?id=harmony&deleteharmony='.$name.'" title="'. i18n_r('harmony/LANG_Delete').'">✕</a>
				</div>
				
				<script>
					document.getElementById("copy-' . $name . '").addEventListener("click", copyCodeToClipboard);
					function copyCodeToClipboard() {
					  const codeSnippet = document.getElementById("' .  $name . '");
					  const range = document.createRange();
					  range.selectNode(' .  $name . ');
					  const selection = window.getSelection();
					  selection.removeAllRanges();
					  selection.addRange(range);
					  document.execCommand("copy");
					  selection.removeAllRanges();
					}
				</script>
			</li>';
		}
	;?>
</ul>