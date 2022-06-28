<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Cetak Pembelian </title>
    <style>
        .table {
          font-family: Arial, Helvetica, sans-serif;
          border-collapse: collapse;
          width: 100%;
        }
        
        .table td, .table th {
          border: 1px solid #ddd;
          padding: 8px;
        }
        
        .table tr:nth-child(even){background-color: #f2f2f2;}
        
        .table tr:hover {background-color: #ddd;}
        
        .table th {
          padding-top: 12px;
          padding-bottom: 12px;
          text-align: left;
          background-color: #04AA6D;
          color: white;
        }
        </style>
</head>
<body>
    <div class="container">
        <h1>Data Pembelian Megatronik</h1>
        <div class="row">
            <div class="col-md-12">                               
                <table class="table">
                    <thead>
                        <tr>
                            <th> Nama karyawan </th>
                            <th> Nama Supplier </th>
                            <th> Tanggal </th>
                            <th> Jumlah </th>
                            <th> Total </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pembelian as $pb)
                            <tr>
                                <td> {{ $pb->nama_karyawan}} </td>
                                <td> {{ $pb->nama_supplier}} </td>
                                <td> {{ $pb->tanggal}} </td>
                                <td> {{ $pb->jumlah}} </td>
                                <td> {{ $pb->status == "diambil" ? "Diambil di Toko" : "Diantar ke Rumah"}} </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>