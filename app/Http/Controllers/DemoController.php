<?php

namespace App\Http\Controllers;



use App\Repository\MathService;

class DemoController extends Controller
{
    public function index(MathService $ms)  {
        dd($ms->add([5,10]));
    }
}
