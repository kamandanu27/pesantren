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
        <td><b>LAPORAN PEMERIKSAAN KAPAL LAYAR MOTOR</b></td>
      </tr>
      <tr style="text-align: center;">
        <td><b>UKURAN S/D 500 GT </b></td>
      </tr>
      <tr style="text-align: center;">
        <td><b></b></td>
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
      <td class="one" style="width: 200;"><b>: '.$data->a1.'</b></td>
    </tr>
    <tr style="text-align: left;">
      <td><b>PEMILIK / OPERATOR</b></td>
      <td class="one"><b>: '.$data->a2.'</b></td>
    </tr>
    <tr style="text-align: left;">
      <td><b>AGENT</b></td>
      <td class="one"><b>: '.$data->a5.'</b></td>
    </tr>
    <tr style="text-align: left;">
      <td><b>TEMPAT, TANGGAL PEMERIKSAAN</b></td>
      <td class="one"><b>: '.$data->a3.' , '.date_indo($data->ba4).'</b></td>
    </tr>
    <tr style="text-align: left;">
      <td><b>PEMERIKSA / MARINE INSPECTOR</b></td>
      <td class="one"><b>: '.$data->a6.'</b></td>
    </tr>
    <tr style="text-align: left;">
      <td><b>NOMOR KARTU MI</b></td>
      <td class="one"><b>: '.$data->a7.'</b></td>
    </tr>
  </tbody>
</table>';

// output the HTML content
$pdf->writeHTMLCell($w='', $h='', $x=35, $y=170, $page1_2, $border=0, $ln=1, $fill=0, $reseth=true, $align='', $autopadding=true);


$pdf->AddPage();

$page2_1 = '
<table border="0">
  <tbody>
  <tr>
    <td style="width:100px; text-align: center;">
        <img src="'.$url_base.'public/media/dishub.png" width="100">
    </td>
    <td style="width:420px;">
        <tr style="font-size: 14px; text-align: center; padding:2;">
          <td><b>KEMENTERIAN PERHUBUNGAN</b></td>
        </tr>
        <tr style="font-size: 14px; text-align: center; padding:2;">
          <td><b>DIREKTORAT JENDERAL PERHUBUNGAN LAUT</b></td>
        </tr>
        <tr style="font-size: 14px; text-align: center; padding:2;">
          <td><b>KANTOR KESYAHBANDARAN DAN OTORITAS PELABUHAN KELAS II PONTIANAK</b></td>
        </tr>
        <tr style="font-size: 14px; text-align: center; padding:2;">
          <td>GEDUNG KARYA LT. 12 S/D 17</td>
        </tr>
    </td>
  </tr>
    
  </tbody>
</table>';

    
// output the HTML content
$pdf->writeHTMLCell($w='', $h='', $x=30, $y=30, $page2_1, $border=0, $ln=1, $fill=0, $reseth=true, $align='', $autopadding=true);

$page2_a = '
<table style="border-bottom: solid; border-bottom-width: thin; width:560px;">
  <tbody>
    <tr style="font-size: 11px; text-align:center; padding:1;">
      <td></td>
      <td></td>
      <td></td>
    </tr>
    <tr style="font-size: 9px; text-align: center; padding:4;">
      <td style="border-right: solid; border-right-width: thin;">JL. MEDAN MERDEKA BARAT No.8 </td>
      <td style="border-right: solid; border-right-width: thin;">TEL. : 3811308, 3505006, 3813269, 3447017 </td>
      <td>TLX. : 3844492, 3458540 </td>
    </tr>
    <tr style="font-size: 9px; text-align: center; padding:2;">
      <td style="border-right: solid; border-right-width: thin;"></td>
      <td style="border-right: solid; border-right-width: thin;">3842440 </td>
      <td></td>
    </tr>
    <tr style="font-size: 9px; text-align: center; padding:2;">
      <td style="border-right: solid; border-right-width: thin;">JAKARTA – 10110 </td>
      <td style="border-right: solid; border-right-width: thin;">Pst. : 4213, 4227, 4209, 4135 </td>
      <td >FAX : 3811786, 3845430, 3507576 </td>
    </tr>
    <tr style="font-size: 8px; text-align:center;">
      <td></td>
      <td></td>
      <td></td>
    </tr>
  </tbody>
</table>';

    
// output the HTML content
$pdf->writeHTMLCell($w=150, $h='', $x=25, $y=52, $page2_a, $border=0, $ln=1, $fill=0, $reseth=true, $align='', $autopadding=true);


$page2_b = '
<table style="text-align:center; border-right: solid; border-right-width: thin;
border-left: solid; border-left-width: thin;
border-bottom: solid; border-bottom-width: thin;
border-top: solid; border-top-width: thin; width:560px;">
  <tbody style="font-size: 14px; padding: 4;">
    <tr>
      <td><b>LAPORAN PEMERIKSAAN KAPAL LAYAR MOTOR <br>
      UKURAN S/D 500 GT  </b></td>
    </tr>
  </tbody>
