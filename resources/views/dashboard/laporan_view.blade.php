<html>
<head>
<title>Laporan Absensi</title>
</head>
<body style="font-family: Times, Times New Roman, Georgia, serif;">

<style type="text/css">
hr.style-one {
border-color: black;border-width: 1px 0 0 0;
}
hr.style-three {
    border: 0;
    border-bottom: 1px dashed #000;
    background: #999;
}
@media  hr.style-one {
border-color: black;border-width: 2px 0 0 0;
}
hr.style-three {
    border: 0;
    border-bottom: 1px dashed #000;
    background: #999;
}
@media print{
   .noprint{
       display:none;
   }
}
@media  .button {
  background-color: #4CAF50;
  border: none;
  color: white;
  padding: 10px 14px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 12px;
  margin: 4px 2px;
  cursor: pointer;
}
</style>
<body style="font-family: Verdana, Geneva, sans-serif;">
<table border="0" cellpadding="0" cellspacing="0" style="width:650px;margin-left: auto;margin-right: auto; font-size:12px;" class="noprint">
		<tr>
			<td style="text-align: center;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button onclick="window.print()"class="button">Cetak</button></td>
		</tr>
		<tr>
			<td style="text-align: center;">&nbsp;</td>
		</tr>
	</tbody>
</table>
<table border="0" cellpadding="0" cellspacing="0" style="width:1300px;margin-left: auto;margin-right: auto; font-size:12px;">
	<tbody>
		<tr align="center">
			<td rowspan="5" align="center" style="width:10%"><img src="" alt="" width="80" height="90"></td>
			<td style="text-align: center;font-size:14pt;width: 140mm;color:#00468e; width:85%"><strong> Laporan Kehadiran (SIRIAN) </strong></td>
		</tr>
		<tr>
			<td style="text-align: center;font-size:12pt;color:#00468e;width:85%"><strong>Cv. Karya Bersama</strong></td>
		</tr>
		<tr>
			<td style="text-align: center;font-size:9pt;width:85%"><strong>Jalan Thamring no 5 Malang</strong></td>
		</tr>
		<tr>
			<td style="text-align: center;font-size:9pt;width:85%">Telp : (0351)  465095, 081 335 125 111</td>
		</tr>
		<tr>
			<td style="text-align: center;font-size:9pt;width:85%"><strong>  </strong></td>
		</tr>
	</tbody>
</table>
<table border="0" cellpadding="0" cellspacing="0" style="width:1300px;margin-left: auto;margin-right: auto; font-size:12px;">
		<tr>
			<td style="text-align: center;"><hr class="style-one"></td>
		</tr>
	</tbody>
</table>
<table border="1" cellpadding="0" cellspacing="0" style="width:1300px;margin-left: auto;margin-right: auto; font-size:12px;">
	<tbody>
		<tr>
			<td style="text-align: center;background-color: #349467; color: #FFF;">No</td>
			<td style="text-align: center;background-color: #349467; color: #FFF;">Nama Pegawai</td>
			<td style="text-align: center;background-color: #349467; color: #FFF;">Masuk</td>
			<td style="text-align: center;background-color: #349467; color: #FFF;">Terlambat</td>
			<td style="text-align: center;background-color: #349467; color: #FFF;">Gaji Kotor</td>
			<td style="text-align: center;background-color: #349467; color: #FFF;">Potongan</td>
			<td style="text-align: center;background-color: #349467; color: #FFF;">Gaji Bersih</td>
		</tr>
        @foreach($results as $pegawai)
            <tr>
                <td style="text-align: left">{{ $loop->iteration }}</td>
                <td style="text-align: left">{{ $pegawai->namapegawai }}</td>
                <td style="text-align: center">{{ $pegawai->masuk }}</td>
                <td style="text-align: center">{{ $pegawai->terlambat }}</td>
                <td style="text-align: center">{{ $pegawai->gaji }}</td>
                <td style="text-align: center">{{ $pegawai->terlambat * 10000 }}</td>
                <td style="text-align: center">{{ $pegawai->gaji -  ($pegawai->terlambat * 10000)}}</td>
            </tr>
        @endforeach
	</tbody>
</table>
<p>&nbsp;</p>
</body>
</html>
