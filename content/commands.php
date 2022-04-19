<!DOCTYPE html>
<html>
    <body>
        <form method="POST" action="?content=gather">  
            <input type="submit" value="Gather"/>  
        </form>
        <?php if ($_GET['content'] == 'fight' && $GLOBALS["userinfo"]["selected_enemy"] == "None") {?>
            <form method="POST" action="?content=fight&Fight=false">  
                <input type="submit" value="Fight"/>  
            </form>
        <?php } else { ?>
            <form method="POST" action="?content=fight&Fight=true">  
                <input type="submit" value="Fight"/>  
            </form>
        <?php } ?>  
    </body>
</html> 