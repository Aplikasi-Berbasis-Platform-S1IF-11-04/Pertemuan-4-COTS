const express = require('express');
const fs = require('fs');
const bodyParser = require('body-parser');
const cors = require('cors');

const app = express();
app.use(cors());
app.use(bodyParser.json());
app.use(express.static('public'));

const filePath = './data/mahasiswa.json';

// READ
app.get('/mahasiswa', (req, res) => {
    const data = JSON.parse(fs.readFileSync(filePath));
    res.json(data);
});

// CREATE
app.post('/mahasiswa', (req, res) => {
    const data = JSON.parse(fs.readFileSync(filePath));
    data.push(req.body);
    fs.writeFileSync(filePath, JSON.stringify(data, null, 2));
    res.json({ message: "Data ditambahkan" });
});

// DELETE
app.delete('/mahasiswa/:nim', (req, res) => {
    let data = JSON.parse(fs.readFileSync(filePath));
    data = data.filter(m => m.nim !== req.params.nim);
    fs.writeFileSync(filePath, JSON.stringify(data, null, 2));
    res.json({ message: "Data dihapus" });
});

// UPDATE
app.put('/mahasiswa/:nim', (req, res) => {
    let data = JSON.parse(fs.readFileSync(filePath));
    data = data.map(m => m.nim === req.params.nim ? req.body : m);
    fs.writeFileSync(filePath, JSON.stringify(data, null, 2));
    res.json({ message: "Data diupdate" });
});

app.listen(3000, () => {
    console.log("Server jalan di http://localhost:3000");
});