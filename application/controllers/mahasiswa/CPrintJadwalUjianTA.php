<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require FCPATH . '/vendor/autoload.php';
use Dompdf\Dompdf;
class CPrintJadwalUjianTA extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->model(["MPengajuanTugasAkhir", "MUjianTugasAkhir"]);
    }
    public function index()
    {
        $data['NIM'] = $this->session->userdata('NIM/NIP');
        $data["pengajuan"] = $this->MPengajuanTugasAkhir->getByNIM($data['NIM']);

        $data["output"] = $this->MUjianTugasAkhir->outputIndexMahasiswa($data['pengajuan']->idPengajuanTA);
        $data["stamp"] = strtotime($data["output"]->waktu);
        
        $pdf = $this->load->view("mahasiswa/ujianTugasAkhir/print",$data,true);
        
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