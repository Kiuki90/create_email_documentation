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
        $this->Image('images/z_iris.png',174,10,24);
        $this->Cell(-50,10,'Data: '.$_POST['data'],0,1,'C');

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
$str2xe=utf8_decode("Gentile Cliente, la ");
$pdf->Write(5,$str2xe);
$pdf->SetFont('Arial','B',11);
$str2axe = utf8_decode("casella di posta Neikos ");
$pdf->Write(5,$str2axe);
$pdf->SetFont('Arial','',11);
$str2bxe = utf8_decode("da Lei richiesta è attiva. Seguono i dati di configurazione:");
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
if ($_POST['generator']=='1') {
    $password=pw_generator();
    $pdf->Cell(45,10,$password.$i,0,0,'C',1);
} else {
    $pdf->Cell(45,10,$_POST['password'].$i,0,0,'C',1);
}
$pdf->setFillColor(230,234,236);
$pdf->Cell(25,10,$_POST['capacita'].$i,0,1,'C',1);

// Table Alias
if($_POST['alias']!=null){
	$pdf->setFillColor(0,50,85);
	$pdf->setTextColor(255,255,255);
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
$str2a = utf8_decode("https://iris.neikos.it");
$pdf->Write(5,$str2a);
$pdf->SetFont('Arial','',11);
$str2b = utf8_decode(" è disponibile un sistema di amministrazione della posta su server sicuro che consente di utilizzare l'account da qualsiasi dispositivo connesso ad internet.");
$pdf->Write(5,$str2b);
$pdf->Ln(10);

// Client Guide
$pdf->SetFont('Arial','B',13);
$pdf->Cell(0,8,'GUIDA E SUPPORTO CONFIGURAZIONE CLIENT'.$i,0,1);
$pdf->SetFont('Arial','',11);
$str3=utf8_decode("Per aggiungere il suo nuovo account su un client di posta può seguire la guida cliccando sul seguente link ");
$pdf->Write(5,$str3);
$pdf->SetFont('Arial','BU',11);
$str3a = utf8_decode("https://www.neikos.it/support");
$pdf->Write(5,$str3a);
$pdf->SetFont('Arial','',11);
$str3b = utf8_decode(" e selezionare il client desiderato. A questo punto si aprirà un documento in pdf che mostrerà tutti i passaggi per la configurazione del client utilizzando i parametri seguenti:");
$pdf->Write(5,$str3b);
$pdf->Ln(10);

// Table parameters
$pdf->SetFont('Arial','B',11);
$pdf->setTextColor(0,0,0);
$pdf->setFillColor(230,234,236);
$pdf->Cell(126,10,'POSTA IN ARRIVO',0,0,'C',1);

$pdf->setTextColor(0,0,0);
$pdf->setFillColor(230,234,236);
$pdf->Cell(63,10,'POSTA IN USCITA'.$i,0,1,'C',1);

$pdf->SetFont('Arial','B',11);
$pdf->setFillColor(242,245,247);
$pdf->setTextColor(0,0,0);
$pdf->Cell(63,10,'POP3',0,0,'C',1);
$pdf->setFillColor(242,245,247);
$pdf->setTextColor(0,0,0);
$pdf->Cell(63,10,'IMAP',0,0,'C',1);
$pdf->setFillColor(242,245,247);
$pdf->setTextColor(0,0,0);
$pdf->Cell(63,10,'SMTP',0,1,'C',1);

$pdf->SetFont('Arial','',11);
$pdf->setFillColor(242,245,247);
$pdf->setTextColor(0,0,0);
$pdf->Cell(63,10,'server: iris.neikos.it',0,0,'C',1);
$pdf->setFillColor(242,245,247);
$pdf->setTextColor(0,0,0);
$pdf->Cell(63,10,'server: iris.neikos.it',0,0,'C',1);
$pdf->setFillColor(242,245,247);
$pdf->setTextColor(0,0,0);
$pdf->Cell(63,10,'server: iris.neikos.it',0,1,'C',1);

$pdf->SetFont('Arial','',11);
$pdf->setFillColor(242,245,247);
$pdf->setTextColor(0,0,0);
$pdf->Cell(63,10,'porta: 995 - con SSL',0,0,'C',1);
$pdf->setFillColor(242,245,247);
$pdf->setTextColor(0,0,0);
$pdf->Cell(63,10,'porta: 993 - con SSL',0,0,'C',1);
$pdf->setFillColor(242,245,247);
$pdf->setTextColor(0,0,0);
$pdf->Cell(63,10,'porta: 465 (o 25) - con SSL',0,1,'C',1);
$pdf->Ln(4);

$pdf->SetFont('Arial','',11);
$str3b=utf8_decode("POP3: scegliere POP3 per scaricare i messaggi sul client ed avere un archivio locale. 
IMAP: scegliere IMAP per sincronizzare il client al server (no archivio locale, no pulizia automatica server)");
$pdf->Write(5,$str3b);
$pdf->Ln(10);

// Outlook Guide
$pdf->SetFont('Arial','B',11);
$pdf->Cell(0,8,'CONFIGURAZIONE MICROSOFT OUTLOOK'.$i,0,1);
$pdf->SetFont('Arial','',11);
$str5=utf8_decode("1. Avviare Outlook
2. Cliccare in alto a sinistra su FILE -> AGGIUNGI ACCOUNT
3. Immettere l'indirizzo email
4. Cliccare su OPZIONI AVANZATE -> CONFIGURAZIONE MANUALE -> CONNETTI
5. Inserire i dati indicati della configurazione indicati nel PDF -> FATTO. 
");
$pdf->Write(5,$str5);
$pdf->Ln(5);

// Thunderbird Guide
$pdf->SetFont('Arial','B',11);
$pdf->Cell(0,8,'CONFIGURAZIONE MOZILLA THUNDERBIRD'.$i,0,1);
$pdf->SetFont('Arial','',11);
$str6=utf8_decode("1. Avviare Thunderbird
2. Cliccare in alto a destra sull'icona del MENU -> NUOVO -> ACCOUNT EMAIL ESISTENTE
3. Inserire Nome, Email e Password (ricorda password) e cliccare su CONFIGURAZIONE MANUALE
4. Inserire i dati indicati della configurazione indicati nel PDF
5. RIESAMINARE -> FATTO.
");
$pdf->Write(5,$str6);

$pdf->Output(str_replace("@", "_at_", $_POST['email']) . ".pdf","D");
//$pdf->Output();
