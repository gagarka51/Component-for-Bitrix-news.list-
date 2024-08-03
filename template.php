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
<div class="news-list-wrapper">
	<!-- Start News.list !-->
	<div class="news-list">
		<?if($arParams["DISPLAY_TOP_PAGER"]):?>
		<?=$arResult["NAV_STRING"]?><br />
		<?endif;?>
		<?foreach($arResult["ITEMS"] as $arItem):?>
		
		<?
		$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
		$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
		?>
		<!-- Start Object of News.list !-->

		<div class="news-item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
			<?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arItem["PREVIEW_PICTURE"])):?>
			<?if(!$arParams["HIDE_LINK_WHEN_NO_DETAIL"] || ($arItem["DETAIL_TEXT"] && $arResult["USER_HAVE_ACCESS"])):?>
			<!-- Start Object's preview picture of News.list !-->
			<a href="<?=$arItem["DETAIL_PAGE_URL"]?>"><img
				class="preview_picture"
				border="0"
				src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>"
				width="<?=$arItem["PREVIEW_PICTURE"]["WIDTH"]?>"
				height="<?=$arItem["PREVIEW_PICTURE"]["HEIGHT"]?>"
				alt="<?=$arItem["PREVIEW_PICTURE"]["ALT"]?>"
				title="<?=$arItem["PREVIEW_PICTURE"]["TITLE"]?>"
				/></a>
			<?else:?>
				<img
				class="preview_picture"
				border="0"
				src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>"
				width="<?=$arItem["PREVIEW_PICTURE"]["WIDTH"]?>"
				height="<?=$arItem["PREVIEW_PICTURE"]["HEIGHT"]?>"
				alt="<?=$arItem["PREVIEW_PICTURE"]["ALT"]?>"
				title="<?=$arItem["PREVIEW_PICTURE"]["TITLE"]?>"
				/>
				<!-- End Object's preview picture of News.list !-->
			<?endif;?>
			<?endif?>

			<?if($arParams["DISPLAY_NAME"]!="N" && $arItem["NAME"]):?>
			<?if(!$arParams["HIDE_LINK_WHEN_NO_DETAIL"] || ($arItem["DETAIL_TEXT"] && $arResult["USER_HAVE_ACCESS"])):?>
				<!-- Start object's link of News.list !-->
				<a class= "news-item-name" href="<?echo $arItem["DETAIL_PAGE_URL"]?>"><b><?echo $arItem["NAME"]?></b></a><br />
				<!-- End object's link of News.list !-->
			<?else:?>
				<!-- Start object's name of News.list !-->
				<b><?echo $arItem["NAME"]?></b><br />
				<!-- End object's name of News.list !-->
			<?endif;?>
			<?endif;?>

			<?if($arParams["DISPLAY_PREVIEW_TEXT"]!="N" && $arItem["PREVIEW_TEXT"]):?>
				<!-- Start Object's description of News.list !-->
				<?echo $arItem["PREVIEW_TEXT"];?>
				<!-- End Object's description of News.list !-->
			<?endif;?>

			<?if($arParams["DISPLAY_DATE"]!="N" && $arItem["DISPLAY_ACTIVE_FROM"]):?>
				<!-- Start Object's date of News.list !-->
			<span class="news-date-time"><b><?echo $arItem["DISPLAY_ACTIVE_FROM"]?></b></span>
				<!-- End Object's date of News.list !-->
			<?endif?>
				<!-- End Object of News.list !-->

		</div>
			<?endforeach;?>
		</div>

		<div class="news-list-nav">
			<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
			<?=$arResult["NAV_STRING"]?>
			<?endif;?>
		</div>
	</div>
<!-- End News.list !-->