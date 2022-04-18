<?php
    include_once 'header.php';
    include_once 'head.php';
    ?>

<section class="contact-section">
    <div class="contact">
        <form action="contact_mail.php" method="POST" class="contact-wrapper" id="contact-form">
            <h1>Contact Us.</h1> 

            <div class="input-grid">
                <div class="contact-name">
                    <p>Name</p>
                    <input class="name-input" type="name" name="name">
                </div>   
                <div class="contact-email">
                    <p>Email</p>
                    <input class="email-input" type="email" name="email">
                </div> 
            </div>
            <div class="contact-message">
                <p>Message</p>
                <textarea rows="5" class="message-input" name="message" cols="30"></textarea>
            </div>
            <Input type="submit" name="submit" value="Submit" class="button"/>
        </form>
    </div>
</section>


<?php
    include_once 'footer.php';
    ?>