<?php 



 
 
$harmonyShows .= '
<div class="harmonyaccordion">';


 foreach( $dataJson->harmonyTitle as $key=>$value){

  $harmonyShows .='<button class="harmonyaccordion-btn"> <h5>'.$value.'</h5> <span> ↓</span> </button>
  <div class="harmonyaccordion-content">
      '.$dataJson->harmonyContent[$key].'
  </div>';

 };

$harmonyShows .= '</div>';




;?>