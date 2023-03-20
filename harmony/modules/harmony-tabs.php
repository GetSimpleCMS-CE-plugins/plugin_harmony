<?php 

 
  $harmonyShows .= '<div class="harmonytab"> <div class="harmonytab-list">';
   
  foreach($dataJson->harmonyTitle as $key=>$value){

    $harmonyShows.= '
    <button class="harmonytab-btn">'.$value.'</button>';

  };

  $harmonyShows .= '</div>';


  foreach($dataJson->harmonyContent as $key=>$value){

    $harmonyShows .='<div class="harmonytab-content ">
    '.$value.'
     </div>';

  };


 
$harmonyShows .= '</div>';
 


;?>