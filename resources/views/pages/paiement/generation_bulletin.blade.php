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
    @foreach ($collection as $item)
        <div style="height: 100vh;">
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
                <h1 class="text-center"><strong>BULLETIN DE PAIE N° {{ $item->code }}</strong></h1>
                <h6>Fait à Ouagadougou le, {{ Carbon\Carbon::now()->format('d-m-Y') }}</h6>
            </div>
    
            <div class="d-flex justify-content-between" style="width: 75%">
                <p>Période :</p>
                <p>DU {{ $item->periode_paie }} <span>{{ $item->annee_paie }}</span></p>
            </div>
            <div style="width: 100%; border: 2px solid rgb(12, 12, 12)">
                <div class="p-2" style="border-bottom: 1px solid rgb(12, 12, 12)">
                    <div class="row">
                        <div class="col-6">
                            <p>Nom</p>
                        </div>
                        <div class="col-6">
                            <p>{{ $item->Contrat->Agent->nom }} {{ $item->Contrat->Agent->prenom }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <p>Fonction</p>
                        </div>
                        <div class="col-6">
                            <p>{{ $item->Contrat->Agent->fonction }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <p>Matricule</p>
                        </div>
                        <div class="col-6">
                            <p>{{ $item->Contrat->Agent->matricule }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <p>Situation matrimoniale</p>
                        </div>
                        <div class="col-6">
                            <p>{{ $item->Contrat->Agent->matrimoniale }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <p>Nbr d'enfant</p>
                        </div>
                        <div class="col-6">
                            <p>{{ $item->Contrat->Agent->nbre_enfant }}</p>
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
                            <p>({{ $item->Contrat->base }} x {{ $item->Contrat->taux }})</p>
                        </div>
                        <div class="col-3">
                            <p>{{ $item->Contrat->sal_base }}</p>
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
                            <p>{{ $item->Contrat->prime_anciennete }}</p>
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
                            <p>{{ $item->Contrat->prime_logement }}</p>
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
                            <p>{{ $item->Contrat->prime_transport }}</p>
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
                            <p>{{ $item->Contrat->prime_fonction }}</p>
                        </div>
                    </div>
                    @foreach ($item->Contrat->Occasionnelle as $ocaz)
                        <div class="row">
                            <div class="col-2">
                                <p>{{ $ocaz->code }}</p>
                            </div>
                            <div class="col-4">
                                <p>{{ $ocaz->libelle }}</p>
                            </div>
                            <div class="col-3">
                                <p>-</p>
                            </div>
                            <div class="col-3">
                                <p>{{ $ocaz->montant }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="p-2 mb-2"
                    style="border-bottom: 1px solid rgb(12, 12, 12); width: 100%; background: rgb(216, 213, 213)">
                    <div class="row">
                        <div class="col-6">
                            <strong>AVOIRS</strong>
                        </div>
                        <div class="col-3">
                            <p></p>
                        </div>
                        <div class="col-3">
                            <strong>{{ $item->avoir }}</strong>
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
                            <p>{{ $item->Contrat->iuts }}</p>
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
                            <p>{{ $item->Contrat->cnss }}</p>
                        </div>
                    </div>
                    @foreach ($item->Contrat->Precompte as $preco)
                        <div class="row">
                            <div class="col-2">
                                <p>{{ $preco->code }}</p>
                            </div>
                            <div class="col-4">
                                <p>{{ $preco->libelle }}</p>
                            </div>
                            <div class="col-3">
                                <p>-</p>
                            </div>
                            <div class="col-3">
                                <p>{{ $preco->retenu_mois }}</p>
                            </div>
                        </div>
                    @endforeach
                    @foreach ($item->Contrat->AutresRetenu as $autre)
                        <div class="row">
                            <div class="col-2">
                                <p>{{ $autre->code }}</p>
                            </div>
                            <div class="col-4">
                                <p>{{ $autre->libelle }}</p>
                            </div>
                            <div class="col-3">
                                <p>-</p>
                            </div>
                            <div class="col-3">
                                <p>{{ $autre->montant }}</p>
                            </div>
                        </div>
                    @endforeach
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
                            <strong>{{ $item->retenu }}</strong>
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
                        <strong>{{ $item->salaire_total }}</strong>
                    </div>
                </div>
            </div>
            <div class="p-2 mt-3" style="border: 1px solid rgb(12, 12, 12);">
                <div class="d-flex justify-content-between">
                    <h4>MODE DE REGLEMENT</h4>
                    <h4>{{ $item->mode_paie }}</h4>
                </div>
                <div class="d-flex justify-content-between">
                    <h4>INSTITUTION FINANCIERE</h4>
                    <h4>{{ $item->Banque->libelle }}</h4>
                </div>
                <div class="d-flex justify-content-between">
                    <h4>NUMERO DE COMPTE</h4>
                    <h4>{{ $item->Banque->num_compte }}</h4>
                </div>
            </div>
            <div class="d-flex justify-content-between p-3">
                <h4><strong>SIGNATURE DE l’EMPLOYEUR</strong></h4>
                <h4><strong>SIGNATURE EMPLOYE</strong></h4>
            </div>
        </div>
    @endforeach

    <script>
        window.print();
    </script>
</body>

</html>
