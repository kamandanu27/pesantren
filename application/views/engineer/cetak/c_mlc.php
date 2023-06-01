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

$page1_2 = '<table border="0" style="font-size: 12px;">
    <tbody>
      <tr style="text-align: center;">
        <td><b>LAPORAN PEMERIKSAAN</b></td>
      </tr>
      <tr style="text-align: center;">
        <td><b>KAPAL DALAM RANGKA SERTIFIKASI MARITIME LABOUR CONVENTION (MLC) 2006</b></td>
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
      <td class="one" style="width: 220px;"><b>: '.$data->a1.'</b></td>
    </tr>
    <tr style="text-align: left;">
      <td><b>PEMILIK / OPERATOR</b></td>
      <td class="one"><b>: '.$data->a2.'</b></td>
    </tr>
    <tr style="text-align: left;">
      <td><b>AGENT</b></td>
      <td class="one"><b>: '.$data->a3.'</b></td>
    </tr>
    <tr style="text-align: left;">
      <td><b>TEMPAT, TANGGAL PEMERIKSAAN</b></td>
      <td class="one"><b>: '.$data->b3.' , '.date_indo($data->a4).'</b></td>
    </tr>
    <tr style="text-align: left;">
      <td><b>PEMERIKSA / MARINE INSPECTOR</b></td>
      <td class="one"><b>: '.$data->a5.'</b></td>
    </tr>
    <tr style="text-align: left;">
      <td><b>NOMOR KARTU MI</b></td>
      <td class="one"><b>: '.$data->a6.'</b></td>
    </tr>
  </tbody>
</table>';

// output the HTML content
$pdf->writeHTMLCell($w='', $h='', $x=30, $y=170, $page1_2, $border=0, $ln=1, $fill=0, $reseth=true, $align='', $autopadding=true);

$page1_3 = '
<style>
td.one {border-top-style: solid; border-bottom-style: solid; border-right-style: solid; border-width:1;}
td.two {border-top-style: solid; border-bottom-style: solid; border-left-style: solid; border-width:1;}
td.three {border-top-style: solid; border-bottom-style: solid; border-left-style: solid; border-right-style: solid; border-width:1;}
td.four {border-top-style: solid; border-bottom-style: solid; border-width:1;}
</style>
<table style="font-size: 11px; padding:6;" >
<tbody>
  
<tr style="text-align: center;">
  <td style="width:530px;" class="three"><b>LAPORAN SINGKAT TENTANG PEMENUHAN KAPAL TERHADAP<br> MARITIME LABOUR CONVENTION (MLC) 2006</b></td>
</tr>

</tbody>
</table>';

// output the HTML content
$pdf->writeHTMLCell($w='', $h='', $x=30, $y=270, $page1_3, $border=0, $ln=1, $fill=0, $reseth=true, $align='', $autopadding=true);

$pdf->AddPage();

$page2_1 = '
<style>
td.one {border-bottom-style: dotted;}
two {border-style: dotted solid dashed;}
three {border-style: dotted solid;}
four {border-style: dotted;}
</style>
<table border="0" style="font-size: 11px; padding:6;" >
<tbody>
  <tr style="text-align: left;">
    <td style="width:105px;"><b>NAMA KAPAL :</b></td>
    <td style="width:160px;" class="one"> '.$data->b1.'</td>
    <td style="width:10px;"></td>
    <td colspan="2" style="width:55px;"><b>MILIK :</b></td>
    <td style="width:220px;" class="one">'.$data->b2.'</td>
  </tr>
  <tr style="text-align: left;">
    <td style="width:190px;"><b>PEMERIKSAAN DILAKUKAN DI : </b></td>
    <td style="width:120px;" class="one">'.$data->b3.'</td>
    <td style="width:10px;"></td>
    <td colspan="2" style="width:115px;"><b>PADA TANGGAL : </b></td>
    <td style="width:120px;" class="one">'.date_indo($data->b4).'</td>
  </tr>
  <tr style="text-align: left;">
    <td style="width:55px;"><b>OLEH:</b></td>
    <td style="width:200px;" class="one">'.$data->b5.'</td>
    <td style="width:10px;"></td>
    <td colspan="2" style="width:135px;"><b>MARINE INSPECTOR      :</b></td>
    <td style="width:150px;" class="one">'.$data->b6.'</td>
  </tr>

  <tr style="height: 40px;">
    <td></td>
    <td></td>
    <td></td>
  </tr>
  </tbody>
  </table>';
  
  // output the HTML content
  $pdf->writeHTMLCell($w='', $h='', $x=25, $y=30, $page2_1, $border=0, $ln=1, $fill=0, $reseth=true, $align='', $autopadding=true);

