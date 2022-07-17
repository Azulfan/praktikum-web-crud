<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller{
    public function __construct(){
        parent:: __construct();
        $this->load->model('Mahasiswa');
        $this->load->library('form_validation');
    }
    public function rules(){
        return [
            [
                'field' => 'nama',
                'label' => 'Name',
                'rules' => 'required|max_length[50]'
            ],
            [
                'field' => 'nim',
                'label' => 'NIM',
                'rules' => 'required|max_length[12]'
            ],
            [
                'field' => 'kelas',
                'label' => 'Kelas',
                'rules' => 'required|max_length[6]'
            ]
        ];
    }
    public function index()
    {
      	$viewMhs = $this->Mahasiswa->getDataMhs();
  		$DATA = array('data_mhs'=> $viewMhs);
        $data['judul'] = 'Daftar Mahasiswa';
        $this->load->view('templates/header', $data);
        $this->load->view('home/index',$DATA);
        $this->load->view('templates/footer');
    }
    public function formInput()
    {
        $DATA['agama'] = $this->Mahasiswa->get_agama();
        $DATA['kelas'] = $this->Mahasiswa->get_kelas();
        $data['judul'] = 'Tambah Data Mahasiswa';
        $this->load->view('templates/header', $data);
        $this->load->view('home/form_input',$DATA);
        $this->load->view('templates/footer');
    }
    public function formEdit($id='')
    {
        $DATA['agama'] = $this->Mahasiswa->get_agama();
        $DATA['kelas'] = $this->Mahasiswa->get_kelas();
        $DATA['data_mhs'] = $this->Mahasiswa->getDataMhsDetail($id);
        $data['judul'] = 'Form Edit Mahasiswa';
        $this->load->view('templates/header', $data);
        $this->load->view('home/form_edit',$DATA);
        $this->load->view('templates/footer');
    }
    public function insertData()
    {
        if($this->input->method() === 'post'){
            $rules = $this->rules();
            $this->form_validation->set_rules($rules);

            if($this->form_validation->run() == FALSE){
                redirect(base_url('Home/formInput'));
            }else{
            
            $nama = $this->input->post('nama');
            $nim = $this->input->post('nim');
            $kelas = $this->input->post('kelas');
            $agama = $this->input->post('agama'); 
            $dataInsert = array(
            'nim' => $nim,
            'nama' => $nama,
            'kelas' => $kelas,
            'agama' => $agama,
        );
            $this->Mahasiswa->insertDataMhs($dataInsert);
            redirect(base_url('Home/success'));
        }
    }
    }
    public function aksiEdit()
    {
        if($this->input->method() === 'post'){
            $rules = $this->rules();
            $this->form_validation->set_rules($rules);

            if($this->form_validation->run() == FALSE){
                base_url();
            }else{

            $nama = $this->input->post('nama');
            $nim = $this->input->post('nim');
            $kelas = $this->input->post('kelas');
            $agama = $this->input->post('agama'); 
            $dataUpdate = array(
                'nama' => $nama,
                'kelas' => $kelas,
                'agama' => $agama,
            );
            $this->Mahasiswa->EditDataMhs($dataUpdate, $nim);
            redirect(base_url('Home/success'));
            }
        }
    }
    public function aksiDelete($nim)
    {
        $this->Mahasiswa->deleteDataMhs($nim);
        redirect(base_url('Home/success'));
    
    }
  	function search_keyword(){
		$keyword = $this->input->post('keyword');
      	$DATA['judul'] = 'Form Edit Mahasiswa';
		$data['result'] = $this->Mahasiswa->search($keyword);
      	$this->load->view('templates/header', $DATA);
		$this->load->view('home/search',$data);
      	$this->load->view('templates/footer');
	}
    function cariagama($id_agama,$agama){
        $id_agama = $this->input->post('id_agama');
        $id_agama = $this->Mahasiswa->cariagama($id_agama);
        if($agama->num_rows()>0){
        $agama=$agama->row_array();
        echo $agama['nama_agama'];
        }
    }
    function carikelas($id_kelas,$kelas){
        $id_kelas = $this->input->post('id_kelas');
        $id_kelas = $this->Mahasiswa->carikelas($id_kelas);
        if($kelas->num_rows()>0){
        $kelas=$kelas->row_array();
        echo $kelas['nama_kelas'];
        }
    }

    function success(){
        $DATA['judul'] = 'Redirect...';
      	$this->load->view('templates/header', $DATA);
        $this->load->view('alert/success');
      	$this->load->view('templates/footer');
    }
}
?>