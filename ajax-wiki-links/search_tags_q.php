<? /*
https://new.it-lite.ru/bitrix/admin/fileman_file_edit.php?path=%2Fbitrix%2Fcomponents%2Fitlite%2Fxwiki.news%2Ftemplates%2Fxwiki%2Fsearch_tags_q.php&full_src=Y&site=s1&lang=ru&&filter=Y&set_filter=Y
*/?>


<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(false);//echo $arParams["IBLOCK_TYPE"];

$TAGS_INHERIT="Y";
?>


<script defer >


    jQuery(document).ready(function () {

    
        jQuery('.search-page .search-advanced .search-advanced-result .show-search-tags-chain').each(function(){
            xxx = $(this).text();
            yyy = $(this).parent('.full-show-search-tags-chain').children('a').attr('onclick');
            <?if($TAGS_INHERIT=="Y"){?>
            jQuery('.search-tags-cloud a,.news-detail-tags a,.search-item-tags a, .news-item-tags a').each(function(){// Все: .search-tags-cloud a,.news-detail-tags a,.search-item-tags a, .news-item-tags a
                if( xxx === $(this).text()){
                    $(this).addClass('searchpressed').attr('onclick',yyy);
                }
            });
            <?}else{?>
            jQuery('.search-tags-cloud a').each(function(){// Все: .search-tags-cloud a,.news-detail-tags a,.search-item-tags a, .news-item-tags a
                if( xxx === $(this).text()){
                    $(this).addClass('searchpressed').attr('onclick',yyy);
                }
            });
            <?}?>
             
        });

    });


</script>

<?$APPLICATION->IncludeComponent(
	"bitrix:search.page",
	"clear_blocks",
	Array(
		"RESTART" => "N",
		"NO_WORD_LOGIC" => "N",
		"CHECK_DATES" => "N",
		"USE_TITLE_RANK" => "N",
		"DEFAULT_SORT" => "rank",
		"arrFILTER" => array("iblock_".$arParams["IBLOCK_TYPE"]),
		"SHOW_WHERE" => "N",
		"arrWHERE" => array("iblock_".$arParams["IBLOCK_TYPE"]),
		"SHOW_WHEN" => "N",
                "PAGE_RESULT_COUNT" => 16,
                "AJAX_MODE" => "N",//"Y",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "N",
                "AJAX_OPTION_HISTORY" => "N",//"Y",
		"CACHE_TYPE" => $arParams["CACHE_TYPE"],
		"CACHE_TIME" => $arParams["CACHE_TIME"],
                "USE_LANGUAGE_GUESS" => "Y",
		"USE_SUGGEST" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"PAGER_TITLE" => "Результаты поиска",
		"PAGER_SHOW_ALWAYS" => "Y",
		"PAGER_TEMPLATE" => "",
                "AJAX_OPTION_SHADOW" => "Y",
            
                "SHOW_ORDER_BY" => "Y",
                "SHOW_TAGS_CLOUD" => "Y",
                "SHOW_ITEM_PICTURE" => "Y",
		//"SEARCH_PAGE" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["search"],
            
		//"CHECK_DATES" => $arParams["CHECK_DATES"]!=="N"? "Y": "N",
		"NO_WORD_LOGIC" => "Y",
		"TAGS_INHERIT" => $TAGS_INHERIT,//"Y",
                "SHOW_ITEM_TAGS" => "N",
		"SET_TITLE" => $arParams["SET_TITLE"],
		"arrFILTER_iblock_".$arParams["IBLOCK_TYPE"] => array($arParams["IBLOCK_ID"]),
	),
	$component
);?>


<?if(0)$APPLICATION->IncludeComponent(
	"bitrix:search.page",
	"clear_blocks",
	Array(
                "AJAX_MODE" => "Y",
                "AJAX_OPTION_SHADOW" => "Y",
                "AJAX_OPTION_HISTORY" => "Y",
                "USE_LANGUAGE_GUESS" => "N",
                "SHOW_ORDER_BY" => "Y",
                "SHOW_TAGS_CLOUD" => "Y",
                "SHOW_ITEM_PICTURE" => "Y",
		//"SEARCH_PAGE" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["search"],
            
		//"CHECK_DATES" => $arParams["CHECK_DATES"]!=="N"? "Y": "N",
		"arrWHERE" => array("iblock_".$arParams["IBLOCK_TYPE"]),
		"arrFILTER" => array("iblock_".$arParams["IBLOCK_TYPE"]),
		"SHOW_WHERE" => "N",
		"NO_WORD_LOGIC" => "Y",
		"USE_TITLE_RANK" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"TAGS_INHERIT" => $TAGS_INHERIT,//"Y",
                "SHOW_ITEM_TAGS" => "N",
		"CACHE_TYPE" => $arParams["CACHE_TYPE"],
		"CACHE_TIME" => $arParams["CACHE_TIME"],
		"SET_TITLE" => $arParams["SET_TITLE"],
		"arrFILTER_iblock_".$arParams["IBLOCK_TYPE"] => array($arParams["IBLOCK_ID"]),
                "PAGE_RESULT_COUNT" => 18,
	),
	$component
);?>
<p><a href="<?=$arResult["FOLDER"].$arResult["URL_TEMPLATES"]["news"]?>"><?=GetMessage("T_NEWS_DETAIL_BACK")?></a></p>