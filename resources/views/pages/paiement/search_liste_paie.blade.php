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
                            LISTE DES PAIEMENTS DES AGENTS
                        </h1>
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
                        <div
                            style="background: linear-gradient(90deg, rgb(160, 240, 195) 0%, rgb(237, 237, 163) 100%); border-radius: 5px;">
                            <br>
                            <h4 class="text-center text-danger">Générer les bulletins par période et par année</h4>
                            <form action="{{ route('generation_bulletin') }}" method="GET" target="_blank">
                                <div class="d-flex justify-content-end mb-3">
                                    <div class="col-3 m-2">
                                        <label>Periode paie</label>
                                        <select name="periode_paie" class="form-control">
                                            <option value="01">1er au 31 Janvier</option>
                                            <option value="02">1er au 29 Févier</option>
                                            <option value="03">1er au 30 Mars</option>
                                            <option value="04">1er au 31 Avril</option>
                                            <option value="05">1er au 30 Mai</option>
                                            <option value="06">1er au 31 Juin</option>
                                            <option value="07">1er au 30 Juillet</option>
                                            <option value="08">1er au 31 Aout</option>
                                            <option value="09">1er au 30 Septembre</option>
                                            <option value="10">1er au 31 Octobre</option>
                                            <option value="11">1er au 30 Novembre</option>
                                            <option value="12">1er au 31 Decembre</option>
                                        </select>
                                    </div>
                                    <div class="col-3 m-2">
                                        <label>Année paie</label>
                                        <select name="annee_paie" class="form-control">
                                            <option value="2024">2024</option>
                                            <option value="2025">2025</option>
                                            <option value="2026">2026</option>
                                        </select>
                                    </div>
                                    <div class="col-2 m-2 pt-4">
                                        <button type="submit" class="btn btn-success">Générer les bulletins</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>Matricule</th>
                                    <th>Nom</th>
                                    <th>Sal base</th>
                                    <th>Sal brut</th>
                                    <th>Net a payer</th>
                                    <th>Total a payer</th>
                                    <th>Période paie</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($collection as $item)
                                    <tr>
                                        <td>{{ $item->Contrat->Agent->matricule }}</td>
                                        <td>{{ $item->Contrat->Agent->nom }} {{ $item->Contrat->Agent->prenom }}</td>
                                        <td>{{ $item->Contrat->sal_base }}</td>
                                        <td>{{ $item->Contrat->salaire_brut }}</td>
                                        <td>{{ $item->Contrat->sal_net }}</td>
                                        <td>{{ $item->salaire_total }}</td>
                                        <td>{{ $item->periode_paie }} / {{ $item->annee_paie }}</td>
                                        <td>
                                            <a href=""
                                                data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight{{ $item->id }}"
                                                aria-controls="offcanvasRight">
                                                <i class="me-2 text-green text-center" data-feather="eye"></i>
                                            </a>
                                        </td>
                                        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight{{ $item->id }}"
                                            aria-labelledby="offcanvasRightLabel">
                                            <div class="offcanvas-header">
                                                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                                            </div>
                                            <div class="offcanvas-body">
                                                <div class="col-xl-12">
                                                    <div class="card mb-4">
                                                        <div class="card-header">Plus sur le paiement N°: {{ $item->code }}</div>
                                                        <div class="list-group list-group-flush small">
                                                            <a class="list-group-item list-group-item-action" href="{{ route('gestion_paiement.show', [$item->id]) }}">
                                                                <i class="fas fa-eye fa-fw text-success me-2"></i>
                                                                Detail du paiement
                                                            </a>
                                                            <a class="list-group-item list-group-item-action" href="">
                                                                <i class="fas fa-edit fa-fw text-warning me-2"></i>
                                                                Modifier le paiement
                                                            </a>
                                                            <a class="list-group-item list-group-item-action" href="{{ url('imprimer_bulletin/' . $item->id) }}" target="_blank">
                                                                <i class="fas fa-print fa-fw text-success me-2"></i>
                                                                Imprimer le bulletin
                                                            </a>
                                                            <a class="list-group-item list-group-item-action" href="{{ url('delete_paiement/' . $item->id) }}">
                                                                <i class="fas fa-close fa-fw text-danger me-2"></i>
                                                                Supprimer le paiement
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="row mt-3">
                            <div class="col-lg-9 col-md-6 p-3 bg-dark">
                                <h4 class="text-light"><strong>TOTAL</strong></h4>
                            </div>
                            <div class="col-lg-3 col-md-6 p-3 bg-danger">
                                <h4 class="text-light"><strong>{{ $total }} FCFA</strong></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
