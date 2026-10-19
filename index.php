<!DOCTYPE html>
<html>
<head>
    <title>Form Login - SPP Online</title>

    <!-- Import Google Font Inter -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        /* Mengatur font modern untuk seluruh elemen */
        * {
            font-family: 'Inter', system-ui, -apple-system, sans-serif;
            box-sizing: border-box;
        }

        body {
            background: #27cad6;
            margin: 0;
            padding-top: 50px;
        }

        h1 {
            color: #333;
            font-weight: 700;
            letter-spacing: 0.5px;
        }

        fieldset {
            margin: 0 auto;
            width: 340px;
            border: 2px solid white;
            background-color: white;
            border-radius: 30px;
            padding: 20px 20px 30px 20px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        }

        legend {
            background: white;
            border-radius: 50%;
            padding: 5px;
        }

        .login-title {
            text-align: center;
            font-weight: 700;
            font-size: 18px;
            color: #333;
            margin-bottom: 15px;
        }

        input {
            margin: 6px 0;
            padding: 12px;
            width: 100%;
            height: 45px;
            border: 1px solid #e0e0e0;
            border-radius: 10px;
            font-size: 14px;
            outline: none;
        }

        #input {
            background-color: #f0f2f5;
            color: #333;
        }

        #input:focus {
            border-color: #428df5;
            background-color: #fff;
        }

        #submit {
            color: white;
            background-color: #428df5;
            font-weight: 600;
            border: none;
            cursor: pointer;
            margin-top: 10px;
            transition: background 0.2s;
        }

        #submit:hover {
            background-color: #2b72dc;
        }

        .link-bayar {
            display: inline-block;
            margin-top: 15px;
            color: #428df5;
            text-decoration: none;
            font-weight: 600;
            font-size: 13px;
            letter-spacing: 0.5px;
        }

        .link-bayar:hover {
            text-decoration: underline;
        }

        .alert {
            background-color: #ffebe9;
            color: #d93025;
            padding: 10px;
            border-radius: 8px;
            font-size: 13px;
            text-align: center;
            margin-bottom: 10px;
            border: 1px solid #ffc1c0;
        }
    </style>
</head>

<body>

    <h1 align="center"><b>SPP /</b> ONLINE</h1>

    <form action="login_validasi.php" method="post">
        <fieldset>

        <?php
            if(isset($_GET['pesan'])) {
                if($_GET['pesan'] == "gagal") {
                    echo '<div class="alert">Username dan Password tidak sesuai !</div>';
                }
            }
        ?>

        <legend align="center">
            <img src="profile.png" width="75" height="75" alt="Profile">
        </legend>

        <div class="login-title">LOGIN</div>

        <table width="100%">
            <tr>
                <td>
                    <input name="username" type="text" placeholder="Username" id="input" required>
                </td>
            </tr>

            <tr>
                <td>
                    <input name="password" type="password" placeholder="Password" id="input" required>
                </td>
            </tr>

            <tr>
                <td>
                    <input name="login" type="submit" value="LOGIN" id="submit">
                </td>
            </tr>

            <tr>
                <td align="center">
                    <a href="bayar.php" class="link-bayar">CEK PEMBAYARAN</a>
                </td>
            </tr>
        </table>

        </fieldset>
    </form>

</body>
</html>