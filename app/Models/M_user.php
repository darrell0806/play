<?php

namespace App\Models;
use CodeIgniter\Model;

class M_user extends Model
{		
	protected $table      = 'user';
	protected $primaryKey = 'id_user';
	protected $allowedFields = ['nama','username', 'password', 'email', 'level', 'foto', 'kode', 'nama_ortu'];
	protected $useSoftDeletes = true;
	protected $useTimestamps = true;

	public function tampil($table1)	
	{
		return $this->db->table($table1)->get()->getResult();
	}

	public function qedit($table, $data, $where)
	{
		return $this->db->table($table)->update($data, $where);
	}
	public function join2($table1, $table2, $on)
	{
		return $this->db->table($table1)
		->join($table2, $on, 'left')
		->where('user.deleted_at', null)
		->orderBy('user.level', 'asc') 
		->get()
		->getResult();
	}
	public function join2WithExcludedLevel($table1, $table2, $on, $excludedLevel)
	{
		return $this->db->table($table1)
		->join($table2, $on, 'left')
		->where('user.deleted_at', null)
		->where('user.level !=', $excludedLevel)
		->orderBy('user.level', 'asc') 
		->get()
		->getResult();
	}

    public function join2WithExcludedLevels($table1, $table2, $on, $excludedLevels)
    {
        return $this->db->table($table1)
            ->join($table2, $on, 'left')
            ->where('user.deleted_at', null)
            ->whereNotIn('user.level', $excludedLevels)
            ->orderBy('user.level', 'asc') 
            ->get()
            ->getResult();
    }
    
	
    public function getById($id)
    {
        $data = $this->find($id);
        if (!$data) {
            throw new \Exception('Data not found');
        }
        return $data;
    }

    public function updatet($id, $data)
    {
        return $this->update($id, $data);
    }
    public function insertt($data, $photo)
    {
        if ($photo && $photo->isValid()) {
            $imageName = $photo->getRandomName();
            $photo->move(ROOTPATH . 'public/images', $imageName);
            $data['foto'] = $imageName;
        } else {
            $data['foto'] = 'default.png'; 
        }
        $data['password'] = md5($data['password']);
        
        // Cek session level
        $session = session();
        $sessionLevel = $session->get('level');
    
        // Jika session level adalah 2, set nilai level menjadi 3
        if ($sessionLevel == 2) {
            $data['level'] = 3;
        }
    
        return $this->insert($data);
    }
    
    public function updateP($id, $data, $photo)
    {
        $findd = $this->find($id);
        $currentImage = $findd['foto'];
        if ($photo != null) {
            $newImageName = $photo->getRandomName();
            $photo->move(ROOTPATH . 'public/images', $newImageName);
            $data['foto'] = $newImageName;
        } else {
            $data['foto'] = $currentImage;
        }
        return $this->update($id, $data);
    }

    public function deletee($id)
    {
        return $this->delete($id);
    }
    public function getWhere($table, $where){
		return $this->db->table($table)->getWhere($where)->getRow();
	}
  
}