</table>';

    
// output the HTML content
$pdf->writeHTMLCell($w=150, $h='', $x=25, $y=72, $page2_b, $border=0, $ln=1, $fill=0, $reseth=true, $align='', $autopadding=true);

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
    <td style="width:105px;"><b>NAMA KAPAL :</b></td>
    <td style="width:160px;" class="one"> '.$data->a1.'</td>
    <td style="width:10px;"></td>
    <td colspan="2" style="width:55px;"><b>MILIK :</b></td>
    <td style="width:225px;" class="one">'.$data->a2.'</td>
  </tr>
  <tr style="text-align: left;">
    <td style="width:190px;"><b>PEMERIKSAAN DILAKUKAN DI : </b></td>
    <td style="width:120px;" class="one">'.$data->a3.'</td>
    <td style="width:10px;"></td>
    <td colspan="2" style="width:115px;"><b>PADA TANGGAL : </b></td>
    <td style="width:120px;" class="one">'.date_indo($data->a4).'</td>
  </tr>
  <tr style="text-align: left;">
    <td style="width:55px;"><b>OLEH:</b></td>
    <td style="width:205px;" class="one">'.$data->a5.'</td>
    <td style="width:10px;"></td>
    <td colspan="2" style="width:135px;"><b>MARINE INSPECTOR      :</b></td>
    <td style="width:150px;" class="one">'.$data->a6.'</td>
  </tr>

  <tr style="height: 40px;">
    <td></td>
    <td></td>
    <td></td>
  </tr>
  </tbody>
  </table>';
  
  // output the HTML content
  $pdf->writeHTMLCell($w='', $h='', $x=25, $y=85, $page2_2, $border=0, $ln=1, $fill=0, $reseth=true, $align='', $autopadding=true);

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
    <td style="width:630px;" class="three"><b>I. ALAT – ALAT PENOLONG </b></td>
  </tr>    
  <tr style="text-align: center;">
    <td style="width:35px;" class="three"><b>No</b><br> <i> No</i></td>
    <td style="width:225;" class="three"><b>Persyaratan</b><br> <i> Requirements</i></td>
    <td style="width:50px;" class="three"><b>Ya</b><br> <i> Yes</i></td>
    <td style="width:50px;" class="three"><b>Tidak</b><br> <i>No</i></td>
    <td style="width:90px;" class="three"><b>Tidak <br>Dipersyaratkan</b></td>
    <td style="width:180px;" class="three"><b>Keterangan</b><br> <i>Remarks</i></td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:35px; text-align: center;" class="three">1.</td>
    <td style="width:225px; text-align: left;" class="three">Jumlah, macam, ditempatkan, keadaan dan kapasitas sekoci / sampan penolong 
    <br><i></i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->b1_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->b1_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->b1_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'b1_d'}.'</td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:35px; text-align: center;" class="three">2.</td>
    <td style="width:225px; text-align: left;" class="three">Jumlah, macam, ditempatkan, keadaan dan kapasitas rakit-rakit penolong tambahan   
    <br><i></i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->b2_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->b2_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->b2_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'b2_d'}.'</td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:35px; text-align: center;" class="three">3.</td>
    <td style="width:225px; text-align: left;" class="three">Jumlah, ditempatkannya dan keadaan baju-baju berenang   
    <br><i></i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->b3_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->b3_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->b3_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'b3_d'}.'</td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:35px; text-align: center;" class="three">4.</td>
    <td style="width:225px; text-align: left;" class="three">Jumlah, ditempatkannya dan keadaan pelampung penolong     
    <br><i></i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->b4_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->b4_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->b4_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'b4_d'}.'</td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:35px; text-align: center;" class="three">5.</td>
    <td style="width:225px; text-align: left;" class="three">Inventaris alat – alat penolong lainnya dan keadaannya       
    <br><i></i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->b5_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->b5_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->b5_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'b5_d'}.'</td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:35px; text-align: center;" class="three">6.</td>
    <td style="width:225px; text-align: left;" class="three">Peralatan Penunjang alat – alat penolong (tangga, tali, loper)        
    <br><i></i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->b6_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->b6_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->b6_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'b6_d'}.'</td>
  </tr>

  </tbody>
</table>';

// output the HTML content
$pdf->writeHTMLCell($w='', $h='', $x=15, $y=125, $page2_3, $border=0, $ln=1, $fill=0, $reseth=true, $align='', $autopadding=true);


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
    <td style="width:630px;" class="three"><b>II. PETA-PETA DAN BUKU-BUKU </b></td>
  </tr>   
  <tr style="text-align: center;">
    <td style="width:35px;" class="three"><b>No</b><br> <i> No</i></td>
    <td style="width:225;" class="three"><b>Persyaratan</b><br> <i> Requirements</i></td>
    <td style="width:50px;" class="three"><b>Ya</b><br> <i> Yes</i></td>
    <td style="width:50px;" class="three"><b>Tidak</b><br> <i>No</i></td>
    <td style="width:90px;" class="three"><b>Tidak <br>Dipersyaratkan</b></td>
    <td style="width:180px;" class="three"><b>Keterangan</b><br> <i>Remarks</i></td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:35px; text-align: center;" class="three">1.</td>
    <td style="width:225px; text-align: left;" class="three">Peta – peta laut  
    <br><i></i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->c1_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->c1_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->c1_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'c1_d'}.'</td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:35px; text-align: center;" class="three">2.</td>
    <td style="width:225px; text-align: left;" class="three">Daftar suar Indonesia     
    <br><i></i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->c2_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->c2_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->c2_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'c2_d'}.'</td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:35px; text-align: center;" class="three">3.</td>
    <td style="width:225px; text-align: left;" class="three">Daftar stasiun dan radio pantai   
    <br><i></i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->c3_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->c3_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->c3_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'c3_d'}.'</td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:35px; text-align: center;" class="three">4.</td>
    <td style="width:225px; text-align: left;" class="three">Buku kepanduan bahari       
    <br><i></i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->c4_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->c4_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->c4_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'c4_d'}.'</td>
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
    <td style="width:630px;" class="three"><b>III. ALAT – ALAT PENOLONG </b></td>
  </tr>
  
  <tr style="text-align: center;">
    <td style="width:35px;" class="three"><b>No</b><br> <i> No</i></td>
    <td style="width:225;" class="three"><b>Persyaratan</b><br> <i> Requirements</i></td>
    <td style="width:50px;" class="three"><b>Ya</b><br> <i> Yes</i></td>
    <td style="width:50px;" class="three"><b>Tidak</b><br> <i>No</i></td>
    <td style="width:90px;" class="three"><b>Tidak <br>Dipersyaratkan</b></td>
    <td style="width:180px;" class="three"><b>Keterangan</b><br> <i>Remarks</i></td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:35px; text-align: center;" class="three">1.</td>
    <td style="width:225px; text-align: left;" class="three">Alat – alat pembaring, jumlah, macam dan keadaan  
    <br><i></i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->d1_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->d1_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->d1_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'d1_d'}.'</td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:35px; text-align: center;" class="three">2.</td>
    <td style="width:225px; text-align: left;" class="three">Mistar jajar atau segitiga – segitiga navigasi     
    <br><i></i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->d2_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->d2_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->d2_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'d2_d'}.'</td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:35px; text-align: center;" class="three">3.</td>
    <td style="width:225px; text-align: left;" class="three">Jangka – jangka peta    
    <br><i></i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->d3_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->d3_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->d3_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'d3_d'}.'</td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:35px; text-align: center;" class="three">4.</td>
    <td style="width:225px; text-align: left;" class="three">Pedoman magnit       
    <br><i></i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->d4_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->d4_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->d4_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'d4_d'}.'</td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:35px; text-align: center;" class="three">5.</td>
    <td style="width:225px; text-align: left;" class="three">Penerangan pedoman – pedoman        
    <br><i></i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->d5_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->d5_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->d5_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'d5_d'}.'</td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:35px; text-align: center;" class="three">6.</td>
    <td style="width:225px; text-align: left;" class="three">Jumlah, macam, keadaan teropong-teropong         
    <br><i></i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->d6_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->d6_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->d6_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'d6_d'}.'</td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:35px; text-align: center;" class="three">7.</td>
    <td style="width:225px; text-align: left;" class="three">Jumlah dan keadaaan perum tangan / panjang tali         
    <br><i></i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->d7_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->d7_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->d7_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'d7_d'}.'</td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:35px; text-align: center;" class="three">8.</td>
    <td style="width:225px; text-align: left;" class="three">Alat – alat navigasi utama lainnya           
    <br><i></i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->d8_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->d8_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->d8_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'d8_d'}.'</td>
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
    <td style="width:630px;" class="three"><b>IV. ALAT – ALAT PENOLONG </b></td>
  </tr>  
  <tr style="text-align: center;">
    <td style="width:35px;" class="three"><b>No</b><br> <i> No</i></td>
    <td style="width:225;" class="three"><b>Persyaratan</b><br> <i> Requirements</i></td>
    <td style="width:50px;" class="three"><b>Ya</b><br> <i> Yes</i></td>
    <td style="width:50px;" class="three"><b>Tidak</b><br> <i>No</i></td>
    <td style="width:90px;" class="three"><b>Tidak <br>Dipersyaratkan</b></td>
    <td style="width:180px;" class="three"><b>Keterangan</b><br> <i>Remarks</i></td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:35px; text-align: center;" class="three">1.</td>
    <td style="width:225px; text-align: left;" class="three">Lentera-lentera (jumlah, macam, keadaan)   
    <br><i></i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->e1_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->e1_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->e1_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'e1_d'}.'</td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:35px; text-align: center;" class="three">2.</td>
    <td style="width:225px; text-align: left;" class="three">Bola-bola hitam dan kerucut – kerucut       
    <br><i></i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->e2_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->e2_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->e2_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'e2_d'}.'</td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:35px; text-align: center;" class="three">3.</td>
    <td style="width:225px; text-align: left;" class="three">Bendera Republik Indonesia      
    <br><i></i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->e3_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->e3_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->e3_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'e3_d'}.'</td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:35px; text-align: center;" class="three">4.</td>
    <td style="width:225px; text-align: left;" class="three">Suling Kapal        
    <br><i></i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->e4_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->e4_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->e4_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'e4_d'}.'</td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:35px; text-align: center;" class="three">5.</td>
    <td style="width:225px; text-align: left;" class="three">Stop watch          
    <br><i></i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->e5_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->e5_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->e5_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'e5_d'}.'</td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:35px; text-align: center;" class="three">6.</td>
    <td style="width:225px; text-align: left;" class="three">Bendera isyarat internasional           
    <br><i></i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->e6_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->e6_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->e6_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'e6_d'}.'</td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:35px; text-align: center;" class="three">7.</td>
    <td style="width:225px; text-align: left;" class="three">Cerawat payung           
    <br><i></i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->e7_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->e7_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->e7_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'e7_d'}.'</td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:35px; text-align: center;" class="three">8.</td>
    <td style="width:225px; text-align: left;" class="three">Cerawat tangan             
    <br><i></i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->e8_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->e8_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->e8_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'e8_d'}.'</td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:35px; text-align: center;" class="three">9.</td>
    <td style="width:225px; text-align: left;" class="three">Isyarat asap              
    <br><i></i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->e9_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->e9_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->e9_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'e9_d'}.'</td>
  </tr>

  </tbody>
