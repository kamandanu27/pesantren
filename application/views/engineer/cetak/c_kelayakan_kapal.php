<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

$check = '<img src="'.$url_base.'public/atlantis/img/check.png" width="20">';

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
$pdf->SetAuthor('Kamandanu');
$pdf->SetTitle($title);
$pdf->SetSubject($title);
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

// add a page
// $pdf->AddPage();
$pdf->AddPage('P', 'F4');
// $pdf->Cell(0, 0, 'A4 LANDSCAPE', 1, 1, 'C');
// print_r($guru_mapel->nip);die();

ob_start();
// print_r($data);die();
$page1 = '
<style>
h5{
    text-align: center;
    text-font: 11px;
    padding: 0px;
    font-weight: reguler;
}
</style>
<table border="0" style="font-size: 12px;">
  <tbody>
    <tr style="text-align: center;">
      <td><b>KEMENTERIAN PERHUBUNGAN</b></td>
    </tr>
    <tr style="text-align: center;">
      <td><i>MINISTRY OF TRANSPORTATION</i></td>
    </tr>
    <tr style="text-align: center;">
      <td></td>
    </tr>
    <tr style="text-align: center;">
      <td><b>DIREKTORAT JENDERAL PERHUBUNGAN LAUT</b></td>
    </tr>
    <tr style="text-align: center;">
      <td><i>DIRECTORATE GENERAL OF SEA TRANSPORTATION</i></td>
    </tr>
    <tr style="text-align: center;">
      <td></td>
    </tr>
    <tr style="text-align: center;">
      <td><b>KANTOR KESYAHBANDARAN DAN OTORITAS PELABUHAN PONTIANAK</b></td>
    </tr>
    <tr style="text-align: center;">
      <td><i>HARBOUR MASTER AND PORT OUTORITY OF PONTIANAK</i></td>
    </tr>
  </tbody>
</table>';

    
// output the HTML content
$pdf->writeHTMLCell($w='', $h='', $x=15, $y=30, $page1, $border=0, $ln=1, $fill=0, $reseth=true, $align='', $autopadding=true);

$x_1 = 65;
$y_1 = 70;
$w_1 = 80;
$h_1 = 60;
    $pdf->Image($url_base.'public/media/dishub.png', $x_1, $y_1, $w_1, $h_1, 'PNG', '', '', true, 700, '', false, false, 0, false, false, false);

$page1_2 = '
<table border="0" style="font-size: 12px;">
    <tbody>
      <tr style="text-align: center;">
        <td><b>LAPORAN PEMERIKSAAN</b></td>
      </tr>
      <tr style="text-align: center;">
        <td><b>KELAYAKAN KAPAL UNTUK PENGANGKUTAN BARANG BERBAHAYA</b></td>
      </tr>
      <tr style="text-align: center;">
        <td><b><i>REPORT OF INSPECTION OF FITNESS FOR SHIP CARRYING DANGEROUS GOODS</i></b></td>
      </tr>
	  <tr style="text-align: center;">
        <td></td>
      </tr>
	  <tr style="text-align: center;">
        <td><b>Reg. II/54.3/19.4 of SOLAS 1974</b></td>
      </tr>
    </tbody>
  </table>';
  
  // output the HTML content
  $pdf->writeHTMLCell($w='', $h='', $x=15, $y=133, $page1_2, $border=0, $ln=1, $fill=0, $reseth=true, $align='', $autopadding=true);


  $page1_2 = '
