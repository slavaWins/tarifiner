<?php

namespace Tarifiner\Library\Contracts;



    class BaseTarifVariant
    {

        public $teams = 1;
        public $teamMembers = 2;

        public $name = "easy";
        public $priceDay = 2;
        public $descr = "Базовый тариф. Дополните его полями в своем классе.";

        public $listTableCompare = [
            'Используется свой класс'=>false,
            'Вы ленивы'=>true,
            'Должны поправить это'=>true,
        ];


        public function __construct($fill = [])
        {
            foreach ($fill as $K=>$V){
                if(isset($this->$K)){
                    $this->$K = $V;
                }
            }
        }

    }