</table>';

// output the HTML content
$pdf->writeHTMLCell($w='', $h='', $x=15, $y=155, $page2_3, $border=0, $ln=1, $fill=0, $reseth=true, $align='', $autopadding=true);


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
    <td style="width:630px;" class="three"><b>V. ALAT – ALAT PENOLONG </b></td>
  </tr>   
  <tr style="text-align: center;">
    <td style="width:35px;" class="three"><b>No</b><br> <i> No</i></td>
    <td style="width:225;" class="three"><b>Persyaratan</b><br> <i> Requirements</i></td>
    <td style="width:50px;" class="three"><b>Ya</b><br> <i> Yes</i></td>
    <td style="width:50px;" class="three"><b>Tidak</b><br> <i>No</i></td>
    <td style="width:90px;" class="three"><b>Tidak <br>Dipersyaratkan</b></td>
    <td style="width:180px;" class="three"><b>Keterangan</b><br> <i>Remarks</i></td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:35px; text-align: center;" class="three">1.</td>
    <td style="width:225px; text-align: left;" class="three">Botol pemadam api, jumlah, ditempatkannya, keadaan, dicoba   
    <br><i></i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->f1_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->f1_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->f1_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'f1_d'}.'</td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:35px; text-align: center;" class="three">2.</td>
    <td style="width:225px; text-align: left;" class="three">Pasir dan tembilang     
    <br><i></i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->f2_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->f2_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->f2_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'f2_d'}.'</td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:35px; text-align: center;" class="three">3.</td>
    <td style="width:225px; text-align: left;" class="three">Hidran   
    <br><i></i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->f3_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->f3_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->f3_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'f3_d'}.'</td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:35px; text-align: center;" class="three">4.</td>
    <td style="width:225px; text-align: left;" class="three">Kota pemadam kebakaran      
    <br><i></i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->f4_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->f4_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->f4_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'f4_d'}.'</td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:35px; text-align: center;" class="three">5.</td>
    <td style="width:225px; text-align: left;" class="three">Perangkat pemadam kebakaran lainnya         
    <br><i></i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->f5_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->f5_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->f5_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'f5_d'}.'</td>
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
    <td style="width:630px;" class="three"><b>VI. ALAT – ALAT PENOLONG </b></td>
</tr>
  <tr style="text-align: center;">
    <td style="width:35px;" class="three"><b>No</b><br> <i> No</i></td>
    <td style="width:225;" class="three"><b>Persyaratan</b><br> <i> Requirements</i></td>
    <td style="width:50px;" class="three"><b>Ya</b><br> <i> Yes</i></td>
    <td style="width:50px;" class="three"><b>Tidak</b><br> <i>No</i></td>
    <td style="width:90px;" class="three"><b>Tidak <br>Dipersyaratkan</b></td>
    <td style="width:180px;" class="three"><b>Keterangan</b><br> <i>Remarks</i></td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:35px; text-align: center;" class="three">1.</td>
    <td style="width:225px; text-align: left;" class="three">Pesawat pelepas tali penolong     
    <br><i></i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->g1_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->g1_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->g1_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'g1_d'}.'</td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:35px; text-align: center;" class="three">2.</td>
    <td style="width:225px; text-align: left;" class="three">Perlengkapan P3K      
    <br><i></i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->g2_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->g2_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->g2_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'g2_d'}.'</td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:35px; text-align: center;" class="three">3.</td>
    <td style="width:225px; text-align: left;" class="three">Lampu sorot    
    <br><i></i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->g3_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->g3_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->g3_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'g3_d'}.'</td>
  </tr>

  </tbody>
