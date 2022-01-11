<?php

/**
 * @file      register.php
 * @brief     File description
 * @author    Created by Florian.DURUZ
 * @version   11.01.2022
 */

$title = 'Register';

ob_start();
?>

    <!-- Title Page -->
    <section class="bg-title-page p-t-50 p-b-40 flex-col-c-m" style="background-image: url(view/content/images/home_slide_2.jpg);">
        <h2 class="l-text2 t-center">
            Enregistrez-vous
        </h2>
    </section>

    <section class="bgwhite p-t-66 p-b-60">
        <div class="container">
            <div class="row">

                <div class="col-md-12 p-b-30">
                    <form class="leave-comment" action="index.php?action=register" method="post">

                        <h4> <?php if (isset($errorMsgRegister)) { echo $errorMsgRegister; }  ?> <br> </h4>

                        <div class="bo4 of-hidden size15 m-b-20">
                            <input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="email" placeholder="Adresse email">
                        </div>

                        <div class="bo4 of-hidden size15 m-b-20">
                            <input class="sizefull s-text7 p-l-22 p-r-22" type="password" name="userPswd" placeholder="Mot de passe">
                        </div>

                        <div class="bo4 of-hidden size15 m-b-20">
                            <input class="sizefull s-text7 p-l-22 p-r-22" type="password" name="userPswd2" placeholder="Vérification mot de passe">
                        </div>

                        <p>En soumettant votre demande de compte, vous validez les <a href="https://www.codeur.com/blog/cgu-site-internet/">conditions générales d'utilisation </a>.</p>
                        <br>

                        <input type="submit" value="S'enregistrer" class="flex-c-m size2 bg4 bo-rad-23 hov1 m-text3 trans-0-4"><br>
                        <input type="reset" value="Annuler" class="flex-c-m size2 bg4 bo-rad-23 hov1 m-text3 trans-0-4">

                        <br>
                        <p>Déjà membre ? <a href="index.php?action=login">Login</a>.</p>

                    </form>
                </div>
            </div>
        </div>
    </section>

<?php
$content = ob_get_clean();
require 'gabarit.php';
?>