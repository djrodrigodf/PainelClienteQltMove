<?php

namespace App\Http\Controllers\Admin;

use App\Models\FrtPrecificacao;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class HomeController
{
    public function index()
    {
        return view('home');
    }


}
