<section>

			<div class="col-md-10 col-md-offset-1">
				<table class="table table-bordered table-striped text-center">
					<tr>
						<th class="text-center" width="50%">Libelle</th>
						<th class="text-center" width="50%">ACTIONS</th>
					</tr>
                                            <?php
                                                foreach($lesQCM as $unQCM)
                                                {
                                                ?>
                                                <tr>
                                                    <?php 
                                                    if(isset($_GET["modif"]) && $unQCM['idTheme'] == $_GET["modif"])
                                                    {
                                                        ?>
                                                        <form method="POST" action="index.php?uc=gestionTheme">
                                                            <input type="text" id='masque' name="idQCM" class="form-control" value="<?php echo $unQCM['idTheme']; ?>">
                                                            <td><input type="text" name="libelle" class="form-control" value="<?php echo $unQCM['libelleTheme']; ?>"> </td>
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
                                                        <td><?php echo $unQCM['libelleTheme']; ?></td>
                                                        <td>
                                                            <div class="row">
                                                                    <div class="col-md-6">
                                                                            <a href='index.php?uc=gestionTheme&modif=<?php echo $unQCM['idTheme']; ?>' class="btn btn-default btn-block col-md-6">MODIFIER</a>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                            <a href='index.php?uc=gestionTheme&sup=<?php echo $unQCM['idTheme']; ?>' class="btn btn-danger btn-block col-md-6" onclick="return confirm('Voulez vraiment supprimer');">SUPPRIMER</a>
                                                                    </div>
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
						<form method="POST" action="index.php?uc=gestionTheme">
                           
							<td><input type="text" class="form-control" id="inputMot" name="libelleTheme" placeholder="NOM THEME"></td>
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