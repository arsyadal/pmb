<!-- resources/views/mahasiswa/pdf.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h1>Data Mahasiswa</h1>
    <table>
        <tr>
            <th>ID</th>
            <td>{{ $mahasiswa->id }}</td>
        </tr>
        <tr>
            <th>User Name</th>
            <td>{{ $mahasiswa->user->name }}</td>
        </tr>
        <tr>
            <th>Alamat Saat Ini</th>
            <td>{{ $mahasiswa->alamat_saat_ini }}</td>
        </tr>
        <tr>
            <th>Kabupaten</th>
            <td>{{ $mahasiswa->kabupaten }}</td>
        </tr>
        <tr>
            <th>Provinsi</th>
            <td>{{ $mahasiswa->provinsi }}</td>
        </tr>
        <tr>
            <th>Nomor Telepon</th>
            <td>{{ $mahasiswa->nomor_telepon }}</td>
        </tr>
        <tr>
            <th>Nomor HP</th>
            <td>{{ $mahasiswa->nomor_hp }}</td>
        </tr>
        <tr>
            <th>Kewarganegaraan</th>
            <td>{{ $mahasiswa->kewarganegaraan }}</td>
        </tr>
        <tr>
            <th>Tanggal Lahir</th>
            <td>{{ $mahasiswa->tanggal_lahir }}</td>
        </tr>
        <tr>
            <th>Tempat Lahir</th>
            <td>{{ $mahasiswa->tempat_lahir }}</td>
        </tr>
        <tr>
            <th>Jenis Kelamin</th>
            <td>{{ $mahasiswa->jenis_kelamin }}</td>
        </tr>
        <tr>
            <th>Status Menikah</th>
            <td>{{ $mahasiswa->status_menikah }}</td>
        </tr>
        <tr>
            <th>Agama</th>
            <td>{{ $mahasiswa->agama }}</td>
        </tr>
    </table>
</body>
</html>