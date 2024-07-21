<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

if (!CModule::IncludeModule("iblock"))
{
    ShowMessage(GetMessage("IBLOCK_ERROR"));
    return false;
}
// Получение списка типов инфоблоков
$dbIBlockTypes = CIBlockType::GetList(array("SORT"=>"ASC"), array("ACTIVE"=>"Y"));
while ($arIBlockTypes = $dbIBlockTypes->GetNext())
{
    $paramIBlockTypes[$arIBlockTypes["ID"]] = $arIBlockTypes["ID"];
}




$arSelect = array('IBLOCK_ID', 'ID', 'NAME', 'SECTION_ID');
$dbIBlockSection = CIBlockSection::GetList(array("SORT"=>"ASC"), array("ACTIVE"=>"Y"), $arSelect);
while ($arIBlockSection = $dbIBlockSection->GetNext())
{
    $paramIBlockSection[$arIBlockSection["ID"]] = "[" . $arIBlockSection["ID"] . "] " . $arIBlockSection["NAME"];
    
    
}


// Получение списка инфоблоков заданного типа
$dbIBlocks = CIBlock::GetList(
    array(
        "SORT"  =>  "ASC"
    ),
    array(
        "ACTIVE"    =>  "Y",
        "TYPE"      =>  $arCurrentValues["IBLOCK_TYPE"],
    ));
while ($arIBlocks = $dbIBlocks->GetNext())
{
    $paramIBlocks[$arIBlocks["ID"]] = "[" . $arIBlocks["ID"] . "] " . $arIBlocks["NAME"];
}

// Формирование массива параметров
$arComponentParameters = array(
    "GROUPS" => array(
    ),
    "PARAMETERS" => array(
        "IBLOCK_TYPE"   =>  array(
            "PARENT"    =>  "BASE",
            "NAME"      => "Тип инфобока",
            "TYPE"      =>  "LIST",
            "VALUES"    =>  $paramIBlockTypes,
            "REFRESH"   =>  "Y",
            "MULTIPLE"  =>  "N",
        ),
        "IBLOCK_ID" =>  array(
            "PARENT"    =>  "BASE",
            "NAME"      =>  "ID инфоблока",
            "TYPE"      =>  "LIST",
            "VALUES"    =>  $paramIBlocks,
            "REFRESH"   =>  "Y",
            "MULTIPLE"  =>  "N",
        ),
        "IBLOCK_SECTION" =>  array(
            "PARENT"    =>  "BASE",
            "NAME"      =>  "Раздел инфоблока",
            "TYPE"      =>  "LIST",
            "VALUES"    =>  $paramIBlockSection,
            "REFRESH"   =>  "Y",
            "MULTIPLE"  =>  "N",
        ),
        "IBLOCK_TITLE" => array(
            "PARENT"=> "BASE",
            "NAME"=>"Заголовок для списка файлов из раздела",
            "TYPE" => "STRING",
            "DEFAULT"=> null,
        ),
    ),
);

?>

<?/*if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$dbIBlockTypes = CIBlockType::GetList(array("SORT"=>"ASC"), array("ACTIVE"=>"Y"));
while ($arIBlockTypes = $dbIBlockTypes->GetNext())
{
    $paramIBlockTypes[$arIBlockTypes["ID"]] = $arIBlockTypes["ID"];
}

// Получение списка инфоблоков заданного типа
$dbIBlocks = CIBlock::GetList(
    array(
        "SORT"  =>  "ASC"
    ),
    array(
        "ACTIVE"    =>  "Y",
        "TYPE"      =>  $arCurrentValues["IBLOCK_TYPE"],
    ));
while ($arIBlocks = $dbIBlocks->GetNext())
{
    $paramIBlocks[$arIBlocks["ID"]] = "[" . $arIBlocks["ID"] . "] " . $arIBlocks["NAME"];
}

$arComponentParameters = array(
    "PARAMETERS" => array(
        
        'IBLOCK_TYPE' => array(                  // ключ массива $arParams в component.php
            'PARENT' => 'TEST',                  // название группы
            'NAME' => 'Выберите тип инфоблока',  // название параметра
            'TYPE' => 'LIST',                    // тип элемента управления, в котором будет устанавливаться параметр
            "VALUES" =>  $paramIBlockTypes,//входные значения
            'REFRESH' => 'Y',                    // перегружать настройки или нет после выбора (N/Y)
            'DEFAULT' => 'news',                 // значение по умолчанию
            'MULTIPLE' => 'N',                   // одиночное/множественное значение (N/Y)
        ),
        // выбор самого инфоблока
        'IBLOCK_ID' => array(
            'PARENT' => 'BASE',
            'NAME' => 'Выберите родительский инфоблок',
            'TYPE' => 'LIST',
           "VALUES"  =>  $paramIBlocks,
            'REFRESH' => 'Y',
            "DEFAULT" => '',
            "ADDITIONAL_VALUES" => "Y",
        ),
        // настройки кэширования
        'CACHE_TIME' => array(
            'DEFAULT' => 3600
        ),
        "FILE" => array(
            "PARENT" => "BASE",
            "NAME" => "Файл",
            "TYPE" => "FILE",
            "FD_UPLOAD" => true,
            "MULTIPLE" => "Y",
            "ADDITIONAL_VALUES" => "Y",
            "DEFAULT" => "",

        ),
        "SKILLS"=> array(
            "PARENT"=> "BASE",
            "NAME"=>"Название файла",
            "TYPE" => "STRING",
            "MULTIPLE" => "Y",
            "ADDITIONAL_VALUES" => "Y",
            "DEFAULT"=> null,
        )

       
    )
)*/

?>