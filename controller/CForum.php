<?php
	

	class CForum {
		
		function ajouterforumC($forum){
			$sql="INSERT INTO forum (idForum, nomForum, typpe, contenu)
			VALUES (:idForum,:nomForum,:typpe,:contenu)";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
			
				$query->execute([
					'idForum' => $forum->getIdForum(),
					'nomForum' => $forum->getNomForum(),
					'typpe' => $forum->getTyppe(),
					'contenu'=>$forum->getContenu()
					
				]);			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		}
		
		function afficherForumWithID($idForum){
			$sql = "SELECT * FROM forum where idForum= :idForum";
			$db = config::getConnexion();
			$query = $db->prepare($sql);
			$query->bindvalue(':idForum',$id );
			try {  $query->execute();
				$liste = $query->fetchAll();
			return $liste;
			}
			catch (Exception $e)
			{die ('Erreur:'.$e->getMessage());}
		}
	
		function afficherForum(){
			$sql = "SELECT * FROM forum";
			$db = config::getConnexion();
			try { $liste = $db->query($sql);
			return $liste;
			}
			catch (Exception $e)
			{die ('Erreur:'.$e->getMessage());}
		}

		function afficherForumAutres(){
			$sql = "SELECT * FROM forum WHERE typpe='Autres'";
			$db = config::getConnexion();
			try { $liste = $db->query($sql);
			return $liste;
			}
			catch (Exception $e)
			{die ('Erreur:'.$e->getMessage());}
		}

		function afficherForumLivres(){
			$sql = "SELECT * FROM forum WHERE typpe='Livres'";
			$db = config::getConnexion();
			try { $liste = $db->query($sql);
			return $liste;
			}
			catch (Exception $e)
			{die ('Erreur:'.$e->getMessage());}
		}

		function afficherForumExamens(){
			$sql = "SELECT * FROM forum WHERE typpe='Examens'";
			$db = config::getConnexion();
			try { $liste = $db->query($sql);
			return $liste;
			}
			catch (Exception $e)
			{die ('Erreur:'.$e->getMessage());}
		}

		function afficherForumInfo(){
			$sql = "SELECT * FROM forum WHERE typpe='Informatique'";
			$db = config::getConnexion();
			try { $liste = $db->query($sql);
			return $liste;
			}
			catch (Exception $e)
			{die ('Erreur:'.$e->getMessage());}
		}

		function afficherForumRevision(){
			$sql = "SELECT * FROM forum WHERE typpe='Revisions'";
			$db = config::getConnexion();
			try { $liste = $db->query($sql);
			return $liste;
			}
			catch (Exception $e)
			{die ('Erreur:'.$e->getMessage());}
		}

		function SupprimerForum($idForum)
		{ $sql = "DELETE FROM forum WHERE idForum= :idForum";
			$db= config::getConnexion();
			$query = $db->prepare($sql);
			$query->bindvalue(':idForum',$idForum);
			try {
				$query->execute();
			} catch (Exception $e)
			{ die ('Erreur:'.$e->getMessage());}
		}
	

		function findForum($idForum){
			$sql = "SELECT * FROM forum where idForum= :idForum";
			$db = config::getConnexion();
			$query = $db->prepare($sql);
			$query->bindvalue(':idForum',$idForum );
			try {  $query->execute();
				$liste = $query->fetchAll();
			return $liste;
			}
			catch (Exception $e)
			{die ('Erreur:'.$e->getMessage());}
		}

		function getAllForum(){
			$conn = config::getConnexion();
			$sql = "SELECT * FROM forum";
		
			try {
				$result=$conn->query($sql);
				$rows = $result->fetchAll(PDO::FETCH_ASSOC);
				return $rows;
				if(!empty($rows)){
					return $rows[0];
				}
				
			} catch (PDOException $e) {
				die('Erreur: '.$e->getMessage());
			}
		}
		function updateForum($forum , $idForum)
		{
			$sql="UPDATE forum  SET nomForum= :nomForum,contenu= :contenu,typpe= :typpe WHERE idForum = :idForum";
			$db= config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$test=$query->execute([
				 'idForum'=>$forum->getIdForum(),
				 'nomForum'=>$forum->getNomForum(),
				 'contenu'=>$forum->getContenu(),
				 'typpe'=>$forum->getTyppe(),

				 'idForum'=>$idForum,
				]);
			} catch (Exception $e){
				echo 'error: '.$e->getMessage();
			}
		   
		}
		
		 function rechercherForum($valueToSearch){
        $query = "SELECT * FROM `forum` WHERE CONCAT(`idForum`, `nomForum`, `Contenu`, `typpe` ) LIKE '%".$valueToSearch."%'";
        $db= config::getConnexion();
        try { 
            $liste = $db->query($query);
        return $liste;
        }
        catch (Exception $e)
        {die ('Erreur:'.$e->getMessage());}}


		function tridscu(){
			$query = "SELECT * FROM `forum` ORDER BY `typpe` DESC";
			$db= config::getConnexion();
			try { 
				$liste = $db->query($query);
			return $liste;
			}
			catch (Exception $e)
			{die ('Erreur:'.$e->getMessage());}
		}
	
		function triascu(){
			$query = "SELECT * FROM `forum` ORDER BY `typpe` ASC";
			$db= config::getConnexion();
			try { 
				$liste = $db->query($query);
			return $liste;
			}
			catch (Exception $e)
			{die ('Erreur:'.$e->getMessage());}
		}
    }
		
		
	

?>