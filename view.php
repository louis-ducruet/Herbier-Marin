<?php
$title = "Visualisation d'un relevé";
include "src/layout/header.php";
$donnee = filter_input(INPUT_GET, "data");
# Vérification de la structure des données transmise
if (!preg_match("/^([0-9]\/){8}[0-9]$/", $donnee)){
    die("
        <div class='container'>
            <h1>Problème de visualisation</h1>
            <p>Les données transmises ne sont pas au bon format ! (<a href='./'>Retour à l'accueil</a>)</p>
        </div>
        </body>
        </html>
    ");
}
# Fonction qui retourne un tableau de valeur avec pour paramètre un entier
function generateZone($nb){
    # Crée le tableau vide
    $table = array(0, 0, 0, 0, 0, 0, 0, 0, 0);
    if ($nb != 0){
        # Choisi x clés aléatoirement
        $keys = array_rand($table, $nb);
        # Pour chacune changer la valeur par 1
        if (is_array($keys)){
            foreach ($keys as $key){
                $table[$key] = 1;
            }
        }else{
            $table[$keys] = 1;
        }
    }

    # Découpe pour avoir des lignes de 3 éléments
    return array_chunk($table, 3);
}
# Récupération des données dans un tableau de valeur
$donnee = array($donnee[0], $donnee[2], $donnee[4], $donnee[6], $donnee[8], $donnee[10], $donnee[12], $donnee[14], $donnee[16]);
$tableau = array();
# Création du tableau d'extrapolation 10*10*$donnee
for ($i = 1; $i <= 100; $i++) {
    $tableau = array_merge($tableau, $donnee);
}
# Trie aléatoire du tableau
shuffle($tableau);
# Découpe pour faire des grandes lignes de 30 grands éléments (donc 30 lignes)
$tableau = array_chunk($tableau, 30);
?>
<main>
    <div class="container pt-2 pb-3">
        <h1>Visualisation de l'herbier</h1>
        <table class="grandTableau">
            <tbody>
                <?php
                # Boucle pour chaque grande ligne
                foreach ($tableau as $gLigne){
                    ?>
                    <tr>
                        <?php
                        # Boucle pour chaque grand élément
                        foreach ($gLigne as $gValeur){
                            ?>
                            <td class="p-0">
                                <table class="petitTableau">
                                    <tbody>
                                        <?php
                                            $pTableau = generateZone($gValeur);
                                            foreach ($pTableau as $pLigne){
                                                ?>
                                                <tr>
                                                    <?php
                                                    foreach ($pLigne as $pValeur){
                                                        ?>
                                                        <td class="<?php echo ($pValeur == 1) ? 'table-success' : ''; ?> p-0"></td>
                                                        <?php
                                                    }
                                                    ?>
                                                </tr>
                                                <?php
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </td>
                            <?php
                        }
                        ?>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</main>
<?php
include "src/layout/footer.php";