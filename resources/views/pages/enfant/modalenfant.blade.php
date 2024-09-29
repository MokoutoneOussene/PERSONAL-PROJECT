<!-- Modal -->
<div class="modal fade" id="formLocataireBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">
                    Ajouter un nouvel enfant
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
                                    <form method="POST" action="{{ route('gestion_enfant.store') }}"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="p-2 m-1"
                                            style="border: 2px solid rgb(242, 199, 174); border-radius: 5px;">
                                            <h3 class="m-2 text-center text-danger">
                                                Veuillez renseigner
                                                les
                                                informations de
                                                l'enfant
                                            </h3>
                                            <p class="mb-5">NB:
                                                les champs ayant des
                                                * en couleur rouge
                                                sont
                                                obligatoires ....
                                            </p>

                                            <div class="row m-2"
                                                style="border: 2px solid rgb(48, 56, 126); border-radius: 5px;">
                                                <h6 class="m-2 text-center text-danger">
                                                    Enfant
                                                </h6>
                                                <div class="col-lg-6 col-md-12">
                                                    <div class="mb-3">
                                                        <label>Nom</label>
                                                        <input class="form-control" type="text" name="nom" />

                                                        <input class="form-control" type="text" name="personnels_id"
                                                            value="{{ $item->id }}" hidden />
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-12">
                                                    <div class="mb-3">
                                                        <label>Prénom(s)</label>
                                                        <input class="form-control" type="text" name="prenom" />
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-12">
                                                    <div class="mb-3">
                                                        <label>Genre</label>
                                                        <select name="genre" class="form-control">
                                                            <option value="Masculin">
                                                                Masculin
                                                            </option>
                                                            <option value="Feminin">
                                                                Feminin
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-12">
                                                    <div class="mb-3">
                                                        <label>Date
                                                            de
                                                            naissance</label>
                                                        <input class="form-control" type="date" name="date_nais" />
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-12">
                                                    <div class="mb-3">
                                                        <label>Lieu
                                                            de
                                                            naissance</label>
                                                        <input class="form-control" type="text" name="lieu_nais" />
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-12">
                                                    <div class="mb-3">
                                                        <label>Acte
                                                            de
                                                            naissance
                                                            en
                                                            PDF</label>
                                                        <input class="form-control" type="file" name="acte_nais"
                                                            required />
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row m-2"
                                                style="border: 2px solid rgb(48, 56, 126); border-radius: 5px;">
                                                <h6 class="m-2 text-center text-danger">
                                                    Conjoint(e)
                                                </h6>
                                                <div class="col-lg-6 col-md-12">
                                                    <div class="mb-3">
                                                        <label>Nom</label>
                                                        <input class="form-control" type="text" name="nom_conj" />
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-12">
                                                    <div class="mb-3">
                                                        <label>Prénom(s)</label>
                                                        <input class="form-control" type="text" name="prenom_conj" />
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-12">
                                                    <div class="mb-3">
                                                        <label>Profession</label>
                                                        <input class="form-control" type="text" name="profession" />
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-12">
                                                    <div class="mb-3">
                                                        <label>Adresse</label>
                                                        <input class="form-control" type="text" name="adresse" />
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="mt-3">
                                                <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                                    data-bs-target="#formValidationBackdrop">Enregistrer</button>
                                                <button type="button" class="btn btn-danger"
                                                    data-bs-dismiss="modal">Fermer</button>
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
