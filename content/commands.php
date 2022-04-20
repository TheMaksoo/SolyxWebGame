<!DOCTYPE html>
<html>
    <body>
        <?php
        // if no content show all commands.
        if (!$_GET['content']) {?>
        <form method="POST" action="?content=gather">  
            <input type="submit" value="Gather"/>  
        </form>

        <?php }
        // check if user in a fight or not.
        if (!$_GET['content'] && $GLOBALS["userinfo"]["selected_enemy"] == "None") {?>
        <form method="POST" action="?content=fight&Fight=false">  
            <input type="submit" value="Fight"/>  
        </form>
        <?php } elseif (!$_GET['content'] && $GLOBALS["userinfo"]["selected_enemy"] != "None") { ?>
        <form method="POST" action="?content=fight&Fight=true">  
            <input type="submit" value="Fight"/>  
        </form>
        <?php }
        // if user gathering show all gather buttons.
        if ($_GET['content'] == 'gather' || $_GET['content'] == 'gatherChop' || $_GET['content'] == 'gatherMine' || $_GET['content'] == 'gatherFish') {
            include 'content/gather/gather.php';}

        // users wants to fight enemy Yes or No
        if ($_GET['content'] == 'fight' && $GLOBALS["userinfo"]["selected_enemy"] == "None") {?>
        <form method="POST" action="?content=fight&Fight=true"> 
            <input type="submit" value="Yes"/>  
        </form>
        <form method="POST" action="?content=fight&Fight=false">  
            <input type="submit" value="No"/>  
        </form>
        <?php }
        // when user in fight show all skills they can use.
        if ($_GET['content'] == 'fight' && $GLOBALS["userinfo"]["selected_enemy"] != "None") {
            foreach ($GLOBALS["userinfo"]["skills_learned"] as $skill)
            {?>
            <form method="POST" action="?content=fight&Fight=true&skill=<?php echo $skill ?>">
                <input type="submit" value="<?php echo $skill ?>"/>  
            </form>
        <?php }}
        // return to the game
        if ($_GET['content']) {?>
        <form method="POST" action="<?php echo $base_url; ?>/game.php">
            <input type="submit" value="Back"/>  
        </form><?php } ?>
    </body>
</html> 