<style>
td.one {border-bottom-style: dotted;
  border-bottom-color: #00000;}
two {border-style: dotted solid dashed;}
three {border-style: dotted solid;}
four {border-style: dotted;}
</style>
<table border="0" style="font-size: 12px; padding:10;" >
  <tbody>
    <tr style="text-align: left;">
      <td><b>NAMA KAPAL  </b></td>
      <td class="one" style="width: 250;"><b>: '.$data->{'1_'}.'</b></td>
    </tr>
    <tr style="text-align: left;">
      <td><b>PEMILIK / OPERATOR</b></td>
      <td class="one"><b>: '.$data->{'2_'}.'</b></td>
    </tr>
    <tr style="text-align: left;">
      <td><b>AGENT</b></td>
      <td class="one"><b>: '.$data->{'3_'}.'</b></td>
    </tr>
    <tr style="text-align: left;">
      <td><b>TEMPAT, TANGGAL PEMERIKSAAN</b></td>
      <td class="one"><b>: '.$data->{'4_'}.' , '.date_indo($data->{'5_'}).'</b></td>
    </tr>
    <tr style="text-align: left;">
      <td><b>PEMERIKSA / MARINE INSPECTOR</b></td>
      <td class="one"><b>: '.$data->{'6_'}.'</b></td>
    </tr>
    <tr style="text-align: left;">
      <td><b>NOMOR KARTU MI</b></td>
      <td class="one"><b>: '.$data->{'7_'}.'</b></td>
    </tr>
  </tbody>
</table>';

// output the HTML content
$pdf->writeHTMLCell($w='', $h='', $x=25, $y=170, $page1_2, $border=0, $ln=1, $fill=0, $reseth=true, $align='', $autopadding=true);


$pdf->AddPage();




$page2_2 = '
<style>
td.one {border-bottom-style: dotted;}
two {border-style: dotted solid dashed;}
three {border-style: dotted solid;}
four {border-style: dotted;}
</style>
<table border="0" style="font-size: 11px; padding:1;" >
<tbody>
  <tr style="text-align: left;">
	<td style="width:50px;">1. </td>
    <td style="width:200px;"><b>NAMA KAPAL</b></td>
    <td style="width:250px;" class="one">: '.$data->{'8_'}.'</td>
  </tr>
  <tr style="text-align: left;">
    <td style="width:50px;"></td>
    <td style="width:200px;"><i>Ship’s Name</i></td>
    <td style="width:250px;"></td>
  </tr>
  <tr style="text-align: left;">
    <td style="width:4000px;"></td>
  </tr>
  <tr style="text-align: left;">
	<td style="width:50px;">2. </td>
    <td style="width:200px;"><b>TANDA PANGGIL</b></td>
    <td style="width:250px;" class="one">: '.$data->{'9_'}.'</td>
  </tr>
  <tr style="text-align: left;">
    <td style="width:50px;"></td>
    <td style="width:200px;"><i>Call Sign</i></td>
    <td style="width:250px;"></td>
  </tr>
  <tr style="text-align: left;">
    <td style="width:4000px;"></td>
  </tr>
  
  <tr style="text-align: left;">
	<td style="width:50px;">3. </td>
    <td style="width:200px;"><b>PELABUHAN PENDAFTARAN</b></td>
    <td style="width:250px;" class="one">: '.$data->{'10_'}.'</td>
  </tr>
  <tr style="text-align: left;">
    <td style="width:50px;"></td>
    <td style="width:200px;"><i>Port Registry</i></td>
    <td style="width:250px;"></td>
  </tr>
  <tr style="text-align: left;">
    <td style="width:4000px;"></td>
  </tr>
  
  <tr style="text-align: left;">
	<td style="width:50px;">4. </td>
    <td style="width:200px;"><b>JENIS KAPAL</b></td>
    <td style="width:250px;" class="one">: '.$data->{'11_'}.'</td>
  </tr>
  <tr style="text-align: left;">
    <td style="width:50px;"></td>
    <td style="width:200px;"><i>Type of Ship</i></td>
    <td style="width:250px;"></td>
  </tr>
  <tr style="text-align: left;">
    <td style="width:4000px;"></td>
  </tr>
  
  <tr style="text-align: left;">
	<td style="width:50px;">5. </td>
    <td style="width:200px;"><b>NOMOR IMO</b></td>
    <td style="width:250px;" class="one">: '.$data->{'12_'}.'</td>
  </tr>
  <tr style="text-align: left;">
    <td style="width:50px;"></td>
    <td style="width:200px;"><i>IMO Number</i></td>
    <td style="width:250px;"></td>
  </tr>
  <tr style="text-align: left;">
    <td style="width:4000px;"></td>
  </tr>
  
  <tr style="text-align: left;">
	<td style="width:50px;">6. </td>
    <td style="width:200px;"><b>MASA BERLAKU SERTIFIKAT KONSTRUKSI DAN PERLENGKAPAN </b></td>
    <td style="width:250px;" class="one">: '.$data->{'13_'}.'</td>
  </tr>
  <tr style="text-align: left;">
    <td style="width:50px;"></td>
    <td style="width:200px;"><i>Expiry Date of Cargo Ship Construction and Equipment Certificate</i></td>
    <td style="width:250px;"></td>
  </tr>
  <tr style="text-align: left;">
    <td style="width:4000px;"></td>
  </tr>
  

  <tr style="height: 40px;">
    <td></td>
    <td></td>
    <td></td>
  </tr>
  </tbody>
  </table>';
  
  // output the HTML content
  $pdf->writeHTMLCell($w='', $h='', $x=25, $y=30, $page2_2, $border=0, $ln=1, $fill=0, $reseth=true, $align='', $autopadding=true);

  
$page2_3 = '
<style>
td.one {border-top-style: solid; border-bottom-style: solid; border-right-style: solid; border-width:1;}
td.two {border-top-style: solid; border-bottom-style: solid; border-left-style: solid; border-width:1;}
td.three {border-top-style: solid; border-bottom-style: solid; border-left-style: solid; border-right-style: solid; border-width:1;}
td.four {border-top-style: solid; border-bottom-style: solid; border-width:1;}
</style>
<table style="font-size: 11px; padding:6;" >
  <tbody>
  <tr style="text-align: center;">
	<td style="width:35px;" class="three" rowspan="2"><b>A</b></td>
    <td style="width:595;" class="three" colspan="5"><b>SISTEM PEMADAM KEBAKARAN TETAP RUANG MUAT</b><br> <i>Cargo compartment fix fire extinguisher system</i></td>
  </tr>
  <tr style="text-align: center;">
    <td style="width:225;" class="three"><b>Persyaratan</b><br> <i> Requirements</i></td>
    <td style="width:50px;" class="three"><b>Ya</b><br> <i> Yes</i></td>
    <td style="width:50px;" class="three"><b>Tidak</b><br> <i>No</i></td>
    <td style="width:90px;" class="three"><b>Tidak <br>Dipersyaratkan</b></td>
    <td style="width:180px;" class="three"><b>Keterangan</b><br> <i>Remarks</i></td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:35px; text-align: center;" class="three">1.</td>
    <td style="width:225px; text-align: left;" class="three">Alarm kebakaran untuk ruang muat
    <br><i>Cargo compartment fire alarm</i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->a1_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->a1_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->a1_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'a1_d'}.'</td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:35px; text-align: center;" class="three">2.</td>
    <td style="width:225px; text-align: left;" class="three">Alat deteksi kebakaran diruang muat
    <br><i>Cargo compartment fire detector</i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->a2_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->a2_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->a2_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'a2_d'}.'</td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:35px; text-align: center;" class="three">3.</td>
    <td style="width:225px; text-align: left;" class="three">Kapal memiliki ruangan CO2
    <br><i>The ship has CO2 room</i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->a3_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->a3_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->a3_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'a3_d'}.'</td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:35px; text-align: center;" class="three">4.</td>
    <td style="width:225px; text-align: left;" class="three">Penerangan diruangan CO2
    <br><i>Has light for CO2 room</i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->a4_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->a4_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->a4_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'a4_d'}.'</td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:35px; text-align: center;" class="three">5.</td>
    <td style="width:225px; text-align: left;" class="three">Memiliki tabung pemadam CO2 45kg di ruang CO2
    <br><i>Has CO2 fire extinguisher bottle of
    45kg in CO2 room</i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->a5_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->a5_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->a5_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'a5_d'}.'</td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:35px; text-align: center;" class="three">6.</td>
    <td style="width:225px; text-align: left;" class="three">Jumlah total tabung untuk ruang muat
    <br><i>Total number of bottle for cargo compartment</i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->a6_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->a6_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->a6_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'a6_d'}.'</td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:35px; text-align: center;" class="three">7.</td>
    <td style="width:225px; text-align: left;" class="three">Memiliki katup pengaman tabung 
    <br><i>Has safety valve for the bottle</i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->a7_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->a7_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->a7_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'a7_d'}.'</td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:35px; text-align: center;" class="three">8.</td>
    <td style="width:225px; text-align: left;" class="three">Sistem pipa CO2 kedalam ruang muat 
    <br><i>CO2	piping	system	to	cargo
    compartment</i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->a8_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->a8_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->a8_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'a8_d'}.'</td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:35px; text-align: center;" class="three">9.</td>
    <td style="width:225px; text-align: left;" class="three">Manual pengoperasian sistem CO2 dipajang ditempat yang mudah dibaca  
    <br><i>CO2 system operating manual is
    displayed on the place that can be easily read</i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->a9_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->a9_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->a9_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'a9_d'}.'</td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:35px; text-align: center;" class="three">10.</td>
    <td style="width:225px; text-align: left;" class="three">Sertifikat servis dan inspeksi oleh badan yang berwenang 
    <br><i>Certificate of service and inspection
    by the authorized body</i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->a10_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->a10_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->a10_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'a10_d'}.'</td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:35px; text-align: center;" class="three">11.</td>
    <td style="width:225px; text-align: left;" class="three">Tanggal	pemeriksaan	tekanan terakhir 
    <br><i>Date of last pressure test</i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->a11_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->a11_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->a11_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'a11_d'}.'</td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:35px; text-align: center;" class="three">12.</td>
    <td style="width:225px; text-align: left;" class="three">Tanggal pemeriksaan berat terakhir 
    <br><i>Date of last weighting test</i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->a12_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->a12_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->a12_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'a12_d'}.'</td>
  </tr>


  </tbody>
