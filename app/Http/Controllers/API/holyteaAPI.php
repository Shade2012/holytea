<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
class holyteaAPI extends Controller
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
