<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// Extend the TCPDF class to create custom Header and Footer
class MYPDF extends TCPDF {

    function __construct()
    {
        parent::__construct();
    }

    //Page header
    public function Header() {
        // Logo
        $image_file = 'assets/images/logo_ipctpk.png';
        $this->Image($image_file, 155, 10, 40, '', 'png', '', 'T', false, 300, '', false, false, 0, false, false, false);
        
         $bMargin = $this->getBreakMargin();
        // get current auto-page-break mode
        $auto_page_break = $this->AutoPageBreak;

        $img_file = base_url().'public/media/logo-tamsis.jpg';

        // Render the image
        // $this->Image($img_file, 0, 0, 223, 280, '', '', '', false, 300, '', false, false, 0);


        // disable auto-page-break
        $this->SetAutoPageBreak(false, 0);
        // restore auto-page-break status
        $this->SetAutoPageBreak($auto_page_break, $bMargin);
        // set the starting point for the page content
        $this->setPageMark();
    }

    // Page footer
    public function Footer() {
        $this->SetFont('times', 'B', 8);
        $this->SetY(-60);
        $this->SetX(0);
        $this->Cell(200, 100, '', 0, false, 'R', 0, '', 0, false, 'T', 'M');
    }
}

// create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('fahmiganz');
$pdf->SetTitle('PELAPORAN NILAI');
$pdf->SetSubject('KD PENGETAHUAN');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, 40, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
// $pdf->SetFont('times', 'BI', 12);
$pdf->SetFont('times');
$satuan_pendidikan  = 'SMA TAMAN MADYA JETIS YOGYAKARTA';
$alamat             = 'Jl. Pakuningratan No. 34 A Yogyakarta';
$kepsek             = 'ERMAYANTI, M.Pd';
$nip_kepsek         = 'NIP. 19750507 200012 002';
$kelas              = $siswa->rombel;
$tahun_ajaran       = $semester[0]->tahun_pelajaran;
$semester           = $semester[0]->semester;
$nama_siswa         = $siswa->nama_siswa;
$id_siswa           = $siswa->id_siswa;
$nis                = $siswa->nis;
$nisn               = $siswa->nisn;
$wali_kelas         = $siswa->nama_guru;
$wali_murid         = $siswa->nama_wali;
$kkm                = 70;

function predikat($nilai)
{
  if($nilai < 70) $predikat = 'D';
  else if($nilai >= 70 && $nilai <= 79) $predikat = 'C';
  else if($nilai >= 80 && $nilai <= 89) $predikat = 'B';
  else if($nilai >= 90 && $nilai <= 100) $predikat = 'A';
  else $predikat = '-';
  return $predikat;
}

