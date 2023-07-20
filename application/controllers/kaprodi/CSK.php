<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CSK extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('level') != 'Kaprodi') {
            $url = base_url();
            echo "<script> alert('Maaf Anda Tidak Memiliki Akses ke Halaman Ini!') </script>";
            redirect($url, 'refresh');
        };
        $this->load->model("MSK");
        $this->load->library("form_validation");
        $this->load->helper(['url','download']);
    }

    public function index()
    {   
        $data['title'] = 'SK';
        $data["SK"] = $this->MSK->getAll();
        $this->load->view("kaprodi/sk/index", $data);
    }

    public function add()
    {
        $sk = $this->MSK;
        $validation = $this->form_validation;
        $validation->set_rules($sk->rules());

        if($validation->run()){
            $fileSK = $this->fileSK();
            $sk->save($fileSK);

            echo $this->session->set_flashdata('success', '<span onclick="this.parentElement.style.display=`none`" class="w3-button w3-large w3-display-topright">&times;</span>
            <h3>Selamat</h3>
            <p>Data SK Berhasil Ditambah!</p>');

            redirect(base_url('kaprodi/CSK/index'));

        }
    }

    public function edit()
    {
        $idSK= $_POST['idSK'];
        if (!isset($idSK)) redirect('kaprodi/CSK');
        $sk = $this->MSK;
        $data["sk"] = $sk->getById($idSK);
        if (!$data["sk"]) show_404();
       
        $validation = $this->form_validation;
        $validation->set_rules($sk->rulesEdit());

        if ($validation->run()) {
            $fileSK = $this->fileSK();
            if($fileSK === false){
                echo $this->session->set_flashdata('success', '<span onclick="this.parentElement.style.display=`none`" class="w3-button w3-large w3-display-topright">&times;</span>
                <h3>Gagal</h3>
                <p>Terdapat kesalahan pada File!</p>');
    
                redirect(base_url('kaprodi/CSK/index'));
            }
            if($fileSK === NULL){
                $sk->updateNoFile();
            }else{
                $sk->update($fileSK);
            }
            echo $this->session->set_flashdata('success', '<span onclick="this.parentElement.style.display=`none`" class="w3-button w3-large w3-display-topright">&times;</span>
            <h3>Selamat</h3>
            <p>Data SK Berhasil Diedit!</p>');
            
            redirect(base_url('kaprodi/CSK/index'));
        }

        
    }

    public function delete()
    {
        $idSK = $_POST['idSK'];
        if (!isset($idSK)) show_404();
        
        if ($this->MSK->delete($idSK)) {
            echo $this->session->set_flashdata('success', '<span onclick="this.parentElement.style.display=`none`" class="w3-button w3-large w3-display-topright">&times;</span>
            <h3>Selamat</h3>
            <p>Data SK Berhasil Dihapus!</p>');
            
            redirect(base_url('kaprodi/CSK/index'));
        }
    }

    public function downloadFileSK($idSK = NULL)
    {
        $data['status'] = $this->MSK->getById($idSK);
        $file = $data['status']->fileSK;
        force_download('./upload/SK/'.$file, NULL);
    }

    public function fileSK()
    {
        $data['title'] = 'File SK';

        $filename = str_replace('','', 'SK_'.$_POST["jenisSK"]);
        $config['upload_path']          = FCPATH.'/upload/SK/';
		$config['allowed_types']        = 'pdf';
		$config['file_name']            = $filename;
		$config['overwrite']            = true;
		$config['max_size']             = 10000; // 10MB
        $this->load->library('upload', $config);

        if(!empty($_FILES['fileSK']['name'])){
            if(!$this->upload->do_upload('fileSK')){
                $data['error'] = $this->upload->display_errors();
                return false;
            }else{
                $uploadedData = $this->upload->data();
                $fileSK = $uploadedData['file_name'];
                return $fileSK;
            }
        }else{
            $data['error'] = $this->upload->display_errors();
            return NULL;
        }
    }

}