$page2_2 = '
<style>
td.one {border-top-style: solid; border-bottom-style: solid; border-right-style: solid; border-width:1;}
td.two {border-top-style: solid; border-bottom-style: solid; border-left-style: solid; border-width:1;}
td.three {border-top-style: solid; border-bottom-style: solid; border-left-style: solid; border-right-style: solid; border-width:1;}
td.four {border-top-style: solid; border-bottom-style: solid; border-width:1;}
</style>
<table style="font-size: 11px; padding:6;" >
<tbody>
  
<tr style="text-align: center;">
<td style="width:35px;" class="three"><b>No</b><br> <i> No</i></td>
<td style="width:200px;" class="three"><b>Persyaratan</b><br> <i> Requirements</i></td>
<td style="width:50px;" class="three"><b>Ya</b><br> <i> Yes</i></td>
<td style="width:50px;" class="three"><b>Tidak</b><br> <i>No</i></td>
<td style="width:90px;" class="three"><b>Tidak <br>Dipersyaratkan</b></td>
<td style="width:140px;" class="three"><b>Keterangan</b><br> <i>Remarks</i></td>
</tr>

<tr style="text-align: center;">
<td style="width:35px; text-align: center;" class="three">1.</td>
<td style="width:200px; text-align: left;" class="three">
Persyaratan-persyaratan minimum bagi
awak kapal yang bekerja di atas kapal
<br>
<i>Minimum requirements for seafarers to
work on a ship</i>
</td>
<td style="width:50px; text-align: center;" class="three">'.($data->c1_a == '1' ? $check : '').'</td>
<td style="width:50x; text-align: center;" class="three">'.($data->c1_b == '1' ? $check : '').'</td>
<td style="width:90px; text-align: center;" class="three">'.($data->c1_c == '1' ? $check : '').'</td>
<td style="width:140px; text-align: center;" class="three">'.$data->{'c1_d'}.'</td>
</tr>

<tr style="text-align: center;">
<td style="width:35px; text-align: center;" class="three">2.</td>
<td style="width:200px; text-align: left;" class="three">
Kondis kerja
<br>
<i>Condition of employment</i>

</td>
<td style="width:50px; text-align: center;" class="three">'.($data->c2_a == '1' ? $check : '').'</td>
<td style="width:50x; text-align: center;" class="three">'.($data->c2_b == '1' ? $check : '').'</td>
<td style="width:90px; text-align: center;" class="three">'.($data->c2_c == '1' ? $check : '').'</td>
<td style="width:140px; text-align: center;" class="three">'.$data->{'c2_d'}.'</td>
</tr>

<tr style="text-align: center;">
<td style="width:35px; text-align: center;" class="three">3.</td>
<td style="width:200px; text-align: left;" class="three">
Akomodasi, fasilitas rekreasi, makanan
dan katering
<br>
<i>Accommodation, recreational facilities,
food and catering</i>
</td>
<td style="width:50px; text-align: center;" class="three">'.($data->c3_a == '1' ? $check : '').'</td>
<td style="width:50x; text-align: center;" class="three">'.($data->c3_b == '1' ? $check : '').'</td>
<td style="width:90px; text-align: center;" class="three">'.($data->c3_c == '1' ? $check : '').'</td>
<td style="width:140px; text-align: center;" class="three">'.$data->{'c3_d'}.'</td>
</tr>

<tr style="text-align: center;">
<td style="width:35px; text-align: center;" class="three">4.</td>
<td style="width:200px; text-align: left;" class="three">
Perlindungan kesehatan, perawatan medis, kesejahteraan dan jaminan sosial.
<br>
<i>Health protection, medical care, welfare and social security protection</i>

