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
        <td><b>LAPORAN PEMERIKSAAN KELAYAKAN KAPAL UNTUK MENGANGKUT</b></td>
      </tr>
      <tr style="text-align: center;">
        <td><b>MUATAN CURAH GAS</b></td>
      </tr>
      <tr style="text-align: center;">
        <td><b><i>REPORT FOR THE CONSTRUCTION AND EQUIPMENT OF THE SHIPS CARRYING</i></b></td>
      </tr>
	  <tr style="text-align: center;">
        <td><b><i>LIQUIEFIED GASES IN BULK Resolution MSC 5(48)</i></b></td>
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
      <td style="width: 250;"><b>NAMA KAPAL  </b></td>
      <td class="one" style="width: 300;"><b>: '.$data->{'1_'}.'</b></td>
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
		  <td><b>LAPORAN PEMERIKSAAN KELAYAKAN UNTUK MENGANGKUT <br> MUATAN CURAH GAS</b></td>
		</tr>
	  </tbody>
	</table>';

		
	// output the HTML content
	$pdf->writeHTMLCell($w=150, $h='', $x=25, $y=75, $page2_b, $border=0, $ln=1, $fill=0, $reseth=true, $align='', $autopadding=true);
	
	  $page2_b = '
	<table style="text-align:left; border-right: solid; border-right-width: thin;
	border-left: solid; border-left-width: thin;
	border-bottom: solid; border-bottom-width: thin;
	border-top: solid; border-top-width: thin; width:560px;">
	  <tbody style="font-size: 11px; padding: 4;">
		<tr>
		  <td><b> A. UMUM / DATA KAPAL </b></td>
		</tr>
	  </tbody>
	</table>';

		
	// output the HTML content
	$pdf->writeHTMLCell($w=150, $h='', $x=25, $y=95, $page2_b, $border=0, $ln=1, $fill=0, $reseth=true, $align='', $autopadding=true);
  
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
		<td style="width:250px;" class="one">: '.date_indo($data->{'13_'}).'</td>
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
  $pdf->writeHTMLCell($w='', $h='', $x=25, $y=110, $page2_2, $border=0, $ln=1, $fill=0, $reseth=true, $align='', $autopadding=true);

  
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
    <td style="width:35px;" class="three"><b>A</b><br></td>
    <td style="width:595;" class="three"><b>SERTIFIKAT PETUNJUK OPERASI DAN DOKUMEN LAINNYA</b><br> <i>CERTIFICATES OPERATION MANUAL AND OTHER DOCUMENTS 
(Chapter 1,2,8,15 & 18 ) 
</i></td>
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
    <td style="width:225px; text-align: left;" class="three">Sertifikat Kelayakan untuk mengangkut Gas Cair secara curah 
    <br><i>Certificates of Fitness for the Carriage of 
    Liquefied Gases in Bulk </i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->a1_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->a1_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->a1_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'a1_d'}.'</td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:35px; text-align: center;" class="three">2.</td>
    <td style="width:225px; text-align: left;" class="three">Petunjuk Pemeliharaan muatan  
    <br><i>Operation Manual For Cargo Handling (Cargo Record Book </i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->a2_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->a2_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->a2_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'a2_d'}.'</td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:35px; text-align: center;" class="three">3.</td>
    <td style="width:225px; text-align: left;" class="three">Buku Catatan Stabilitas dan Pemuatan   
    <br><i>Loading And Stability Booklet  </i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->a3_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->a3_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->a3_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'a3_d'}.'</td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:35px; text-align: center;" class="three">4.</td>
    <td style="width:225px; text-align: left;" class="three">Buku Catatan Informasi Stabilitas Rusak   
    <br><i>Damage Stability Information Booklet  </i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->a4_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->a4_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->a4_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'a4_d'}.'</td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:35px; text-align: center;" class="three">5.</td>
    <td style="width:225px; text-align: left;" class="three">Informasi batas maximum pengisian tangki yang diperkenankan    
    <br><i>Information of the maximum allowable tank filling limits  </i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->a5_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->a5_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->a5_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'a5_d'}.'</td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:35px; text-align: center;" class="three">6.</td>
    <td style="width:225px; text-align: left;" class="three">Buku Harian kapal     
    <br><i>Ship’s log book   </i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->a6_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->a6_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->a6_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'a6_d'}.'</td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:35px; text-align: center;" class="three">7.</td>
    <td style="width:225px; text-align: left;" class="three">Salinan kode yang dikeluarkan IMO mengenai Gas, GC atau IGC      
    <br><i>A copy of applicable IMO Existing 
    Gas,GC or IGC Code </i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->a7_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->a7_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->a7_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'a7_d'}.'</td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:35px; text-align: center;" class="three">8.</td>
    <td style="width:225px; text-align: left;" class="three">Sertifikat / catatan keadaan tekanan katup penolong dari tangki-tangki muatan       
    <br><i>Certificate / record of setting pressure of relief valves of cargo  </i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->a8_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->a8_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->a8_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'a8_d'}.'</td>
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
    <td style="width:35px;" class="three"><b>C</b><br></td>
    <td style="width:595;" class="three"><b>SISTIM PENAHAN MUATAN</b><br> <i>CARGO CONTAINMENT SYSTEMS </i></td>
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
    <td style="width:225px; text-align: left;" class="three">Tangki-tangki 	muatan 	dan 
    penyekatannya 
    (Penyekatan 	dapat 	dirubah 	sesuai keperluan )     
    <br><i>Cargo Tanks and their insulations (Insulation to be removed as found necessary  </i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->b1_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->b1_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->b1_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'b1_d'}.'</td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:35px; text-align: center;" class="three">2.</td>
    <td style="width:225px; text-align: left;" class="three">Penghalang kedua dan penyekat dan tes penekanan / vakum dan seterusnya, bila benar-benar diperlukan oleh sueveyor 
    (Penyekatan 	dapat 	dirubah 	sesuai keperluan)       
    <br><i>Secondary barriers and their insulation and pressure / vacuum test etc. where found necessary by surveyor 
    (Insulation to be removed as found necessary ) </i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->b2_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->b2_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->b2_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'b2_d'}.'</td>
  </tr>
  </tbody>
