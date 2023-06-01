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
$pdf->SetTitle('Lambung Bawah');
$pdf->SetSubject('Lambung Bawah Air');
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
        <td><b>LAPORAN PEMERIKSAAN LAMBUNG BAWAH AIR </b></td>
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
          <td><b>DIREKTORAT PERKAPALAN DAN KEPELAUTAN</b></td>
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
<table style="border-bottom: solid; border-bottom-width: thin;">
  <tbody>
    <tr style="font-size: 11px; text-align:center; padding:1;">
      <td></td>
      <td></td>
      <td></td>
    </tr>
    <tr style="font-size: 9px; text-align: center; padding:2;">
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
$pdf->writeHTMLCell($w=150, $h='', $x=30, $y=52, $page2_a, $border=0, $ln=1, $fill=0, $reseth=true, $align='', $autopadding=true);


$page2_b = '
<table style="text-align:center; border-right: solid; border-right-width: thin;
border-left: solid; border-left-width: thin;
border-bottom: solid; border-bottom-width: thin;
border-top: solid; border-top-width: thin;">
  <tbody style="font-size: 14px; padding: 4;">
    <tr>
      <td>LAPORAN PEMERIKSAAN LAMBUNG BAWAH AIR</td>
    </tr>
  </tbody>
</table>';

    
// output the HTML content
$pdf->writeHTMLCell($w=150, $h='', $x=30, $y=75, $page2_b, $border=0, $ln=1, $fill=0, $reseth=true, $align='', $autopadding=true);



$page2_2 = '
<style>
td.one {border-top-style: solid; border-bottom-style: solid; border-right-style: solid; border-width:1;}
td.two {border-top-style: solid; border-bottom-style: solid; border-left-style: solid; border-width:1;}
td.three {border-top-style: solid; border-bottom-style: solid; border-left-style: solid; border-right-style: solid; border-width:1;}
td.four {border-top-style: solid; border-bottom-style: solid; border-width:1;}
</style>
<table style="font-size: 11px; padding:6;" >
<tbody>
  
  <tr style="text-align: center; text-align:center;">
    <td style="width:530px;" class="three"><b>I. DETAIL DATA KAPAL</b></td>
  </tr>
  <tr style="text-align: left;">
    <td style="width:26px;" class="three">1.</td>
    <td style="width:200px;" class="three"><b>NAMA KAPAL </b><br><i> Name of ship</i></td>
    <td style="width:20px;" class="two">:</td>
    <td style="width:284x;" class="one">'.$data->{'b1'}.'</td>
  </tr>
  <tr style="text-align: left;">
    <td style="width:26px;" class="three">2.</td>
    <td style="width:200px;" class="three"><b>Pelabuhan pendaftaran</b><br><i>Port of registry </i></td>
    <td style="width:20px;" class="two">:</td>
    <td style="width:284x;" class="one">'.$data->{'b2'}.'</td>
  </tr>
  <tr style="text-align: left;">
    <td style="width:26px;" class="three">3.</td>
    <td style="width:200px;" class="three"><b>Jenis kapal </b><br><i>Type of ship </i></td>
    <td style="width:20px;" class="two">:</td>
    <td style="width:284x;" class="one">'.$data->{'b3'}.'</td>
  </tr>
  <tr style="text-align: left;">
    <td style="width:26px;" class="three">4.</td>
    <td style="width:200px;" class="three"><b>Tanda panggil</b><br><i>Call sign</i></td>
    <td style="width:20px;" class="two">:</td>
    <td style="width:284x;" class="one">'.$data->{'b4'}.'</td>
  </tr>
  <tr style="text-align: left;">
    <td style="width:26px;" class="three">5.</td>
    <td style="width:200px;" class="three"><b>Nomor IMO  </b><br><i>IMO Number </i></td>
    <td style="width:20px;" class="two">:</td>
    <td style="width:284x;" class="one">'.$data->{'b5'}.'</td>
  </tr>
  <tr style="text-align: left;">
    <td style="width:26px;" class="three">6.</td>
    <td style="width:200px;" class="three"><b>Isi kotor </b><br><i>Gross tonnage</i></td>
    <td style="width:20px;" class="two">:</td>
    <td style="width:284x;" class="one">'.$data->{'b6'}.'</td>
  </tr>
  <tr style="text-align: left;">
    <td style="width:26px;" class="three">7.</td>
    <td style="width:200px;" class="three"><b>Dwt</b><br><i>Deadweight</i></td>
    <td style="width:20px;" class="two">:</td>
    <td style="width:284x;" class="one">'.$data->{'b7'}.'</td>
  </tr>
  <tr style="text-align: left;">
    <td style="width:26px;" class="three">8.</td>
    <td style="width:200px;" class="three"><b>Tahun pembangunan</b><br><i>Year of built</i></td>
    <td style="width:20px;" class="two">:</td>
    <td style="width:284x;" class="one">'.$data->{'b8'}.'</td>
  </tr>
  <tr style="text-align: left;">
    <td style="width:26px;" class="three">9.</td>
    <td style="width:200px;" class="three"><b>Tanggal pemeriksaan</b><br><i>Date of inspection</i></td>
    <td style="width:50px;" class="four">: Dari</td>
    <td style="width:104x;" class="four">'.$data->{'b9_a'}.'</td>
    <td style="width:50px;" class="four">s/d</td>
    <td style="width:100x;" class="one">'.$data->{'b9_b'}.'</td>
  </tr>
  <tr style="text-align: left;">
    <td style="width:26px;" class="three">10.</td>
    <td style="width:200px;" class="three"><b>Tempat pemeriksaan</b><br><i>Place of inspection</i></td>
    <td style="width:20px;" class="two">:</td>
    <td style="width:284x;" class="one">'.$data->{'b10'}.'</td>
  </tr>
  <tr style="text-align: left;">
    <td style="width:26px;" class="three">11.</td>
    <td style="width:200px;" class="three"><b>Klasifikasi</b><br><i>Classification of Society</i></td>
    <td style="width:20px;" class="two">:</td>
    <td style="width:284x;" class="one">'.$data->{'b11'}.'</td>
  </tr>
  <tr style="text-align: left;">
    <td style="width:26px;" class="three">12.</td>
    <td style="width:200px;" class="three"><b>Klas lambung</b><br><i>Hull class</i></td>
    <td style="width:20px;" class="two">:</td>
    <td style="width:284x;" class="one">'.$data->{'b12'}.'</td>
  </tr>
  <tr style="text-align: left;">
    <td style="width:26px;" class="three">13.</td>
    <td style="width:200px;" class="three"><b>Permesinan</b><br><i>Machinery </i></td>
    <td style="width:20px;" class="two">:</td>
    <td style="width:284x;" class="one">'.$data->{'b13'}.'</td>
  </tr>
  <tr style="text-align: left;">
    <td style="width:26px;" class="three">14.</td>
    <td style="width:200px;" class="three"><b>Tempat pengeringan yang lalu</b><br><i>laluPlace of previous drydock</i></td>
    <td style="width:20px;" class="two">:</td>
    <td style="width:284x;" class="one">'.$data->{'b14'}.'</td>
  </tr>
  <tr style="text-align: left;">
    <td style="width:26px;" class="three">15.</td>
    <td style="width:200px;" class="three"><b>Tanggal pengeringan yang lalu </b><br><i>Dated of previous drydock</i></td>
    <td style="width:50px;" class="four">: Dari</td>
    <td style="width:104x;" class="four">'.$data->{'b15_a'}.'</td>
    <td style="width:50px;" class="four">s/d</td>
    <td style="width:100x;" class="one">'.$data->{'b15_b'}.'</td>
  </tr>
  
