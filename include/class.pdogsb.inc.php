<?php
/** 
 * Classe d'accès aux données. 
 
 * Utilise les services de la classe PDO
 * pour l'application GSB
 * Les attributs sont tous statiques,
 * les 4 premiers pour la connexion
 * $monPdo de type PDO 
 * $monPdoGsb qui contiendra l'unique instance de la classe
 
 * @package default
 * @author Cheri Bibi
 * @version    1.0
 * @link       http://www.php.net/manual/fr/book.pdo.php
 */

class PdoGsb{   		
      	private static $serveur='sqlsrv:server=localhost';
      	private static $bdd='DataBase=MARGO';   		
      	private static $user='sa' ;    		
      	private static $mdp='sqlman' ;	
        private static $monPdo;
	private static $monPdoGsb=null;
/**
 * Constructeur privé, crée l'instance de PDO qui sera sollicitée
 * pour toutes les méthodes de la classe
 */				
	private function __construct(){
    	PdoGsb::$monPdo = new PDO(PdoGsb::$serveur.';'.PdoGsb::$bdd, PdoGsb::$user, PdoGsb::$mdp); 
		PdoGsb::$monPdo->query("SET CHARACTER SET utf8");
	}
	public function _destruct(){
		PdoGsb::$monPdo = null;
	}
/**
 * Fonction statique qui crée l'unique instance de la classe
 
 * Appel : $instancePdoGsb = PdoGsb::getPdoGsb();
 
 * @return l'unique objet de la classe PdoGsb
 */
	public  static function getPdoGsb(){
		if(PdoGsb::$monPdoGsb==null){
			PdoGsb::$monPdoGsb= new PdoGsb();
		}
		return PdoGsb::$monPdoGsb;  
	}
        
        public function afficherThemes()
        {
            $res = PdoGsb::$monPdo->prepare
                    ("SELECT idTheme, nomTheme, dureeTheme, COUNT(idMot) AS nbMots "
                    . "FROM THEMES T "
                    . "LEFT JOIN MOTS M "
                    . "ON T.idTheme = M.idThemeMot "
                    . "GROUP BY idTheme, nomTheme, dureeTheme "
                    );
            $res->execute();
            $lesLignes = $res->fetchAll();
            return $lesLignes;
            
        }
        
        public function modifierThemesNom($idTheme,$nomTheme)
        {
            $res = PdoGsb::$monPdo->prepare
                    ("UPDATE THEMES "
                    . "SET nomTheme = :nomTheme "
                    . "WHERE idTheme = :idTheme ");
            $res->bindValue('idTheme', $idTheme);
            $res->bindValue('nomTheme', $nomTheme);
            $res->execute();
        }
         public function modifierThemesDuree($idTheme,$dureeTheme)
        {
            $res = PdoGsb::$monPdo->prepare
                    ("UPDATE THEMES "
                    . "SET dureeTheme = :dureeTheme "
                    . "WHERE idTheme = :idTheme ");
            $res->bindValue('idTheme', $idTheme);
            $res->bindValue('dureeTheme', $dureeTheme);
            $res->execute();
        }
        
        public function ajouterThemes($nomTheme,$dureeTheme)
        {
            $res = PdoGsb::$monPdo->prepare
                    ("INSERT INTO THEMES "
                    . "VALUES(:nomTheme,:dureeTheme) ");
            $res->bindValue('nomTheme', $nomTheme);
            $res->bindValue('dureeTheme', $dureeTheme);
            $res->execute();
        }
        
        public function supprimerThemes($idTheme)
        {
            $res = PdoGsb::$monPdo->prepare
                    ("DELETE MOTS WHERE idThemeMot = :idThemeMot ");
            $res->bindValue('idThemeMot', $idTheme);
            $res->execute();
            $res1 = PdoGsb::$monPdo->prepare
                    ("DELETE THEMES WHERE idTheme = :idTheme ");
            $res1->bindValue('idTheme', $idTheme);
            $res1->execute();
        }
        
        public function afficherMots($idTheme)
        {
            $res = PdoGsb::$monPdo->prepare("SELECT * FROM MOTS WHERE idThemeMot = :idTheme");
            $res->bindValue('idTheme', $idTheme);
            $res->execute();
            $ligne = $res->fetchAll();
            return $ligne;
        }

        public function modifierMots($idMot,$contenuMot,$nbPointsMot,$dureeMot)
        {
            $res = PdoGsb::$monPdo->prepare
                    ("UPDATE MOTS "
                    . "SET contenuMot = :contenuMot, "
                    . "nbPointsMot = :nbPointsMot, "
                    . "dureeMot = :dureeMot "
                    . "WHERE idMot = :idMot ");
            $res->bindValue('idMot', $idMot);
            $res->bindValue('contenuMot', $contenuMot);
            $res->bindValue('nbPointsMot', $nbPointsMot);
            $res->bindValue('dureeMot', $dureeMot);
            $res->execute();
        }
        
        public function ajouterMots($contenuMot,$nbPointsMot,$idThemeMot,$dureeMot)
        {
            $res = PdoGsb::$monPdo->prepare
                    ("INSERT INTO MOTS "
                    . "VALUES(:contenuMot,:nbPointsMot,:idThemeMot,:dureeMot) ");
            $res->bindValue('contenuMot', $contenuMot);
            $res->bindValue('nbPointsMot', $nbPointsMot);
            $res->bindValue('idThemeMot', $idThemeMot);
            $res->bindValue('dureeMot', $dureeMot);
            $res->execute();
        }
        
        public function supprimerMots($idMot)
        {
            $res = PdoGsb::$monPdo->prepare
                    ("DELETE MOTS WHERE idMot = :idMot ");
            $res->bindValue('idMot', $idMot);
            $res->execute();
        }
}
?>