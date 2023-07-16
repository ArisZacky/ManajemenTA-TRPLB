<?php
$path = './gambar/logo_pnb.png';
$type = pathinfo($path, PATHINFO_EXTENSION);
$data = file_get_contents($path);
$base64 = 'data:image' . $type . ';base64,' . base64_encode($data);
?>
<!DOCTYPE html>
<html>

<head>
    <title>Kop Surat</title>
    <style>
        /* CSS untuk mengatur tampilan kop surat */
        .kop-surat {
            width: 700px;
            margin: 0 auto;
            padding: 20px;
            border-bottom: 5px solid #000;
            padding: 2px;
        }

        .tengah{
            text-align: center;
            line-height: 5px;
        }

        .kop-surat h1 {
            font-size: 24px;
            margin-bottom: 25px;
        }

        .kop-surat p {
            margin: 0;
        }

        .kop-surat .alamat {
            font-weight: bold;
            margin-bottom: 15px;
        }

        .kop-surat .telepon {
            margin-bottom: 15px;
        }

        .kop-surat .link {
            margin-bottom: 15px;
        }
        .kop-surat .laman {
            margin-bottom: 10px;
            color: blue;
            text-decoration: underline;
        }
        .kop-surat .email {
            margin-bottom: 10px;
            color: blue;
            text-decoration: underline;
        }

        /* CSS untuk mengatur tampilan isi surat */
        .surat {
            margin-bottom: 20px;
        }

        .surat h2 {
            font-size: 18px;
            margin-bottom: 10px;
        }

        .surat p {
            margin-bottom: 5px;
        }

        .surat .jadwal{
            margin-left: auto;
            margin-right: auto;
            text-align: center;
            border: 2px solid;
            border-collapse: collapse;
            width: 100%;
        }
    </style>
</head>

<body>
    <div class="kop-surat">
        <table>
            <tr>
                <td><img src="<?php echo $base64 ?>" width="125px" alt=""></td>
                <td class="tengah">
                    <h1>KEMENTRIAN PENDIDIKAN DAN KEBUDAYAAN</h1>
                    <h1>POLITEKNIK NEGERI BALI</h1>
                    <p class="alamat">Jalan Kampus Bukit Jimbaran, Kuta Selatan, Kabupaten Badung, Bali - 80364</p>
                    <p class="telepon">Telp. (0361) 701981 (hunting) Fax. 701128</p>
                    <p class="link">Laman: <span class="laman">www.pnb.ac.id</span>  Email: <span class="email">poltek@pnb.ac.id</span></p>
                </td>
            </tr>
        </table>
    </div>

    <div class="surat">
        <h2>Nomor : 111/111/111/111</h2>
        <p>Hal: Jadwal Ujian Proposal</p>

        <p>Kepada,</p>
        <p><?php echo $output->namaMahasiswa ?></p>

        <p>Dengan hormat,</p>

        <p>Menginformasikan kepada Mahasiswa mengenai pelaksanaan Ujian Proposal 
            di Politeknik Negeri Bali diatur dan dilaksanakan sebagai berikut:
        </p>

        <p>
            1. Pelaksanaan Ujian Proposal Politeknik Negeri Bali dilaksanakan secara luring di area kampus Politeknik Negeri Bali.
        </p>
        <p>
            2. Pastikan Mahasiswa dapat menghadiri agenda Ujian Proposal dengan tepat waktu.
        </p>
        <p>
            3. Pelaksanaan Ujian Proposal diatur sesuai jadwal:
        </p>

        <table class = "jadwal">
            <tr>
                <th>Tanggal</th>
                <th>Pukul</th>
                <th>Ruangan</th>
            </tr>
            <tr>
                <td><?php echo date("d-m-Y", $stamp)?></td>
                <td><?php echo date("H:i", $stamp)?></td>
                <td><?php echo $output->ruangan?></td>
            </tr>
        </table>
        <p>
            4. Jika membutuhkan penjelasan dapat menghubungi:
        </p>
        <p>
            - Pak Rizky (08991529635)
        </p>
    </div>