</tbody>
</table>';

// output the HTML content
$pdf->writeHTMLCell($w='', $h='', $x=30, $y=85, $page2_2, $border=0, $ln=1, $fill=0, $reseth=true, $align='', $autopadding=true);

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
  
  <tr style="text-align: left;">
    <td style="width:26px;" class="three">16.</td>
    <td style="width:200px;" class="three"><b>Kemudi dan pena kemudi terakhir dicabut tanggal</b><br><i>Propeller sharf previous take out</i></td>
    <td style="width:20px;" class="two">:</td>
    <td style="width:284x;" class="one">'.$data->{'b16'}.'</td>
  </tr>
  <tr style="text-align: left;">
    <td style="width:26px;" class="three">17.</td>
    <td style="width:200px;" class="three"><b>Kemudi dan pena kemudi sekarang dicabut tanggal </b><br><i>Propeller sharf take out now </i></td>
    <td style="width:20px;" class="two">:</td>
    <td style="width:284x;" class="one">'.$data->{'b17'}.'</td>
  </tr>
  <tr style="text-align: left;">
    <td style="width:26px;" class="three">18.</td>
    <td style="width:200px;" class="three"><b>Pemilik kapal</b><br><i>Owner / Operator </i></td>
    <td style="width:20px;" class="two">:</td>
    <td style="width:284x;" class="one">'.$data->{'b18'}.'</td>
  </tr>
  <tr style="text-align: left;">
    <td style="width:26px;" class="three">19.</td>
    <td style="width:504px;" class="three"><b>Nama dan tandatangan Nahkoda bahwa data – data diatas 1 s/d 18 benar adanya : </b></td>
  </tr>
  <tr style="text-align: left;">
    <td style="width:100px;" class="three"><br><br><b>Nama :</b><br><i>Name</i> <br></td>
    <td style="width:180px;" class="three"><br><br>'.$data->{'b19_a'}.'</td>
    <td style="width:100px;" class="three"><br><br><b>Tandatangan :</b><br><i>Signature</i> <br></td>
    <td style="width:150px;" class="three"></td>
  </tr>
  
