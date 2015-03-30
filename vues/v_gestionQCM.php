<section>

			<div class="col-md-10 col-md-offset-1">
				<table class="table table-bordered table-striped text-center">
					<tr>
						<th class="text-center" width="20%">THEME</th>
						<th class="text-center" width="20%">NOM DU QCM</th>
						<th class="text-center" width="40%">ACTIONS</th>
					</tr>
                                            <?php
                                                foreach($lesQCM as $unQCM)
                                                {
                                                ?>
                                                <tr>
                                                    <?php 
                                                    if(isset($_GET["modif"]) && $unQCM['idQCM'] == $_GET["modif"])
                                                    {
                                                        ?>
                                                        <form method="POST" action="index.php?uc=gestionQCM">
                                                            <input type="text" id='masque' name="idQCM" class="form-control" value="<?php echo $unQCM['idQCM']; ?>">
                                                            <td>
                                                                <select class="form-control" name="theme">
                                                                    <?php foreach ($lesThemes as $unTheme): ?>
                                                                        <?php if($unTheme['idTheme']==$unQCM['idTheme']) : ?>
                                                                    <option selected value="<?php echo $unTheme['idTheme']; ?>"><?php echo $unTheme['libelleTheme']; ?></option>
                                                                        <?php else: ?>
                                                                            <option  value="<?php echo $unTheme['idTheme']; ?>"><?php echo $unTheme['libelleTheme']; ?></option>
                                                                        <?php endif; ?>    
                                                                    <?php endforeach; ?>                                                
                                                            </td>
                                                            <td><input type="text" name="libelle" class="form-control" value="<?php echo $unQCM['libelleQCM']; ?>"> </td>
                                                            <td>
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                            <button type="submit" name="modif" class="btn btn-primary btn-block">VALIDER</button>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                            <button type="submit" name="annuler" class="btn btn-danger btn-block">ANNULER</button>
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
                                                        <td><?php echo $unQCM['libelleQCM']; ?></td>
                                                        <td>
                                                            <div class="row">
                                                                    <div class="col-md-6">
                                                                            <a href='index.php?uc=gestionQCM&modif=<?php echo $unQCM['idQCM']; ?>' class="btn btn-default btn-block col-md-6">MODIFIER</a>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                            <a href='index.php?uc=gestionQCM&sup=<?php echo $unQCM['idQCM']; ?>' class="btn btn-danger btn-block col-md-6" onclick="return confirm('Voulez vraiment supprimer');">SUPPRIMER</a>
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
						<form method="POST" action="index.php?uc=gestionQCM">
                           
							<td><input type="text" class="form-control" id="inputMot" name="libelleTheme" placeholder="NOM THEME"></td>
							<td><input type="text" class="form-control" id="inputPoint" name="libelle" placeholder="NOM QCM"></td>
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