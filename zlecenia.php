<?php
$polaczenie = new mysqli("localhost", "root", "", "remonty");
?>

<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Remonty</title>
    <link rel="stylesheet" href="styl.css">
</head>

<body>
    <header>
        <h1>Malowanie i gipsowanie</h1>
    </header>
    <main>
        <nav>
            <a href="kontakt.html">Kontakt</a>
            <a href="https://remonty.pl" target="_blank">Partnerzy</a>
        </nav>
        <aside>
            <img src="tapeta_lewa.png" alt="usługi">
            <img src="tapeta_prawa.png" alt="usługi">
            <img src="tapeta_lewa.png" alt="usługi">
        </aside>
        <section id="lewa">
            <h2>Dla klientów</h2>
            <form action="zlecenia.php" method="post">
                <label for="pracownicy">Ilu co najmniej pracowników potrzebujesz?</label>
                <input type="number" name="pracownicy" id="pracownicy">
                <!-- <input type="submit" value="Szukaj firm"> -->
                <button type="submit">Szukaj firm</button>
            </form>

            <!-- efekt działania skryptu 1 -->
            <?php
            if (!empty($_POST["pracownicy"])) {

                $liczbaPracownikow = $_POST["pracownicy"];
                // echo $_POST["pracownicy"];
                $zapytanie = "SELECT nazwa_firmy, liczba_pracownikow 
                FROM wykonawcy WHERE liczba_pracownikow >= $liczbaPracownikow;";

                $wynik_zapytania = $polaczenie->query($zapytanie);

                while ($wiersz = $wynik_zapytania->fetch_assoc()) {
                    echo "<p>";
                    echo $wiersz["nazwa_firmy"] . ", " . $wiersz["liczba_pracownikow"] . " pracowników";
                    echo "</p>";
                }
            }


            ?>
        </section>
        <section id="srodkowa">
            <h2>Dla wykonawców</h2>
            <form action="zlecenia.php" method="post">
                <select>
                    <!-- <option value=""></option> -->
                    <!-- efekt działania skryptu 2 -->
                </select>
                <br>
                <label for="malowanie">malowanie</label>
                <input type="radio" name="metody" id="malowanie" checked>

                <br>

                <label for="gipsowanie">gipsowanie</label>
                <input type="radio" name="metody" id="gipsowanie">

                <br>

                <button type="submit">Szukaj klientów</button>
            </form>

            <ul>
                <!-- <li></li> -->
                <!-- lista wypełniona za pomocą php skrypt 3 -->
            </ul>
        </section>
    </main>
    <footer>
        <p><strong>Stronę wykonał: k*eciorxd674206996</strong></p>
    </footer>
</body>

</html>

<?php
$polaczenie->close();
// $simple_select = "SELECT * FROM klienci";
// $polaczenie->query($simple_select);
?>