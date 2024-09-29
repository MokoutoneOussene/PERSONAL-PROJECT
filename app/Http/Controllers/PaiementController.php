<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\AutresRetenu;
use App\Models\Contrat;
use App\Models\IstitutBank;
use App\Models\Occasionnelle;
use App\Models\Paiement;
use App\Models\Precompte;
use Illuminate\Http\Request;

class PaiementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $collection = Contrat::latest()->get();
        return view('pages.paiement.liste', compact('collection'));
    }

    /**
     * Display a listing of the resource.
     */
    public function liste_paie()
    {
        $collection = Paiement::latest()->get();
        $total = $collection->sum('salaire_total');
        return view('pages.paiement.liste_paie', compact('collection', 'total'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Paiement::create($request->all());

        emotify('success', 'Paiement effectué avec success !');
        return redirect()->route('gestion_paiement.index')->with('message', 'Paiement effectué avec success !');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $finds = Paiement::find($id);
        return view('pages.paiement.detail', compact('finds'));
    }

    /**
     * Display the specified resource.
     */
    public function generation(string $id)
    {
        $finds = Contrat::find($id);
        $occasionelle = Occasionnelle::where('contrats_id', '=', $id)->where('statut', '=', 'En Cours')->get();
        $precomptes = Precompte::where('contrats_id', '=', $id)->where('statut', '=', 'En Cours')->get();
        $autres_retenue = AutresRetenu::where('contrats_id', '=', $id)->where('statut', '=', 'En Cours')->get();

        $occasionelle_collection = Occasionnelle::where('contrats_id', '=', $id)->get();
        $precomptes_collection = Precompte::where('contrats_id', '=', $id)->get();
        $retenue_collection = AutresRetenu::where('contrats_id', '=', $id)->get();

        $collection = IstitutBank::latest()->get();

        $total_occasionnelle = $occasionelle->sum('montant');
        $total_precompte = $precomptes->sum('retenu_mois');
        $total_retenues = $autres_retenue->sum('montant');

        return view(
            'pages.paiement.generation', compact(
                'finds', 'occasionelle_collection', 'precomptes_collection', 'retenue_collection', 'total_occasionnelle', 'total_precompte', 'collection', 'total_retenues'
            )
        );
    }

    public function generationgroupe(Request $request)
    {
        $allready=[];
        foreach ($request->contrat as $contrat_id){
            $contrat = Contrat::find($contrat_id);
            $occasionelle = $contrat-> Occasionnelle()->where('statut', '=', 'En Cours')->get();
            $precomptes = $contrat->Precompte()->where('statut', '=', 'En Cours')->get();
            $autres_retenue = $contrat->AutresRetenu()->where('statut', '=', 'En Cours')->get();
            $i=0;
            //$collection = IstitutBank::latest()->get();
            $paiment_recent=$contrat->Paiement()->where("periode_paie","=",$request->periode_paie)->where("annee_paie","=",$request->annee_paie)->get();
            if (count($paiment_recent)==0){
                $total_occasionnelle = $occasionelle->sum('montant');
                $total_precompte = $precomptes->sum('retenu_mois');
                $total_retenues = $autres_retenue->sum('montant');
                $paiement=new Paiement();
                $paiement->periode_paie=$request->periode_paie;
                $paiement->mode_paie=$request->mode_paie;
                $paiement->contrats_id=$contrat_id;
                $paiement->annee_paie=$request->annee_paie;
                $paiement->occasionnelle=$total_occasionnelle;
                $paiement->precompte=$total_precompte;
                $paiement->autres_retenu=$total_retenues;
                $paiement->istitut_banks_id=$request->istitut_banks_id;
                $paiement->save();
            }else{
               $allready[]=$contrat->Agent->matricule;
            }
        }
        return back()->with(["allready"=>$allready]);
    }

    /**
     * Display the specified resource.
     */
    public function Gener_groupe()
    {
        $collection = Contrat::latest()->get();
        $banques = IstitutBank::latest()->get();
        return view('pages.paiement.generation_groupe', compact('collection', 'banques'));
    }

    /**
     * Display the specified resource.
     */
    public function print_bulletin(string $id)
    {
        $finds = Paiement::find($id);
        return view('pages.paiement.bulletin', compact('finds'));
    }

    /**
     * Display the specified resource.
     */
    public function generation_bulletin(Request $request)
    {
        $periode_paie = $request->periode_paie;
        $annee_paie = $request->annee_paie;

        $collection = Paiement::where('periode_paie', '=', $periode_paie)->where('annee_paie', '=', $annee_paie)->get();
        return view('pages.paiement.generation_bulletin', compact('collection'));
    }
 
    /**
     * Show the form for creating a new resource.
     */
    public function date_filter(Request $request)
    {
        $periode_paie = $request->periode_paie;
        $annee_paie = $request->annee_paie;

        $collection = Paiement::where('periode_paie', '=', $periode_paie)->where('annee_paie', '=', $annee_paie)->get();
        $total = $collection->sum('salaire_total');

        return view('pages.paiement.search_liste_paie', compact('collection', 'total'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $paies = Paiement::find($id);
        $paies->delete();

        emotify('error', ' Paiement de salaire supprimer avec success !');
        return redirect()->back();
    }
}
