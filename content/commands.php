<!DOCTYPE html>
<html>
    <body>
        <?php
        // show all commands if no content OR if skill is used.
        if (!isset($_GET['content']) || $isded == 1){
            // Gather
            ?><form method="POST" action="?content=gather">  
                <input type="submit" value="Gather" class="commands-button"/>  
            </form><?php
            // Fight start on continue
            if ($GLOBALS["userinfo"]["selected_enemy"] == "None") {
                ?><form method="POST" action="?content=fight&Fight=false">  
                    <input type="submit" value="Fight" class="commands-button"/>  
                </form><?php
            }
            if ($GLOBALS["userinfo"]["selected_enemy"] != "None") { 
                ?><form method="POST" action="?content=fight&Fight=true">  
                    <input type="submit" value="Fight" class="commands-button"/>  
                </form><?php
            }

        }
        // show specific commands with no content.
        if (isset($_GET['content'])){
            // show all gather commands.
            if ($_GET['content'] == 'gather' || $_GET['content'] == 'gatherChop' || $_GET['content'] == 'gatherMine' || $_GET['content'] == 'gatherFish') {
                include 'content/gather/gather.php';
            }
            // show fight commands
            if (isset($_GET['Fight'])){
                // show yes or no to user if they wanna fight.
                if ($_GET['Fight'] == 'false'){?>
                    <form method="POST" action="?content=fight&Fight=true"> 
                        <input type="submit" value="Yes" class="commands-button"/>  
                    </form>
                    <form method="POST" action="?content=fight&Fight=false">  
                        <input type="submit" value="No" class="commands-button"/>  
                    </form><?php 
                }
                // show all the users their skills
                if ($_GET['Fight'] == 'true' && $isded == 0){
                    foreach ($GLOBALS["userinfo"]["skills_learned"] as $skill) {?>
                        <form method="POST" action="?content=fight&Fight=true&skill=<?php echo $skill ?>">
                            <input type="submit" value="<?php echo ucfirst($skill) ?>" class="commands-button"/>  
                        </form><?php 
                    } ?>
                    <form method="POST" action="?content=fight&Fight=true&skill=heal">
                        <input type="submit" value="Heal" class="commands-button"/>  
                    </form>
                <?php }
            }
            // always show back button is content is set. but not when enemy has died.
            if ($isded == 0){
            ?><form method="POST" action="<?php echo $base_url; ?>/game.php">
                <input type="submit" value="Back" class="commands-button"/>  
            </form><?php 
            } 
        } ?>
        
    </body>
</html> 