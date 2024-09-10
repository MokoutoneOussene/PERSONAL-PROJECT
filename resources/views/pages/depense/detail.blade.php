@extends('layouts.master')

@section('content')
    <header class="page-header page-header-dark pb-10" style="background: rgb(129, 56, 56)">
        <div class="container-xl px-4">
            <div class="page-header-content pt-4">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto mt-4">
                        <h1 class="page-header-title">
                            <div class="page-header-icon"><i data-feather="activity"></i></div>
                            Fiche du paiement N°: {{ $finds->id }}
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
                                    Modifier le paiement
                                </a>
                                <a class="list-group-item list-group-item-action" href="">
                                    <i class="fas fa-print fa-fw text-success me-2"></i>
                                    Imprimer le bulletin de paie
                                </a>
                                <a class="list-group-item list-group-item-action" href="">
                                    <i class="fas fa-close fa-fw text-danger me-2"></i>
                                    Supprimer le paiement
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-8">
                <!-- Account details card-->
                <div class="card mb-4">
                    <div class="card-header">Detail du paiement</div>
                    <div class="card-body">
                        <table class="table table-striped table-bordered" style="width: 100%;">
                            <tr>
                                <th>Code</th>
                                <td>{{ $finds->code }}</td>
                            </tr>
                            <tr>
                                <th>Mode paiement</th>
                                <td>{{ $finds->mode_paie }}</td>
                            </tr>
                            <tr>
                                <th>Date paie</th>
                                <td>{{ $finds->date }}</td>
                            </tr>
                            <tr>
                                <th>Salaire de base</th>
                                <td>{{ $finds->sal_base }} fcfa</td>
                            </tr>
                            <tr>
                                <th>Prime ancienneté</th>
                                <td>{{ $finds->prime_anciennete }} fcfa</td>
                            </tr>
                            <tr>
                                <th>Prime logement</th>
                                <td>{{ $finds->prime_logement }} fcfa</td>
                            </tr>
                            <tr>
                                <th>Prime transport</th>
                                <td>{{ $finds->prime_transport }} fcfa</td>
                            </tr>
                            <tr>
                                <th>Prime divers</th>
                                <td>{{ $finds->prime_divers }} fcfa</td>
                            </tr>
                            <tr>
                                <th>UITS</th>
                                <td>{{ $finds->uits }} fcfa</td>
                            </tr>
                            <tr>
                                <th>Salaire net</th>
                                <td>{{ $finds->sal_net }} fcfa</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
