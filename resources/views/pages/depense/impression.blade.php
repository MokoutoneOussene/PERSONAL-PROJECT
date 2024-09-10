<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @include('layouts.style')
</head>
<body>
    <h1 class="text-center mb-3"> CONTRAT DE TRAVAIL</h1>
    <p>M./Mme: <span>{{ $finds->Agent->nom }}  {{ $finds->Agent->prenom }}</span></p>
    <p>Entre les sousignés: <span>{{ $finds->Agent->nom }}  {{ $finds->Agent->prenom }}</span>  <span>pour {{ $finds->Agent->nom }}  {{ $finds->Agent->prenom }}</span></p>
    <h2 class="text-decoration-underline mb-4"> D'UNE PART</h2>


    <P>ET M./Mme: <span>{{ $finds->Agent->nom }}  {{ $finds->Agent->prenom }}</span></P>
    <P>Né(é) le: <span>{{ $finds->Agent->date_nais }}</span></P>
    <P>Fils (Fille) de: <span>{{ $finds->Agent->pere }}  <span> Et de:</span>{{ $finds->Agent->mere }}</span></P>
    <P>Exercant la profession de: <span>{{ $finds->Agent->fonction }}</span></P>
    <P>Carte d'identité/Passport N°: <span>{{ $finds->Agent->num_cnib }}</span> <span>En date:</span> <span>{{ $finds->Agent->date_cnib }}</span></P>
    <h2 class="text-decoration-underline mb-4">D'AUTRE PART</h2>
 
 <script>
        window.print();
    </script>
</body>
</html>