</tbody>
</table>';

// output the HTML content
$pdf->writeHTMLCell($w='', $h='', $x=30, $y=30, $page3_1, $border=0, $ln=1, $fill=0, $reseth=true, $align='', $autopadding=true);

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
    <td style="width:530px;" class="three"><b>II. HASIL PEMERIKSAAN</b></td>
  </tr>
  <tr style="text-align: center;">
    <td style="width:26px;" class="three">No</td>
    <td style="width:250px;" class="three"><b>Bagian</b> <i> Items</i></td>
    <td style="width:154px;" class="three"><b>Analisa Pemeriksaan</b><br><i>Analysis Inspection</i></td>
    <td style="width:50x;" class="three">Baik</td>
    <td style="width:50x;" class="three">Tidak Baik</td>
  </tr>
  <tr style="text-align: center;">
    <td style="width:26px; text-align: center;" class="three">1.</td>
    <td style="width:250px; text-align: left;" class="three">Tumbuh-tumbuhan / teritip yang menempel pada dasar kapal<i> Fouling </i></td>
    <td style="width:154px; text-align: center;" class="three">'.$data->{'c1_a'}.'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->c1_b == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->c1_b == '2' ? $check : '').'</td>
  </tr>
  <tr style="text-align: center;">
    <td style="width:26px; text-align: center;" class="three">2.</td>
    <td style="width:250px; text-align: left;" class="three">Pelapisan cat pada dasar kapal <i> Coating paints  </i></td>
    <td style="width:154px; text-align: center;" class="three">'.$data->{'c2_a'}.'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->c2_b == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->c2_b == '2' ? $check : '').'</td>
  </tr>
  <tr style="text-align: center;">
    <td style="width:26px; text-align: center;" class="three">3.</td>
    <td style="width:250px; text-align: left;" class="three">Batang logam seng yang ditempelkan pada pelat kulit kapal pada tempat dekat baling – baling, katup laut dan lengkapan dibawah air lainnya yang terbuat dari bahan kuningan atau perunggu terhadap korosi karena aksi <i>galbaniZinc Anodes</i></td>
    <td style="width:154px; text-align: center;" class="three">'.$data->{'c3_a'}.'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->c3_b == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->c3_b == '2' ? $check : '').'</td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:26px; text-align: center;" class="three">4.</td>
    <td style="width:250px; text-align: left;" class="three">Pengkaratan hasil proses korosi yang terdiri dari oksida besi yang berwarna coklat kemerah – merahan dan terbentuk pada permukaan besi atau baja<i>Corrosine</i></td>
    <td style="width:154px; text-align: center;" class="three">'.$data->{'c4_a'}.'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->c4_b == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->c4_b == '2' ? $check : '').'</td>
  </tr>
  
  <tr style="text-align: center;">
    <td style="width:26px; text-align: center;" class="three">5.</td>
    <td style="width:250px; text-align: left;" class="three">Perbuhan bentuk kea rah tiga dimensi dari suatu benda akibat adanya tegangan karena beban atau adanya lekukanDeformation and Indents </td>
    <td style="width:154px; text-align: center;" class="three">'.$data->{'c5_a'}.'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->c5_b == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->c5_b == '2' ? $check : '').'</td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:26px; text-align: center;" class="three">6.</td>
    <td style="width:250px; text-align: left;" class="three">Keadaan pada dasar kulit kapal dan las – lasan yang menutupi seluruh sisi luar badan kapal 
    Shell bottom plat & welded 
    </td>
    <td style="width:154px; text-align: center;" class="three">'.$data->{'c6_a'}.'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->c6_b == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->c6_b == '2' ? $check : '').'</td>
  </tr>

</tbody>
</table>';

