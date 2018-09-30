<?php
namespace App\Services;
use App\Helper\NepaliCalender;
use App\Helper\Conversion;
use Carbon\carbon;

class NepaliDateFormat {
    public static function returnCarbonDate($date){
        $date_of_purchase_arr = explode(',',$date);
        $day = $date_of_purchase_arr[0];
        $month_n_date = explode(' ',trim($date_of_purchase_arr[1]));// space is in 0
        $month = $month_n_date[0]; 
        $date = $month_n_date[1];
        $year = $date_of_purchase_arr[2];

        $myyear =  Conversion::getNumeralString(trim($year));
        $mymonth =  Conversion::nep_to_eng_month(trim($month));
        $mydate = Conversion::getNumeralString(trim($date));

        $cal = new NepaliCalender();
        $k = $cal->nep_to_eng($myyear,$mymonth,$mydate);
        
        $english_date = Carbon::createFromDate($k['year'], $k['month'], $k['date'])->toDateString();
        return $english_date;

    }
    public static function returnFinacialYear($date){
        $date_of_purchase_arr = explode(',',$date);
        $day = $date_of_purchase_arr[0];
        $month_n_date = explode(' ',trim($date_of_purchase_arr[1]));// space is in 0
        $month = $month_n_date[0];
        $year = $date_of_purchase_arr[2];

        $myyear =  Conversion::getNumeralString(trim($year));
        $mymonth =  Conversion::nep_to_eng_month(trim($month));

        if($mymonth < 4){
            
             $fy = substr($myyear,-2)-1;
             $sy = substr($myyear,-2);
             return $fy.'/'.$sy;
             
           
        }
        else if($mymonth >= 4){
            $fy =  substr($myyear,-2);
            $sy = substr($myyear,-2)+1;
            return $fy.'/'.$sy;
        }
        

    }

   

}

?>