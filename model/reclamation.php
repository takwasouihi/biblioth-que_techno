<?php
class reclamation {

    private $idr;
    private $sujet;
    private $comment;
    private $id;

        public function __construct($sujet,$comment)
             {   $this->sujet = $sujet;
                 $this->comment = $comment;
        
              }

      public function getIdr()
        {
            return $this->idr;
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

        public function setIdr($idr)
        {
            $this->idr = $idr;
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