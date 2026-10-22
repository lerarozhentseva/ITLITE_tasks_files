<?/* ПуТЬ К ФАЙЛУ https://new.it-lite.ru/bitrix/admin/fileman_file_edit.php?path=%2Fbitrix%2Fcomponents%2Fitlite%2Fxwiki.news%2Ftemplates%2Fxwiki%2Fdetail.php&full_src=Y&site=s1&lang=ru&&filter=Y&set_filter=Y#authorize

bitrix components itlite xwiki.news templates xwiki detail.php

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
$this->setFrameMode(true);
?>


<div class="col-xs-12 col-sm-9 col-md-9 col-lg-9" id="wiki-content" style="">
    
  
<script defer >

    if('/wiki/'!=window.location.pathname){

        jQuery(document).ready(function () {


            var datarightmenu = [];
            var sidebar;
                    var xxxid = '';
                    var xxxtop = 0;
                    var xxxxdelta = 0;

            var pagesoglavlenie = '';
            var windowheight = jQuery(window).height();
            var startscroll = false;
            var posttext = jQuery('#wiki-post-content');/**/
            var post_top,sidebar_height,post_height,post_bottom;

            var sceern_halfheight = jQuery(window).height()/2;
            sceern_halfheight = sceern_halfheight.toFixed();
            var w_scroll = jQuery(window).scrollTop();
            bilder_start();






            // построение сайдбара оглавления
            function bilder_start(){
                let hclassscan = 'h2';
                let sidebarID = '.news-detail-body #panel-body-list-olavl';
                let sidebarUL = 'ul.list-olavl';
                sidebar = jQuery(sidebarID);
                let sidebar_top = sidebar.offset().top;

                if(jQuery(hclassscan).length && jQuery(sidebarID+' '+sidebarUL).length){
                    jQuery(hclassscan).each(function(pgindex){

                            jQuery(sidebarID+' '+sidebarUL).html(jQuery(sidebarID+' '+sidebarUL).html()+'<li class="pagesoglavlenie-all hlevel-'+(jQuery(this)[0].nodeName)+'" id="pagesoglavlenie-'+pgindex+'"><a href="#pageoglavlenie-'+pgindex+'" >'+jQuery(this).text()+'</a></li>');
                            jQuery(this).before('<a name="pageoglavlenie-'+pgindex+'"  id="pageoglavlenie-'+pgindex+'"></a>');
                            let x;x = jQuery(this).offset().top;
                            datarightmenu.push({top:x,id:'#pagesoglavlenie-'+pgindex,xdelta: jQuery('#pagesoglavlenie-'+pgindex).offset().top - sidebar_top});
                    });
                }else{
                    //console.log('deleted');
                    jQuery(sidebarID).remove();
                };
                jQuery(sidebarID+' '+sidebarUL+' a').on('click',function(){
                            //console.log(jQuery(this).attr('href'));
                            jQuery("html, body").animate({scrollTop: (jQuery(jQuery(this).attr('href')).offset().top - 50) + "px"}).focus();
                            return false;
                });

            }    





        });
    };
</script>


