
<?php
/*
Filename : Kategori.php
Tools : SimplePHPBot
Author : Freddy Wicaksono, M.Kom
*/
include_once('../models/KategoriModel.php');

class KategoriController
{
    private $model;

    public function __construct()
    {
        $this->model = new KategoriModel();
    }

    public function addKategori($kode,$nama)
    {
        return $this->model->addKategori($kode,$nama);
    }

    public function getKategori($id)
    {
        return $this->model->getKategori($id);
    }

    public function Show($id)
    {
        $rows = $this->model->getKategori($id);
        foreach($rows as $row){
            $val = $row['judul'];
        }
        return $val;
    }

    public function updateKategori($id,$kode,$nama)
    {
        return $this->model->updateKategori($id,$kode,$nama);
    }

    public function deleteKategori($id)
    {
        return $this->model->deleteKategori($id);
    }

    public function getKategoriList()
    {
        return $this->model->getKategoriList();
    }
    public function getDataCombo()
    {
        return $this->model->getDataCombo();
    }
}