</table>';

// output the HTML content
$pdf->writeHTMLCell($w='', $h='', $x=15, $y=125, $page2_3, $border=0, $ln=1, $fill=0, $reseth=true, $align='', $autopadding=true);

$pdf->AddPage();
$page2_3 = '
<style>
td.one {border-top-style: solid; border-bottom-style: solid; border-right-style: solid; border-width:1;}
td.two {border-top-style: solid; border-bottom-style: solid; border-left-style: solid; border-width:1;}
td.three {border-top-style: solid; border-bottom-style: solid; border-left-style: solid; border-right-style: solid; border-width:1;}
td.four {border-top-style: solid; border-bottom-style: solid; border-width:1;}
</style>
<table style="font-size: 11px; padding:6;" >
  <tbody>
  <tr style="text-align: center;">
	<td style="width:35px;" class="three" rowspan="2"><b>B</b></td>
    <td style="width:595;" class="three" colspan="5"><b>PALKA DAN TUTUP PALKA</b><br> <i>HATCH AND HATCH COVER</i></td>
  </tr>
  <tr style="text-align: center;">
    
    <td style="width:225;" class="three"><b>Persyaratan</b><br> <i> Requirements</i></td>
    <td style="width:50px;" class="three"><b>Ya</b><br> <i> Yes</i></td>
    <td style="width:50px;" class="three"><b>Tidak</b><br> <i>No</i></td>
    <td style="width:90px;" class="three"><b>Tidak <br>Dipersyaratkan</b></td>
    <td style="width:180px;" class="three"><b>Keterangan</b><br> <i>Remarks</i></td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:35px; text-align: center;" class="three">1.</td>
    <td style="width:225px; text-align: left;" class="three">Kondisi palka
    <br><i>Hatch condition</i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->b1_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->b1_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->b1_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'b1_d'}.'</td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:35px; text-align: center;" class="three">2.</td>
    <td style="width:225px; text-align: left;" class="three">Kondisi ambang palka
    <br><i>Hatch coming condition</i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->b2_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->b2_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->b2_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'b2_d'}.'</td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:35px; text-align: center;" class="three">3.</td>
    <td style="width:225px; text-align: left;" class="three">Kondisi tutup palka
    <br><i>Hatch cover condition</i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->b3_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->b3_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->b3_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'b3_d'}.'</td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:35px; text-align: center;" class="three">4.</td>
    <td style="width:225px; text-align: left;" class="three">Kapal memiliki thermometer untuk mengukur temperature ruang muatan 
    <br><i>The	ship	has	thermometer	for measuring cargo hold temperature</i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->b4_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->b4_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->b4_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'b4_d'}.'</td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:35px; text-align: center;" class="three">5.</td>
    <td style="width:225px; text-align: left;" class="three">Kapal memilki tanda/tulisan peringatan ‘dilarang merokok” yang dapat dipindah-pindahkan
    <br><i>The ship has portable “no smoking”
    warning notice</i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->b5_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->b5_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->b5_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'b5_d'}.'</td>
  </tr>

  

  </tbody>
