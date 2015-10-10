<?
/**
 *
 * Класс для работы с городами
 *
 */

use Bitrix\Highloadblock as HL;
use Bitrix\Main\Entity;

if (!CModule::IncludeModule('highloadblock'))
{
    ShowError(GetMessage("Не установлены необходимые модули!"));
    return 0;
}

class CISCity {

    //
    // Получаем массив со списком городов
    //
    public static function GetCityList() {

        $arResult = array();

        $rsData = \Bitrix\Highloadblock\HighloadBlockTable::getList(array('filter'=>array('NAME'=>CITY_LIST_HLB)));
        if ( !($arData = $rsData->fetch()) ){
            echo 'Инфоблок не найден';
        } else {
            $Entity = \Bitrix\Highloadblock\HighloadBlockTable::compileEntity($arData);

            $Query = new \Bitrix\Main\Entity\Query($Entity);
            $Query->setSelect(array('*'));

            $result = $Query->exec();
            $result = new CDBResult($result);

            while ($row = $result->Fetch()){
                $arResult[$row['UF_CITY_CODE']] = $row['UF_CITY_NAME'];
            }

        }
        return $arResult;

    }


    //
    // Название города по коду
    //
    public static function GetCityNameByCode($code) {
        $code = intval($code);

        $сityList = self::GetCityList();

        return $сityList[$code];
    }
}