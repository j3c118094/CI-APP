<?php namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Program_Studi_Model;

// use App\Models\Program_Studi_Model;

class Program_Studi extends BaseController {

    public function __construct() {
        // parent::__construct();
        // $this->load->library('session');
        // $this->prodi = new Program_Studi_Model();
        $this->session = \Config\Services::session();
        
        $db = \Config\Database::connect();

        $this->prodi = new Program_Studi_Model($db);
        
    }
    
    public function index() {
        $data['session'] = $this->session->getFlashdata('response');
        $data['dataProdi'] =$this->prodi->get()->getResult();
        // var_dump($data);
        echo view('header_v');
        echo view('program_studi_v', $data);
        echo view('footer_v');
    }

    public function add() {
        echo view('header_v');
        echo view('program_studi_form_v');
        echo view('footer_v');
    }

    public function edit($id) {
        $where = ['kode_prodi' => $id];

        $data['dataProdi'] = $this->prodi->get($where)->getResult()[0];

        echo view('header_v');
        echo view('program_studi_form_v', $data);
        echo view('footer_v');
    }

    public function save() {
        $id = $this->request->getPost('id');

        $data = [
            'kode_prodi' => $this->request->getPost('kode'),
            'nama_prodi' => $this->request->getPost('nama'),
            'ketua_prodi' => $this->request->getPost('ketua')
        ];

        // Proses insert data
        if(empty($id)) {
            // var_dump($data);
            $response = $this->prodi->insert($data);

            if($response->resultID) {
                $this->session->setFlashdata('response',['status'=> $response->resultID, 'message' => 'Data berhasil disimpan.']);
            }else {
                $this->session->setFlashdata('response',['status'=> $response->resultID, 'message' => 'Data gagal disimpan. '.$response->connID->error]);
            }
        }else {
            // Proses update data
            $where = ['kode_prodi' => $id];

            $response = $this->prodi->update($data, $where);

            if($response) {
                $this->session->setFlashdata('response',['status'=> $response, 'message' => 'Data berhasil disimpan.']);
            }else {
                $this->session->setFlashdata('response',['status'=> $response, 'message' => 'Data gagal disimpan.']);
            }
        }
        // var_dump($response->resultID);die;
        return redirect()->to(site_url('Program_Studi'));
        
    }

    public function delete($id) {
        // echo $id;
        $where = ['kode_prodi' => $id];

        $response = $this->prodi->delete($where);

        if($response->resultID) {
            $this->session->setFlashdata('response', ['status' => $response->resultID, 'message' => 'Data berhasil dihapus.']);
        }else {
            $this->session->setFlashdata('response', ['status' => $response->resultID, 'message' => 'Data gagal dihapus. '.$response->connID->error]);
        }

        return redirect()->to(site_url('Program_Studi'));
    }
}
?>