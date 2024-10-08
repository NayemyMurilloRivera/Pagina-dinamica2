
<!DOCTYPE html>
<html lang="es">

<head>
    <title>Usuarios</title>
    <meta charset="UTF-8">
    <link rel="icon" type="image/x-icon" href="">
    <link href="style_login.css" rel="stylesheet">
    <style>
        .login-container {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            width: 300px;
            margin: 40px auto; 
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); 
        }

        .login-container h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        form {
            background-color: #f0f8ff; 
            color: #333; 
            padding: 20px;
            border-radius: 10px;
        }

        .login-container label {
            font-weight: bold;
            color: #555;
        }

        .login-container input[type="text"], 
        .login-container input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0 20px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            background-color: #f9f9f9;
        }

        .login-container button {
            background-color: #2461db;
            color: white;
            padding: 12px 20px;
            margin: 10px 0;
            border: none;
            cursor: pointer;
            width: 100%;
            border-radius: 5px;
            font-size: 16px;
        }

        .login-container button:hover {
            background-color: #2da3ed;
        }
    </style>
</head>

<body>
    <header>
    </header>

    <section>
        <div class="login-container">
            <form action="login.php" method="POST">
                <label for="email">Correo electrónico:</label>
                <input type="email" id="email" name="email" required>

                <label for="contraseña">Contraseña:</label>
                <input type="password" id="contraseña" name="contraseña" required>

                <button type="submit">Registrar</button>
            </form>
        </div>
    </section>
</body>

</html>