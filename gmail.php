<?php

require('fpdf.php');
require('funzioni.php');

class PDF extends FPDF
{
// Page header
function Header()
{
    	// Logo
	$this->Image('images/logo_web.jpg',10,6,50);
	$this->SetFont('Arial','',15);
	$dominio=after ('@', $_POST['email']);
	$this->Cell(200,10,$_POST['email'],0,0,'C');
	$this->Ln(10);
	$this->SetFont('Arial','',10);
        $this->Cell(200,10,'Dominio: '.$dominio,0,0,'C');
        //$this->Cell(150);
        $this->Image('images/g_workspace.png',174,10,24);
        $this->Cell(-50,10,'Data: '.$_POST['data1'],0,1,'C');

    // Line break
    //$this->Ln(20);


}

	// Page footer
	function Footer()
	{
    		// Position at 1.5 cm from bottom
    		$this->SetY(-20);
    		// Arial italic 8
    		$this->SetFont('Arial','I',6.5);
    		$footer=utf8_decode("____________________________________________________________________________________________________________________________________

NEIKOS s.r.l. - Benevento - Via Grimoaldo Re 26/B,  82100 - tel 0824.25569 - fax 0824.1810515 - Senigallia (AN) - Via Abbagnano 10, 60019 - tel 071.64933 - fax 071.9203225
sito web: www.neikos.it - e-mail: info@neikos.it - P.Iva/C.F. 011 309 606 26 - Iscritta registro Imprese C.C.I.A.A. di Benevento n° 01130960626 - REA n° 96751
                                Questo documento è di proprietà di Neikos srl. E' vietata ogni forma di copia e di diffusione senza la relativa autorizzazione");
    		$this->Write(3,$footer);
	}
}

// Inizialize FPDF
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();

$pdf->Ln(8);
// Welcome
$pdf->SetFont('Arial','',11);
$str2xe=utf8_decode("Gentile Cliente, la suite ");
$pdf->Write(5,$str2xe);
$pdf->SetFont('Arial','B',11);
$str2axe = utf8_decode("Google Workspace");
$pdf->Write(5,$str2axe);
$pdf->SetFont('Arial','',11);
$str2bxe = utf8_decode(" da Lei richiesta è attiva. Seguono i dati di configurazione:");
$pdf->Write(5,$str2bxe);
$pdf->Ln(10);

// COLORS
//
// FIRST (0,50,85)
// SECOND (242,245,247)
// THIRD (230,234,236)

// Table credentials
$pdf->SetFont('Arial','B',11);
$pdf->setFillColor(0,50,85);
$pdf->setTextColor(250,250,250);
$pdf->Cell(120,10,'E-MAIL / NOME UTENTE',0,0,'C',1);

$pdf->setFillColor(0,50,85);
$pdf->setTextColor(250,250,250);
$pdf->Cell(45,10,'PASSWORD'.$i,0,0,'C',1);

$pdf->setFillColor(0,50,85);
$pdf->setTextColor(250,250,250);
$pdf->Cell(25,10,"CAPACITA'".$str1.$i,0,1,'C',1);

$pdf->setFillColor(242,245,247);
$pdf->setTextColor(0,0,0);
$pdf->SetFont('Arial','',12);

$pdf->Cell(120,10,$_POST['email'].$i,0,0,'C',1);
if($_POST['generator']=='1'){
    $password=pw_generator();
    $pdf->Cell(45,10,$password.$i,0,0,'C',1);
}
else{
    $pdf->Cell(45,10,$_POST['password'].$i,0,0,'C',1);
}
$pdf->setFillColor(242,245,247);
$pdf->Cell(25,10,$_POST['capacita'].$i,0,1,'C',1);

// Table Alias
if($_POST['alias']!=null){
	$pdf->setFillColor(0,50,85);
	$pdf->setTextColor(250,250,250);
        $pdf->SetFont('Arial','B',11, 'C', 1);
        $pdf->Cell(190,10,'ALIAS'.$i,0,1,'C', 1);

        $pdf->setFillColor(242,245,247);
        $pdf->setTextColor(0,0,0);
        $pdf->SetFont('Arial','',12);
        $pdf->Cell(190,10,$_POST['alias'].$i,0,1,'C',1);
}
$pdf->Ln(7);

// Webmail
$pdf->SetFont('Arial','B',13);
$pdf->Cell(0,8,'WEBMAIL'.$i,0,1);
$pdf->SetFont('Arial','',11);
$str2=utf8_decode("Collegandosi all'indirizzo ");
$pdf->Write(5,$str2);
$pdf->SetFont('Arial','BU',11);
$str2a = utf8_decode("https://mail.google.com");
$pdf->Write(5,$str2a);
$pdf->SetFont('Arial','',11);
$str2b = utf8_decode(" è disponibile un sistema di amministrazione della posta su server sicuro che consente di utilizzare l'account da qualsiasi dispositivo connesso ad internet.");
$pdf->Write(5,$str2b);
$pdf->Ln(10);

// APP
$pdf->SetFont('Arial','B',13);
$pdf->Cell(0,8,'APP E DISPOSITIVI'.$i,0,1);
$pdf->SetFont('Arial','',11);
$str2cc=utf8_decode("Consigliamo di scaricare l'applicazione ");
$pdf->Write(5,$str2cc);
$pdf->SetFont('Arial','B',11);
$str3ab = utf8_decode("GMAIL");
$pdf->Write(5,$str3ab);
$pdf->SetFont('Arial','',11);
$str2ccd=utf8_decode(" per la lettura delle e-mail da dispositivi quali smartphone e tablet.");
$pdf->Write(5,$str2ccd);
$pdf->Ln(30);


// Profile
$pdf->SetFont('Arial','B',13);
$pdf->Cell(0,8,'GESTIONE PROFILO'.$i,0,1);
$pdf->SetFont('Arial','',11);
$str2cce=utf8_decode("Per gestire il proprio profilo Google Workspace e' possibile accedere all'URL ");
$pdf->Write(5,$str2cce);
$pdf->SetFont('Arial','BU',11);
$str3abe = utf8_decode("https://myaccount.google.com");
$pdf->Write(5,$str3abe);
$pdf->SetFont('Arial','',11);
$str2ccde=utf8_decode(" dove sara' possibile modificare le impostazioni del profilo.");
$pdf->Write(5,$str2ccde);
$pdf->Ln(10);

// Admin
$pdf->SetFont('Arial','B',13);
$pdf->Cell(0,8,'GESTIONE AMMINISTRAZIONE'.$i,0,1);
$pdf->SetFont('Arial','',11);
$str2cced=utf8_decode("Nel caso di un amministratore, per modificare le impostazioni della suite Google Workspace e' possibile accedere all'URL ");
$pdf->Write(5,$str2cced);
$pdf->SetFont('Arial','BU',11);
$str3abed = utf8_decode("https://admin.google.com");
$pdf->Write(5,$str3abed);
$pdf->SetFont('Arial','',11);
$str2ccd3e=utf8_decode(" dove sara' possibile personalizzare la configurazione.");
$pdf->Write(5,$str2ccd3e);
$pdf->Ln(30);


// Client Guide
$pdf->SetFont('Arial','B',13);
$pdf->Cell(0,8,'GUIDA E SUPPORTO CONFIGURAZIONE CLIENT'.$i,0,1);
$pdf->SetFont('Arial','',11);
$str3=utf8_decode("Laddove ci sia l'esigenza di configurare la Google Workspace anche su un client di posta, o altre necessita', e' possibile richiedere supporto nella configurazione inviando una mail all'indirizzo: ");
$pdf->Write(5,$str3);
$pdf->SetFont('Arial','BU',11);
$str3a = utf8_decode("support@neikos.it");
$pdf->Write(5,$str3a);
$pdf->Ln(10);


$pdf->Output(str_replace("@", "_at_", $_POST['email']) . ".pdf","D");
//$pdf->Output();
