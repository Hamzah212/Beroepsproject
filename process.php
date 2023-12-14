[12:31] Hamzah Iqbal
<?php
include 'databaseconn.php';
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["add_person"])) {
        $naam = $_POST["Naam"];
        $leeftijd = $_POST["Achternaam"];
        $achternaam = $_POST["Leeftijd"];
        $activiteit = $_POST["Email"];
        $begeleider = $_POST["Telefoonnummer"];
        $stmt = $conn->prepare("INSERT INTO jongeren_activiteit (naam, achternaam, leeftijd, activiteit, begeleider) VALUES (:naam, :achternaam, :leeftijd, :activiteit, :begeleider)");
        $stmt->execute([
        ':naam' => $naam,
        ':achternaam' => $achternaam,
        ':leeftijd' => $leeftijd,
        ':email' => $email,
        ':telefoonnummer' => $telefoonnummer,
        ]);
        echo "Persoon succesvol toegevoegd.";
    }
    // Verwijder een persoon
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["delete_person"])) {
        $id_to_delete = $_POST["id_to_delete"];
 
        $stmt = $conn->prepare("DELETE FROM jongeren_activiteit WHERE id = :id");
        $stmt->execute([':id' => $id_to_delete]);
 
        echo "Persoon succesvol verwijderd.";
    }
// Update een persoon
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["update_person"])) {
    $id_to_update = $_POST["id_to_update"];
    $naam = $_POST["naam"];
    ':naam' => $naam,
        ':achternaam' => $achternaam,
        ':leeftijd' => $leeftijd,
        ':email' => $email,
        ':telefoonnummer' => $telefoonnummer,
 
    $stmt = $conn->prepare("UPDATE jongeren_activiteit SET naam = :naam, achternaam = :achternaam, leeftijd = :leeftijd, activiteit = :activiteit, begeleider = :begeleider WHERE id = :id");
 
    $stmt->execute([
        ':naam' => $naam,
        ':achternaam' => $achternaam,
        ':leeftijd' => $leeftijd,
        ':email' => $email,
        ':telefoonnummer' => $telefoonnummer,
    ]);
 
    echo "Persoon succesvol bijgewerkt.";
}
?>
<?php
$servername = "Hamzah";
$username = "root";
$password = "";
$dbname = "administratie";
 
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>