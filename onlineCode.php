<?php
    include_once 'header.php';
    include_once 'head.php';
    require __DIR__ . "/backend/config.php";
    require __DIR__ . "/backend/functions.php";
    require $_SERVER['DOCUMENT_ROOT'] .'/solyx/backend/discord.php';

    $locations = getLocations();
    ?>
<section class="coding-section">
    <div class="container">
        <?php
        if(isset($_GET['msg']))
        {
            echo "<div class='msg'>" . $_GET['msg'] . "</div>";
        }
        ?>
        <h1>New Location</h1>

        <form action="backend/locationController.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="Name">Name Location:</label>
                <input type="text" name="name" id="name" class="form-input">
            </div>
            <div class="form-group">
                <label for="unlock">Level Unlock</label>
                <input type="number" id="unlock" name="unlocklevel" min="0">
            </div>
            <div class="form-group">
                <label for="backstory">Backstory</label>
                <input type="text" id="backstory" name="backstory">
            </div>
            <div class="form-group">
                <label for="creator">Backstory creator</label>
                <input type="text" id="creator" name="creator">
            </div>
            <div class="form-group">
                <label for="img">Background image</label>
                <input type="file" name='image'>
            </div>
            <input type="submit" value="Add location">
        </form>

        <h1>New Monster</h1>
        <form action="backend/monsterController.php" method="POST">
            
            <div class="form-group">
                <label for="Name">Name Monster:</label>
                <input type="text" name="name" id="name" class="form-input">
            </div>
            <div class="form-group">
                <label for="type">Monster Type</label>
                <select name="type" id= "type">
                    <option value=""> -Choose Monster type - </option>
                    <option value="normal"> - Normal Monster - </option>
                    <option value="strong"> - Strong Monster - </option>
                    <option value="boss"> - Boss Monster - </option>
                    <option value="event"> - Event Monster - </option>
                </select>
            </div>
            <div class="form-group">
                <label for="location">Location</label>
                <select name="type" id= "type">`
                    
                    <option value=""> - Choose Location  - </option>
                    <?php foreach($locations as $location) { ?>
                        <option value="<?php print_r($location["name"]) ?>"> - <?php print_r($location["name"]) ?> - </option>
                    <?php } ?>
                </select>
            </div>
            <input type="submit" value="Add monster">
    
        </form>
    </div>
</section>


<?php
    include_once 'footer.php';
    ?>