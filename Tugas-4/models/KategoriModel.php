
<?php
/*
Filename : KategoriModel.php
Tools : SimplePHPBot
Author : Freddy Wicaksono, M.Kom
*/
include_once('../db/database.php');

class KategoriModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function addKategori($kode,$nama)
    {
        $sql = "INSERT INTO kategori (kode, nama) VALUES (:kode,:nama)";
        $params = array(
          ":kode" => $kode,
          ":nama" => $nama);


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

    public function getKategori($id)
    {
        $sql = "SELECT * FROM kategori WHERE id = :id";
        $params = array(":id" => $id);

        return $this->db->executeQuery($sql, $params)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function updateKategori($id,$kode,$nama)
    {
        $sql = "UPDATE kategori SET kode = :kode, nama = :nama WHERE id = :id";
        $params = array(
          ":kode" => $kode,
          ":nama" => $nama,
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
    

    public function deleteKategori($id)
    {
        $sql = "DELETE FROM kategori WHERE id = :id";
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

    public function getKategoriList()
    {
        $sql = 'SELECT * FROM kategori';
        return $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getDataCombo()
    {
        $sql = 'SELECT * FROM kategori';
        $data = array();
        $data = $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        header('Content-Type: application/json');
        echo json_encode($data);
    }
}

