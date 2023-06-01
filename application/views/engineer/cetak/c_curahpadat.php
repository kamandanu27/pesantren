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
        <td><b>KAPAL DALAM RANGKA KELAYAKAN KAPAL UNTUK MUATAN PADAT SECARA </b></td>
      </tr>
      <tr style="text-align: center;">
        <td><b>CURAH ( IMSBC CODE)</b></td>
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
      <td class="one"><b>: '.$data->a3.'</b></td>
    </tr>
    <tr style="text-align: left;">
      <td><b>TEMPAT, TANGGAL PEMERIKSAAN</b></td>
      <td class="one"><b>: '.$data->b3.' , '.date_indo($data->b4).'</b></td>
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
      <td><b>LAPORAN SINGKAT TENTANG KELAYAKAN KAPAL UNTUK <br>
      MENGANGKUT MUATAN PADAT SECARA CURAH</b></td>
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
    <td style="width:160px;" class="one"> '.$data->b1.'</td>
    <td style="width:10px;"></td>
    <td colspan="2" style="width:55px;"><b>MILIK :</b></td>
    <td style="width:225px;" class="one">'.$data->b2.'</td>
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
    <td style="width:205px;" class="one">'.$data->b5.'</td>
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
    <td style="width:35px;" class="three"><b>No</b><br> <i> No</i></td>
    <td style="width:225;" class="three"><b>Persyaratan</b><br> <i> Requirements</i></td>
    <td style="width:50px;" class="three"><b>Ya</b><br> <i> Yes</i></td>
    <td style="width:50px;" class="three"><b>Tidak</b><br> <i>No</i></td>
    <td style="width:90px;" class="three"><b>Tidak <br>Dipersyaratkan</b></td>
    <td style="width:180px;" class="three"><b>Keterangan</b><br> <i>Remarks</i></td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:35px; text-align: center;" class="three">1.</td>
    <td style="width:225px; text-align: left;" class="three">Batasan-batasan komponen tahan terhadap api dan masuknya air
    <br><i>Boundaries of component are to be resistant to fire and passage of water</i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->c1_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->c1_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->c1_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'c1_d'}.'</td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:35px; text-align: center;" class="three">2.</td>
    <td style="width:225px; text-align: left;" class="three">Tanda-tanda DILARANG MEROKOK ditempatkan pada dek da berbagai area yang berdekatan dengan ruang muatan
    <br><i>“No Smoking” signs are to be posted on deck and in areas adjacent to cargo compartments</i>

    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->c2_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->c2_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->c2_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'c2_d'}.'</td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:35px; text-align: center;" class="three">3.</td>
    <td style="width:225px; text-align: left;" class="three">Sistem ventilasi alami atau mekanikal harus disediakan dan tersedia di ruang muat
    <br><i>Natural or mechanical ventilation system is to be provided for cargo holds</i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->c3_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->c3_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->c3_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'c3_d'}.'</td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:35px; text-align: center;" class="three">4.</td>
    <td style="width:225px; text-align: left;" class="three">Paling kurang dua kipas ventilasi mekanik harus tersedia untuk ruang muat. Paling kurang 6 (enam) ventilasi udara untuk pertukaran udara setiap jamnya.
    <br>Bukaan ventilasi adalah untuk memenuhi persyaratan Load Line Konvensi sebagaimana telah diubah bukaan tidak dilengkapi dengan sarana penutupan.
    <br><i>At least to mechanical ventilation fans are to provided for cargo holds. The ventilation is to be at least six air change per hour. Ventilation openings are to comply with the requirements of
    the Load Line Convention as amended for openings not fitted with means of closure
    </i>

    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->c4_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->c4_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->c4_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'c4_d'}.'</td>
  </tr>

  </tbody>
</table>';

