<?php
 require_once "const.php"; 

  function long_chaine($chaine){
    $i=0;
     while(!empty($chaine[$i])){    
          $i++;
      }
      return $i;
    }

  //function testant si une caractere est numerique
 function is_car_numeric($num){
    if($num>="0" && $num<="9"){
    return true;} 
    return false;
  }
   //function testant si une caractere est alphabetique
  function is_car_alpha($alpha){
        if(long_chaine($alpha)==1 && ($alpha >='a'&& $alpha <='z')|| ($alpha >='A'&& $alpha <='Z'))
          return true;
      return false;
  }
//function testant si une chaine est alphabetique
function is_chaine_alpha($strg){

  for($i = 0; $i<long_chaine($strg); $i++){
    if(!is_car_alpha($strg[$i])) return false;
  }
  return true;
}
//function testant si une chaine est alphabetique
function is_chaine_numeric($strg){
    for($i = 0; $i<long_chaine($strg); $i++){
      if(!is_car_numeric($strg[$i])) return false;
     }
  return true;
}
//caratere present dans une chaine
function is_car_present_in_chaine($st,$strg){

  for($i = 0; $i<long_chaine($strg); $i++){
    if(($strg[$i])== $st) return true;
  }
  return false;
}
//inverser la case
  function invers_car_case($car){
    $min ="a";
    $maj ="A";
       if(is_car_alpha($car)!=true){
          return $car;
        }else{
            for($i= 0; $i<26 ; $i++){
               if($min===$car){
                    return $maj;
                } elseif($maj===$car) {
                     return $min;
                } 
                $min++;
                $maj++;
             }
          }
    }
    
  //   function invers_car_case($car){
  //     $min = 'a';
  //     $max = 'A';
  //     if(long_chaine($car)==1){
  //        for ($i=0; $i < 26; $i++) { 
  //            if ($car==$min) {
  //                return $max;
  //            }elseif ($car==$max) {
  //                return $min;
  //            }
  //            $min++;
  //            $max++;
  //        }
  //     }
  //     return $car;
  // }

//verifie si la lettre m se trouve dans le mot
function ContientlettreM(array $t){
  $nbreMotLettreMm=0;
      foreach($t as $value){
          if(preg_match("/[m|M]+/",$value)){
               $nbreMotLettreMm++;
          }
      }
      return $nbreMotLettreMm;
}
    // function qui test si une variable est vide
   function is_empty($chaine){
          if(long_chaine( $chaine) ==0) return true;
      return false;
  }
  //suprimer des espace de devant et de derrier
  
    function delete_spc_before_after($chaine){
      $debut=0;
      $fin=long_chaine($chaine)-1;
      $newChaine = '';
         if($chaine==''){ return $chaine; }
        while ($chaine[$debut]==' '){
          $debut++; 
          if(!isset($chaine[$debut])){
              return '';
          } 
      }
      while ($chaine[$fin]==' '){ $fin--; }
        for ($i=$debut; $i <=$fin ; $i++) { 
            $newChaine.=$chaine[$i];
          }
      return $newChaine;
  }
  function print_error($tab){
    $chaine = "";
    for ($i= 0 ;$i<count($tab); $i++){
         $chaine .= $tab[$i]." - ";
    }
    return $chaine;
}

