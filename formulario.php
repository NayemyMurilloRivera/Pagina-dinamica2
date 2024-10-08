<?php
$host = '127.0.0.1:3305';
$user = 'root'; 
$password = ''; 
$dbname = 'dinamica'; 
$enlace = new mysqli($host, $user, $password, $dbname);
if ($enlace->connect_error) {
    die("Error de conexión: " . $enlace->connect_error);
}

if (isset($_POST['name']) && isset($_POST['ocupacion']) && isset($_POST['email']) &&
    isset($_POST['ingles']) && isset($_POST['habilidades']) && isset($_FILES['imagen']) &&
    isset($_POST['fecha_nacimiento']) && isset($_POST['nacionalidad']) && isset($_POST['lenguajes']) &&
    isset($_POST['perfil']) && isset($_POST['aptitudes']) && isset($_POST['español']) &&
    isset($_POST['ingles']) && isset($_POST['frances']) && isset($_POST['ubicacion']) &&
    isset($_POST['linke']) && isset($_POST['formacion']) && isset($_POST['experiencia'])) {
    
    if (isset($enlace)) {
        $nombre = mysqli_real_escape_string($enlace, $_POST['name']);
        $ocupacion = mysqli_real_escape_string($enlace, $_POST['ocupacion']);
        $email = mysqli_real_escape_string($enlace, $_POST['email']);
        $telefono = mysqli_real_escape_string($enlace, $_POST['telefono']);
        $ingles = mysqli_real_escape_string($enlace, $_POST['ingles']);
        if (is_array($_POST['habilidades'])) {
            $habilidades = implode(", ", $_POST['habilidades']);
            $habilidades = mysqli_real_escape_string($enlace, $habilidades);
        } else {
            $habilidades = mysqli_real_escape_string($enlace, $_POST['habilidades']);
        }
        
        $fecha_nacimiento = mysqli_real_escape_string($enlace, $_POST['fecha_nacimiento']);
        $nacionalidad = mysqli_real_escape_string($enlace, $_POST['nacionalidad']);
        
        if (is_array($_POST['lenguajes'])) {
            $lenguajes = implode(", ", $_POST['lenguajes']);
            $lenguajes = mysqli_real_escape_string($enlace, $lenguajes);
        } else {
            $lenguajes = mysqli_real_escape_string($enlace, $_POST['lenguajes']);
        }
        
        $perfil = mysqli_real_escape_string($enlace, $_POST['perfil']);
    
       
        if (is_array($_POST['aptitudes'])) {
            $aptitudes = implode(", ", $_POST['aptitudes']);
            $aptitudes = mysqli_real_escape_string($enlace, $aptitudes);
        } else {
            $aptitudes = mysqli_real_escape_string($enlace, $_POST['aptitudes']);
        }
        if (is_array($_POST['interes'])) {
            $interes = implode(", ", $_POST['interes']);
            $interes = mysqli_real_escape_string($enlace, $interes);
        } else {
            $interes = mysqli_real_escape_string($enlace, $_POST['interes']);
        }
    
        $español = mysqli_real_escape_string($enlace, $_POST['español']);
        $frances = mysqli_real_escape_string($enlace, $_POST['frances']);
        $ubicacion = mysqli_real_escape_string($enlace, $_POST['ubicacion']);
        $linke = mysqli_real_escape_string($enlace, $_POST['linke']);
        $formacion = mysqli_real_escape_string($enlace, $_POST['formacion']);
        $experiencia = mysqli_real_escape_string($enlace, $_POST['experiencia']);
    } else {
        die("Error: No se pudo establecer la conexión a la base de datos.");
    }
    $imagen = $_FILES['imagen'];
    $target_dir = $_SERVER['DOCUMENT_ROOT'] . '/PHP/imagenes/';
    
    if (!file_exists($target_dir)) {
         mkdir($target_dir, 0777, true); 
    }
    
    $patch = $target_dir . basename($imagen['name']);
    
    $allowed_types = ['image/jpeg', 'image/png', 'image/gif'];
    if (!in_array($imagen['type'], $allowed_types)) {
        echo "El archivo no es una imagen válida.";
        exit();
    }

  
    if (move_uploaded_file($imagen['tmp_name'], $patch)) {
        $image_url = '/PHP/imagenes/' . basename($imagen['name']);
    } else {
        echo "Error al subir la imagen.";
        exit();
    }

    $insertar = "INSERT INTO formulario (nombre, ocupacion, email, telefono, ingles, habilidades, imagen, fecha_nacimiento, nacionalidad, lenguajes, perfil, aptitudes, interes, español, frances, ubicacion, linke, formacion, experiencia) 
                 VALUES ('$nombre', '$ocupacion', '$email', '$telefono', '$ingles', '$habilidades', '$image_url', '$fecha_nacimiento', '$nacionalidad', '$lenguajes', '$perfil', '$aptitudes', '$interes', '$español', '$frances', '$ubicacion', '$linke', '$formacion', '$experiencia')";

    if (mysqli_query($enlace, $insertar)) {
        echo "Datos insertados correctamente.";
    } else {
        echo "Error al insertar datos: " . mysqli_error($enlace);
    }

} else {
    echo "Faltan datos. Por favor, complete el formulario.";
    exit();
}

