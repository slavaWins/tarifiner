<?php

namespace App\Library\Tarifiner;


use App\Library\Tarifiner\Contracts\BaseTarifVariant;
use App\Library\Tarifiner\Contracts\TarifVariant;

class TarifinerConfiguration
{

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

}