<?$ElementID = $APPLICATION->IncludeComponent(
	"bitrix:news.detail",
	//"bootstrap_v4",
	"detail_xwiki",
	Array(
		"DISPLAY_DATE" => $arParams["DISPLAY_DATE"],
		"DISPLAY_NAME" => $arParams["DISPLAY_NAME"],
		"DISPLAY_PICTURE" => $arParams["DISPLAY_PICTURE"],
		"DISPLAY_PREVIEW_TEXT" => $arParams["DISPLAY_PREVIEW_TEXT"],
		"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
		"IBLOCK_ID" => $arParams["IBLOCK_ID"],
		"FIELD_CODE" => $arParams["DETAIL_FIELD_CODE"],
		"PROPERTY_CODE" => array_merge($arParams["DETAIL_PROPERTY_CODE"],array("MICRO_LD_JSON")),
		"DETAIL_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["detail"],
		"SECTION_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["section"],
		"META_KEYWORDS" => $arParams["META_KEYWORDS"],
		"META_DESCRIPTION" => $arParams["META_DESCRIPTION"],
		"BROWSER_TITLE" => $arParams["BROWSER_TITLE"],
		"SET_CANONICAL_URL" => $arParams["DETAIL_SET_CANONICAL_URL"],
		"SET_LAST_MODIFIED" => $arParams["SET_LAST_MODIFIED"],
		"SET_TITLE" => "Y",
		"MESSAGE_404" => $arParams["MESSAGE_404"],
		"SET_STATUS_404" => $arParams["SET_STATUS_404"],
		"SHOW_404" => $arParams["SHOW_404"],
		"FILE_404" => $arParams["FILE_404"],
		"INCLUDE_IBLOCK_INTO_CHAIN" => $arParams["INCLUDE_IBLOCK_INTO_CHAIN"],
		"ADD_SECTIONS_CHAIN" => $arParams["ADD_SECTIONS_CHAIN"],
		"ACTIVE_DATE_FORMAT" => $arParams["DETAIL_ACTIVE_DATE_FORMAT"],
		"CACHE_TYPE" => $arParams["CACHE_TYPE"],
		"CACHE_TIME" => $arParams["CACHE_TIME"],
		"CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
		"USE_PERMISSIONS" => $arParams["USE_PERMISSIONS"],
		"GROUP_PERMISSIONS" => $arParams["GROUP_PERMISSIONS"],
		"DISPLAY_TOP_PAGER" => $arParams["DETAIL_DISPLAY_TOP_PAGER"],
		"DISPLAY_BOTTOM_PAGER" => $arParams["DETAIL_DISPLAY_BOTTOM_PAGER"],
		"PAGER_TITLE" => $arParams["DETAIL_PAGER_TITLE"],
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => $arParams["DETAIL_PAGER_TEMPLATE"],
		"PAGER_SHOW_ALL" => $arParams["DETAIL_PAGER_SHOW_ALL"],
		"CHECK_DATES" => $arParams["CHECK_DATES"],
		"ELEMENT_ID" => $arResult["VARIABLES"]["ELEMENT_ID"],
		"ELEMENT_CODE" => $arResult["VARIABLES"]["ELEMENT_CODE"],
		"SECTION_ID" => $arResult["VARIABLES"]["SECTION_ID"],
		"SECTION_CODE" => $arResult["VARIABLES"]["SECTION_CODE"],
		"IBLOCK_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["news"],
		"SEARCH_PAGE" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["search"],
		"USE_SHARE" => $arParams["USE_SHARE"],
		"SHARE_HIDE" => $arParams["SHARE_HIDE"],
		"SHARE_TEMPLATE" => $arParams["SHARE_TEMPLATE"],
		"SHARE_HANDLERS" => $arParams["SHARE_HANDLERS"],
		"SHARE_SHORTEN_URL_LOGIN" => $arParams["SHARE_SHORTEN_URL_LOGIN"],
		"SHARE_SHORTEN_URL_KEY" => $arParams["SHARE_SHORTEN_URL_KEY"],
		"ADD_ELEMENT_CHAIN" => $arParams["ADD_ELEMENT_CHAIN"],
		"USE_RATING" => $arParams["USE_RATING"],
		"MAX_VOTE" => $arParams["MAX_VOTE"],
		"VOTE_NAMES" => $arParams["VOTE_NAMES"],
		"MEDIA_PROPERTY" => $arParams["MEDIA_PROPERTY"],
		"SLIDER_PROPERTY" => ($arParams["SLIDER_PROPERTY"] ?? ''),
		"TEMPLATE_THEME" => ($arParams["TEMPLATE_THEME"] ?? ''),
		"STRICT_SECTION_CHECK" => $arParams["STRICT_SECTION_CHECK"],
	),
	$component
);?>
<p><a href="<?=$arResult["FOLDER"].$arResult["URL_TEMPLATES"]["news"]?>"><?=GetMessage("T_NEWS_DETAIL_BACK")?></a></p>
<?if($arParams["USE_CATEGORIES"]=="Y" && $ElementID):
	global $arCategoryFilter;
	$obCache = new CPHPCache;
	$strCacheID = $componentPath.LANG.$arParams["IBLOCK_ID"].$ElementID.$arParams["CATEGORY_CODE"];
	if(($tzOffset = CTimeZone::GetOffset()) <> 0)
		$strCacheID .= "_".$tzOffset;
	if($arParams["CACHE_TYPE"] == "N" || $arParams["CACHE_TYPE"] == "A" && COption::GetOptionString("main", "component_cache_on", "Y") == "N")
		$CACHE_TIME = 0;
	else
		$CACHE_TIME = $arParams["CACHE_TIME"];
	if($obCache->StartDataCache($CACHE_TIME, $strCacheID, $componentPath))
	{
		$rsProperties = CIBlockElement::GetProperty($arParams["IBLOCK_ID"], $ElementID, "sort", "asc", array("ACTIVE"=>"Y","CODE"=>$arParams["CATEGORY_CODE"]));
		$arCategoryFilter = array();
		while($arProperty = $rsProperties->Fetch())
		{
			if(is_array($arProperty["VALUE"]) && count($arProperty["VALUE"])>0)
			{
				foreach($arProperty["VALUE"] as $value)
					$arCategoryFilter[$value]=true;
			}
			elseif(!is_array($arProperty["VALUE"]) && $arProperty["VALUE"] <> '')
				$arCategoryFilter[$arProperty["VALUE"]]=true;
		}
		$obCache->EndDataCache($arCategoryFilter);
	}
	else
	{
		$arCategoryFilter = $obCache->GetVars();
	}
	if(count($arCategoryFilter)>0):
		$arCategoryFilter = array(
			"PROPERTY_".$arParams["CATEGORY_CODE"] => array_keys($arCategoryFilter),
			"!"."ID" => $ElementID,
		);
		?>
		<hr /><h3><?=GetMessage("CATEGORIES")?></h3>
		<?foreach($arParams["CATEGORY_IBLOCK"] as $iblock_id):?>
			<?$APPLICATION->IncludeComponent(
				"bitrix:news.list",
				$arParams["CATEGORY_THEME_".$iblock_id],
				Array(
					"IBLOCK_ID" => $iblock_id,
					"NEWS_COUNT" => $arParams["CATEGORY_ITEMS_COUNT"],
					"SET_TITLE" => "N",
					"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
					"CACHE_TYPE" => $arParams["CACHE_TYPE"],
					"CACHE_TIME" => $arParams["CACHE_TIME"],
					"CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
					"FILTER_NAME" => "arCategoryFilter",
					"CACHE_FILTER" => "Y",
					"DISPLAY_TOP_PAGER" => "N",
					"DISPLAY_BOTTOM_PAGER" => "N",
				),
				$component
			);?>
		<?endforeach?>
	<?endif?>