// output the HTML content
$pdf->writeHTMLCell($w='', $h='', $x=15, $y=115, $page2_3, $border=0, $ln=1, $fill=0, $reseth=true, $align='', $autopadding=true);

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
    <td style="width:35px;" class="three"><b>No</b><br> <i> No</i></td>
    <td style="width:225;" class="three"><b>Persyaratan</b><br> <i> Requirements</i></td>
    <td style="width:50px;" class="three"><b>Ya</b><br> <i> Yes</i></td>
    <td style="width:50px;" class="three"><b>Tidak</b><br> <i>No</i></td>
    <td style="width:90px;" class="three"><b>Tidak <br>Dipersyaratkan</b></td>
    <td style="width:180px;" class="three"><b>Keterangan</b><br> <i>Remarks</i></td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:35px; text-align: center;" class="three">5.</td>
    <td style="width:225px; text-align: left;" class="three">Kipas Ventilasi harus aman digunakan pada kondisi udara mudah terbakar
    <br><i>Ventilation fans are to be safe for use in a
    flammable atmosphere
    </i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->c5_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->c5_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->c5_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'c5_d'}.'</td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:35px; text-align: center;" class="three">6.</td>
    <td style="width:225px; text-align: left;" class="three">Layar yang tahan terhadap percikan api (dilapisi dengan kawat pelindung dengan maksimal 13 mm x 12 mm) dipasang pada berbagai pembukaan ventilasi
    <br><i>Spark-arresting screens (wire mesh guards with max 13mm x 13mm) are to be fitted to ventilation openings</i>

    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->c6_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->c6_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->c6_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'c6_d'}.'</td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:35px; text-align: center;" class="three">7.</td>
    <td style="width:225px; text-align: left;" class="three">Dua alat bantu pernafasan dengan 200% bagian tabung merupakan alat tambahan yang harus disediakan
    <br><i>Two self contained breathing apparatus with
    200% spare cylinders are to be additionally provided
    </i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->c7_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->c7_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->c7_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'c7_d'}.'</td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:35px; text-align: center;" class="three">8.</td>
    <td style="width:225px; text-align: left;" class="three">4 set pakaiaan pelindung yang terdiri dari 1 pasang sarung tangan, sepatu, setelah pakaian pelindung dan helm dengan kaca mata pelindung disediakan sebagai tambahan
    <br><i>Four sets of protective clothing when consists of a pair of gloves, boots, a protective clothing and
    helmet with goggles are to be additionally provided    
    </i>

    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->c8_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->c8_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->c8_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'c8_d'}.'</td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:35px; text-align: center;" class="three">9.</td>
    <td style="width:225px; text-align: left;" class="three">Peralatan listrik yang tidak cocok dan dapat menimbulkan ledakan harus diputus dengan menghilangkan jalur dalam system, selain sekering dari sumber listrik pada peralatan eksternal titik dianggap sebagai ledakan yang cocok jenis dilindungi
    <br><i>Not suitable explosion protected type electrical equipment are to be disconnected (by removal of links in the system, other than fuses) from the power source at a point external to the space.
    Intrinsically safe type electrical equipment are considered as suitable explosion protected type
    </i>

    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->c9_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->c9_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->c9_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'c9_d'}.'</td>
  </tr>

  </tbody>
</table>';

// output the HTML content
$pdf->writeHTMLCell($w='', $h='', $x=15, $y=30, $page3_1, $border=0, $ln=1, $fill=0, $reseth=true, $align='', $autopadding=true);

$pdf->AddPage();

$page4_a = '
<style>
td.one {border-top-style: solid; border-bottom-style: solid; border-right-style: solid; border-width:1;}
td.two {border-top-style: solid; border-bottom-style: solid; border-left-style: solid; border-width:1;}
td.three {border-top-style: solid; border-bottom-style: solid; border-left-style: solid; border-right-style: solid; border-width:1;}
td.four {border-top-style: solid; border-bottom-style: solid; border-width:1;}
</style>
<table style="font-size: 11px; padding:6;" >
  <tbody>
  <tr style="text-align: center;">
    <td colspan="6" style="width:630px;"><b>CHECKLIST – IMSBC</b></td>
  </tr>
  <tr style="text-align: center;">
    <td colspan="6" style="width:630px;">untuk muatan yang lain selain batu bara dan briket batu bara coklat<br><i>(For cargoes other than Coal and Brown Coal Briquettes)</i></td>
  </tr>
  
  </tbody>
</table>';
// output the HTML content
$pdf->writeHTMLCell($w='', $h='', $x=15, $y=30, $page4_a, $border=0, $ln=1, $fill=0, $reseth=true, $align='', $autopadding=true);

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
    <td colspan="6" class="three" style="width:630px;"><b>PENYIMPANAN</b><br> <i> STOWAGE</i></td>
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
    <td style="width:225px; text-align: left;" class="three">Bulkhead ke ruang mesin harus dibataso dengan standar A-6
    <br><i>Bulkheads to the engine room are to be insulated
    to A-60 standard    
    </i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->d1_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->d1_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->d1_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'d1_d'}.'</td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:35px; text-align: center;" class="three">2.</td>
    <td style="width:225px; text-align: left;" class="three">Batasan – batasan komponen tahan terhadap api dan masukannya air
    <br><i>SBoundaries of components are to resistance to
    fire and passage of water
    </i>

    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->d2_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->d2_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->d2_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'d2_d'}.'</td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:35px; text-align: center;" class="three">3.</td>
    <td style="width:225px; text-align: left;" class="three">Bulkhead ke ruang mesin harus bebeas dari gas
    <br><i>Bulkheads to the engine room to be of gastight
    </i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->d3_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->d3_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->d3_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'d3_d'}.'</td>
  </tr>

  </tbody>