</td>
<td style="width:50px; text-align: center;" class="three">'.($data->c4_a == '1' ? $check : '').'</td>
<td style="width:50x; text-align: center;" class="three">'.($data->c4_b == '1' ? $check : '').'</td>
<td style="width:90px; text-align: center;" class="three">'.($data->c4_c == '1' ? $check : '').'</td>
<td style="width:140px; text-align: center;" class="three">'.$data->{'c4_d'}.'</td>
</tr>

<tr style="text-align: center;">
<td style="width:35px; text-align: center;" class="three">5.</td>
<td style="width:200px; text-align: left;" class="three">
Pemenuhan dan penegakan Compliance and enforcement

</td>
<td style="width:50px; text-align: center;" class="three">'.($data->c5_a == '1' ? $check : '').'</td>
<td style="width:50x; text-align: center;" class="three">'.($data->c5_b == '1' ? $check : '').'</td>
<td style="width:90px; text-align: center;" class="three">'.($data->c5_c == '1' ? $check : '').'</td>
<td style="width:140px; text-align: center;" class="three">'.$data->{'c5_d'}.'</td>
</tr>

</tbody>
</table>';

// output the HTML content
$pdf->writeHTMLCell($w='', $h='', $x=25, $y=60, $page2_2, $border=0, $ln=1, $fill=0, $reseth=true, $align='', $autopadding=true);

$pdf->AddPage();

$page3_1 = '
<style>
td.one {border-top-style: solid; border-bottom-style: solid; border-right-style: solid; border-width:1;}
td.two {border-top-style: solid; border-bottom-style: solid; border-left-style: solid; border-width:1;}
td.three {border-top-style: solid; border-bottom-style: solid; border-left-style: solid; border-right-style: solid; border-width:1;}
td.four {border-top-style: solid; border-bottom-style: solid; border-width:1;}
</style>
<table style="font-size: 11px; padding:6;" >
<tbody>
  
  <tr style="text-align: center;">
    <td style="width:565px;" class="three"><b>USIA MINIMUM, REGULASI 1.1<br><i>MINIMUM AGE, REGULATION 1.1</i></b></td>
  </tr>
  <tr style="text-align: center;">
    <td style="width:35px;" class="three"><b>No</b><br> <i> No</i></td>
    <td style="width:200px;" class="three"><b>Persyaratan</b><br> <i> Requirements</i></td>
    <td style="width:50px;" class="three"><b>Ya</b><br> <i> Yes</i></td>
    <td style="width:50px;" class="three"><b>Tidak</b><br> <i>No</i></td>
    <td style="width:90x;" class="three"><b>Tidak Dipersyaratkan</b></td>
    <td style="width:140x;" class="three"><b>Keterangan</b><br> <i>Remarks</i></td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:35px; text-align: center;" class="three">1.</td>
    <td style="width:200px; text-align: left;" class="three">Orang-orang dengan umur di bawah 16 tahun tidak boleh dipekerjakan atau diberi tugas atau bekerja diatas kapal.
    <br><i>Persons below the age of 16 shall not be
    employed or engaged or work on a ship
    (Standard Al. 1, paragraph 1).</i>    
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->d1_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->d1_b == '1' ? $check : '').'</td>
    <td style="width:90x; text-align: center;" class="three">'.($data->d1_c == '1' ? $check : '').'</td>
    <td style="width:140x; text-align: center;" class="three">'.$data->{'d1_d'}.'</td>
  </tr>

  <tr style="text-align: center;">
  <td style="width:35px; text-align: center;" class="three">2.</td>
  <td style="width:200px; text-align: left;" class="three">Pelaut-pelaut dengan umur di bawah 18 tahun tidak boleh dipekerjakan atau diberi tugas pada tempat yang dapat membahayakan kesehatan dan keselamatan mereka
  <br><i>Seafarers under the age of 18 shall not be employed or engaged or work where the work is likely to jeopardize their health or safety (Standard Al. 1, paragraph 4).</i>
    
  </td>
  <td style="width:50px; text-align: center;" class="three">'.($data->d2_a == '1' ? $check : '').'</td>
  <td style="width:50x; text-align: center;" class="three">'.($data->d2_b == '1' ? $check : '').'</td>
  <td style="width:90x; text-align: center;" class="three">'.($data->d2_c == '1' ? $check : '').'</td>
  <td style="width:140x; text-align: center;" class="three">'.$data->{'d2_d'}.'</td>