// print_r($img_file);die();
// print_r($id_semester);die();
$no_pengetahuan = 1;
$peng_mapel_grup_a = '';
foreach ($mapel_a as $mapel_a) {
$nilai_pengetahuan = (array) $pengetahuan->list_nilai($id_siswa, $mapel_a->id_mapel, $id_semester);
$nilai_rapot_pengetahuan = isset ($nilai_pengetahuan['nilai_rapot']) ? $nilai_pengetahuan['nilai_rapot']:'-';
$deskripsi_pengetahuan = isset ($nilai_pengetahuan['deskripsi']) ? $nilai_pengetahuan['deskripsi']:'-';
$predikat = isset ($nilai_pengetahuan['nilai_rapot']) ? predikat($nilai_pengetahuan['nilai_rapot']):'-';
// print_r($nilai_rapot_pengetahuan);die();
  $peng_mapel_grup_a .= '<tr>
                      <td>'.$no_pengetahuan.'</td>
                      <td>'.$mapel_a->nama_mapel.'</td>
                      <td>'.$nilai_rapot_pengetahuan.'</td>
                      <td>'.$predikat.'</td>
                      <td>'.$deskripsi_pengetahuan.'</td>
                    </tr>';
  $no_pengetahuan++;
}
$peng_mapel_grup_b = '';
foreach ($mapel_b as $mapel_b) {
$nilai_pengetahuan = (array) $pengetahuan->list_nilai($id_siswa, $mapel_b->id_mapel, $id_semester);
$nilai_rapot_pengetahuan = isset ($nilai_pengetahuan['nilai_rapot']) ? $nilai_pengetahuan['nilai_rapot']:'-';
$deskripsi_pengetahuan = isset ($nilai_pengetahuan['deskripsi']) ? $nilai_pengetahuan['deskripsi']:'-';
$peng_predikat = isset ($nilai_pengetahuan['nilai_rapot']) ? predikat($nilai_pengetahuan['nilai_rapot']):'-';
  $peng_mapel_grup_b .= '<tr>
                      <td>'.$no_pengetahuan.'</td>
                      <td>'.$mapel_b->nama_mapel.'</td>
                      <td>'.$nilai_rapot_pengetahuan.'</td>
                      <td>'.$peng_predikat.'</td>
                      <td>'.$deskripsi_pengetahuan.'</td>
                    </tr>';
  $no_pengetahuan++;
}
$peng_mapel_grup_c = '';
foreach ($mapel_c as $mapel_c) {
$nilai_pengetahuan = (array) $pengetahuan->list_nilai($id_siswa, $mapel_c->id_mapel, $id_semester);
$nilai_rapot_pengetahuan = isset ($nilai_pengetahuan['nilai_rapot']) ? $nilai_pengetahuan['nilai_rapot']:'-';
$deskripsi_pengetahuan = isset ($nilai_pengetahuan['deskripsi']) ? $nilai_pengetahuan['deskripsi']:'-';
$peng_predikat = isset ($nilai_pengetahuan['nilai_rapot']) ? predikat($nilai_pengetahuan['nilai_rapot']):'-';
  $peng_mapel_grup_c .= '<tr>
                      <td>'.$no_pengetahuan.'</td>
                      <td>'.$mapel_c->nama_mapel.'</td>
                      <td>'.$nilai_rapot_pengetahuan.'</td>
                      <td>'.$peng_predikat.'</td>
                      <td>'.$deskripsi_pengetahuan.'</td>
                    </tr>';
  $no_pengetahuan++;
}
$peng_mapel_grup_c_2 = '';
foreach ($mapel_c_2 as $mapel_c_2) {
$nilai_pengetahuan = (array) $pengetahuan->list_nilai($id_siswa, $mapel_c_2->id_mapel, $id_semester);
$nilai_rapot_pengetahuan = isset ($nilai_pengetahuan['nilai_rapot']) ? $nilai_pengetahuan['nilai_rapot']:'-';
$deskripsi_pengetahuan = isset ($nilai_pengetahuan['deskripsi']) ? $nilai_pengetahuan['deskripsi']:'-';
$peng_predikat = isset ($nilai_pengetahuan['nilai_rapot']) ? predikat($nilai_pengetahuan['nilai_rapot']):'-';
  $peng_mapel_grup_c_2 .= '<tr>
                      <td>'.$no_pengetahuan.'</td>
                      <td>'.$mapel_c_2->nama_mapel.'</td>
                      <td>'.$nilai_rapot_pengetahuan.'</td>
                      <td>'.$peng_predikat.'</td>
                      <td>'.$deskripsi_pengetahuan.'</td>
                    </tr>';
  $no_pengetahuan++;
}

$no_keterampilan = 1;
$ket_mapel_grup_a = '';
foreach ($ket_mapel_a as $ket_mapel_a) {
  // print_r($ket_mapel_a);die();
$nilai_keterampilan = (array) $keterampilan->list_keterampilan($id_siswa, $ket_mapel_a->id_mapel, $id_semester);
$nilai_rapot_keterampilan = isset ($nilai_keterampilan['nilai_rapot']) ? $nilai_keterampilan['nilai_rapot']:'-';
$deskripsi_keterampilan = isset ($nilai_keterampilan['deskripsi']) ? $nilai_keterampilan['deskripsi']:'-';
$ket_predikat = isset ($nilai_keterampilan['nilai_rapot']) ? predikat($nilai_keterampilan['nilai_rapot']):'-';
// print_r($nilai_rapot_keterampilan);die();
  $ket_mapel_grup_a .= '<tr>
                      <td>'.$no_keterampilan.'</td>
                      <td>'.$ket_mapel_a->nama_mapel.'</td>
                      <td>'.$nilai_rapot_keterampilan.'</td>
                      <td>'.$ket_predikat.'</td>
                      <td>'.$deskripsi_keterampilan.'</td>
                    </tr>';
  $no_keterampilan++;
}
$ket_mapel_grup_b = '';
foreach ($ket_mapel_b as $ket_mapel_b) {
$nilai_keterampilan = (array) $keterampilan->list_keterampilan($id_siswa, $ket_mapel_b->id_mapel, $id_semester);
$nilai_rapot_keterampilan = isset ($nilai_keterampilan['nilai_rapot']) ? $nilai_keterampilan['nilai_rapot']:'-';
$deskripsi_keterampilan = isset ($nilai_keterampilan['deskripsi']) ? $nilai_keterampilan['deskripsi']:'-';
$ket_predikat = isset ($nilai_keterampilan['nilai_rapot']) ? predikat($nilai_keterampilan['nilai_rapot']):'-';
  $ket_mapel_grup_b .= '<tr>
                      <td>'.$no_keterampilan.'</td>
                      <td>'.$ket_mapel_b->nama_mapel.'</td>
                      <td>'.$nilai_rapot_keterampilan.'</td>
                      <td>'.$ket_predikat.'</td>
                      <td>'.$deskripsi_keterampilan.'</td>
                    </tr>';
  $no_keterampilan++;
}
$ket_mapel_grup_c = '';
foreach ($ket_mapel_c as $ket_mapel_c) {
$nilai_keterampilan = (array) $keterampilan->list_keterampilan($id_siswa, $ket_mapel_c->id_mapel, $id_semester);
$nilai_rapot_keterampilan = isset ($nilai_keterampilan['nilai_rapot']) ? $nilai_keterampilan['nilai_rapot']:'-';
$deskripsi_keterampilan = isset ($nilai_keterampilan['deskripsi']) ? $nilai_keterampilan['deskripsi']:'-';
$ket_predikat = isset ($nilai_keterampilan['nilai_rapot']) ? predikat($nilai_keterampilan['nilai_rapot']):'-';
  $ket_mapel_grup_c .= '<tr>
                      <td>'.$no_keterampilan.'</td>
                      <td>'.$ket_mapel_c->nama_mapel.'</td>
                      <td>'.$nilai_rapot_keterampilan.'</td>
                      <td>'.$ket_predikat.'</td>
                      <td>'.$deskripsi_keterampilan.'</td>
                    </tr>';
  $no_keterampilan++;
}

