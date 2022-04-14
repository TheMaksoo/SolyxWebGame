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
        
        require_once 'backend/conn.php';
        $query = $db->find(['name' => "TheMaksoo"])->toArray();

        
        ?>
        <textarea name='overige_info' id='overige_info' class='form-input' rows='4'><?php echo "{$query}"?></textarea>
    </div>

</body>

</html>