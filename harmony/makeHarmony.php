<script type="text/javascript" src="template/js/ckeditor/ckeditor.js?t=3.3.18"></script>

<style>
	.harmony-item{
		position: relative;
		padding-top: 30px !important;
	}

	.closeHarmony{
		position:absolute;
		top:5px;
		right:5px;
		background:red !important;
		border:none;
		color:#fff;
	}
</style>

<?php
	global $SITEURL;
	global $GSADMIN;
;?>

<h3><?php echo i18n_r('harmony/LANG_Create_Harmony'); ?></h3>

<button style="background: #007bff; border:none; padding:0.5rem 1rem; color:#fff; cursor:pointer; border-radius: 5px;" class="addHarmonyItem"><?php echo i18n_r('harmony/LANG_Add_Item'); ?></button>
<button onclick="event.preventDefault();history.back()" style="background: #000; color:#fff; padding:0.5rem 1rem; display: inline-block; margin-bottom: 10px; border:none; cursor:pointer; border-radius: 5px;"><?php echo i18n_r('harmony/LANG_Back_to_List'); ?></button> 
<hr>

<form method="post">
	<label for="title" style="width:100%;padding:10px;box-sizing: border-box;"><?php echo i18n_r('harmony/LANG_Module_Title'); ?></label>
	<input type="text" placeholder="<?php echo i18n_r('harmony/LANG_Placeholder'); ?>" style="width:100%; padding:10px; box-sizing: border-box;"
	<?php 
		if(isset($_GET['editharmony'])){
			echo 'value="'.$_GET['editharmony'].'"';
		};
	?>
	id="title" name="title" pattern="[a-zA-Z0-9]+" required>

	<hr>

	<select name="style" style="width:100%;padding:10px;box-sizing: border-box;margin:10px 0">
		<option value="harmony-accordion"
		<?php 
		 if(isset($_GET['editharmony'])){
			$arrayItem = file_get_contents(GSPLUGINPATH.'harmony/harmonyList/'.$_GET['editharmony'].'.json');
			$jsonArray = json_decode($arrayItem);
			if($jsonArray->style == 'harmony-accordion'){
				echo 'selected';
			}
		 };
		?>
		><?php echo i18n_r('harmony/LANG_Harmony_Accordion'); ?></option>

		<option value="harmony-tabs" 
		<?php 
		 if(isset($_GET['editharmony'])){
			$arrayItem = file_get_contents(GSPLUGINPATH.'harmony/harmonyList/'.$_GET['editharmony'].'.json');
			$jsonArray = json_decode($arrayItem);

			if($jsonArray->style == 'harmony-tabs'){
				echo 'selected';
			}
		 };
		?>
		><?php echo i18n_r('harmony/LANG_Harmony_Tabs'); ?></option>

		<option value="accordion"
		<?php 
		 if(isset($_GET['editharmony'])){
			$arrayItem = file_get_contents(GSPLUGINPATH.'harmony/harmonyList/'.$_GET['editharmony'].'.json');
			$jsonArray = json_decode($arrayItem);
			if($jsonArray->style == 'accordion'){
				echo 'selected';
			}
		 };
		?>
		><?php echo i18n_r('harmony/LANG_Bootstrap_Accordion'); ?></option>

		<option value="tabs" 
		<?php 
		 if(isset($_GET['editharmony'])){
			$arrayItem = file_get_contents(GSPLUGINPATH.'harmony/harmonyList/'.$_GET['editharmony'].'.json');
			$jsonArray = json_decode($arrayItem);

			if($jsonArray->style == 'tabs'){
				echo 'selected';
			}
		 };
		?>
		><?php echo i18n_r('harmony/LANG_Bootstrap_Tabs'); ?></option>
	</select>

	<div class="harmony-list">
		<?php 
			if(isset($_GET['editharmony'])){

				$arrayItem = file_get_contents(GSPLUGINPATH.'harmony/harmonyList/'.$_GET['editharmony'].'.json');
				$jsonArray = json_decode($arrayItem);

				if($jsonArray->harmonyTitle !==null){

					foreach($jsonArray->harmonyTitle as $key=>$value){

						echo '  
						<div class="harmony-item" style="border:solid 1px #ddd; background:#fafafa; padding:10px; margin:10px 0;">
							<button  class="closeHarmony btn btn-danger btn-sm" onclick="event.preventDefault();this.parentNode.remove()" style="cursor:pointer; border-radius: 5px;" title="'. i18n_r('harmony/LANG_Delete') .'">✕</button>
						
							<label style="margin-bottom:10px">'.$value.'</label>
							<input type="text" class="form-control" style="width:100%; padding:10px; box-sizing:border-box;"  value="'.$value.'"  name="harmonyTitle[]">
							<br>
							
							<label style="margin:10px 0">Content</label>
							<textarea name="harmonyContent[]" id="newser'.$key.'" class="formcontrol tinycontent">'.$jsonArray->harmonyContent[$key].'</textarea>
						</div>';

						echo "
						<script>
							var editor = CKEDITOR.replace( 'newser".$key."', {
								skin : 'getsimple',
								forcePasteAsPlainText : true,
								defaultLanguage : 'en',
								entities : false,
								// uiColor : '#FFFFFF',
								height: '250px',
								baseHref : '".$SITEURL."',
								tabSpaces:10,
								filebrowserBrowseUrl : 'filebrowser.php?type=all',
								filebrowserImageBrowseUrl : 'filebrowser.php?type=images',
								filebrowserWindowWidth : '730',
								filebrowserWindowHeight : '500'
								,toolbar: 'basic'										
							});
						</script>
						";

					};
				};
			}
		;?>
	</div>

	<input type="submit" name="createHarmony" value="<?php echo i18n_r('harmony/LANG_Save_Harmony_Module'); ?>" style="background: #006600; border:none; padding:0.7rem 1rem; color:#fff; cursor:pointer; border-radius: 5px;">
