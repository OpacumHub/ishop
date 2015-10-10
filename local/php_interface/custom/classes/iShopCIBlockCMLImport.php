<?
/**
 *
 * Класс для выгрузок
 *
 */

class iShopCIBlockCMLImport extends CIBlockCMLImport {

    function GetIBlockIdByCode($Code)
    {
        if(strlen($Code) > 0)
        {
            $obIBlock = new CIBlock;
            $rsIBlock = $obIBlock->GetList(array(), array("CODE"=>$Code, "CHECK_PERMISSIONS" => "N"));
            if($arIBlock = $rsIBlock->Fetch())
                return $arIBlock["ID"];
            else
                return false;
        }
        return false;
    }

    public function iShopImportMetaData($xml_root_id, $IBLOCK_TYPE, $IBLOCK_LID, $bUpdateIBlock = true)
    {
        global $APPLICATION;

        $rs = $this->_xml_file->GetList(
            array("ID" => "asc"),
            array("ID" => $xml_root_id),
            array("ID", "NAME", "ATTRIBUTES")
        );
        $ar = $rs->Fetch();

        if ($ar)
        {
            foreach(array(LANGUAGE_ID, "en", "ru") as $lang)
            {
                $mess = IncludeModuleLangFile(__FILE__, $lang, true);
                if($ar["NAME"] === $mess["IBLOCK_XML2_COMMERCE_INFO"])
                {
                    $this->mess = $mess;
                    $this->next_step["lang"] = $lang;
                }
            }
            $xml_root_id = $ar["ID"];
        }

        if($ar && (strlen($ar["ATTRIBUTES"]) > 0))
        {
            $info = unserialize($ar["ATTRIBUTES"]);
            if(is_array($info) && array_key_exists($this->mess["IBLOCK_XML2_SUM_FORMAT"], $info))
            {
                if(preg_match("#".$this->mess["IBLOCK_XML2_SUM_FORMAT_DELIM"]."=(.);{0,1}#", $info[$this->mess["IBLOCK_XML2_SUM_FORMAT"]], $match))
                {
                    $this->next_step["sdp"] = $match[1];
                }
            }
        }

        $meta_data_xml_id = false;
        $XML_ELEMENTS_PARENT = false;
        $XML_SECTIONS_PARENT = false;
        $XML_PROPERTIES_PARENT = false;
        $XML_SECTIONS_PROPERTIES_PARENT = false;
        $XML_PRICES_PARENT = false;
        $XML_STORES_PARENT = false;
        $XML_BASE_UNITS_PARENT = false;
        $XML_SECTION_PROPERTIES = false;
        $arIBlock = array();

        $this->next_step["bOffer"] = false;
        $rs = $this->_xml_file->GetList(
            array(),
            array("PARENT_ID" => $xml_root_id, "NAME" => $this->mess["IBLOCK_XML2_CATALOG"]),
            array("ID", "ATTRIBUTES")
        );
        $ar = $rs->Fetch();
        if(!$ar)
        {
            $rs = $this->_xml_file->GetList(
                array(),
                array("PARENT_ID" => $xml_root_id, "NAME" => $this->mess["IBLOCK_XML2_OFFER_LIST"]),
                array("ID", "ATTRIBUTES")
            );
            $ar = $rs->Fetch();
            $this->next_step["bOffer"] = true;
        }
        if(!$ar)
        {
            $rs = $this->_xml_file->GetList(
                array(),
                array("PARENT_ID" => $xml_root_id, "NAME" => $this->mess["IBLOCK_XML2_OFFERS_CHANGE"]),
                array("ID", "ATTRIBUTES")
            );
            $ar = $rs->Fetch();
            $this->next_step["bOffer"] = true;
            $this->next_step["bUpdateOnly"] = true;
            $bUpdateIBlock = false;
        }

        if ($this->next_step["bOffer"] && !$this->bCatalog)
            return GetMessage('IBLOCK_XML2_MODULE_CATALOG_IS_ABSENT');

        if($ar)
        {
            if(strlen($ar["ATTRIBUTES"]) > 0)
            {
                $attrs = unserialize($ar["ATTRIBUTES"]);
                if(is_array($attrs))
                {
                    if(array_key_exists($this->mess["IBLOCK_XML2_UPDATE_ONLY"], $attrs))
                        $this->next_step["bUpdateOnly"] = ($attrs[$this->mess["IBLOCK_XML2_UPDATE_ONLY"]]=="true") || intval($attrs[$this->mess["IBLOCK_XML2_UPDATE_ONLY"]])? true: false;
                }
            }

            $rs = $this->_xml_file->GetList(
                array("ID" => "asc"),
                array("PARENT_ID" => $ar["ID"])
            );
            while($ar = $rs->Fetch())
            {

                if(isset($ar["VALUE_CLOB"]))
                    $ar["VALUE"] = $ar["VALUE_CLOB"];

                if($ar["NAME"] == $this->mess["IBLOCK_XML2_ID"])
                    $arIBlock["XML_ID"] = ($this->use_iblock_type_id? $IBLOCK_TYPE."-": "").$ar["VALUE"];
                elseif($ar["NAME"] == $this->mess["IBLOCK_XML2_CATALOG_ID"])
                    $arIBlock["CATALOG_XML_ID"] = ($this->use_iblock_type_id? $IBLOCK_TYPE."-": "").$ar["VALUE"];
                elseif($ar["NAME"] == $this->mess["IBLOCK_XML2_NAME"])
                    $arIBlock["NAME"] = $ar["VALUE"];
                elseif($ar["NAME"] == $this->mess["IBLOCK_XML2_DESCRIPTION"])
                {
                    $arIBlock["DESCRIPTION"] = $ar["VALUE"];
                    $arIBlock["DESCRIPTION_TYPE"] = "html";
                }
                elseif($ar["NAME"] == $this->mess["IBLOCK_XML2_POSITIONS"] || $ar["NAME"] == $this->mess["IBLOCK_XML2_OFFERS"])
                    $XML_ELEMENTS_PARENT = $ar["ID"];
                elseif($ar["NAME"] == $this->mess["IBLOCK_XML2_PRICE_TYPES"])
                    $XML_PRICES_PARENT = $ar["ID"];
                elseif($ar["NAME"] == $this->mess["IBLOCK_XML2_STORES"])
                    $XML_STORES_PARENT = $ar["ID"];
                elseif($ar["NAME"] == $this->mess["IBLOCK_XML2_BASE_UNITS"])
                    $XML_BASE_UNITS_PARENT = $ar["ID"];
                elseif($ar["NAME"] == $this->mess["IBLOCK_XML2_METADATA_ID"])
                    $meta_data_xml_id = $ar["VALUE"];
                elseif($ar["NAME"] == $this->mess["IBLOCK_XML2_UPDATE_ONLY"])
                    $this->next_step["bUpdateOnly"] = ($ar["VALUE"]=="true") || intval($ar["VALUE"])? true: false;
//                elseif($ar["NAME"] == $this->mess["IBLOCK_XML2_BX_CODE"])
//                    $arIBlock["CODE"] = $ar["VALUE"];
                elseif($ar["NAME"] == $this->mess["IBLOCK_XML2_BX_SORT"])
                    $arIBlock["SORT"] = $ar["VALUE"];
                elseif($ar["NAME"] == $this->mess["IBLOCK_XML2_BX_LIST_URL"])
                    $arIBlock["LIST_PAGE_URL"] = $ar["VALUE"];
                elseif($ar["NAME"] == $this->mess["IBLOCK_XML2_BX_DETAIL_URL"])
                    $arIBlock["DETAIL_PAGE_URL"] = $ar["VALUE"];
                elseif($ar["NAME"] == $this->mess["IBLOCK_XML2_BX_SECTION_URL"])
                    $arIBlock["SECTION_PAGE_URL"] = $ar["VALUE"];
                elseif($ar["NAME"] == $this->mess["IBLOCK_XML2_BX_CANONICAL_URL"])
                    $arIBlock["CANONICAL_PAGE_URL"] = $ar["VALUE"];
                elseif($ar["NAME"] == $this->mess["IBLOCK_XML2_BX_INDEX_ELEMENTS"])
                    $arIBlock["INDEX_ELEMENT"] = ($ar["VALUE"]=="true") || intval($ar["VALUE"])? "Y": "N";
                elseif($ar["NAME"] == $this->mess["IBLOCK_XML2_BX_INDEX_SECTIONS"])
                    $arIBlock["INDEX_SECTION"] = ($ar["VALUE"]=="true") || intval($ar["VALUE"])? "Y": "N";
                elseif($ar["NAME"] == $this->mess["IBLOCK_XML2_BX_SECTIONS_NAME"])
                    $arIBlock["SECTIONS_NAME"] = $ar["VALUE"];
                elseif($ar["NAME"] == $this->mess["IBLOCK_XML2_BX_SECTION_NAME"])
                    $arIBlock["SECTION_NAME"] = $ar["VALUE"];
                elseif($ar["NAME"] == $this->mess["IBLOCK_XML2_BX_ELEMENTS_NAME"])
                    $arIBlock["ELEMENTS_NAME"] = $ar["VALUE"];
                elseif($ar["NAME"] == $this->mess["IBLOCK_XML2_BX_ELEMENT_NAME"])
                    $arIBlock["ELEMENT_NAME"] = $ar["VALUE"];
                elseif($ar["NAME"] == $this->mess["IBLOCK_XML2_BX_PICTURE"])
                {
                    if(strlen($ar["VALUE"]) > 0)
                        $arIBlock["PICTURE"] = $this->MakeFileArray($ar["VALUE"]);
                    else
                        $arIBlock["PICTURE"] = $this->MakeFileArray($this->_xml_file->GetAllChildrenArray($ar["ID"]));
                }
                elseif($ar["NAME"] == $this->mess["IBLOCK_XML2_BX_WORKFLOW"])
                    $arIBlock["WORKFLOW"] = ($ar["VALUE"]=="true") || intval($ar["VALUE"])? "Y": "N";
                elseif($ar["NAME"] == $this->mess["IBLOCK_XML2_INHERITED_TEMPLATES"])
                {
                    $arIBlock["IPROPERTY_TEMPLATES"] = array();
                    $arTemplates = $this->_xml_file->GetAllChildrenArray($ar["ID"]);
                    foreach($arTemplates as $TEMPLATE)
                    {
                        $id = $TEMPLATE[$this->mess["IBLOCK_XML2_ID"]];
                        $template = $TEMPLATE[$this->mess["IBLOCK_XML2_VALUE"]];
                        if(strlen($id) > 0 && strlen($template) > 0)
                            $arIBlock["IPROPERTY_TEMPLATES"][$id] = $template;
                    }
                }
                elseif($ar["NAME"] == $this->mess["IBLOCK_XML2_LABELS"])
                {
                    $arLabels = $this->_xml_file->GetAllChildrenArray($ar["ID"]);
                    foreach($arLabels as $arLabel)
                    {
                        $id = $arLabel[$this->mess["IBLOCK_XML2_ID"]];
                        $label = $arLabel[$this->mess["IBLOCK_XML2_VALUE"]];
                        if(strlen($id) > 0 && strlen($label) > 0)
                            $arIBlock[$id] = $label;
                    }
                }

                $arIBlock["CODE"] = DEFAULT_CATALOG_IBLOCK;
            }
            if($this->next_step["bOffer"] && !$this->use_offers)
            {
                if(strlen($arIBlock["CATALOG_XML_ID"]) > 0)
                {
                    $arIBlock["XML_ID"] = $arIBlock["CATALOG_XML_ID"];
                    $this->next_step["bUpdateOnly"] = true;
                }
            }

            $obIBlock = new CIBlock;
            $rsIBlocks = $obIBlock->GetList(array(), array("CODE"=>DEFAULT_CATALOG_IBLOCK));
            $ar = $rsIBlocks->Fetch();

            //Also check for non bitrix xml file
            if(!$ar && !array_key_exists("CODE", $arIBlock))
            {
                if($this->next_step["bOffer"] && $this->use_offers)
                    $rsIBlocks = $obIBlock->GetList(array(), array("XML_ID"=>"FUTURE-1C-OFFERS"));
                else
                    $rsIBlocks = $obIBlock->GetList(array(), array("XML_ID"=>"FUTURE-1C-CATALOG"));
                $ar = $rsIBlocks->Fetch();
            }
            if($ar)
            {
                if($bUpdateIBlock && (!$this->next_step["bOffer"] || $this->use_offers))
                {
                    if($obIBlock->Update($ar["ID"], $arIBlock))
                        $arIBlock["ID"] = $ar["ID"];
                    else
                        return $obIBlock->LAST_ERROR;
                }
                else
                {
                    $arIBlock["ID"] = $ar["ID"];
                }
            }
            else
            {
                $arIBlock["IBLOCK_TYPE_ID"] = $this->CheckIBlockType($IBLOCK_TYPE);
                if(!$arIBlock["IBLOCK_TYPE_ID"])
                    return GetMessage("IBLOCK_XML2_TYPE_ADD_ERROR");
                $arIBlock["GROUP_ID"] = array(2=>"R");
                $arIBlock["LID"] = $this->CheckSites($IBLOCK_LID);
                $arIBlock["ACTIVE"] = "Y";
                $arIBlock["WORKFLOW"] = "N";
                $arIBlock["CODE"] = DEFAULT_CATALOG_IBLOCK;
                if (
                    $this->translit_on_add
                    && !array_key_exists("CODE", $arIBlock)
                )
                {
                    $arIBlock["FIELDS"] = array(
                        "CODE" => array( "DEFAULT_VALUE" => array(
                            "TRANSLITERATION" => "Y",
                            "TRANS_LEN" => $this->translit_on_add["max_len"],
                            "TRANS_CASE" => $this->translit_on_add["change_case"],
                            "TRANS_SPACE" => $this->translit_on_add["replace_space"],
                            "TRANS_OTHER" => $this->translit_on_add["replace_other"],
                            "TRANS_EAT" => $this->translit_on_add["delete_repeat_replace"]? "Y": "N",
                        )),
                        "SECTION_CODE" => array( "DEFAULT_VALUE" => array(
                            "TRANSLITERATION" => "Y",
                            "TRANS_LEN" => $this->translit_on_add["max_len"],
                            "TRANS_CASE" => $this->translit_on_add["change_case"],
                            "TRANS_SPACE" => $this->translit_on_add["replace_space"],
                            "TRANS_OTHER" => $this->translit_on_add["replace_other"],
                            "TRANS_EAT" => $this->translit_on_add["delete_repeat_replace"]? "Y": "N",
                        )),
                    );
                }
                $arIBlock["ID"] = $obIBlock->Add($arIBlock);
                if(!$arIBlock["ID"])
                    return $obIBlock->LAST_ERROR;
            }

            //Make this catalog
            if($this->bCatalog && $this->next_step["bOffer"])
            {
                $obCatalog = new CCatalog();
                $intParentID = $this->GetIBlockIdByCode(DEFAULT_CATALOG_IBLOCK);
                if (0 < intval($intParentID) && $this->use_offers)
                {
                    $mxSKUProp = $obCatalog->LinkSKUIBlock($intParentID,$arIBlock["ID"]);
                    if (!$mxSKUProp)
                    {
                        if ($ex = $APPLICATION->GetException())
                        {
                            $result = $ex->GetString();
                            return $result;
                        }
                    }
                    else
                    {
                        $rs = CCatalog::GetList(array(),array("IBLOCK_ID"=>$arIBlock["ID"]));
                        if($arOffer = $rs->Fetch())
                        {
                            $boolFlag = $obCatalog->Update($arIBlock["ID"],array('PRODUCT_IBLOCK_ID' => $intParentID,'SKU_PROPERTY_ID' => $mxSKUProp));
                        }
                        else
                        {
                            $boolFlag = $obCatalog->Add(array("IBLOCK_ID"=>$arIBlock["ID"], "YANDEX_EXPORT"=>"N", "SUBSCRIPTION"=>"N",'PRODUCT_IBLOCK_ID' => $intParentID,'SKU_PROPERTY_ID' => $mxSKUProp));
                        }
                        if (!$boolFlag)
                        {
                            if ($ex = $APPLICATION->GetException())
                            {
                                $result = $ex->GetString();
                                return $result;
                            }
                        }
                    }
                }
                else
                {
                    $rs = CCatalog::GetList(array(),array("IBLOCK_ID"=>$arIBlock["ID"]));
                    if(!($rs->Fetch()))
                    {
                        $boolFlag = $obCatalog->Add(array("IBLOCK_ID"=>$arIBlock["ID"], "YANDEX_EXPORT"=>"N", "SUBSCRIPTION"=>"N"));
                        if (!$boolFlag)
                        {
                            if ($ex = $APPLICATION->GetException())
                            {
                                $result = $ex->GetString();
                                return $result;
                            }
                        }
                    }
                }
            }

            //For non bitrix xml file
            //Check for mandatory properties and add them as necessary
            if(!array_key_exists("CODE", $arIBlock))
            {
                $arProperties = array(
                    "CML2_BAR_CODE" => GetMessage("IBLOCK_XML2_BAR_CODE"),
                    "CML2_ARTICLE" => GetMessage("IBLOCK_XML2_ARTICLE"),
                    "CML2_ATTRIBUTES" => array(
                        "NAME" => GetMessage("IBLOCK_XML2_ATTRIBUTES"),
                        "MULTIPLE" => "Y",
                        "WITH_DESCRIPTION" => "Y",
                        "MULTIPLE_CNT" => 1,
                    ),
                    "CML2_TRAITS" => array(
                        "NAME" => GetMessage("IBLOCK_XML2_TRAITS"),
                        "MULTIPLE" => "Y",
                        "WITH_DESCRIPTION" => "Y",
                        "MULTIPLE_CNT" => 1,
                    ),
                    "CML2_BASE_UNIT" => GetMessage("IBLOCK_XML2_BASE_UNIT_NAME"),
                    "CML2_TAXES" => array(
                        "NAME" => GetMessage("IBLOCK_XML2_TAXES"),
                        "MULTIPLE" => "Y",
                        "WITH_DESCRIPTION" => "Y",
                        "MULTIPLE_CNT" => 1,
                    ),
                    "CML2_PICTURES" => array(
                        "NAME" => GetMessage("IBLOCK_XML2_PICTURES"),
                        "MULTIPLE" => "Y",
                        "WITH_DESCRIPTION" => "Y",
                        "MULTIPLE_CNT" => 1,
                        "PROPERTY_TYPE" => "F",
                        "CODE" => "MORE_PHOTO",
                    ),
                    "CML2_FILES" => array(
                        "NAME" => GetMessage("IBLOCK_XML2_FILES"),
                        "MULTIPLE" => "Y",
                        "WITH_DESCRIPTION" => "Y",
                        "MULTIPLE_CNT" => 1,
                        "PROPERTY_TYPE" => "F",
                        "CODE" => "FILES",
                    ),
                    "CML2_MANUFACTURER" => array(
                        "NAME" => GetMessage("IBLOCK_XML2_PROP_MANUFACTURER"),
                        "MULTIPLE" => "N",
                        "WITH_DESCRIPTION" => "N",
                        "MULTIPLE_CNT" => 1,
                        "PROPERTY_TYPE" => "L",
                    ),
                );
                foreach($arProperties as $k=>$v)
                {
                    $result = $this->CheckProperty($arIBlock["ID"], $k, $v);
                    if($result!==true)
                        return $result;
                }
                //For offers make special property: link to catalog
                if(isset($arIBlock["CODE"]) && $this->use_offers)
                    $this->CheckProperty($arIBlock["ID"], "CML2_LINK", array(
                        "NAME" => GetMessage("IBLOCK_XML2_CATALOG_ELEMENT"),
                        "PROPERTY_TYPE" => "E",
                        "USER_TYPE" => "SKU",
                        "LINK_IBLOCK_ID" => $this->GetIBlockIdByCode(DEFAULT_CATALOG_IBLOCK),
                        "FILTRABLE" => "Y",
                    ));
            }

            $this->next_step["IBLOCK_ID"] = $arIBlock["ID"];
            $this->next_step["XML_ELEMENTS_PARENT"] = $XML_ELEMENTS_PARENT;
        }

        if($meta_data_xml_id)
        {
            $rs = $this->_xml_file->GetList(
                array(),
                array("PARENT_ID" => $xml_root_id, "NAME" => $this->mess["IBLOCK_XML2_METADATA"]),
                array("ID")
            );
            while($arMetadata = $rs->Fetch())
            {
                //Find referenced metadata
                $bMetaFound = false;
                $meta_roots = array();
                $rsMetaRoots = $this->_xml_file->GetList(
                    array("ID" => "asc"),
                    array("PARENT_ID" => $arMetadata["ID"])
                );
                while($arMeta = $rsMetaRoots->Fetch())
                {
                    if(isset($arMeta["VALUE_CLOB"]))
                        $arMeta["VALUE"] = $arMeta["VALUE_CLOB"];

                    if($arMeta["NAME"] == $this->mess["IBLOCK_XML2_ID"] && $arMeta["VALUE"] == $meta_data_xml_id)
                        $bMetaFound = true;

                    $meta_roots[] = $arMeta;
                }

                //Get xml parents of the properties and sections
                if($bMetaFound)
                {
                    foreach($meta_roots as $arMeta)
                    {
                        if($arMeta["NAME"] == $this->mess["IBLOCK_XML2_GROUPS"])
                            $XML_SECTIONS_PARENT = $arMeta["ID"];
                        elseif($arMeta["NAME"] == $this->mess["IBLOCK_XML2_PROPERTIES"])
                            $XML_PROPERTIES_PARENT = $arMeta["ID"];
                        elseif($arMeta["NAME"] == $this->mess["IBLOCK_XML2_GROUPS_PROPERTIES"])
                            $XML_SECTIONS_PROPERTIES_PARENT = $arMeta["ID"];
                        elseif($arMeta["NAME"] == $this->mess["IBLOCK_XML2_SECTION_PROPERTIES"])
                            $XML_SECTION_PROPERTIES = $arMeta["ID"];
                        elseif($arMeta["NAME"] == $this->mess["IBLOCK_XML2_PRICE_TYPES"])
                            $XML_PRICES_PARENT = $arMeta["ID"];
                        elseif($arMeta["NAME"] == $this->mess["IBLOCK_XML2_STORES"])
                            $XML_STORES_PARENT = $arMeta["ID"];
                        elseif($arMeta["NAME"] == $this->mess["IBLOCK_XML2_BASE_UNITS"])
                            $XML_BASE_UNITS_PARENT = $arMeta["ID"];
                    }
                    break;
                }
            }
        }

        $iblockFields = CIBlock::GetFields($arIBlock["ID"]);
        $iblockFields["XML_IMPORT_START_TIME"] = array(
            "NAME" => "XML_IMPORT_START_TIME",
            "IS_REQUIRED" => "N",
            "DEFAULT_VALUE" => date("Y-m-d H:i:s"),
        );
        CIBlock::SetFields($arIBlock["ID"], $iblockFields);

        if($XML_PROPERTIES_PARENT)
        {
            $result = $this->ImportProperties($XML_PROPERTIES_PARENT, $arIBlock["ID"]);
            if($result!==true)
                return $result;
        }

        if($XML_SECTION_PROPERTIES)
        {
            $result = $this->ImportSectionProperties($XML_SECTION_PROPERTIES, $arIBlock["ID"]);
            if($result!==true)
                return $result;
        }

        if($XML_SECTIONS_PROPERTIES_PARENT)
        {
            $result = $this->ImportSectionsProperties($XML_SECTIONS_PROPERTIES_PARENT, $arIBlock["ID"]);
            if($result!==true)
                return $result;
        }

        if($XML_PRICES_PARENT)
        {
            if($this->bCatalog)
            {
                $result = $this->ImportPrices($XML_PRICES_PARENT, $arIBlock["ID"], $IBLOCK_LID);
                if($result!==true)
                    return $result;
            }
        }

        if($XML_STORES_PARENT)
        {
            if($this->bCatalog && CBXFeatures::IsFeatureEnabled('CatMultiStore'))
            {
                $result = $this->ImportStores($XML_STORES_PARENT);
                if($result!==true)
                    return $result;
            }
        }

        if($XML_BASE_UNITS_PARENT)
        {
            if($this->bCatalog)
            {
                $result = $this->ImportBaseUnits($XML_BASE_UNITS_PARENT);
                if($result!==true)
                    return $result;
            }
        }

        $this->next_step["section_sort"] = 100;
        $this->next_step["XML_SECTIONS_PARENT"] = $XML_SECTIONS_PARENT;

        $rs = $this->_xml_file->GetList(
            array(),
            array("PARENT_ID" => $xml_root_id, "NAME" => $this->mess["IBLOCK_XML2_PRODUCTS_SETS"]),
            array("ID", "ATTRIBUTES")
        );
        $ar = $rs->Fetch();
        if ($ar)
        {
            $this->next_step["SETS"] = $ar["ID"];
        }

        return true;
    }
}