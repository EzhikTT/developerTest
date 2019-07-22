<?
class IBlockWork
{

    public static function getList($order = [], $fiter = [], $select = []){

        $obCache = new CPHPCache();

        if ($obCache->InitCache('36000', 'iblock_cache_work_' . time(), "/"){
            $vars = $obCache->GetVars();
            $arRes = $vars["LIST"];
        }
        else{
            $arItems = \Bitrix\Iblock\ElementTable::getList([
                'filter' => $filter,
                'order' => $order,
                'select' => $select
            ])->fetchAll();

            if ($obCache->StartDataCache()) {
                $obCache->EndDataCache(["LIST" => $arItems]);
            }
        }

    }
}