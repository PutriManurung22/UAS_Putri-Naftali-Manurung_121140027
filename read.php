<!-- Merupakan salah satu fitur dari CRUD yang mana berfungsi untuk membaca data (read) -->
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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        /* CSS untuk formulir baca data */

        .form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
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

        .input, select {
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

        /* Gaya untuk elemen yang dinonaktifkan */
        .input[disabled], select[disabled] {
            background-color: #f0f0f0;
            cursor: not-allowed;
        }
    </style>
</head>
<body>
    <div class="form">
        <h1>Edit Jenis Kelamin</h1>
        <form method="post" enctype="multipart/form-data">
            <table class="pendaftaran">
                <tr>
                    <td>
                        <label for="nama">Nama</label>
                    </td>
                    <td class="in">
                        <input type="text" name="nama" id="nama" required placeholder="Masukkan Nama" class="input" value="<?php echo $data['nama'] ?>" disabled>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="program_studi">Program Studi</label>
                    </td>
                    <td>
                        <input type="text" name="program_studi" id="program_studi" required placeholder="Masukkan Program Studi" class="input" value="<?php echo $data['program_studi'] ?>" disabled>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="angkatan">Angkatan</label>
                    </td>
                    <td>
                        <input type="text" name="angkatan" id="angkatan" required placeholder="Masukkan Angkatan" class="input" value="<?php echo $data['angkatan'] ?>" disabled>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="jenis_kelamin">Jenis Kelamin</label>
                    </td>
                    <td>
                        <select name="jenis_kelamin" id="jenis_kelamin" required  class="input select" disabled>
                            <option value="" selected>Pilih</option>
                            <option value="laki-laki" <?php if ($data['jenis_kelamin'] == 'laki-laki') echo "selected" ?>>Laki-Laki</option>
                            <option value="perempuan" <?php if ($data['jenis_kelamin'] == 'perempuan') echo "selected" ?>>Perempuan</option>
                        </select>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>