</table>';

// output the HTML content
$pdf->writeHTMLCell($w='', $h='', $x=15, $y=115, $page2_3, $border=0, $ln=1, $fill=0, $reseth=true, $align='', $autopadding=true);

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
		<td style="width:630px;" class="three"><b>LAPORAN SINGKAT TENTANG PEMERIKSAAN <br> TEKNIS KAPAL DAN MESIN –MESIN</b></td>
	</tr>
	
	<tr style="text-align: center;">
		<td style="width:630px;"></td>
	</tr>
	
	<tr style="text-align: center;">
		<td style="width:630px;" class="three"><b>I. KONSTRUKSI KAPAL </b></td>
	</tr>
  <tr style="text-align: center;">
    <td style="width:35px;" class="three"><b>No</b><br> <i> No</i></td>
    <td style="width:225;" class="three"><b>Persyaratan</b><br> <i> Requirements</i></td>
    <td style="width:50px;" class="three"><b>Ya</b><br> <i> Yes</i></td>
    <td style="width:50px;" class="three"><b>Tidak</b><br> <i>No</i></td>
    <td style="width:90px;" class="three"><b>Tidak <br>Dipersyaratkan</b></td>
    <td style="width:180px;" class="three"><b>Keterangan</b><br> <i>Remarks</i></td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:35px; text-align: center;" class="three">1.</td>
    <td style="width:225px; text-align: left;" class="three">Pengesahan gambar      
    <br><i></i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->h1_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->h1_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->h1_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'h1_d'}.'</td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:35px; text-align: center;" class="three">2.</td>
    <td style="width:225px; text-align: left;" class="three">Perhitungan stabilitas       
    <br><i></i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->h2_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->h2_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->h2_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'h2_d'}.'</td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:35px; text-align: center;" class="three">3.</td>
    <td style="width:225px; text-align: left;" class="three">Lambung timbul    
    <br><i></i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->h3_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->h3_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->h3_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'h3_d'}.'</td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:35px; text-align: center;" rowspan="4" class="three">4.</td>
    <td style="width:595px; text-align: left;" class="three">Layar  
    </td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:225px; text-align: left;" class="three">- Ukuran layar (panjang x lebar x tinggi) </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->h4_1_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->h4_1_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->h4_1_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'h4_1_d'}.'</td>
  </tr>
  <tr style="text-align: center;">
    <td style="width:225px; text-align: left;" class="three">- Konstruksi tiang layar  </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->h4_2_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->h4_2_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->h4_2_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'h4_2_d'}.'</td>
  </tr>
  <tr style="text-align: center;">
    <td style="width:225px; text-align: left;" class="three">- Posisi layar  </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->h4_3_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->h4_3_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->h4_3_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'h4_3_d'}.'</td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:35px; text-align: center;" class="three">5.</td>
    <td style="width:225px; text-align: left;" class="three">Lambung, dek dan bangunan atas      
    <br><i></i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->h5_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->h5_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->h5_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'h5_d'}.'</td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:35px; text-align: center;" class="three">6.</td>
    <td style="width:225px; text-align: left;" class="three">Kamar – kamar awak kapal, penerangan, peranginan       
    <br><i></i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->h6_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->h6_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->h6_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'h6_d'}.'</td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:35px; text-align: center;" class="three">7.</td>
    <td style="width:225px; text-align: left;" class="three">Kamar mandi dan WC       
    <br><i></i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->h7_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->h7_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->h7_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'h7_d'}.'</td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:35px; text-align: center;" rowspan="3" class="three">8.</td>
    <td style="width:595px; text-align: left;" class="three">Tangki – tangki   
    </td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:225px; text-align: left;" class="three">- Bahan bakar </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->h8_1_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->h8_1_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->h8_1_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'h8_1_d'}.'</td>
  </tr>
  <tr style="text-align: center;">
    <td style="width:225px; text-align: left;" class="three">- Air tawar   </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->h8_2_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->h8_2_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->h8_2_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'h8_2_d'}.'</td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:35px; text-align: center;" rowspan="5" class="three">9.</td>
    <td style="width:595px; text-align: left;" class="three">Palka – palka  
    </td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:225px; text-align: left;" class="three">- Ambang palka </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->h9_1_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->h9_1_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->h9_1_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'h9_1_d'}.'</td>
  </tr>
  <tr style="text-align: center;">
    <td style="width:225px; text-align: left;" class="three">- Tutup palka dan peranginannya    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->h9_2_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->h9_2_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->h9_2_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'h9_2_d'}.'</td>
  </tr>
  <tr style="text-align: center;">
    <td style="width:225px; text-align: left;" class="three">- Ruang palka  </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->h9_3_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->h9_3_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->h9_3_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'h9_3_d'}.'</td>
  </tr>
  <tr style="text-align: center;">
    <td style="width:225px; text-align: left;" class="three">- Sekat/dinding palka  </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->h9_4_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->h9_4_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->h9_4_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'h9_4_d'}.'</td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:35px; text-align: center;" class="three">10.</td>
    <td style="width:225px; text-align: left;" class="three">Dapur masak dan alat perlengkapannya         
    <br><i></i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->h10_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->h10_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->h10_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'h10_d'}.'</td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:35px; text-align: center;" class="three">11.</td>
    <td style="width:225px; text-align: left;" class="three">Pipa udara, pipa limpah dan pipa duga           
    <br><i></i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->h11_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->h11_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->h11_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'h11_d'}.'</td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:35px; text-align: center;" class="three">12.</td>
    <td style="width:225px; text-align: left;" class="three">Tangga akomodasi             
    <br><i></i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->h12_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->h12_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->h12_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'h12_d'}.'</td>
  </tr> 

  </tbody>
</table>';

