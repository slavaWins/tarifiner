<?php

namespace App\Http\Controllers\Tarifiner;


use App\Http\Controllers\Controller;
use App\Http\Controllers\NotifyBallController;
use App\Library\Tarifiner\Contracts\BaseTarifVariant;
use App\Library\Tarifiner\Contracts\TarifVariant;
use App\Library\Tarifiner\TarifinerValidate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Tarifiner\Library\TarifinerLib;


class TarifinerController extends Controller
{


    public function MoveTo($ind)
    {

        $user = Auth::user();

        $list = \App\Library\Tarifiner\TarifinerConfiguration::GetVariants();
        if (!isset($list[$ind])) redirect()->back()->withErrors("Тариф не найден");

        $userProjectCount = 1;

        /** @var $tarif TarifVariant */
        $tarif = $list[$ind];


        $needBalance = $tarif->priceDay * 5;

        $tarifCurrent = $list[$user->tarifInd ?? ""] ?? null;
        $errorMove = TarifinerValidate::IssetErrorBySetTarif($user, $tarifCurrent, $tarif);
        if ($errorMove) {
            return redirect()->back()->withErrors($errorMove);
        }

        if (TarifinerLib::GetCurrentBalance($user) < $needBalance) {
            return redirect()->back()->withErrors("У вас не хватает баланса для перехода на этот тариф");
        }

        TarifinerLib::TakeBalance($user, $needBalance);
        $user->tarifInd = $ind;
        $user->save();

        //NotifyBallController::SendToUid(Auth::user()->id, "Вы сменили тариф на " . $tarif->name . ". Стоимость перехода " . $needBalance . " ₽ была снята с вашего баланса.");

        return redirect()->back()->withErrors("Вы успешно сменили тариф!");

    }

    public function Index(Request $request)
    {
        return view('tarifiner.page');
    }


    public function PayTestPage(Request $request)
    {

        if (isset($request['payplus'])) {
            $val = intval($request['payplus']);
            if ($val > 0) {
                TarifinerLib::TakeBalance(Auth::user(), -$val);
                Auth::user()->save();

                //NotifyBallController::SendToUid(Auth::user()->id, "Тестовое пополнение баланса на " . $val . " RUB");


                return redirect()->back();
            }
        }

        return view('tarifiner.pay-test');

    }


}
