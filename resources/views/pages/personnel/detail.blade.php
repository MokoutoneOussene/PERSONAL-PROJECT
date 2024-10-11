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
                            Fiche de l'agent N°: {{ $finds->id }}
                        </h1>
                        <div class="page-header-subtitle mt-4">
                            Fiche Métier Agent Matricule: {{ $finds->matricule }}
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
                    <div class="col-xl-12">
                        <!-- Profile picture card-->
                        <div class="card mb-4 mb-xl-0">
                            <div class="card-header">Photo d'agent</div>
                            <div class="card-body">
                                <!-- Profile picture image-->
                                <div class="d-flex justify-content-center">
                                    @if ($finds->photo == '')
                                        <img class="img-account-profile rounded-circle mb-2"
                                            src="{{ asset('asset/assets/img/demo/user-placeholder.svg') }}"
                                            alt="logo user" />
                                    @else
                                        <img class="img-account-profile mb-2" style="border-radius: 5px"
                                            src="{{ asset('storage') . '/' . $finds->photo }}" alt="logo user" />
                                    @endif
                                </div>
                                <!-- Profile picture help block-->
                                <div class="small font-italic text-muted mb-4 text-center">Matricule : {{ $finds->matricule }}</div>
                                <!-- Profile picture upload button-->
                                <div class="d-flex justify-content-center">
                                    <button class="btn btn-primary" type="button" data-bs-toggle="modal"
                                        data-bs-target="#formBackdrop">Changer la photo</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-12 mt-3">
                        <div class="card mb-4">
                            <div class="card-header">Plus d'actions</div>
                            <div class="list-group list-group-flush small">
                                <a class="list-group-item list-group-item-action" href="">
                                    <i class="fas fa-edit fa-fw text-warning me-2"></i>
                                    Modifier l'agent
                                </a>
                                <a class="list-group-item list-group-item-action" href="">
                                    <i class="fas fa-user fa-fw text-primary me-2"></i>
                                    Fiche agent
                                </a>
                                <a class="list-group-item list-group-item-action" href="">
                                    <i class="fas fa-print fa-fw text-success me-2"></i>
                                    Imprimer le contrat de travail
                                </a>
                                <a class="list-group-item list-group-item-action" href="">
                                    <i class="fas fa-print fa-fw text-success me-2"></i>
                                    Imprimer attestation de travail
                                </a>
                                <a class="list-group-item list-group-item-action" href="">
                                    <i class="fas fa-close fa-fw text-danger me-2"></i>
                                    Supprimer l'agent
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-8">
                <!-- Account details card-->
                <div class="card mb-4">
                    <div class="card-header">Detail de l'agent</div>
                    <div class="card-body">
                        <table style="width: 100%;">
                            <tr class="border_dotted">
                                <th>N° securité sociale</th>
                                <td>{{ $finds->num_secu_social }}</td>
                            </tr>
                            <tr class="border_dotted">
                                <th>Nom</th>
                                <td>{{ $finds->nom }} {{ $finds->prenom }}</td>
                            </tr>
                            <tr class="border_dotted">
                                <th>N° CNIB</th>
                                <td>{{ $finds->num_cnib }} du {{ $finds->date_cnib }} à {{ $finds->lieu_cnib }}</td>
                            </tr>
                            <tr class="border_dotted">
                                <th>Date et lieu de naissance</th>
                                <td>{{ $finds->date_nais }} à {{ $finds->lieunais }}</td>
                            </tr>
                            <tr class="border_dotted">
                                <th>Province</th>
                                <td>{{ $finds->province }}</td>
                            </tr>
                            <tr class="border_dotted">
                                <th>Telephone</th>
                                <td>{{ $finds->telephone }}</td>
                            </tr>
                            <tr class="border_dotted">
                                <th>Email</th>
                                <td>{{ $finds->email }}</td>
                            </tr>
                            <tr class="border_dotted">
                                <th>Categorie</th>
                                <td>{{ $finds->categorie }}</td>
                            </tr>
                            <tr class="border_dotted">
                                <th>Sexe</th>
                                <td>{{ $finds->genre }}</td>
                            </tr>
                            <tr class="border_dotted">
                                <th>Residence</th>
                                <td>{{ $finds->residence }}</td>
                            </tr>
                            <tr class="border_dotted">
                                <th>Date d'embauche</th>
                                <td>{{ $finds->date_embauche }}</td>
                            </tr>
                            <tr class="border_dotted">
                                <th>Groupe sanguin</th>
                                <td>{{ $finds->grou_sang }}</td>
                            </tr>
                            <tr class="border_dotted">
                                <th>Pere & mère</th>
                                <td>{{ $finds->pere }} et de {{ $finds->mere }}</td>
                            </tr>
                            <tr class="border_dotted">
                                <th>Personne à prévenir</th>
                                <td>{{ $finds->perso_prevenir }} / {{ $finds->tele_perso_prevenir }}</td>
                            </tr>
                            <tr class="border_dotted">
                                <th>Situation matrimoniale</th>
                                <td>{{ $finds->matrimoniale }}</td>
                            </tr>
                            <tr class="border_dotted">
                                <th>Fonction</th>
                                <td>{{ $finds->fonction }}</td>
                            </tr>
                            <tr class="border_dotted">
                                <th>Nombre d'enfant</th>
                                <td>{{ $enfant->count() }}</td>
                            </tr>
                            <tr class="border_dotted">
                                <th>Charge IUTS</th>
                                <td>{{ $finds->charge_uts }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <!-- Modal password -->
    <div class="modal fade" id="formBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="formImageBackdrop" aria-hidden="true">
        <div class="modal-dialog modal-default">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Ajouter une photo de profile
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <form method="POST" action="" enctype="multipart/form-data">
                            @csrf
                            <div class="p-2 m-1">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12">
                                        <div class="mb-3">
                                            <label>Choisissez la photo<span class="text-danger">*</span></label>
                                            <input class="form-control" name="photo" type="file" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-3">
                                <button type="submit" class="btn btn-success">Ajouter</button>
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fermer</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
