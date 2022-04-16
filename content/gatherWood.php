<?php
    
    $choppedmin = 3 +  $GLOBALS["userinfo"]["axelvl"];
    $choppedmax = 7 +  $GLOBALS["userinfo"]["axelvl"];

    $chopped = rand($choppedmin,$choppedmax );
    $GLOBALS["userinfo"]["wood"] += $chopped;
    
?>  

<!DOCTYPE html>
<html>
    <body>
        <p>Chopped:<?php print_r($chopped) ?><p>
        <p> Your wood:<?php print_r($GLOBALS["userinfo"]["wood"])?><p>
        <?php $updated = updateUserinfo($userinfo); ?>
    </body>
</html> 