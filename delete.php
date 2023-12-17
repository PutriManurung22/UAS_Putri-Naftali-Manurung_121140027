<!-- Berfungsi sebagai alur dari fitur delete/hapus data -->
<?php
mysqli_query($dbconn," DELETE FROM data_mahasiswa WHERE id = '$_GET[id]'");
echo"<script>alert('hapus data berhasil'); document.location = '?page=tabel';</script>";
?>