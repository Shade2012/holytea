<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class holyteaController extends Controller
{
    function getData() {
        $chocoMilk = [
            "id" => 1,
            "name" => "Holy Choco Milk"
        ];
    
        $chocoStrawberry = [
            "id" => 2,
            "name" => "Delicious Choco Strawberry"
        ];
        
        return [$chocoMilk, $chocoStrawberry];
    }
}
