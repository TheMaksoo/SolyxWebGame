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
        <form action="backend/monsterController.php" method="POST" enctype="multipart/form-data">   
            <div class="form-group">
                <label for="name">Name Monster:</label>
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
                <select name="location" id= "location">`
                    
                    <option value=""> - Choose Location  - </option>
                    <?php foreach($locations as $location) { ?>
                        <option value="<?php print_r($location["name"]) ?>"> - <?php print_r($location["name"]) ?> - </option>
                    <?php } ?>
                </select>
            </div>
            <p>All based on commen enemy.<p>
            <div class="form-group">
                <label for="healthMin">Minimum health</label>
                <input type="number" id="healthMin" name="healthMin" min="0" onchange="document.getElementById('healthMax').min=this.value;">
            </div>
            <div class="form-group">
                <label for="healthMax">Maximum health</label>
                <input type="number" id="healthMax" name="healthMax" min="document.getElementById('healthMin').value">
            </div>
            <div class="form-group">
                <label for="damageMin">Minimum damage</label>
                <input type="number" id="damageMin" name="damageMin" min="0" onchange="document.getElementById('damageMax').min=this.value;">
            </div>
            <div class="form-group">
                <label for="damageMax">Maximum damage</label>
                <input type="number" id="damageMax" name="damageMax" min="document.getElementById('damageMin').value">
            </div>
            <div class="form-group">
                <label for="goldMin">Minimum gold</label>
                <input type="number" id="goldMin" name="goldMin" min="0" onchange="document.getElementById('goldMax').min=this.value;">
            </div>
            <div class="form-group">
                <label for="goldMax">Maximum gold</label>
                <input type="number" id="goldMax" name="goldMax" min="document.getElementById('goldMin').value">
            </div>
            <div class="form-group">
                <label for="experienceMin">Minimum experience</label>
                <input type="number" id="experienceMin" name="experienceMin" min="0" onchange="document.getElementById('experienceMax').min=this.value;">
            </div>
            <div class="form-group">
                <label for="experienceMax">Maximum experience</label>
                <input type="number" id="experienceMax" name="experienceMax" min="document.getElementById('experienceMin').value">
            </div>
            <p>All attack start automattically with 'uses' and end with 'hits'.<br>Add 3 or more attacks at any length. (visual text only)<br> To start a new attack end with a '*' and dont use a space after.<br> Example: chomp and*dash and*bite and</p>
            <div class="form-group">
                <label for="attacks">Attacks</label>
                <input type="text" id="attacks" name="attacks">
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
                <label for="image">Monster image</label>
                <input type="file" name='image'>
            </div>
            <input type="submit" value="Add monster">
    
        </form>
    </div>
</section>


<?php
    include_once 'footer.php';
    ?>