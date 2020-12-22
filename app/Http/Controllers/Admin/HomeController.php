<?php

namespace App\Http\Controllers\Admin;

use App\Models\FrtPrecificacao;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class HomeController
{
    public function index()
    {

        $contratoSadeno = DB::connection('mysqlSadeno')->table('sdn_frt_contrato')->where('ID', '=', 1737)->first();
        dd($contratoSadeno);

        return view('home');
    }


}
