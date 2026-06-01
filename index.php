<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f5f7fa;
            margin: 24px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: #fff;
            border-radius: 8px;
            overflow: hidden;
        }

        thead {
            background: #2f6fed;
            color: #fff;
        }

        th,
        td {
            padding: 12px 14px;
            border: 1px solid #e2e8f0;
            text-align: left;
        }

        tbody tr:nth-child(even) {
            background: #f8fafc;
        }

        tbody tr:hover {
            background: #eef4ff;
        }

        a {
            color: #2f6fed;
            text-decoration: none;
            font-weight: 600;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
    <title>Halaman Utama</title>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>KODE BARANG</th>
                <th>NAMA BARANG</th>
                <th>STOK BARANG</th>
                <th>HARGA BARANG</th>
                <th>ACTION</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>KB-001</td>
                <td>Logitech Mouse G102</td>
                <td>20</td>
                <td>25.000</td>
                <td>
                    <a href="#">Edit</a> |
                    <a href="#">Delete</a>
                </td>
            </tr>
        </tbody>
    </table>
</body>
</html>
