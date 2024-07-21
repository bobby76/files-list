<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

class ListFileClass extends CBitrixComponent {
    public function listFiles($sk){

        $arResult["IBLOCK_TYPE"] = $sk["IBLOCK_TYPE"];
        $arResult["IBLOCK_ID"] = $sk["IBLOCK_ID"];
        $arResult["IBLOCK_SECTION"] = $sk["IBLOCK_SECTION"];
        $arResult["IBLOCK_TITLE"] = $sk["IBLOCK_TITLE"];

        return $arResult;

    }
}


?>