<?endif?>
       
<hr />   



<h2>Читайте так же</h2>
<?    CModule::IncludeModule('iblock');$TAGS='';
                $products = CIBlockElement::GetList(array('ID' => 'desc'), Array("IBLOCK_TYPE" => 'wiki', "IBLOCK_ID" => 76, "ID" => $ElementID, "!TAGS" => '', "ACTIVE" => "Y" ), false, Array("nTopCount"=>10),array('TAGS','IBLOCK_TYPE','IBLOCK_ID','DETAIL_PAGE_URL','CODE',"ID", "NAME", "PROPERTY_*") );
                while ($product = $products->GetNext()) if((string)$product['DETAIL_PAGE_URL']!='' && (string)$product['NAME']!=''){ 
                       $TAGS = (string)$product['TAGS'];
                }
$GLOBALS["HARDCODED_TAGS_FILTER"] = array(
    "TAGS" => []//array("BaaS","аренда 1С")// 
);foreach(explode(',',$TAGS) as $tg)$GLOBALS["HARDCODED_TAGS_FILTER"]["TAGS"][]=trim($tg);

//echo '<pre>';print_r($GLOBALS["HARDCODED_TAGS_FILTER"]);echo '</pre>';
?>

 <?$APPLICATION->IncludeComponent(
	"itlite:news.list",
	"clear_blocks",
	Array(
        "FILTER_NAME" => "HARDCODED_TAGS_FILTER",
		"ACTIVE_DATE_FORMAT" => "j M Y",
		"ADD_SECTIONS_CHAIN" => "N",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"CHECK_DATES" => "Y",
		"DETAIL_URL" => "",
		"DISPLAY_BOTTOM_PAGER" => "N",
		"DISPLAY_DATE" => "Y",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"FIELD_CODE" => array("TIMESTAMP_X_UNIX", ""),
		"HIDE_LINK_WHEN_NO_DETAIL" => "Y",
		"IBLOCK_ID" => "76",
		"IBLOCK_TYPE" => "wiki",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"INCLUDE_SUBSECTIONS" => "N",
		"MESSAGE_404" => "",
		"NEWS_COUNT" => "9",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => ".default",
		"PAGER_TITLE" => "Статьи",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"PREVIEW_TRUNCATE_LEN" => "",
		"PROPERTY_CODE" => array("BPA_PAGE_TYPE", "AVTOR", "POPULARITY", "DATA","TAGS", ""),
		"SET_BROWSER_TITLE" => "N",
		"SET_LAST_MODIFIED" => "N",
		"SET_META_DESCRIPTION" => "N",
		"SET_META_KEYWORDS" => "N",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "N",
		"SHOW_404" => "N",
		"SORT_BY1" => "TIMESTAMP_X",
		"SORT_BY2" => "SORT",
		"SORT_ORDER1" => "DESC",
		"SORT_ORDER2" => "ASC",
		"STRICT_SECTION_CHECK" => "N"
	)
);?>



<hr />   





<h2>Ещё статьи</h2>