</tr>

<tr style="text-align: center;">
  <td style="width:35px; text-align: center;" class="three">3.</td>
  <td style="width:200px; text-align: left;" class="three">Perhatian khusus untuk pelaut-pelaut dengan umur di bawah 18 harus diberikan untuk keselamatan dan kesehatan sesuai dengan aturan nasional.
  <br><i>Special attention must be paid to the safety and health of seafarers under the age of 18, in accordance with national laws and regulations (Standard A4.3, paragraph 2(b)).</i>
  </td>
  <td style="width:50px; text-align: center;" class="three">'.($data->d3_a == '1' ? $check : '').'</td>
  <td style="width:50x; text-align: center;" class="three">'.($data->d3_b == '1' ? $check : '').'</td>
  <td style="width:90x; text-align: center;" class="three">'.($data->d3_c == '1' ? $check : '').'</td>
  <td style="width:140x; text-align: center;" class="three">'.$data->{'d3_d'}.'</td>
</tr>

<tr style="text-align: center;">
  <td style="width:35px; text-align: center;" class="three">4.</td>
  <td style="width:200px; text-align: left;" class="three">Dilarang kerja malam untuk pelaut-pelaut dengan umur di bawah 18 tahun pengecualian perpanjangan waktu kerja dibuat oleh pemerintah dalam kegiatan pelatihan.
  <br><i>Night work for seafarers under the age of 18 is prohibited, except to the extent that an exemption has been made by the competent authority under Standard Al. 1, paragraph 3, in the case of training programmes (Standard Al. 1, paragraph - 2).</i>

  </td>
  <td style="width:50px; text-align: center;" class="three">'.($data->d4_a == '1' ? $check : '').'</td>
  <td style="width:50x; text-align: center;" class="three">'.($data->d4_b == '1' ? $check : '').'</td>
  <td style="width:90x; text-align: center;" class="three">'.($data->d4_c == '1' ? $check : '').'</td>
  <td style="width:140x; text-align: center;" class="three">'.$data->{'d4_d'}.'</td>
</tr>


</tbody>
</table>';

// output the HTML content
$pdf->writeHTMLCell($w='', $h='', $x=25, $y=30, $page3_1, $border=0, $ln=1, $fill=0, $reseth=true, $align='', $autopadding=true);

$pdf->AddPage();