</table>';
// output the HTML content
$pdf->writeHTMLCell($w='', $h='', $x=15, $y=50, $page4_1, $border=0, $ln=1, $fill=0, $reseth=true, $align='', $autopadding=true);

$page4_2 = '
<style>
td.one {border-top-style: solid; border-bottom-style: solid; border-right-style: solid; border-width:1;}
td.two {border-top-style: solid; border-bottom-style: solid; border-left-style: solid; border-width:1;}
td.three {border-top-style: solid; border-bottom-style: solid; border-left-style: solid; border-right-style: solid; border-width:1;}
td.four {border-top-style: solid; border-bottom-style: solid; border-width:1;}
</style>
<table style="font-size: 11px; padding:6;" >
  <tbody>
  <tr style="text-align: center;">
    <td colspan="6" class="three" style="width:630px;"><b>TANDA DILARANG MEROKOK</b><br> <i> NO SMOKING</i></td>
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
    <td style="width:225px; text-align: left;" class="three">Tanda DILARANG MEROKOK ditempatkan pada dek dan diarea yang berdekatan dengan ruang muat
    <br><i>NO SMOKING signs are to be pasted on decks and in areas adjacent to cargo compartment    
    </i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->e1_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->e1_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->e1_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'e1_d'}.'</td>
  </tr>


  </tbody>
</table>';

// output the HTML content
$pdf->writeHTMLCell($w='', $h='', $x=15, $y=125, $page4_2, $border=0, $ln=1, $fill=0, $reseth=true, $align='', $autopadding=true);

$page4_3 = '
<style>
td.one {border-top-style: solid; border-bottom-style: solid; border-right-style: solid; border-width:1;}
td.two {border-top-style: solid; border-bottom-style: solid; border-left-style: solid; border-width:1;}
td.three {border-top-style: solid; border-bottom-style: solid; border-left-style: solid; border-right-style: solid; border-width:1;}
td.four {border-top-style: solid; border-bottom-style: solid; border-width:1;}
</style>
<table style="font-size: 11px; padding:6;" >
  <tbody>
  <tr style="text-align: center;">
    <td colspan="6" class="three" style="width:630px;"><b>VENTILASI</b><br> <i> VENTILATION</i></td>
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
    <td style="width:225px; text-align: left;" class="three">Sistem	Ventilasi	alam	disediakan	untuk penanganan muatan<br><i>Natural ventilation system are to be provided for cargo holds</i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->f1_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->f1_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->f1_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'f1_d'}.'</td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:35px; text-align: center;" class="three">2.</td>
    <td style="width:225px; text-align: left;" class="three">Sistem ventilasi alam atau mekanikal disediakan untuk penanganan muatan<br><i>Natural of mechanical ventilation systems are to be provided for cargo holds</i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->f2_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->f2_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->f2_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'f2_d'}.'</td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:35px; text-align: center;" class="three">3.</td>
    <td style="width:225px; text-align: left;" class="three">Sistem ventilasi mekanikal disediakan untuk penanganan Muatan<br><i>Mechanical ventilation systems are to be provided for cargo holds</i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->f3_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->f3_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->f3_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'f3_d'}.'</td>
  </tr>


  </tbody>
</table>';

