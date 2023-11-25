<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            margin-top: 50px;
            max-width: 800px;
            padding: 20px;
            position: relative; /* Tambahkan ini untuk mengatur posisi relatif */
        }

        .card {
            width: 100%;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        .card-header {
            background-color: #f2f2f2;
            text-align: center;
            padding: 20px;
            border-bottom: 1px solid #dddddd;
            margin-top: 500px;
            position: relative; /* Tambahkan ini untuk mengatur posisi relatif */
        }

        .card-body {
            padding: 20px;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            text-align: center;
            text-transform: uppercase;
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            text-decoration: none;
            background-color: #007BFF;
            color: #fff;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .btn:hover {
            background-color: #0056b3;
        }

        .btn-home {
            position: absolute;
            top: 10px;
            left: 10px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="card shadow">
            <div class="card-header">
                <!-- Tombol HOME dengan kelas btn dan btn-home -->
                <h2>𝔸𝕣𝕥𝕁𝕠𝕘 || 𝕄𝕦𝕤𝕖𝕦𝕞 𝕕𝕚 𝕐𝕠𝕘𝕪𝕒𝕜𝕒𝕣𝕥𝕒</h2>
                <h5>Daftar Tabel Museum Seni di Yogyakarta</h5>
                <div class="btn-group btn-group">
                    <a href="wfsgeoserver1.html" class="btn btn-primary">WebGIS</a>
                    <a href="index.html" class="btn btn-primary">Edit</a>
                </div>
            </div>
            <div class="card-body">
                <?php
                // Sesuaikan dengan setting MySQL
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "mysql";
                // Create connection
                $conn = new mysqli($servername, $username, $password, $dbname);
                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
                $sql = "SELECT * FROM `pgweb-responsi`";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    echo "<table><tr>
                    <th>kabupaten</th>
                    <th>museum</th>
                    <th>alamat</th></tr>";
                    // output data of each row
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr><td>" . $row["kabupaten"] .
                            "</td><td>" . $row["museum"] .
                            "</td><td align='right'>" . $row["alamat"] .
                            "</td></tr>";
                    }
                    echo "</table>";
                } else {
                    echo "0 results";
                }
                $conn->close();
                ?>
            </div>
        </div>
    </div>
</body>

</html>
