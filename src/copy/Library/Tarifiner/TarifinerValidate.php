<?php

namespace App\Library\Tarifiner;


use App\Contracts\Tarifiner\TarifVariant;
use App\Library\Tarifiner\Contracts\BaseTarifVariant;
use App\Models\User;

class TarifinerValidate
{


    public static function IssetErrorBySetTarif(User $user, TarifVariant $currentVariant, TarifVariant $toVariant)
    {

        //if($user->GetProjectCount()>$variant->limitProject)
        //return "У вас слишком много проектов";


        return null;
    }


    public static function OnTakeMoneyUser(User $user, $amount){
        //У пользователя взяли деньги, можете в историю записать
    }

}
