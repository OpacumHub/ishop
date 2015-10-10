<?php
function catalog_offer_mutator_1c(&$arLoadOffer, &$xOfferNode)
{
    global $arProperties;

    $sQuantity = $arLoadOffer['QUANTITY'];
    $newQuanity = 0;
    $priceTypeId = '';

    if ($obPrice = $xOfferNode->SelectNodes('/Цены/Цена/ИдТипаЦены')) {
        $priceTypeId = $obPrice->textContent();

        if ($priceTypeId != '') {

            $Store = new CCatalogStore;
            $storeProd = new CCatalogStoreProduct;
            $rsStore = $Store->GetList(array(),array('XML_ID' => $priceTypeId),false,false,array('*'));

            if ($arStore = $rsStore->Fetch()) {
                $storeId = $arStore['ID'];

            } else {
                $arFields = Array(
                    "TITLE" => 'Store_' . $priceTypeId,
                    "ACTIVE" => 'Y',
                    "ADDRESS" => '-',
                    "XML_ID" => $priceTypeId
                );

                $storeId = CCatalogStore::Add($arFields);

            }

            $storeProd->Add(
                array(
                    "PRODUCT_ID" => $arLoadOffer['ID'],
                    "STORE_ID" => $storeId,
                    "AMOUNT" => $sQuantity,
                )
            );

            $rsStoreProd = $storeProd->GetList(
                array(),
                array('PRODUCT_ID' => $arLoadOffer['ID']),
                false,
                false,
                array('AMOUNT')
            );
            while ($arStore = $rsStoreProd->Fetch()) {
                $newQuanity = $newQuanity + $arStore['AMOUNT'];

            }

            if ($newQuanity > 0) {
                $arLoadOffer['QUANTITY'] = $newQuanity;
            }

        }

    }

    return $arLoadOffer;
}