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
            $contrat->update(['total_indemnite' => $contrat->prime_anciennete + $contrat->prime_logement + $contrat->prime_transport + $contrat->prime_fonction]);

            //Calcul de salaire de base
            $contrat->update(['sal_base' => $contrat->base * $contrat->taux]);
            
            //Calcul de salaire brut
            $contrat->update(['salaire_brut' => $contrat->sal_base + $contrat->total_indemnite]);

            //Calcul du retenues cnss
            $contrat->update(['cnss' => $contrat->salaire_brut * 5.5 / 100]);

            //Calcul du retenues iuts
            //$contrat->update(['iuts' => $contrat->salaire_brut * 5,5 / 100]);

            //Calcul du retenues sur salaire
            $contrat->update(['total_retenue' => $contrat->iuts + $contrat->cnss]);

            //Salaire net à payer
            $contrat->update(['sal_net' => $contrat->salaire_brut - $contrat->total_retenue]);
        });

        Precompte::created(function ($precom) {
            // Calcul de pré-compte
            $precom->update(['retenu_mois' => $precom->capital_initial / $precom->nbr_echeance]);
        });

        Paiement::created(function ($paie) {
            $paie->update(['code' => 'PAI-00' . $paie->id]);

            $paie->update(['avoir' => $paie->Contrat->salaire_brut + $paie->occasionnelle]);
            $paie->update(['retenu' => $paie->Contrat->total_retenue + $paie->precompte + $paie->autres_retenu]);

            $paie->update(['salaire_total' => $paie->avoir - $paie->retenu]);    
        });
        
        Mission::created(function ($code) {
            $code->update(['code' => 'Miss-00' . $code->id]);
        });
    }
}
