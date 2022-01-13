<?php
$title = "🏡 Accueil";
include "src/layout/header.php";
$result = filter_input(INPUT_GET, "result");
include_once "src/actions/databaseConnection.php";
$requette = $pdo->prepare("SELECT date, lieu, donnee FROM releve ORDER BY date DESC");
$requette->execute();
$data = $requette->fetchAll();
?>
    <main>
        <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
            <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
            </symbol>
            <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
            </symbol>
        </svg>
        <?php
        if ($result === "1") {
            ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
                    <use xlink:href="#check-circle-fill"/>
                </svg>
                <strong>Bravo !</strong> Le nouveau relevé à bien été ajouté.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php
        }
        elseif ($result === "2") {
            ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:">
                    <use xlink:href="#exclamation-triangle-fill"/>
                </svg>
                <strong>Désolé !</strong> Une erreur a empêché l'ajout du relevé.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php
        }
        ?>
        <div class="container">
            <div class="accordion" id="accordionPanelsStayOpenExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true"
                                aria-controls="panelsStayOpen-collapseOne">
                            <span class="fad fa-clipboard-list fa-2x"></span>
                            <h3 class="mt-2 ms-2">Liste des relevés</h3>
                        </button>
                    </h2>
                    <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show"
                         aria-labelledby="panelsStayOpen-headingOne">
                        <div class="accordion-body">
                            <table class="table table-striped table-hover">
                                <thead>
                                <tr>
                                    <th scope="col">
                                        <span class="fad fa-calendar-alt"></span>
                                        Date
                                    </th>
                                    <th scope="col">
                                        <span class="fad fa-map-marked-alt"></span>
                                        Lieu
                                    </th>
                                    <th scope="col">
                                        <span class="fad fa-table"></span>
                                        Relevé
                                    </th>
                                    <th scope="col">
                                        <span class="fad fa-eye"></span>
                                        Visualisé
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                foreach ($data as $d) {
                                    ?>
                                    <tr>
                                        <td>
                                            <p><?php echo date_format(date_create($d['date']), "d/m/Y"); ?></p>
                                        </td>
                                        <td><p><?php echo $d['lieu']; ?></p></td>
                                        <td><p><?php echo $d['donnee']; ?></p></td>
                                        <td>
                                            <a type="button" class="btn btn-primary"
                                               href="view.php?data=<?php echo $d['donnee']; ?>">
                                                Voir la modélisation
                                            </a>
                                        </td>
                                    </tr>
                                    <?php
                                }
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false"
                                aria-controls="panelsStayOpen-collapseTwo">
                            <span class="fad fa-file-plus fa-2x"></span>
                            <h3 class="mt-2 ms-2">Ajouter un relevé</h3>
                        </button>
                    </h2>
                    <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse"
                         aria-labelledby="panelsStayOpen-headingTwo">
                        <div class="accordion-body">
                            <form action="?" class="was-validated">
                                <div class="form-floating mb-3">
                                    <input type="date" class="form-control" id="dateInput" required>
                                    <label for="dateInput">Date du relevé</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="lieuInput"
                                           placeholder="La Turballe R3" required>
                                    <label for="lieuInput">Lieu du relevé</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text"
                                           class="form-control"
                                           id="lieuInput"
                                           placeholder="3/2/3/1/5/3/4/2/2"
                                           pattern="([0-9]\/){8}[0-9]"
                                           required>
                                    <label for="lieuInput">Donnée relevé</label>
                                    <div class="invalid-feedback">
                                        Les résultats sont sous la forme X/X/X/X/X/X/X/X/X avec X un chiffre.
                                    </div>
                                </div>
                                <div class="d-grid gap-2 col-6 mx-auto">
                                    <button class="btn btn-success" type="submit">Ajouter le relevé</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
<?php
include "src/layout/footer.php";