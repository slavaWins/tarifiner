<?php

namespace App\Library\Tarifiner\Contracts;


class TarifVariant extends BaseTarifVariant
{


    public $limitProject = 3;
    public $limitDebugCount = 2000;

    public $limitExample = 25;

    public $listTableCompare = [
        'Поддержка' => true,
        'Бесплатная консультация' => true,
        'Особые услвоия' => true,
        'Телеграм бот' => false,
    ];
}
