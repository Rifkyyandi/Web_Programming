
<?php
/*
Filename : BukuModel.php
Tools : SimplePHPBot
Author : Freddy Wicaksono, M.Kom
*/
include_once('../db/database.php');

class BukuModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function addBuku($kode_buku,$judul,$id_kategori,$pengarang)
    {
        $sql = "INSERT INTO buku (kode_buku, judul, id_kategori, pengarang) VALUES (:kode_buku,:judul,:id_kategori,:pengarang)";
        $params = array(
          ":kode_buku" => $kode_buku,
          ":judul" => $judul,
          ":id_kategori" => $id_kategori,
          ":pengarang" => $pengarang);

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

    public function getBuku($id)
    {
        $sql = "SELECT * FROM buku WHERE id = :id";
        $params = array(":id" => $id);

        return $this->db->executeQuery($sql, $params)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function updateBuku($id,$kode_buku,$judul,$id_kategori,$pengarang)
    {
        $sql = "UPDATE buku SET kode_buku = :kode_buku, judul = :judul, id_kategori = :id_kategori, pengarang = :pengarang WHERE id = :id";
        $params = array(
          ":kode_buku" => $kode_buku,
          ":judul" => $judul,
          ":id_kategori" => $id_kategori,
          ":pengarang" => $pengarang,
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
    

    public function deleteBuku($id)
    {
        $sql = "DELETE FROM buku WHERE id = :id";
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

    public function getBukuList()
    {
        $sql = 'SELECT * FROM buku';
        return $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getDataCombo()
    {
        $sql = 'SELECT * FROM buku';
        $data = array();
        $data = $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        header('Content-Type: application/json');
        echo json_encode($data);
    }
}

