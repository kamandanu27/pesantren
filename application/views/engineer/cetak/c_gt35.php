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
$pdf->SetTitle('GT35');
$pdf->SetSubject('GT 35');
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
    $pdf->Image('http://sikapal.matakoding.com/public/media/dishub.png', $x_1, $y_1, $w_1, $h_1, 'PNG', '', '', true, 700, '', false, false, 0, false, false, false);

$page1_2 = '<table border="0" style="font-size: 12px;">
    <tbody>
      <tr style="text-align: center;">
        <td><b>LAPORAN PEMERIKSAAN KAPAL</b></td>
      </tr>
      <tr style="text-align: center;">
        <td><b>KAPAL BARANG DENGAN TONASE KOTOR GT.7 s.d GT 35 </b></td>
      </tr>
      <tr style="text-align: center;">
        <td></td>
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
      <td class="one" style="width: 200px;"><b>: '.$data->a1.'</b></td>
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
      <td class="one"><b>: '.$data->a4.'</b></td>
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
$pdf->writeHTMLCell($w='', $h='', $x=35, $y=170, $page1_2, $border=0, $ln=1, $fill=0, $reseth=true, $align='', $autopadding=true);

$pdf->AddPage();



$page2_1 = '
<table border="0">
  <tbody>
    <tr style="font-size: 14px; text-align: center; padding:2;">
      <td><b>KEMENTERIAN PERHUBUNGAN</b></td>
    </tr>
    <tr style="font-size: 14px; text-align: center; padding:2;">
      <td><b>DIREKTORAT JENDERAL PERHUBUNGAN LAUT</b></td>
    </tr>
    <tr style="font-size: 14px; text-align: center; padding:2;">
      <td><b>KANTOR KESYAHBANDARAN DAN OTORITAS PELABUHAN PONTIANAK</b></td>
    </tr>
    <tr style="font-size: 8px; text-align:center;">
      <td></td>
    </tr>
    <tr style="font-size: 10px; text-align:center;">
      <td >JL. RAHADI USMAN NO 2 PONTIANAK TELP.(0561) 732043 - 732307</td>
    </tr>
  </tbody>
</table>';

    
// output the HTML content
$pdf->writeHTMLCell($w='', $h='', $x=15, $y=30, $page2_1, $border=0, $ln=1, $fill=0, $reseth=true, $align='', $autopadding=true);

$page2_a = '
<table style="border-bottom: solid; border-top: solid; border-bottom-width: thin; border-top-width: thin">
  <tbody>
    <tr style="font-size: 11px; text-align:center; padding:4;">
      <td></td>
    </tr>
    <tr style="font-size: 11px; text-align: center; padding:2;">
      <td><b>LAPORAN SINGKAT TENTANG PEMERIKSAAN ALAT – ALAT PENOLONG, PERLENGKAPAN</b></td>
    </tr>
    <tr style="font-size: 11px; text-align: center; padding:2;">
      <td><b>DAN BAGIAN TEHNIK UNTUK PEMBERIAN / PEMBAHARUAN SERTIFIKAT KESELAMATAN</b></td>
    </tr>
    <tr style="font-size: 11px; text-align: center; padding:2;">
      <td><b>KAPAL BERDASARKAN PERATURAN MENTERI NO. KM. 65 TAHUN 2009 TENTANG STANDAR</b></td>
    </tr>
    <tr style="font-size: 11px; text-align: center; padding:2;">
      <td><b>KAPAL NON – KONVENSI BERBENDERA INDONESIA</b></td>
    </tr>
    <tr style="font-size: 8px; text-align:center;">
      <td></td>
    </tr>
  </tbody>
</table>';

    
// output the HTML content
$pdf->writeHTMLCell($w=150, $h='', $x=30, $y=52, $page2_a, $border=0, $ln=1, $fill=0, $reseth=true, $align='', $autopadding=true);

$page2_2 = '
<style>
h2{
    text-align: center;
    text-font: 16px;
    padding: 0px;
    font-weight: bold;
}
</style>';

$pdf->writeHTMLCell($w='', $h='', $x='', $y=60, $page2_2, $border=0, $ln=1, $fill=0, $reseth=true, $align='center', $autopadding=true);

