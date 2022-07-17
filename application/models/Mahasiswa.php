<?php
defined('BASEPATH') OR exit('no direct script access allowed');
class Mahasiswa extends CI_Model {

    public function getDataMhs(){
        $this->db->select('*');
        $this->db->from('tb_mahasiswa');
        $this->db->join('agama','agama.id_agama=tb_mahasiswa.agama');
        $this->db->join('kelas','kelas.id_kelas=tb_mahasiswa.kelas');
        $query = $this->db->get();
        return $query->result();
    }
   
    public function insertDataMhs($data){
        $this->db->insert('tb_mahasiswa',$data);
    }
    public function editDataMhs($data,$id){
        $this->db->where('nim', $id);
        $this->db->update('tb_mahasiswa', $data);
    }
    public function getDataMhsDetail($id){
        $this->db->where('nim', $id);
        $query = $this->db->get('tb_mahasiswa');
        return $query->row();
    }
    public function deleteDataMhs($id){
        $this->db->where('nim',$id);
        $this->db->delete('tb_mahasiswa');
    }

    function cariagama($id_agama){
        $this->db->where('id_agama', $id_agama);
        return $this->db->get('agama');
    }

    function get_agama(){
        $this->db->select('*');
        $this->db->from('agama');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
        $result = $query->result_array();
        $query->free_result();
        return $result;
        } else {
        return array();
        }
    }

    function carikelas($id_kelas){
        $this->db->where('id_kelas', $id_kelas);
        return $this->db->get('kelas');
    }

    function get_kelas(){
        $this->db->select('*');
        $this->db->from('kelas');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
        $result = $query->result_array();
        $query->free_result();
        return $result;
        } else {
        return array();
        }
    }
  	function search($keyword){
        $this->db->select('*');
        $this->db->from('tb_mahasiswa');
        $this->db->join('agama','agama.id_agama = tb_mahasiswa.agama');
        $this->db->join('kelas','kelas.id_kelas = tb_mahasiswa.kelas');
        $this->db->like('nama',$keyword);
        $this->db->or_like('nim',$keyword);
        $this->db->or_like('nama_kelas',$keyword);
        $this->db->or_like('nama_agama',$keyword);

        $result = $this->db->get();
        return $result->result();
    }
}
?>