<?php

class UsersModel
{
  

    public function __construct()
    {
        $this->db = new DB();
    }

    public function getAll()
    {
        $this->db->query("SELECT * FROM users");
        return $this->db->all();
    }

    public function add($data){
            $uniq=strtoupper(uniqid());
            $data->reference = $uniq;
            $this->db->query("INSERT INTO users SET nom = :nom, prenom = :prenom, age = :age, telephone = :telephone, cin = :cin , reference = :reference");
            $this->db->bind(':nom', $data->nom);
            $this->db->bind(':prenom', $data->prenom);
            $this->db->bind(':age', $data->age);
            $this->db->bind(':telephone', $data->telephone);
            $this->db->bind(':cin', $data->cin);
            $this->db->bind(':reference',$data->reference);
            if($this->db->execute()){
                return $data;
             }else{
                return false;
            }


     
    }
    
    public function getUserByRef($reference)
    {
        $this->db->query("SELECT * FROM users WHERE reference = :reference");
        $this->db->bind(':reference', $reference);
        return $this->db->single();
    }




    
   
}
