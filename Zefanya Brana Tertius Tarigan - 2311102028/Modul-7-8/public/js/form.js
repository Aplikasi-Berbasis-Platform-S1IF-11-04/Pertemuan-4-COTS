$(document).ready(function () {
  $('#studentForm').validate({
    rules: {
      nim: {
        required: true,
        minlength: 4
      },
      nama: {
        required: true,
        minlength: 3
      },
      jurusan: {
        required: true
      },
      email: {
        required: true,
        email: true
      }
    },
    messages: {
      nim: {
        required: "NIM wajib diisi",
        minlength: "NIM minimal 4 karakter"
      },
      nama: {
        required: "Nama wajib diisi",
        minlength: "Nama minimal 3 karakter"
      },
      jurusan: {
        required: "Jurusan wajib dipilih"
      },
      email: {
        required: "Email wajib diisi",
        email: "Format email tidak valid"
      }
    },
    errorClass: 'text-danger',
    submitHandler: function (form) {
      $.toast({
        heading: 'Berhasil',
        text: 'Form valid, data siap dikirim',
        showHideTransition: 'slide',
        icon: 'success',
        position: 'top-right'
      });

      setTimeout(function () {
        form.submit();
      }, 700);
    }
  });
});