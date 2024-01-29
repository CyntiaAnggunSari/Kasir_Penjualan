<center>
  <h2>Tampil Data SPPD</h2>
  <hr>
  <table border="1">
    <tr>
      <td>Kode Baju</td>
      <td>Jenis</td>
      <td>Harga</td>
      <td>Jumlah</td>
      <td>Total</td>
    </tr>
    <?php
    foreach ($sppdok as $data):
    ?>
    <tr>
      <td><?= $data['kodebaju']?></td>
      <td><?= $data['jenisbaju']?></td>
      <td><?= $data['hargabaju']?></td>
      <td><?= $data['jumlahbaju']?></td>
      <td><?= $data['totalbaju']?></td>
      
    </tr>
<?php
endforeach;
?>
  </table>
</center>