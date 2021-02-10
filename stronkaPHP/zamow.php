<?php
include_once("funkcje.php");
include_once ("php/Baza.php");

$bd = new Baza("127.0.0.1:3307", "root", "", "users");
menu();
?>
<main><h2><b>Zamów online</b></h2><br/>
    <?php
    $result = $bd->selectProduct();
    while ($row = mysqli_fetch_assoc($result)) {
        produkt($row["produkt"], $row["cena"], $row["opis"], $row["idProd"]);
    }

    if (isset($_POST['add'])) {
        if (isset($_SESSION['cart'])) {
            $item = array_column($_SESSION['cart'], "idProd");

            if (in_array($_POST['idProd'], $item)) {

                echo"<script>alert('Produkt jest już w koszyku')</script>";
                echo"<script>window.location='zamow.php'</script>";
            } else {
                $count = count($_SESSION['cart']);
                $item_array = [
                    'idProd' => $_POST['idProd']
                ];
                $_SESSION['cart'][$count] = $item_array;
                echo '<META HTTP-EQUIV="Refresh" Content="0; URL=' . $location . '">';
            }
        } else {
            $item_array = [
                'idProd' => $_POST['idProd']
            ];
            $_SESSION['cart'][0] = $item_array;
            echo '<META HTTP-EQUIV="Refresh" Content="0; URL=' . $location . '">';
        }
    }
    ?>
    <!--<form>
        <table>
            <tr>
                <td> <label>Imię:</label></td>
                <td><input id="imie" type="text" required="required" /></td>
            </tr>
            <tr>
                <td> <label>Nazwisko:</label></td>
                <td><input id="nazwisko" type="text" required="required" /></td>
            </tr>
            <tr>
                <td> <label>Ulica:</label></td>
                <td><input id="ulica" type="text" required="required" /></td>
            </tr>
            <tr>
                <td> <label>Numer:</label></td>
                <td><input id="numer" type="number" required="required" /></td>
            </tr>
            <tr>
                <td> <label>Kod pocztowy:</label></td>
                <td><input id="kod" type="text" required="required" placeholder="00-000" pattern="[0-9]{2}-[0-9]{3}" /></td>
            </tr>
            <tr>
                <td> <label>Miasto:</label></td>
                <td><input id="miasto" type="text" required="required" /></td>
            </tr>
            <tr>
                <td> <label>Numer telefonu:</label></td>
                <td><input id="telefon" type="tel" required="required" placeholder="123456789" pattern="[0-9]{9}" /></td>
            </tr>
            <tr>
                <td><label>Adres e-mail:</label></td>
                <td><input id="email" type="email" pattern="^(([\w_]+)-*\.?)+@[\w](([\w]+)-?_?\.?)+([a-z]{2,4})$" required="required" /></td>
            </tr>
        </table>
        <br/><h3>Ksiązki oraz kursy:</h3>
        <input class="inny" type="checkbox" id="ksiazka"/><label>Książka z kursem</label>
        <input class="inny" type="checkbox" id="kursonline" /><label>Wersja cyfrowa kusru</label>
        <input class="inny" type="checkbox" id="slowka"/><label>Książka ze słówkami</label><br />
        <br/><h3><label>Sposób zapłaty:</label></h3>
        <input class="inny" type="radio" name="zaplata" value="eurocard"/><i>eurocard</i>
        <input class="inny" type="radio" name="zaplata" value="visa"/><i>visa</i>
        <input class="inny" type="radio" name="zaplata" value="przelew" required="required"/><i>przelew bankowy</i>
        <input class="inny" type="radio" name="zaplata" value="blik"/><i>BLIK</i>
        <br />
        <button onclick="dodajZamowienie()">Wyślij</button>
        <button onclick="wyswietlZamowienia()">Wyświetl zamówienia</button>
        <button onclick="usunListe()">Usuń listę</button>
    </form></br></br>
    <div id="list"></div>-->
</main>
<?php
stopka();