// output the HTML content
$pdf->writeHTMLCell($w='', $h='', $x=15, $y=30, $page2_3, $border=0, $ln=1, $fill=0, $reseth=true, $align='', $autopadding=true);

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
		<td style="width:630px;" class="three"><b>II. PENGGERAK BANTU  </b></td>
	</tr>  
  <tr style="text-align: center;">
    <td style="width:35px;" class="three"><b>No</b><br> <i> No</i></td>
	<td style="width:225px;" class="three"><b>KEADAAN</b></td>
    <td style="width:200px;" class="three"><b>DATA – DATA <br> 
    KETERANGAN – KETERANGAN <br> DLL </b></td>
    <td style="width:170px;" class="three"><b>KEADAAN</b></td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:35px; text-align: left;" class="three" rowspan="6">1.</td>
    <td style="width:225px; text-align: left;" class="three" rowspan="6">Penggerak bantu </td>
    <td style="width:200px; text-align: left;" class="three">1. Jumlah : <br>'.$data->i1_a.'</td>
    <td style="width:170px; text-align: left;" class="three" rowspan="6">'.$data->i1_g.'</td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:200px; text-align: left;" class="three">2. Merk : <br>'.$data->i1_b.'</td>
  </tr>
  <tr style="text-align: center;">
    <td style="width:200px; text-align: left;" class="three">3. Type : <br>'.$data->i1_c.'</td>
  </tr>
  <tr style="text-align: center;">
    <td style="width:200px; text-align: left;" class="three">4. No. Seri : <br>'.$data->i1_d.'</td>
  </tr>
  <tr style="text-align: center;">
    <td style="width:200px; text-align: left;" class="three">5. TK/KW : <br>'.$data->i1_e.'</td>
  </tr>
  <tr style="text-align: center;">
    <td style="width:200x; text-align: left;" class="three">6. : <br>'.$data->i1_f.'</td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:35px; text-align: center;" class="three">2.</td>
    <td style="width:225px; text-align: left;" class="three">Sistim star </td>
    <td style="width:200px; text-align: center;" class="three">'.$data->i2_a.'</td>
    <td style="width:170px; text-align: center;" class="three">'.$data->i2_b.'</td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:35px; text-align: center;" class="three">3.</td>
    <td style="width:225px; text-align: left;" class="three">Meteran – meteran dan alat-alat pengontrol bekerjanya penggerak bantu  </td>
    <td style="width:200px; text-align: center;" class="three">'.$data->i3_a.'</td>
    <td style="width:170px; text-align: center;" class="three">'.$data->i3_b.'</td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:35px; text-align: center;" class="three">4.</td>
    <td style="width:225px; text-align: left;" class="three">Tangki-tangki harian bahan bakar dank ran penutup</td>
    <td style="width:200px; text-align: center;" class="three">'.$data->i4_a.'</td>
    <td style="width:170px; text-align: center;" class="three">'.$data->i4_b.'</td>
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
		<td style="width:630px;" class="three"><b>III. GENERATOR  </b></td>
	</tr>  
  <tr style="text-align: center;">
    <td style="width:35px;" class="three"><b>No</b><br> <i> No</i></td>
	<td style="width:225px;" class="three"><b>KEADAAN</b></td>
    <td style="width:200px;" class="three"><b>DATA – DATA <br> 
    KETERANGAN – KETERANGAN <br> DLL </b></td>
    <td style="width:170px;" class="three"><b>KEADAAN</b></td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:35px; text-align: center;" class="three" rowspan="6">1.</td>
    <td style="width:225px; text-align: left;" class="three" rowspan="6">Generator </td>
    <td style="width:200px; text-align: left;" class="three">1. Jumlah : <br>'.$data->j1_a.'</td>
    <td style="width:170px; text-align: center;" class="three" rowspan="6">'.$data->j1_g.'</td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:200px; text-align: left;" class="three">2. Merk : <br>'.$data->j1_b.'</td>
  </tr>
  <tr style="text-align: center;">
    <td style="width:200px; text-align: left;" class="three">3. Type : <br>'.$data->j1_c.'</td>
  </tr>
  <tr style="text-align: center;">
    <td style="width:200px; text-align: left;" class="three">4. No. Seri : <br>'.$data->j1_d.'</td>
  </tr>
  <tr style="text-align: center;">
    <td style="width:200px; text-align: left;" class="three">5. TK/KW : <br>'.$data->j1_e.'</td>
  </tr>
  <tr style="text-align: center;">
    <td style="width:200px; text-align: left;" class="three">6. : <br>'.$data->j1_f.'</td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:35px; text-align: center;" class="three">2.</td>
    <td style="width:225px; text-align: left;" class="three">Panel hubung utama   </td>
    <td style="width:200px; text-align: center;" class="three">'.$data->j2_a.'</td>
    <td style="width:170px; text-align: center;" class="three">'.$data->j2_b.'</td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:35px; text-align: center;" class="three">3.</td>
    <td style="width:225px; text-align: left;" class="three">Penerangan darurat </td>
    <td style="width:200px; text-align: center;" class="three">'.$data->j3_a.'</td>
    <td style="width:170px; text-align: center;" class="three">'.$data->j3_b.'</td>
  </tr>

  </tbody>
</table>';

// output the HTML content
$pdf->writeHTMLCell($w='', $h='', $x=15, $y=160, $page2_3, $border=0, $ln=1, $fill=0, $reseth=true, $align='', $autopadding=true);

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
		<td style="width:630px;" class="three"><b>IV. POMPA – POMPA  </b></td>
	</tr>  
  <tr style="text-align: center;">
    <td style="width:35px;" class="three"><b>No</b><br> <i> No</i></td>
    <td style="width:225;" class="three"><b>Persyaratan</b><br> <i> Requirements</i></td>
    <td style="width:50px;" class="three"><b>Ya</b><br> <i> Yes</i></td>
    <td style="width:50px;" class="three"><b>Tidak</b><br> <i>No</i></td>
    <td style="width:90px;" class="three"><b>Tidak <br>Dipersyaratkan</b></td>
    <td style="width:180px;" class="three"><b>Keterangan</b><br> <i>Remarks</i></td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:35px; text-align: center;" class="three">1.</td>
    <td style="width:225px; text-align: left;" class="three">Pompa umum (G.S. Pump)      
    <br><i></i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->k1_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->k1_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->k1_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'k1_d'}.'</td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:35px; text-align: center;" class="three">2.</td>
    <td style="width:225px; text-align: left;" class="three">Pompa pemadam kebakaran       
    <br><i></i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->k2_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->k2_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->k2_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'k2_d'}.'</td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:35px; text-align: center;" class="three">3.</td>
    <td style="width:225px; text-align: left;" class="three">Pompa air tawar      
    <br><i></i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->k3_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->k3_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->k3_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'k3_d'}.'</td>
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
		<td style="width:630px;" class="three"><b>V. AKOMODASI ABK </b></td>
	</tr>   
  <tr style="text-align: center;">
    <td style="width:35px;" class="three"><b>No</b><br> <i> No</i></td>
    <td style="width:225;" class="three"><b>Persyaratan</b><br> <i> Requirements</i></td>
    <td style="width:50px;" class="three"><b>Ya</b><br> <i> Yes</i></td>
    <td style="width:50px;" class="three"><b>Tidak</b><br> <i>No</i></td>
    <td style="width:90px;" class="three"><b>Tidak <br>Dipersyaratkan</b></td>
    <td style="width:180px;" class="three"><b>Keterangan</b><br> <i>Remarks</i></td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:35px; text-align: center;" class="three">1.</td>
    <td style="width:225px; text-align: left;" class="three">Kulkas / frezzer (alat pendingin makanan      
    <br><i></i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->l1_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->l1_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->l1_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'l1_d'}.'</td>
  </tr>

  </tbody>
