<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Vérification d'email</title>
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', sans-serif;
            color: #344767;
            margin: 0;
            padding: 0;
        }
        .wrapper {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .container {
            background: white;
            max-width: 600px;
            width: 100%;
            border-radius: 16px;
            padding: 30px 40px;
            box-shadow: 0 12px 20px rgba(0, 0, 0, 0.08);
            text-align: center;
        }
        h2 {
            margin-top: 0;
            color: #2d3748;
        }
        p {
            font-size: 16px;
            line-height: 1.6;
            text-align: center;
        }
        .btn {
            display: inline-block;
            margin-top: 25px;
            padding: 12px 24px;
            background: linear-gradient(90deg, #5e72e4, #825ee4);
            color: white;
            text-decoration: none;
            font-weight: 600;
            border-radius: 12px;
            box-shadow: 0 4px 14px rgba(94, 114, 228, 0.5);
            transition: background 0.3s ease;
        }
        .btn:hover {
            background: linear-gradient(90deg, #4353e0, #6e46e0);
        }
        .footer {
            margin-top: 40px;
            font-size: 13px;
            color: #8898aa;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container">
    <h2>Hello {{ $name }},</h2>
    <p>
        Thank you for signing up on our platform. To activate your account,
        please click the button below to verify your email address.
    </p>
    <a href="{{ $verificationUrl }}" class="btn">✅ Verify My Account</a>
    <p style="margin-top: 30px;">If you did not create an account, you can safely ignore this email.</p>
    <div class="footer">
        © {{ date('Y') }} SmartOrderAI. All rights reserved.
    </div>
</div>
    </div>
</body>
</html>