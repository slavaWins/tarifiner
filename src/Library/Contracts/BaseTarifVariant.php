<?php

namespace Tarifiner\Library\Contracts;



    class BaseTarifVariant
    {

        public $name = "easy";
        public $priceDay = 2;
        public $descr = "Базовый тариф. Дополните его полями в своем классе.";

        public $listTableCompare = [
            'Используется свой класс'=>false,
            'Вы ленивы'=>true,
            'Должны поправить это'=>true,
        ];

    }
