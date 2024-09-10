<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Impression contrat</title>
    @include('layouts.style')
</head>

<body>
    <div class="container-fluid">
        <div class="d-flex justify-content-center m-5">
            <div style="border: 2px solid black; width: 50%">
                <h1 class="text-center m-3"> CONTRAT DE TRAVAIL</h1>
            </div>
        </div>
        <div class="mb-4">
            <p>Entre les sousignés</p>
        </div>
        <p>
            <strong>La Société FASO FORAGE,</strong>Société à responsabilité limité dont le siège social est à 
            Ouagadougou, 10 BP 13943, Téléphone : 25371128, laquelle est representée par son Directeur Général 
            Monsieur <strong>SAWADOGO MOUSSA</strong> et désignée dans le présent contrat <strong>"L'EMPLOYEUR"</strong>
        </p>
        <div class="mt-4 mb-4">
            <h2> D'UNE PART</h2>
        </div>
        <p class="mb-4">ET</p>
        <table class="" style="width: 100%;">
            <tr>
                <th>Mr / Mme :</th>
                <td>{{ $finds->Agent->nom }} {{ $finds->Agent->prenom }}</td>
            </tr>
            <tr>
                <td>Matricule :</td>
                <td>{{ $finds->Agent->matricule }}</td>
            </tr>
            <tr>
                <td>N° Securité social :</td>
                <td>{{ $finds->Agent->num_secu_social }}</td>
            </tr>
            <tr>
                <td>Né le :</td>
                <td>{{ $finds->Agent->date_nais }} à {{ $finds->Agent->lieunais }}</td>
            </tr>
            <tr>
                <td>Fils / Fille de :</td>
                <td>{{ $finds->Agent->pere }} et de {{ $finds->Agent->mere }}</td>
            </tr>
            <tr>
                <td>Lieu de residence :</td>
                <td>{{ $finds->Agent->residence }}</td>
            </tr>
            <tr>
                <td>Téléphone :</td>
                <td>{{ $finds->Agent->telephone }}</td>
            </tr>
            <tr>
                <td>Email :</td>
                <td>{{ $finds->Agent->email }}</td>
            </tr>
            <tr>
                <td>Profession :</td>
                <td>{{ $finds->Agent->fonction }}</td>
            </tr>
        </table>
        <p class="mt-4 mb-4">
            Ci-après désigné
            @if ($finds->nature == 'CDD')
                <strong>"EMPLOYE"</strong>
            @endif

            @if ($finds->nature == 'CDI')
                <strong>"EMPLOYE"</strong>
            @endif

            @if ($finds->nature == 'STAGE')
                <strong>"STAGIAIRE"</strong>
            @endif

            @if ($finds->nature == 'CONSULTATION')
                <strong>"CONSULTANT"</strong>
            @endif
        </p>
        <h2>D'AUTRE PART</h2>
        <h2 class="text-decoration-underline text-center m-5">IL AETE CONVENU ET ARRETE CE QUI SUIT :</h2>
        <div class="p-1" style="width: 30%; background: rgb(190, 188, 188)">
            <h5>Article 1 - Engagement</h5>
        </div>
        <p>
            M./Mme <strong>{{ $finds->Agent->nom }} {{ $finds->Agent->prenom }} </strong> est engagé en qualité de 
            <strong>{{ $finds->Agent->fonction }}</strong> pour servir à <strong>FASO FORAGE</strong> à  compter du {{ $finds->date_signature }} L’intéressé a 
            pris acte du manuel des procédures, des définitions de tâches, de la charte éthique, et accepté de pallier 
            à toutes  urgences, vu la particularité de son domaine de travail. Il respectera le secret du travail, de 
            délibération en toute circonstance, en tout lieu, et en tout temps. La durée du présent contrat est en
            {{ $finds->nature }}
        </p>
        <div class=" mt-3 p-1" style="width: 33%; background: rgb(190, 188, 188)">
            <h5>Article 2 - Renumeration</h5>
        </div>
        <p>
            M./Mme <strong>{{ $finds->Agent->nom }} {{ $finds->Agent->prenom }}</strong> est classé à la catégorie professionnelle suivante <strong>{{ $finds->categorie }}</strong> IL/ELLE PERCEVRA LA 
            REMUNERATION SUIVANTE (Y compris diverses indemnités et majoration de 1973 à 2008) TOTAL BRUT : <strong>175.000 FCFA</strong>    
        </p>
        <div class=" mt-3 p-1" style="width: 40%; background: rgb(190, 188, 188)">
            <h5>Article 3 - Dispositions diverses </h5>
        </div>
        <p>
            Le présent contrat est indexé aux conventions successives entre l’Association et le CNLS dans  le cadre de 
            la mise en œuvre des activités subventionnées par le Fonds mondial de la lutte conte le VIH. Ainsi il est 
            lié à la gestion de tous les cas de forces  majeures, subis par les partenaires maliens indépendamment de 
            leur volonté. Cependant l’Association reste libre par rapport à sa politique de gestion des ressources 
            humaines tenant en compte, la qualification, l’ancienneté, et la promotion du résultat dû la compétence et 
            au dévouement. Ces dispositions ne pourront servir de moyen d’abus, de quelque nature ni par l’employeur 
            ni par l’employé et restent dans l’esprit du code du travail. Le présent contrat écrit est exempt de tous 
            droits de timbre et d’enregistrement. IL sera toutefois établi en quatre exemplaires et soumis après 
            visite médicale du travailleur au visa de l’Inspecteur du Travail 
        </p>
        <p class="mt-3">Conformément à l’article 24 du Code du travail.</p>
        <p class="mt-5 mb-5">
            <strong>EN FOI DE QUOI,</strong> les parties attestent qu’elles ont lu et accepté les conditions et modalités énoncées dans le présent contrat.
        </p>
        <div class="d-flex justify-content-between mt-5 mb-5">
            <p>Fait à Ouagadougou,</p>
            <p>Le {{ Carbon\Carbon::now()->format('d-m-Y') }}</p>
        </div>
        <div class="d-flex justify-content-between" style="margin-top: 100px">
            <h4>L’EMPLOYEUR</h4>
            <h4>LE TRAVAILLEUR</h4>
        </div>
    </div>

    <script>
        window.print();
    </script>
</body>

</html>
