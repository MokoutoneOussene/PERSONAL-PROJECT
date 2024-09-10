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
                            GESTION DES MISSIONS
                        </h1>
                        <div class="page-header-subtitle mt-3">
                            <a class="btn btn-success" href="{{ route('gestion_mission.index') }}">
                                Liste des missions
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
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card mb-4">
                                    <div class="card-body">
                                        <div class="sbp-preview-content">
                                            <form method="POST" action="{{ route('gestion_mission.store') }}"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <div class="p-2 m-1"
                                                    style="border: 2px solid rgb(242, 199, 174); border-radius: 5px;">
                                                    <h3 class="m-2 text-center text-danger">Créer et programmer une mission
                                                    </h3>
                                                    <p class="mb-5">NB: Les champs ayant des * en couleur rouge sont
                                                        obligatoires.</p>

                                                    <!-- Détails de la mission -->
                                                    <div class="row">
                                                        <div class="col-lg-4">
                                                            <div class="mb-3">
                                                                <label>Libellé de la mission <span
                                                                        class="text-danger">*</span></label>
                                                                <input class="form-control" type="text" name="lib"
                                                                    required />
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div class="mb-3">
                                                                <label>Consigne</label>
                                                                <input class="form-control" type="text" name="consigne"
                                                                    required />
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div class="mb-3">
                                                                <label>Date de signature <span
                                                                        class="text-danger">*</span></label>
                                                                <input class="form-control" type="date"
                                                                    name="date_signature" required />
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div class="mb-3">
                                                                <label>Lieu</label>
                                                                <input class="form-control" type="text" name="lieu" />
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div class="mb-3">
                                                                <label>Date de début <span
                                                                        class="text-danger">*</span></label>
                                                                <input class="form-control" type="date" name="date_debut"
                                                                    required />
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div class="mb-3">
                                                                <label>Date de fin</label>
                                                                <input class="form-control" type="date"
                                                                    name="date_fin" />
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <hr>
                                                    <!-- Programmation de la mission -->
                                                    <h4 class="text-center mt-4">Programmer la mission</h4>
                                                    <div id="personnel-container">
                                                        <div class="personnel-row row">
                                                            <div class="col-lg-4">
                                                                <div class="mb-3">
                                                                    <label>Personnel <span
                                                                            class="text-danger">*</span></label>
                                                                    <select name="personnel_ids[]" class="form-control"
                                                                        required>
                                                                        @foreach ($personnels as $personnel)
                                                                            <option value="{{ $personnel->id }}">
                                                                                {{ $personnel->nom }} -
                                                                                {{ $personnel->prenom }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4">
                                                                <div class="mb-3">
                                                                    <label>Rôle <span class="text-danger">*</span></label>
                                                                    <input class="form-control" type="text"
                                                                        name="roles[]" required />
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4">
                                                                <div class="mb-3">
                                                                    <label>Tâche</label>
                                                                    <input class="form-control" type="text"
                                                                        name="tasks[]" />
                                                                </div>
                                                            </div>
                                                            <div class="d-flex">
                                                                <button type="button" class="btn btn-danger remove-personnel m-3">X</button>
                                                                <button type="button" class="btn btn-success m-3" id="add-personnel">+</button>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- Bouton pour soumettre -->
                                                    <div class="mt-3">
                                                        <button type="submit" class="btn btn-success">Enregistrer la
                                                            mission</button>
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
        <script>
            document.getElementById('add-personnel').addEventListener('click', function() {
                var container = document.getElementById('personnel-container');
                var newPersonnelRow = document.createElement('div');
                newPersonnelRow.classList.add('personnel-row', 'row', 'mt-3');

                newPersonnelRow.innerHTML = `
            <div class="col-lg-4">
                <div class="mb-3">
                    <label>Personnel <span class="text-danger">*</span></label>
                    <select name="personnel_ids[]" class="form-control" required>
                        @foreach ($personnels as $personnel)
                            <option value="{{ $personnel->id }}">{{ $personnel->nom }} - {{ $personnel->prenom }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="mb-3">
                    <label>Rôle <span class="text-danger">*</span></label>
                    <input class="form-control" type="text" name="roles[]" required />
                </div>
            </div>
            <div class="col-lg-4">
                <div class="mb-3">
                    <label>Tâche</label>
                    <input class="form-control" type="text" name="tasks[]" />
                </div>
            </div>
            <div class="col-lg-12 text-right">
                <button type="button" class="btn btn-danger remove-personnel">X</button>
            </div>
        `;

                container.appendChild(newPersonnelRow);
            });

            document.addEventListener('click', function(e) {
                if (e.target && e.target.classList.contains('remove-personnel')) {
                    e.target.closest('.personnel-row').remove();
                }
            });
        </script>
    @endsection