</table>';

// output the HTML content
$pdf->writeHTMLCell($w='', $h='', $x=15, $y=30, $page2_3, $border=0, $ln=1, $fill=0, $reseth=true, $align='', $autopadding=true);

$page2_3 = '
<style>
td.one {border-top-style: solid; border-bottom-style: solid; border-right-style: solid; border-width:1;}
td.two {border-top-style: solid; border-bottom-style: solid; border-left-style: solid; border-width:1;}
td.three {border-top-style: solid; border-bottom-style: solid; border-left-style: solid; border-right-style: solid; border-width:1;}
td.four {border-top-style: solid; border-bottom-style: solid; border-width:1;}
</style>
<table style="font-size: 11px; padding:6;" >
  <tbody>
  <tr style="text-align: center;">
	<td style="width:35px;" class="three" rowspan="2"><b>C</b></td>
    <td style="width:595;" class="three" colspan="5"><b>SISTEM UTAMA PEMADAM KEBAKARAN</b><br> <i>FIRE EXTINGUISHER MAIN SYSTEM</i></td>
  </tr>
  <tr style="text-align: center;">
    <td style="width:225;" class="three"><b>Persyaratan</b><br> <i> Requirements</i></td>
    <td style="width:50px;" class="three"><b>Ya</b><br> <i> Yes</i></td>
    <td style="width:50px;" class="three"><b>Tidak</b><br> <i>No</i></td>
    <td style="width:90px;" class="three"><b>Tidak <br>Dipersyaratkan</b></td>
    <td style="width:180px;" class="three"><b>Keterangan</b><br> <i>Remarks</i></td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:35px; text-align: center;" class="three">1.</td>
    <td style="width:225px; text-align: left;" class="three">Pompa pemadam kebakaran dikamar mesin berfungsi dengan baik
    <br><i>Fire pump in engine room is in good
    working condition</i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->c1_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->c1_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->c1_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'c1_d'}.'</td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:35px; text-align: center;" class="three">2.</td>
    <td style="width:225px; text-align: left;" class="three">Pompa pemadam kebakaran darurat berfungsi dengan baik
    <br><i>Emergency fire pump is in good
    working condition</i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->c2_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->c2_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->c2_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'c2_d'}.'</td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:35px; text-align: center;" class="three">3.</td>
    <td style="width:225px; text-align: left;" class="three">Hidran	pemadam	kebakaran	di geladak dalam kondisi baik
    <br><i>Fire hydrants on deck are in good condition</i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->c3_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->c3_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->c3_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'c3_d'}.'</td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:35px; text-align: center;" class="three">4.</td>
    <td style="width:225px; text-align: left;" class="three">Selang	pemadam	dan	nozzle pemadam dalam kondisi baik
    <br><i>Fire hose and nozzle are in good
    condition</i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->c4_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->c4_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->c4_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'c4_d'}.'</td>
  </tr>


  </tbody>
</table>';

// output the HTML content
$pdf->writeHTMLCell($w='', $h='', $x=15, $y=145, $page2_3, $border=0, $ln=1, $fill=0, $reseth=true, $align='', $autopadding=true);

