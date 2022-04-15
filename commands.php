<?php
    include_once 'header.php';
    ?>

<section class="commands-section">
    <div class="commands">
        <div class="commands-container">
            <button class="accordion" id="textbtn"><h1>-battle</h1></button>
            <div class="panel">
                <p><strong>-battle invite <@user></strong></p>
                <p>Invite a user to a PVP battle,</p>
                <p>The invited user has to answer with</p>
                <p><strong>Yes or No</strong></p>
                <br>
                <p><strong>-battle fight</strong></p>
                <p>The actual attack in a battle,</p>
                <p>You have to answer with your attack</p>
                <p>For example:</p>
                <p><strong>Swing </strong> or <strong> Cast</strong></p>
            </div>

            <button class="accordion" id="textbtn"><h1>-begin</h1></button>
            <div class="panel">
                <p><strong>-battle begin</strong></p>
                <p>You start your character,</p>
                <p>first you choose your Race</p>
                <p>this can be,</p>
                <p><strong>Demon</strong>, <strong>Elf</strong>, <strong>Human </strong> or <strong> Orc</strong></p>
                <br>
                <p>After you choose a race.</p>
                <p>You can now choose a class,</p>
                <p>You can choose by typing the name</p>
                <p>You can choose from</p>
                <p><strong>Archer</strong>, <strong>Knight</strong>, <strong>Mage </strong> or <strong> Thief</strong></p>
            </div>

            <button class="accordion" id="textbtn"><h1>-botstatus</h1></button>
            <div class="panel">
                <p><strong>-botstatus</strong></p>
                <p>You get a link to the botstatus website,</p>
                <p>the botstatus website is in development.</p>
            </div>

            <button class="accordion" id="textbtn"><h1>-checkin</h1></button>
            <div class="panel">
                <p><strong>-checkin</strong></p>
                <p>Is the same as <strong>-daily</strong></p>
                <p>you get a certain amount of</p>
                <p><strong>gold</strong>, <strong>crates</strong>, <strong>keys </strong>, <strong>wood</strong>, <strong>stone</strong>, or <strong> metal</strong>.</p>
                <p>Cooldown for checkin (Daily) is 24 hours.</p>
            </div>

            <button class="accordion" id="textbtn"><h1>-chop</h1></button>
            <div class="panel">
                <p><strong>-chop‍</strong></p>
                <p>You chop down a nearby tree,</p>
                <p>and gain a random amount of wood.</p>
                <p>Wood can be used to get <strong>Gold</strong> or for <strong>Crafting</strong>/<strong>Reforge</strong></p>
            </div>
            
            <button class="accordion" id="textbtn"><h1>-commands</h1></button>
            <div class="panel">
                <p><strong>-commands</strong></p>
                <p>Shows a menu</p>
                <p>about the basic commands</p>
                <p>also sends you a link to this web page.</p>
            </div>
            
            <button class="accordion" id="textbtn"><h1>-crate</h1></button>
            <div class="panel">
                <p><strong>-crate</strong> / <strong>-lb</strong></p>
                <p>You open one of your crates,</p>
                <p>uses 1 crate and 1 key,</p>
                <p>You can get normal, rare and legendary</p>
                <p>armor and weapons from them.</p>
            </div>
            
            <button class="accordion" id="textbtn"><h1>-daily</h1></button>
            <div class="panel">
                <p><strong>-daily</strong></p>
                <p>Is the same as</p>
                <p><strong>-checkin</strong></p>
                <p>you get a certain amount of</p>
                <p><strong>gold</strong>, <strong>crates</strong>, <strong>keys </strong>, <strong>wood</strong>, <strong>stone</strong>, or <strong> metal</strong>.</p>
                <p>Cooldown for checkin (Daily) is 24 hours</p>
            </div>
            
            <button class="accordion" id="textbtn"><h1>-equip</h1></button>
            <div class="panel">
                <p><strong>-equip weapon</strong></p>
                <p>Set or change the current item for your character to wear</p>
                <p>you select the weapon with the number in your inventory</p>
                <p>For example:</p>
                <p><strong>-equip weapon 4</strong></p>
                <br>
                <p><strong>-equip armor</strong></p>
                <p>Set or change the current item for your character to wear</p>
                <p>you select the armor with the number in your inventory</p>
                <p>For example:</p>
                <p><strong>-equip armor 4</strong></p>
            </div>
            
            <button class="accordion" id="textbtn"><h1>-fight</h1></button>
            <div class="panel">
                <p><strong>-fight</strong></p>
                <p>You have to type the</p>
                <p><strong>-fight</strong> command</p>
                <p>each time you want to fight again.</p>
                <p>you get the option to attack the monster</p>
                <p>or run away at first.</p>
                <p>For example:</p>
                <p><strong>Yes</strong>/<strong>y</strong> Or <strong>No</strong>/<strong>n</strong></p>
                <br>
                <p>After you accept a battle with a monster.></p>
                <p>You can choose between attacking or healing.</p>
                <p>You can always use</p>
                <p>For example:</p>
                <p><strong>-heal</strong> outside fight (not in pvp)</p>
                <p>You get the following choices</p>
                <p><strong>Attack</strong>,</p>
                <p>(Ex. <strong>Cast</strong> or <strong>Swing</strong>),</p>
                <p><strong>Second attack</strong> (if level 30+),</p>
                <p><strong>Heal</strong></p>
                <br>
                <p>Once you have completed your action</p>
                <p>you will have to redo the process over again.</p>
                <p><strong>-fight</strong> -> (Action) -> <strong>-fight</strong> -> (Action)</p>
                <p>Until you have defeated the monster</p>
                <p>or you died.</p>
            </div> 

            <button class="accordion" id="textbtn"><h1>-fish</h1></button>
            <div class="panel">
                <p><strong>-fish</strong></p>
                <p>You start fishing in a nearby creek.</p>
                <p>Your catch all depends on luck!</p>
                <p>Your catch can be positive or negative.</p>
                <p><strong>Fish</strong> will be automatically sold for <strong>gold</strong></p>
            </div>

            <button class="accordion" id="textbtn"><h1>-guild</h1></button>
            <div class="panel">
                <p><strong>-guild represent</strong></p>
                <p>You represent the guild your typing in.</p>
                <p>Guild = discord server.</p>
                <br>
                <p><strong>-guild info</strong></p>
                <p>You get the basic guild info</p>
                <p>such as name, title, level, bonus</p>
                <br>
                <p><strong>-guild promote @user</strong></p>
                <p>This is a server owner command.</p>
                <p>You promote a user to be a officer in your guild.</p>
                <br>
                <p><strong>-guild demote @user</strong></p>
                <p>This is the server owner command.</p>
                <p>You demote a user to be a officer in your guild.</p>
                <br>
                <p><strong>-guild tag &lt;tag&gt;</strong></p>
                <p>This is a Officer or Server Owner command.</p>
                <p>The guild tag is 4 characters long,</p>
                <p>can only be alphabetical and numeric.</p>
                <br>
                <p><strong>-guild leaders</strong></p>
                <p>Shows the Guild leader</p>
                <p>and the guilds officers.</p>
                <br>
                <p><strong>-guild mission</strong></p>
                <p>Shows the current guild mission.</p>
                <p>missions can be:</p>
                <p>Collect 200 wood,</p>
                <p>Collect 120 metal,</p>
                <p>Check-in 10 times,</p>
                <p>Kill 400 Oofers,</p>
                <p>Kill 100 Goblins,</p>
                <p>Donate 35000 gold to your guild.</p>
                <br>
                <p><strong>-guild Donate &lt;amount&gt;</strong></p>
                <p>You donate a certain amount of gold to your guild.</p>
                <p>10.000 Gold = +1 Guild bonus.</p>
                <p>20.000 Gold = +2 Guild bonus.</p>
                <p>You can donate any amount (not negative amounts)</p>
            </div>
              
            <button class="accordion" id="textbtn"><h1>-help</h1></button>
            <div class="panel">
                <p><strong>-help</strong></p>
                <p>You will be shows a menu with:</p>
                <p>How to start,</p>
                <p>Support server invite,</p>
                <p>The bot invite and the invite command,</p>
                <p>The Command webpage link,</p>
                <p>The website link,</p>
                <p>The donation link!</p>
            </div>

            <button class="accordion" id="textbtn"><h1>-heal</h1></button>
            <div class="panel">
                <p><strong>-heal</strong></p>
                <p>You heal for a certain amount of Hp.</p>
                <p>25, 55 hp</p>
                <p>You cant heal in battle with another user.</p>
                <p>More healing potions will be added.</p>
            </div>
            
            <button class="accordion" id="textbtn"><h1>-hp</h1></button>
            <div class="panel">
                <p><strong>-hp</strong></p>
                <p>Shows you current Hp</p>
                <p>You heal 1 to 3 Hp every minute automatically</p>
                <p>0 = death &lt;_&lt;</p>
                <p>100 = max health</p>
                <br>
                <p><strong>-hp buy &lt;amount&gt;</strong></p>
                <p>You buy a certain amount of health potions.</p>
                <p>Health potion value is based on your level.</p>
                <p>level 0+ 5g</p>
                <p>level 10+ 10g</p>
                <p>level 30+ 15g</p>
                <p>level 50+ 20g</p>
                <p>Level 70+ 25g</p>
            </div>
            
            <button class="accordion" id="textbtn"><h1>-info</h1></button>
            <div class="panel">
                <p><strong>-info</strong></p>
                <p>You get a link to the website,</p>
                <p>who is in the team</p>
                <p>what library solyx uses.</p>
            </div>
            
            <button class="accordion" id="textbtn"><h1>-inventory</h1></button>
            <div class="panel">
                <p><strong>-inventory</strong></p>
                <p>Shows your supplies, items, gear and buildings.</p>
                <p><strong>gold</strong>, <strong>crates</strong>, <strong>keys </strong>, <strong>wood</strong>, <strong>stone</strong>, or <strong> metal</strong>.</p>
                <p>Your <strong>Armor</strong> , <strong>Weapons</strong> and <strong>buildings</strong>.</p>
            </div>
            
            <button class="accordion" id="textbtn"><h1>-invite</h1></button>
            <div class="panel">
                <p><strong>-invite</strong></p>
                <p>Get the Bot invite</p>
                <p>so you can add it to your own server!</p>
            </div>
            
            <button class="accordion" id="textbtn"><h1>-leaderboard</h1></button>
            <div class="panel">
                <p><strong>-leaderboard users</strong></p>
                <p>or</p>
                <p><strong>-top users</strong></p>
                <p>Get the leaderboard of all registered players!</p>
                <br>
                <p><strong>-leaderboard guilds</strong></p>
                <p>or</p>
                <p><strong>-top guilds</strong></p>
                <p>Get the leaderboard of all registered Guilds(servers)!</p>
            </div>
            
            <button class="accordion" id="textbtn"><h1>-market</h1></button>
            <div class="panel">
                <p><strong>-market</strong></p>
                <p>Shows all current items on the market.</p>
                <p>and info about items.</p>
                <br>
                <p><strong>-market buy <id> </strong></p>
                <p>Example:</p>
                <p><strong>-market buy 387317544228487168</strong></p>
                <p>Buys the market item that you copied the id from!</p>
                <br>
                <p><strong>-market sell &lt;number&gt;</strong></p>
                <p>This will first ask for a confirmation</p>
                <p>if you want to sell this item on the market</p>
                <p>If you already have a item in the market it will show you</p>
                <p>and if you want to replace it.</p>
                <p>You can only have 1 item on the market.</p>
                <p>Different rarities have a different price range.</p>
                <p>Basic: 1.000g - 5.000g</p>
                <p>Common: 1.000g - 10.000g</p>
                <p>Rare: 5.000g - 50.000g</p>
                <p>Legendary: 50.000g - 500.000g</p>
                <p>Event: 50.000g - 500.000g</p>
                <p>Mythical: 500.000g+</p>
            </div>
            
            <button class="accordion" id="textbtn"><h1>-mine</h1></button>
            <div class="panel">
                <p><strong>-mine</strong></p>
                <p>You mine a nearby stone,</p>
                <p>and gain a random amount of <strong>stone</strong> and <strong>metal</strong>.</p>
                <p>Stone and metal can be used to get <strong>Gold </strong> or for <strong>Crafting</strong>/<strong>Reforge</strong></p>
            </div>
            
            <button class="accordion" id="textbtn"><h1>-prefix</h1></button>
            <div class="panel">
                <p><strong>-prefix &lt;prefix&gt;</strong></p>
                <p>Set a custom prefix for solyx!</p>
            </div>
            
            <button class="accordion" id="textbtn"><h1>-profile</h1></button>
            <div class="panel">
                <p><strong>-profile</strong></p>
                <p>Shows your own profile card!</p>
                <p>or</p>
                <p><strong>-profile @user</strong></p>
                <p>Shows @users profile card!</p>
            </div>
            
            <button class="accordion" id="textbtn"><h1>-rank</h1></button>
            <div class="panel">
                <p><strong>-rank</strong></p>
                <p>Shows your own rank card!</p>
                <p>or</p>
                <p><strong>-rank @user</strong></p>
                <p>Shows @users rank card!</p>
            </div>
        </div>
    </div>
</section>

<script>

    var acc = document.getElementsByClassName("accordion");
    var i;

    for (i = 0; i < acc.length; i++) {
        acc[i].addEventListener("click", function() {
        this.classList.toggle("active");
        var panel = this.nextElementSibling;

        if (panel.style.maxHeight) {
        panel.style.maxHeight = null;
        } else {
        panel.style.maxHeight = panel.scrollHeight + "px";
        } 
    });
    }
</script>
<?php
    include_once 'footer.php';
    ?>