<?php

function menuIndex() {
    session_start();
    ?>
    <!DOCTYPE html>
    <html lang = "PL">

        <head>
            <title>English!</title>
            <meta charset = "UTF-8">
            <meta name = "viewport" content = "width=device-width, initial-scale=1.0">
            <link rel = "stylesheet" href = "CSS/style.css" type = "text/css" />
            <link rel = "stylesheet" href = "CSS/fontello.css" type = "text/css" />
            <link rel = "stylesheet" href = "CSS/slajder.css" type = "text/css" />
            <script type = "text/javascript" src = "JS/slajder.js">
            </script>
        </head>
        <body style="background-image: url(CSS/background.jpg);
              background-size: cover;
              background-position: center;"
              onload="plusSlides(1)">
            <div id="kontener">
                <header><p>Learn&nbsp;</p><p style="color: #CF142B">english</p></header>
                <nav>
                    <ul style="float: left">
                        <li><a href="index.php"><i class="icon-home"></i>Home</a></li>
                        <li><a><i class="icon-clock"></i>Czasy</a>
                            <ul>
                                <li><a>Present<i class="icon-right-dir"></i></a>
                                    <ul>
                                        <li><a href="presentsimple.php">Simple</a></li>
                                        <li><a href="presentcontinuous.php">Continuous</a></li>
                                    </ul>
                                </li>
                                <li><a>Past<i class="icon-right-dir"></i></a>
                                    <ul>
                                        <li><a href="pastcontinuous.php">Continuous</a></li>
                                    </ul>
                                </li>
                                <li><a>Future<i class="icon-right-dir"></i></a>
                                    <ul>
                                        <li><a href="futuresimple.php">Simple</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li><a href="gramatyka.php"><i class="icon-book"></i>Gramatyka</a></li>
                        <li><a href="slowka.php"><i class="icon-font"></i>Słówka</a></li>
                        <li><a href="zamow.php"><i class="icon-basket"></i>Zamów</a></li>
                        <li><a href="info.php"><i class="icon-phone"></i>Informacje</a></li>
                    </ul>
                    <?php
                    if (isset($_COOKIE[session_name()]) && isset($_SESSION['zalogowany'])) {
                        ?>
                        <ul style="float: right">
                            <li><a href="koszyk.php">
                                    <h4 style="font-size: 110%;">
                                        <span>Koszyk</span>
                                        <?php
                                        if (isset($_SESSION['cart'])) {
                                            $count = count($_SESSION['cart']);
                                            echo '<span style="color: yellow;" id="licz">' . $count . '</span>';
                                        } else {
                                            echo '<span style="color: yellow;" id="licz">0</span>';
                                        }
                                        ?>
                                    </h4>
                                </a></li>
                            <li><a href="profil.php">Profil</a></li>
                            <li><a href='logowanie.php?akcja=wyloguj' >Wyloguj</a></li>
                        </ul>
                        <?php
                    } else {
                        ?>
                        <ul style="float: right">
                            <li><a href="koszyk.php">
                                    <h4 style="font-size: 110%;">
                                        <span>Koszyk</span>
                                        <?php
                                        if (isset($_SESSION['cart'])) {
                                            $count = count($_SESSION['cart']);
                                            echo '<span style="color: yellow;" id="licz">' . $count . '</span>';
                                        } else {
                                            echo '<span style="color: yellow;" id="licz">0</span>';
                                        }
                                        ?>
                                    </h4>
                                </a></li>
                            <li><a href="logowanie.php">Zaloguj</a></li>
                            <li><a href="rejestracja.php">Rejestracja</a></li>
                        </ul>
                        <?php
                    }
                    ?>
                </nav>
                <?php
            }

            function sliderIndex() {
                ?>
                <div class="slideshow-container">

                    <div class="mySlides fade">
                        <div class="numbertext">2 / 2</div>
                        <img src="zdjecia/a.jpg" alt=''>
                        <div class="text">Big Ben</div>
                    </div>

                    <div class="mySlides fade">
                        <div class="numbertext">1 / 2</div>
                        <img src="zdjecia/b.jpg" alt=''>
                        <div class="text">Tower Bridge</div>
                    </div>

                    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                    <a class="next" onclick="plusSlides(1)">&#10095;</a>
                </div>
                <br>
                <?php
            }

            function stopka() {
                ?>
                <aside>
                    <div>
                        <img src="CSS/guitar.jpg" alt="Reklama"/>
                    </div>
                </aside>
                <footer>Strona internetowa przeznaczona do nauki języka angielskiego&nbsp;-&nbsp;&copy;ŁF</footer>
            </div>
        </body>
    </html>
    <?php
}

