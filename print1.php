 <?php

$nama = $_POST['nama'];
$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];
$alamat = $_POST['alamat'];
$pos = $_POST['pos'];
$kota = $_POST['kota'];
$tlp = $_POST['tlp'];
$norek = $_POST['norek'];
$narek = $_POST['narek'];
$bayar = $_POST['bayar'];
$bank = $_POST['bank'];



    //koneksi terpusat
    include "config/functions.php";
    
    // get the HTML
    ob_start(); 
    
    
    $num = 'NINA00'.$_POST['pos'].' - ('.$_POST['tlp'].')';
    $nom = $_POST['pos'];
    $date = date("d M Y");
?>

<style type="text/css">
<!--
    div.zone { border: none; border-radius: 6mm; background: #FFFFFF; border-collapse: collapse; padding:3mm; font-size: 2.7mm;}
    h1 { padding: 0; margin: 0; color: #DD0000; font-size: 7mm; }
    h2 { padding: 0; margin: 0; color: #222222; font-size: 5mm; position: relative; }
-->
</style>
<page format="105x200" orientation="L" backcolor="#AAAACC" style="font: arial;">
    <div style="rotate: 90; position: absolute; width: 100mm; height: 4mm; left: 195mm; top: 0; font-style: italic; font-weight: normal; text-align: center; font-size: 2.5mm;">
        Harga penginapan bisa saja berubah sewaktu-waktu, dengan ketentuan tertentu.
    </div>
    <table style="width: 99%;border: none;" cellspacing="4mm" cellpadding="0">
        <tr>
            <td colspan="2" style="width: 100%">
                <div class="zone" style="height: 34mm;position: relative;font-size: 5mm;">
                    <div style="position: absolute; right: 3mm; top: 3mm; text-align: right; font-size: 4mm; ">
                        <b><?php echo $nom; ?></b><br>
                    </div>
                    <div style="position: absolute; right: 3mm; bottom: 3mm; text-align: right; font-size: 4mm; ">
                        Jenis Paket : <b><?php echo $_POST['nama']; ?></b><br>
                        
                        Code Booking : <b><?php echo $num; ?></b><br>
                        Jenis Bank : <b><?php echo $_POST['bank']; ?></b><br>
                    </div>
                    <img src="img/5.jpg" width="100" height="99" />
                    <span style="position: absolute; left: 32mm; top: 10mm; font-size: 28px; color: red">NINA tour and travel</span><br />
                    <span style="position: absolute; left: 32mm; top: 18mm; font-size: 16px;">Karangan, <?php echo $date; ?></span>
                    
                </div>
            </td>
        </tr>
        <tr>
            <td style="width: 25%;">
                <div class="zone" style="height: 40mm;vertical-align: middle;text-align: center;">
                    <qrcode value="<?php echo $num."\n".$nom."\n".$date; ?>" ec="Q" style="width: 37mm; border: none;" ></qrcode>
                </div>
            </td>
            <td style="width: 75%">
                <div class="zone" style="height: 40mm;vertical-align: middle; text-align: justify">
                    <b>Ketentuan :</b><br>
                    1. Perubahan Peket dan Penginapan silahkan hubungi contact person kami yang ada pada website, dan hanya bisa dilakukan 5 hari sebelum hari keberangkatan tour. Kurang dari itu perubahan tidak bisa dilakukan.<br>
                    2. Pembatalan booking dapat dilakukan 7 hari sebelum tanggal keberangkatan tour yang telah di booking. Biaya yang telah ditranfer akan dikembalikan dengan potongan 10% dari total biaya dan harus melakukan konfirmasi terlebih dahulu melalui contact person kami.<br>
                    3. Untuk biaya penginapan yang masih belum terbilang pada saat melakukan pembookingan, akan kami konfirmasikan ke Akun anda 7 hari sebelum hari keberangkatan tour. Dan dapat melakukan cetak tiket setelah hari itu.<br>
                    <?php echo abs((int)$_GET['total']); ?>
                </div>
            </td>
        </tr>
    </table>
</page>
<?php
     $content = ob_get_clean();

    // convert
    require_once('html2pdf/html2pdf.class.php');
    try
    {
        $html2pdf = new HTML2PDF('P', 'A4', 'fr', true, 'UTF-8', 0);
        $html2pdf->pdf->SetDisplayMode('fullpage');
        $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
        $html2pdf->Output('ticket00'.'-'.date('Y/m/d').'.pdf');
    }
    catch(HTML2PDF_exception $e) {
        echo $e;
        exit;
    }


?>