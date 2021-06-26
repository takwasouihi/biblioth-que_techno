<?php
	class forum{
	private $idForum;
	private $nomForum;
	private $contenu;
	private $typpe;
    
	
    public function __construct(string $nomForum,string $contenu,string $typpe)
	{
		
		$this->nomForum = $nomForum;
		$this->contenu = $contenu;
		$this->typpe= $typpe;
	}
	
	public function getIdForum()
        {
            return $this->idForum;
        }
		
	    public function getNomForum()
        {
            return $this->nomForum;
        }
		
		 public function getcontenu()
        {
            return $this->contenu;
        }
		
		 public function getTyppe()
        {
            return $this->typpe;
        }
		
		 public function setIdForum($idForum)
        {
            $this->idForum = $idForum;
        }
    
    
        public function setNomForum($nomForum)
        {
            $this->nomForum = $nomForum;
        }
		
		 public function setContenu($contenu)
        {
            $this->contenu = $contenu;
        }
    
    
        public function setTyppe($typpe)
        {
            $this->typpe = $typpe;
        }
    }

?>