</table>';

// output the HTML content
$pdf->writeHTMLCell($w='', $h='', $x=15, $y=190, $page2_3, $border=0, $ln=1, $fill=0, $reseth=true, $align='', $autopadding=true);

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
    <td style="width:35px; text-align: center;" class="three">3.</td>
    <td style="width:225px; text-align: left;" class="three">Ruang-ruang palka , mempunyai jalan masuk ke tangki-tangki, pondasi penahanan muatan( bantalan bantalan, kunci-kunci,alat tahan ombak / tahan anggukan dan penyekatan) dan struktur lambung yang berdekatan untuk menahan muatan. 
    (Penyekatan dapat dirubah sesuai keperluan )        
    <br><i>Hold space, means of access to tanks, foundation of cargo containments 
    (supports, keys, anti-rolling / anti-pitching devices and insulations) and hull structures adjacent to cargo 
    containments 
    (Insulation to be removed as found necessary ) </i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->b3_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->b3_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->b3_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'b3_d'}.'</td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:35px; text-align: center;" class="three">4.</td>
    <td style="width:225px; text-align: left;" class="three">Mengukur ketebalan plat-plat tangki muatan, 	dimana 	benar-benar dipertimbangkan oleh surveyor    
    <br><i>Thickness measurement of cargo tank plates, where considered necessary by surveyor  </i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->b4_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->b4_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->b4_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'b4_d'}.'</td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:35px; text-align: center;" class="three" rowspan="2">5.</td>
    <td style="width:225px; text-align: left;" class="three">Tes / percobaan yang tidak merusak tangki - tangki muatan kecuali tangkitangki bebas Tipe B, dimana benarbenar dipertimbangkan oleh surveyor    
    <br><i>) Non-destructive test of cargo tanks, except independent tanks of type B, where considered necessary by surveyor  </i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->b5_1_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->b5_1_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->b5_1_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'b5_1_d'}.'</td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:225px; text-align: left;" class="three">Tes yang tidak merusak dari tangki bebas tipe B sesuai dengan  
    <br><i>) Non-destructive test of cargo tanks,except independent tanks of type B, according to a program specially prepared for the cargo tank design   </i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->b5_2_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->b5_2_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->b5_2_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'b5_2_d'}.'</td>
  </tr>


  <tr style="text-align: center;">
    <td style="width:35px; text-align: center;" class="three">6.</td>
    <td style="width:225px; text-align: left;" class="three">Test kebocoran tangki muatan 
    Test kebocoran lapisan tangki,setengah lapisan tangki dan tangki bebas dibawah deck boleh dihilangkan jika tidak bocor yang dibuktikan oleh buku harian muatan atau peralatan lain yang tepat          
    <br><i>Leak test of cargo tanks 
    The leak test of membrane tank,semimembrane tank and independent tank below deck may be emitted if no leakage is verified by cargo log book or other proper means </i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->b6_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->b6_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->b6_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'b6_d'}.'</td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:35px; text-align: center;" class="three">7.</td>
    <td style="width:225px; text-align: left;" class="three">Tes tekanan ( tes Hidrostatik atau hidropneumatik) dari tangki muatan dimana benar-benar dipertimbangkan oleh surveyor sebagai suatu hasil survey yang ditetapkan pada 2.1, 2.3, 2.4, 2.5 dan 2.6 diatas       
    <br><i>Pressure test (hydrostatic or hydropneumatic test) of cargo tanks, where considered necessary by surveyor as a result of surveys specified in above 
    2.1, 2.3, 2.4, 2.5 and 2.6 </i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->b7_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->b7_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->b7_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'b7_d'}.'</td>
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
    <td style="width:35px; text-align: center;" class="three" rowspan="2">8.</td>
    <td style="width:225px; text-align: left;" class="three">Mengikuti survey tambahan untuk semua tangki-tangki bebas Type C sebagai alternative sebelah kiri (PS), seperti ke 2, ke 4 dan ke 6        
    <br><i>Following 	additional 	survey 	for 	all independent 	tanks 	of 	Type 	C 	at alternative PS, such as 2nd ,4th , 6th  </i>
    <br>
      (a) Tes tekanan ( tes hidrostatik atau hidropneumatik) dan tes yang tidak merusak 
    <br>
      <i>(a) Pressure test (Hydrostatic or Hydropneumatic test) and non-destructive test </i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->b8_1_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->b8_1_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->b8_1_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'b8_1_d'}.'</td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:225px; text-align: left;" class="three">atau 
    <br><i>or</i>
    <br>
    (b) Tes tekanan ( tes hidrostatik atau hidropneumatik) dan tes yang tidak merusak 
    <br>
      <i>(b) Pressure test (Hydrostatic or Hydropnematic test) and non-
      destructive test</i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->b8_2_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->b8_2_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->b8_2_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'b8_2_d'}.'</td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:35px; text-align: center;" class="three">9.</td>
    <td style="width:225px; text-align: left;" class="three">Alat penyegel dan penutup kubah penahan muatan yang menembus tidak terlindung deck        
    <br><i>Closing and sealing devices of the domes of cargo containments where they penetrate exposed deck </i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->b9_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->b9_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->b9_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'b9_d'}.'</td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:35px; text-align: center;" class="three">10.</td>
    <td style="width:225px; text-align: left;" class="three">Ikatan listrik diantara tangki muatan bebas dan structure lambung 
    (Penyekatan 	dapat 	dirubah 	sesuai keperluan)            
    <br><i>Electrical bonding between independent cargo tanks and hull structure 
    (Insulations to be removed as found necessary </i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->b10_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->b10_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->b10_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'b10_d'}.'</td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:35px; text-align: center;" class="three">11.</td>
    <td style="width:225px; text-align: left;" class="three">Pompa muatan dibawah permukaan air / sumur dalam dan alat menghentikan secara manual / otomatis             
    <br><i>Submerged / deepwell cargo pumps and their automatic / manual stopping device  </i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->b11_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->b11_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->b11_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'b11_d'}.'</td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:35px; text-align: center;" class="three">12.</td>
    <td style="width:225px; text-align: left;" class="three">Sistim pengurasan / pengeringan untuk muatan bocor dalam ruang - ruang penghalang / rintangan dan ruang palka             
    <br><i>Drainage system for leaked cargo in interbarrier spaces and hold spaces  </i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->b12_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->b12_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->b12_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'b12_d'}.'</td>
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
    <td style="width:35px;" class="three"><b>C</b><br></td>
    <td style="width:595;" class="three"><b>SISTEM PIPA</b><br> <i>PIPING SYSTEMS (Chapter 5 & 8)</i></td>
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
    <td style="width:225px; text-align: left;" class="three">Muatan dan proses pipa         
    <br><i>Cargo and process pipings  </i>
    <br>
    (a) Muatan dan proses pipa termasuk katup dan penghubung perkakas 
    (Penyekatan harus dirubah atas permintaan surveyor)     
    <br>
     <i>(a) Cargo and process piping including valves and associated fittings (Insulations to be removed as found necessary by surveyor)  </i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->c1_1_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->c1_1_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->c1_1_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'c1_1_d'}.'</td>
  </tr>
  </tbody>
