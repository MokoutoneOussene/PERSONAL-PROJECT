<?php

namespace App\Http\Controllers;

use App\Models\Contrat;
use App\Models\Depense;
use App\Models\Mission;
use App\Models\Personnel;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index()
    {
        return view('pages.auth.login');
    }

    public function dash()
    {
        $current_date = date('Y/m/d');
        $agents = Personnel::all();
        $contrats = Contrat::all();
        $missions = Mission::all();
        $depenses = Depense::all();
        $total = $depenses->sum('montant');
        return view('pages.dashboard', compact('agents', 'contrats', 'missions', 'depenses', 'current_date', 'total'));
    }
}
