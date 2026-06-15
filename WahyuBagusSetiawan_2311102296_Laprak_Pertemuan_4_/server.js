const express = require("express");
const path = require("path");

const app = express();
const port = 3000;

app.use(express.json());
app.use(express.urlencoded({ extended: true }));

app.use(express.static(path.join(__dirname, "public")));

let tasks = [];

// GET ALL TASK
app.get("/api/tasks", (req, res) => {
  res.status(200).json({ data: tasks });
});

// GET TASK BY ID
app.get("/api/tasks/:id", (req, res) => {
  const task = tasks.find((t) => t.id == req.params.id);

  if (!task) {
    return res.status(404).json({
      message: "Task tidak ditemukan",
    });
  }

  res.status(200).json(task);
});

// ADD TASK
app.post("/api/tasks", (req, res) => {
  const { judul, prioritas, deadline, status } = req.body;

  if (!judul || !prioritas || !deadline || !status) {
    return res.status(400).json({
      message: "Semua field wajib diisi",
    });
  }

  const newTask = {
    id: Date.now(),
    judul,
    prioritas,
    deadline,
    status,
  };

  tasks.push(newTask);

  res.status(201).json({
    message: "Task berhasil ditambahkan",
  });
});

// UPDATE TASK
app.put("/api/tasks/:id", (req, res) => {
  const index = tasks.findIndex((t) => t.id == req.params.id);

  if (index === -1) {
    return res.status(404).json({
      message: "Task tidak ditemukan",
    });
  }

  tasks[index] = {
    ...tasks[index],
    ...req.body,
  };

  res.status(200).json({
    message: "Task berhasil diupdate",
  });
});

// DELETE TASK
app.delete("/api/tasks/:id", (req, res) => {
  tasks = tasks.filter((t) => t.id != req.params.id);

  res.status(200).json({
    message: "Task berhasil dihapus",
  });
});

app.listen(port, () => {
  console.log(`Server berjalan di http://localhost:${port}`);
});