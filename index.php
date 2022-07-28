<?php
# Enabling error display
error_reporting(E_ALL);
ini_set('display_errors', 1);

require __DIR__ . "/backend/config.php";

?>
<?php
    include_once 'header.php';
    include_once 'head.php';
    ?>
<!DOCTYPE html>
<html lang="en">
<body>
     <main>
        <section class="about-section">
            <div class="about">
                <img src="img/common/solyxpfp.jpeg" style="width:350; height: 350px; border-radius: 5%;".jpg>
                <div class="about-container">
                    <a>About Solyx</a>
                    <p>Solyx is  text based RPG, with in depth lore about monsters, quests, locations and items, classes with specialization, PvP battles, lots of weapons, armor, and earnable titles.</p>
                    <p><br>Our stats</p>
                    <ul class="using">
                        <li><i class="fas fa-users"></i><span>490.000+ Users.</span></li>
                        <li><i class="fas fa-server"></i><span>1600+ Servers.</span></li>
                        <li><i class="fas fa-terminal"></i><span>60+ user commands.</span></li>
                        <li><i class="fas fa-terminal"></i></i><span>150+ Total commands.</span></li>
                    </ul>
                </div>
            </div>
        </section>
    </main>
</body>
<?php
    include_once 'footer.php';
    include_once 'copyrightFooter.php';
    ?>






