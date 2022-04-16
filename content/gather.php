<!DOCTYPE html>
<html>
    <body>
        <form method="POST" action="?content=gatherWood">  
            <input type="submit" value="Gather wood"/>  
        </form> 
        <form method="POST" action="?content=gatherStone">  
            <input type="submit" value="Gather Stone"/>  
        </form>
        <form method="POST" action="?content=gatherFish">  
            <input type="submit" value="Gather Fish"/>  
        </form>
        <form method="POST" action="<?php echo $base_url; ?>/game.php">  
            <input type="submit" value="Back"/>  
        </form>  
    </body>
</html> 