<?php
 
namespace App\Models;
use CodeIgniter\Model;

class Basic_model extends Model
{
  protected $table = 'basic';
  
  // public function __construct(){
  //   $this->db = \Config\Database::connect();
  // }

  public function getAll(){
    // return $this->where('is_deleted', "false")->findAll();
    return $this->findAll();
  }

  public function getBasicById($param){
    return $this->where('id', $param['id'])->first();
  } 

  public function createBasic($param){
    $query = $this->db->table($this->table);
    $req = $query->insert($param);
    return $req;
  }

  public function updateBasic($param){
    $arrUpdate = [
      "name" => $param['name']
    ];

    $query = $this->db->table($this->table);
    $query->where('id', $param['id'])
          ->update($arrUpdate);
    return $query;
  }

  public function deleteBasic($param){
    $query = $this->db->table($this->table);
    $req = $query->delete(['id' => $param['id']]);
    return $req;
  }
}