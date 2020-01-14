<?php 
    require "./inc/header.php"
?>
<main>
    <div>
        <section>
            <h1>Signup</h1>
            <form action=".inc/signup.inc.php" method="POST">
                <input type="text" name="uid" placeholder="Username">
                <input type="email" name="mail" placeholder="E-mail">
                <input type="password" name="pwd" placeholder="password">
                <input type="password" name="pwd-repeat" placeholder="">
                <button type="submit" name="signup-submit">Signup</button>
            </form>
        </section>
    </div>
</main>
    



<?php
    require "./inc/hfooter.php"
?>