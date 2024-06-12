<?php

require_once "../app/lib/dompdf/autoload.inc.php";

use Dompdf\Dompdf;
use Dompdf\Options;

class SuratKetMhs extends Controller
{

    private $page = 'surat-ket-mhs';

    public function __construct()
    {
        if(!isset($_SESSION['auth'])) {
            header('Location: ' . BASE_URL . 'auth');
        }
    }

    public function index() 
    {
        $data['page'] = $this->page;
        $data['title'] = 'Surat Keterangan Mahasiswa (Tunjangan)';
        $data['pagination'] = true;
        
        $this->view('layouts/header', $data);
        $data['surat'] = $this->model('SuratKetMhsModel')->getAll();

        if(!empty($_POST)) {
            $data['surat'] = $this->model('SuratKetMhsModel')->getBySearching($_POST);
        }

        $data['fakultas'] = $this->model('FakultasModel')->getAll();
        $this->view('surat-keterangan-mhs/index', $data);
        $this->view('layouts/footer', $data);
    }

    public function detail($id)
    {
        $data['page'] = $this->page;
        $data['title'] = 'Detail Surat Keterangan Mahasiswa (Tunjangan)';

        $this->view('layouts/header', $data);

        $data['surat'] = $this->model('SuratKetMhsModel')->getById($id);
        $fakultas = $this->model('FakultasModel')->getAll();
        $data['fps'] = [];

        foreach ($fakultas as $value) {
            // fps => Fakultas and Program Studi
            $program_studi = $this->model('ProgramStudiModel')->getByFakultasId($value['id']);
            $data['fps'][] = (object) [
                'nama_fakultas' => $value['nama_fakultas'],
                'program_studies' => $program_studi
            ];
        }

        $this->view('surat-keterangan-mhs/detail', $data);
        $this->view('layouts/footer');
    }

    public function store()
    {
        $result = $this->model('SuratKetMhsModel')->insertSurat($_POST);
        if($result) {
            Flasher::setFlash('Surat keterangan mahasiswa berhasil ditambahkan!', 'success');
        } else {
            Flasher::setFlash('Surat keterangan mahasiswa gagal ditambahkan!', 'danger');
        }
        header('Location: ' . BASE_URL . $this->page);
    }

    public function update($id)
    {
        $result = $this->model('SuratKetMhsModel')->updateSurat($id, $_POST);
        if($result) {
            Flasher::setFlash('Surat keterangan mahasiswa berhasil diperbarui!', 'success');
        } else {
            Flasher::setFlash('Surat keterangan mahasiswa gagal diperbarui!', 'danger');
        }
        header('Location: ' . BASE_URL . $this->page);
    }

    public function destroy($id)
    {
        $result = $this->model('SuratKetMhsModel')->deleteSurat($id);
        if($result) {
            Flasher::setFlash('Surat keterangan mahasiswa berhasil dihapus!', 'success');
        } else {
            Flasher::setFlash('Surat keterangan mahasiswa gagal dihapus!', 'danger');
        }
        header('Location: ' . BASE_URL . $this->page);
    }
    
    public function filter_program_studi($fakultas_id)
    {
        $result = $this->model('ProgramStudiModel')->getByFakultasId($fakultas_id);
        echo json_encode($result);
    }

    public function printPDF($id)
    {
        $path = '../app/views/surat-keterangan-mhs/surat.php';
        $html = file_get_contents($path);
        $data = $this->model('SuratKetMhsModel')->getById($id);
        $fakultas = $this->model('FakultasModel')->getAll();
        $fps = [];

        foreach ($fakultas as $value) {
            // fps => Fakultas and Program Studi
            $program_studi = $this->model('ProgramStudiModel')->getByFakultasId($value['id']);
            $fps[] = (object) [
                'nama_fakultas' => $value['nama_fakultas'],
                'program_studies' => $program_studi
            ];
        }

        // Replace placeholders in the HTML template with actual data
        $html = str_replace('{{BASE_URL}}', BASE_URL, $html);
        $element = '';
        foreach ($fps as $value) {
            $first_element = '<td style="padding: 0 5px; margin: 0; vertical-align: top;">
            <ul style="list-style: none; margin: 0; padding: 0;">
            <li><b>'. $value->nama_fakultas .'</b></li>';
            $last_element = '</ul></td>';
            $content_element = "";
            foreach ($value->program_studies as $program_studi) {
                $content_element .= '<li>' . $program_studi['program_studi'] . '</li>';
            }
            $element .= $first_element . $content_element . $last_element;
        }
        $html = str_replace('{{fps}}', $element, $html);
        foreach ($data as $key => $value) {
            if(strtolower($key) == "tanggal_lahir") {
                $value = date('d F Y', strtotime($value));
            }

            $html = str_replace('{{' . $key . '}}', $value, $html);
        }

        $options = new Options();
        $options->set('isRemoteEnabled', true); // Enable loading remote images
        $options->set('defaultMediaType', 'print'); // Treat all images as print media

        $dompdf = new Dompdf();
        $dompdf->setOptions($options);
        $dompdf->loadHtml($html);

        // (Opsional) Mengatur ukuran kertas dan orientasi kertas
        $dompdf->setPaper('A4', 'portrait');

        // Menjadikan HTML sebagai PDF
        $dompdf->render();

        // Output akan menghasilkan PDF ke Browser
        $dompdf->stream("Surat Keterangan Mahasiswa - " . $data['nama'], array("Attachment" => 1));

        header('Location: ' . BASE_URL . $this->page . "/" . "detail/$id");
    }
}