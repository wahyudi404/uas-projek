<?php

class UserModel extends Database
{

    private $table = 'users';

    public function getAll()
    {
        $query = "SELECT id, username, name FROM " . $this->table;
        $this->query($query);
        return $this->resultAll();
    }

    public function getCount()
    {
        $query = "SELECT COUNT(*) as jmlh FROM " . $this->table;

        $this->query($query);
        return $this->result();
    }

    public function getById($id)
    {
        $query = "SELECT * FROM " . $this->table . "WHERE id=:id";
        $this->query($query);
        $this->bind('id', $id);
        return $this->result();
    }

    public function created($data)
    {
        try {
            $username = $data['username'];
        $password = password_hash($data['password'], PASSWORD_DEFAULT);
        $name = $data['name'];

        $query = "INSERT INTO " . $this->table . " VALUES ('', :username, :password, :name)";

        $this->query($query);
        $this->bind('username', $username);
        $this->bind('password', $password);
        $this->bind('name', $name);
        $this->execute();
        return [
            'status' => $this->getRowCount(),
            'msg' => $this->getRowCount() ? 'Pengguna berhasil ditambah.' : 'Pengguna gagal ditambah.'
        ];
        } catch (Exception $e) {
            return [
                'status' => 0,
                'msg' => $e->getMessage()
            ];
        }
    }

    public function updated($id, $data)
    {
        try {
            $username = $data['username'];

            if (!empty($data['password'])) {
                $password = password_hash($data['password'], PASSWORD_DEFAULT);
            }

            $name = $data['name'];

            if (!empty($data['password'])) {
                $query = "UPDATE " . $this->table . " SET username=:username, password=:password, name=:name WHERE id=:id";
            } else {
                $query = "UPDATE " . $this->table . " SET username=:username, name=:name WHERE id=:id";
            }

            $this->query($query);
            $this->bind('id', $id);
            $this->bind('username', $username);

            if (!empty($data['password'])) {
                $this->bind('password', $password);
            }

            $this->bind('name', $name);
            $this->execute();
            return [
                'status' => $this->getRowCount(),
                'msg' => $this->getRowCount() ? 'Pengguna berhasil diperbarui.' : 'Pengguna gagal diperbarui.'
            ];
        } catch (Exception $e) {
            return [
                'status' => 0,
                'msg' => $e->getMessage()
            ];
        }
    }

    public function deleted($id)
    {
        $this->query("DELETE FROM " . $this->table . " WHERE id=:id");
        $this->bind('id', $id);
        $this->execute();
        return $this->getRowCount();
    }
}