$ket_mapel_grup_c_2 = '';
foreach ($ket_mapel_c_2 as $ket_mapel_c_2) {
$nilai_keterampilan = (array) $keterampilan->list_keterampilan($id_siswa, $ket_mapel_c_2->id_mapel, $id_semester);
$nilai_rapot_keterampilan = isset ($nilai_keterampilan['nilai_rapot']) ? $nilai_keterampilan['nilai_rapot']:'-';
$deskripsi_keterampilan = isset ($nilai_keterampilan['deskripsi']) ? $nilai_keterampilan['deskripsi']:'-';
$ket_predikat = isset ($nilai_keterampilan['nilai_rapot']) ? predikat($nilai_keterampilan['nilai_rapot']):'-';
  $ket_mapel_grup_c_2 .= '<tr>
                      <td>'.$no_keterampilan.'</td>
                      <td>'.$ket_mapel_c_2->nama_mapel.'</td>
                      <td>'.$nilai_rapot_keterampilan.'</td>
                      <td>'.$ket_predikat.'</td>
                      <td>'.$deskripsi_keterampilan.'</td>
                    </tr>';
  $no_keterampilan++;
}

$header = '
<style>
h2{
    text-align: center;
}
</style>
<table border="0" style="font-size:12px;">
  <tbody>
    <tr>
      <td width="65%">
        <table border="0">
          <tbody>
            <tr>
              <td width="30%">Nama Sekolah</td>
              <td width="5%">:</td>
              <td width="65%">'.$satuan_pendidikan.'</td>
            </tr>
          </tbody>
        </table>
      </td>
      <td width="35%">
        <table border="0">
          <tbody>
            <tr>
              <td width="40%">Kelas</td>
              <td width="5%">:</td>
              <td width="55%">'.$kelas.'</td>
            </tr>
          </tbody>
        </table>
      </td>
    </tr>
    <tr>
      <td>
        <table border="0">
          <tbody>
            <tr>
              <td width="30%">Alamat</td>
              <td width="5%">:</td>
              <td width="65%">'.$alamat.'</td>
            </tr>
          </tbody>
        </table>
      </td>
      <td>
        <table border="0">
          <tbody>
            <tr>
              <td width="40%">Semester</td>
              <td width="5%">:</td>
              <td width="55%">'.$semester.'</td>
            </tr>
          </tbody>
        </table>
      </td>
    </tr>
    <tr>
      <td>
        <table border="0">
          <tbody>
            <tr>
              <td width="30%">Nama Siswa</td>
              <td width="5%">:</td>
              <td width="65%">'.$nama_siswa.'</td>
            </tr>
          </tbody>
        </table>
      </td>
      <td>
        <table border="0">
          <tbody>
            <tr>
              <td width="40%">Tahun Pelajaran</td>
              <td width="5%">:</td>
              <td width="55%">'.$tahun_ajaran.'</td>
            </tr>
          </tbody>
        </table>
      </td>
    </tr>
     <tr>
      <td>
        <table border="0">
          <tbody>
            <tr>
              <td width="30%">NIS / NISN</td>
              <td width="5%">:</td>
              <td width="65%">'.$nis.' / '.$nisn.'</td>
            </tr>
          </tbody>
        </table>
      </td>
      
    </tr>
  </tbody>
