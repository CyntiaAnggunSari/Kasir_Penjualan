<form action="/quiz/simpan"  name="form" method="post">
<table>
  <tr>
    <td>Kode Baju</td>
    <td><select name="kode" id="" onchange="a()">
          <option value="">Pilih</option>
          <option value="b001">B001</option>
          <option value="b002">B002</option>
          <option value="b003">B003</option>
  </select>
 </td>
  </tr>

  <tr>
    <td> Jenis Baju</td>
    <td><input type="text" name="jenis"></td>
  </tr>

  <tr>
    <td>Harga </td>
    <td><input type="text" name="harga" onkeyup="b()"></td>
  </tr>

  <tr>
    <td>Jumlah</td>
    <td><input type="text" name="jumlah" onkeyup="b()"> </td>
  </tr>


  <tr>
    <td>Total</td>
    <td><input type="text" name="total" onkeyup="b()"> </td>
  </tr>

  <tr>
    <td><input type="submit" name="simpan"></td>
  </tr>

  <script>
    function a() {
      var kode = document.form.kode.value;
      var jenis = document.form.jenis.value;

      if(kode =='b001') {
        document.form.jenis.value = "Koko"
      } else if (kode =='b002' ) {
        document.form.jenis.value = "Gaun"
      }else {
        document.form.jenis.value = "Kaos"
    }
  }

  function b() {
    var harga = document.form.harga.value;
    var jumlah = document.form.jumlah.value;
    document.form.total.value = parseInt(harga) * parseInt(jumlah);
  }
  </script>
</table>