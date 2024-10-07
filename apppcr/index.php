<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#0d6efd">
    <title>Login - GrupoPCR</title>
    <!-- Bootstrap CSS desde CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f0f4f8;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .login-container {
            background-color: #fff;
            border-radius: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            text-align: center;
            width: 100%;
            max-width: 400px;
        }

        .logo-container img {
            max-width: 100%;
            height: auto;
        }

        .form-group input {
            background-color: #f1f1f1;
            border: none;
            padding: 10px;
            border-radius: 10px;
            width: 100%;
            margin-bottom: 10px;
        }

        .login-btn {
            background-color: #003366;
            color: white;
            border-radius: 10px;
            padding: 10px;
            width: 100%;
        }

        .login-btn:hover {
            background-color: #002244;
        }

        .text-small {
            font-size: 0.8rem;
        }

        .brand-logos img {
            margin: 10px;
            max-width: 60px;
        }
    </style>
</head>
<body>

<div class="login-container">
    <div class="logo-container">
        <h1>GrupoPCR</h1>
        <div class="brand-logos">
            <img src="https://via.placeholder.com/80x40?text=Panarenting" alt="Panarenting">
            <img src="https://via.placeholder.com/80x40?text=dollar" alt="Dollar Rent a Car">
            <img src="https://via.placeholder.com/80x40?text=Automarket" alt="Automarket">
            <img src="https://via.placeholder.com/80x40?text=AutoService" alt="AutoService">
        </div>
    </div>
    
    <form action="login.php" method="POST">
        <div class="form-group">
            <input type="email" name="email" placeholder="Email" required>
        </div>
        <div class="form-group">
            <input type="password" name="password" placeholder="Password" required>
        </div>
        <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" id="rememberMe">
            <label class="form-check-label text-small" for="rememberMe">Remember Me</label>
            <a href="#" class="float-end text-small">Forgot Password?</a>
        </div>
        <button type="submit" class="btn login-btn">Login</button>
    </form>

    <p class="mt-3 text-small">Don't have an account? <a href="#">Create an account</a></p>
</div>

<!-- Bootstrap JS desde CDN -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

