<!-- Berfungsi sebagai alur dari fitur delete/hapus data -->
<?php
$id = $_GET['id'];
$data_mahasiswa = mysqli_query($dbconn," SELECT * FROM data_mahasiswa WHERE id = '$id'");
$data = mysqli_fetch_array($data_mahasiswa);
if (isset($_POST['program_studi'])) {
    echo $_POST['program_studi'];
    $nama= $_POST['nama'];
    $program_studi= $_POST['program_studi'];
    $angkatan= $_POST['angkatan'];
    $jenis_kelamin= $_POST['jenis_kelamin'];

    $tambah = mysqli_query($dbconn," UPDATE data_mahasiswa set nama='$nama', program_studi='$program_studi', angkatan='$angkatan', jenis_kelamin='$jenis_kelamin'");
    echo"<script>alert('tambah data berhasil'); document.location = '?page=tabel';</script>";
}
?>
<!-- Kode diatas berfungsi untuk menghubungan dengan server database dimana ketika sudah didapatkan id dari data, maka fitur edit dapat berjalan -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        /* CSS untuk form edit data mahasiswa */

        .form {
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 400px;
            margin: 20px auto;
        }

        .form h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        .pendaftaran {
            width: 100%;
        }

        .pendaftaran tr {
            margin-bottom: 15px;
        }

        .pendaftaran .label {
            text-align: right;
            padding-right: 10px;
            font-weight: bold;
        }

        .pendaftaran .in {
            padding-left: 10px;
        }

        .input {
            width: calc(100% - 30px);
            padding: 8px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        .submit {
            text-align: center;
            margin-top: 20px;
        }

        .btn {
            padding: 10px 20px;
            background-color: #333;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn:hover {
            background-color: #555;
        }
    </style>
</head>
<body>
    <div class="form">
        <h1>Edit Data Mahasiswa</h1>
        <form method="post" enctype="multipart/form-data">
            <table class="pendaftaran">
                <tr>
                    <td>
                        <label for="nama">Nama</label>
                    </td>
                    <td class="in">
                        <input type="text" name="nama" id="nama" required placeholder="Masukkan Nama" class="input" value="<?php echo $data['nama'] ?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="program_studi">Program Studi</label>
                    </td>
                    <td>
                        <input type="text" name="program_studi" id="program_studi" required placeholder="Masukkan Program Studi" class="input" value="<?php echo $data['program_studi'] ?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="angkatan">Angkatan</label>
                    </td>
                    <td>
                        <input type="text" name="angkatan" id="angkatan" required placeholder="Masukkan Angkatan" class="input" value="<?php echo $data['angkatan'] ?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="jenis_kelamin">Jenis Kelamin</label>
                    </td>
                    <td>
                        <select name="jenis_kelamin" id="jenis_kelamin" required  class="input select">
                            <option value="" selected>Pilih</option>
                            <option value="laki-laki" <?php if ($data['jenis_kelamin'] == 'laki-laki') echo "selected" ?>>Laki-Laki</option>
                            <option value="perempuan" <?php if ($data['jenis_kelamin'] == 'perempuan') echo "selected" ?>>Perempuan</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th colspan="2">
                        <div class="submit">
                            <input class="btn" type="submit" value="kirim">
                        </div>
                    </th>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>
