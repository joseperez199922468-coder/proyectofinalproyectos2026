<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Índice</title>
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            min-height: 100vh;
            margin: 0;
            display: grid;
            place-items: center;
            padding: 24px;
            color: #09265e;
            font-family: Arial, sans-serif;
        }

        main {
            width: min(720px, 100%);
            padding: 40px;
            text-align: center;
        }

        h1 {
            margin: 0 0 12px;
        }

        nav {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 16px;
            margin-top: 28px;
        }

        button {
            min-width: 180px;
            min-height: 52px;
            padding: 14px 20px;
            border: 0;
            border-radius: 8px;
            background: #061c5a;
            color: #fff;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
        }

        button:hover {
            background: #12377d;
        }

        .opcion {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 8px;
        }

        @media (max-width: 600px) {
            main {
                padding: 28px 20px;
            }

            nav {
                flex-direction: column;
            }

            button {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <main>
        <h1>Índice</h1>
        <p>Selecciona una opción para continuar:</p>
        <nav aria-label="Secciones principales">
            <div class="opcion">
                <button type="button">Usuarios</button>
                <span> <h6>Elaborado por: <br>
                    Jeferson Gabriel Siquiej Camey</h6>
                </span>
                
            </div>
            <div class="opcion">
                <button type="button" onclick="window.location.href='prestamos.php'">Préstamos</button>
                <span><h6>Elaborado por: <br>
                    Jose Enrique Perez Ramos</h6>
                </span>
            </div>
            <div class="opcion">
                <button type="button">Detalles de préstamos</button>
                <span><h6>Elaborado por: <br>
                    José Diego Martín Rodríguez</h6>
                </span>
            </div>
        </nav>
    </main>
</body>
</html>