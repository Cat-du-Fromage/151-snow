<?php

/**
 * @file      login.php
 * @brief     File description
 * @author    Created by Florian.DURUZ
 * @version   16.11.2021
 */
ob_start();
$title = "SnowPoint . Login";
?>
<!-- content page -->
	<section class="bgwhite p-t-66 p-b-60">
		<div class="container">
			<div class="row">

				<div class="col-md-12 p-b-30">

                    <h4 class="m-text26 p-b-36 p-t-15"> <?php if(isset($errorMsg)) echo $errorMsg; ?> </h4>

					<form class="leave-comment" action = "index.php?action=login" method="post"> <!--"method = post" means nothing is conserved in the URL-->
						<h4 class="m-text26 p-b-36 p-t-15">
                            Connectez-vous
						</h4>

						<div class="bo4 of-hidden size15 m-b-20">
							<input class="sizefull s-text7 p-l-22 p-r-22" type="email" name="email" placeholder="Adresse email" required>
						</div>

						<div class="bo4 of-hidden size15 m-b-20">
							<input class="sizefull s-text7 p-l-22 p-r-22" type="password" name="userPswd" placeholder="Mot de passe" required>
						</div>
						<input type="submit" value="login" class="flex-c-m size2 bg4 bo-rad-23 hov1 m-text3 trans-0-4"><br>
						<input type="reset" value="Annuler" class="flex-c-m size2 bg4 bo-rad-23 hov1 m-text3 trans-0-4">

					</form>
				</div>
			</div>
		</div>
	</section>
<?php
$content = ob_get_clean();
require 'gabarit.php';
?>