<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Email Verification</title>
    <style media="all" type="text/css">
        body {
            font-family: Helvetica, sans-serif;
            -webkit-font-smoothing: antialiased;
            font-size: 16px;
            line-height: 1.6;
            -ms-text-size-adjust: 100%;
            -webkit-text-size-adjust: 100%;
            background-color: #f4f5f6;
            margin: 0;
            padding: 0;
            color: #9a9ea6 !important;
        }

        .container {
            margin: 0 auto !important;
            max-width: 600px;
            padding: 24px;
            background: #ffffff;
            border: 1px solid #eaebed;
            border-radius: 16px;
        }

        .content {
            padding: 0;
            margin: 0 auto;
        }

        .btn {
            text-align: center;
            margin-top: 24px;
        }

        .btn a {
            background-color: #0867ec;
            border: solid 2px #0867ec;
            border-radius: 4px;
            color: #ffffff;
            text-decoration: none;
            font-size: 14px;
            font-weight: bold;
            padding: 6px 12px;
            display: inline-block;
            text-transform: capitalize;
        }

        .footer {
            text-align: center;
            margin-top: 24px;
            color: #9a9ea6;
        }

        .footer a {
            color: #0867ec;
            text-decoration: none;
        }

        .footer a:hover {
            text-decoration: underline;
        }

        .copy-link {
            margin-top: 16px;
            text-align: center;
        }

        .copy-link input[type="text"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            margin-top: 8px;
            font-size: 16px;
        }

        .copy-link p {
            margin-top: 8px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="content">
            <p>To <?= $username; ?>,</p>
            <p>Click the button below to reset your password</p>
            <div class="btn">
                <a href="<?= $reset_url; ?>" target="_blank">Reset Password</a>
            </div>
            <div class="copy-link">
                <p>If the button above doesn't work, you can copy and paste the following link into your browser's address bar:</p>
                <p style="color:#0867ec; text-decoration:underline;"><?= $reset_url; ?></p>
            </div>
            <p>If you did not want to reset password for this account, you can safely ignore this email.</p>
        </div>
        <div class="footer">
            <p>Best Regards<br>
            <p>Automatic Message From Danyxdev<br>
        </div>
    </div>
</body>

</html>