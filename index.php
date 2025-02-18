<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QR Code Generator</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <script>
        function generateQRCode() {
            let text = document.getElementById("text").value;
            let qrCodeImage = document.getElementById("qrCode");
            let downloadLink = document.getElementById("downloadLink");

            if (text.trim() !== "") {
                let qrSrc = "qrcode.php?text=" + encodeURIComponent(text);
                qrCodeImage.src = qrSrc;
                qrCodeImage.style.display = "block";

                downloadLink.href = qrSrc;
                downloadLink.style.display = "block"; // Menampilkan tombol save
            } else {
                qrCodeImage.style.display = "none";
                downloadLink.style.display = "none"; // Menyembunyikan tombol save jika kosong
            }
        }
    </script>

    <style>
        .container {
            max-width: 400px;
        }

        .input-box {
            width: 100%;
        }

        #qrCode {
            max-width: 300px;
            margin-top: 15px;
        }

        #downloadLink {
            margin-top: 10px;
            display: none;
        }
    </style>
</head>

<body class="d-flex flex-column align-items-center justify-content-center vh-100">
    <div class="container text-center">
        <h2 class="mb-3">QR Code Generator</h2>
        <input class="form-control input-box mb-3" type="text" id="text" oninput="generateQRCode()" placeholder="Masukkan teks atau link" required>

        <div class="d-flex justify-content-center">
            <img id="qrCode" class="img-fluid" style="display:none;" alt="QR Code akan muncul di sini">
        </div>

        <!-- Simpan QR Code -->
        <div class="d-flex justify-content-center">
            <a id="downloadLink" class="btn btn-primary mt-3" download="qrcode.png">Simpan QR Code</a>
        </div>
    </div>
</body>

</html>