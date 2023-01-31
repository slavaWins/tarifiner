<?php

use App\Contracts\Teamperm\TeamRoleStruct;
use App\Contracts\Tarifiner\TarifVariant;
use App\Providers\RouteServiceProvider;
use Laravel\Fortify\Features;

return [
    'USER_BALANCE_COLUM_NAME' =>  "balance",
    'DAY_LEN' =>   3600 * 24,
    'variants' => [
        'free' => new TarifVariant([
            'name' => "Бесплатно",
            'priceDay' => 0,
            'descr' => "Базовый тариф. Дополните его полями в своем классе.",
            'listTableCompare' => [
                'Используется свой класс' => false,
                'Вы ленивы' => true,
                'Должны поправить это' => true,
            ],
            'limitProject' => 1,
            'teamMembers' => 1,
            'teams' => 1,
        ]),
        'iron' => new TarifVariant([
            'name' => "Железный тариф",
            'priceDay' => 3,
            'descr' => "Базовый тариф. Дополните его полями в своем классе.",
            'listTableCompare' => [
                'Используется свой класс' => false,
                'Вы ленивы' => true,
                'Должны поправить это' => true,
            ],
            'limitProject' => 2,
            'teamMembers' => 4,
            'teams' => 2,
        ]),
        'sol' => new TarifVariant([
            'name' => "Мега",
            'priceDay' => 7,
            'descr' => "Базовый тариф. Дополните его полями в своем классе.",
            'listTableCompare' => [
                'Используется свой класс' => false,
                'Вы ленивы' => true,
                'Должны поправить это' => true,
            ],
            'limitProject' => 4,
            'teamMembers' => 9,
            'teams' => 3,
        ]),
    ],
];
