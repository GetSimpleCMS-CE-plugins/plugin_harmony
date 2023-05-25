<?php

 
# get correct id for plugin
$thisfile=basename(__FILE__, ".php");
 
# register plugin
register_plugin(
	$thisfile, //Plugin id
	'Harmony', 	//Plugin name
	'1.0', 		//Plugin version
	'Multicolor',  //Plugin author
	'http://www.paypal.me/multicol0r/', //author website
	'Easy accordion and tabs creator based on Bootstrap and prebuild styles', //Plugin description
	'pages', //page type - on which admin tab to display
	'harmonyOptions'  //main function (administration)
);
 
# activate filter 
 
# add a link in the admin tab 'theme'
add_action('pages-sidebar','createSideMenu',array($thisfile,'Harmony Settings'));
 

 
function harmonyOptions() {

if(isset($_GET['addHarmony'])){

include (GSPLUGINPATH.'harmony/makeHarmony.php');

}elseif(isset($_GET['helpHarmony'])){
include (GSPLUGINPATH.'harmony/help.php');

}else{

include (GSPLUGINPATH.'harmony/harmonyList.php');

};


    echo '
    
<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_blank" style="box-sizing:border-box;display:grid; width:100%;grid-template-columns:1fr auto; padding:10px;background:#fafafa;border:solid 1px #ddd;margin-top:20px;">
    <p style="margin:0;padding:0;"> If you like use my plugin! Buy me ☕ </p>
    <input type="hidden" name="cmd" value="_s-xclick">
    <input type="hidden" name="hosted_button_id" value="KFZ9MCBUKB7GL">
    <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donate_SM.gif" name="submit" title="PayPal - The safer, easier way to pay online!" alt="Donate with PayPal button" border="0">
    <img alt="" src="https://www.paypal.com/en_PL/i/scr/pixel.gif" width="1" height="1" border="0">
</form>
';


//post function


            if(isset($_GET['deleteharmony'])){

            unlink(GSPLUGINPATH.'harmony/harmonyList/'.$_GET['deleteharmony'].'.json');
echo("<script>window.location.href = '".$SITEURL.$GSADMIN."/load.php?id=harmony'</script>");
         }; 
};


    function harmonyShow($name){

        $modules = array();
        $name = $name[1];
        $data = file_get_contents(GSPLUGINPATH. 'harmony/harmonyList/' . $name . '.json');
        $dataJson = json_decode($data, false);

        $style = $dataJson->style;  

        $harmonyShows = '';


if($style == 'tabs'){
include(GSPLUGINPATH.'harmony/modules/tabs.php');
 };

 if($style == 'accordion'){
    include(GSPLUGINPATH.'harmony/modules/accordion.php');
     };

      if($style == 'harmony-accordion'){
    include(GSPLUGINPATH.'harmony/modules/harmony-accordion.php');
     };

      if($style == 'harmony-tabs'){
    include(GSPLUGINPATH.'harmony/modules/harmony-tabs.php');
     };
return $harmonyShows;

};


function shortcodeHarmony(){

global $content;
 $newcontentHarmony = preg_replace_callback('/\\[% harmony=(.*) %\\]/i','harmonyShow',$content);
 	$content = $newcontentHarmony;
}

add_action('theme-header','shortcodeHarmony');


function styleHarmony(){
global $SITEURL;
echo '<link rel="stylesheet" href="'.$SITEURL.'plugins/harmony/css/harmony-accordion.css">';
echo '<link rel="stylesheet" href="'.$SITEURL.'plugins/harmony/css/harmony-tab.css">';
};


function scriptHarmony(){
global $SITEURL;
echo '<script src="'.$SITEURL.'plugins/harmony/js/harmony-accordion.js"></script>';
echo '<script src="'.$SITEURL.'plugins/harmony/js/harmony-tab.js"></script>';
}


add_action('theme-header','styleHarmony');
add_action('theme-footer','scriptHarmony');


 

?>