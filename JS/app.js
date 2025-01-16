const express = require('express');
const mysql = require('mysql2');
const app = express();

// Configura EJS como motor de plantillas
app.set('view engine', 'ejs');
app.use(express.static('public')); // Para archivos estáticos (CSS, JS, etc.)

// Conexión a la base de datos MySQL
const db = mysql.createConnection({
    host: process.env.DB_HOST,
    user: process.env.DB_USER,
    password: process.env.DB_PASSWORD,
    database: process.env.DB_NAME
});

// Conectar a MySQL
db.connect((err) => {
    if (err) {
        console.error('Error conectando a la base de datos:', err.message);
        return;
    }
    console.log('Conectado a la base de datos MySQL');
});

// Ruta principal que recupera datos
app.get('/', (req, res) => {
    // Consultas para las tablas
    const queryHome = 'SELECT * FROM HOME';
    const queryTshirt = 'SELECT * FROM TSHIRTS';
    const queryHoddies = 'SELECT * FROM HODDIES';
    const querySweaters = 'SELECT * FROM SWEATERS';
    const queryOtherImg = 'SELECT * FROM OTHER_IMAGES';

    // Ejecutar todas las consultas en paralelo
    db.query(queryHome, (errHome, resultsHome) => {
        if (errHome) {
            console.error('Error al obtener datos de HOME:', errHome.message);
            res.status(500).send('Error al obtener datos de HOME');
            return;
        }

        db.query(queryTshirt, (errTshirt, resultsTshirt) => {
            if (errTshirt) {
                console.error('Error al obtener datos de TSHIRT:', errTshirt.message);
                res.status(500).send('Error al obtener datos de TSHIRT');
                return;
            }

            db.query(queryHoddies, (errHoddies, resultsHoddies) => {
                if (errHoddies) {
                    console.error('Error al obtener datos de HODDIES:', errHoddies.message);
                    res.status(500).send('Error al obtener datos de HODDIES');
                    return;
                }

                db.query(querySweaters, (errSweaters, resultsSweaters) => {
                    if (errSweaters) {
                        console.error('Error al obtener datos de SWEATERS:', errSweaters.message);
                        res.status(500).send('Error al obtener datos de SWEATERS');
                        return;
                    }

                    db.query(queryOtherImg, (errOtherImg, resultsOtherImg) => {
                        if (errOtherImg) {
                            console.error('Error al obtener datos de SWEATERS:', errOtherImg.message);
                            res.status(500).send('Error al obtener datos de SWEATERS');
                            return;
                        }

                    // Una vez que todas las consultas hayan finalizado, pasar los resultados a la vista
                    res.render('index', {
                        home: resultsHome,
                        tshirt: resultsTshirt,
                        hoddies: resultsHoddies,
                        sweaters: resultsSweaters,
                        otherimgages: resultsOtherImg
                        });
                    });
                });
            });
        });
    });
});

// Inicia el servidor
const PORT = 3000;
app.listen(PORT, () => {
    console.log(`Servidor corriendo en http://localhost:${PORT}`);
});
