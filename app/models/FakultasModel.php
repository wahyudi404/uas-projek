<?php

class FakultasModel extends Database {
    private $table = 'fakultas';

    public function getAll()
    {
        $this->query('SELECT * FROM ' . $this->table);
        return $this->resultAll();
    }

    public function addFakultas($data)
    {
        $nama_fakultas = $data['nama_fakultas'];
        $query = "INSERT INTO " . $this->table . " VALUES ('', :nama_fakultas)";
        $this->query($query);
        $this->bind('nama_fakultas', $nama_fakultas);
        $this->execute();
        return $this->getRowCount();
    }

    public function updateFakultas($id, $data)
    {
        $id = $id;
        $nama_fakultas = $data['nama_fakultas'];
        
        $query = "UPDATE " . $this->table . " SET nama_fakultas=:nama_fakultas WHERE id=:id";
        $this->query($query);
        $this->bind('id', $id);
        $this->bind('nama_fakultas', $nama_fakultas);
        $this->execute();
        return $this->getRowCount();
    }

    public function deleteFakultas($id)
    {
        $id = $id;
        $query = "DELETE FROM " . $this->table . " WHERE id=:id";
        
        $this->query($query);
        $this->bind('id', $id);
        $this->execute();
        return $this->getRowCount();
    }
}