// output the HTML content
$pdf->writeHTMLCell($w='', $h='', $x=15, $y=175, $page4_3, $border=0, $ln=1, $fill=0, $reseth=true, $align='', $autopadding=true);

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
    <td colspan="6" class="three" style="width:630px;"><b>VENTILASI</b><br> <i> VENTILATION</i></td>
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
    <td style="width:35px; text-align: center;" class="three">4.</td>
    <td style="width:225px; text-align: left;" class="three">Setidaknya dua kipas ventilasi mekanikal disediakan untuk penanganan Muatan. Ventilasi total setidaknya terdapat enam pertukaran udara per jam. Berbagai pembukaan ventilasi harus memenuhi berbagai persyaratan dari konvensi jalur muatan sebagaimana yang diamandemenkan untuk pembukaan yang tidak dipasangkan dengan alat penutupan<br><i></i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->f4_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->f4_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->f4_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'f4_d'}.'</td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:35px; text-align: center;" class="three">5.</td>
    <td style="width:225px; text-align: left;" class="three">Kipas ventilasi harus aman digunakan pada kondisi udara mudah terbakar<br><i>Ventilation fans are a be safe for use in a flammable atmosphere</i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->f5_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->f5_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->f5_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'f5_d'}.'</td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:35px; text-align: center;" class="three">6.</td>
    <td style="width:225px; text-align: left;" class="three">Layar yang tahan terhadap percikan api (dilapisi dengan kawat pelindung dengan maksimal 13 mm x 13 mm dipasangkan pada berbagai pembukaan ventilasi<br><i>Spark – arresting screens wire mesh guards with max 13mm x 13mm are to be fitted to ventilation</i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->f6_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->f6_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->f6_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'f6_d'}.'</td>
  </tr>

  </tbody>
</table>';

// output the HTML content
$pdf->writeHTMLCell($w='', $h='', $x=15, $y=30, $page5_1, $border=0, $ln=1, $fill=0, $reseth=true, $align='', $autopadding=true);

$page5_2 = '
<style>
td.one {border-top-style: solid; border-bottom-style: solid; border-right-style: solid; border-width:1;}
td.two {border-top-style: solid; border-bottom-style: solid; border-left-style: solid; border-width:1;}
td.three {border-top-style: solid; border-bottom-style: solid; border-left-style: solid; border-right-style: solid; border-width:1;}
td.four {border-top-style: solid; border-bottom-style: solid; border-width:1;}
</style>
<table style="font-size: 11px; padding:6;" >
  <tbody>
  <tr style="text-align: center;">
    <td colspan="6" class="three" style="width:630px;"><b>SCBA</b><br> <i> SCBA</i></td>
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
    <td style="width:225px; text-align: left;" class="three">Dua alat bernafas sendiri dengan tabung cadangan 200% harus disediakan tambahan<br><i>Two self contained breathing apparatuses with 200% spare cylinders are to be additionally provided
    </i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->g1_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->g1_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->g1_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'g1_d'}.'</td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:35px; text-align: center;" class="three">2.</td>
    <td style="width:225px; text-align: left;" class="three">Pakaian pelindung yang tahan terhadap bahan kimia :
    <br><i>Protective clothing resistant to chemical attack : </i>
    <br>Tambahan 4 (empat) set pakaian pelindung yang terdiri dari sepasang sarung tangan, sepatu bot, pakaian pelindung dan helm dengan kacamata harus disediakan
    <br><i>Four sets of protective clothing which consists of boots, gloves, coverall and headgear are to be additionally provided</i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->g2_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->g2_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->g2_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'g2_d'}.'</td>
  </tr>

  </tbody>
</table>';

// output the HTML content
$pdf->writeHTMLCell($w='', $h='', $x=15, $y=145, $page5_2, $border=0, $ln=1, $fill=0, $reseth=true, $align='', $autopadding=true);

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
    <td colspan="6" class="three" style="width:630px;"><b>PIPA GOT</b><br> <i>BILGE LINE</i></td>
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
    <td style="width:225px; text-align: left;" class="three">Dalam kasus dimana pipa got berada diatas ruang mesin, pipa got dipisahkan baik dengan pemasangan sebuah pinggiran yang kosong atau dengan katup yang dapat dikunci dalam keadaan tertutup.<br><i>In case whire bilge lines are led to machinery space , bilge lines are to be isolated either by fitting a blank flange or by a closed lockable valve.</i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->h1_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->h1_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->h1_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'h1_d'}.'</td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:35px; text-align: center;" class="three">2.</td>
    <td style="width:225px; text-align: left;" class="three">Sebuah catatan yang ditempatkan berdekatan dengan pembukaan kran dilarang dibuka tanpa seijin nakhoda.<br><i>A notice is to be placed adjacent to the valve warning against opening without the master’s permission.
    </i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->h2_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->h2_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->h2_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'h2_d'}.'</td>
  </tr>

  </tbody>
</table>';

// output the HTML content
$pdf->writeHTMLCell($w='', $h='', $x=15, $y=30, $page6_1, $border=0, $ln=1, $fill=0, $reseth=true, $align='', $autopadding=true);


