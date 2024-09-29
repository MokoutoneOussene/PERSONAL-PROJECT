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
                            Génération de paiement pour les agents
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
                                    @if ($finds->Agent->photo == '')
                                        <img class="img-account-profile mb-2" style="border-radius: 5px"
                                            src="{{ asset('asset/assets/img/demo/user-placeholder.svg') }}"
                                            alt="logo user" />
                                    @else
                                        <img class="img-account-profile mb-2" style="border-radius: 5px"
                                            src="{{ asset('storage') . '/' . $finds->Agent->photo }}" alt="logo user" />
                                    @endif
                                </div>
                                <!-- Profile picture help block-->
                                <div class="small font-italic text-muted mb-4 text-center">
                                    <h5>{{ $finds->Agent->nom }} {{ $finds->Agent->prenom }}</h5>
                                    <h5>Matricule : {{ $finds->Agent->matricule }}</h5>
                                </div>
                                <!-- Profile picture upload button-->
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-12 col-md-12 mt-3">
                        <div class="card mb-4 mb-xl-0">
                            <div class="card-header">Information salaire</div>
                            <div class="card-body">
                                <table style="width: 100%;">
                                    <tr class="border_dotted">
                                        <th>Salaire de base</th>
                                        <td class="text-secondary">{{ $finds->sal_base }}</td>
                                    </tr>
                                    <tr class="border_dotted">
                                        <th>Indemnités supplémentaires</th>
                                        <td class="text-secondary">{{ $finds->total_indemnite }}</td>
                                    </tr>
                                    <tr class="border_dotted">
                                        <th>Salaire brut</th>
                                        <td class="text-secondary">{{ $finds->salaire_brut }}</td>
                                    </tr>
                                    <tr class="border_dotted">
                                        <th>Retenues sur salaire</th>
                                        <td class="text-secondary">{{ $finds->total_retenue }}</td>
                                    </tr>
                                    <tr class="border_dotted">
                                        <th>Salaire net à payer</th>
                                        <td class="text-danger">{{ $finds->sal_net }}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-8">
                <div class="row">
                    <div class="col-xl-12 col-sm-6">
                        <div class="card card-primary card-outline card-outline-tabs">
                            <div class="card-header p-0 border-bottom-0">
                                <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="custom-tabs-four-profile-tab" data-toggle="pill"
                                            href="#custom-tabs-four-profile" role="tab"
                                            aria-controls="custom-tabs-four-profile" aria-selected="false">Charges occasionnelles
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="custom-tabs-four-messages-tab" data-toggle="pill"
                                            href="#custom-tabs-four-messages" role="tab"
                                            aria-controls="custom-tabs-four-messages" aria-selected="false">Charges pré-compte
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="custom-tabs-four-setting-tab" data-toggle="pill"
                                            href="#custom-tabs-four-setting" role="tab"
                                            aria-controls="custom-tabs-four-setting" aria-selected="false">Autre retenues
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-body">
                                <div class="tab-content" id="custom-tabs-four-tabContent">
                                    <div class="tab-pane fade show active" id="custom-tabs-four-profile" role="tabpanel"
                                        aria-labelledby="custom-tabs-four-profile-tab">
                                        <div class="page-header-subtitle mb-3">
                                            <a class="btn btn-success" href="#" class="btn btn-success"
                                                data-bs-toggle="modal" data-bs-target="#formContratBackdrop">
                                                Ajouter charge occasionelle
                                            </a>
                                        </div>
                                        <table id="datatablesSimple">
                                            <thead>
                                                <tr>
                                                    <th>Date</th>
                                                    <th>Code</th>
                                                    <th>Libbelé</th>
                                                    <th>Montant</th>
                                                    <th>Statut</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($occasionelle_collection as $item)
                                                    <tr>
                                                        <td>{{ $item->created_at->format('d-m-Y') }}</td>
                                                        <td>{{ $item->code }}</td>
                                                        <td>{{ $item->libelle }}</td>
                                                        <td>{{ $item->montant }}</td>
                                                        <td>{{ $item->statut }}</td>
                                                        <td>
                                                            <a
                                                                href="{{ route('gestion_occasionnelles.show', [$item->id]) }}">
                                                                <i class="me-2 text-green text-center" data-feather="eye"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="tab-pane fade" id="custom-tabs-four-messages" role="tabpanel"
                                        aria-labelledby="custom-tabs-four-messages-tab">
                                        <div class="page-header-subtitle mb-3">
                                            <a class="btn btn-success" href="#" class="btn btn-success"
                                                data-bs-toggle="modal" data-bs-target="#formContratBackdropPrecompte">
                                                Ajouter un pré-compte
                                            </a>
                                        </div>
                                        <table class="table table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Date</th>
                                                    <th>Libbelé</th>
                                                    <th>Montant initial</th>
                                                    <th>Cout / mois</th>
                                                    <th>Statut</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($precomptes_collection as $item)
                                                    <tr>
                                                        <td>{{ $item->created_at->format('d-m-Y') }}</td>
                                                        <td>{{ $item->libelle }}</td>
                                                        <td>{{ $item->capital_initial }}</td>
                                                        <td>{{ $item->retenu_mois }}</td>
                                                        <td>{{ $item->statut }}</td>
                                                        <td>
                                                            <a href="{{ route('gestion_precomptes.show', [$item->id]) }}">
                                                                <i class="me-2 text-success" data-feather="eye"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="tab-pane fade" id="custom-tabs-four-setting" role="tabpanel"
                                        aria-labelledby="custom-tabs-four-setting-tab">
                                        <div class="page-header-subtitle mb-3">
                                            <a class="btn btn-success" href="#" class="btn btn-success"
                                                data-bs-toggle="modal" data-bs-target="#formContratBackdropRetenue">
                                                Ajouter autres retenues
                                            </a>
                                        </div>
                                        <table class="table table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Date</th>
                                                    <th>Code</th>
                                                    <th>Libbelé</th>
                                                    <th>Montant</th>
                                                    <th>Statut</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($retenue_collection as $item)
                                                    <tr>
                                                        <td>{{ $item->created_at->format('d-m-Y') }}</td>
                                                        <td>{{ $item->code }}</td>
                                                        <td>{{ $item->libelle }}</td>
                                                        <td>{{ $item->montant }}</td>
                                                        <td>{{ $item->statut }}</td>
                                                        <td>
                                                            <a
                                                                href="{{ route('gestion_occasionnelles.show', [$item->id]) }}">
                                                                <i class="me-2 text-green text-center" data-feather="eye"></i>
                                                            </a>
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
                </div>
            </div>
        </div>
    </div>




    <!-- Modal -->
    <div class="modal fade" id="formContratBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Nouvelle charge occasionnelle
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <!-- Tabbed dashboard card example-->
                            <div class="card mb-4">
                                <div class="card-body">
                                    <div class="sbp-preview-content">
                                        <form method="POST" action="{{ route('gestion_occasionnelles.store') }}">
                                            @csrf
                                            <div class="">
                                                <div class="row">
                                                    <input class="form-control" type="text" name="contrats_id"
                                                        value="{{ $finds->id }}" hidden />
                                                    <div class="col-lg-12 col-md-12">
                                                        <div class="mb-3">
                                                            <label>Code<span class="text-danger">*</span></label>
                                                            <input class="form-control" type="text" name="code" />
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 col-md-12">
                                                        <div class="mb-3">
                                                            <label>Libellé<span class="text-danger">*</span></label>
                                                            <input class="form-control" type="text" name="libelle" />
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 col-md-12">
                                                        <div class="mb-3">
                                                            <label>Montant <span class="text-danger">*</span></label>
                                                            <input class="form-control" type="number" name="montant" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-12 col-md-12">
                                                        <div class="mb-3">
                                                            <label>Statut</label>
                                                            <select name="statut" class="form-control">
                                                                <option value="En cours">En cours</option>
                                                                <option value="Terminé">Terminé</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 col-md-12">
                                                        <div class="mb-3">
                                                            <label>Observation</label>
                                                            <textarea name="observation" rows="3" class="form-control"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mt-3">
                                                    <button type="submit" class="btn btn-success">Enregistrer</button>
                                                    <button type="button" class="btn btn-danger"
                                                        data-bs-dismiss="modal">Fermer</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- Modal -->
    <div class="modal fade" id="formContratBackdropRetenue" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Ajout d'autres retenues</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <!-- Tabbed dashboard card example-->
                            <div class="card mb-4">
                                <div class="card-body">
                                    <div class="sbp-preview-content">
                                        <form method="POST" action="{{ route('gestion_autres_retenues.store') }}">
                                            @csrf
                                            <div class="">
                                                <div class="row">
                                                    <input class="form-control" type="text" name="contrats_id"
                                                        value="{{ $finds->id }}" hidden />
                                                    <div class="col-lg-12 col-md-12">
                                                        <div class="mb-3">
                                                            <label>Code<span class="text-danger">*</span></label>
                                                            <input class="form-control" type="text" name="code" />
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 col-md-12">
                                                        <div class="mb-3">
                                                            <label>Libellé<span class="text-danger">*</span></label>
                                                            <input class="form-control" type="text" name="libelle" />
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 col-md-12">
                                                        <div class="mb-3">
                                                            <label>Montant <span class="text-danger">*</span></label>
                                                            <input class="form-control" type="number" name="montant" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-12 col-md-12">
                                                        <div class="mb-3">
                                                            <label>Statut</label>
                                                            <select name="statut" class="form-control">
                                                                <option value="En cours">En cours</option>
                                                                <option value="Terminé">Terminé</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mt-3">
                                                    <button type="submit" class="btn btn-success">Enregistrer</button>
                                                    <button type="button" class="btn btn-danger"
                                                        data-bs-dismiss="modal">Fermer</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <!-- Modal -->
    <div class="modal fade" id="formContratBackdropPrecompte" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Ajout d'un nouveau pré-compte
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <!-- Tabbed dashboard card example-->
                            <div class="card mb-4">
                                <div class="card-body">
                                    <div class="sbp-preview-content">
                                        <form method="POST" action="{{ route('gestion_precomptes.store') }}">
                                            @csrf
                                            <div class="">
                                                <div class="row">
                                                    <input class="form-control" type="text" name="contrats_id"
                                                        value="{{ $finds->id }}" hidden />
                                                    <div class="col-lg-4 col-md-12">
                                                        <div class="mb-3">
                                                            <label>Code<span class="text-danger">*</span></label>
                                                            <input class="form-control" type="text" name="code" />
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-12">
                                                        <div class="mb-3">
                                                            <label>Libellé<span class="text-danger">*</span></label>
                                                            <input class="form-control" type="text" name="libelle" />
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-12">
                                                        <div class="mb-3">
                                                            <label>Montant initial<span
                                                                    class="text-danger">*</span></label>
                                                            <input class="form-control" type="number"
                                                                name="capital_initial" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-3 col-md-12">
                                                        <div class="mb-3">
                                                            <label>Statut</label>
                                                            <select name="statut" class="form-control">
                                                                <option value="En cours">En cours</option>
                                                                <option value="Terminé">Terminé</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 col-md-12">
                                                        <div class="mb-3">
                                                            <label>Nbr d'echéance</label>
                                                            <input class="form-control" type="number"
                                                                name="nbr_echeance" />
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 col-md-12">
                                                        <div class="mb-3">
                                                            <label>Date debut</label>
                                                            <input class="form-control" type="date"
                                                                name="date_debut" />
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 col-md-12">
                                                        <div class="mb-3">
                                                            <label>Date fin</label>
                                                            <input class="form-control" type="date" name="date_fin" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mt-3">
                                                    <button type="submit" class="btn btn-success">Enregistrer</button>
                                                    <button type="button" class="btn btn-danger"
                                                        data-bs-dismiss="modal">Fermer</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
