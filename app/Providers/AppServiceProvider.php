<?php

namespace App\Providers;

use App\Models\Contrat;
use App\Models\Mission;
use App\Models\Occasionnelle;
use App\Models\Paiement;
use App\Models\Personnel;
use App\Models\Precompte;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

        // si on fini d'enregistrer un personnel, il cree un matricule en mettant le champ MATRICULE à jour
        Personnel::created(function ($person_mat) {
            $person_mat->update(['matricule' => 'M-000' . $person_mat->id]);
        });

        Contrat::created(function ($contrat) {
            $contrat->update(['code' => 'CONT-00' . $contrat->id]);
            //Calcul des indemnités
            $contrat->update(['total_indemnite' => $contrat->prime_anciennete + $contrat->prime_logement + $contrat->prime_transport + $contrat->prime_divers]);

            //Calcul de salaire brut
            $contrat->update(['salaire_brut' => $contrat->sal_base + $contrat->total_indemnite]);

            //Calcul du retenues sur salaire
            $contrat->update(['total_retenue' => $contrat->uits + $contrat->cotisation_sociale + $contrat->impot + $contrat->avance_pret + $contrat->mutuelle_payee]);

            //Salaire net à payer
            $contrat->update(['sal_net' => $contrat->salaire_brut - $contrat->total_retenue]);
        });

        Occasionnelle::created(function ($occas) {
            $occas->update(['code' => 'OC-00' . $occas->id]);
        });

        Precompte::created(function ($precom) {
            $precom->update(['code' => 'PR-00' . $precom->id]);

            // Calcul de pré-compte
            $precom->update(['marge' => $precom->capital_initial * 5/100]);
            $precom->update(['montant_rembourse' => $precom->capital_initial + $precom->marge]);
            $precom->update(['retenu_mois' => $precom->montant_rembourse / $precom->nbr_echeance]);
        });

        Paiement::created(function ($paie) {
            $paie->update(['code' => 'PAI-00' . $paie->id]);
            $paie->update(['salaire_total' => $paie->Contrat->sal_net + $paie->occasionnelle - $paie->precompte]);      
        });
        
        Mission::created(function ($code) {
            $code->update(['code' => 'Miss-00' . $code->id]);
        });
    }
}