$page6_2 = '
<style>
td.one {border-top-style: solid; border-bottom-style: solid; border-right-style: solid; border-width:1;}
td.two {border-top-style: solid; border-bottom-style: solid; border-left-style: solid; border-width:1;}
td.three {border-top-style: solid; border-bottom-style: solid; border-left-style: solid; border-right-style: solid; border-width:1;}
td.four {border-top-style: solid; border-bottom-style: solid; border-width:1;}
</style>
<table style="font-size: 11px; padding:6;" >
  <tbody>
  <tr style="text-align: center;">
    <td colspan="6" class="three" style="width:630px;"><b>PERLENGKAPAN LISTRIK</b><br> <i>ELECTRICAL EQUIPMENT</i></td>
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
    <td style="width:225px; text-align: left;" class="three">Perlengkapan Listrik dipasangkan di ruang muat, termasuk motor, sistem ventilasi mekanikal, untuk jenis yang aman dan memiliki sebuah tingkat pelindung ledakan atau jenis yang dinyatakan dibawah ini. Bukanlah jenis perlengkapan listrik yang dilindungi dari ledakan yang mampu dipisahkan secara positif dari luar ruangan<br><i>Electrical equipment fitted in the cargo holds , including motors of mechanical ventilation systems , are to be of safe type having an explosion protection grade / type stated below or up wards Not suitable explosion protected type electrical equipment are to be capable of being positively isolated from outside of the spaces
    </i>
    
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->i1_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->i1_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->i1_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'i1_d'}.'</td>
  </tr>

  </tbody>
</table>';

// output the HTML content
$pdf->writeHTMLCell($w='', $h='', $x=15, $y=125, $page6_2, $border=0, $ln=1, $fill=0, $reseth=true, $align='', $autopadding=true);


$pdf->AddPage();

$page7_1 = '
<style>
td.one {border-top-style: solid; border-bottom-style: solid; border-right-style: solid; border-width:1;}
td.two {border-top-style: solid; border-bottom-style: solid; border-left-style: solid; border-width:1;}
td.three {border-top-style: solid; border-bottom-style: solid; border-left-style: solid; border-right-style: solid; border-width:1;}
td.four {border-top-style: solid; border-bottom-style: solid; border-width:1;}
</style>
<table style="font-size: 11px; padding:6;" >
  <tbody>
  <tr style="text-align: center;">
    <td colspan="6" class="three" style="width:630px;"><b>NOSEL FUNGSI GANDA</b><br> <i>DUAL PURPOSE NOZZLE</i></td>
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
    <td style="width:225px; text-align: left;" class="three">Nosel tersebut disediakan dengan pemadaman api untuk jenis tujuan ganda (contohnya disemprot/dipancar)<br><i>Nozzle provided with fire hoses are to be of dual – purpose type ( i.e.,spray / jet type )</i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->j1_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->j1_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->j1_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'j1_d'}.'</td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:35px; text-align: center;" class="three">2.</td>
    <td style="width:225px; text-align: left;" class="three">4 pemancaran air: Jumlah air yang dikeluarkan harus mampu mengalirkan keempat(4) nosel pada tekanan sebagaimana yang dikhususkan pada peraturan SOLAS yang sedang melaksanakan pelatihan pada beberapa bagian ruang muat yang kosong <br><i>The quantity of water delivered is to be capable of supplying four nozzles at pressure as specified in SOLAS regulation and being trained on any part of the cargo space when empty

    </i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->j2_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->j2_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->j2_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'j2_d'}.'</td>
  </tr>

  </tbody>
</table>';

// output the HTML content
$pdf->writeHTMLCell($w='', $h='', $x=15, $y=30, $page7_1, $border=0, $ln=1, $fill=0, $reseth=true, $align='', $autopadding=true);

$pdf->AddPage();

$page8_a = '
<style>
td.one {border-top-style: solid; border-bottom-style: solid; border-right-style: solid; border-width:1;}
td.two {border-top-style: solid; border-bottom-style: solid; border-left-style: solid; border-width:1;}
td.three {border-top-style: solid; border-bottom-style: solid; border-left-style: solid; border-right-style: solid; border-width:1;}
td.four {border-top-style: solid; border-bottom-style: solid; border-width:1;}
</style>
<table style="font-size: 11px; padding:6;" >
  <tbody>
  <tr style="text-align: center;">
    <td colspan="6" style="width:630px;"><b>CHECKLIST – IMSBC</b></td>
  </tr>
  <tr style="text-align: center;">
    <td colspan="6" style="width:630px;">(untuk batu bara dan briket batu bara coklat )<br><i>(For Coal and Brown Coal Briquettes)</i></td>
  </tr>
  
  </tbody>
