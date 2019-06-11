<?php 

use setasign\Fpdi\Fpdi;

function createNrwUe(
        $name,
        $birthdate,
        $address,
        $zip,
        $city,
        $region,
        $templatePath,
        $electionDate = '29. Sept. 2019',
        $stichtag = '09. Juli 2019',
        $party = 'Piratenpartei Österreichs'
) {
    $dateString = preg_replace('/(.{1})/', '$1    ', $birthdate);
    
    // initiate FPDI
    $pdf = new Fpdi();

    // add a page
    $pdf->AddPage();

    // set the source file
    $pdf->setSourceFile($templatePath);
    
    // import page 1
    $tplIdx = $pdf->importPage(1, 'MediaBox');
    
    //use the imported page and place it at point 0,0; calculate width and height
    //automaticallay and ajust the page size to the size of the imported page
    $pdf->useTemplate($tplIdx, 0, 0);

    $pdf->SetAutoPageBreak(false);

    // now write some text above the imported page
    $pdf->SetFont('Helvetica');
    $pdf->SetTextColor(0, 0, 0);
    
    $pdf->SetXY(25, 92);
    $pdf->SetFontSize(14);
    $pdf->Write(0, $party);

    $pdf->SetFontSize(11);

    // Hide and override placeholder text in original pdf
    $pdf->SetFillColor(255, 255, 255);
    $pdf->Rect(26, 73, 30, 4, 'F');
    
    $pdf->SetXY(26, 75);
    $pdf->Write(0, $electionDate);

    // Hide and override placeholder text in original pdf
    $pdf->SetFillColor(255, 255, 255);
    $pdf->Rect(19.5, 186.5, 32, 4, 'F');
    
    $pdf->SetXY(18.5, 188.5);
    $pdf->Write(0, $stichtag);
    
    $pdf->SetFontSize(12);

    $pdf->SetXY(130, 87);
    $pdf->Write(0, $region);

    $pdf->SetXY(40, 114);
    $pdf->Write(0, $name);

    $pdf->SetXY(40, 130);
    $pdf->Write(0, $address);

    $pdf->SetXY(40, 135);
    $pdf->Write(0, $zip.' '.$city);

    $pdf->SetXY(135.5, 135);
    $pdf->Write(0, $dateString);

    return $pdf->Output('S');
}