$pdf->AddPage();
$page2_3 = '
<style>
td.one {border-top-style: solid; border-bottom-style: solid; border-right-style: solid; border-width:1;}
td.two {border-top-style: solid; border-bottom-style: solid; border-left-style: solid; border-width:1;}
td.three {border-top-style: solid; border-bottom-style: solid; border-left-style: solid; border-right-style: solid; border-width:1;}
td.four {border-top-style: solid; border-bottom-style: solid; border-width:1;}
</style>
<table style="font-size: 11px; padding:6;" >
  <tbody>
  <tr style="text-align: center;">
	<td style="width:35px;" class="three" rowspan="2"><b>D</b></td>
    <td style="width:595;" class="three" colspan="5"><b>PERLENGKAPAN DAN KABEL LISTRIK DI GELADAK</b><br> <i>ELECTRIC CABLE AND EQUIPMENT ON DECK</i></td>
  </tr>
  <tr style="text-align: center;">
    <td style="width:225;" class="three"><b>Persyaratan</b><br> <i> Requirements</i></td>
    <td style="width:50px;" class="three"><b>Ya</b><br> <i> Yes</i></td>
    <td style="width:50px;" class="three"><b>Tidak</b><br> <i>No</i></td>
    <td style="width:90px;" class="three"><b>Tidak <br>Dipersyaratkan</b></td>
    <td style="width:180px;" class="three"><b>Keterangan</b><br> <i>Remarks</i></td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:35px; text-align: center;" class="three">1.</td>
    <td style="width:225px; text-align: left;" class="three">Kabel listrik dari jenis tahan panas 
    <br><i>Electric cable is made from heat proof type</i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->d1_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->d1_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->d1_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'d1_d'}.'</td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:35px; text-align: center;" class="three">2.</td>
    <td style="width:225px; text-align: left;" class="three">Kabel listrik di geladak atau sekat disegel terhadap penetrasi gas atau uap
    <br><i>Electric cable on deck or bulkhead is
    sealed from gas or vapour penetrating</i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->d2_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->d2_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->d2_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'d2_d'}.'</td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:35px; text-align: center;" class="three">3.</td>
    <td style="width:225px; text-align: left;" class="three">Kabel dan perlengkapan listrik lainnya diisolasi dengan baik
    <br><i>Cable and other electrical equipment
    are sealed very well</i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->d3_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->d3_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->d3_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'d3_d'}.'</td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:35px; text-align: center;" class="three">4.</td>
    <td style="width:225px; text-align: left;" class="three">Penerangan didalam palka jika ada diisolasi dengan baik
    <br><i>Light inside the hatch if available is
    sealed very well</i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->d4_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->d4_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->d4_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'d4_d'}.'</td>
  </tr>


  </tbody>
</table>';

// output the HTML content
$pdf->writeHTMLCell($w='', $h='', $x=15, $y=30, $page2_3, $border=0, $ln=1, $fill=0, $reseth=true, $align='', $autopadding=true);

$page2_3 = '
<style>
td.one {border-top-style: solid; border-bottom-style: solid; border-right-style: solid; border-width:1;}
td.two {border-top-style: solid; border-bottom-style: solid; border-left-style: solid; border-width:1;}
td.three {border-top-style: solid; border-bottom-style: solid; border-left-style: solid; border-right-style: solid; border-width:1;}
td.four {border-top-style: solid; border-bottom-style: solid; border-width:1;}
</style>
<table style="font-size: 11px; padding:6;" >
  <tbody>
  <tr style="text-align: center;">
	<td style="width:35px;" class="three" rowspan="2"><b>E</b></td>
    <td style="width:595;" class="three" colspan="5"><b>SISTEM VENTILASI GELADAK</b><br> <i>ON DECK VENTILATION SYSTEM</i></td>
  </tr>
  <tr style="text-align: center;">
    <td style="width:225;" class="three"><b>Persyaratan</b><br> <i> Requirements</i></td>
    <td style="width:50px;" class="three"><b>Ya</b><br> <i> Yes</i></td>
    <td style="width:50px;" class="three"><b>Tidak</b><br> <i>No</i></td>
    <td style="width:90px;" class="three"><b>Tidak <br>Dipersyaratkan</b></td>
    <td style="width:180px;" class="three"><b>Keterangan</b><br> <i>Remarks</i></td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:35px; text-align: center;" class="three">1.</td>
    <td style="width:225px; text-align: left;" class="three">Ruang	palka	dilengkapi	dengan ventilasi mekanis/alami
    <br><i>Cargo compartment is equipped with
    mechanical/natural ventilation</i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->e1_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->e1_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->e1_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'e1_d'}.'</td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:35px; text-align: center;" class="three">2.</td>
    <td style="width:225px; text-align: left;" class="three">Jumlah		ventilasi	cukup		untuk memberikan		sirkulasi	udara		dan mengusir uap dari ruang palka 
    <br><i>Number of ventilation is enough for giving	the	air	circulation	and		to remove any vapor from hold</i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->e2_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->e2_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->e2_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'e2_d'}.'</td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:35px; text-align: center;" class="three">3.</td>
    <td style="width:225px; text-align: left;" class="three">Kipas ventilasi yang dilengkapi dengan motor listrik, diisolasi dengan baik
    <br><i>Any ventilation with electrical motor must be sealed very well</i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->e3_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->e3_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->e3_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'e3_d'}.'</td>
  </tr>

  </tbody>
</table>';

// output the HTML content
$pdf->writeHTMLCell($w='', $h='', $x=15, $y=135, $page2_3, $border=0, $ln=1, $fill=0, $reseth=true, $align='', $autopadding=true);

