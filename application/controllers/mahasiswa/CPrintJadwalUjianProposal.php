<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require FCPATH . '/vendor/autoload.php';
use Dompdf\Dompdf;
class CPrintJadwalUjianProposal extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->model("MUjianProposal");
    }
    public function index()
    {
        $data['NIM'] = $this->session->userdata('NIM/NIP');
        $data["output"] = $this->MUjianProposal->outputIndexMahasiswa($data['NIM']);
        $data["stamp"] = strtotime($data["output"]->waktu);
        
        $pdf = $this->load->view("mahasiswa/ujianProposal/print",$data,true);
        
        $dompdf = new Dompdf();
        $dompdf->set_option('isRemoteEnabled', TRUE);
        $dompdf->loadHtml($pdf);
        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'portrait');
        // Render the HTML as PDF
        $dompdf->render();
        // Output the generated PDF to Browser
        //$dompdf->stream();
        $dompdf->stream('my.pdf',array('Attachment'=>0));
    }
}