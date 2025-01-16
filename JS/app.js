require('dotenv').config();
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
    const query = 'SELECT * FROM HOME'; // Cambia HOME por el nombre de tu tabla
    db.query(query, (err, results) => {
        if (err) {
            console.error('Error al ejecutar la consulta:', err.message);
            res.status(500).send('Error al obtener los datos');
            return;
        }
        // Renderiza la vista ejs con los datos de la base
        res.render('index', { productos: results });
    });
});

// Inicia el servidor
const PORT = 3000;
app.listen(PORT, () => {
    console.log(`Servidor corriendo en http://localhost:${PORT}`);
});