$page2_3 = '
<style>
td.one {border-top-style: solid; border-bottom-style: solid; border-right-style: solid; border-width:1;}
td.two {border-top-style: solid; border-bottom-style: solid; border-left-style: solid; border-width:1;}
td.three {border-top-style: solid; border-bottom-style: solid; border-left-style: solid; border-right-style: solid; border-width:1;}
td.four {border-top-style: solid; border-bottom-style: solid; border-width:1;}
</style>
<table style="font-size: 11px; padding:6;" >
  <tbody>
  <tr style="text-align: center;">
	<td style="width:35px;" class="three" rowspan="2"><b>F</b></td>
    <td style="width:595;" class="three" colspan="5"><b>SISTEM POMPA BILGA</b><br> <i>BILGE PUMP SYSTEM</i></td>
  </tr>
  <tr style="text-align: center;">
    <td style="width:225;" class="three"><b>Persyaratan</b><br> <i> Requirements</i></td>
    <td style="width:50px;" class="three"><b>Ya</b><br> <i> Yes</i></td>
    <td style="width:50px;" class="three"><b>Tidak</b><br> <i>No</i></td>
    <td style="width:90px;" class="three"><b>Tidak <br>Dipersyaratkan</b></td>
    <td style="width:180px;" class="three"><b>Keterangan</b><br> <i>Remarks</i></td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:35px; text-align: center;" class="three">1.</td>
    <td style="width:225px; text-align: left;" class="three">Pompa bilga berfungsi dengan baik
    <br><i>Bilges pump is working satisfactory</i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->f1_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->f1_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->f1_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'f1_d'}.'</td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:35px; text-align: center;" class="three">2.</td>
    <td style="width:225px; text-align: left;" class="three">Pipa sounding dalam kondisi baik
    <br><i>Sounding pipes are in good condition</i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->f2_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->f2_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->f2_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'f2_d'}.'</td>
  </tr>

  </tbody>
</table>';

// output the HTML content
$pdf->writeHTMLCell($w='', $h='', $x=15, $y=240, $page2_3, $border=0, $ln=1, $fill=0, $reseth=true, $align='', $autopadding=true);

$pdf->AddPage();
$page2_3 = '
<style>
td.one {border-top-style: solid; border-bottom-style: solid; border-right-style: solid; border-width:1;}
td.two {border-top-style: solid; border-bottom-style: solid; border-left-style: solid; border-width:1;}
td.three {border-top-style: solid; border-bottom-style: solid; border-left-style: solid; border-right-style: solid; border-width:1;}
td.four {border-top-style: solid; border-bottom-style: solid; border-width:1;}
</style>
<table style="font-size: 11px; padding:6;" >
  <tbody>
  <tr style="text-align: center;">
	<td style="width:35px;" class="three" rowspan="2"><b>G</b></td>
    <td style="width:595;" class="three" colspan="5"><b>PERLENGKAPAN PERLINDUNGAN PERSONIL</b><br> <i>PERSONAL PROCTECTIVE EQUIPMENT</i></td>
  </tr>
  <tr style="text-align: center;">
    <td style="width:225;" class="three"><b>Persyaratan</b><br> <i> Requirements</i></td>
    <td style="width:50px;" class="three"><b>Ya</b><br> <i> Yes</i></td>
    <td style="width:50px;" class="three"><b>Tidak</b><br> <i>No</i></td>
    <td style="width:90px;" class="three"><b>Tidak <br>Dipersyaratkan</b></td>
    <td style="width:180px;" class="three"><b>Keterangan</b><br> <i>Remarks</i></td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:35px; text-align: center;" class="three">1.</td>
    <td style="width:225px; text-align: left;" class="three">Tersedia	alat	bantu	pernafasan dengan tabung
    <br><i>The ship has self contained breathing
    apparatus equipment</i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->g1_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->g1_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->g1_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'g1_d'}.'</td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:35px; text-align: center;" class="three">2.</td>
    <td style="width:225px; text-align: left;" class="three">Tersedia baju pemadam kebakaran lengkap dengan peralatannya
    <br><i>The ship has complete fireman outfit
    suit</i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->g2_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->g2_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->g2_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'g2_d'}.'</td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:35px; text-align: center;" class="three">3.</td>
    <td style="width:225px; text-align: left;" class="three">Tersedia	baju	kimia	dengan perlengkapannyaa
    <br><i>The ship has chemical suit complete
    with its equipment</i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->g3_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->g3_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->g3_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'g3_d'}.'</td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:35px; text-align: center;" class="three">4.</td>
    <td style="width:225px; text-align: left;" class="three">Tersedia	alat	pendeteksi	gas berbahaya
    <br><i>The ship has toxic gas detector</i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->g4_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->g4_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->g4_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'g4_d'}.'</td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:35px; text-align: center;" class="three">5.</td>
    <td style="width:225px; text-align: left;" class="three">Tanggal terakhir kalibrasi
    <br><i>Date of last calibration</i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->g5_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->g5_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->g5_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'g5_d'}.'</td>
  </tr>

  </tbody>
</table>';

// output the HTML content
$pdf->writeHTMLCell($w='', $h='', $x=15, $y=30, $page2_3, $border=0, $ln=1, $fill=0, $reseth=true, $align='', $autopadding=true);

