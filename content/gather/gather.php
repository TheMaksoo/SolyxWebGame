<!DOCTYPE html>
<html>
    <body>
        <?php if ($_GET['content'] != 'gatherChop'){?>
            <form method="POST" action="?content=gatherChop">  
                <input type="submit" value="Chop"/>  
            </form>
        <?php }?>
        <?php if ($_GET['content'] != 'gatherMine'){?>
            <form method="POST" action="?content=gatherMine">  
                <input type="submit" value="Mine"/>  
            </form>
        <?php }?>
        <form method="POST" action="?content=gatherFish">  
            <input type="submit" value="Fish"/>  
        </form>
    </body>
</html> 