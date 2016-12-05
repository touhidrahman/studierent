<?php
namespace App\View\Helper;
use Cake\View\Helper;

class ProperHelper extends Helper {
  // @author Norman Lista
    //Properhelper For other html tags needed
    
      public function check_set_amenities($amenitie){
        $check="null";
      if($amenitie){
       $check='<i class="fa fa-check"></i>';
      } 
      else{
       $check='<i class="fa fa-times"></i>';
      }
     return $check;
    }   
    
    
}

?>
