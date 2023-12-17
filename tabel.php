<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
    /* CSS untuk daftar data mahasiswa */

    .sub_judul {
        text-align: center;
    }

    .tambah {
        display: block;
        width: 120px;
        margin: 20px auto;
        padding: 8px 15px;
        text-align: center;
        background-color: #eee;
        border: 1px solid #000;
        border-radius: 5px;
        transition: background-color 0.3s ease;
    }

    .tambah:hover {
        background-color: #ddd;
    }

    .form.data {
        margin-top: 30px;
        overflow-x: auto;
    }

    .daftar_data {
        width: 100%;
        border-collapse: collapse;
    }

    .daftar_data th,
    .daftar_data td {
        padding: 8px;
        border: 1px solid #ddd;
        text-align: left;
    }

    .daftar_data th {
        background-color: #f2f2f2;
    }

    .daftar_data tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    .btn {
        display: inline-block;
        padding: 5px 10px;
        margin-right: 5px;
        text-decoration: none;
        color: #fff;
        border-radius: 3px;
        transition: background-color 0.3s ease;
    }
    
    .btn_tbh,
        .btn_del {
            padding: 6px 12px; /* Sesuaikan ukuran padding untuk tombol Read dan Delete */
        }

        .btn {
        /* ... properti lainnya ... */
        background-color: #007bff; /* Ubah warna latar belakang untuk tombol Update */
    }

    .btn_tbh {
        background-color: #28a745; /* Ubah warna latar belakang untuk tombol Read */
    }

    .btn_del {
        background-color: #dc3545; /* Ubah warna latar belakang untuk tombol Delete */
    }

</style>
</head>
<body>
<!-- Berisi dari data yang ditampilkan ketika user berhasil tambah data -->
<h1 class="sub_judul">Daftar Data Mahasiswa</h1>
<button class=""><a class="tambah" href="?page=formulir" style="color: #000; text-decoration: none;"><p>+ Data Mahasiswa</p></a></button>

        <div class="form data">
            <table class="daftar_data" style="overflow-x:scroll" id="tabel">
                <tr>
                    <th>Nama</th>
                    <th>Program Studi</th>
                    <th>Angkatan</th>
                    <th>Jenis Kelamin</th>
                    <th>Action</th>
                </tr>
                <?php
                $daftar_tanggapan = mysqli_query($dbconn,"SELECT * FROM data_mahasiswa ORDER BY id ASC");
                while ($data = mysqli_fetch_array($daftar_tanggapan)) {         
                ?>
                <tr>
                    <td><?php echo $data['nama']; ?></td>
                    <td><?php echo $data['program_studi']; ?></td>
                    <td><?php echo $data['angkatan']; ?></td>
                    <td><?php echo $data['jenis_kelamin']; ?></td>
                    <td width="22%">
                        <a class="btn" href="?page=edit&&id=<?php echo $data['id']?>">Update</a>
                        <a class="btn_tbh" href="?page=read&&id=<?php echo $data['id']?>">Read</a>
                        <a class="btn_del" href="?page=delete&&id=<?php echo $data['id']?>">Delete</a>
                    </td>
                </tr>
                <?php
                }
                ?>
            </table>
        </div>