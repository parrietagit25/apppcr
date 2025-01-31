<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#0d6efd">
    <title>Login - GrupoPCR</title>
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
        .login-btn {
            background-color: #003366;
            color: white;
            border-radius: 10px;
            padding: 10px;
            width: 100%;
        }
    </style>
</head>
<body>
<div class="login-container">
    <img src="images/logo/1.png" alt="" width="300">
    <form action="/app/controllers/AuthController.php" method="POST">
        <div class="form-group">
            <input type="text" name="code" placeholder="Código de Colaborador" class="form-control">
        </div>
        <div class="form-group">
            <input type="password" name="password" placeholder="Password" class="form-control">
        </div>
        <?php if (isset($error)): ?>
            <div class="alert alert-danger mt-2"><?php echo $error; ?></div>
        <?php endif; ?>
        <button type="submit" class="btn login-btn mt-3">Login</button>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
