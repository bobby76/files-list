<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
    CJSCore::Init(array("jquery"));
?>


<div class="infoblock">
    <div class="infoblock__title"><?=$arResult["IBLOCK_TITLE"]?><span class="dropdownicon"></span></div>
    <div class="infoblock__links">
        <ul>
            <? if (CModule::IncludeModule("iblock")):
                $arSelect = Array("ID", "IBLOCK_ID", "NAME", "DATE_ACTIVE_FROM","PROPERTY_FILELINK");
                $arFilter = Array("IBLOCK_ID"=>$arResult["IBLOCK_ID"], "SECTION_ID" =>  $arResult["IBLOCK_SECTION"], "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y");
                $res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize"=>50), $arSelect);
                
                while($ob = $res->GetNextElement()){ 
                    $arFields = $ob->GetFields();  
                    $arResult['PROPERTIES'] = $ob->GetProperties();
                    foreach ($arResult['PROPERTIES'] as $code => $data) {
                        $arResult['DISPLAY_PROPERTIES'][$code] = CIBlockFormatProperties::GetDisplayValue($arResult, $data, '');
                    };
                    echo '<li><a href="'.$arResult['DISPLAY_PROPERTIES']['FILELINK']['FILE_VALUE']['SRC'].'" class="infoblock__link" target="_blank">';
                        if($arFields['NAME']){
                            echo $arFields['NAME'];
                        } else {
                            echo $arResult['DISPLAY_PROPERTIES']['FILELINK']['FILE_VALUE']['ORIGINAL_NAME'];
                        };
                    $file = $arResult['DISPLAY_PROPERTIES']['FILELINK']['FILE_VALUE']['FILE_SIZE'];
                    echo '<span class="infoblock__link_span">('.$file.' Кб)</span></a></li>';
                 };
            endif;
             ?> 

        </ul>
    </div>
</div>

<style>
    a.infoblock__link {
        color: #333;
        text-decoration: none;
        font-weight: bold;
    }

    .infoblock__links ul li::before {
        display: none;
    }

    span.infoblock__link_span {
        color: #afafaf;
        margin-left: 10px;
    }

    .infoblock__links ul, .infoblock__links ul li {
        margin-left: 0 !important;
        padding-left:  0 !important;
        text-indent: 0 !important;
    }

    .infoblock__links ul li {
        margin-bottom: 15px !important;
    }
    .infoblock__links {display: none;}

    .infoblock {
        padding: 20px;
        background: #f6f6f6;
        margin-bottom: 20px;
    }

    .infoblock__title {
        font-weight: 400;
        color: #7d7b7b;
        position: relative;
    }

    .open span.dropdownicon {
        -webkit-transform: rotate(225deg);
        transform: rotate(225deg);
        top: 0px;
    }
    span.dropdownicon {
        padding: 3px;
        background: url(http://elenasavva.myjino.ru/bitrix/components/mycomponents/files.list/templates/.default/img/arrow-point-to-down.png) no-repeat 0 0;
        background-size: cover;
        z-index: 2;
        margin-left: 8px;
        top: 2px;
        position: relative;
        -webkit-transform: rotate(315deg);
        transform: rotate(315deg);
        display: inline-block;
        height: 3px;
        width: 6px;
        cursor: pointer;
    }
    .open .infoblock__links {
        display: block;
        margin-top: 20px;
    }

    a.infoblock__link {
        font-size: 12px;
        justify-content: flex-start;
    }

    span.infoblock__link_span {
        font-weight: 400;
    }

    .infoblock__links ul li::before {
        content: '' !important;
        background: url(http://elenasavva.myjino.ru/bitrix/components/mycomponents/files.list/templates/.default/img/docx.png) no-repeat;
        padding: 11px 10px;
        background-size: cover;
        position: absolute;
        display: block;
        width: 3px;
        height: 4px;
        margin-top: -3px;
        margin-left: -39px;
    }

    .infoblock__links ul li {
        display: flex;
        padding-left: 37px !important;
    }
</style>


<script type="text/javascript">
    jQuery(' .dropdownicon').on('click',function(e){
    jQuery(this).parent('.infoblock__title').parent('.infoblock').toggleClass('open');
    });
 </script>