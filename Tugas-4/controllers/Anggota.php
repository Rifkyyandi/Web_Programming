
<?php
/*
Filename : Anggota.php
Tools : SimplePHPBot
Author : Freddy Wicaksono, M.Kom
*/
include_once('../models/AnggotaModel.php');

class AnggotaController
{
    private $model;

    public function __construct()
    {
        $this->model = new AnggotaModel();
    }

    public function addAnggota($kelompok,$nama,$nomor_anggota)
    {
        return $this->model->addAnggota($kelompok,$nama,$nomor_anggota);
    }

    public function getAnggota($id)
    {
        return $this->model->getAnggota($id);
    }

    public function Show($id)
    {
        $rows = $this->model->getAnggota($id);
        foreach($rows as $row){
            $val = $row['nama'];
        }
        return $val;
    }

    public function updateAnggota($id,$kelompok,$nama,$nomor_anggota)
    {
        return $this->model->updateAnggota($id,$kelompok,$nama,$nomor_anggota);
    }

    public function deleteAnggota($id)
    {
        return $this->model->deleteAnggota($id);
    }

    public function getAnggotaList()
    {
        return $this->model->getAnggotaList();
    }
    public function getDataCombo()
    {
        return $this->model->getDataCombo();
    }
}