$page4_1 = '
<style>
td.one {border-top-style: solid; border-bottom-style: solid; border-right-style: solid; border-width:1;}
td.two {border-top-style: solid; border-bottom-style: solid; border-left-style: solid; border-width:1;}
td.three {border-top-style: solid; border-bottom-style: solid; border-left-style: solid; border-right-style: solid; border-width:1;}
td.four {border-top-style: solid; border-bottom-style: solid; border-width:1;}
</style>
<table style="font-size: 11px; padding:6;" >
<tbody>
  
  <tr style="text-align: center;">
    <td style="width:565px;" class="three"><b>SERTIFIKAT KESEHATAN, REGULASI 1.2<br><i>MEDICAL CERTIFICATE, REGULATION 1.2</i></b></td>
  </tr>
  <tr style="text-align: center;">
    <td style="width:35px;" class="three"><b>No</b><br> <i> No</i></td>
    <td style="width:200px;" class="three"><b>Persyaratan</b><br> <i> Requirements</i></td>
    <td style="width:50px;" class="three"><b>Ya</b><br> <i> Yes</i></td>
    <td style="width:50px;" class="three"><b>Tidak</b><br> <i>No</i></td>
    <td style="width:90x;" class="three"><b>Tidak Dipersyaratkan</b></td>
    <td style="width:140x;" class="three"><b>Keterangan</b><br> <i>Remarks</i></td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:35px; text-align: center;" class="three">1.</td>
    <td style="width:200px; text-align: left;" class="three">Pelaut tidak dibolehkan bekerja di atas kapal kecuali memiliki Sertifikat Kesehatan yang menyatakan bahwa sehat untuk melaksanakan tugas di atas kapal.
    <br><i>Seafarers are not allowed to work on a
    ship unless they are certified * as
    medically fit to perform their duties.
    </i>    
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->e1_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->e1_b == '1' ? $check : '').'</td>
    <td style="width:90x; text-align: center;" class="three">'.($data->e1_c == '1' ? $check : '').'</td>
    <td style="width:140x; text-align: center;" class="three">'.$data->{'e1_d'}.'</td>
  </tr>

  <tr style="text-align: center;">
  <td style="width:35px; text-align: center;" class="three">2.</td>
  <td style="width:200px; text-align: left;" class="three">Untuk pelaut-pelaut yang bekerja di atas
  kapal-kapal yang melaksanakan
  pelayaran internasional, Sertifikat
  Kesehatan harus dalam Bahasa Inggris.  
  <br><i>For seafarers working on ships ordinarily
  engaged on international voyages the
  certificate must be provided in English
  (Standard A 1.2, paragraph 10).</i>
    
  </td>
  <td style="width:50px; text-align: center;" class="three">'.($data->e2_a == '1' ? $check : '').'</td>
  <td style="width:50x; text-align: center;" class="three">'.($data->e2_b == '1' ? $check : '').'</td>
  <td style="width:90x; text-align: center;" class="three">'.($data->e2_c == '1' ? $check : '').'</td>
  <td style="width:140x; text-align: center;" class="three">'.$data->{'e2_d'}.'</td>
</tr>

<tr style="text-align: center;">
  <td style="width:35px; text-align: center;" class="three">3.</td>
  <td style="width:200px; text-align: left;" class="three">Sertifikat Kesehatan harus dikeluarkan
  oleh praktisi kesehatan dan harus masih
  tetap berlaku saat di atas kapal.  
  <br><i>The medical certificate must have been
  issued by a duly qualified medical
  practitioner and must be still valid.</i>
  </td>
  <td style="width:50px; text-align: center;" class="three">'.($data->e3_a == '1' ? $check : '').'</td>
  <td style="width:50x; text-align: center;" class="three">'.($data->e3_b == '1' ? $check : '').'</td>
  <td style="width:90x; text-align: center;" class="three">'.($data->e3_c == '1' ? $check : '').'</td>
  <td style="width:140x; text-align: center;" class="three">'.$data->{'e3_d'}.'</td>
</tr>

<tr style="text-align: center;">
  <td style="width:35px; text-align: center;" class="three">4.</td>
  <td colspan="5" style="width:530px; text-align: left;" class="three">Periode masa berlaku sertifikat
  kesehatan adalah sesuai aturan nasional
  berikut:  
  <br><i>The period of validity for a certificate is
  determined under national law in
  accordance with the following:
  </i>
  </td>
</tr>

<tr style="text-align: center;">
  <td style="width:35px; text-align: center;" class="three">-</td>
  <td style="width:200px; text-align: left;" class="three">Maksimum 2 tahun untuk sertifikat
  kesehatan kecuali untuk pelaut
  dengan umur dibawah 18 tahun
  selama 1 tahun.
  <br><i>two-year maximum for medical
  certificates except for seafarers under
 18; then it is one year,</i>
  </td>
  <td style="width:50px; text-align: center;" class="three">'.($data->e4_1_a == '1' ? $check : '').'</td>
  <td style="width:50x; text-align: center;" class="three">'.($data->e4_1_b == '1' ? $check : '').'</td>
  <td style="width:90x; text-align: center;" class="three">'.($data->e4_1_c == '1' ? $check : '').'</td>
  <td style="width:140x; text-align: center;" class="three">'.$data->{'e4_1_d'}.'</td>
