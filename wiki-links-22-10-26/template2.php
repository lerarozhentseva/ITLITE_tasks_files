<?/* ПуТЬ К ФАЙЛУ https://new.it-lite.ru/bitrix/admin/fileman_file_edit.php?path=%2Fbitrix%2Ftemplates%2Fmain_2020%2Fcomponents%2Fbitrix%2Fsearch.tags.cloud%2Fxwiki_sbr%2Ftemplate.php&full_src=Y&site=s1&lang=ru&&filter=Y&set_filter=Y

bitrix templates main_2020 components bitrix search.tags.cloud xwiki_sbr template.php

*/?>

<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
{
	die();
}
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

if ($arParams['SHOW_CHAIN'] != 'N' && !empty($arResult['TAGS_CHAIN'])):
?>
<noindex>
	<div class="search-tags-chain" <?=$arParams['WIDTH']?>><?php
		foreach ($arResult['TAGS_CHAIN'] as $tags):
			?><a href="<?=$tags['TAG_PATH']?>" rel="nofollow"><?=$tags['TAG_NAME']?></a> <?php
			?>[<a href="<?=$tags['TAG_WITHOUT']?>" class="search-tags-link" rel="nofollow">x</a>]  <?php
		endforeach;?>
	</div>
</noindex>
<?php
endif;

if (is_array($arResult['SEARCH']) && !empty($arResult['SEARCH'])):
?>
<noindex>
	<div class="news-detail-tags" <?=$arParams['WIDTH']?>><?php
		foreach ($arResult['SEARCH'] as $key => $res)
		{
		?><a href="<?=$res['URL']?>" style="font-size: <?=$res['FONT_SIZE']?>px; color: #<?=$res['COLOR']?>;" rel="nofollow"><?=$res['NAME']?></a> <?php
		}
	?></div>
</noindex>
<?php
endif;