</table>
';

// add a page
// $pdf->AddPage();
// $pdf->Cell(0, 0, 'A4 LANDSCAPE', 1, 1, 'C');


$pdf->AddPage('P', 'A4');
ob_start();
// print_r($data);die();
$page1 = $header.'
<h2>CAPAIAN HASIL BELAJAR</h2>
<br>
<table border="0">
  <tbody>
    <tr>
      <td>
        <table border="0">
          <tbody>
            <tr>
              <td>A. Sikap</td>
            </tr>
            <tr>
              <td>1. Sikap Spritual</td>
            </tr>
            <tr>
            <td>
              <table border="1" cellpadding="5">
                <tbody>
                  <tr>
                    <td>Predikat</td>
                    <td>Deskripsi</td>
                  </tr>
                  <tr>
                    <td>A</td>
                    <td>Deskripsi</td>
                  </tr>
                </tbody>
              </table>
              </td>
            </tr>
            <tr><td><br><br></td></tr>
            <tr>
              <td>2. Sikap Sosial</td>
            </tr>
            <tr>
            <td>
              <table border="1" cellpadding="5">
                <tbody>
                  <tr>
                    <td>Predikat</td>
                    <td>Deskripsi</td>
                  </tr>
                  <tr>
                    <td>A</td>
                    <td>Deskripsi</td>
                  </tr>
                </tbody>
              </table>
              </td>
            </tr>
          </tbody>
        </table>
      </td>
    </tr>
    <tr>
      <td>
        
      </td>
    </tr>
  </tbody>
</table>
';
// output the HTML content
$pdf->writeHTMLCell($w='', $h='', $x=15, $y=10, $page1, $border=0, $ln=1, $fill=0, $reseth=true, $align='', $autopadding=true);
//Close and output PDF document
ob_end_clean();

$pdf->AddPage('P', 'A4');
ob_start();
// print_r($data);die();
$page2 = $header.'
<br>
<br>
<table border="0">
  <tbody>
    <tr>
      <td>
        <table border="0">
          <tbody>
            <tr>
              <td width="4%">B.</td>
              <td width="96%">Pengetahuan</td>
            </tr>
            <tr>
              <td width="4%"></td>
              <td width="96%"></td>
            </tr>
            <tr>
              <td width="4%"></td>
              <td width="96%">Kriteria Ketuntasan Minimal (KKM) Sekolah = '.$kkm.'</td>
            </tr>
          </tbody>
        </table>
      </td>
    </tr>
  </tbody>
</table>
<table border="0">
  <tbody>
    <tr>
      <td>
        <table border="1" cellpadding="5" style="font-size:15px;">
          <tbody>
            <tr>
              <td width="5%">No</td>
              <td width="40%">Mata Pelajaran</td>
              <td width="10%">Nilai</td>
              <td width="10%">Predikat</td>
              <td width="35%">Deskripsi</td>
            </tr>
            <tr>
              <td colspan="5">Kelompok A (Umum)</td>
            </tr>
            '.$peng_mapel_grup_a.'
            <tr>
              <td colspan="5">Kelompok B (Umum)</td>
            </tr>
            '.$peng_mapel_grup_b.'
            <tr>
              <td colspan="5">Kelompok C : (Peminatan)</td>
            </tr>
            <tr>
              <td colspan="5">I. Peminatan Matematika dan Ilmu Pengetahuan Alam</td>
            </tr>
            '.$peng_mapel_grup_c.'
            <tr>
              <td colspan="5">II. Peminatan Ilmu Pengetahuan Sosial</td>
            </tr>
            '.$peng_mapel_grup_c_2.'
          </tbody>
        </table>
      </td>
    </tr>
  </tbody>
</table>
';
// output the HTML content
$pdf->writeHTMLCell($w='', $h='', $x=15, $y=10, $page2, $border=0, $ln=1, $fill=0, $reseth=true, $align='', $autopadding=true);
//Close and output PDF document
ob_end_clean();