</table>';

// output the HTML content
$pdf->writeHTMLCell($w='', $h='', $x=15, $y=200, $page2_3, $border=0, $ln=1, $fill=0, $reseth=true, $align='', $autopadding=true);

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
	<td style="width:35px; text-align: center;" class="three" rowspan="2"></td>
    <td style="width:225px; text-align: left;" class="three">(b) Tekanan ikatan dan penyegelan dari tekanan katup bantuan
    <br><i>(b) Sealing and setting pressure of pressure relief valves </i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->c1_2_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->c1_2_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->c1_2_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'c1_2_d'}.'</td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:225px; text-align: left;" class="three">(c) Kelistrikan yang tertata diantara structure kulit dan pipa – pipa serta 
    diantara sambungan pipa 
    (Penyekatan 	harus 	dirubah 	atas  permintaan surveyor)     
    <br><i> (c) Electrical bonding between hull structure and pipings and between pipe flanges(Insulations to be removed as found necessary by surveyor) </i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->c1_3_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->c1_3_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->c1_3_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'c1_3_d'}.'</td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:35px; text-align: center;" class="three" rowspan="3">2.</td>
    <td style="width:225px; text-align: left;" class="three">Sistem pelepasan udara dari system pengurungan muatan          
    <br><i>Venting system of cargo containment systems  </i>
    <br>(a) Pipa-pipa 	ventilasi 	dan 	system penyalurannya      
    <br>
    <i>(a) Venting pipes and their drainage system  </i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->c2_1_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->c2_1_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->c2_1_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'c2_1_d'}.'</td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:225px; text-align: left;" class="three">(b) Tekanan / vacuum katup-katup bantu, system keselamatan dan sekat proteksi penghubung bagi system pengurungan muatan (tangki muatan, ruang palka dan ruang penyangga) termasuk keadaan 
    tekanan dari katup-katup bantu P/V 
    <br><i> (b)Pressure/vacuum relief valves, safety systems and   the associated protection screens for cargo containment system (cargo tanks, interbarier spaces and hold spaces) including setting pressure of the P/V relief valves  </i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->c2_2_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->c2_2_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->c2_2_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'c2_2_d'}.'</td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:225px; text-align: left;" class="three">(c) Penutup tekanan katup bantu dari tangki uatan   
    <br><i> (c)Sealing of pressure relief valves of cargo tanks  </i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->c2_3_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->c2_3_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->c2_3_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'c2_3_d'}.'</td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:35px; text-align: center;" class="three">3.</td>
    <td style="width:225px; text-align: left;" class="three">Penyekatan pipa-pipa            
    <br><i>Insulation of piping </i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->c3_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->c3_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->c3_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'c3_d'}.'</td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:35px; text-align: center;" class="three">4.</td>
    <td style="width:225px; text-align: left;" class="three">Pemisahan pipa-pipa            
    <br><i>Segregation of pipings  </i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->c4_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->c4_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->c4_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'c4_d'}.'</td>
  </tr>
  
  <tr style="text-align: center;">
    <td style="width:35px; text-align: center;"></td>
  </tr>
  
  <tr style="text-align: left;">
    <td style="width:50px; text-align: center;"></td>
	<td style="width:100px; text-align: left;" class="three">Note 1) </td>
	<td style="width:400px; text-align: left;" class="three">Pada saat MAS dan IS, tangki-tangki muatan dan ruang-ruang lembam lain tidak perlu gas dibebaskan, mungkin kalau dikehendaki oleh surveyor. <br> <i>At each MAS and IS, Cargo Tanks and Other ineried spaces need not be gasfree unless specially required by the surveyor </i></td>
	<td style="width:50px; text-align: center;"></td>
  </tr>
  
  <tr style="text-align: left;">
    <td style="width:50px; text-align: center;"></td>
	<td style="width:100px; text-align: left;" class="three">Note 2) </td>
	<td style="width:400px; text-align: left;" class="three">Pada MAS pertama setelah kapal mengangkut gas, sekurangnya satu system penahan muatan diuji untuk setiap tipe tangki berkenaan dengan artikel 2.1, 2.2, 2.3 dan 2.10 kecuali inspeksi dalam tangki bebas tipe C dimana perlu benarbenar dipertimbangkan oleh surveyor<br> <i>At first MAS after the ship enters in service of carrying liquefied gases, at least one cargo containment system is  to be examined for each type of tanks regarding items of 2.1, 2.2, 2.3 and 2.10 except internal inspection of independent tank of type C Where considered necessary by surveyor. </i></td>
	<td style="width:50px; text-align: center;"></td>
  </tr>
  
  <tr style="text-align: left;">
    <td style="width:50px; text-align: center;"></td>
	<td style="width:100px; text-align: left;" class="three">Note 3) </td>
	<td style="width:400px; text-align: left;" class="three">Jika tangki muatan dilengkapi katup bantu dan selaput/membrane bukan logam dalam katup utama dan bantu, harus ditegaskan bahwa membrane yang bukan logam harus diperbaharui dan katup-katupnya disetel/disesuaikan,fungsinya dicoba dan tertutup dalam jangka waktu tidak lebih dari tiga tahun.<br> <i>If the cargo tanks are equipped with relief valves with non-metallic membranes in the main or pilot valves,it is to be comfirmed that such non-metallic membranes are renewed and the valves are adjusted, function tested and sealed at intervals not exceeding three years.</i></td>
	<td style="width:50px; text-align: center;"></td>
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
    <td style="width:35px;" class="three"><b>D</b><br></td>
    <td style="width:595;" class="three"><b>SISTIM PEMELIHARAAN/ PERAWATAN MUATAN DAN SISTIM PENDINGIN/PENCAIRAN KEMBALI</b><br> <i>CARGO HANDLING SYSTEM AND REFRIGERATION /  RELIQUEFACTION SYSTEMS (Chapter 5 & 7 )</i></td>
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
    <td style="width:225px; text-align: left;" class="three">Pompa muatan, compressor gas muatan, blower gas muatan, penggerak 
    utama dan alat-alat keselamatan 
    (Pemeriksaan yang lebih teliti dari motor listrik penggerak utama boleh diabaikan)      
    <br><i>Cargo pump,cargo gas compressor, cargo gas blower, their prime movers 
    and safety devices 
    (Overhull inspection of prime movers of electric motors may be omitted ) </i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->d1_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->d1_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->d1_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'d1_d'}.'</td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:35px; text-align: center;" class="three">2.</td>
    <td style="width:225px; text-align: left;" class="three">Pertukaran panas muatan, proses penekanan kapal, alat penguap dan katup bantunya.       
    <br><i>Cargo heat exchangers , process vessels, vaporizers and their relief valves  </i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->d2_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->d2_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->d2_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'d2_d'}.'</td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:35px; text-align: center;" class="three" rowspan="3">3.</td>
    <td style="width:225px; text-align: left;" class="three">Peralatan 	yang 	berkaitan 	dengan pendingin        
    <br><i>Equipment relating to refrigerant </i>
    <br>
    (a) Pompa - pompa dan kompressorkompressor termasuk alat - alat keselamatannya.  
    <br>
      <i>(a)	Pumps and compressors including safety devices  </i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->d3_1_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->d3_1_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->d3_1_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'d3_1_d'}.'</td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:225px; text-align: left;" class="three">(b)	Penahan kapal seperti kondensor, penerima alat-alat pendingin alat pemisah minyak dari air dsb. serta katup bantu.        
    <br><i> (b)Pressure vessels such as condensers receiver, intercoolers, oil separators, etc and relief valves </i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->d3_2_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->d3_2_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->d3_2_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'d3_2_d'}.'</td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:225px; text-align: left;" class="three">(c)	Sistim pipa pendingin       
    <br><i>(c) Refrigerant piping systems  </i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->d3_3_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->d3_3_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->d3_3_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'d3_3_d'}.'</td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:35px; text-align: center;" class="three">4.</td>
    <td style="width:225px; text-align: left;" class="three">Sistim pemutusan darurat untuk menghentikan pemindahan muatan      
    <br><i>Emergency shut-off system for stopping the cargo transfer </i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->d4_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->d4_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->d4_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'d4_d'}.'</td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:35px; text-align: center;" class="three">5.</td>
    <td style="width:225px; text-align: left;" class="three">Pipa muatan yang disetujui       
    <br><i>Approved cargo hoses  </i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->d5_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->d5_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->d5_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'d5_d'}.'</td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:35px; text-align: center;" class="three">6.</td>
    <td style="width:225px; text-align: left;" class="three">Penyimpanan listrik        
    <br><i>Electrical bonding </i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->d6_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->d6_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->d6_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'d6_d'}.'</td>
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
    <td style="width:35px;" class="three"><b>E</b><br></td>
    <td style="width:595;" class="three"><b>SISTIM PENGAWASAN LINGKUNGAN </b><br> <i>ENVIRONMENTAL CONTROL SYSTEMS (Chapter 9 )</i></td>
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
    <td style="width:225px; text-align: left;" class="three">Penataan untuk lapisan / pengisi / pengeringan  
    <br><i>Arrangements for inerting / padding / drying </i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->e1_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->e1_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->e1_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'e1_d'}.'</td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:35px; text-align: center;" class="three">2.</td>
    <td style="width:225px; text-align: left;" class="three">Penatan untuk membawa gas yang cukup sebagai pengganti bagi 
    kehilangan normal       
    <br><i>Arrangements for sufficient gas to be carried to compensate for normal losses  </i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->e2_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->e2_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->e2_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'e2_d'}.'</td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:35px; text-align: center;" class="three">3.</td>
    <td style="width:225px; text-align: left;" class="three">Penataan untuk membawa cukup separuh dimana pengeringan digunakan pada ceruk udara tangki muatan dan / atau sekeliling ruangan    
    <br><i>Arrangements for sufficient medium to be carried where drying agents are used on air inlets to cargo tank and/or the surrounding spaces. </i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->e3_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->e3_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->e3_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'e3_d'}.'</td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:35px; text-align: center;" class="three">4.</td>
    <td style="width:225px; text-align: left;" class="three">Sistim monitor untuk pengawasan lingkungan bagi ruangan- ruangan antara muatan cair dan tangki disekitar tangki muatan    
    <br><i>Monitoring system for environment control for the ullage spaces and surrounding spaces of cago tanks </i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->e4_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->e4_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->e4_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'e4_d'}.'</td>
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
    <td style="width:35px;" class="three"><b>F</b><br></td>
    <td style="width:595;" class="three"><b>PERALATAN LISTRIK DALAM RUANGAN GAS BERBAHAYA</b><br> <i>ELECTRICAL EQUIPMENT IN GAS DANGEROUS SPACES (Chapter 10 ) </i></td>
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
    <td style="width:225px; text-align: left;" class="three">Peralatan listrik   
    <br><i>Electrical equipment </i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->f1_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->f1_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->f1_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'f1_d'}.'</td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:35px; text-align: center;" class="three">2.</td>
    <td style="width:225px; text-align: left;" class="three">Percobaan ketahanan penyekatan 
    (Percobaan ini boleh diadakan jika ketahanan penyekatan dapat dibuktikan oleh catatan percobaan terakhir yang dilakukan oleh ABK )     
    <br><i></i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->f2_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->f2_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->f2_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'f2_d'}.'</td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:35px; text-align: center;" class="three">3.</td>
    <td style="width:225px; text-align: left;" class="three">PPeralatan pengunci 
    <br><i>Interlocking devices </i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->f3_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->f3_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->f3_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'f3_d'}.'</td>
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
    <td style="width:35px;" class="three"><b>G</b><br></td>
    <td style="width:595;" class="three"><b>PERALATAN LISTRIK DALAM RUANGAN GAS BERBAHAYA </b><br> <i>ELECTRICAL EQUIPMENT IN GAS DANGEROUS SPACES (Chapter 10 ) </i></td>
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
    <td style="width:225px; text-align: left;" class="three">Mengukur tingkat pencairan alarm – alarm tingkat tinggi dan katup-katup sistim pemutusan dalam keadaan darurat.   
    <br><i>Liquid level gauges, high level alarms and valves associated with emergency shut-off system.  </i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->g1_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->g1_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->g1_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'g1_d'}.'</td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:35px; text-align: center;" class="three">2.</td>
    <td style="width:225px; text-align: left;" class="three">Alat pengukur tingkat pencairan, thermometer pengukur,dan pengukur tekanan bagi sistim pengurangan muatan dan alarm-alarm     
    <br><i>Gauging device such as liquid level gauge, thermometer gauge and pressure gauge for cargo containment systems and the associated alarm </i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->g2_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->g2_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->g2_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'g2_d'}.'</td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:35px; text-align: center;" class="three">3.</td>
    <td style="width:225px; text-align: left;" class="three">Alat-alat pendeteksi gas yang dapat dipindah-pindah dan tetap dengan suatu persyaratan pendeteksi asap dan alarm. 
    <br><i>Fixed and portable gas detection instruments with any required vapour detection tubes and the associated alarms.  </i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->g3_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->g3_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->g3_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'g3_d'}.'</td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:35px; text-align: center;" class="three">4.</td>
    <td style="width:225px; text-align: left;" class="three">Meter-meter pengukur berisikan oksigen. 
    <br><i>Oxygen content meters. </i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->g4_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->g4_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->g4_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'g4_d'}.'</td>
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
    <td style="width:35px;" class="three"><b>H</b><br></td>
    <td style="width:595;" class="three"><b>SISTIM PEMADAM KEBAKARAN</b><br> <i>FIRE EXTINGUISHING SYSTEMS (Chapter 11 ) </i></td>
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
    <td style="width:225px; text-align: left;" class="three">Peralatan pemadam kebakaran untuk ruang-ruang dekat gas berbahaya (sistim CO2, sistim ineritng, sistim halon atau sistim sistim lain yang disetujui dan alarm bunyi). 
    <br><i>Fire extinguishing arrangements for gas dangerous enclosed spaces (CO2 system, inerting system, halon system or other system as approved) and their audible alarms</i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->h1_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->h1_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->h1_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'h1_d'}.'</td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:35px; text-align: center;" class="three">2.</td>
    <td style="width:225px; text-align: left;" class="three">Peralatan pemadam kebakaran untuk area muatan (sistim busa, atau sistim pancar air atau sistim bahan kimia kering yang disetujui).  
    <br><i>Fire extinguishing arrangements for cargo area (Foam system, water spray system or dry chemical system as approved</i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->h2_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->h2_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->h2_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'h2_d'}.'</td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:35px; text-align: center;" class="three">3.</td>
    <td style="width:225px; text-align: left;" class="three">Pakaian pemadam kebakaran 
    <br><i>Fireman’s outfits .</i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->h3_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->h3_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->h3_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'h3_d'}.'</td>
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
    <td style="width:35px;" class="three"><b>I</b><br></td>
    <td style="width:595;" class="three"><b>SISTIM PEMADAM KEBAKARAN </b><br> <i>FIRE EXTINGUISHING SYSTEMS (Chapter 11 ) </i></td>
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
    <td style="width:35px; text-align: center;" class="three" rowspan="5">1.</td>
    <td style="width:225px; text-align: left;" class="three">Perlengkapan dan pakaian pelindung bagi ABK pada saat melakukan pemuatan  dan bongkar terdiri dari :        
    <br><i>Protective clothing and equipment of cargo resistants materials for crew members engaged in loading and discharging operations : </i>
    <br>
    (1) Pakaian / Rok kerja besar   
    <br>
      <i>(1)	Large aprons  </i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->i1_1_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->i1_1_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->i1_1_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'i1_1_d'}.'</td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:225px; text-align: left;" class="three">(2)	Sarung tangan khusus dengan tak berlengan panjang 
    <br><i>(2)	Special gloves with long sleeves </i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->i1_2_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->i1_2_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->i1_2_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'i1_2_d'}.'</td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:225px; text-align: left;" class="three">(3)	Alas kaki yang cocok        
    <br><i>(3)	Suitable footwear  </i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->i1_3_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->i1_3_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->i1_3_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'i1_3_d'}.'</td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:225px; text-align: left;" class="three">(4)	Pakaian kerja        
    <br><i>(4)	Overalls </i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->i1_4_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->i1_4_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->i1_4_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'i1_4_d'}.'</td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:225px; text-align: left;" class="three">(5)	Celana panjang ketat, kaca mata debu atau pelindung muka atau keduanya       
    <br><i>(5)Tight-fitting googles or face shields or both </i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->i1_5_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->i1_5_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->i1_5_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'i1_5_d'}.'</td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:35px; text-align: center;" class="three" rowspan="7">2.</td>
    <td style="width:225px; text-align: left;" class="three">Perlengkapan keselamatan yang diharuskan (tidak kurang dari 2 set lengkap) untuk masuk / bekerja dalam ruang berisi gas:  
    <br><i>Requisite safety equipments (not less than two complete sets) for entering / working in a gass filled space. </i>
    <br>
    (1) Peralatan bernafas mengisi udara sendiri (1200 l bebas udara)     
    <br>
      <i>(1)	Self contain air breathing apparatus 
      (1200 l free air) </i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->i2_1_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->i2_1_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->i2_1_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'i2_1_d'}.'</td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:225px; text-align: left;" class="three">(2)	Pakaian pelindung  
    <br><i>(2)	Protective Clothing  </i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->i2_2_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->i2_2_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->i2_2_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'i2_2_d'}.'</td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:225px; text-align: left;" class="three">(3)	Sepatu tinggi          
    <br><i>(3)	Boots </i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->i2_3_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->i2_3_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->i2_3_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'i2_3_d'}.'</td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:225px; text-align: left;" class="three">(4)	Sarung tangan         
    <br><i>(4)	Gloves  </i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->i2_4_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->i2_4_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->i2_4_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'i2_4_d'}.'</td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:225px; text-align: left;" class="three">(5)	Celana panjang, kaca mata debu.        
    <br><i>(5)	Tight-fitting googles   </i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->i2_5_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->i2_5_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->i2_5_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'i2_5_d'}.'</td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:225px; text-align: left;" class="three">(6)	Tali penolong tahan api dengan tali pinggang tahan terhadap muatan yang dibawa         
    <br><i>(6)	Fireproof lifeline with belt resistant to the cargoes carried   </i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->i2_6_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->i2_6_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->i2_6_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'i2_6_d'}.'</td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:225px; text-align: left;" class="three">(7)	Lampu tahan ledakan yang dapat dipindah-pindah.         
    <br><i>(7) Portable explosion-proof lamp  </i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->i2_7_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->i2_7_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->i2_7_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'i2_7_d'}.'</td>
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
    <td style="width:35px; text-align: center;" class="three">3.</td>
    <td style="width:225px; text-align: left;" class="three">Catatan pemeriksaan pernapasan dimasukkan dalam buku harian yang dilaksanakan sekurangnya 1 kali sebulan oleh Perwira Penanggung Jawab.        
    <br><i>Record of Inspection of breathing apparatus in the ship’s log-book carrried out at least onea month by a responsible officer  </i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->i3_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->i3_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->i3_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'i3_d'}.'</td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:35px; text-align: center;" class="three">4.</td>
    <td style="width:225px; text-align: left;" class="three">Peralatan kesehatan pertolongan pertama termasuk usungan / pandu, peralatan pernapasan dengan oksigen dan pencegah penangkal dari muatan yang dibawa.         
    <br><i>Medical first aid equipment including a strecher oxygen resuscitation equipment and anti dotes for cargoes carried.  </i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->i4_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->i4_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->i4_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'i4_d'}.'</td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:35px; text-align: center;" class="three">5.</td>
    <td style="width:225px; text-align: left;" class="three">Penyiraman zat-zat yang mengandung radio aktif dan pencucian mata        
    <br><i>Decontamination 	shower 	and eyewashes</i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->i5_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->i5_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->i5_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'i5_d'}.'</td>
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
    <td style="width:35px;" class="three"><b>J</b><br></td>
    <td style="width:595;" class="three"><b>SISTIM PEMADAM KEBAKARAN </b><br> <i>FIRE EXTINGUISHING SYSTEMS (Chapter 11 ) </i></td>
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
    <td style="width:225px; text-align: left;" class="three">Pemisahan ruang muatan. 
    <br><i>Segregation of cargo area. </i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->j1_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->j1_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->j1_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'j1_d'}.'</td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:35px; text-align: center;" class="three">2.</td>
    <td style="width:225px; text-align: left;" class="three">Penataan ruang-ruang keselamatan gas.   
    <br><i>Arrangements of gas safety spaces </i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->j2_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->j2_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->j2_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'j2_d'}.'</td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:35px; text-align: center;" class="three">3.</td>
    <td style="width:225px; text-align: left;" class="three">Lubang sebagai jendela, pintu, ceruk udara dan sebagainya . Dan alat-alat penutupnya   
    <br><i>Openings such as windows, doors, air inlets, etc and their clossing appliances </i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->j3_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->j3_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->j3_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'j3_d'}.'</td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:35px; text-align: center;" class="three">4.</td>
    <td style="width:225px; text-align: left;" class="three">Penataan ruang pompa muatan dan ruang kompresor muatan serta sistem pembuangan-    
    <br><i>Arrangements of cargo pump rooms and cargo compressor rooms and their drainage system</i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->j4_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->j4_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->j4_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'j4_d'}.'</td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:35px; text-align: center;" class="three">5.</td>
    <td style="width:225px; text-align: left;" class="three">Penataan ruang pengawasan muatan    
    <br><i>Arrangements of cargo control rooms. </i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->j5_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->j5_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->j5_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'j5_d'}.'</td>
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
    <td style="width:35px;" class="three"><b>K</b><br></td>
    <td style="width:595;" class="three"><b>LAIN-LAIN </b><br> <i>OTHERS (Chapter 2, 3, 12, 16 & 17 )</i></td>
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
    <td style="width:225px; text-align: left;" class="three">Peralatan pengendali banjir, pintu kedap air dan sebagainya. Yang memenuhi persyaratan kerusakan stabilitas
    <br><i>Cross flooding equipments, watertight door, ets which are provided to meet the damage stability requirements</i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->k1_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->k1_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->k1_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'k1_d'}.'</td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:35px; text-align: center;" class="three">2.</td>
    <td style="width:225px; text-align: left;" class="three">Jendela-jendela dan pintu-pintu anjungan, jendela bulat dan jendela di bangunan bagian atas serta rumah geladak terakhir yang berhadapan dengan daerah / tanki muatan.    
    <br><i>Wheel house doors and windows, side scuttles and windows in superstructure and deck house end facing the cargo area. </i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->k2_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->k2_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->k2_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'k2_d'}.'</td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:35px; text-align: center;" class="three">3.</td>
    <td style="width:225px; text-align: left;" class="three">Sistim pendingin termasuk kipas-kipas cadangan atau impeler untuk ruang-ruang tertutup dan bagian ruang dakam muatan  
    <br><i>Venting system including their spare fans or impeler for enclosed spaces and compartments in cargo area..  </i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->k3_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->k3_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->k3_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'k3_d'}.'</td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:35px; text-align: center;" class="three">4.</td>
    <td style="width:225px; text-align: left;" class="three">Penampan yang dapat dipindahkan atau tetap untuk sekat pelindung geladak harus tersedia untuk mengantisipasi kebocoran muatan.    
    <br><i>Fixed or portable trays or insukation for deck protection to provided against cargo leakage </i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->k4_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->k4_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->k4_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'k4_d'}.'</td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:35px; text-align: center;" class="three">5.</td>
    <td style="width:225px; text-align: left;" class="three">Sekat perembesan yang kedap gas termasuk penyekat kedap gas   
    <br><i>Gas tight bulkhead penetrations including gas tight shaft scalings.   </i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->k5_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->k5_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->k5_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'k5_d'}.'</td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:35px; text-align: center;" class="three">6.</td>
    <td style="width:225px; text-align: left;" class="three">Penataan 	pemanas 	untuk 	struktur lambung.       
    <br><i>Heating arrangements of hull structur </i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->k6_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->k6_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->k6_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'k6_d'}.'</td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:35px; text-align: center;" class="three">7.</td>
    <td style="width:225px; text-align: left;" class="three">Perlengkapan lain yang disyaratkan untuk muatan khusus jika ada.       
    <br><i>Other equipments required for special cargo, if any. </i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->k7_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->k7_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->k7_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'k7_d'}.'</td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:35px; text-align: center;" class="three">8.</td>
    <td style="width:225px; text-align: left;" class="three">Sistim supplai minyak gas termasuk keselamatan mereka dan langkah-langkah pengawasan.  
    <br><i>Gas fuel supply system including their safety and control leasures.. </i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->k8_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->k8_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->k8_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'k8_d'}.'</td>
  </tr>

  <tr style="text-align: center;">
    <td style="width:35px; text-align: center;" class="three">9.</td>
    <td style="width:225px; text-align: left;" class="three">Pengaturan haluan dan buritan pada saat muat dan bongkar.  
    <br><i>Bow and stern loading / unloading arrangements </i>
    </td>
    <td style="width:50px; text-align: center;" class="three">'.($data->k9_a == '1' ? $check : '').'</td>
    <td style="width:50x; text-align: center;" class="three">'.($data->k9_b == '1' ? $check : '').'</td>
    <td style="width:90px; text-align: center;" class="three">'.($data->k9_c == '1' ? $check : '').'</td>
    <td style="width:180px; text-align: center;" class="three">'.$data->{'k9_d'}.'</td>
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
				<td style="width:630;" class="three"><b>REKOMENDASI MARINE INSPECTOR :</b></td>
			  </tr>
			  <tr style="text-align: center;">
				<td style="width:630; height:250;" class="three">'.$data->z1.'</td>
			  </tr>
			  
			  <tr style="text-align: center;">
				<td style="width:630;"></td>
			  </tr>
			  
			  <tr style="text-align: center;">
				<td style="width:35px; text-align: center;"></td>
				<td style="width:180px; text-align: left;">Pelabuhan Pemeriksaan.  
				<br><i>Port Inspection</i>
				</td>
				<td style="width:370px; text-align: left;">: '.$data->z2.'</td>
			  </tr>
			  
			  <tr style="text-align: center;">
				<td style="width:35px; text-align: center;"></td>
			  </tr>
  
			  <tr style="text-align: center;">
				<td style="width:630;"></td>
			  </tr>
			  <tr style="text-align: center;">
				<table style="padding:0">

				  <tr style="text-align: center;">
					<td style="width:80px; text-align: center;"></td>
					<td style="width:50px; text-align: right;"></td>
					<td style="width:100px; text-align: center;"></td>
					<td style="width:150px; text-align: center;"></td>
					<td style="width:150px; text-align: center;">'.$data->z3.','.date_indo($data->z4).'</td>
				  </tr>

				  <tr style="text-align: center;">
					<td style="width:80px; text-align: center;"></td>
					<td style="width:50px; text-align: right;"></td>
					<td style="width:100px; text-align: center;"></td>
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
					<td style="width:100px; text-align: center;"></td>
					<td style="width:150px; text-align: center;"></td>
					<td style="width:150px; text-align: center;"><u>'.$data->z5.'</u></td>
				  </tr>

				  <tr style="text-align: center;">
					<td style="width:80px; text-align: center;"></td>
					<td style="width:50px; text-align: right;"></td>
					<td style="width:100px; text-align: center;"></td>
					<td style="width:150px; text-align: center;"></td>
					<td style="width:150px; text-align: center;">NIP/MI No. '.$data->z6.'</td>
				  </tr>
				</table>
			  </tr>

  
  </tbody>
</table>';

// output the HTML content
$pdf->writeHTMLCell($w='', $h='', $x=15, $y=30, $page2_3, $border=0, $ln=1, $fill=0, $reseth=true, $align='', $autopadding=true);

$pdf->lastPage();

// ---------------------------------------------------------
ob_clean();

$pdf->Output($title.'.pdf', 'I');
//============================================================+
// END OF FILE
//============================================================+

?>