</tr>
<tr style="text-align: center;">
  <td style="width:35px; text-align: center;" class="three">-</td>
  <td style="width:200px; text-align: left;" class="three">Maksimum 6 tahun untuk sertifikat
  bebas buta warna.
  <br><i>six-year maximum for a colour vision
  certificate.</i>
  </td>
  <td style="width:50px; text-align: center;" class="three">'.($data->e4_2_a == '1' ? $check : '').'</td>
  <td style="width:50x; text-align: center;" class="three">'.($data->e4_2_b == '1' ? $check : '').'</td>
  <td style="width:90x; text-align: center;" class="three">'.($data->e4_2_c == '1' ? $check : '').'</td>
  <td style="width:140x; text-align: center;" class="three">'.$data->{'e4_2_d'}.'</td>
</tr>


</tbody>
</table>';

// output the HTML content
$pdf->writeHTMLCell($w='', $h='', $x=25, $y=30, $page4_1, $border=0, $ln=1, $fill=0, $reseth=true, $align='', $autopadding=true);

$pdf->AddPage();

$page5_1 = '
<style>
td.one {border-top-style: solid; border-bottom-style: solid; border-right-style: solid; border-width:1;}
td.two {border-top-style: solid; border-bottom-style: solid; border-left-style: solid; border-width:1;}
td.three {border-top-style: solid; border-bottom-style: solid; border-left-style: solid; border-right-style: solid; border-width:1;}
td.four {border-top-style: solid; border-bottom-style: solid; border-width:1;}
</style>
<table style="font-size: 11px; padding:6;" >
<tbody>
  
  <tr style="text-align: center;">
    <td style="width:565px;" class="three"><b>PELATIHAN DAN KUALIFIKASI, REGULASI 1.3<br><i>TRAINING AND QUALIFICATIONS, REGULATION 1.3</i></b></td>
  </tr>
  <tr style="text-align: center;">
    <td style="width:35px;" class="three"><b>No</b><br> <i> No</i></td>
    <td style="width:200px;" class="three"><b>Persyaratan</b><br> <i> Requirements</i></td>
    <td style="width:50px;" class="three"><b>Ya</b><br> <i> Yes</i></td>
    <td style="width:50px;" class="three"><b>Tidak</b><br> <i>No</i></td>
    <td style="width:90x;" class="three"><b>Tidak Dipersyaratkan</b></td>
    <td style="width:140x;" class="three"><b>Keterangan</b><br> <i>Remarks</i></td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:35px; text-align: center;" class="three">1.</td>
    <td style="width:200px; text-align: left;" class="three">Setiap pelaut harus telah mengikuti
    pelatihan dan memiliki sertifikat keahlian
    atau kualifikasi lain untuk melaksanakan
    tugas sesuai dengan peraturan nasional    
    <br><i>Seafarers must be trained or certified * as
    competent or otherwise qualified to
    perform their duties in accordance with
    flag State requirements.    
    </i>    
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->f1_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->f1_b == '1' ? $check : '').'</td>
    <td style="width:90x; text-align: center;" class="three">'.($data->f1_c == '1' ? $check : '').'</td>
    <td style="width:140x; text-align: center;" class="three">'.$data->{'f1_d'}.'</td>
  </tr>

  <tr style="text-align: center;">
  <td style="width:35px; text-align: center;" class="three">2.</td>
  <td style="width:200px; text-align: left;" class="three">Setiap pelaut harus telah selesai
  mengikuti pelatihan keselamatan din dasar di atas kapal.  
  <br><i>Seafarers must have successfully
  completed training for personal safety on
  board ship</i>
    
  </td>
  <td style="width:50px; text-align: center;" class="three">'.($data->f2_a == '1' ? $check : '').'</td>
  <td style="width:50x; text-align: center;" class="three">'.($data->f2_b == '1' ? $check : '').'</td>
  <td style="width:90x; text-align: center;" class="three">'.($data->f2_c == '1' ? $check : '').'</td>
  <td style="width:140x; text-align: center;" class="three">'.$data->{'f2_d'}.'</td>
</tr>


</tbody>
</table>';

// output the HTML content
$pdf->writeHTMLCell($w='', $h='', $x=25, $y=30, $page5_1, $border=0, $ln=1, $fill=0, $reseth=true, $align='', $autopadding=true);

$pdf->AddPage();