$page2_3 = '
<style>
td.one {border-top-style: solid; border-bottom-style: solid; border-right-style: solid; border-width:1;}
td.two {border-top-style: solid; border-bottom-style: solid; border-left-style: solid; border-width:1;}
td.three {border-top-style: solid; border-bottom-style: solid; border-left-style: solid; border-right-style: solid; border-width:1;}
td.four {border-top-style: solid; border-bottom-style: solid; border-width:1;}
</style>
<table style="font-size: 11px; padding:6;" >
  <tbody>
    
  <tr style="text-align: center;">
	<td style="width:35px;" class="three" rowspan="2"><b>H</b></td>
    <td style="width:595;" class="three" colspan="5"><b>TABUNG PEMADAM KEBAKARAN JINJING</b><br> <i>PORTABLE FIRE EXTINGUISHER</i></td>
  </tr>
  <tr style="text-align: center;">
    <td style="width:225;" class="three"><b>Persyaratan</b><br> <i> Requirements</i></td>
    <td style="width:50px;" class="three"><b>Ya</b><br> <i> Yes</i></td>
    <td style="width:50px;" class="three"><b>Tidak</b><br> <i>No</i></td>
    <td style="width:90px;" class="three"><b>Tidak <br>Dipersyaratkan</b></td>
    <td style="width:180px;" class="three"><b>Keterangan</b><br> <i>Remarks</i></td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:35px; text-align: center;" class="three">1.</td>
    <td style="width:225px; text-align: left;" class="three">Kapal dilengkapi dengan tabung pemadam kebakaran jinjing untuk ruang muat
    <br><i>The ship is equipment with portable fire extinguisher for cargo compartment</i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->h1_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->h1_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->h1_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'h1_d'}.'</td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:35px; text-align: center;" class="three">2.</td>
    <td style="width:225px; text-align: left;" class="three">Tersedia sertifikat servis dan inspeksi 
    <br><i>oleh badan yang berwenang</i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->h2_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->h2_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->h2_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'h2_d'}.'</td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:35px; text-align: center;" class="three">3.</td>
    <td style="width:225px; text-align: left;" class="three">Tanggal servis terakhir
    <br><i>Date of last service</i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->h3_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->h3_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->h3_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'h3_d'}.'</td>
  </tr>

 

  </tbody>
</table>';

// output the HTML content
$pdf->writeHTMLCell($w='', $h='', $x=15, $y=140, $page2_3, $border=0, $ln=1, $fill=0, $reseth=true, $align='', $autopadding=true);

$page2_3 = '
<style>
td.one {border-top-style: solid; border-bottom-style: solid; border-right-style: solid; border-width:1;}
td.two {border-top-style: solid; border-bottom-style: solid; border-left-style: solid; border-width:1;}
td.three {border-top-style: solid; border-bottom-style: solid; border-left-style: solid; border-right-style: solid; border-width:1;}
td.four {border-top-style: solid; border-bottom-style: solid; border-width:1;}
</style>
<table style="font-size: 11px; padding:6;" >
  <tbody>
    
  <tr style="text-align: center;">
	<td style="width:35px;" class="three" rowspan="2"><b>I</b></td>
    <td style="width:595;" class="three" colspan="5"><b>INSULASI DINDING RUANG PERMESINAN</b><br> <i>ENGINE ROOM INSULATION BULKHEAD</i></td>
  </tr>
  <tr style="text-align: center;">
    <td style="width:225;" class="three"><b>Persyaratan</b><br> <i> Requirements</i></td>
    <td style="width:50px;" class="three"><b>Ya</b><br> <i> Yes</i></td>
    <td style="width:50px;" class="three"><b>Tidak</b><br> <i>No</i></td>
    <td style="width:90px;" class="three"><b>Tidak <br>Dipersyaratkan</b></td>
    <td style="width:180px;" class="three"><b>Keterangan</b><br> <i>Remarks</i></td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:35px; text-align: center;" class="three">1.</td>
    <td style="width:225px; text-align: left;" class="three">Dinding kamar mesin yang berbatasan dengan ruang muat diinsulasi standar A-60
    <br><i>Engine room bulkhead close to cargo compartment is insulated with A-60 standard</i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->i1_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->i1_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->i1_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'i1_d'}.'</td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:35px; text-align: center;" class="three">2.</td>
    <td style="width:225px; text-align: left;" class="three">Palka	yang	berbatasan	langsung dengan tanki bahan bakar
    <br><i></i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->i2_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->i2_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->i2_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'i2_d'}.'</td>
  </tr>

  </tbody>
</table>';

// output the HTML content
$pdf->writeHTMLCell($w='', $h='', $x=15, $y=225, $page2_3, $border=0, $ln=1, $fill=0, $reseth=true, $align='', $autopadding=true);

$pdf->AddPage();
$page2_3 = '
<style>
td.one {border-top-style: solid; border-bottom-style: solid; border-right-style: solid; border-width:1;}
td.two {border-top-style: solid; border-bottom-style: solid; border-left-style: solid; border-width:1;}
td.three {border-top-style: solid; border-bottom-style: solid; border-left-style: solid; border-right-style: solid; border-width:1;}
td.four {border-top-style: solid; border-bottom-style: solid; border-width:1;}
</style>
<table style="font-size: 11px; padding:6;" >
  <tbody>
    
  <tr style="text-align: center;">
	<td style="width:35px;" class="three" rowspan="2"><b>J</b></td>
    <td style="width:595;" class="three" colspan="5"><b>LAINNYA</b><br> <i>OTHERS</i></td>
  </tr>
  <tr style="text-align: center;">
    <td style="width:225;" class="three"><b>Persyaratan</b><br> <i> Requirements</i></td>
    <td style="width:50px;" class="three"><b>Ya</b><br> <i> Yes</i></td>
    <td style="width:50px;" class="three"><b>Tidak</b><br> <i>No</i></td>
    <td style="width:90px;" class="three"><b>Tidak <br>Dipersyaratkan</b></td>
    <td style="width:180px;" class="three"><b>Keterangan</b><br> <i>Remarks</i></td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:35px; text-align: center;" class="three">1.</td>
    <td style="width:225px; text-align: left;" class="three">Kapal memiliki edisi terbaru buku IMO Code, buku diatas kapal adalah edisi 
    <br><i>The ship has latest edition of IMDG Code	books,   edition	available	on
    board</i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->j1_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->j1_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->j1_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'j1_d'}.'</td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:35px; text-align: center;" class="three">2.</td>
    <td style="width:225px; text-align: left;" class="three">Kapal memilki perlengkapan P3k 
    <br><i>The ship has medical first aid kits</i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->j2_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->j2_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->j2_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'j2_d'}.'</td>
  </tr>

  </tbody>
