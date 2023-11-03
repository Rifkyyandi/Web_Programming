
<?php
/*
Filename : AnggotaModel.php
Tools : SimplePHPBot
Author : Freddy Wicaksono, M.Kom
*/
include_once('../db/database.php');

class AnggotaModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function addAnggota($kelompok,$nama,$nomor_anggota)
    {
        $sql = "INSERT INTO anggota (kelompok, nama, nomor_anggota) VALUES (:kelompok,:nama,:nomor_anggota)";
        $params = array(
          ":kelompok" => $kelompok,
          ":nama" => $nama,
          ":nomor_anggota" => $nomor_anggota);

        $result= $this->db->executeQuery($sql, $params);
        // Check if the insert was successful
        if ($result) {
            $response = array(
                "success" => true,
                "message" => "Insert successful"
            );
        } else {
            $response = array(
                "success" => false,
                "message" => "Insert failed"
            );
        }
    
        // Return the response as JSON
        return json_encode($response);
    }

    public function getAnggota($id)
    {
        $sql = "SELECT * FROM anggota WHERE id = :id";
        $params = array(":id" => $id);

        return $this->db->executeQuery($sql, $params)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function updateAnggota($id,$kelompok,$nama,$nomor_anggota)
    {
        $sql = "UPDATE anggota SET kelompok = :kelompok, nama = :nama, nomor_anggota = :nomor_anggota WHERE id = :id";
        $params = array(
          ":kelompok" => $kelompok,
          ":nama" => $nama,
          ":nomor_anggota" => $nomor_anggota,
          ":id" => $id
        );
    
        // Execute the query
        $result = $this->db->executeQuery($sql, $params);
    
        // Check if the update was successful
        if ($result) {
            $response = array(
                "success" => true,
                "message" => "Update successful"
            );
        } else {
            $response = array(
                "success" => false,
                "message" => "Update failed"
            );
        }
    
        // Return the response as JSON
        return json_encode($response);
    }
    

    public function deleteAnggota($id)
    {
        $sql = "DELETE FROM anggota WHERE id = :id";
        $params = array(":id" => $id);

        $result = $this->db->executeQuery($sql, $params);
        // Check if the delete was successful
        if ($result) {
            $response = array(
                "success" => true,
                "message" => "Delete successful"
            );
        } else {
            $response = array(
                "success" => false,
                "message" => "Delete failed"
            );
        }
    
        // Return the response as JSON
        return json_encode($response);
    }

    public function getAnggotaList()
    {
        $sql = 'SELECT * FROM anggota';
        return $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getDataCombo()
    {
        $sql = 'SELECT * FROM anggota';
        $data = array();
        $data = $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        header('Content-Type: application/json');
        echo json_encode($data);
    }
}

