@php
    use Tarifiner\Library\TarifinerLib;
@endphp

@extends('layouts.containerscreen')

@section('content')

    <h2 class=" ">
        Тарифы
    </h2>


    <h5 class=" ">
        Сейчас ваш баланс: {{  TarifinerLib::GetCurrentBalance(Auth::user())}}
        RUB
    </h5>


    <div class="row">

        @foreach(config('tarifiner.variants') as $K=>$item)
            <div class="col tarifCol m-2 p-4">


                @include("tarifiner.card-content")


                @if(Auth::user()->tarifInd == $K)
                    <p class="  _btn _curTar"> Текущий тариф</p>

                @else

                    @if( TarifinerLib::GetCurrentBalance(Auth::user()) > $item->priceDay*5)
                        <a class="btn btn-danger _btn" href="{{route("tarifiner.move", $K)}}">Подключить</a>
                    @else
                        <p class="  _btn _curTar"> Для перехода нужно пополнить счет</p>
                    @endif
                    <small>Стоимость перехода {{$item->priceDay*5}} RUB</small>
                @endif

            </div>
        @endforeach

    </div>


    <style>
        .tarifCol ._curTar {
            text-align: center;
            padding-top: 8px;
            opacity: 0.8;
        }

        .tarifCol ._btn {
            width: 100%;
        }

        .tarifCol .listTableCompare {
            font-size: 0.7em;

        }

        .tarifCol ._descr {
            font-size: 0.8em;

        }

        .tarifCol h4 {
            font-size: 19px;
        }

        .tarifCol {
            xbackground: #f8ecf3;
            border: 1px solid #d1e7dd;
            border-radius: 2px;
        }
    </style>

@endsection

