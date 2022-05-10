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
        <h1>Nieuw Monster</h1>

        <form action="../backend/monsterController.php" method="POST">
        
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
                <select name="type" id= "type">
                    <option value=""> - Choose Location - </option>
                    <?php foreach($locations as $location) { ?>
                    <option value="<?php  echo $location ?>"> - <?php echo $location ?> - </option>
                    <?php } ?>
                </select>
            </div>
        </form>
    </div>

    <div class="container">
        <h1>Nieuw Monster</h1>

        <form action="../backend/locationController.php" method="POST">
        
            <div class="form-group">
                <label for="Name">Name Location:</label>
                <input type="text" name="name" id="name" class="form-input">
            </div>
            <div class="form-group">
                <label for="unlock">Level Unlock</label>
                <input type="number" id="unlock" name="unlock level " min="0">
            </div>
            <div class="form-group">
                <label for="backstory">Back Story</label>
                <input type="text" id="backstory" name="back story">
            </div>
            
        </form>
    </div>
</section>


<?php
    include_once 'footer.php';
    ?>