if (!preg_match("/^[a-zA-Z-' ]*$/", $nombre)) {
    echo "Ingrese un nombre válido.";
    exit();
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Ingrese un correo electrónico válido.";
    exit();
}

if (!filter_var($telefono, FILTER_VALIDATE_INT)) {
    echo "Ingrese un número válido.";
    exit();
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>Creador de CV</title>
    <link rel="icon" type="image/x-icon" href="imgcv/cv.png">
    <link rel="stylesheet" href="style.css">
       
</head>

<body>
    <header>
        <div class="left-section">
            <img src="<?php echo htmlspecialchars($image_url); ?>" class="circular-image" alt="Foto de perfil">
        </div>
        <div class="right-section">
            <h2 style="font-family: Arial, sans-serif; font-weight: 10;"><?php echo htmlspecialchars($nombre); ?></h2>
            <h4 style="color: rgb(180, 180, 180); font-family: Arial, sans-serif; font-weight: 300;"><?php echo htmlspecialchars($ocupacion); ?></h4>
        </div>
    </header>

    <section style="color:rgb(0, 0, 0);">
        <nav>
            <h1>CONTACTO</h1>

            <p><img src="imgcv/telefono-sonando.png" class="imagencaracter" alt="Teléfono"> <?php echo htmlspecialchars($telefono); ?></p>
            <p><img src="imgcv/correo.png" class="imagencaracter" alt="Correo"><?php echo htmlspecialchars($email); ?></p>
            <p><img src="imgcv/pasador-de-ubicacion.png" class="imagencaracter" alt="Ubicación"> <?php echo htmlspecialchars($ubicacion);  ?></p>
            <p><img src="imgcv/logotipo-de-linkedin.png" class="imagencaracter" alt="Linkdlin"><?php echo htmlspecialchars($linke); ?></p>

            <h1>DETALLES</h1>
            <p>Fecha de nacimiento:<?php echo htmlspecialchars($fecha_nacimiento); ?></p>
            <p>Nacionalidad:<?php echo htmlspecialchars($nacionalidad); ?></p>


            <h1>IDIOMAS</h1>
            <p>Español:<?php echo htmlspecialchars($español); ?></p>
            <p>Inglés:<?php echo htmlspecialchars($ingles); ?></p>
            <p>Francés:<?php echo htmlspecialchars($frances); ?></p>

            <h1>PROGRAMACION</h1>
            <?php
                if (isset($_POST['lenguajes'])) {
                    $lenguajes = $_POST['lenguajes']; 
                } else {
                    $lenguajes = []; 
                }
                foreach ($lenguajes as $lenguaje) {
                    echo htmlspecialchars($lenguaje) . "<br>"; // Muestra cada lenguaje seleccionado
                }
            ?>
            <h1>APTITUDES</h1>

            <?php 
                if (isset($_POST['aptitudes'])) {
                    $aptitud = $_POST['aptitudes']; 
                    echo htmlspecialchars($aptitud);
                } else {
                    echo "No se han ingresado aptitudes.";
                }
            
            ?>

            <h1>HABILIDADES</h1>
            <?php 
                if (!empty($habilidades)) {
                    echo "<p>" . htmlspecialchars($habilidades) . "</p>";
                } else {
                    echo "<p>No se han seleccionado habilidades.</p>";
                }
            ?>

            <h1>OTROS INTERESES</h1>
            <?php 
                if (!empty($interes)) {
                    echo "<p>" . htmlspecialchars($interes) . "</p>";
                } else {
                    echo "<p>No se han seleccionado intereses.</p>";
                }
            ?>
        </nav>

        <article style="color:rgb(0, 0, 0);">
            <h1>PERFIL</h1>
            <p><?php echo htmlspecialchars($perfil); ?></p>

            <h1>EXPERIENCIA LABORAL</h1>

            <li><?php echo htmlspecialchars($experiencia); ?></li>
            
            <h1>FORMACIÓN</h1>
            <li><?php echo htmlspecialchars($formacion); ?></li>
            
        </article>
    </section>
</body>

</html>