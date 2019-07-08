<?php 
echo $_POST['datebirth'];
   $sendDate = explode("-", $_POST['datebirth']);

  function checkunder20($day,$month,$year){
    if((date('Y')- $year) >= 20 && (date('Y') - $year) <= 120 ){
      if(date('m') - $month >= 0 ){
        if(date('d') - $day >= 0 ){
          return true;
        }
      }
    }else{
      return false;
    }
  }

if (checkunder20($sendDate[2], $sendDate[1], $sendDate[0]) ) {
      echo json_encode(
        array(
          "success" => true,
          "message" => "upper 18"
        )
      );
 } else { 
  echo json_encode(
    array(
      "success" => false,
      "message" => "under 18"
    )
  );
}

  ?>