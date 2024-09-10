@extends('layouts.master')

@section('content')
    <header class="page-header page-header-dark pb-10"
        style="background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(9,9,121,1) 50%, rgba(0,212,255,1) 100%);">
        <div class="container-xl px-4">
            <div class="page-header-content pt-4">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto mt-4">
                        <h1 class="page-header-title">
                            <div class="page-header-icon"><i data-feather="activity"></i></div>
                            LISTE DES AGENTS A PAYER
                        </h1>
                        <div class="page-header-subtitle mt-3">
                            <a class="btn btn-success" href="#" class="btn btn-success" data-bs-toggle="modal"
                                data-bs-target="#formContratBackdrop">
                                Effectuer les paiements des agents
                            </a>
                        </div>
                    </div>
                    <div class="col-12 col-xl-auto mt-4">
                        <div class="input-group input-group-joined border-0" style="width: 16.5rem">
                            <span class="input-group-text"><i class="text-primary" data-feather="calendar"></i></span>
                            <div class="form-control ps-0 pointer">
                                {{ Carbon\Carbon::now()->format('d-m-Y') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Main page content-->

    <div class="container-xl px-4 mt-n10">
        <div class="row">
            <div class="col-lg-12">
                <!-- Tabbed dashboard card example-->
                <div class="card mb-4">
                    <div class="card-body">
                        <table id="datatablesSimple">
                            <button class="btn btn-success mt-3 mb-3">
                                Générer les paiements
                            </button>    
                            <thead>
                                <tr>
                                    <th>Matricule</th>
                                    <th>Nom</th>
                                    <th>Prénom</th>
                                    <th>Sal base</th>
                                    <th>Sal brut</th>
                                    <th>Net a payer</th>
                                    <th>Génération</th>
                                    <th>Selectionner</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($collection as $item)
                                    <tr>
                                        <td>{{ $item->Agent->matricule }}</td>
                                        <td>{{ $item->Agent->nom }}</td>
                                        <td>{{ $item->Agent->prenom }}</td>
                                        <td>{{ $item->sal_base }}</td>
                                        <td>{{ $item->salaire_brut }}</td>
                                        <td>{{ $item->sal_net }}</td>
                                        <td>
                                            <a href="{{ url('generation_paiement/' . $item->id) }}">
                                                <i class="me-2 text-green text-center" data-feather="eye"></i>
                                            </a>
                                        </td>
                                        <td class="text-center">
                                            <input class="form-check-input" type="checkbox" value="">
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
