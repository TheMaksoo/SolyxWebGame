<!doctype html>
<html lang="nl">

<head>
    <title>Solyx</title>
    <?php require_once 'head.php'; ?>
</head>

<body>
    <?php require_once 'header.php'; ?>
    <div class="container home">
        <h1>Solyx main page.</h1>
    
    <?php 
    
    require_once '../backend/conn.php';
    
    $query = "SELECT * FROM meldingen";
    $statement = $conn->prepare($query);
    $statement->execute([":id" => $id]);
    $meldingen = $statement->fetchAll(PDO::FETCH_ASSOC);
    ?>
    <textarea name='overige_info' id='overige_info' class='form-input' rows='4'><?php echo "{$meldingen}"?></textarea>
    </div>

</body>

</html>