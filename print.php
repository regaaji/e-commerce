<?php
session_start();
session_destroy();

$conn = mysqli_connect("localhost", "root", "", "gayadistro");


include "cart.php";


if (isset($_POST["finish"])) {
 
      $nama = $_POST["nama"];
      $username = $_POST["username"];
      $password = $_POST["password"];
      $email = $_POST["email"];
      $alamat = $_POST["alamat"];
      $pos = $_POST["pos"];
      $kota = $_POST["kota"];
      $tlp = $_POST["tlp"];
      $norek = $_POST["norek"];
      $narek = $_POST["narek"];
      $bayar = $_POST["bayar"];
      $bank = $_POST["bank"];
      

      // query insert data
      $query = "INSERT INTO tb_hasil
                VALUES 
                ('', '$nama', '$username', '$password', '$email', '$alamat', '$pos', '$kota', '$tlp', '$norek', '$narek', '$bayar', '$bank')
                ";
      mysqli_query($conn, $query);

}

if(isset($_POST['finish'])){
    

    
    
    // get the HTML
    ob_start(); 
    
    
    
    $num = 'GayaDistro'.$_POST['pos'].' - ('.$_POST['nama'].')';
    $nom = $_POST['kota'];
    $date = date("d M Y");
?>
<style type="text/css">
<!--
    div.zone { border: none; border-radius: 6mm; background: #FFFFFF; border-collapse: collapse; padding:3mm; font-size: 4mm;}
    h1 { padding: 0; margin: 0; color: #DD0000; font-size: 7mm; }
    h2 { padding: 0; margin: 0; color: #222222; font-size: 5mm; position: relative; }
-->
</style>
<page format="105x200" orientation="L" backcolor="#AAAACC" style="font: arial;">
    <div style="rotate: 90; position: absolute; width: 100mm; height: 4mm; left: 195mm; top: 0; font-style: italic; font-weight: normal; text-align: center; font-size: 2.5mm;">
        Harga pembayaran bisa saja berubah sewaktu-waktu, dengan ketentuan tertentu.
    </div>
    <table style="width: 99%;border: none;" cellspacing="4mm" cellpadding="0">
        <tr>
            <td colspan="2" style="width: 100%">
                <div class="zone" style="height: 34mm;position: relative;font-size: 5mm;">
                    <div style="position: absolute; right: 3mm; top: 3mm; text-align: right; font-size: 4mm; ">
                        <b><?php echo $_POST['pos']; ?></b><br>
                    </div>
                    <div style="position: absolute; right: 3mm; bottom: 3mm; text-align: right; font-size: 4mm; ">
                        Username : <b><?php echo $_POST['username']; ?></b><br>
                        
                        Code Booking : <b><?php echo $num; ?></b><br>
                        Dikirim ke : <b><?php echo $_POST['kota']; ?></b><br>
                    </div>
                    <img src="img/icon.png" width="100" height="99" />
                    <span style="position: absolute; left: 32mm; top: 10mm; font-size: 28px; color: red">GayaDistro Shop</span><br />
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
                    <b>Detail Pembeli :</b><br>
                    Nama Pembeli : <?= $_POST['nama']; ?><br>
                    Email : <?= $_POST['email']; ?>
                    <br>
                    <b>Detail Pembayaran :</b><br>
                    No. Rekening : <?= $_POST['norek']; ?><br>
                    Melalui Bank : <?= $_POST['bank']; ?>
                    <br>
                    <b>Total Pembayaran</b><br>
                    <?php echo $_POST['bayar']; ?>
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
        $html2pdf->Output('Bukti00'.'-'.date('Y/m/d').'.pdf');
    }
    catch(HTML2PDF_exception $e) {
        echo $e;
        exit;
    }

}
?>
