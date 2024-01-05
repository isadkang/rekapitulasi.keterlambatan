<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style>
    .header p {
        font-size: 20px;
        text-align: center;
    }

    .data p {
        margin-top: 50px;
        margin-left: 20px;
    }

    .data table {
        margin-top: 20px;
        margin-left: 20px;
        padding-right: 100px;
    }

    .data table td {
        padding-right: 50px
    }

    .description p {
        margin-top: 50px;
        margin-left: 20px;
        margin-right: 20px;
    }

    .description_2 p {
        margin-top: 50px;
        margin-left: 20px;
        margin-right: 20px;
    }

    .date p {
        float: right;
        margin-right: 75px;
    }

    .peserta p {
        margin-left: 75px;
        margin-top: 75px;
    }

    .orangtua p {
        float: right;
        margin-right: 50px;
        margin-top: -35px;
    }

    .tanda1 p {
        margin-top: 75px;
        margin-left: 20px;
    }

    .tanda2 p {
        float: right;
        margin-top: -30px;
        margin-right: 75px;
    }

    .pembimbing p {
        margin-left: 55px;
    }

    .kesiswaan p {
        float: right;
        margin-right: 120px;
        margin-top: -30px;
    }

    .tanda3 p {
        margin-top: 75px;
        margin-left: 60px;
    }

    .tanda4 p {
        float: right;
        margin-right: 75px;
        margin-top: -30px;
    }
</style>

<body>
    <div class="container">
        <div class="header">
            <p>Surat Pernyataan</p>
            <p>Tidak Akan Datang Terlambat Kesekolah</p>
        </div>
        <div class="data">
            <p>Yang bertanda tangan dibawah ini :</p>
            <table>
                <tr>
                    <td>NIS</td>
                    <td>:</td>
                    <td>{{ $data['nis'] }} </td>
                </tr>
                <tr>
                    <td>Nama</td>
                    <td>:</td>
                    <td>{{ $data['name'] }} </td>
                </tr>
                <tr>
                    <td>Rombel</td>
                    <td>:</td>
                    <td> {{ $data['rombel']['rombel'] }}</td>
                </tr>
                <tr>
                    <td>Rayon</td>
                    <td>:</td>
                    <td> {{ $data['rayon']['rayon'] }}</td>
                </tr>
            </table>
        </div>
        <div class="description">
            <p>Dengan ini menyatakan saya telah melakukan pelanggaran tata tertib sekolah,
                yaitu terlambat datang ke sekolah lebih dari <b>3 kali</b> yang mana hal tersebut
                termasuk
                kedalam pelanggaran kedisiplinan. Saya berjanji tidak akan terlambat datang ke sekolah
                lagi. Apabila saya terlambat datang ke sekolah lagi saya siap diberikan sanksi yang sesuai dengan
                peraturan sekolah.
            </p>
        </div>

        <div class="description_2">
            <p>Demikian surat pernyataan terlambat ini saya buat dengan penuh penyesalan.</p>
        </div>

        <div class="date">
            <p>Bogor, {{ date('d F Y') }} </p>
        </div>

        <div class="peserta">
            <p>Peserta Didik</p>
        </div>

        <div class="orangtua">
            <p>Orang Tua/Wali Peserta Didik</p>
        </div>

        <div class="tanda1">
            <p>({{ $data['name'] }})</p>
        </div>

        <div class="tanda2">
            <p>( .................................. )</p>
        </div>

        <div class="pembimbing">
            <p>Pembimbing Siswa</p>
        </div>

        <div class="kesiswaan">
            <p>Kesiswaan</p>
        </div>

        <div class="tanda3">
            <p>( {{ $rayon['rayon'] }} )</p>
        </div>

        <div class="tanda4">
            <p>( .................................. )</p>
        </div>
    </div>

</body>

</html>
