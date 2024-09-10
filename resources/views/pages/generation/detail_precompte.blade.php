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
                            Detail du pré-compte N°: {{ $finds->code }}
                        </h1>
                        <div class="page-header-subtitle mt-4">
                            <br>
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
    <div class="container-xl px-4 mt-n10">
        <div class="row">
            <div class="col-xl-4">
                <div class="row">
                    <div class="col-xl-12 col-md-12">
                        <!-- Profile picture card-->
                        <div class="card mb-4 mb-xl-0">
                            <div class="card-header">Agent</div>
                            <div class="card-body">
                                <!-- Profile picture image-->
                                <div class="d-flex justify-content-center">
                                    @if ($finds->Contrat->Agent->photo == '')
                                        <img class="img-account-profile mb-2" style="border-radius: 5px"
                                            src="{{ asset('asset/assets/img/demo/user-placeholder.svg') }}"
                                            alt="logo user" />
                                    @else
                                        <img class="img-account-profile mb-2" style="border-radius: 5px"
                                            src="{{ asset('storage') . '/' . $finds->Contrat->Agent->photo }}"
                                            alt="logo user" />
                                    @endif
                                </div>
                                <!-- Profile picture help block-->
                                <div class="small font-italic text-muted mb-4 text-center">
                                    <h5>{{ $finds->Contrat->Agent->nom }} {{ $finds->Contrat->Agent->prenom }}</h5>
                                    <h5>Matricule : {{ $finds->Contrat->Agent->matricule }}</h5>
                                </div>
                                <!-- Profile picture upload button-->
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-12 col-md-12 mt-3">
                        <div class="card mb-4">
                            <div class="card-header">Plus d'actions</div>
                            <div class="list-group list-group-flush small">
                                <a class="list-group-item list-group-item-action" href="">
                                    <i class="fas fa-edit fa-fw text-warning me-2"></i>
                                    Modifier le pré-compte
                                </a>
                                <a class="list-group-item list-group-item-action" href="">
                                    <i class="fas fa-close fa-fw text-danger me-2"></i>
                                    Supprimer le pré-compte
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-8">
                <!-- Account details card-->
                <div class="card mb-4">
                    <div class="card-header">Detail du pré-compte</div>
                    <div class="card-body">
                        <table class="table table-striped table-bordered" style="width: 100%;">
                            <tr>
                                <th>Code</th>
                                <td>{{ $finds->code }}</td>
                            </tr>
                            <tr>
                                <th>Libellé</th>
                                <td>{{ $finds->libelle }}</td>
                            </tr>
                            <tr>
                                <th>Statut</th>
                                <td>{{ $finds->statut }}</td>
                            </tr>
                            <tr>
                                <th>Capital initial</th>
                                <td>{{ $finds->capital_initial }}</td>
                            </tr>
                            <tr>
                                <th>Nbr d'echeance</th>
                                <td>{{ $finds->nbr_echeance }}</td>
                            </tr>
                            <tr>
                                <th>Montant à rembourse</th>
                                <td>{{ $finds->montant_rembourse }}</td>
                            </tr>
                            <tr>
                                <th>Marge à rembourser</th>
                                <td>{{ $finds->marge }}</td>
                            </tr>
                            <tr>
                                <th>Montant retenu / mois</th>
                                <td>{{ $finds->retenu_mois }}</td>
                            </tr>
                            <tr>
                                <th>Date debut</th>
                                <td>{{ $finds->date_debut }}</td>
                            </tr>
                            <tr>
                                <th>Date fin</th>
                                <td>{{ $finds->date_fin }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