</table>';

// output the HTML content
$pdf->writeHTMLCell($w='', $h='', $x=15, $y=90, $page2_3, $border=0, $ln=1, $fill=0, $reseth=true, $align='', $autopadding=true);

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
		<td style="width:630px;" class="three"><b>VI. ALAT KEMUDI  </b></td>
	</tr>   
  <tr style="text-align: center;">
    <td style="width:35px;" class="three"><b>No</b><br> <i> No</i></td>
    <td style="width:225;" class="three"><b>Persyaratan</b><br> <i> Requirements</i></td>
    <td style="width:50px;" class="three"><b>Ya</b><br> <i> Yes</i></td>
    <td style="width:50px;" class="three"><b>Tidak</b><br> <i>No</i></td>
    <td style="width:90px;" class="three"><b>Tidak <br>Dipersyaratkan</b></td>
    <td style="width:180px;" class="three"><b>Keterangan</b><br> <i>Remarks</i></td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:35px; text-align: center;" class="three">1.</td>
    <td style="width:225px; text-align: left;" class="three">Kemudi utama        
    <br><i></i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->m1_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->m1_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->m1_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'m1_d'}.'</td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:35px; text-align: center;" class="three">2.</td>
    <td style="width:225px; text-align: left;" class="three">Kemudi bantu        
    <br><i></i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->m2_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->m2_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->m2_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'m2_d'}.'</td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:35px; text-align: center;" class="three">3.</td>
    <td style="width:225px; text-align: left;" class="three">Alat komunikasi        
    <br><i></i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->m3_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->m3_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->m3_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'m3_d'}.'</td>
  </tr>

  </tbody>
</table>';

// output the HTML content
$pdf->writeHTMLCell($w='', $h='', $x=15, $y=130, $page2_3, $border=0, $ln=1, $fill=0, $reseth=true, $align='', $autopadding=true);

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
		<td style="width:630px;" class="three"><b>VII. JANGKAR, RANTAI JANGKAR DLL </b></td>
	</tr>   
  <tr style="text-align: center;">
    <td style="width:35px;" class="three"><b>No</b><br> <i> No</i></td>
    <td style="width:225;" class="three"><b>Persyaratan</b><br> <i> Requirements</i></td>
    <td style="width:50px;" class="three"><b>Ya</b><br> <i> Yes</i></td>
    <td style="width:50px;" class="three"><b>Tidak</b><br> <i>No</i></td>
    <td style="width:90px;" class="three"><b>Tidak <br>Dipersyaratkan</b></td>
    <td style="width:180px;" class="three"><b>Keterangan</b><br> <i>Remarks</i></td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:35px; text-align: center;" class="three">1.</td>
    <td style="width:225px; text-align: left;" class="three">Jangkar         
    <br><i></i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->n1_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->n1_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->n1_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'n1_d'}.'</td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:35px; text-align: center;" class="three">2.</td>
    <td style="width:225px; text-align: left;" class="three">Rantai / tali jangkar         
    <br><i></i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->n2_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->n2_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->n2_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'n2_d'}.'</td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:35px; text-align: center;" class="three">3.</td>
    <td style="width:225px; text-align: left;" class="three">Penggeraknya         
    <br><i></i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->n3_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->n3_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->n3_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'n3_d'}.'</td>
  </tr>

  </tbody>
</table>';

// output the HTML content
$pdf->writeHTMLCell($w='', $h='', $x=15, $y=195, $page2_3, $border=0, $ln=1, $fill=0, $reseth=true, $align='', $autopadding=true);

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
		<td style="width:630px;" class="three"><b>VIII. ALAT – ALAT BONGKAR MUAT  </b></td>
	</tr>   
  <tr style="text-align: center;">
    <td style="width:35px;" class="three"><b>No</b><br> <i> No</i></td>
    <td style="width:225;" class="three"><b>Persyaratan</b><br> <i> Requirements</i></td>
    <td style="width:50px;" class="three"><b>Ya</b><br> <i> Yes</i></td>
    <td style="width:50px;" class="three"><b>Tidak</b><br> <i>No</i></td>
    <td style="width:90px;" class="three"><b>Tidak <br>Dipersyaratkan</b></td>
    <td style="width:180px;" class="three"><b>Keterangan</b><br> <i>Remarks</i></td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:35px; text-align: center;" class="three">1.</td>
    <td style="width:225px; text-align: left;" class="three">Alat pemuat       
    <br><i></i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->o1_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->o1_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->o1_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'o1_d'}.'</td>
  </tr>

  </tbody>
</table>';

