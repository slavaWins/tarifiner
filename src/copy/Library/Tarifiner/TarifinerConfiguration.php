<?php

namespace App\Library\Tarifiner;


use App\Contracts\Tarifiner\TarifVariant;
use App\Library\Tarifiner\Contracts\BaseTarifVariant;
use App\Models\User;

class TarifinerConfiguration
{

    const USER_BALANCE_COLUM_NAME = "balance";
    const DAY_LEN = 3600 * 24;

    /**
     * @return BaseTarifVariant[]
     */
    public static function GetVariants()
    {
        $tarifs = [];

        $variant = new TarifVariant();
        $variant->name = "Бесплатно";
        $variant->limitProject = 1;
        $variant->priceDay = 0;
        $variant->limitDebugCount = 120;
        $tarifs['free'] = $variant;


        $variant = new TarifVariant();
        $variant->name = "Железный тариф";
        $variant->limitProject = 2;
        $variant->priceDay = 8;
        $variant->limitDebugCount = 220;
        $tarifs['iron'] = $variant;


        $variant = new TarifVariant();
        $variant->name = "Мега тариф";
        $variant->limitProject = 56;
        $variant->priceDay = 35;
        $variant->limitDebugCount = 220;
        $tarifs['sol'] = $variant;


        return $tarifs;
    }

    public static function OnTakeMoneyUser(User $user, $amount){
        //У пользователя взяли деньги, можете в историю записать
    }
}
