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
        <td><b>LAPORAN PEMERIKSAAN </b></td>
      </tr>
      <tr style="text-align: center;">
        <td><b>PERLIMBUNGAN TONGKANG</b></td>
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
      <td><b>PELABUHAN PEMERIKSAAN</b></td>
      <td class="one"><b>: '.$data->a4.'</b></td>
    </tr>
    <tr style="text-align: left;">
      <td><b>DAERAH PELAYARAN</b></td>
      <td class="one"><b>: '.$data->a5.'</b></td>
    </tr>
    <tr style="text-align: left;">
      <td><b>PADA TANGGAL</b></td>
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
      <td>JL. RAHADI USMAN NO 2 PONTIANAK TELP.(0561) 732043 - 732307</td>
    </tr>
    <tr style="font-size: 8px; text-align:center; border-bottom-style: dotted">
      <td></td>
    </tr>
    <tr >
      <td style="padding: 100;"><hr></td>
    </tr>
  </tbody>
</table>';

    
// output the HTML content
$pdf->writeHTMLCell($w='', $h='', $x=15, $y=25, $page2_1, $border=0, $ln=1, $fill=0, $reseth=true, $align='', $autopadding=true);


$page2_2 = '
<style>
h2{
    text-align: center;
    text-font: 16px;
    text-decoration-border-bottom-style: solid;
    text-decoration: underline;
    text-padding: 10px;
    font-weight: bold;
}
</style>
<h2>LAPORAN PENGERINGAN</h2>';

$pdf->writeHTMLCell($w='', $h='', $x='', $y=55, $page2_2, $border=0, $ln=1, $fill=0, $reseth=true, $align='center', $autopadding=true);

