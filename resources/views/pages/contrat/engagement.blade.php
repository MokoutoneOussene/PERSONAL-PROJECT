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
                            GESTION DES CONTRATS
                        </h1>
                        <div class="page-header-subtitle mt-3">
                            <a class="btn btn-success" href="{{ route('gestion_contrat.index') }}">
                                Liste des contrats
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
                        <div class="row">
                            <div class="col-lg-12">
                                <!-- Tabbed dashboard card example-->
                                <div class="card mb-4">
                                    <div class="card-body">
                                        <div class="sbp-preview-content">
                                            {{-- si un formulaire contient une image il faut ajouter enctype="multipart/form-data" --}}
                                            <form method="POST" action="{{ route('gestion_contrat.store') }}">
                                                @csrf
                                                <div class="p-2 m-1"
                                                    style="border: 2px solid rgb(242, 199, 174); border-radius: 5px;">
                                                    <h3 class="m-2 text-center text-danger">Veuillez renseigner les
                                                        informations du contrat
                                                    </h3>
                                                    <p class="mb-5">NB: les champs ayant des * en couleur rouge sont
                                                        obligatoires </p>
                                                    <div class="row">
                                                        <div class="col-lg-4 col-md-12">
                                                            <div class="mb-3">
                                                                <label>Selectionner agent <span class="text-danger">*</span></label>
                                                                <select name="personnels_id" class="form-control">
                                                                    @foreach ($personnels as $key => $value)
                                                                        <option value="{{ $value->id }}">
                                                                            {{ $value->matricule }} - {{ $value->nom }} - {{ $value->prenom }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-md-12">
                                                            <div class="mb-3">
                                                                <label>Nature <span class="text-danger">*</span></label>
                                                                <select name="nature" class="form-control">
                                                                    <option value="CDD">CDD</option>
                                                                    <option value="CDI">CDI</option>
                                                                    <option value="STAGE">STAGE</option>
                                                                    <option value="CONSULTATION">CONSULTATION</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-md-12">
                                                            <div class="mb-3">
                                                                <label>Date de signature <span class="text-danger">*</span></label>
                                                                <input class="form-control" type="date" name="date_signature" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-3 col-md-12">
                                                            <div class="mb-3">
                                                                <label>Statut</label>
                                                                <select name="statut" class="form-control">
                                                                    <option value="En cours">En cours</option>
                                                                    <option value="Resilié">Resilié</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-3 col-md-12">
                                                            <div class="mb-3">
                                                                <label>Base<span class="text-danger">*</span></label>
                                                                <input class="form-control" type="number" name="base" />
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-3 col-md-12">
                                                            <div class="mb-3">
                                                                <label>Taux<span class="text-danger">*</span></label>
                                                                <input class="form-control" type="number" name="taux" />
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-3 col-md-12">
                                                            <div class="mb-3">
                                                                <label>Salaire de base<span class="text-danger">*</span></label>
                                                                <input class="form-control" type="number" style="background: rgb(218, 216, 216)" readonly />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row m-2"
                                                        style="border: 2px solid rgb(48, 56, 126); border-radius: 5px;">
                                                        <h6 class="m-3 text-center text-danger">Indemnités supplémentaires
                                                        </h6>
                                                        <div class="col-lg-3 col-md-12">
                                                            <div class="mb-3">
                                                                <label>Prime ancienneté</label>
                                                                <input class="form-control" type="number" name="prime_anciennete" />
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-3 col-md-12">
                                                            <div class="mb-3">
                                                                <label>Indemnité de logement</label>
                                                                <input class="form-control" type="number" name="prime_logement" />
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-3 col-md-12">
                                                            <div class="mb-3">
                                                                <label>Indemnité de transport</label>
                                                                <input class="form-control" type="number" name="prime_transport" />
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-3 col-md-12">
                                                            <div class="mb-3">
                                                                <label>Indemnité de fonction</label>
                                                                <input class="form-control" type="number" name="prime_fonction" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row m-2"
                                                        style="border: 2px solid rgb(48, 56, 126); border-radius: 5px;">
                                                        <h6 class="m-3 text-center text-danger">Retenues sur salaire</h6>
                                                        <div class="col-lg-6 col-md-12">
                                                            <div class="mb-3">
                                                                <label>Retenu IUTS</label>
                                                                <input class="form-control" type="number" name="iuts" />
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-md-12">
                                                            <div class="mb-3">
                                                                <label>Retenu CNSS</label>
                                                                <input class="form-control" type="number" name="cnss" readonly />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="mt-3">
                                                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#formValidationBackdrop">Enregistrer</button>
                                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fermer</button>
                                                    </div>
                                                    @include('require.validationModal')
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
    </div>
@endsection
