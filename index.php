<?php
$title = "🏡 Accueil";
include "src/layout/header.php";
?>
<main>
    <div class="container">
        <div class="accordion" id="accordionPanelsStayOpenExample">
            <div class="accordion-item">
                <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                        <span class="fad fa-clipboard-list fa-2x"></span>
                        <h3 class="mt-2 ms-2">Liste des relevés</h3>
                    </button>
                </h2>
                <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
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
                                    $data = array(
                                        array(
                                            "date" => "2021-02-08",
                                            "lieu" => "La rochelle R2",
                                            "releve" => "2/3/4/1/6/3/2/2/4"
                                        ),
                                        array(
                                            "date" => "2021-09-24",
                                            "lieu" => "La turbale Z3",
                                            "releve" => "1/1/1/4/4/4/3/2/5"
                                        )
                                    );
                                    foreach ($data as $d){
                                    ?>
                                        <tr>
                                            <td><?php echo $d['date']; ?></td>
                                            <td><?php echo $d['lieu']; ?></td>
                                            <td><?php echo $d['releve']; ?></td>
                                            <td>
                                                <a type="button" class="btn btn-primary" href="view.php?data=<?php echo $d['releve']; ?>">
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
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                        <span class="fad fa-file-plus fa-2x"></span>
                        <h3 class="mt-2 ms-2">Ajouter un relevé</h3>
                    </button>
                </h2>
                <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingTwo">
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