$page6_1 = '
<style>
td.one {border-top-style: solid; border-bottom-style: solid; border-right-style: solid; border-width:1;}
td.two {border-top-style: solid; border-bottom-style: solid; border-left-style: solid; border-width:1;}
td.three {border-top-style: solid; border-bottom-style: solid; border-left-style: solid; border-right-style: solid; border-width:1;}
td.four {border-top-style: solid; border-bottom-style: solid; border-width:1;}
</style>
<table style="font-size: 11px; padding:6;" >
<tbody>
  
  <tr style="text-align: center;">
    <td style="width:565px;" class="three"><b>PEREKRUTAN DAN PENEMPATAN, REGULASI 1.4<br><i>RECRUITMENT AND PLACEMENT, REGULATION 1.4</i></b></td>
  </tr>
  <tr style="text-align: center;">
    <td style="width:35px;" class="three"><b>No</b><br> <i> No</i></td>
    <td style="width:200px;" class="three"><b>Persyaratan</b><br> <i> Requirements</i></td>
    <td style="width:50px;" class="three"><b>Ya</b><br> <i> Yes</i></td>
    <td style="width:50px;" class="three"><b>Tidak</b><br> <i>No</i></td>
    <td style="width:90x;" class="three"><b>Tidak Dipersyaratkan</b></td>
    <td style="width:140x;" class="three"><b>Keterangan</b><br> <i>Remarks</i></td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:35px; text-align: center;" class="three">1.</td>
    <td style="width:200px; text-align: left;" class="three">Jika pemilik kapal menggunakan
    perusahaan swasta perekrutan dan
    penempatan awak kapal, perusahaan
    tersebut harus terdaftar dan disertifikasi
    sesuai MLC, 2006    
    <br><i>Where a shipowner has used a private
    seafarer recruitment and placement
    service, * it must be licensed or certified
    or regulated in accordance with the MLC, 2006.        
    </i>    
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->g1_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->g1_b == '1' ? $check : '').'</td>
    <td style="width:90x; text-align: center;" class="three">'.($data->g1_c == '1' ? $check : '').'</td>
    <td style="width:140x; text-align: center;" class="three">'.$data->{'g1_d'}.'</td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:35px; text-align: center;" class="three">2.</td>
    <td style="width:200px; text-align: left;" class="three">Pelaut-pelaut tidak boleh dipungut biaya
    dalam menggunakan Iayanan perusahaan
    perekrutan dan penempatan tersebut.   
    <br><i>Seafarers shall not be charged for use of
    these services</i>
      
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->g2_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->g2_b == '1' ? $check : '').'</td>
    <td style="width:90x; text-align: center;" class="three">'.($data->g2_c == '1' ? $check : '').'</td>
    <td style="width:140x; text-align: center;" class="three">'.$data->{'g2_d'}.'</td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:35px; text-align: center;" class="three">3.</td>
    <td style="width:200px; text-align: left;" class="three">Pemilik kapal yang menggunakan
    layanan yang berbasis di Negara-negara
    bukan pihak MLC, 2006, harus
    memastikan, sejauh dapat dipraktekkan,
    bahwa Iayanan ini memenuhi
    persyaratan MLC, 2006.    
    <br><i>Shipowners using services based in
    States not party to the MLC, 2006, must
    ensure, as far as practicable, that these
    services meet the requirements of the
    MLC, 2006 (Standard Al. 4, paragraph 9).</i>
      
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->g3_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->g3_b == '1' ? $check : '').'</td>
    <td style="width:90x; text-align: center;" class="three">'.($data->g3_c == '1' ? $check : '').'</td>
    <td style="width:140x; text-align: center;" class="three">'.$data->{'g3_d'}.'</td>
  </tr>


</tbody>
</table>';

// output the HTML content
$pdf->writeHTMLCell($w='', $h='', $x=25, $y=30, $page6_1, $border=0, $ln=1, $fill=0, $reseth=true, $align='', $autopadding=true);


$pdf->lastPage();

// ---------------------------------------------------------
ob_clean();

$pdf->Output($title.'.pdf', 'I');
//============================================================+
// END OF FILE
//============================================================+

?>