// output the HTML content
$pdf->writeHTMLCell($w='', $h='', $x=15, $y=255, $page2_3, $border=0, $ln=1, $fill=0, $reseth=true, $align='', $autopadding=true);

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
		<td style="width:630px;" class="three"><b>IX. PENCEGAHAN POLUSI  </b></td>
	</tr> 
  <tr style="text-align: center;">
    <td style="width:35px;" class="three"><b>No</b><br> <i> No</i></td>
    <td style="width:225;" class="three"><b>Persyaratan</b><br> <i> Requirements</i></td>
    <td style="width:50px;" class="three"><b>Ya</b><br> <i> Yes</i></td>
    <td style="width:50px;" class="three"><b>Tidak</b><br> <i>No</i></td>
    <td style="width:90px;" class="three"><b>Tidak <br>Dipersyaratkan</b></td>
    <td style="width:180px;" class="three"><b>Keterangan</b><br> <i>Remarks</i></td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:35px; text-align: center;" class="three">1.</td>
    <td style="width:225px; text-align: left;" class="three">Tangki-tangki minyak kotor          
    <br><i></i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->p1_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->p1_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->p1_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'p1_d'}.'</td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:35px; text-align: center;" class="three">2.</td>
    <td style="width:225px; text-align: left;" class="three">Tangki kotoran dari WC          
    <br><i></i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->p2_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->p2_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->p2_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'p2_d'}.'</td>
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
		<td style="width:630px;" class="three"><b>X. SPARE PART, PERKAKAS KERJA BAHAN – BAHAN 	DLL </b></td>
	</tr> 
  <tr style="text-align: center;">
    <td style="width:35px;" class="three"><b>No</b><br> <i> No</i></td>
    <td style="width:225;" class="three"><b>Persyaratan</b><br> <i> Requirements</i></td>
    <td style="width:50px;" class="three"><b>Ya</b><br> <i> Yes</i></td>
    <td style="width:50px;" class="three"><b>Tidak</b><br> <i>No</i></td>
    <td style="width:90px;" class="three"><b>Tidak <br>Dipersyaratkan</b></td>
    <td style="width:180px;" class="three"><b>Keterangan</b><br> <i>Remarks</i></td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:35px; text-align: center;" class="three">1.</td>
    <td style="width:225px; text-align: left;" class="three">Spare part            
    <br><i></i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->q1_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->q1_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->q1_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'q1_d'}.'</td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:35px; text-align: center;" class="three">2.</td>
    <td style="width:225px; text-align: left;" class="three">Perkakas kerja kunci dll           
    <br><i></i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->q2_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->q2_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->q2_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'q2_d'}.'</td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:35px; text-align: center;" class="three">3.</td>
    <td style="width:225px; text-align: left;" class="three">Bahan – bahan             
    <br><i></i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->q3_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->q3_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->q3_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'q3_d'}.'</td>
  </tr>  

  </tbody>
</table>';

// output the HTML content
$pdf->writeHTMLCell($w='', $h='', $x=15, $y=80, $page2_3, $border=0, $ln=1, $fill=0, $reseth=true, $align='', $autopadding=true);

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
		<td style="width:630px;" class="three"><b>XI. PERANGKAT KOMUNIKASI  </b></td>
	</tr> 
  <tr style="text-align: center;">
    <td style="width:35px;" class="three"><b>No</b><br> <i> No</i></td>
    <td style="width:225;" class="three"><b>Persyaratan</b><br> <i> Requirements</i></td>
    <td style="width:50px;" class="three"><b>Ya</b><br> <i> Yes</i></td>
    <td style="width:50px;" class="three"><b>Tidak</b><br> <i>No</i></td>
    <td style="width:90px;" class="three"><b>Tidak <br>Dipersyaratkan</b></td>
    <td style="width:180px;" class="three"><b>Keterangan</b><br> <i>Remarks</i></td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:35px; text-align: center;" class="three">1.</td>
    <td style="width:225px; text-align: left;" class="three">VHF             
    <br><i></i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->r1_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->r1_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->r1_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'r1_d'}.'</td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:35px; text-align: center;" class="three">2.</td>
    <td style="width:225px; text-align: left;" class="three">MF / HF            
    <br><i></i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->r2_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->r2_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->r2_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'r2_d'}.'</td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:35px; text-align: center;" class="three">2.</td>
    <td style="width:225px; text-align: left;" class="three">EPIRB              
    <br><i></i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->r3_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->r3_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->r3_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'r3_d'}.'</td>
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
		<td style="width:630px;" class="three"><b>XII. BUKU HARIAN</b></td>
	</tr>   
  <tr style="text-align: center;">
    <td style="width:35px;" class="three"><b>No</b><br> <i> No</i></td>
    <td style="width:225;" class="three"><b>Persyaratan</b><br> <i> Requirements</i></td>
    <td style="width:50px;" class="three"><b>Ya</b><br> <i> Yes</i></td>
    <td style="width:50px;" class="three"><b>Tidak</b><br> <i>No</i></td>
    <td style="width:90px;" class="three"><b>Tidak <br>Dipersyaratkan</b></td>
    <td style="width:180px;" class="three"><b>Keterangan</b><br> <i>Remarks</i></td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:35px; text-align: center;" class="three">1.</td>
    <td style="width:225px; text-align: left;" class="three">Buku harian              
    <br><i></i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->s1_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->s1_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->s1_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'s1_d'}.'</td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:35px; text-align: center;" class="three">2.</td>
    <td style="width:225px; text-align: left;" class="three">Buku catatan minyak              
    <br><i></i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->s2_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->s2_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->s2_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'s2_d'}.'</td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:35px; text-align: center;" class="three">3.</td>
    <td style="width:225px; text-align: left;" class="three">Buku harian radio                
    <br><i></i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->s3_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->s3_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->s3_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'s3_d'}.'</td>
  </tr>  

  </tbody>
</table>';

// output the HTML content
$pdf->writeHTMLCell($w='', $h='', $x=15, $y=200, $page2_3, $border=0, $ln=1, $fill=0, $reseth=true, $align='', $autopadding=true);

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
		<td style="width:630px;" class="three"><b>XIII. PERWIRA DECK DAN KAMAR MESIN SERTA IJAZAH YANG DIMILIKINYA </b></td>
	</tr>  
  <tr style="text-align: center;">
    <td style="width:35px;" class="three"><b>No</b><br> <i> No</i></td>
    <td style="width:300;" class="three"><b>Persyaratan</b><br> <i> Requirements</i></td>
    <td style="width:295px;" class="three"><b>Keterangan</b><br> <i>Remarks</i></td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:35px; text-align: center;" class="three">1.</td>
    <td style="width:300px; text-align: left;" class="three">Jumlah ABK Dek               
    <br><i></i>
    </td>
    <td style="width:295px; text-align: center;" class="three">'.$data->{'t1'}.'</td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:35px; text-align: center;" class="three">2.</td>
    <td style="width:300px; text-align: left;" class="three">Jumlah ABK Mesin               
    <br><i></i>
    </td>
    <td style="width:295px; text-align: center;" class="three">'.$data->{'t2'}.'</td>
  </tr>

  </tbody>
</table>';

