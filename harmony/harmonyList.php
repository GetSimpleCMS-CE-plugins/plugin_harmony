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
</style>

<h3>Harmony modules list</h3>

<?php

global $SITEURL;
global $GSADMIN;


;?>

<div class="my-3">
<a href="<?php echo $SITEURL.$GSADMIN.'/load.php?id=harmony&addHarmony';?>" 
style="padding: 10px;background: black; color:#fff;text-decoration: none;display: inline-block;"
    >Add new</a>
<a href="<?php echo $SITEURL.$GSADMIN.'/load.php?id=harmony&helpHarmony';?>" 

style="padding: 10px;background: red; color:#fff;text-decoration: none;display: inline-block;"
    >Help</a>
</div>


<hr>

<ul style="margin:0;padding:0;">

<li class="harmony-file">
    <b>name</b>
    <b>shortcode</b>
    <b>buttons</b>
</li>


<?php 
foreach(glob(GSPLUGINPATH.'harmony/harmonyList/*.json') as $file){

    $name =pathinfo($file)['filename'];

    echo '
<li class="harmony-file">
    <b>'.$name.'</b>

    <div>


     
        [% harmony='.$name.' %]
     
    </div>


    <div class="harmony-file-btn">

    <a 
    style="width:100px;padding:10px;background:#000;color:#fff; text-decoration:none;"
     href="load.php?id=harmony&addHarmony&editharmony='.$name.'">Edit</a>
    <a  
style="width:100px;padding:10px;background:red;color:#fff; text-decoration:none;"
     onclick="return confirm(`Are you sure you want to delete this item?`);" 
   href="load.php?id=harmony&deleteharmony='.$name.'">Delete</a>

    </div>

</li>';

}
;?>


</ul>

