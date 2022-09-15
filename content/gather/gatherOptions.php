<!DOCTYPE html>
<html>
    <body>
        <?php if ($_GET['content'] != 'gatherChop'){?>
            <form method="POST" action="?content=gatherChop">  
                <input type="submit" value="Chop" class="commands-button"/>  
            </form>
        <?php }?>
        <?php if ($_GET['content'] != 'gatherMine'){?>
            <form method="POST" action="?content=gatherMine">  
                <input type="submit" value="Mine" class="commands-button"/>  
            </form>
        <?php }?>
        <form method="POST" action="?content=gatherFish">  
            <input type="submit" value="Fish" class="commands-button"/>  
        </form>
    </body>
</html> 