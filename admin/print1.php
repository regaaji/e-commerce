<?php
    function generateRow(){
        $contents = '
        <style>
            .table td{
                padding: 3px;
            }
            .table th{
                background-color: orange;
                text-align: center;
                color: #fff;
            }
        </style>
        ';
        include_once('../config/functions.php');
        $sql = "SELECT * FROM tbl_barang WHERE nama LIKE '%celana%'";

        $query = $conn->query($sql);    

        //use for MySQLi OOP
        $no = 1;
        while($row = $query->fetch_object()){
            $contents .=' 
            <tr>
                <td>'.$no++.'</td>
                <td>'.$row->nama.'</td>
                <td>Rp. '.number_format($row->harga).'</td>
                <td>'.$row->stock.'</td>
                <td>'.$row->keterangan.'</td>
            </tr>
            ';
        }
        
        return $contents;
    }

    require_once('tcpdf/tcpdf.php');  
    $pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
    $pdf->SetCreator(PDF_CREATOR);  
    $pdf->SetTitle("Celana");  
    $pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
    $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
    $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
    $pdf->SetDefaultMonospacedFont('helvetica');  
    $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
    $pdf->SetMargins(PDF_MARGIN_LEFT, '10', PDF_MARGIN_RIGHT);  
    $pdf->setPrintHeader(false);  
    $pdf->setPrintFooter(false);  
    $pdf->SetAutoPageBreak(TRUE, 10);  
    $pdf->SetFont('helvetica', '', 11); 
    // Image example with resizing
    $pdf->AddPage();  
    


    $content = '';  
    $content .= '
        <h2 align="center">Celana</h2>
        <hr>
        <h4>Data Produk Celana</h4>
        <table border="1" cellspacing="0" cellpadding="3" class="table">  
           <tr>  
                <th width="5%">ID</th>
                <th width="20%">Nama</th>
                <th width="20%">Harga</th>
                <th width="10%">Stock</th>
                <th width="50%">Keterangan</th>
           </tr>  
      ';  
    $content .= generateRow();  
    $content .= '</table>';  
    $pdf->writeHTML($content);
    $txt = 'Karangan, 23-Mei-2018';
$pdf->Write(20, $txt, '', 0, 'R', true, 0, false, false, 0);  
$pdf->Image('../img/rega1.jpg', 155, 115, 40, 40, '', 'http://www.facebook/regaajiprayogo.com', '', true, 150, '', false, false, 0, false, false, false);
$txt = 'Rega Aji Prayogo.';
$pdf->Write(60, $txt, '', 0, 'R', true, 0, false, false, 0); 
    $pdf->Output('celana.pdf', 'I');
    

?>