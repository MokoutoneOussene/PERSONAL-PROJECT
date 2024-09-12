<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bulletin</title>
    @include('layouts.style')
</head>

<body>
    <div class="row mb-2">
        <div class="col-6">
            <div class="p-3" style="border: 2px solid black; background: rgb(216, 214, 214)">
                <p>
                    <strong>WEST AFRICAN UNITED DRILLING</strong> <br>
                    N° IFU : 00205993J <br>
                    12 BP OUA 12, OUAGADOUGOU <br>
                    N° Ident fiscale : 1450671K<br>
                </p>
            </div>
        </div>
        <div class="col-6 d-flex justify-content-center">
            <img src="{{ asset('images/logo_west.png') }}" alt="logo" style="width: 70%">
        </div>
    </div>

    <div class="d-flex justify-content-between m-3">
        <h1 class="text-center"><strong>BULLETIN DE PAIE N° {{ $finds->code }}</strong></h1>
        <h6>Fait à Ouagadougou le, {{ Carbon\Carbon::now()->format('d-m-Y') }}</h6>
    </div>

    <div class="d-flex justify-content-between" style="width: 75%">
        <p>Période :</p>
        <p>DU {{ $finds->periode_paie }} <span>{{ $finds->annee_paie }}</span></p>
    </div>
    <div style="width: 100%; border: 2px solid rgb(12, 12, 12)">
        <div class="p-2" style="border-bottom: 1px solid rgb(12, 12, 12)">
            <div class="row">
                <div class="col-6">
                    <p>Nom</p>
                </div>
                <div class="col-6">
                    <p>{{ $finds->Contrat->Agent->nom }} {{ $finds->Contrat->Agent->prenom }}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <p>Fonction</p>
                </div>
                <div class="col-6">
                    <p>{{ $finds->Contrat->Agent->fonction }}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <p>Matricule</p>
                </div>
                <div class="col-6">
                    <p>{{ $finds->Contrat->Agent->matricule }}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <p>Situation matrimoniale</p>
                </div>
                <div class="col-6">
                    <p>{{ $finds->Contrat->Agent->matrimoniale }}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <p>Nbr d'enfant</p>
                </div>
                <div class="col-6">
                    <p>{{ $finds->Contrat->Agent->nbre_enfant }}</p>
                </div>
            </div>
        </div>        
        <div class="p-2" style="border-bottom: 1px solid rgb(12, 12, 12); width: 100%">
            <div class="row mb-2">
                <div class="col-2">
                    <p>100</p>
                </div>
                <div class="col-4">
                    <p>Salaire de base</p>
                </div>
                <div class="col-3">
                    <p>({{ $finds->Contrat->base }} x {{ $finds->Contrat->taux }})</p>
                </div>
                <div class="col-3">
                    <p>{{ $finds->Contrat->sal_base }}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-2">
                    <p>140</p>
                </div>
                <div class="col-4">
                    <p>Prime ancienneté</p>
                </div>
                <div class="col-3">
                    <p>-</p>
                </div>
                <div class="col-3">
                    <p>{{ $finds->Contrat->prime_anciennete }}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-2">
                    <p>110</p>
                </div>
                <div class="col-4">
                    <p>Indemnités de logement</p>
                </div>
                <div class="col-3">
                    <p>-</p>
                </div>
                <div class="col-3">
                    <p>{{ $finds->Contrat->prime_logement }}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-2">
                    <p>120</p>
                </div>
                <div class="col-4">
                    <p>Indemnités de transport</p>
                </div>
                <div class="col-3">
                    <p>-</p>
                </div>
                <div class="col-3">
                    <p>{{ $finds->Contrat->prime_transport }}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-2">
                    <p>130</p>
                </div>
                <div class="col-4">
                    <p>Indemnités de fonction</p>
                </div>
                <div class="col-3">
                    <p>-</p>
                </div>
                <div class="col-3">
                    <p>{{ $finds->Contrat->prime_fonction }}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-2">
                    <p>315</p>
                </div>
                <div class="col-4">
                    <p>Charges suplementaire</p>
                </div>
                <div class="col-3">
                    <p>-</p>
                </div>
                <div class="col-3">
                    <p>{{ $finds->occasionnelle }}</p>
                </div>
            </div>
        </div>
        <div class="p-2 mb-2" style="border-bottom: 1px solid rgb(12, 12, 12); width: 100%; background: rgb(216, 213, 213)">
            <div class="row">
                <div class="col-6">
                    <strong>AVOIRS</strong>
                </div>
                <div class="col-3">
                    <p></p>
                </div>
                <div class="col-3">
                    <strong>{{ $finds->avoir }}</strong>
                </div>
            </div>
        </div>
        <div class="p-2" style="border-bottom: 1px solid rgb(12, 12, 12); width: 100%">
            <div class="row">
                <div class="col-2">
                    <p>200</p>
                </div>
                <div class="col-4">
                    <p>Retenue IUTS</p>
                </div>
                <div class="col-3">
                    <p>-</p>
                </div>
                <div class="col-3">
                    <p>{{ $finds->Contrat->iuts }}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-2">
                    <p>190</p>
                </div>
                <div class="col-4">
                    <p>Retenue CNSS</p>
                </div>
                <div class="col-3">
                    <p>-</p>
                </div>
                <div class="col-3">
                    <p>{{ $finds->Contrat->cnss }}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-2">
                    <p>220</p>
                </div>
                <div class="col-4">
                    <p>Retenues avances du mois</p>
                </div>
                <div class="col-3">
                    <p>-</p>
                </div>
                <div class="col-3">
                    <p>{{ $finds->precompte }}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-2">
                    <p>330</p>
                </div>
                <div class="col-4">
                    <p>Autres etenues</p>
                </div>
                <div class="col-3">
                    <p>-</p>
                </div>
                <div class="col-3">
                    <p>{{ $finds->autres_retenu }}</p>
                </div>
            </div>
        </div>
        <div class="p-2" style="width: 100%; background: rgb(216, 213, 213)">
            <div class="row">
                <div class="col-6">
                    <strong>RETENUES</strong>
                </div>
                <div class="col-3">
                    <p></p>
                </div>
                <div class="col-3">
                    <strong>{{ $finds->retenu }}</strong>
                </div>
            </div>
        </div>
    </div>
    <div class="p-2 mt-3" style="border: 1px solid rgb(12, 12, 12); width: 100%; background: rgb(111, 109, 109)">
        <div class="row text-light">
            <div class="col-6">
                <strong>NET A PAYER</strong>
            </div>
            <div class="col-3">
                <p></p>
            </div>
            <div class="col-3">
                <strong>{{ $finds->salaire_total }}</strong>
            </div>
        </div>
    </div>
    <div class="p-2 mt-3" style="border: 1px solid rgb(12, 12, 12);">
        <div class="d-flex justify-content-between">
            <h4>MODE DE REGLEMENT</h4>
            <h4>{{ $finds->mode_paie }}</h4>
        </div>
        <div class="d-flex justify-content-between">
            <h4>INSTITUTION FINANCIERE</h4>
            <h4>{{ $finds->Banque->libelle }}</h4>
        </div>
        <div class="d-flex justify-content-between">
            <h4>NUMERO DE COMPTE</h4>
            <h4>{{ $finds->Banque->num_compte }}</h4>
        </div>
    </div>
    <div class="d-flex justify-content-between p-3">
        <h4><strong>SIGNATURE DE l’EMPLOYEUR</strong></h4>
        <h4><strong>SIGNATURE EMPLOYE</strong></h4>
    </div>

    <script>
        window.print();
    </script>
</body>

</html>
