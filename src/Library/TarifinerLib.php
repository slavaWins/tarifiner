<?php


namespace Tarifiner\Library;


use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Library\Tarifine\TarifinerConfiguration;

class TarifinerLib
{


    /**
     * @param $user
     * @return Carbon
     */
    public static function DayCountToBlocked($user)
    {

        $need = self::GetUserRentToDay($user);
        if ($need <= 0) return Carbon::now()->addSeconds(3600 * 24 * 30 * 13);


        if (self::GetCurrentBalance($user) < $need) {
            return Carbon::now();
        }

        $days = floor(self::GetCurrentBalance($user) / $need);
        $secondToBlocked = $days * \App\Library\Tarifiner\TarifinerConfiguration::DAY_LEN;

        $dateBlocked = Carbon::now()->addSeconds($secondToBlocked);

        return $dateBlocked;
    }


    public static function TakeBalance($user, $amount)
    {

        $key = \App\Library\Tarifiner\TarifinerConfiguration::USER_BALANCE_COLUM_NAME;
        $user->$key -= $amount;
        $user->save();

        \App\Library\Tarifiner\TarifinerConfiguration::OnTakeMoneyUser($user, $amount);
    }

    public static function GetUserRentToDay($user)
    {
        return 1;
    }


    public static function TakeRent($user)
    {

        $need = self::GetUserRentToDay($user);

        if ($need <= 0) return true;

        if (self::GetCurrentBalance($user) < $need) return false;

        self::TakeBalance($user, $need);

        return true;
    }

    public static function CheckTakeDailyRent($user)
    {

        if ($user->lastBalanceTaked == null) {
            $user->lastBalanceTaked = Carbon::now();
            $user->save();
            self::TakeRent($user);
            return true;
        }

        $ld = new Carbon($user->lastBalanceTaked);
        $dateDiff = $ld->diffInSeconds(Carbon::now());

        if ($dateDiff >= \App\Library\Tarifiner\TarifinerConfiguration::DAY_LEN) {
            $user->lastBalanceTaked = Carbon::now();
            $user->save();
            self::TakeRent($user);
            return true;
        }

        return false;
    }

    public static function GetCurrentBalance(User $user)
    {

        if (self::CheckTakeDailyRent($user)) {
            //  $user = User::find($user->id);
        }

        $key = \App\Library\Tarifiner\TarifinerConfiguration::USER_BALANCE_COLUM_NAME;

        return $user->$key;
    }
}
