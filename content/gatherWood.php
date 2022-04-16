<?php
    $choppedmin = 3 +  $GLOBALS["userinfo"]["axelvl"];
    $choppedmax = 7 +  $GLOBALS["userinfo"]["axelvl"];

    $chopped = rand($choppedmin,$choppedmax );
?>  

<!DOCTYPE html>
<html>
    <body>
        <p><?php echo $chopped?><p>
    </body>
</html> 