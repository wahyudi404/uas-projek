<?php

class ProgramStudiModel extends Database {
    
    private $table = 'program_studies';

    public function getAll()
    {
        $query = "SELECT ps.*, f.nama_fakultas FROM " . $this->table . " ps LEFT JOIN fakultas f ON ps.fakultas_id = f.id ORDER By f.nama_fakultas";
        $this->query($query);
        return $this->resultAll();
    }
    
    public function getByFakultasId($fakultas_id)
    {
        $query = "SELECT ps.*, f.nama_fakultas FROM " . $this->table . " 
        ps LEFT JOIN fakultas f ON ps.fakultas_id = f.id 
        WHERE fakultas_id=:fakultas_id
        ";
        $this->query($query);
        $this->bind('fakultas_id', $fakultas_id);
        return $this->resultAll();
    }

    public function insertProgramStudi($data)
    {
        $fakultas_id = $data['fakultas_id'];
        $program_studi = $data['program_studi'];

        $query = "INSERT INTO " . $this->table . " VALUES ('', :fakultas_id, :program_studi)";
        $this->query($query);
        $this->bind('fakultas_id', $fakultas_id);
        $this->bind('program_studi', $program_studi);
        $this->execute();
        return $this->getRowCount();
    }

    public function updateProgramStudi($id, $data)
    {
        $id = $id;
        $fakultas_id = $data['fakultas_id'];
        $program_studi = $data['program_studi'];

        $query = "UPDATE " . $this->table . " SET fakultas_id=:fakultas_id, program_studi=:program_studi WHERE id=:id";
        $this->query($query);
        $this->bind('id', $id);
        $this->bind('fakultas_id', $fakultas_id);
        $this->bind('program_studi', $program_studi);
        $this->execute();
        return $this->getRowCount();
    }

    public function deleteProgramStudi($id)
    {
        $id = $id;
        $query = "DELETE FROM " . $this->table . " WHERE id=:id";
        $this->query($query);
        $this->bind('id', $id);
        $this->execute();
        return $this->getRowCount();
    }
}