$page2_2 = '
<style>
td.one {border-bottom-style: dotted;}
two {border-style: dotted solid dashed;}
three {border-style: dotted solid;}
four {border-style: dotted;}
</style>
<table border="0" style="font-size: 11px; padding:6;" >
<tbody>
  <tr style="text-align: left;">
    <td style="width:100px;">NAMA KAPAL :</td>
    <td style="width:140px;" class="one"> '.$data->b1.'</td>
    <td style="width:10px;"></td>
    <td colspan="2" style="width:50px;">MILIK :</td>
    <td style="width:190px;" class="one">'.$data->b2.'</td>
  </tr>
  <tr style="text-align: left;">
    <td style="width:180px;">PEMERIKSAAN DILAKUKAN DI : </td>
    <td style="width:100px;" class="one">'.$data->b3.'</td>
    <td style="width:10px;"></td>
    <td colspan="2" style="width:110px;">PADA TANGGAL : </td>
    <td style="width:90px;" class="one">'.$data->b4.'</td>
  </tr>
  <tr style="text-align: left;">
    <td style="width:50px;">OLEH:</td>
    <td style="width:180px;" class="one">'.$data->b5.'</td>
    <td style="width:10px;"></td>
    <td colspan="2" style="width:130px;">	MARINE INSPECTOR      :</td>
    <td style="width:120px;" class="one">'.$data->b6.'</td>
  </tr>

  <tr style="height: 40px;">
    <td></td>
    <td></td>
    <td></td>
  </tr>

  <tr style="text-align: left;">
    <td style="width:26px;">1.</td>
    <td style="width:160px;">NAMA KAPAL</td>
    <td style="width:20px;">:</td>
    <td style="width:284x;" class="one">'.$data->{'1_'}.'</td>
  </tr>
  <tr style="text-align: left;">
    <td style="width:26px;">2.</td>
    <td style="width:160px;">PEMILIK</td>
    <td style="width:20px;">:</td>
    <td style="width:284x;" class="one">'.$data->{'2_'}.'</td>
  </tr>
  <tr style="text-align: left;">
    <td style="width:26px;">3.</td>
    <td style="width:160px;">ISI KOTOR</td>
    <td style="width:20px;">:</td>
    <td style="width:284x;" class="one">'.$data->{'3_'}.'</td>
  </tr>
  <tr style="text-align: left;">
    <td style="width:26px;">4.</td>
    <td style="width:160px;">TANDA SELAR</td>
    <td style="width:20px;">:</td>
    <td style="width:284x;" class="one">'.$data->{'4_'}.'</td>
  </tr>
  <tr style="text-align: left;">
    <td style="width:26px;">5.</td>
    <td style="width:160px;">TANDA PENDAFTARAN</td>
    <td style="width:20px;">:</td>
    <td style="width:284x;" class="one">'.$data->{'5_'}.'</td>
  </tr>
  <tr style="text-align: left;">
    <td style="width:26px;">6.</td>
    <td style="width:160px;">SERTIFIKAT YANG LALU BERLAKU S/D TANGGAL</td>
    <td style="width:20px;">:</td>
    <td style="width:284x;" class="one">'.$data->{'6_'}.'</td>
  </tr>
  <tr style="text-align: left;">
    <td style="width:26px;">7.</td>
    <td style="width:160px;">DOCK TERAKHIR</td>
    <td style="width:20px;">:</td>
    <td style="width:284x;" class="one">'.$data->{'7_'}.'</td>
  </tr>
  <tr style="text-align: left;">
    <td style="width:26px;">8.</td>
    <td style="width:160px;">PEMERIKSAAN YANG LALU</td>
    <td style="width:20px;">:</td>
    <td style="width:284x;" class="one">'.$data->{'8_'}.'</td>
  </tr>
  <tr style="text-align: left;">
    <td style="width:26px;">9.</td>
    <td style="width:160px;">APA SAJA YANG DIKERJAKAN SEWAKTU DOCK</td>
    <td style="width:20px;">:</td>
    <td style="width:284x;" class="one">'.$data->{'9_'}.'</td>
  </tr>
  <tr style="text-align: left;">
    <td style="width:26px;">10.</td>
    <td style="width:160px;">APAKAH CUKUP LIANG UNTUK MENGALIRKAN AIR GELADAK</td>
    <td style="width:20px;">:</td>
    <td style="width:284x;" class="one">'.$data->{'10_'}.'</td>
  </tr>
  <tr style="text-align: left;">
    <td style="width:26px;">11.</td>
    <td style="width:160px;">APAKAH KAPAL CUKUP STABIL</td>
    <td style="width:20px;">:</td>
    <td style="width:284x;" class="one">'.$data->{'11_'}.'</td>
  </tr>
  <tr style="text-align: left;">
    <td style="width:26px;">12.</td>
    <td style="width:160px;">APAKAH CUKUP VENTILASINYA</td>
    <td style="width:20px;">:</td>
    <td style="width:284x;" class="one">'.$data->{'12_'}.'</td>
  </tr>
  <tr style="text-align: left;">
    <td style="width:26px;">13.</td>
    <td style="width:160px;">APAKAH DECK UTAMA BAIK</td>
    <td style="width:20px;">:</td>
    <td style="width:284x;" class="one">'.$data->{'13_'}.'</td>
  </tr>
  <tr style="text-align: left;">
    <td style="width:26px;">14.</td>
    <td style="width:160px;">KEMUDI DAN PERKAKASNYA</td>
    <td style="width:20px;">:</td>
    <td style="width:284x;" class="one">'.$data->{'14_'}.'</td>
  </tr>
  <tr style="text-align: left;">
    <td style="width:26px;">15.</td>
    <td style="width:160px;">PEDOMAN MAGNET</td>
    <td style="width:20px;">:</td>
    <td style="width:284x;" class="one">'.$data->{'15_'}.'</td>
  </tr>
  <tr style="text-align: left;">
    <td style="width:26px;">16.</td>
    <td style="width:464px;">BAGAIMANAKAH ALAT-ALAT PERLENGKAPAN DAN KEADAANYA</td>
  </tr>
  <tr style="text-align: left;">
    <td style="width:26px;"></td>
    <td style="width:160px;">* BENDERA RI</td>
    <td style="width:20px;">:</td>
    <td style="width:284x;" class="one">'.$data->{'16_a'}.'</td>
  </tr>
  <tr style="text-align: left;">
    <td style="width:26px;"></td>
    <td style="width:160px;">* LAMPU JALAN</td>
    <td style="width:20px;">:</td>
    <td style="width:284x;" class="one">'.$data->{'16_b'}.'</td>
  </tr>
  <tr style="text-align: left;">
    <td style="width:26px;"></td>
    <td style="width:160px;">* LAMPU JANGKAR</td>
    <td style="width:20px;">:</td>
    <td style="width:284x;" class="one">'.$data->{'16_c'}.'</td>
  </tr>
  <tr style="text-align: left;">
    <td style="width:26px;"></td>
    <td style="width:160px;">* LAMPU MERAH</td>
    <td style="width:20px;">:</td>
    <td style="width:284x;" class="one">'.$data->{'16_d'}.'</td>
  </tr>
  <tr style="text-align: left;">
    <td style="width:26px;"></td>
    <td style="width:160px;">* BOLA-BOLA HITAM</td>
    <td style="width:20px;">:</td>
    <td style="width:284x;" class="one">'.$data->{'16_e'}.'</td>
  </tr>
  
