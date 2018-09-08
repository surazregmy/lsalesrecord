<?php
namespace App\Helper;
class Conversion {

    public static function getNumeralString($numberString){    
        $out = '';
        for($i = 0; $i < strlen($numberString); $i = $i+3){
            $nep_num = substr($numberString,$i,3); // for some reason nepali numbers take 3 char
            $out =$out.Conversion::nep_to_eng_date($nep_num);
        }
        return $out;
    }

    public static function nep_to_eng_date($nos){
        $n = '';
        switch($nos){   
            case "०": $n = 0; break;
            case "१": $n = 1; break;
            case "२": $n= 2; break;
            case "३": $n = 3; break;
            case "४": $n = 4; break;
            case "५": $n = 5; break;
            case "६": $n = 6; break;
            case "७": $n = 7; break;
            case "८": $n = 8; break;
            case "९": $n = 9; break;
            case "0": $n = "०"; break;
            case "1": $n = "१"; break;
            case "2": $n = "२"; break;
            case "3": $n = "३"; break;
            case "4": $n = "४"; break;
            case "5": $n = "५"; break;
            case "6": $n = "६"; break;
            case "7": $n = "७"; break;
            case "8": $n = "८"; break;
            case "9": $n = "९"; break;
        }
        return $n;
        
    } 

    public static function nep_to_eng_month($nos){
        $n = '';
        switch($nos){   
            case "बैशाख": $n = 1; break;
            case "जेठ": $n = 2; break;
            case "असार": $n= 3; break;
            case "सावन": $n = 4; break;
            case "भदौ": $n = 5; break;
            case "असोज": $n = 6; break;
            case "कार्तिक": $n = 7; break;
            case "मंसिर": $n = 8; break;
            case "पौष": $n = 9; break;
            case "माघ": $n = 10; break;
            case "फागुन": $n = 11; break;
            case "चैत": $n = 12; break;
        }
        return $n;
        
    } 
    public static function nep_to_eng_day($nos){
        $n = '';
        switch($nos){   
            case "आईत": $n ="Sun"; break;
            case "सोम": $n= "Mon"; break;
            case "मंगल": $n = "Tue"; break;
            case "बुध": $n = "Wed"; break;
            case "बिही": $n = "Thus"; break;
            case "शुक्र": $n = "Fri"; break;
            case "शनि": $n = "Sat"; break;
        }
        return $n;
        
    } 

}

?>