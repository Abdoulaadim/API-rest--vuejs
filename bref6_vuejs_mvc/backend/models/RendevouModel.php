<?php

class RendevouModel
{


    public function __construct()
    {
        $this->db = new DB();
    }

    public function creneau( $Date)
    {
        $this->db->query("SELECT * FROM creneau WHERE  Num_creneau NOT IN(SELECT c.Num_creneau FROM creneau c, rdv r where c.Num_creneau=r.Num_creneau AND r.Date= :Date)");
        $this->db->bind(':Date', $Date);
        return $this->db->all();
    }

    public function add($data){
        
        $this->db->query("INSERT INTO rdv SET reference = :reference, Motif = :Motif, Date = :Date, Num_creneau = :Num_creneau ");
        $this->db->bind(':reference', $data->reference);
        $this->db->bind(':Motif', $data->Motif);
        $this->db->bind(':Date', $data->Date);
        $this->db->bind(':Num_creneau', $data->Num_creneau);
        if($this->db->execute()){
            return true;
         }else{
            return false;
    }
    }

    
    public function allrendevou($reference)
    {
        $this->db->query("SELECT * from rdv r, creneau c  where r.reference = :reference AND c.Num_creneau=r.Num_creneau");
        $this->db->bind(':reference', $reference);
        return $this->db->all();;
    }
    public function delete($data)
    {
        $this->db->query('DELETE FROM rdv WHERE Id_rdv=:Id_rdv');
        $this->db->bind(':Id_rdv', $data->Id_rdv);
        $this->db->execute();
    }


 


}