</form>

<script>
    const addHarmonyItem = document.querySelector('.addHarmonyItem');
    const harmonyList = document.querySelector('.harmony-list');
 
	let counters = 0;

    addHarmonyItem.addEventListener('click',(e)=>{
        e.preventDefault();

        harmonyList.insertAdjacentHTML('beforeend',`
        <div class="harmony-item" style="border:solid 1px #ddd; background:#fafafa; padding:10px; margin:10px 0;">
			<button class="closeHarmony btn btn-danger btn-sm" style="cursor:pointer;" onclick="event.preventDefault();this.parentNode.remove()" title="<?php echo i18n_r('harmony/LANG_Delete'); ?>">✕</button>

			<label style="margin-bottom:10px;"><?php echo i18n_r('harmony/LANG_Title2'); ?></label>
			<input type="text" style="width:100%;padding:10px;box-sizing:border-box;"  name="harmonyTitle[]">
			<br>

			<label style="margin:10px 0"><?php echo i18n_r('harmony/LANG_Content'); ?></label>
			<textarea name="harmonyContent[]" id="editors${counters}" class="formcontrol tinycontent"></textarea>
        </div>
        `);

		var editor = CKEDITOR.replace( 'editors'+counters, {
			skin : 'getsimple',
			forcePasteAsPlainText : true,
			defaultLanguage : 'en',
			entities : false,
			// uiColor : '#FFFFFF',
			height: '250px',
			baseHref : '".$SITEURL."',
			tabSpaces:10,
			filebrowserBrowseUrl : 'filebrowser.php?type=all',
			filebrowserImageBrowseUrl : 'filebrowser.php?type=images',
			filebrowserWindowWidth : '730',
			filebrowserWindowHeight : '500'
			,toolbar: 'basic'										
		});

		counters++;
    }); 
</script>

<?php 
	if(isset($_POST['createHarmony'])){
		$newJson = [];
		$newJson['harmonyTitle'] = @$_POST['harmonyTitle'];
		$newJson['harmonyContent'] = @$_POST['harmonyContent'];
		$newJson['style'] = $_POST['style'];
		$newJsonContent = json_encode($newJson);
		file_put_contents(GSPLUGINPATH.'harmony/harmonyList/'.$_POST['title'].'.json',$newJsonContent);

		if(isset($_GET['editharmony'])){

			if($_GET['editharmony']!==$_POST['harmonyTitle']){
				rename(GSPLUGINPATH.'harmony/harmonyList/'.$_GET['editharmony'].'.json', GSPLUGINPATH.'harmony/harmonyList/'.$_POST['title'].'.json');

				echo("<script>window.location.href = '".$SITEURL.$GSADMIN."/load.php?id=harmony&addHarmony&editharmony=".$_POST['title']."'</script>");
			};
		};

		if(!isset($_GET['editharmony'])){
			echo("<script>window.location.href = '".$SITEURL.$GSADMIN."/load.php?id=harmony'</script>");
		}else{
			echo("<script>window.location.href = '".$SITEURL.$GSADMIN."/load.php?id=harmony&addHarmony&editharmony=".$_GET['editharmony']."'</script>");
		}
	};
;?>