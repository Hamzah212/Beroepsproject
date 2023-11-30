<?php
// Verbinding maken met de database (vervang met je eigen databasegegevens)
$servername = "localhost";
$username = "gebruikersnaam";
$password = "wachtwoord";
$dbname = "database";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Toevoegen van jongeren
if (isset($_POST['toevoegen'])) {
    $naam = $_POST['naam'];
    $leeftijd = $_POST['leeftijd'];

    $sql = "INSERT INTO jongeren (naam, leeftijd) VALUES ('$naam', '$leeftijd')";

    if ($conn->query($sql) === TRUE) {
        echo "Jongere succesvol toegevoegd";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Wijzigen van jongeren
if (isset($_POST['wijzigen'])) {
    $id = $_POST['id_wijzigen'];
    $nieuweNaam = $_POST['nieuwe_naam'];
    $nieuweLeeftijd = $_POST['nieuwe_leeftijd'];

    $sql = "UPDATE jongeren SET naam='$nieuweNaam', leeftijd='$nieuweLeeftijd' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Jongere succesvol gewijzigd";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Verwijderen van jongeren
if (isset($_POST['verwijderen'])) {
    $id = $_POST['id_verwijderen'];

    $sql = "DELETE FROM jongeren WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Jongere succesvol verwijderd";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Koppelen aan instituut
if (isset($_POST['koppelen_instituut'])) {
    $id = $_POST['id_koppelen'];
    $instituut = $_POST['instituut'];

    // Voeg code toe om de koppeling met het instituut te maken
}

// Koppelen aan activiteit
if (isset($_POST['koppelen_activiteit'])) {
    $id = $_POST['id_koppelen'];
    $activiteit = $_POST['activiteit'];

    // Voeg code toe om de koppeling met de activiteit te maken
}

$conn->close();
?>
