<?php
class commentaire {

    private $idc;
    private $sujet;
    private $comment;
    private $idforum;

        public function __construct($sujet,$comment,$email,$idforum)
             { 
                 $this->sujet = $sujet;
                 $this->comment = $comment;
                 $this->email = $email;
                 $this->idforum = $idforum;
             }

      public function getIdc()
        {
            return $this->idc;
        }

        public function getidForum()
        {
            return $this->idforum;
        }

        public function getEmail()
        {
            return $this->email;
        }

        public function getSujet()
        {
            return $this->sujet;
        }
        public function getComment()
        {
            return $this->comment;
        }
        public function getId()
        {
            return $this->id;
        }

        public function setIdc($idr)
        {
            $this->idr = $idc;
        }  

        public function setIdForum($idforum)
        {
            $this->idforum = $idforum;
        }  

        public function setEmail($email)
        {
            $this->email = $email;
        }  

        public function setSujet($sujet)
        {
            $this->sujet = $sujet;
        }
        public function setComment($comment)
        {
            $this->comment = $comment;
        }
        public function setId($id)
        {
            $this->id = $id;
        }


    }
?> 