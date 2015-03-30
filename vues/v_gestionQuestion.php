<section>

			<div class="col-md-10 col-md-offset-1">
				<table class="table table-bordered table-striped text-center">
					<tr>
						<th class="text-center" width="20%">QUESTION</th>
						<th class="text-center" width="20%">REPONSE</th>
                                                <th class="text-center" width="20%">REPONSE</th>
                                                <th class="text-center" width="20%">REPONSE</th>
						<th class="text-center" width="20%">ACTIONS</th>
					</tr>
                                            <?php
                                                foreach($lesQuestion as $uneQuestion)
                                                {
                                                ?>
                                                <tr>
                                                    <?php 
                                                    if(isset($_GET["modif"]) && $uneQuestion['idQuestion'] == $_GET["modif"])
                                                    {
                                                        ?>
                                                        <form method="POST" action="index.php?uc=gestionMots">
                                                            <input type="text" name="libelle" class="form-control" value="<?php echo $uneQuestion['libelle']; ?>">
                                                            <?php foreach ($uneQuestion['lesReponse'] as $uneReponse): ?>
                                                            <td><input type="text" name="libelle" class="form-control" value="<?php echo $uneReponse['libelle']; ?>"> </td>
                                                            <?php endforeach; ?>
                                                            <td><button type="submit" name="modif" class="btn btn-primary btn-block">VALIDER</button></td>
                                                            <td>
                                                                <div class="row">
                                                                    <div class="col-md-6 col-md-offset-3">
                                                                            <button type="submit" name="modif" class="btn btn-primary btn-block">VALIDER</button>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </form>
                                                        <?php
                                                    }
                                                    else
                                                    {
                                                        ?>
                                                        <td><?php echo $uneQuestion['libelle']; ?></td>
                                                        <?php foreach ($uneQuestion['lesReponse'] as $uneReponse): ?>
                                                            <td><?php echo $uneReponse['libelle']; ?></td>
                                                        <?php endforeach; ?>
                                                        <td>
                                                            <div class="col-md-12">
                                                                    <a href='index.php?uc=gestionQCM&modif=<?php echo $uneQuestion['idQuestion']; ?>' class="btn btn-default btn-block col-md-6">MODIFIER</a>
                                                            </div>
                                                            <div class="col-md-12">
                                                                    <a href='index.php?uc=gestionQCM&sup=<?php echo $uneQuestion['idQuestion']; ?>' class="btn btn-danger btn-block col-md-6" onclick="return confirm('Voulez vraiment supprimer');">SUPPRIMER</a>
                                                            </div>
                                                        </td>
                                                        <?php 
                                                    }
                                                    ?>
                                                </tr>
                                            <?php
                                        }
                                        ?>
					<tr>
						<form method="POST" action="index.php?uc=gestionQuestion">
                           
							<td><input type="text" class="form-control" id="inputMot" name="libelle" placeholder="QUESTION"></td>
							<td><input type="text" class="form-control" id="inputPoint" name="reponse" placeholder="REPONSE 1"></td>
                                                        <td><input type="text" class="form-control" id="inputPoint" name="reponse" placeholder="REPONSE 2"></td>
                                                        <td><input type="text" class="form-control" id="inputPoint" name="reponse" placeholder="REPONSE 3"></td>
							<td>
								<div class="row">
                                                                    <div class="col-md-6 col-md-offset-3">
                                                                        <button type="submit" class="btn btn-default btn-block" name="ajouter">AJOUTER</button>
                                                                    </div>
								</div>
							</td>
						</form>
					</tr>
				</table>
			</div>
<!--            <div class="col-md-3 col-md-offset-1">
                <a href='index.php' class="btn btn-default btn-block">LISTE DES THEMES</a>
            </div>-->

	</section>