</table>';

// output the HTML content
$pdf->writeHTMLCell($w='', $h='', $x=15, $y=30, $page2_3, $border=0, $ln=1, $fill=0, $reseth=true, $align='', $autopadding=true);


$page2_3 = '
<style>
td.one {border-top-style: solid; border-bottom-style: solid; border-right-style: solid; border-width:1;}
td.two {border-top-style: solid; border-bottom-style: solid; border-left-style: solid; border-width:1;}
td.three {border-top-style: solid; border-bottom-style: solid; border-left-style: solid; border-right-style: solid; border-width:1;}
td.four {border-top-style: solid; border-bottom-style: solid; border-width:1;}
</style>
<table style="font-size: 11px; padding:6;" >
  <tbody>
    
  <tr style="text-align: center;">
    <td style="width:200;" class="three"><b>KELAS</b><br> <i>CLASS</i></td>
    <td style="width:215px;" class="three"><b>PERSYARATAN KHUSUS</b> <br>SPECIAL REQUIREMENT</td>
	<td style="width:215px;" class="three"><b>KETERANGAN</b> <br>REMARKS</td>
  </tr>';
  foreach($data_detail as $row){
  
$page2_3 .= '  <tr style="text-align: center;">
				<td style="width:200;" class="three">'.$row->kelas.'</td>
				<td style="width:215px;" class="three">'.$row->persyaratan.'</td>
				<td style="width:215px;" class="three">'.$row->keterangan.'</td>
			  </tr>';
  
  }


$page2_3 .='  <tr style="text-align: center;">
				<td style="width:630;"></td>
			  </tr>
			  <tr style="text-align: center;">
				<td style="width:630;"></td>
			  </tr>
			  
			  <tr style="text-align: center;">
				<td style="width:630;" class="three"><b>REKOMENDASI MARINE INSPECTOR :</b></td>
			  </tr>
			  <tr style="text-align: center;">
				<td style="width:630; height:250;" class="three">'.$data->z1.'</td>
			  </tr>
			  
			  <tr style="text-align: center;">
				<td style="width:630;"></td>
			  </tr>
			  <tr style="text-align: center;">
				<td style="width:630;"></td>
			  </tr>
			  <tr style="text-align: center;">
				<table style="padding:0">

				  <tr style="text-align: center;">
					<td style="width:80px; text-align: center;"></td>
					<td style="width:50px; text-align: right;"></td>
					<td style="width:100px; text-align: center;">MENGETAHUI</td>
					<td style="width:150px; text-align: center;"></td>
					<td style="width:150px; text-align: center;">'.$data->z2.','.date_indo($data->z3).'</td>
				  </tr>

				  <tr style="text-align: center;">
					<td style="width:80px; text-align: center;"></td>
					<td style="width:50px; text-align: right;"></td>
					<td style="width:100px; text-align: center;">Acknowledge</td>
					<td style="width:150px; text-align: center;"></td>
					<td style="width:150px; text-align: center;">MARINE INSPECTOR</td>
				  </tr>
					<tr style="height: 400px;">
					  <td style="width:20px;"></td>
					</tr>
					<tr style="height: 400px;">
					  <td style="width:20px;"></td>
					</tr>
					<tr style="height: 400px;">
					  <td style="width:20px;"></td>
					</tr>
					<tr style="height: 400px;">
					  <td style="width:20px;"></td>
					</tr>
					<tr style="height: 400px;">
					  <td style="width:20px;"></td>
					</tr>

				  <tr style="text-align: center;">
					<td style="width:80px; text-align: center;"></td>
					<td style="width:50px; text-align: right;"></td>
					<td style="width:100px; text-align: center;"><u>'.$data->z4.'</u></td>
					<td style="width:150px; text-align: center;"></td>
					<td style="width:150px; text-align: center;"><u>'.$data->z6.'</u></td>
				  </tr>

				  <tr style="text-align: center;">
					<td style="width:80px; text-align: center;"></td>
					<td style="width:50px; text-align: right;"></td>
					<td style="width:100px; text-align: center;">MASTER OF  '.$data->z5.'</td>
					<td style="width:150px; text-align: center;"></td>
					<td style="width:150px; text-align: center;">NIP/MI No. '.$data->z7.'</td>
				  </tr>
				</table>
			  </tr>
  </tbody>
</table>';

// output the HTML content
$pdf->writeHTMLCell($w='', $h='', $x=15, $y=100, $page2_3, $border=0, $ln=1, $fill=0, $reseth=true, $align='', $autopadding=true);

$pdf->lastPage();

// ---------------------------------------------------------
ob_clean();

$pdf->Output($title.'.pdf', 'I');
//============================================================+
// END OF FILE
//============================================================+

?>