</table>';
// output the HTML content
$pdf->writeHTMLCell($w='', $h='', $x=15, $y=30, $page8_a, $border=0, $ln=1, $fill=0, $reseth=true, $align='', $autopadding=true);

$page8_1 = '
<style>
td.one {border-top-style: solid; border-bottom-style: solid; border-right-style: solid; border-width:1;}
td.two {border-top-style: solid; border-bottom-style: solid; border-left-style: solid; border-width:1;}
td.three {border-top-style: solid; border-bottom-style: solid; border-left-style: solid; border-right-style: solid; border-width:1;}
td.four {border-top-style: solid; border-bottom-style: solid; border-width:1;}
</style>
<table style="font-size: 11px; padding:6;" >
  <tbody>
  <tr style="text-align: center;">
    <td colspan="6" class="three" style="width:630px;"><b>UNTUK BATU BARA DAN BRIKET BATU BARA COKLAT</b><br> <i>FOR COAL AND BROWN COAL BRIQUETTES</i></td>
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
    <td style="width:225px; text-align: left;" class="three">Batasan - batasan dari ruang muat harus tahan terhadap api dan cairan. <br><i>Boundaries of Cargo Spaces are to be resistant to fire and liquids.
    </i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->k1_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->k1_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->k1_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'k1_d'}.'</td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:35px; text-align: center;" class="three">2.</td>
    <td style="width:225px; text-align: left;" class="three">Perlengkapan listrik yang dipasangkan dalam ruang muat merupakan jenis yang aman dan memiliki tingkat perlindungan terhadap ledakan dari IIAT4 atau lebih. Tidak terdapat jenis perlengkapan listrik yang dilindungi terhadap ledakan yang terjadi, tetapi mampu untuk dapat digunakan sebagaimana dipisahkan secara positif dari luar ruangan dan memiliki batasan pada tingkat pelindung dari IP55 atau lebih, dan berbagai batasan yang meyakinkan isolasi dari perlengkapan listrik yang disediakan. <br><i>Electrical means for measuring following gases , etc . in cargo spaces without entry into such spaces are to be provided. Electrical measuring device os to be of safe type having an explosion protection grade of II AT4 or upwards. Not suitable explosion protected type electrical equipment are to be capable of being positively isolated from outside of the spaces and have the enclosure having a protection degree of IP55 or
    upwards , and caution plates to ensure isolation of equipment are to be provided.  
    </i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->k2_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->k2_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->k2_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'k2_d'}.'</td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:35px; text-align: center;" class="three">3.</td>
    <td style="width:225px; text-align: left;" class="three">Fasilitas yang sesuai untuk pengukuran gas berikutnya, dan lain-lain dalam ruang muat tanpa data hingga berbagai ruangan  tersebut disediakan. Alat pengukuran listrik harus mampu menjadi alat yang aman dan memiliki tingkat perlindungan ledakan dari IIAT4 atau
    <br>Metan
    <br>Oksigen
    <br>Karbon monoksida
    <br>Nilai pH
    <br>Suhu (0-100 oC)
    <br><i>Suitable means for measuring following gases , etc. in cargo spaces without entry into such spaces are to be provided. Electrical measuring device is to be of safe type having an explosion protection grade of IIAT4 or
    <br>Methane
    <br>Oxigen
    <br>Carbon Monoxide  
    <br>Nilai Ph
    <br>pH Value 
    <br>Temperature (0-100°C) 
    </i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->k3_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->k3_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->k3_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'k3_d'}.'</td>
  </tr>

  </tbody>
</table>';
// output the HTML content
$pdf->writeHTMLCell($w='', $h='', $x=15, $y=60, $page8_1, $border=0, $ln=1, $fill=0, $reseth=true, $align='', $autopadding=true);

$pdf->AddPage();
$page9_1 = '
<style>
td.one {border-top-style: solid; border-bottom-style: solid; border-right-style: solid; border-width:1;}
td.two {border-top-style: solid; border-bottom-style: solid; border-left-style: solid; border-width:1;}
td.three {border-top-style: solid; border-bottom-style: solid; border-left-style: solid; border-right-style: solid; border-width:1;}
td.four {border-top-style: solid; border-bottom-style: solid; border-width:1;}
</style>
<table style="font-size: 11px; padding:6;" >
  <tbody>