// output the HTML content
$pdf->writeHTMLCell($w='', $h='', $x=15, $y=260, $page2_3, $border=0, $ln=1, $fill=0, $reseth=true, $align='', $autopadding=true);

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
		<td style="width:630px;" class="three"><b>XIV. LAIN - LAIN </b></td>
	</tr>

  <tr style="text-align: center;">
    <td style="width:35px; text-align: center;" class="three">1.</td>
    <td style="width:140px; text-align: left;" class="three">Pemeriksaan mesin terakhir                
    <br><i></i>
    </td>
    <td style="width:35px; text-align: center;" class="three">Di</td>
    <td style="width:160px; text-align: center;" class="three">'.$data->u1_a.'</td>
    <td style="width:80px; text-align: center;" class="three">Tanggal</td>
    <td style="width:180px; text-align: center;" class="three">'.date_indo($data->u1_b).'</td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:35px; text-align: center;" class="three">2.</td>
    <td style="width:140px; text-align: left;" class="three">Pemeriksaan besar terakhir                
    <br><i></i>
    </td>
    <td style="width:35px; text-align: center;" class="three">Di</td>
    <td style="width:160x; text-align: center;" class="three">'.$data->u2_a.'</td>
    <td style="width:80px; text-align: center;" class="three">Tanggal</td>
    <td style="width:180px; text-align: center;" class="three">'.date_indo($data->u2_b).'</td>
  </tr>

  </tbody>
</table>';

// output the HTML content
$pdf->writeHTMLCell($w='', $h='', $x=15, $y=30, $page2_3, $border=0, $ln=1, $fill=0, $reseth=true, $align='', $autopadding=true);

$page2_4 = '
<style>
td.one {border-top-style: solid; border-bottom-style: solid; border-right-style: solid; border-width:1;}
td.two {border-top-style: solid; border-bottom-style: solid; border-left-style: solid; border-width:1;}
td.three {border-top-style: solid; border-bottom-style: solid; border-left-style: solid; border-right-style: solid; border-width:1;}
td.four {border-top-style: solid; border-bottom-style: solid; border-width:1;}
</style>
<table style="font-size: 11px; padding:6;" >
  <tbody>
  <tr style="text-align: center;">
		<td style="width:630px;" class="three"><b>XV. REKOMENDASI </b></td>
	</tr>

  <tr style="text-align: center;">
    <td style="width:630px; height:250px; text-align: center;" class="three">'.$data->v1.'</td>
  </tr>

  </tbody>
</table>';

// output the HTML content
$pdf->writeHTMLCell($w='', $h='', $x=15, $y=70, $page2_4, $border=0, $ln=1, $fill=0, $reseth=true, $align='', $autopadding=true);

$page2_5 = '
<style>
td.one {border-bottom-style: dotted;
  border-bottom-color: #00000;}
td.two {border-top-style: solid; border-bottom-style: solid; border-left-style: solid; border-width:1;}
td.three {border-top-style: solid; border-bottom-style: solid; border-left-style: solid; border-right-style: solid; border-width:1;}
td.four {border-top-style: solid; border-bottom-style: solid; border-width:1;}
</style>
<table style="font-size: 11px; padding:6;" >
  <tbody>
  <tr style="text-align: left;">
    <td style="width:30px;"></td>
    <td style="width:600px;" >Surat permohonan pemilik  </td>
  </tr>
  <tr style="text-align: left;">
    <td style="width:30px;"></td>
    <td style="width:50px;">No. </td>
    <td style="width:250px;" class="one"> : '.$data->v4.'</td>
    <td style="width:50px;">Tanggal</td>
    <td style="width:250px;" class="one"> : '.$data->v5.'</td>
  </tr>
  
  <tr style="text-align: left;">
    <td style="width:30px;"></td>
    <td style="width:600px;" >Surat Perintah Dirkapel </td>
  </tr>
  <tr style="text-align: left;">
    <td style="width:30px;"></td>
    <td style="width:50px;">No. </td>
    <td style="width:250px;" class="one"> : '.$data->v6.'</td>
    <td style="width:50px;">Tanggal</td>
    <td style="width:250px;" class="one"> : '.$data->v7.'</td>
	</tr>


  </tbody>
</table>';

// output the HTML content
$pdf->writeHTMLCell($w='', $h='', $x=15, $y=160, $page2_5, $border=0, $ln=1, $fill=0, $reseth=true, $align='', $autopadding=true);

$page2_6 = '
<style>
td.one {border-bottom-style: dotted;
  border-bottom-color: #00000;}
td.two {border-top-style: solid; border-bottom-style: solid; border-left-style: solid; border-width:1;}
td.three {border-top-style: solid; border-bottom-style: solid; border-left-style: solid; border-right-style: solid; border-width:1;}
td.four {border-top-style: solid; border-bottom-style: solid; border-width:1;}
</style>
<table style="font-size: 11px; padding:6;" >
  <tbody>

  <tr style="text-align: center;">
    <td style="width:30px;"></td>
    <td style="width:200px;"></td>
    <td style="width:200px;"></td>
    <td style="width:200px;">'.$data->v6.','.date_indo($data->v7).'</td>
    <td style="width:30px;"></td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:30px;"></td>
    <td style="width:200px;">Nahkoda</td>
    <td style="width:200px;"></td>
    <td style="width:200px;">Pemeriksa</td>
    <td style="width:30px;"></td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:30px; height:80px;"></td>
    <td style="width:200px;"></td>
    <td style="width:200px;"></td>
    <td style="width:200px;"></td>
    <td style="width:30px;"></td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:30px;"></td>
    <td style="width:200px;"><u>'.$data->v8.'</u> <br> '.$data->v9.'</td>
    <td style="width:200px;"></td>
    <td style="width:200px;"><u>'.$data->v10.'</u> <br> '.$data->v11.'</td>
    <td style="width:30px;"></td>
  </tr>


  <tr style="text-align: center;">
    <td style="width:30px;"></td>
    <td style="width:200px;"></td>
    <td style="width:200px;">Mengetahui <br>
    Kasi Status Hukum Dan Sertifikasi Kapal
    </td>
    <td style="width:200px;"></td>
    <td style="width:30px;"></td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:30px; height:80px;"></td>
    <td style="width:200px;"></td>
    <td style="width:200px;"></td>
    <td style="width:200px;"></td>
    <td style="width:30px;"></td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:30px;"></td>
    <td style="width:200px;"></td>
    <td style="width:200px;"><u>'.$data->v12.'</u> <br> '.$data->v13.'</td>
    <td style="width:200px;"></td>
    <td style="width:30px;"></td>
  </tr>




  </tbody>
</table>';

// output the HTML content
$pdf->writeHTMLCell($w='', $h='', $x=15, $y=200, $page2_6, $border=0, $ln=1, $fill=0, $reseth=true, $align='', $autopadding=true);

$pdf->lastPage();

// ---------------------------------------------------------
ob_clean();

$pdf->Output($title.'.pdf', 'I');
//============================================================+
// END OF FILE
//============================================================+

?>