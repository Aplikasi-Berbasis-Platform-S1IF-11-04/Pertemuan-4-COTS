$(document).ready(function () {
  $('#studentsTable').DataTable({
    ajax: '/students/json',
    columns: [
      {
        data: null,
        render: function (data, type, row, meta) {
          return meta.row + 1;
        }
      },
      { data: 'nim' },
      { data: 'nama' },
      { data: 'jurusan' },
      { data: 'email' },
      {
        data: null,
        render: function (data) {
          return `
            <a href="/students/${data.id}/edit" class="btn btn-warning btn-sm me-1">Edit</a>
            <form action="/students/${data.id}?_method=DELETE" method="POST" style="display:inline;" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
              <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
            </form>
          `;
        }
      }
    ]
  });
});