<tr style="text-align: center;">
<td style="width:35px; text-align: center;" class="three">4(*)</td>
<td style="width:225px; text-align: left;" class="three">
Dua(2) set dari alat bantuan pernafasan yang disediakan. (Catatan: alat tersebut dibutuhkan dengan SOLAS Reg. II-2/17 (00E) atau Reg. II- 2/10 (00N) dapat digunakan untuk tujuan ini
<br>
<i>
Two sets of self – contained breathing apparatus are to be provided.(note:The apparatus required by SOLAS Reg.II-2/17(00E) or Reg.II-2/10 (00N)
may be used for this purpose)  
</i>
</td>
<td style="width:50px; text-align: center;" class="three">'.($data->k4_a == '1' ? $check : '').'</td>
<td style="width:50x; text-align: center;" class="three">'.($data->k4_b == '1' ? $check : '').'</td>
<td style="width:90px; text-align: center;" class="three">'.($data->k4_c == '1' ? $check : '').'</td>
<td style="width:180px; text-align: center;" class="three">'.$data->{'k4_d'}.'</td>
</tr>

<tr style="text-align: center;">
<td style="width:35px; text-align: center;" class="three">5.</td>
<td style="width:225px; text-align: left;" class="three">
Tanda “DILARANG MEROKOK” ditempatkan pada tempat-tempat yang mudah terlihat
<br>
<i>
“NO SMOKING” signs are to be posted in conspicuous places  
</i>
</td>
<td style="width:50px; text-align: center;" class="three">'.($data->k5_a == '1' ? $check : '').'</td>
<td style="width:50x; text-align: center;" class="three">'.($data->k5_b == '1' ? $check : '').'</td>
<td style="width:90px; text-align: center;" class="three">'.($data->k5_c == '1' ? $check : '').'</td>
<td style="width:180px; text-align: center;" class="three">'.$data->{'k5_d'}.'</td>
</tr>

<tr style="text-align: center;">
<td style="width:35px; text-align: center;" class="three">6(*)</td>
<td style="width:225px; text-align: left;" class="three">
System ventilasi alami disediakan untuk berbagai ruang muat dan selang udara harus disediakan pada bagian yang lebih tinggi dari tempat yang ada pada ketinggian dan dipasangkan pada batasan dek dengan ruangan yang tepat Catatan: Seluruh lubang udara tidak harus ditempatkan pada beberapa bagian yang menjadi subjek untuk menekankan konsentrasi . 
<br>
<i>
Natural ventilation system is to be provided for cargo spaces and air holes should be provided at the upper part of web plates of longitudinal and transverse girders fitted to deck plates with appropriate spacing.
Note: Air holes should not be located at any part
that may be subject to stress concentration  
</i>
</td>
<td style="width:50px; text-align: center;" class="three">'.($data->k6_a == '1' ? $check : '').'</td>
<td style="width:50x; text-align: center;" class="three">'.($data->k6_b == '1' ? $check : '').'</td>
<td style="width:90px; text-align: center;" class="three">'.($data->k6_c == '1' ? $check : '').'</td>
<td style="width:180px; text-align: center;" class="three">'.$data->{'k6_d'}.'</td>
</tr>

<tr style="text-align: center;">
<td style="width:35px; text-align: center;" class="three">7.</td>
<td style="width:225px; text-align: left;" class="three">
Ventilasi alami dan ventilasi elektrik harus tersedia pada ruangan terbatas yang  berdekatan, seperti ruang penyimpanan, ruangan pertukangan, jalur, cerobong. Dalam kasus ventilasi elektrik, hanya perlengkapan dengan jenis yang aman untuk digunakan dalam udara yang mudah meledak dapat digunakan dalam ruang muat. 
<br>
<i>
Natural and mechanical ventilation system are to be provided for adjacent enclosed working spaces , such as store room , carpenter’s shop , passage way , tunnels. In the case of mechanical ventilation , only the equipment which is safe for use in an explosive atmosphere can be used in cargo area.  
</i>
</td>
<td style="width:50px; text-align: center;" class="three">'.($data->k7_a == '1' ? $check : '').'</td>
<td style="width:50x; text-align: center;" class="three">'.($data->k7_b == '1' ? $check : '').'</td>
<td style="width:90px; text-align: center;" class="three">'.($data->k7_c == '1' ? $check : '').'</td>
<td style="width:180px; text-align: center;" class="three">'.$data->{'k7_d'}.'</td>
</tr>

  <tr style="text-align: center;">
    <td style="width:35px; text-align: center;" class="three">8.</td>
    <td style="width:225px; text-align: left;" class="three">Dua (2) contoh lubang yang digunakan, satu (1) untuk sisi di pelabuhan, satu (1) untuk sisi di kapal yang menutup bagian atas atau bagian lebih atas dari tutup palka yang disediakan potongan yang diikat dan penutup yang
    terkunci<br><i>Two sampling hold per hold , one on the port side and one on the starboard side of the hatch cover or upper parts of hatch cover are to be provided with threaded stub and sealing cap.
    </i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->k8_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->k8_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->k8_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'k8_d'}.'</td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:35px; text-align: center;"></td>
    <td style="width:35px; text-align: center;"></td>
  </tr>

  <tr style="text-align: center; font-weight: bold;">
    <td style="width:80px; text-align: center;"></td>
    <td style="width:200px; text-align: left;">Catatan: <br> Note</td>
  </tr>
  <tr style="text-align: center; font-weight: bold;">
    <td style="width:80px; text-align: center;"></td>
    <td style="width:50px; text-align: right;">1.</td>
    <td style="width:450px; text-align: left;">Bagian yang ditandai dengan (*) tidak dapat diaplikasikan dengan briket batu bara muda (batu bara coklat).
    <br><i>The item mark with (*) are not applicable to brown coal ( lignite)briquettes</i></td>
  </tr>
  <tr style="text-align: center; font-weight: bold;">
    <td style="width:80px; text-align: center;"></td>
    <td style="width:50px; text-align: right;">2.</td>
    <td style="width:450px; text-align: left;">Hasil-hasil survey konfirmasi dikapal telah ditunjukan pada kolom bagian kanan. Untuk berbagai persyaratan yang dipatuhi, kolom harus diperiksa. Untuk berbagai persyaratan yang tidak diaplikasikan, “N/A” harus dimasukan pada kolom.
    <br><i>The results of confirmation survey on board have been shown in the right columns.For the requirements complied with , the columns should be checked.For the requirements not applied,”N/A” should be entered in the columns.</i></td>
  </tr>
  <tr style="text-align: center; font-weight: bold;">
    <td style="width:80px; text-align: center;"></td>
  </tr>
  <tr>
    <table style="padding:0">
      <tr style="text-align: center; font-weight: bold;">
        <td style="width:80px; text-align: center;"></td>
        <td style="width:50px; text-align: right;"></td>
        <td style="width:190px; text-align: left;">Tempat dan Tanggal Pemeriksaan :</td>
        <td style="width:300px; text-align: left;">'.$data->z1.','.date_indo($data->a4).'</td>
      </tr>
      <tr style="text-align: center; font-weight: bold;">
        <td style="width:80px; text-align: center;"></td>
        <td style="width:50px; text-align: right;"></td>
        <td style="width:150px; text-align: left;">Place and Date to Survey</td>
      </tr>
      <tr style="text-align: center; font-weight: bold;">
        <td style="width:80px; text-align: center;"></td>
      </tr>

      <tr style="text-align: center; font-weight: bold;">
        <td style="width:80px; text-align: center;"></td>
        <td style="width:50px; text-align: right;"></td>
        <td style="width:150px; text-align: left;">Mengetahui :</td>
      </tr>

      <tr style="text-align: center; font-weight: bold;">
        <td style="width:80px; text-align: center;"></td>
        <td style="width:50px; text-align: right;"></td>
        <td style="width:150px; text-align: left;">Representative of .</td>
        <td style="width:150px; text-align: left;"></td>
        <td style="width:150px; text-align: left;">Pemeriksa,</td>
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

      <tr style="text-align: center; font-weight: bold;">
        <td style="width:80px; text-align: center;"></td>
        <td style="width:50px; text-align: right;"></td>
        <td style="width:100px; text-align: center;"><u>'.$data->z2.'</u></td>
        <td style="width:150px; text-align: center;"></td>
        <td style="width:150px; text-align: center;"><u>'.$data->z4.'</u></td>
      </tr>

      <tr style="text-align: center; font-weight: bold;">
        <td style="width:80px; text-align: center;"></td>
        <td style="width:50px; text-align: right;"></td>
        <td style="width:100px; text-align: center;">'.$data->z3.'</td>
        <td style="width:150px; text-align: center;"></td>
        <td style="width:150px; text-align: center;">MARINE INSPECTOR<br>ID NO. '.$data->z5.'</td>
      </tr>
    </table>
  </tr>



  </tbody>
</table>';

// output the HTML content
$pdf->writeHTMLCell($w='', $h='', $x=15, $y=30, $page9_1, $border=0, $ln=1, $fill=0, $reseth=true, $align='', $autopadding=true);




$pdf->lastPage();

// ---------------------------------------------------------
ob_clean();

$pdf->Output($title.'.pdf', 'I');
//============================================================+
// END OF FILE
//============================================================+

?>