$page2_2 = '
<style>
td.one {border-bottom-style: dotted;}
two {border-style: dotted solid dashed;}
three {border-style: dotted solid;}
four {border-style: dotted;}
</style>
<table border="0" style="font-size: 10px; padding:4;" >
<tbody>
  <tr style="text-align: left;">
    <td style="width:80px;">Nama Tongkang</td>
    <td style="width:20px;">:</td>
    <td style="width:120px;" class="one"> '.$data->b1.'</td>
    <td style="width:90px;">Tahun Pembuatan</td>
    <td style="width:20px;">:</td>
    <td style="width:50px;" class="one"> '.$data->b2.'</td>
    <td style="width:50px;">Isi Kotor</td>
    <td style="width:20px;">:</td>
    <td style="width:50px;" class="one">'.$data->b3.'</td>
  </tr>
  <tr style="text-align: left;">
    <td style="width:50px;">Pemilik</td>
    <td style="width:20px;">:</td>
    <td style="width:430px;" class="one">'.$data->b4.'</td>
  </tr>
  <tr style="text-align: left;">
    <td style="width:80px;">No. Pendaftaran</td>
    <td style="width:20px;">:</td>
    <td style="width:400px;" class="one">'.$data->b5.'</td>
  </tr>
  <tr style="text-align: left;">
    <td style="width:80px;">Diklaskan Pada</td>
    <td style="width:20px;">:</td>
    <td style="width:100px;" class="one"> '.$data->b6.'</td>
    <td style="width:80px;">Klas Lambung</td>
    <td style="width:20px;">:</td>
    <td style="width:80px;" class="one"> '.$data->b7.'</td>
    <td style="width:50px;">Berlaku</td>
    <td style="width:20px;">:</td>
    <td style="width:50px;" class="one">'.$data->b8.'</td>
  </tr>
  <tr style="text-align: left;">
    <td style="width:130px;">Pengeringan sekarang diatas</td>
    <td style="width:20px;">:</td>
    <td style="width:190px;" class="one">'.$data->b9.'</td>
    <td style="width:25px;"> Di</td>
    <td style="width:20px;">:</td>
    <td style="width:115px;" class="one">'.$data->b10.'</td>
  </tr>
  <tr style="text-align: left;">
    <td style="width:130px;">Lamanya dock sejak tanggal</td>
    <td style="width:20px;">:</td>
    <td style="width:130px;" class="one">'.$data->b11.'</td>
    <td style="width:60px;">s/d tanggal</td>
    <td style="width:160px;" class="one">'.$data->b12.'</td>
  </tr>
  <tr style="text-align: left;">
    <td style="width:120px;">Pengeringan yang lalu di</td>
    <td style="width:15px;">:</td>
    <td style="width:110px;" class="one">'.$data->b13.'</td>
    <td style="width:70px;">Dari Tanggal</td>
    <td style="width:15px;">:</td>
    <td style="width:70px;" class="one">'.$data->b14.'</td>
    <td style="width:30px;">s/d</td>
    <td style="width:70px;" class="one">'.$data->b15.'</td>
  </tr>
  <tr style="text-align: left;">
    <td style="width:130px;">Pemeriksaan dilakukan oleh</td>
    <td style="width:20px;">:</td>
    <td style="width:130px;" class="one">'.$data->b16.'</td>
    <td style="width:60px;">Pangkat</td>
    <td style="width:20px;">:</td>
    <td style="width:140px;" class="one">'.$data->b17.'</td>
  </tr>

  <tr style="height: 40px;">
    <td></td>
    <td></td>
    <td></td>
  </tr>

  <tr style="text-align: left; font-size: 10px;">
    <td style="width:500px; text-align: left;"><u><b>HASIL PEMERIKSAAN</u></b></td>
  </tr>

  <tr style="text-align: left; font-size: 10px;">
    <td style="width:480px; text-align: left;">1. Keadaan kulit dan pekerjaan las/kelingan :</td>
    <td style="width:20px;"></td>
  </tr>
  <tr style="text-align: left; font-size: 10px;">
    <td style="width:500px; text-align: left;" class="one">'.$data->{'1_'}.'</td>
  </tr>

  <tr style="text-align: left; font-size: 10px;">
    <td style="width:480px; text-align: left;">2. Pekerjaan / Perbaikan yang dilakukan :</td>
    <td style="width:20px;"></td>
  </tr>
  <tr style="text-align: left; font-size: 10px;">
    <td style="width:500px; text-align: left;" class="one">'.$data->{'2_'}.'</td>
  </tr>

  <tr style="text-align: left; font-size: 10px;">
    <td style="width:480px; text-align: left;">3. Apakah setelah pemasukan dock yang lalu / terakhir terdapat lagi lekukan ?</td>
    <td style="width:20px;"></td>
  </tr>
  <tr style="text-align: left; font-size: 10px;">
    <td style="width:500px; text-align: left;" class="one">'.$data->{'3_'}.'</td>
  </tr>

  <tr style="text-align: left; font-size: 10px;">
    <td style="width:480px; text-align: left;">4. Testboringen dan perbaikan pada kulit kapal ?</td>
    <td style="width:20px;"></td>
  </tr>
  <tr style="text-align: left; font-size: 10px;">
    <td style="width:500px; text-align: left;" class="one">'.$data->{'4_'}.'</td>
  </tr>

  <tr style="text-align: left; font-size: 10px;">
    <td style="width:480px; text-align: left;">5. Keadaan Plat dasar / linggi ?</td>
    <td style="width:20px;"></td>
  </tr>
  <tr style="text-align: left; font-size: 10px;">
    <td style="width:500px; text-align: left;" class="one">'.$data->{'5_'}.'</td>
  </tr>
  
  <tr style="text-align: left; font-size: 10px;">
    <td style="width:480px; text-align: left;">6. Roester – roester masuk ?</td>
    <td style="width:20px;"></td>
  </tr>
  <tr style="text-align: left; font-size: 10px;">
    <td style="width:500px; text-align: left;" class="one">'.$data->{'6_'}.'</td>
  </tr>

  <tr style="text-align: left; font-size: 10px;">
    <td style="width:480px; text-align: left;">7. Tanda tanda garis geladak, garis Lambung Timbul, dan syarat tongkang muka/belakang ?</td>
    <td style="width:20px;"></td>
  </tr>
  <tr style="text-align: left; font-size: 10px;">
    <td style="width:500px; text-align: left;" class="one">'.$data->{'7_'}.'</td>
  </tr>

  <tr style="text-align: left; font-size: 10px;">
    <td style="width:480px; text-align: left;">8. Kulit Tongkang dibawah air ?</td>
    <td style="width:20px;"></td>
  </tr>
  <tr style="text-align: left; font-size: 10px;">
    <td style="width:500px; text-align: left;" class="one">'.$data->{'8_'}.'</td>
  </tr>

  <tr style="text-align: left; font-size: 10px;">
    <td style="width:480px; text-align: left;">9. Keadaan Kemudi ?</td>
    <td style="width:20px;"></td>
  </tr>
  <tr style="text-align: left; font-size: 10px;">
    <td style="width:500px; text-align: left;" class="one">'.$data->{'9_'}.'</td>
  </tr>

  <tr style="text-align: left; font-size: 10px;">
    <td style="width:480px; text-align: left;">10. Keadaan alat alat kemudi ?</td>
    <td style="width:20px;"></td>
  </tr>
  <tr style="text-align: left; font-size: 10px;">
    <td style="width:500px; text-align: left;" class="one">'.$data->{'10_'}.'</td>
  </tr>

  <tr style="text-align: left; font-size: 10px;">
    <td style="width:480px; text-align: left;">11. Keadaan lubang lubang pada kulit tongkang dengan geladak tongkang ?</td>
    <td style="width:20px;"></td>
  </tr>
  <tr style="text-align: left; font-size: 10px;">
    <td style="width:500px; text-align: left;" class="one">'.$data->{'11_'}.'</td>
  </tr>

  <tr style="text-align: left; font-size: 10px;">
    <td style="width:480px; text-align: left;">12. keadaan bolders ?</td>
    <td style="width:20px;"></td>
  </tr>
  <tr style="text-align: left; font-size: 10px;">
    <td style="width:500px; text-align: left;" class="one">'.$data->{'12_'}.'</td>
  </tr>

  <tr style="text-align: left; font-size: 10px;">
    <td style="width:480px; text-align: left;">13. Keadaan tiang tiang penyangga ?</td>
    <td style="width:20px;"></td>
  </tr>
  <tr style="text-align: left; font-size: 10px;">
    <td style="width:500px; text-align: left;" class="one">'.$data->{'13_'}.'</td>
  </tr>

  <tr style="text-align: left; font-size: 10px;">
    <td style="width:480px; text-align: left;">14. Kedaan pisang pisang ?</td>
    <td style="width:20px;"></td>
  </tr>
  <tr style="text-align: left; font-size: 10px;">
    <td style="width:500px; text-align: left;" class="one">'.$data->{'14_'}.'</td>
  </tr>

  <tr style="text-align: left; font-size: 10px;">
    <td style="width:480px; text-align: left;">15. Kedaan alat alat sauh / Jangkar ?</td>
    <td style="width:20px;"></td>
  </tr>
  <tr style="text-align: left; font-size: 10px;">
    <td style="width:500px; text-align: left;" class="one">'.$data->{'15_'}.'</td>
  </tr>

  
  
