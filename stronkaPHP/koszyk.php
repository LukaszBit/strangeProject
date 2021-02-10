<?php
include_once("funkcje.php");
include_once ("php/Baza.php");
$bd = new Baza("127.0.0.1:3307", "root", "", "users");
menu();
?>

<main>

    <div>

        <div class="shopping-cart">
            <h2>Twój koszyk</h6>

                <?php
                $total = 0;
                if (isset($_SESSION['cart'])) {
                    $idProd = array_column($_SESSION['cart'], 'idProd');

                    $result = $bd->selectProduct();
                    while ($row = mysqli_fetch_assoc($result)) {
                        foreach ($idProd as $id) {
                            if ($row['idProd'] == $id) {
                                prodKoszyk($row["produkt"], $row["cena"], $row["opis"], $row["idProd"]);
                                $total = $total + (int) $row['cena'];
                            }
                        }
                    }
                } else {
                    echo "<h3>Koszyk jest pusty</h3>";
                }
                ?>
        </div>
        <div class="col-md-6">
            <hr><?php
            echo "Cena końcowa $total zł.";
            if (isset($_SESSION['cart'])) {
                if (isset($_COOKIE[session_name()]) && isset($_SESSION['zalogowany'])) {
                    ?>
                    <input type="submit" class="inRejeReje" value="Kup" name="kup" />
                    <?php
                } else {
                    ?>
                    <button class="inRejeReje"><a href="logowanie.php" style="text-decoration: none;">Zaloguj się aby kupić</a></button>
                    <?php
                }
            }
            ?>
        </div>
    </div>
</main>


<?php
stopka();

if (isset($_POST['remove'])) {
    if ($_GET['action'] == 'remove') {
        foreach ($_SESSION['cart'] as $key => $value) {
            if ($value["id"] == $_GET['idProd']) {
                unset($_SESSION['cart'][$key]);
                echo "<script>window.location = 'koszyk.php'</script>";
            }
        }
    }
}
