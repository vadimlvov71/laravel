<?php 
// Code within app\Helpers\Helper.php

namespace App\Helpers;

class Helper
{
	public static function localeType($name, $locale)
    {
		if($locale == "ru"){
			$array["hotels"] = "гостиницы";
			$array["private_sector"] = "частный сектор";
			$array["opis"] = "описание курорта";
			$array["dosts"] = "достопримечательности";
		}else{
			$array["hotels"] = "готелі";
			$array["private_sector"] = "приватний сектор";
			$array["opis"] = "опис курорту";
			$array["dosts"] = "пам'ятки";
		}
		return $array[$name];
	}
    public static function rubricMenu($pageName)
    {
		$name_hotels = "гостиницы";
		$name_privates = "частный сектор";
		$name_opis = "описание курорта";
		
		$menu[] = array('url' => "", "name_ru" => $pageName, "name_ua" => $pageName);
		$menu[] = array('url' => "hotels", "name_ru" => "гостиницы", "name_ua" => "готелі");
		$menu[] = array('url' => "private_sector", "name_ru" => "частный сектор", "name_ua" => "приватний сектор");
		$menu[] = array('url' => "info", "name_ru" => "описание курорта", "name_ua" => "опис курорту");
		$menu[] = array('url' => "dosts", "name_ru" => "достопримечательности", "name_ua" => "пам'ятки");
		
        return $menu;
    }
    public static function getHotelTypeQuery($type_hotel){
		if($type_hotel != "chastnyi-sektor" && $type_hotel != "private-sektor"){
			$sektor = "0";
		}else{
			$sektor = "1";
		}
		if($type_hotel == "gostevye_doma"){
		    $paraQuery[0] = "type";
			$paraQuery[1] =  "12";
		}else if($type_hotel == "pansionati"){
		    $paraQuery[0] = "type";
			$paraQuery[1] =  "2";
		}else if($type_hotel == "bazi_otdyha"){
			$paraQuery[0] = "type";
			$paraQuery[1] =  "3";
		}else if($type_hotel == "sanatorii"){
		    $paraQuery[0] = "type";
			$paraQuery[1] =  "5";
		}else if($type_hotel == "sauna_banya_hotel"){
			$paraQuery[0] = "spa";
			$paraQuery[1] =  "1";
		}else if($type_hotel == "Bassein"){
			$paraQuery[0] = "bassein";
			$paraQuery[1] =  "1";
		}else if($type_hotel == "Children"){
			$paraQuery[0] = "deti_more";
			$paraQuery[1] =  "1";
		}else if($type_hotel == "Rybalka"){
			$paraQuery[0] = "rybalka";
			$paraQuery[1] =  "1";
		}else if($type_hotel == "Beach"){
			$paraQuery[0] = "plyazh";
			$paraQuery[1] =  "1";
		}else if($type_hotel == "Korporative"){
			$paraQuery[0] = "corporative";
			$paraQuery[1] =  "1";	
		}else if($type_hotel == "mini_hoteli"){
		    $paraQuery[0] = "type";
			$paraQuery[1] =  "6";
		}else if($type_hotel == "vip_rest"){
			$paraQuery[0] = "sector";
			$paraQuery[1] =  "1";
		}else if($type_hotel == "ellingi"){
		    $paraQuery[0] = "type";
			$paraQuery[1] =  "13";
		}else if($type_hotel == "shale"){
		    $paraQuery[0] = "type";
			$paraQuery[1] =  "14";
		}else if($type_hotel == "kvartyry-posutochno"){
		    $paraQuery[0] = "type";
			$paraQuery[1] =  "15";
		}else if($type_hotel == "nedorogie-hotels"){
		   $paraQuery[0] = "sector";
			$paraQuery[1] =  "3";
		}else if($type_hotel == "best-hotels"){
		   $paraQuery[0] = "sector";
			$paraQuery[1] =  "2";
		}else if($type_hotel == "comfortable-hotels"){
		   $paraQuery[0] = "sector";
			$paraQuery[1] =  "2";
		}else if($type_hotel == "private_sector"){
			$paraQuery[0] = "sektor";
			$paraQuery[1] =  "1";
			//$paraQuery = $sektor;
		}else if($type_hotel == "hotels"){
			$paraQuery[0] = "sektor";
			$paraQuery[1] =  "0";
		}
		return $paraQuery;
	}
	public static function getHotelTypeUrl($type){
		$replace = array("0" => "hotels", "1" => "private_sector");
		return $replace[$type];
	}
}
