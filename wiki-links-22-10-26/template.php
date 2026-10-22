<?/* ПуТЬ К ФАЙЛУ https://new.it-lite.ru/bitrix/admin/fileman_file_edit.php?path=%2Fbitrix%2Fcomponents%2Fitlite%2Fxwiki.news%2Ftemplates%2Fxwiki%2Fbitrix%2Fnews.detail%2Fdetail_xwiki%2Ftemplate.php&full_src=Y&site=s1&lang=ru&&filter=Y&set_filter=Y

bitrix components itlite xwiki.news templates xwiki bitrix news.detail detail_xwiki template.php
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
$themeClass = isset($arParams['TEMPLATE_THEME']) ? ' bx-'.$arParams['TEMPLATE_THEME'] : '';
CUtil::InitJSCore(['fx', 'ui.fonts.opensans']);
//echo '<pre>';print_r($arResult);echo '</pre>';


    function debugJsonError($json) 
{
    json_decode($json);
    $error = json_last_error();
    
    if ($error === JSON_ERROR_NONE) {
        echo "✅ JSON валиден\n";
        return;
    }
    
    echo "❌ Ошибка: " . json_last_error_msg() . "\n";
    
    // Выводим первые 200 символов для анализа
    echo "Фрагмент: " . substr($json, 0, 2000) . "...\n";
    
    // Поиск висячих запятых (частая проблема)
    if (preg_match('/,\s*[}\]]/', $json)) {
        echo "⚠️ Найдена висячая запятая перед } или ]\n";
    }
    
    // Поиск одинарных кавычек
    if (preg_match("/'/", $json)) {
        echo "⚠️ Найдены одинарные кавычки (должны быть двойные)\n";
    }
    
    
    
    // 2. Вывод HEX-дампа первых 100 символов для поиска скрытых символов
    echo "\n🔍 HEX-анализ начала строки:\n";
    $snippet = substr($json, 0, 100);
    for ($i = 0; $i < strlen($snippet); $i++) {
        $char = $snippet[$i];
        $ord = ord($char);
        $display = ($ord < 32 || $ord > 126) ? '?' : $char;
        echo sprintf("Pos %2d: 0x%02X '%s'\n", $i, $ord, $display);
    }
    
    // 3. Проверка на частые проблемы
    if (preg_match('/[\x{00A0}\x{200B}\x{FEFF}]/u', $json)) {
        echo "\n⚠️ Найдены невидимые Unicode-символы!\n";
    }
    if (substr($json, 0, 3) === "\xEF\xBB\xBF") {
        echo "\n⚠️ Обнаружен BOM в начале строки!\n";
    }
    
    
}//echo '<pre>';debugJsonError($micro);echo '</pre>';


if( isset($arResult['PROPERTIES']['MICRO_LD_JSON']['~VALUE']['TEXT'])  && mb_strlen($arResult['PROPERTIES']['MICRO_LD_JSON']['~VALUE']['TEXT'])>0 ){
    $err ='';$micro = $arResult['PROPERTIES']['MICRO_LD_JSON']['~VALUE']['TEXT'];
    //$micro = preg_replace('~[\ \s\r\n]*\n[\ \s\r\n]*~iu','',$arResult['PROPERTIES']['MICRO_LD_JSON']['~VALUE']['TEXT']);
    //$micro = preg_replace('~[\ \s\r\n]*([\:\,\{\}])[\ \s\r\n]*~iu','$1',$micro);
    $jsdata = json_decode($micro);
    if(json_last_error() !== JSON_ERROR_NONE)
        echo "<!-- Err ld+json:".json_last_error_msg()." -->";
    elseif($jsdata===null )
        echo "<!-- no ld+json -->";
    else
        echo "<script type=\"application/ld+json\">".($micro)."</script>";
}

?>
<div class="news-detail<?=$themeClass?>">
	<div class="mb-3" id="<?echo $this->GetEditAreaId($arResult['ID'])?>">

		<?if($arParams["DISPLAY_PICTURE"]!="N"):?>
			<? if ($arResult["VIDEO"])
			{
				?>
				<div class="mb-5 news-detail-youtube embed-responsive embed-responsive-16by9" style="display: block;">
					<iframe src="<?
					echo $arResult["VIDEO"] ?>" frameborder="0" allowfullscreen=""></iframe>
				</div>
				<?
			}
			else if ($arResult["SOUND_CLOUD"])
			{
				?>
				<div class="mb-5 news-detail-audio">
					<iframe width="100%" height="166" scrolling="no" frameborder="no" src="https://w.soundcloud.com/player/?url=<?
					echo urlencode($arResult["SOUND_CLOUD"]) ?>&amp;color=ff5500&amp;auto_play=false&amp;hide_related=false&amp;show_comments=true&amp;show_user=true&amp;show_reposts=false"></iframe>
				</div>
				<?
			}
			else if ($arResult["SLIDER"] && count($arResult["SLIDER"]) > 1)
			{
				?>
				<div class="mb-5 news-detail-slider">
					<div class="news-detail-slider-container" style="width: <? echo count($arResult["SLIDER"]) * 100 ?>%;left: 0%;">
						<? foreach ($arResult["SLIDER"] as $file):?>
							<div style="width: <? echo 100 / count($arResult["SLIDER"]) ?>%;" class="news-detail-slider-slide">
								<img src="<?= $file["SRC"] ?>" alt="<?= $file["DESCRIPTION"] ?>">
							</div>
						<? endforeach ?>
						<div style="clear: both;"></div>
					</div>
					<div class="news-detail-slider-arrow-container-left">
						<div class="news-detail-slider-arrow"><i class="fa fa-angle-left"></i></div>
					</div>
					<div class="news-detail-slider-arrow-container-right">
						<div class="news-detail-slider-arrow"><i class="fa fa-angle-right"></i></div>
					</div>
					<ul class="news-detail-slider-control">
						<? foreach ($arResult["SLIDER"] as $i => $file):?>
							<li rel="<?= ($i + 1) ?>" <? if (!$i)
								echo 'class="current"' ?>><span></span></li>
						<? endforeach ?>
					</ul>
				</div>
				<?
			}
			else if ($arResult["SLIDER"])
			{
				?>
				<div class="mb-5 news-detail-img">
					<img
						class="card-img-top"
						src="<?= $arResult["SLIDER"][0]["SRC"] ?>"
						alt="<?= $arResult["SLIDER"][0]["ALT"] ?>"
						title="<?= $arResult["SLIDER"][0]["TITLE"] ?>"
					/>
				</div>
				<?
			}
			else if (is_array($arResult["DETAIL_PICTURE"]))
			{
				?>
				<div class="mb-5 news-detail-img">
					<img
						class="card-img-top"
						src="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>"
						alt="<?=$arResult["DETAIL_PICTURE"]["ALT"]?>"
						title="<?=$arResult["DETAIL_PICTURE"]["TITLE"]?>"
						/>
				</div>
				<?
			}
			?>
		<?endif?>

		<div class="news-detail-body">

                   
                    
			<?if($arParams["DISPLAY_NAME"]!="N" && $arResult["NAME"]):?>
				<h1 class="news-detail-title"><?=$arResult["NAME"]?></h1>
			<?endif;?>

                        <div id="panel-body-list-olavl">
                            <ul class="list-olavl"></ul>
                        </div>         
                                
                                
			<div class="news-detail-content">
				<?if($arResult["NAV_RESULT"]):?>
					<?if($arParams["DISPLAY_TOP_PAGER"]):?><?=$arResult["NAV_STRING"]?><br /><?endif;?>
					<?echo $arResult["NAV_TEXT"];?>
					<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?><br /><?=$arResult["NAV_STRING"]?><?endif;?>
				<?elseif($arResult["~DETAIL_TEXT"] <> ''):?>
                                        
                                        <?echo $arResult["~DETAIL_TEXT"];?>
				<?else:?>
					<?echo $arResult["PREVIEW_TEXT"];?>
				<?endif?>
			</div>
                                <br>
		</div>

		<?php
		if (($arParams["USE_RATING"]=="Y") && ($arParams["USE_SHARE"] == "Y"))
		{
			?> <div class="d-flex justify-content-between"> <?php
		}

			if($arParams["USE_RATING"]=="Y"):?>
				<div>
					<?$APPLICATION->IncludeComponent(
						"bitrix:iblock.vote",
						"bootstrap_v4",
						Array(
							"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
							"IBLOCK_ID" => $arParams["IBLOCK_ID"],
							"ELEMENT_ID" => $arResult["ID"],
							"MAX_VOTE" => $arParams["MAX_VOTE"],
							"VOTE_NAMES" => $arParams["VOTE_NAMES"],
							"CACHE_TYPE" => $arParams["CACHE_TYPE"],
							"CACHE_TIME" => $arParams["CACHE_TIME"],
							"DISPLAY_AS_RATING" => $arParams["DISPLAY_AS_RATING"],
							"SHOW_RATING" => "Y",
						),
						$component
					);?>
				</div>
			<?endif?>

			<?if ($arParams["USE_SHARE"] == "Y"):?>
				<div>
					<noindex>
						<?
						$APPLICATION->IncludeComponent(
							"bitrix:main.share",
							$arParams["SHARE_TEMPLATE"],
							array(
								"HANDLERS" => $arParams["SHARE_HANDLERS"],
								"PAGE_URL" => $arResult["~DETAIL_PAGE_URL"],
								"PAGE_TITLE" => $arResult["~NAME"],
								"SHORTEN_URL_LOGIN" => $arParams["SHARE_SHORTEN_URL_LOGIN"],
								"SHORTEN_URL_KEY" => $arParams["SHARE_SHORTEN_URL_KEY"],
								"HIDE" => $arParams["SHARE_HIDE"],
							),
							$component,
							array("HIDE_ICONS" => "Y")
						);
						?>
					</noindex>
				</div>
			<?php
			endif;

		if (($arParams["USE_RATING"]=="Y") && ($arParams["USE_SHARE"] == "Y"))
		{
			?> </div> <?php
		}

	foreach($arResult["FIELDS"] as $code=>$value):?>
		<?if($code == "SHOW_COUNTER"):?>
			<div class="news-detail-view"><?=GetMessage("IBLOCK_FIELD_".$code)?>: <?=intval($value);?></div>
		<?elseif($code == "SHOW_COUNTER_START" && $value):?>
			<? $value = CIBlockFormatProperties::DateFormat($arParams["ACTIVE_DATE_FORMAT"], MakeTimeStamp($value, CSite::GetDateFormat())); ?>
			<div class="news-detail-date"><?=GetMessage("IBLOCK_FIELD_".$code)?>: <?=$value;?> </div>
		<?elseif($code == "TAGS" && $value):?>
			<div class="news-detail-tags"><?=GetMessage("IBLOCK_FIELD_".$code)?>: <?=$value;?> </div>
		<?elseif($code == "CREATED_USER_NAME"):?>
			<div class="news-detail-author"><?=GetMessage("IBLOCK_FIELD_".$code)?>: <?=$value;?> </div>
		<?elseif ($value != ""):?>
			<div class="news-detail-other"><?=GetMessage("IBLOCK_FIELD_".$code)?>: <?=$value;?></div>
		<?endif;?>
	<?endforeach;?>

	<?foreach($arResult["DISPLAY_PROPERTIES"] as $pid=>$arProperty):?>
		<?
                if('MICRO_LD_JSON'==$pid)                    continue;
                
		if(is_array($arProperty["DISPLAY_VALUE"]))
			$value = implode("&nbsp;/&nbsp;", $arProperty["DISPLAY_VALUE"]);
		else
			$value = $arProperty["DISPLAY_VALUE"];
		?>
		<?if($arProperty["CODE"] == "FORUM_MESSAGE_CNT"):?>
			<div class="news-detail-comments"><?=$arProperty["NAME"]?>: <?=$value;?> </div>
		<?elseif ($value != ""):?>
			<div class="news-detail-other"><?=$arProperty["NAME"]?>: <?=$value;?> </div>
		<?endif;?>
	<?endforeach;?>

	<?if($arParams["DISPLAY_DATE"]!="N" && $arResult["DISPLAY_ACTIVE_FROM"]):?>
		<div class="news-detail-date"><?echo $arResult["DISPLAY_ACTIVE_FROM"]?></div>
	<?endif?>



	</div>
</div>
<script>
	BX.ready(function() {
		var slider = new JCNewsSlider('<?=CUtil::JSEscape($this->GetEditAreaId($arResult['ID']));?>', {
			imagesContainerClassName: 'news-detail-slider-container',
			leftArrowClassName: 'news-detail-slider-arrow-container-left',
			rightArrowClassName: 'news-detail-slider-arrow-container-right',
			controlContainerClassName: 'news-detail-slider-control'
		});
	});
</script>
            
       