</tbody>
</table>';

// output the HTML content
$pdf->writeHTMLCell($w='', $h='', $x=35, $y=78, $page2_2, $border=0, $ln=1, $fill=0, $reseth=true, $align='', $autopadding=true);

$pdf->AddPage();

$page3_1 = '
<style>
td.one {border-bottom-style: dotted;}
two {border-style: dotted solid dashed;}
three {border-style: dotted solid;}
four {border-style: dotted;}
</style>
<table border="0" style="font-size: 11px; padding:4;" >
<tbody>
  <tr style="text-align: left;">
    <td style="width:26px;"></td>
    <td style="width:160px;">* PELAMPUNG PENOLONG</td>
    <td style="width:20px;">:</td>
    <td style="width:284x;" class="one">'.$data->{'16_f'}.'</td>
  </tr>
  <tr style="text-align: left;">
    <td style="width:26px;"></td>
    <td style="width:160px;">* BAJU RENANG</td>
    <td style="width:20px;">:</td>
    <td style="width:284x;" class="one">'.$data->{'16_g'}.'</td>
  </tr>
  <tr style="text-align: left;">
    <td style="width:26px;"></td>
    <td style="width:160px;">* RAKIT PENOLONG</td>
    <td style="width:20px;">:</td>
    <td style="width:284x;" class="one">'.$data->{'16_h'}.'</td>
  </tr>
  <tr style="text-align: left;">
    <td style="width:26px;"></td>
    <td style="width:160px;">* ILR</td>
    <td style="width:20px;">:</td>
    <td style="width:284x;" class="one">'.$data->{'16_i'}.'</td>
  </tr>
  <tr style="text-align: left;">
    <td style="width:26px;"></td>
    <td style="width:160px;">* ALAT PEMADAM API</td>
    <td style="width:20px;">:</td>
    <td style="width:284x;" class="one">'.$data->{'16_j'}.'</td>
  </tr>
  <tr style="text-align: left;">
    <td style="width:26px;"></td>
    <td style="width:160px;">* P.3.K</td>
    <td style="width:20px;">:</td>
    <td style="width:284x;" class="one">'.$data->{'16_k'}.'</td>
  </tr>
  <tr style="text-align: left;">
    <td style="width:26px;"></td>
    <td style="width:160px;">* PERUM TANGAN</td>
    <td style="width:20px;">:</td>
    <td style="width:284x;" class="one">'.$data->{'16_l'}.'</td>
  </tr>
  <tr style="text-align: left;">
    <td style="width:26px;"></td>
    <td style="width:160px;">* SULING / HORN</td>
    <td style="width:20px;">:</td>
    <td style="width:284x;" class="one">'.$data->{'16_m'}.'</td>
  </tr>
  <tr style="text-align: left;">
    <td style="width:26px;"></td>
    <td style="width:160px;">* BENDERA SEMBOYAN</td>
    <td style="width:20px;">:</td>
    <td style="width:284x;" class="one">'.$data->{'16_n'}.'</td>
  </tr>
  <tr style="text-align: left;">
    <td style="width:26px;">17.</td>
    <td style="width:160px;">KOMPAS</td>
    <td style="width:20px;">:</td>
    <td style="width:284x;" class="one">'.$data->{'17_'}.'</td>
  </tr>
  <tr style="text-align: left;">
    <td style="width:26px;">18.</td>
    <td style="width:160px;">TEROPONG PENDEK</td>
    <td style="width:20px;">:</td>
    <td style="width:284x;" class="one">'.$data->{'18_'}.'</td>
  </tr>
  <tr style="text-align: left;">
    <td style="width:26px;">19.</td>
    <td style="width:160px;">SSB/MF/VHF</td>
    <td style="width:20px;">:</td>
    <td style="width:284x;" class="one">'.$data->{'19_'}.'</td>
  </tr>
  <tr style="text-align: left;">
    <td style="width:26px;">20.</td>
    <td style="width:160px;">MISTAR PARALEL DAN SEGITIGA</td>
    <td style="width:20px;">:</td>
    <td style="width:284x;" class="one">'.$data->{'20_'}.'</td>
  </tr>
  <tr style="text-align: left;">
    <td style="width:26px;">21.</td>
    <td style="width:160px;">GPS</td>
    <td style="width:20px;">:</td>
    <td style="width:284x;" class="one">'.$data->{'21_'}.'</td>
  </tr>
  <tr style="text-align: left;">
    <td style="width:26px;">22.</td>
    <td style="width:160px;">MISTAR PARALEL DAN SEGITIGA</td>
    <td style="width:20px;">:</td>
    <td style="width:284x;" class="one">'.$data->{'22_'}.'</td>
  </tr>
  <tr style="text-align: left;">
    <td style="width:26px;">23.</td>
    <td style="width:160px;">JANGKA PETA</td>
    <td style="width:20px;">:</td>
    <td style="width:284x;" class="one">'.$data->{'23_'}.'</td>
  </tr>
  <tr style="text-align: left;">
    <td style="width:26px;">24.</td>
    <td style="width:160px;">PETA LAUT</td>
    <td style="width:20px;">:</td>
    <td style="width:284x;" class="one">'.$data->{'24_'}.'</td>
  </tr>
  <tr style="text-align: left;">
    <td style="width:26px;">25.</td>
    <td style="width:160px;">PASANG SURUT</td>
    <td style="width:20px;">:</td>
    <td style="width:284x;" class="one">'.$data->{'25_'}.'</td>
  </tr>
  <tr style="text-align: left;">
    <td style="width:26px;">26.</td>
    <td style="width:160px;">ISYARAT BAHAYA</td>
    <td style="width:20px;"></td>
    <td style="width:284x;" class="one"></td>
  </tr>
  <tr style="text-align: left;">
    <td style="width:26px;"></td>
    <td style="width:160px;">* PARACUT SIGNAL</td>
    <td style="width:20px;">:</td>
    <td style="width:284x;" class="one">'.$data->{'26_a'}.'</td>
  </tr>
  <tr style="text-align: left;">
    <td style="width:26px;"></td>
    <td style="width:160px;">* RED HAND FLARE</td>
    <td style="width:20px;">:</td>
    <td style="width:284x;" class="one">'.$data->{'26_b'}.'</td>
  </tr>
  <tr style="text-align: left;">
    <td style="width:26px;"></td>
    <td style="width:160px;">* SMOKE SIGNAL</td>
    <td style="width:20px;">:</td>
    <td style="width:284x;" class="one">'.$data->{'26_c'}.'</td>
  </tr>
  <tr style="text-align: left;">
    <td style="width:26px;">27.</td>
    <td style="width:160px;">ALAT PENDORONG UTAMA</td>
    <td style="width:320px;"></td>
  </tr>
  <tr style="text-align: left;">
    <td style="width:26px;"></td>
    <td style="width:160px;">* JUMLAH</td>
    <td style="width:20px;">:</td>
    <td style="width:284x;" class="one">'.$data->{'27_a'}.'</td>
  </tr>
  <tr style="text-align: left;">
    <td style="width:26px;"></td>
    <td style="width:160px;">* MERK</td>
    <td style="width:20px;">:</td>
    <td style="width:284x;" class="one">'.$data->{'27_b'}.'</td>
  </tr>
  <tr style="text-align: left;">
    <td style="width:26px;"></td>
    <td style="width:160px;">* TYPE</td>
    <td style="width:20px;">:</td>
    <td style="width:284x;" class="one">'.$data->{'27_c'}.'</td>
  </tr>
  <tr style="text-align: left;">
    <td style="width:26px;"></td>
    <td style="width:160px;">* DAYA</td>
    <td style="width:20px;">:</td>
    <td style="width:284x;" class="one">'.$data->{'27_d'}.'</td>
  </tr>
  <tr style="text-align: left;">
    <td style="width:26px;"></td>
    <td style="width:160px;">* PUTARAN MESIN</td>
    <td style="width:20px;">:</td>
    <td style="width:284x;" class="one">'.$data->{'27_e'}.'</td>
  </tr>
  <tr style="text-align: left;">
    <td style="width:26px;"></td>
    <td style="width:160px;">* CYLINDER</td>
    <td style="width:20px;">:</td>
    <td style="width:284x;" class="one">'.$data->{'27_f'}.'</td>
  </tr>
  <tr style="text-align: left;">
    <td style="width:26px;"></td>
    <td style="width:160px;">* NOMOR SERI</td>
    <td style="width:20px;">:</td>
    <td style="width:284x;" class="one">'.$data->{'27_g'}.'</td>
  </tr>
  <tr style="text-align: left;">
    <td style="width:26px;"></td>
    <td style="width:160px;">* HASIL PERCOBAAN</td>
    <td style="width:20px;">:</td>
    <td style="width:284x;" class="one">'.$data->{'27_h'}.'</td>
  </tr>
  <tr style="text-align: left;">
    <td style="width:26px;">28.</td>
    <td style="width:160px;">MOTOR BANTU</td>
    <td style="width:320px;"></td>
  </tr>
  <tr style="text-align: left;">
    <td style="width:26px;"></td>
    <td style="width:160px;">* JUMLAH</td>
    <td style="width:20px;">:</td>
    <td style="width:284x;" class="one">'.$data->{'28_a'}.'</td>
  </tr>
  <tr style="text-align: left;">
    <td style="width:26px;"></td>
    <td style="width:160px;">* MERK</td>
    <td style="width:20px;">:</td>
    <td style="width:284x;" class="one">'.$data->{'28_b'}.'</td>
  </tr>
  <tr style="text-align: left;">
    <td style="width:26px;"></td>
    <td style="width:160px;">* TYPE</td>
    <td style="width:20px;">:</td>
    <td style="width:284x;" class="one">'.$data->{'28_c'}.'</td>
  </tr>
  <tr style="text-align: left;">
    <td style="width:26px;"></td>
    <td style="width:160px;">* DAYA</td>
    <td style="width:20px;">:</td>
    <td style="width:284x;" class="one">'.$data->{'28_d'}.'</td>
  </tr>
  
  
