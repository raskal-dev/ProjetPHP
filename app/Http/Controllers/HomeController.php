<?php

namespace App\Http\Controllers;

use App\Models\Agence;
use App\Models\Cite;
use App\Models\Logement;
use App\Models\Terrain;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $logementCount = Logement::count('id');
        $citeCount = Cite::count('id');
        $terrainCount = Terrain::count('id');
        $agenceCount = Agence::count('id');
        $montantTotal = Logement::sum('prix_logement');

        $data = DB::table('agences')
                 ->select(DB::raw('count(*) as count, MONTH(created_at) as month'))
                 ->groupBy('month')
                 ->orderBy('month')
                 ->get();

        $months = [];
        $counts = [];

        foreach($data as $item) {
            $months[] = $item->month;
            $counts[] = $item->count;
        }

        $chartData = [
            'labels' => $months,
            'datasets' => [
                [
                    'label' => 'Agences par mois',
                    'backgroundColor' => '#f87979',
                    'data' => $counts
                ]
            ]
        ];

        return view('home.home', compact(
            'logementCount',
            'citeCount',
            'terrainCount',
            'agenceCount',
            'montantTotal',
            'chartData'
        ));
    }

}
