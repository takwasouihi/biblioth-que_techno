<?PHP
               
    class Participant{
        private  $Idparticipant;
        private  $Idevenement;
        private  $nom;
        private  $prenom;
private  $email;


        
        
        function __construct($Idparticipant,$Idevenement,$nom,$prenom,$email){
            
            $this->Idparticipant=$Idparticipant;
            $this->Idevenement=$Idevenement;
            $this->nom=$nom;
            $this->prenom=$prenom;
$this->email=$email;

            
        }
        
      function getIdparticipant() {
            return $this->Idparticipant;
        }
       function getIdevenement() {
            return $this->Idevenement;
        }
        function getnom() {
            return $this->nom;
        }
         function getprenom() {
            return $this->prenom;
        }
 function getemail() {
            return $this->email;
        }

        

        
       function setIdparticipant($Idparticipant) {
            $this->Idparticipant=$Idparticipant;
        }
       function setIdevenement($Idevenement) {
            $this->Idevenement=$Idevenement;
        }
       function setnom($nom) {
            $this->nom=$nom;
        }
       function setprenom($prenom) {
            $this->prenom=$prenom;
        }
function setemail($email) {
            $this->email=$email;
        }

        
    }
?>