function menu() {
    session_start();
    ?>
    <!DOCTYPE html>
    <html lang="PL">

        <head>
            <title>English!</title>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="CSS/style.css" type="text/css" />
            <link rel="stylesheet" href="CSS/fontello.css" type="text/css" />
            <link rel="stylesheet" href="CSS/czasy.css" type="text/css" />
            <script type="text/javascript" src="JS/zapisywanie.js">
            </script>
        </head>
        <body>
            <div id="kontener">
                <header><p>Learn&nbsp;</p><p style="color: #CF142B">english</p></header>
                <nav>
                    <ul style="float: left">
                        <li><a href="index.php"><i class="icon-home"></i>Home</a></li>
                        <li><a><i class="icon-clock"></i>Czasy</a>
                            <ul>
                                <li><a>Present<i class="icon-right-dir"></i></a>
                                    <ul>
                                        <li><a href="presentsimple.php">Simple</a></li>
                                        <li><a href="presentcontinuous.php">Continuous</a></li>
                                    </ul>
                                </li>
                                <li><a>Past<i class="icon-right-dir"></i></a>
                                    <ul>
                                        <li><a href="pastcontinuous.php">Continuous</a></li>
                                    </ul>
                                </li>
                                <li><a>Future<i class="icon-right-dir"></i></a>
                                    <ul>
                                        <li><a href="futuresimple.php">Simple</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li><a href="gramatyka.php"><i class="icon-book"></i>Gramatyka</a></li>
                        <li><a href="slowka.php"><i class="icon-font"></i>Słówka</a></li>
                        <li><a href="zamow.php"><i class="icon-basket"></i>Zamów</a></li>
                        <li><a href="info.php"><i class="icon-phone"></i>Informacje</a></li>
                    </ul>
                    <?php
                    if (isset($_COOKIE[session_name()]) && isset($_SESSION['zalogowany'])) {
                        ?>
                        <ul style="float: right">
                            <li><a href="koszyk.php">
                                    <h4 style="font-size: 110%;">
                                        <span>Koszyk</span>
                                        <?php
                                        if (isset($_SESSION['cart'])) {
                                            $count = count($_SESSION['cart']);
                                            echo '<span style="color: yellow;" id="licz">' . $count . '</span>';
                                        } else {
                                            echo '<span style="color: yellow;" id="licz">0</span>';
                                        }
                                        ?>
                                    </h4>
                                </a></li>
                            <li><a href="profil.php">Profil</a></li>
                            <li><a href='logowanie.php?akcja=wyloguj' >Wyloguj</a></li>
                        </ul>
                        <?php
                    } else {
                        ?>
                        <ul style="float: right">
                            <li><a href="koszyk.php">
                                    <h4 style="font-size: 110%;">
                                        <span>Koszyk</span>
                                        <?php
                                        if (isset($_SESSION['cart'])) {
                                            $count = count($_SESSION['cart']);
                                            echo '<span style="color: yellow;" id="licz">' . $count . '</span>';
                                        } else {
                                            echo '<span style="color: yellow;" id="licz">0</span>';
                                        }
                                        ?>
                                    </h4>
                                </a></li>
                            <li><a href="logowanie.php">Zaloguj</a></li>
                            <li><a href="rejestracja.php">Rejestracja</a></li>
                        </ul>
                        <?php
                    }
                    ?>
                </nav>
                <?php
            }

            function produkt($nazwa, $cena, $opis, $idProd) {
                $element = '
                <form action="zamow.php" method="post">
                    <div class = "card">
                        <h1>' . $nazwa . '</h1>
                        <p class = "price">' . $cena . '</p>
                        <p>' . $opis . '</p>
                        <p><button type="submit" name="add">Do koszyka</button></p>
                        <input type="hidden" name="idProd" value="' . $idProd . '">
                    </div>
                </form>
                ';
                echo $element;
            }

            function prodKoszyk($nazwa, $cena, $idProd) {
                $element = '<form action="koszyk.php?action=remove&id=' . $idProd . '" method="post">
                    
                            <div>
                                <h3 class="koszyk-nazwa">' . $nazwa . '</h3>
                                <h3 class="koszyk-cena">' . $cena . '</h3>
                                <button type="submit" class="koszyk-przycisk" name="remove">Usuń</button>
                            </div>
                            
                            <div class="koszykDiv">
                                    <button type="button"><p style="color: black;">-</p></button>
                                    <input type="text" value="1">
                                    <button type="button"><p style="color: black;">+</p></button>
                            </div>
                            
                </form>';
                echo $element;
            }
            