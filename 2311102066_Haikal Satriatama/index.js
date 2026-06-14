const express = require('express');
const bodyParser = require('body-parser');
const cors = require('cors');
const fs = require('fs');
const path = require('path');

const app = express();
const PORT = 3000;
const dataFile = path.join(__dirname, 'data', 'mahasiswa.json');

app.set('view engine', 'ejs');
app.use(cors());
app.use(bodyParser.json());
app.use(bodyParser.urlencoded({ extended: true }));
app.use(express.static('public'));

// Helper to read data
const readData = () => {
    try {
        const rawData = fs.readFileSync(dataFile);
        return JSON.parse(rawData);
    } catch (error) {
        return { data: [] };
    }
};

// Helper to write data
const writeData = (data) => {
    fs.writeFileSync(dataFile, JSON.stringify(data, null, 4));
};

// Routes for Pages
app.get('/', (req, res) => {
    res.render('index', { title: 'Dashboard' });
});

app.get('/form', (req, res) => {
    res.render('form', { title: 'Form Tambah Mahasiswa' });
});

app.get('/data', (req, res) => {
    res.render('data', { title: 'Data Mahasiswa' });
});

// API Routes for CRUD
app.get('/api/mahasiswa', (req, res) => {
    const data = readData();
    res.json(data);
});

app.post('/api/mahasiswa', (req, res) => {
    const { nama, nim, program_studi } = req.body;
    const data = readData();

    const newId = data.data.length > 0 ? Math.max(...data.data.map(m => m.id)) + 1 : 1;
    const newMahasiswa = { id: newId, nama, nim, program_studi };

    data.data.push(newMahasiswa);
    writeData(data);

    res.status(201).json({ message: 'Data berhasil ditambahkan', data: newMahasiswa });
});

app.get('/api/mahasiswa/:id', (req, res) => {
    const { id } = req.params;
    const data = readData();
    const mahasiswa = data.data.find(m => m.id === parseInt(id));

    if (!mahasiswa) {
        return res.status(404).json({ message: 'Data tidak ditemukan' });
    }

    res.json(mahasiswa);
});

app.put('/api/mahasiswa/:id', (req, res) => {
    const { id } = req.params;
    const { nama, nim, program_studi } = req.body;
    const data = readData();

    const index = data.data.findIndex(m => m.id === parseInt(id));

    if (index === -1) {
        return res.status(404).json({ message: 'Data tidak ditemukan' });
    }

    data.data[index] = { ...data.data[index], nama, nim, program_studi };
    writeData(data);

    res.json({ message: 'Data berhasil diupdate', data: data.data[index] });
});

app.delete('/api/mahasiswa/:id', (req, res) => {
    const { id } = req.params;
    const data = readData();

    const index = data.data.findIndex(m => m.id === parseInt(id));

    if (index === -1) {
        return res.status(404).json({ message: 'Data tidak ditemukan' });
    }

    data.data.splice(index, 1);
    writeData(data);

    res.json({ message: 'Data berhasil dihapus' });
});

app.listen(PORT, () => {
    console.log(`Server running on http://localhost:${PORT}`);
});