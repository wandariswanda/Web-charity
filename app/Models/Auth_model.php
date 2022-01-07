<?php
 
namespace App\Models;
use CodeIgniter\Model;

class Auth_model extends Model
{
  protected $table = 'auth';

  // public function getKaryawan($id = false)
  // {
  //     if ($id === false) {
  //         return $this->findAll();
  //     } else {
  //         return $this->getWhere(['id' => $id]);
  //     }
  // }

  // public function saveKaryawan($data)
  // {
  //     $builder = $this->db->table($this->table);
  //     return $builder->insert($data);
  // }

  public function getUser($usernameOrEmail){
    // $this->db->select('*');
    // $this->db->from('auth');
    // $this->db->where('username', $usernameOrEmail);
    // $this->db->where('status', "active");
    // $query = $this->db->get()->row();
    // return $query;

    return $this->where('username', $usernameOrEmail)->first();
  } 
}