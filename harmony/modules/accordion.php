<?php 


$harmonyShows .= '<div class="accordion " id="accordionExample">
';


foreach($dataJson->harmonyTitle as $key=>$value){
    $harmonyShows .= '<div class="card">
    <div class="card-header" id="headingOne">
      <h2 class="mb-0">
        <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#'.$name.$key.'" aria-expanded="true" aria-controls="collapseOne">
         '.$value.'
        </button>
      </h2>
    </div>';

    
    $harmonyShows .= ' <div id="'.$name.$key.'" class="collapse " aria-labelledby="headingOne" data-parent="#accordionExample">
    <div class="card-body">
     '.$dataJson->harmonyContent[$key].'
    </div>
  </div>
</div>';

};

 

$harmonyShows.= '</div>';


;?>