// output the HTML content
$pdf->writeHTMLCell($w='', $h='', $x=30, $y=110, $page2_2, $border=0, $ln=1, $fill=0, $reseth=true, $align='', $autopadding=true);

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
    <td style="width:26px; text-align: center;" class="three">7.</td>
    <td style="width:250px; text-align: left;" class="three">Keadaan lunas pada alas kapal yang membentang sepanjang garis tengah kapal 
    dari depan kebelakangKeel condition
    </td>
    <td style="width:154px; text-align: center;" class="three">'.$data->{'c7_a'}.'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->c7_b == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->c7_b == '2' ? $check : '').'</td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:26px; text-align: center;" class="three">8.</td>
    <td style="width:250px; text-align: left;" class="three">Lunas samping yang dipasang pada lengkungan bilga dikedua kapal untuk mengurangi
  Bilge keel 
    </td>
    <td style="width:154px; text-align: center;" class="three">'.$data->{'c8_a'}.'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->c8_b == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->c8_b == '2' ? $check : '').'</td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:26px; text-align: center;" class="three">9.</td>
    <td style="width:250px; text-align: left;" class="three">Keadaan linggi buritan yang membentuk ujung buritan kapal dan yang menyangga kemudi serta poros baling – balingCondition stren post
    </td>
    <td style="width:154px; text-align: center;" class="three">'.$data->{'c9_a'}.'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->c9_b == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->c9_b == '2' ? $check : '').'</td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:26px; text-align: center;" class="three">10.</td>
    <td style="width:250px; text-align: left;" class="three">Kotak karangan isap air laut / almari lambung, perangkat yang berhubungan dengan air laut yang menempel pada sisi dalam pelat kulit kapal yang berada dibawah permukaan air dan dilengkapi pelat saringan 
    Sea chest
    </td>
    <td style="width:154px; text-align: center;" class="three">'.$data->{'c10_a'}.'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->c10_b == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->c10_b == '2' ? $check : '').'</td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:26px; text-align: center;" class="three">11.</td>
    <td style="width:250px; text-align: left;" class="three">Katup laut yang dipasang pada kulit kapal dibawah pada garis air yang dipergunakan untuk mengalirkan air laut dari luar kedalam kapal untuk tolak bara, pemadam kebakaran, dll. 
    Sea and outlet valves 
    </td>
    <td style="width:154px; text-align: center;" class="three">'.$data->{'c11_a'}.'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->c11_b == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->c11_b == '2' ? $check : '').'</td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:26px; text-align: center;" class="three">12.</td>
    <td style="width:250px; text-align: left;" class="three">Kondisi baling – baling Propeller 
    </td>
    <td style="width:154px; text-align: center;" class="three">'.$data->{'c12_a'}.'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->c12_b == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->c12_b == '2' ? $check : '').'</td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:26px; text-align: center;" class="three">13.</td>
    <td style="width:250px; text-align: left;" class="three">Daun kemudi merupakan bagian permukaan datar dari kemudi Rudder blade  
    </td>
    <td style="width:154px; text-align: center;" class="three">'.$data->{'c13_a'}.'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->c13_b == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->c13_b == '2' ? $check : '').'</td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:26px; text-align: center;" class="three">14.</td>
    <td style="width:250px; text-align: left;" class="three">Baling – baling haluan yang ada pada samping kapal yang dipergunakan untuk kapal sandar Bow thrusters   
    </td>
    <td style="width:154px; text-align: center;" class="three">'.$data->{'c14_a'}.'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->c14_b == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->c14_b == '2' ? $check : '').'</td>
  </tr>

  <tr style="text-align: left;">
    <td style="width:530px;">15. Catatan tambahan mengenai adanya perbaikan - perbaikan yang telah dilakukan :</td>
  </tr>
  <tr style="text-align: left;">
    <td style="width:530px;">'.$data->c15.'</td>
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
      <td style="width:250px;">'.$data->c16.' , '.$data->c17.'</td>
    </tr>
    <tr style="text-align: center;">
      <td style="width:250px;"></td>
      <td style="width:250px;">MARINE INSPECTOR</td>
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
      <td style="width:250px;"></td>
      <td style="width:250px;"><u><b>'.$data->c18.'</b></u></td>
    </tr>
    <tr style="text-align: center; padding: 10;">
      <td style="width:250px;"></td>
      <td style="width:250px;">NIP. '.$data->c19.'</td>
    </tr>
    <tr style="text-align: center; padding: 10;">
      <td style="width:250px;"><b>'.$data->z11.'</b></td>
      <td style="width:250px;"><b>'.$data->z8.'</b></td>
    </tr>
    

    </table>
  </tr>

</tbody>
</table>';

// output the HTML content
$pdf->writeHTMLCell($w='', $h='', $x=30, $y=30, $page3_1, $border=0, $ln=1, $fill=0, $reseth=true, $align='', $autopadding=true);


$pdf->lastPage();

// ---------------------------------------------------------
ob_clean();

$pdf->Output('KD PENGETAHUAN.pdf', 'I');
//============================================================+
// END OF FILE
//============================================================+

?>