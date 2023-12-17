<?php
if (isset($_POST['submit'])) {
    $nama= $_POST['nama'];
    $program_studi= $_POST['program_studi'];
    $angkatan= $_POST['angkatan'];
    $jenis_kelamin= $_POST['jenis_kelamin'];
    if($nama == "" || $program_studi == "" || $angkatan == "" || $jenis_kelamin == "") {
        echo"<script>alert('Lengkapi semua kolom yang ada');</script>";
    }else{
        mysqli_query($dbconn," INSERT INTO data_mahasiswa (nama, program_studi, angkatan, jenis_kelamin) VALUES ('$nama', '$program_studi', '$angkatan', '$jenis_kelamin')");
        echo"<script>alert('tambah data berhasil'); document.location = '?page=tabel';</script>";
    }
}
?>
<!-- Isi dari file formulir ini merupakan fitur tambah data yang mana field atau kolom yang diinputkan user sudah terhubung dengan kolom yang ada di database -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="logo.png" type="image/png">
    <title>Formulir Data Mahasiswa</title>
    <style>
        .form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 50%;
            margin: 50px auto;
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
            width: calc(100% - 12px); /* Perhitungan lebar input dengan pengurangan padding dan border */
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
    <h1>Formulir Data Mahasiswa</h1>
    <form method="post" enctype="multipart/form-data">
        <table class="pendaftaran">
            <tr>
                <td>
                    <label for="nama">Nama</label>
                </td>
                <td>
                    <input type="text" name="nama" id="nama" placeholder="Masukkan Nama" class="input" value="<?php echo isset($_POST['nama']) ? $_POST['nama'] : ''; ?>">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="program_studi">Program Studi</label>
                </td>
                <td>
                    <input type="text" name="program_studi" id="program_studi" placeholder="Masukkan Program Studi" class="input" value="<?php echo isset($_POST['program_studi']) ? $_POST['program_studi'] : ''; ?>">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="angkatan">Angkatan</label>
                </td>
                <td>
                    <input type="text" name="angkatan" id="angkatan" placeholder="Masukkan Angkatan" class="input" value="<?php echo isset($_POST['angkatan']) ? $_POST['angkatan'] : ''; ?>">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="jenis_kelamin">Jenis Kelamin</label>
                </td>
                <td>
                    <select name="jenis_kelamin" id="jenis_kelamin" class="input select">
                        <option value="" selected>Pilih</option>
                        <option value="laki-laki" <?php echo isset($_POST['jenis_kelamin']) && $_POST['jenis_kelamin'] == 'laki-laki' ? "selected" : ''; ?>>Laki-Laki</option>
                        <option value="perempuan" <?php echo isset($_POST['jenis_kelamin']) && $_POST['jenis_kelamin'] == 'perempuan' ? "selected" : ''; ?>>Perempuan</option>
                    </select>
                </td>
            </tr>
            <tr>
                <th colspan="2">
                    <div class="submit">
                        <input class="btn" type="submit" value="kirim" name="submit">
                    </div>
                </th>
            </tr>
        </table>
    </form>
</div>
</body>
</html>
