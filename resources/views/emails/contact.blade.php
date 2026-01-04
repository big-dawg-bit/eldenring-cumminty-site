<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Nieuw Contactbericht</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .header {
            background-color: #1f2937;
            color: white;
            padding: 15px;
            border-radius: 5px 5px 0 0;
            text-align: center;
        }
        .content {
            background-color: white;
            padding: 20px;
            border-radius: 0 0 5px 5px;
        }
        .field {
            margin-bottom: 15px;
        }
        .label {
            font-weight: bold;
            color: #1f2937;
        }
        .value {
            margin-top: 5px;
            padding: 10px;
            background-color: #f3f4f6;
            border-left: 3px solid #1f2937;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="header">
        <h2>Nieuw Contactbericht Ontvangen</h2>
    </div>
    <div class="content">
        <div class="field">
            <div class="label">Van:</div>
            <div class="value">{{ $name }}</div>
        </div>

        <div class="field">
            <div class="label">Email:</div>
            <div class="value">{{ $email }}</div>
        </div>

        <div class="field">
            <div class="label">Onderwerp:</div>
            <div class="value">{{ $subject }}</div>
        </div>

        <div class="field">
            <div class="label">Bericht:</div>
            <div class="value">{{ $messageContent }}</div>
        </div>

        <hr style="margin: 20px 0; border: none; border-top: 1px solid #ddd;">

        <p style="color: #666; font-size: 12px;">
            Dit bericht werd verzonden via het contactformulier op de website.
        </p>
    </div>
</div>
</body>
</html>