</tbody>
</table>';

// output the HTML content
$pdf->writeHTMLCell($w='', $h='', $x=35, $y=70, $page2_2, $border=0, $ln=1, $fill=0, $reseth=true, $align='', $autopadding=true);

$pdf->AddPage();

$page3_1 = '
<style>
td.one {border-bottom-style: dotted;}
two {border-style: dotted solid dashed;}
three {border-style: dotted solid;}
four {border-style: dotted;}
</style>
<table border="0" style="font-size: 10px; padding:2;" >
<tbody>
  <tr style="text-align: left; font-size: 10px;">
    <td style="width:480px; text-align: left;">16. Keadaan alat alat bantu lainnya dan pompa darurat ?</td>
    <td style="width:20px;"></td>
  </tr>
    <tr style="text-align: left; font-size: 10px;">
    <td style="width:500px; text-align: left;" class="one">'.$data->{'16_'}.'</td>
  </tr>

  <tr style="text-align: left; font-size: 10px;">
    <td style="width:480px; text-align: left;">17. Apakah telah dilakukan pemeriksaan oleh Biro Klasifikasi yang syah ?</td>
    <td style="width:20px;"></td>
  </tr>
    <tr style="text-align: left; font-size: 10px;">
    <td style="width:500px; text-align: left;" class="one">'.$data->{'17_'}.'</td>
  </tr>

  <tr style="text-align: left; font-size: 10px;">
    <td style="width:480px; text-align: left;">18. Catatan tambahan perihal perbaikan perbaikan yang telah di lakukan :</td>
    <td style="width:20px;"></td>
  </tr>
    <tr style="text-align: left; font-size: 10px;">
    <td style="width:500px; text-align: left;" class="one">'.$data->{'18_'}.'</td>
  </tr>

  <tr style="text-align: left; font-size: 10px;">
    <td style="width:480px; text-align: left;">19. Catatan untuk perhatian pada Pengeringan yang akan datang</td>
    <td style="width:20px;"></td>
  </tr>
    <tr style="text-align: left; font-size: 10px;">
    <td style="width:500px; text-align: left;" class="one">'.$data->{'19_'}.'</td>
  </tr>

  <tr style="text-align: left;">
    <td colspan="1" style="width:500px;"></td>
  </tr>
  <tr style="text-align: left;">
    <td colspan="1" style="width:500px;"></td>
  </tr>
  <tr style="text-align: left;">
    <td style="width:200px;">Pemeriksaan di lakukan atas permintaan dari </td>
    <td style="width:20px;">:</td>
    <td style="width:150px;" class="one">'.$data->d1.'</td>
  </tr>
  <tr style="text-align: left;">
    <td style="width:120px;">Dengan suratnya Nomor </td>
    <td style="width:20px;">:</td>
    <td style="width:330px;">'.$data->d2.'</td>
  </tr>
  <tr style="text-align: left;">
    <td style="width:50px;">Tanggal </td>
    <td style="width:20px;">:</td>
    <td style="width:380px;">'.$data->d3.'</td>
  </tr>
  <tr style="text-align: left;">
    <td style="width:130px;">Yang di sampaikan kepada  </td>
    <td style="width:20px;">:</td>
    <td style="width:250px;">'.$data->d4.'</td>
  </tr>
  <tr style="text-align: left;">
    <td style="width:230px;"></td>
    <td style="width:20px;"></td>
    <td style="width:250px;"></td>
  </tr>
  <tr style="text-align: left;">
    <td style="width:230px;"></td>
    <td style="width:20px;"></td>
    <td style="width:250px;"></td>
  </tr>
  <tr style="text-align: left;">
    <td style="width:230px;"></td>
    <td style="width:20px;"></td>
    <td style="width:250px;"></td>
  </tr>
  <tr style="text-align: left;">
    <td style="width:230px;"></td>
    <td style="width:20px;"></td>
    <td style="width:250px;"></td>
  </tr>
  <tr>
  <table style="font-size: 12px; padding:1;">
    <tr style="text-align: center; text-size:12px;">
      <td style="width:250px;"><u><b>MENGETAHUI</b></u></td>
      <td style="width:250px;">'.$data->z1.' , '.$data->z2.'</td>
    </tr>
    <tr style="text-align: center;">
      <td style="width:250px;"><b>KASIE STATUS HUKUM DAN SERTIFIKASI KAPAL</b></td>
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
    <tr style="text-align: center; padding: 10;">
      <td style="width:250px;"><u><b>'.$data->z3.'</b></u></td>
      <td style="width:250px;"><u><b>'.$data->z6.'</b></u></td>
    </tr>
    <tr style="text-align: center; padding: 10;">
      <td style="width:250px;"><b>'.$data->z4.'</b></td>
      <td style="width:250px;"><b>'.$data->z7.'</b></td>
    </tr>
    <tr style="text-align: center; padding: 10;">
      <td style="width:250px;"><b>'.$data->z5.'</b></td>
      <td style="width:250px;"><b>'.$data->z8.'</b></td>
    </tr>
    <tr style="text-align: center;">
      <td style="width:490px;"></td>
    </tr>

    </table>
  </tr>

</tbody>
</table>';

// output the HTML content
$pdf->writeHTMLCell($w='', $h='', $x=35, $y=25, $page3_1, $border=0, $ln=1, $fill=0, $reseth=true, $align='', $autopadding=true);




$pdf->lastPage();

// ---------------------------------------------------------
ob_clean();

$pdf->Output('KD PENGETAHUAN.pdf', 'I');
//============================================================+
// END OF FILE
//============================================================+

?>