<?php 


$harmonyShows .= '
  <nav>
  <div class="nav nav-tabs '.$name.'" id="nav-tab" role="tablist">';

  foreach($dataJson->harmonyTitle as $key=>$value){

    $harmonyShows.=  '
    <button class="nav-link" 
    id="nav-home-tab" data-toggle="tab" data-target="#'.$name.$key.'" type="button" role="tab" 
    aria-controls="nav-home" aria-selected="false">'.$value.'</button>
';

  };

  
  $harmonyShows.= '</div>
</nav>
<div class="tab-content  '.$name.'" id="nav-tabContent">';

foreach($dataJson->harmonyContent as $key=>$value){

    $harmonyShows.=  ' <div class="tab-pane fade show" id="'.$name.$key.'" role="tabpanel" aria-labelledby="nav-home-tab"><br>'.
    $value
    .'</div>';

};
$harmonyShows.=  '</div>';


$harmonyShows.= '<script>
 document.querySelector(".'.$name.' .nav-link").classList.add("active");
 document.querySelector(".'.$name.' .tab-pane").classList.add("show","active");
 
 </script>';


;?>