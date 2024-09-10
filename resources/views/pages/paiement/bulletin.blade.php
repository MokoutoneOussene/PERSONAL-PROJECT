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
                    <strong>FASO FORAGE</strong> <br>
                    12 BP OUA 12, OUAGADOUGOU <br>
                    N° Ident fiscale : SM0225601P<br>
                    N° Ident sociale : 8995200g36 <br>
                </p>
            </div>
        </div>
        <div class="col-6">
            <div class="d-flex justify-content-end">
                <h6>Fait à Ouagadougou le, {{ Carbon\Carbon::now()->format('d-m-Y') }}</h6>
            </div>
            <div class="d-flex justify-content-center m-5">
                <h1 class="text-center m-3" style="text-decoration: underline"><strong>BULLETIN DE PAIE</strong></h1>
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-between" style="width: 75%">
        <p>Période :</p>
        <p>DU {{ $finds->periode_paie }} <span>{{ $finds->annee_paie }}</span></p>
    </div>

    <div style="width: 100%; border: 2px solid rgb(12, 12, 12)">
        <div class="p-2 mb-3" style="border-bottom: 1px solid rgb(12, 12, 12)">
            <div class="row">
                <div class="col-6">
                    <p>Nom : </p>
                </div>
                <div class="col-6">
                    <p>{{ $finds->Contrat->Agent->nom }} {{ $finds->Contrat->Agent->prenom }}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <p>Fonction : </p>
                </div>
                <div class="col-6">
                    <p>{{ $finds->Contrat->Agent->fonction }}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <p>Matricule : </p>
                </div>
                <div class="col-6">
                    <p>{{ $finds->Contrat->Agent->matricule }}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <p>Situation matrimoniale : </p>
                </div>
                <div class="col-6">
                    <p>{{ $finds->Contrat->Agent->matrimoniale }}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <p>Nbr d'enfant : </p>
                </div>
                <div class="col-6">
                    <p>{{ $finds->Contrat->Agent->nbre_enfant }}</p>
                </div>
            </div>
        </div>
        <div class="p-2" style="border-bottom: 1px solid rgb(12, 12, 12); width: 75%">
            <div class="row mb-3">
                <div class="col-6">
                    <p>Salaire de base : </p>
                </div>
                <div class="col-3">
                    <p>A</p>
                </div>
                <div class="col-3">
                    <p>{{ $finds->Contrat->sal_base }}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <p>Prime ancienneté : </p>
                </div>
                <div class="col-3">
                    <p>-</p>
                </div>
                <div class="col-3">
                    <p>{{ $finds->Contrat->prime_anciennete }}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <p>Indemnités de logement : </p>
                </div>
                <div class="col-3">
                    <p>-</p>
                </div>
                <div class="col-3">
                    <p>{{ $finds->Contrat->prime_logement }}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <p>Indemnités de transport : </p>
                </div>
                <div class="col-3">
                    <p>-</p>
                </div>
                <div class="col-3">
                    <p>{{ $finds->Contrat->prime_transport }}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <p>Prime divers : </p>
                </div>
                <div class="col-3">
                    <p>-</p>
                </div>
                <div class="col-3">
                    <p>{{ $finds->Contrat->prime_divers }}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <strong>Total Indemnités : </strong>
                </div>
                <div class="col-3">
                    <p>B</p>
                </div>
                <div class="col-3">
                    <strong>{{ $finds->Contrat->total_indemnite }}</strong>
                </div>
            </div>
        </div>
        <div class="p-2 mb-3" style="border-bottom: 1px solid rgb(12, 12, 12); width: 75%">
            <div class="row">
                <div class="col-6">
                    <strong>Salaire brut : </strong>
                </div>
                <div class="col-3">
                    <p>C= A+B</p>
                </div>
                <div class="col-3">
                    <strong>{{ $finds->Contrat->salaire_brut }}</strong>
                </div>
            </div>
        </div>
        <div class="p-2 mt-3" style="border-bottom: 1px solid rgb(12, 12, 12); width: 75%">
            <div class="row">
                <div class="col-6">
                    <p>UITS : </p>
                </div>
                <div class="col-3">
                    <p>-</p>
                </div>
                <div class="col-3">
                    <p>{{ $finds->Contrat->uits }}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <p>Cotisation sociale : </p>
                </div>
                <div class="col-3">
                    <p>-</p>
                </div>
                <div class="col-3">
                    <p>{{ $finds->Contrat->cotisation_sociale }}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <p>Impot : </p>
                </div>
                <div class="col-3">
                    <p>-</p>
                </div>
                <div class="col-3">
                    <p>{{ $finds->Contrat->impot }}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <p>Mutuelle payée par l’employé : </p>
                </div>
                <div class="col-3">
                    <p>-</p>
                </div>
                <div class="col-3">
                    <p>{{ $finds->Contrat->mutuelle_payee }}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <strong>Total retenues sur salaire : </strong>
                </div>
                <div class="col-3">
                    <p>D</p>
                </div>
                <div class="col-3">
                    <strong>{{ $finds->Contrat->total_retenue }}</strong>
                </div>
            </div>
        </div>
        <div class="p-2 mb-3" style="width: 75%">
            <div class="row">
                <div class="col-6">
                    <strong>Salaire net à payer : </strong>
                </div>
                <div class="col-3">
                    <p>E= C-D</p>
                </div>
                <div class="col-3">
                    <strong>{{ $finds->Contrat->sal_net }}</strong>
                </div>
            </div>
        </div>
        <div class="p-2 mb-3" style="border: 1px solid rgb(12, 12, 12); width: 75%">
            <h5 class="mb-3"><strong>Charges suplementaire</strong></h5>
            <div class="row">
                <div class="col-6">
                    <p>Charges occasionnelle : </p>
                </div>
                <div class="col-3">
                    <p>-</p>
                </div>
                <div class="col-3">
                    <p>{{ $finds->occasionnelle }}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <p>Charges précompte : </p>
                </div>
                <div class="col-3">
                    <p>-</p>
                </div>
                <div class="col-3">
                    <p>{{ $finds->precompte }}</p>
                </div>
            </div>
        </div>
        <div class="p-2 mb-3" style="border: 1px solid rgb(12, 12, 12); width: 75%">
            <div class="row">
                <div class="col-6">
                    <strong>Cout salarial total : </strong>
                </div>
                <div class="col-3">
                    <p>G= C+F</p>
                </div>
                <div class="col-3">
                    <strong>{{ $finds->salaire_total }}</strong>
                </div>
            </div>
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