<?  CModule::IncludeModule('iblock');$products = CIBlockElement::GetList(array('ID' => 'desc'), Array("IBLOCK_TYPE" => 'wiki', "IBLOCK_ID" => 76, "<ID" => $ElementID, "ACTIVE" => "Y" ), false, Array("nTopCount"=>1),array('PROPERTY_POPULARITY','IBLOCK_TYPE','IBLOCK_ID','DETAIL_PAGE_URL','CODE',"ID", "NAME", "PROPERTY_*") );
    $ii=0;  while ($product = $products->GetNext()) if((string)$product['DETAIL_PAGE_URL']!='' && (string)$product['NAME']!=''){ 
                       echo "<a href=\"{$product['DETAIL_PAGE_URL']}\">❮ Предыдущая статья</a>";$ii++;
            }
            if($ii==0){
                $products = CIBlockElement::GetList(array('ID' => 'desc'), Array("IBLOCK_TYPE" => 'wiki', "IBLOCK_ID" => 76, "!ID" => $ElementID, "ACTIVE" => "Y" ), false, Array("nTopCount"=>1),array('PROPERTY_POPULARITY','IBLOCK_TYPE','IBLOCK_ID','DETAIL_PAGE_URL','CODE',"ID", "NAME", "PROPERTY_*") );
                while ($product = $products->GetNext()) if((string)$product['DETAIL_PAGE_URL']!='' && (string)$product['NAME']!=''){ 
                       echo "<a href=\"{$product['DETAIL_PAGE_URL']}\">❮ Предыдущая статья</a>";$ii++;
                }
            }
                
?>&nbsp;&nbsp;&nbsp;
<?    CModule::IncludeModule('iblock');$products = CIBlockElement::GetList(array('ID' => 'asc'), Array("IBLOCK_TYPE" => 'wiki', "IBLOCK_ID" => 76, ">ID" => $ElementID, "ACTIVE" => "Y" ), false, Array("nTopCount"=>1),array('PROPERTY_POPULARITY','IBLOCK_TYPE','IBLOCK_ID','DETAIL_PAGE_URL','CODE',"ID", "NAME", "PROPERTY_*") );
      $ii=0;  while ($product = $products->GetNext()) if((string)$product['DETAIL_PAGE_URL']!='' && (string)$product['NAME']!=''){ 
                       echo "<a href=\"{$product['DETAIL_PAGE_URL']}\">Следующая статья ❯</a>";$ii++;
                }
            if($ii==0){
                $products = CIBlockElement::GetList(array('ID' => 'asc'), Array("IBLOCK_TYPE" => 'wiki', "IBLOCK_ID" => 76, "!ID" => $ElementID, "ACTIVE" => "Y" ), false, Array("nTopCount"=>1),array('PROPERTY_POPULARITY','IBLOCK_TYPE','IBLOCK_ID','DETAIL_PAGE_URL','CODE',"ID", "NAME", "PROPERTY_*") );
                while ($product = $products->GetNext()) if((string)$product['DETAIL_PAGE_URL']!='' && (string)$product['NAME']!=''){ 
                       echo "<a href=\"{$product['DETAIL_PAGE_URL']}\">Следующая статья ❯</a>";$ii++;
                }
            }
?>
  

                
<?if($arParams["USE_REVIEW"]=="Y" && IsModuleInstalled("forum") && $ElementID):?>
<hr />
<?$APPLICATION->IncludeComponent(
	"bitrix:forum.topic.reviews",
	"",
	Array(
		"CACHE_TYPE" => $arParams["CACHE_TYPE"],
		"CACHE_TIME" => $arParams["CACHE_TIME"],
		"MESSAGES_PER_PAGE" => $arParams["MESSAGES_PER_PAGE"],
		"USE_CAPTCHA" => $arParams["USE_CAPTCHA"],
		"PATH_TO_SMILE" => $arParams["PATH_TO_SMILE"],
		"FORUM_ID" => $arParams["FORUM_ID"],
		"URL_TEMPLATES_READ" => $arParams["URL_TEMPLATES_READ"],
		"SHOW_LINK_TO_FORUM" => $arParams["SHOW_LINK_TO_FORUM"],
		"DATE_TIME_FORMAT" => $arParams["DETAIL_ACTIVE_DATE_FORMAT"],
		"ELEMENT_ID" => $ElementID,
		"AJAX_POST" => $arParams["REVIEW_AJAX_POST"],
		"IBLOCK_ID" => $arParams["IBLOCK_ID"],
		"URL_TEMPLATES_DETAIL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["detail"],
	),
	$component
);?>



<?endif;?>


</div>
<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3" id="wiki-right-bar" style="">

    
<?  include 'right-side-bar.php';?>
    
</div>