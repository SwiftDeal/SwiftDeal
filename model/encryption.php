<?php
/** 
**Encryption
**/
class Encryption{

    var $key;
    var $text;

    function Encryption(){
      $this->key="ImrIMTsENcRYptiOnKey"; /// key to encrypt with
    }

/**
** Function to encrypt the text using the key.
** Returns numeric values for each character concatinated togather.
**/

   function encrypt(){
       $lenText=strlen($this->text);
       $lenKey=strlen($this->key);
       $str="";
       $j=0;
       for($i=0;$i<$lenText;$i++,$j++){
           if($j==$lenKey){
               $j=0;
           }   
           $val=(ord($this->text[$i])*2)+ord($this->key[$j]);
        $str.=$val;   
       }
       return $str;
   }


/**
** Function to encrypt the text using the key.
** Returns the text from the encrypted numeric value.
**/

   function decrypt(){
   $temp=$this->text;
   $temptext=array();
   $templen=strlen($temp);
   for($i=0,$j=0;$i<$templen;$i=$i+3,$j++){
       $temptext[$j]=substr($this->text,$i,3);
   }
       $lenText=count($temptext);
       $lenKey=strlen($this->key);
       $str="";
       
       for($i=0,$j=0;$i<$lenText;$i++,$j++){
           if($j==$lenKey){
               $j=0;
           }   
           $val=$temptext[$i]-ord($this->key[$j]);
           $val=$val/2;
           $str.=chr($val);
       }
       return $str;
   }
}
?>