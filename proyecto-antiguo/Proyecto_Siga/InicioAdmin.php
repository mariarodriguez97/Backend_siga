<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>sidebar</title>
</head>
<body>
    <div class="layout">
        <!-- Barra lateral -->
        <div class="barra-lateral">
            <div class="nombre-pagina">
                <ion-icon id="cloud" name="school-outline"></ion-icon>
                <span>Siga</span>
            </div>
            <nav class="navegacion">
                <ul>
                    <li>
                        <a href="?page=home">
                            <ion-icon name="home-outline"></ion-icon>
                            <span>Inicio</span>
                        </a>
                    </li>
                    <li>
                        <a href="?page=docentes">
                            <ion-icon name="id-card-outline"></ion-icon>
                            <span>Docentes</span>
                        </a>
                    </li>
                    <li>
                        <a href="?page=estudiantes">
                            <ion-icon name="person-circle-outline"></ion-icon>
                            <span>Estudiantes</span>
                        </a>
                    </li>
                    <li>
                        <a href="?page=acudientes">
                            <ion-icon name="people-circle-outline"></ion-icon>
                            <span>Acudientes</span>
                        </a>
                    </li>
                    <li>
                        <a href="?page=logout">
                            <ion-icon name="log-out-outline"></ion-icon>
                            <span>Salir</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>

        <!-- Contenido principal -->
        <div class="content">
            <?php
            // Incluir el archivo correspondiente según el parámetro 'page'
            if (isset($_GET['page'])) {
                $page = $_GET['page'];
                switch ($page) {
                    case 'home':
                        include 'includes/home.php';
                        break;
                    case 'docentes':
                        include 'includes/docentes.php';
                        break;
                    case 'acudientes':
                        include 'includes/acudientes.php';
                        break;
                    case 'estudiantes':
                        include 'includes/estudiantes.php';
                        break;    
                    case 'logout':
                        include 'includes/logout.php';
                        break;
                    default:
                        echo "<h1>Bienvenido al Sistema</h1>";
                }
            } else {
                echo "<h1>Bienvenido al Sistema</h1>"; // Página por defecto
            }
            ?>
        </div>
    </div>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="js/script.js"></script>
</body>
</html>
