const express = require('express');
const bodyParser = require('body-parser');
const methodOverride = require('method-override');
const fs = require('fs');
const path = require('path');

const app = express();
const PORT = 3000;

app.set('view engine', 'ejs');
app.set('views', path.join(__dirname, 'views'));

app.use(bodyParser.urlencoded({ extended: true }));
app.use(bodyParser.json());
app.use(methodOverride('_method'));
app.use(express.static(path.join(__dirname, 'public')));

const dataPath = path.join(__dirname, 'data', 'students.json');

function readStudents() {
  const data = fs.readFileSync(dataPath, 'utf-8');
  return JSON.parse(data);
}

function writeStudents(data) {
  fs.writeFileSync(dataPath, JSON.stringify(data, null, 2));
}

app.get('/', (req, res) => {
  res.render('index', { title: 'Home' });
});

app.get('/students', (req, res) => {
  res.render('students', { title: 'Data Mahasiswa' });
});

app.get('/students/json', (req, res) => {
  const students = readStudents();
  res.json({ data: students });
});

app.get('/students/create', (req, res) => {
  res.render('create', { title: 'Tambah Mahasiswa' });
});

app.post('/students', (req, res) => {
  const students = readStudents();

  const newStudent = {
    id: students.length > 0 ? students[students.length - 1].id + 1 : 1,
    nim: req.body.nim,
    nama: req.body.nama,
    jurusan: req.body.jurusan,
    email: req.body.email
  };

  students.push(newStudent);
  writeStudents(students);

  res.redirect('/students');
});

app.get('/students/:id/edit', (req, res) => {
  const students = readStudents();
  const student = students.find(item => item.id == req.params.id);

  if (!student) {
    return res.status(404).send('Data tidak ditemukan');
  }

  res.render('edit', {
    title: 'Edit Mahasiswa',
    student
  });
});

app.put('/students/:id', (req, res) => {
  const students = readStudents();
  const index = students.findIndex(item => item.id == req.params.id);

  if (index === -1) {
    return res.status(404).send('Data tidak ditemukan');
  }

  students[index] = {
    id: students[index].id,
    nim: req.body.nim,
    nama: req.body.nama,
    jurusan: req.body.jurusan,
    email: req.body.email
  };

  writeStudents(students);
  res.redirect('/students');
});

app.delete('/students/:id', (req, res) => {
  const students = readStudents();
  const filteredStudents = students.filter(item => item.id != req.params.id);

  writeStudents(filteredStudents);
  res.redirect('/students');
});

app.listen(PORT, () => {
  console.log(`Server berjalan di http://localhost:${PORT}`);
});