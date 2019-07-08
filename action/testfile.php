<?php
$pizza  = "2018-03-26";
// echo strtotime($pizza);
// echo "<br>";
// echo strtotime(date("Y-m-d"));
// echo "<br>year: " .$pieces[0] ."<Br>";
// echo "month: " .$pieces[1] ."<Br>";
// echo "day: " .$pieces[2] ."<Br><br>";
$date = $_POST['datebirth'];

echo $_POST['datebirth']."<br>";
echo date("Y-m-d")."<br>";

echo strtotime(date("Y-m-d"))."<br>";
echo strtotime("1996-10-10")."<br>";

echo strtotime("now") - strtotime($_POST['datebirth'])."<br>";
echo "31536000 <bR>";

if( strtotime(date("Y-m-d")) - strtotime($_POST['datebirth']) < 31536000 ){
  echo "สมัครได้";
}else{
  echo "ขออภัยอายุต่ำกว่า 20 หรือมากกว่า 120 ปีไม่สามารถสมัครสมาชิกได้";
}


// function check20($year, $month, $day) {
//   if(date('Y') - $year > 20 ){
//     return true;
//   }else if(date('Y') - $year = 20 ){
//     if(date('m') - $month > 0){
//       return true;
//     }
//     if(date('m') - $month = 0){
//       if(date('d') - $day > 0){
//         return true;
//       }
//     }
//   }else{
//     return false;
//   }
// }

// function check20($year, $month, $day) {
//   if(date('Y') - $year > 20 ){
//     return true;
//   }else if(date('Y') - $year == 20 ){
//     if(date('m') - $month > 0){
//       return true;
//     }
//     if(date('m') - $month == 0){
//       if(date('d') - $day > 0){
//         return true;
//       }
//     }
//   }else{
//     return false;
//   }
// }

// function check120($year, $month, $day) {
//   if(date('Y') - $year < 120 ){
//     return true;
//   }else if(date('Y') - $year == 120 ){
//     if(date('m') - $month < 0){
//       return true;
//     }
//     if(date('m') - $month == 0){
//       if(date('d') - $day < 0){
//         return true;
//       }
//     }
//   }else{
//     return false;
//   }
// }
      
  // if(check20($sendyear, $sendmonth, $sendday)){ 
  //   $response["datebirth"] = array(
  //     "success" => true
  //   );
  //   $anddate = true;
  // }else{
  //   $response["datebirth"] = array(
  //     "success" => false,
  //     "message" => "ขออภัยอายุต่ำกว่า 20 หรือมากกว่า 120 ปีไม่สามารถสมัครสมาชิกได้"
  //   );
  //    $anddate = false;
  // }
  
  // if(check120($sendyear, $sendmonth, $sendday) && $anddate){ 
  //   $response["datebirth"] = array(
  //     "success" => true
  //   );
  // }else{
  //   $response["datebirth"] = array(
  //     "success" => false,
  //     "message" => "ขออภัยอายุต่ำกว่า 20 หรือมากกว่า 120 ปีไม่สามารถสมัครสมาชิกได้"
  //   );
  // }


	//  function check120 ($bday, $bmon, $byr) {
	// 	if (date('Y') - $byr > 20) { 
  //             return true; 
  //       }
	// 	if (date('Y') - $byr = 20) { 
	// 		if (date('m') - $bmon > 0) { 
  //               return true; 
  //           }
	// 		if (date('m') - $bmon = 0) {
	// 			if (date('d') - $bday >= 0) { 
  //                   return true; 
  //               }
	// 		}
  //       }
	// 	return false;
	//  }
?>