</tbody>
</table>';

// output the HTML content
$pdf->writeHTMLCell($w='', $h='', $x=35, $y=40, $page3_1, $border=0, $ln=1, $fill=0, $reseth=true, $align='', $autopadding=true);

$pdf->AddPage();

$page3_1 = '
<style>
td.one {border-bottom-style: dotted;}
two {border-style: dotted solid dashed;}
three {border-style: dotted solid;}
four {border-style: dotted;}
</style>
<table border="0" style="font-size: 11px; padding:6;" >
<tbody>
  <tr style="text-align: left;">
    <td style="width:26px;"></td>
    <td style="width:160px;">* PUTARAN MESIN</td>
    <td style="width:20px;">:</td>
    <td style="width:284x;" class="one">'.$data->{'28_e'}.'</td>
  </tr>
  <tr style="text-align: left;">
    <td style="width:26px;"></td>
    <td style="width:160px;">* CYLINDER</td>
    <td style="width:20px;">:</td>
    <td style="width:284x;" class="one">'.$data->{'28_f'}.'</td>
  </tr>
  <tr style="text-align: left;">
    <td style="width:26px;"></td>
    <td style="width:160px;">* NOMOR SERI</td>
    <td style="width:20px;">:</td>
    <td style="width:284x;" class="one">'.$data->{'28_g'}.'</td>
  </tr>
  <tr style="text-align: left;">
    <td style="width:26px;"></td>
    <td style="width:160px;">* HASIL PERCOBAAN</td>
    <td style="width:20px;">:</td>
    <td style="width:284x;" class="one">'.$data->{'28_h'}.'</td>
  </tr>
  <tr style="text-align: left;">
    <td style="width:26px;">29.</td>
    <td style="width:165px;">POMPA KEMARAU/DARURAT</td>
    <td style="width:20px;">:</td>
    <td style="width:279x;" class="one">'.$data->{'29_'}.'</td>
  </tr>
  <tr style="text-align: left;">
    <td style="width:26px;">30.</td>
    <td style="width:165px;">JUMLAH ABK</td>
    <td style="width:20px;">:</td>
    <td style="width:279x;" class="one">'.$data->{'30_'}.'</td>
  </tr>
  <tr style="text-align: left;">
    <td style="width:26px;">31.</td>
    <td style="width:165px;">NAKHODA & KKM IJAZAH</td>
    <td style="width:20px;">:</td>
    <td style="width:279x;" class="one">'.$data->{'31_'}.'</td>
  </tr>
  <tr style="text-align: left;">
    <td style="width:26px;">32.</td>
    <td style="width:165px;">TANDA LAMBUNG TIMBUL</td>
    <td style="width:20px;">:</td>
    <td style="width:279x;" class="one">'.$data->{'32_'}.'</td>
  </tr>

  <tr style="height: 50px;">
    <td></td>
    <td></td>
    <td></td>
  </tr>

  <tr style="text-align: left;">
    <td style="width:210px;">Pemeriksaan di lakukan atas permintaan dari</td>
    <td style="width:20px;">:</td>
    <td style="width:260x;" class="one">'.$data->c1.'</td>
  </tr>

  <tr style="text-align: left;">
    <td style="width:160px;">Dengan Suratnya /kawat nomor</td>
    <td style="width:20px;">:</td>
    <td style="width:140x;" class="one">'.$data->c2.'</td>
    <td style="width:50px;">Tanggal</td>
    <td style="width:20px;">:</td>
    <td style="width:100x;" class="one">'.$data->c3.'</td>
  </tr>

  <tr style="text-align: left;">
    <td style="width:150px;">Yang disampaikan kepada</td>
    <td style="width:20px;">:</td>
    <td style="width:320x;" class="one">'.$data->c4.'</td>
  </tr>

  <tr style="height: 50px;">
    <td></td>
    <td></td>
    <td></td>
  </tr>

  <tr style="text-align: left;">
    <td style="width:230px;"><u><b>Kekurangan</b></u></td>
    <td style="width:250px;"></td>
  </tr>
  <tr style="text-align: left;">
    <td style="width:490px;">'.$data->c5.'</td>
  </tr>
  <tr style="height: 100px;">
    <td></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
  <table>
    <tr style="text-align: center; text-size:12px;">
      <td style="width:250px;"></td>
      <td style="width:250px;">'.$data->z1.' , '.$data->z2.'</td>
    </tr>
    <tr style="text-align: center;">
      <td style="width:250px;"><b>NAKHODA</b></td>
      <td style="width:250px;"><b>Pemeriksa,</b></td>
    </tr>
    <tr style="height: 400px;">
      <td style="width:230px;"></td>
      <td style="width:20px;"></td>
      <td style="width:250px;"></td>
    </tr>
    <tr style="height: 400px;">
      <td style="width:230px;"></td>
      <td style="width:20px;"></td>
      <td style="width:250px;"></td>
    </tr>
    <tr style="height: 400px;">
      <td style="width:230px;"></td>
      <td style="width:20px;"></td>
      <td style="width:250px;"></td>
    </tr>
    <tr style="height: 400px;">
      <td style="width:230px;"></td>
      <td style="width:20px;"></td>
      <td style="width:250px;"></td>
    </tr>
    <tr style="height: 400px;">
      <td style="width:230px;"></td>
      <td style="width:20px;"></td>
      <td style="width:250px;"></td>
    </tr>
    <tr style="text-align: center; padding: 10;">
      <td style="width:250px;"><u><b>'.$data->z9.'</b></u></td>
      <td style="width:250px;"><u><b>'.$data->z6.'</b></u></td>
    </tr>
    <tr style="text-align: center; padding: 10;">
      <td style="width:250px;"><b>'.$data->z10.'</b></td>
      <td style="width:250px;"><b>'.$data->z7.'</b></td>
    </tr>
    <tr style="text-align: center; padding: 10;">
      <td style="width:250px;"><b>'.$data->z11.'</b></td>
      <td style="width:250px;"><b>'.$data->z8.'</b></td>
    </tr>
    <tr style="text-align: center;">
      <td style="width:490px;"></td>
    </tr>
    <tr style="text-align: center;" padding="20">
      <td style="width:490px;"><u><b>MENGETAHUI :</b></u></td>
    </tr>
    <tr style="text-align: center;">
      <td style="width:490px;"><b>KASIE STATUS HUKUM DAN SERTIFIKASI KAPAL</b></td>
    </tr>
    <tr style="height: 400px;">
      <td style="width:230px;"></td>
      <td style="width:20px;"></td>
      <td style="width:250px;"></td>
    </tr>
    <tr style="height: 400px;">
      <td style="width:230px;"></td>
      <td style="width:20px;"></td>
      <td style="width:250px;"></td>
    </tr>
    <tr style="height: 400px;">
      <td style="width:230px;"></td>
      <td style="width:20px;"></td>
      <td style="width:250px;"></td>
    </tr>
    <tr style="height: 400px;">
      <td style="width:230px;"></td>
      <td style="width:20px;"></td>
      <td style="width:250px;"></td>
    </tr>
    <tr style="text-align: center; padding: 10;">
      <td style="width:490px;"><u><b>'.$data->z3.'</b></u></td>
    </tr>
    <tr style="text-align: center; padding: 10;">
      <td style="width:490px;"><b>'.$data->z4.'</b></td>
    </tr>
    <tr style="text-align: center; padding: 10;">
      <td style="width:490px;"><b>'.$data->z5.'</b></td>
    </tr>

    </table>
  </tr>

</tbody>
</table>';

// output the HTML content
$pdf->writeHTMLCell($w='', $h='', $x=35, $y=40, $page3_1, $border=0, $ln=1, $fill=0, $reseth=true, $align='', $autopadding=true);




$pdf->lastPage();

// ---------------------------------------------------------
ob_clean();

$pdf->Output('GT_Dibawah_35.pdf', 'I');
//============================================================+
// END OF FILE
//============================================================+

?>