$pdf->AddPage('P', 'A4');
ob_start();
// print_r($data);die();
$page3 = $header.'
<br>
<br>
<table border="0">
  <tbody>
    <tr>
      <td>
        <table border="0">
          <tbody>
            <tr>
              <td width="4%">C.</td>
              <td width="96%">Keterampilan</td>
            </tr>
            <tr>
              <td width="4%"></td>
              <td width="96%"></td>
            </tr>
            <tr>
              <td width="4%"></td>
              <td width="96%">Kriteria Ketuntasan Minimal (KKM) Sekolah = '.$kkm.'</td>
            </tr>
          </tbody>
        </table>
      </td>
    </tr>
  </tbody>
</table>
<table border="0">
  <tbody>
    <tr>
      <td>
        <table border="1" cellpadding="5" style="font-size:15px;">
          <tbody>
            <tr>
              <td width="5%">No</td>
              <td width="40%">Mata Pelajaran</td>
              <td width="10%">Nilai</td>
              <td width="10%">Predikat</td>
              <td width="35%">Deskripsi</td>
            </tr>
            <tr>
              <td colspan="5">Kelompok A (Umum)</td>
            </tr>
            '.$ket_mapel_grup_a.'
            <tr>
              <td colspan="5">Kelompok B (Umum)</td>
            </tr>
            '.$ket_mapel_grup_b.'
            <tr>
              <td colspan="5">Kelompok C : (Peminatan)</td>
            </tr>
            <tr>
              <td colspan="5">I. Peminatan Matematika dan Ilmu Pengetahuan Alam</td>
            </tr>
            '.$ket_mapel_grup_c.'
            <tr>
              <td colspan="5">II. Peminatan Ilmu Pengetahuan Sosial</td>
            </tr>
            '.$ket_mapel_grup_c_2.'
          </tbody>
        </table>
      </td>
    </tr>
  </tbody>
</table>
<br><br>
<table>
<tr>
<td>
  <table border="1" cellpadding="5">
    <tbody>
      <tr>
        <td rowspan="2">KKM</td>
        <td colspan="4">Predikat</td>
      </tr>
      <tr>
        <td>D</td>
        <td>C</td>
        <td>B</td>
        <td>A</td>
      </tr>
      <tr>
        <td>70 (X)</td>
        <td>X < 70</td>
        <td>70 &lt;= X &gt;= 79</td>
        <td>80 &lt;= X &gt;= 89</td>
        <td>90 &lt;= X &gt;= 100</td>
      </tr>
    </tbody>
  </table>
  </td>
</tr>
</table>
';
// output the HTML content
$pdf->writeHTMLCell($w='', $h='', $x=15, $y=10, $page3, $border=0, $ln=1, $fill=0, $reseth=true, $align='', $autopadding=true);
//Close and output PDF document
ob_end_clean();

$pdf->AddPage('P', 'A4');
ob_start();
// print_r($data);die();
$page4 = $header.'
<br>
<br>
<table border="0">
  <tbody>
    <tr>
      <td>
        <table border="0">
          <tbody>
            <tr>
              <td>D. Absen</td>
            </tr>
            <tr><td><br><br></td></tr>
            <tr>
            <td>
              <table border="1" cellpadding="5">
                <tbody>
                  <tr>
                    <td>Izin</td>
                    <td></td>
                  </tr>
                  <tr>
                    <td>Sakit</td>
                    <td></td>
                  </tr>
                  <tr>
                    <td>Tanpa Keterangan</td>
                    <td></td>
                  </tr>
                </tbody>
              </table>
              </td>
            </tr>
            <tr><td><br><br></td></tr>
            
          </tbody>
        </table>
      </td>
    </tr>
    <tr>
      <td>
        
      </td>
    </tr>
  </tbody>
</table>
<br>
<table border="0">
  <tbody>
    <tr>
      <td>
        <table border="0">
          <tbody>
            <tr>
            <td>
              <table border="0" cellpadding="0">
                <tbody>
                  <tr>
                    <td>Yogyakarta, '.date("d-M-Y").'</td>
                    <td></td>
                  </tr>
                  <tr>
                    <td>Wali Kelas</td>
                    <td align="center">Wali Murid</td>
                  </tr>
                  <tr>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td>'.$wali_kelas.'</td>
                    <td align="center">'.$wali_murid.'</td>
                  </tr>
                </tbody>
              </table>
              </td>
            </tr>
            <tr><td><br><br></td></tr>
            
          </tbody>
        </table>
      </td>
    </tr>
    <tr>
      <td>
        
      </td>
    </tr>
  </tbody>
</table>  
';
// output the HTML content
$pdf->writeHTMLCell($w='', $h='', $x=15, $y=10, $page4, $border=0, $ln=1, $fill=0, $reseth=true, $align='', $autopadding=true);
//Close and output PDF document
ob_end_clean();


$pdf->Output('KD PENGETAHUAN.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+

?>