<div class="modal-footer">
    <button type="button" data-dismiss="modal" class="btn btn-warning">Batal</button>
    <button type="submit" class="btn btn-primary">Simpan</button>
  </div>
  </div>
  </div>
  </form>
  
  <script>
  $(document).ready(function() {
      $("#form-tambah").validate({
          rules: {
              level_id: {
                  required: true,
                  number: true
              },
              username: {
                  required: true,
                  minlength: 3,
                  maxlength: 20
              },
              nama: {
                  required: true,
                  minlength: 3,
                  maxlength: 100
              },
              password: {
                  required: true,
                  minlength: 6,
                  maxlength: 20
              }
          },
          submitHandler: function(form) {
              $.ajax({
                  url: form.action,
                  type: form.method,
                  data: $(form).serialize(),
                  success: function(response) {
                      if (response.status) {
                          $('#myModal').modal('hide');
                          Swal.fire({
                              icon: 'success',
                              title: 'Berhasil',
                              text: response.message
                          });
                          // Reload datatable jika `dataUser` sudah didefinisikan sebelumnya
                          if (typeof dataUser !== 'undefined') {
                              dataUser.ajax.reload();
                          }
                      } else {
                          $('.error-text').text('');
                          $.each(response.msgField, function(prefix, val) {
                              $('#error-' + prefix).text(val[0]);
                          });
                          Swal.fire({
                              icon: 'error',
                              title: 'Terjadi Kesalahan',
                              text: response.message
                          });
                      }
                  }
              });
              return false;
          },
          errorElement: 'span',
          errorPlacement: function(error, element) {
              error.addClass('invalid-feedback');
              element.closest('.form-group').append(error);
          },
          highlight: function(element, errorClass, validClass) {
              $(element).addClass('is-invalid');
          },
          unhighlight: function(element, errorClass, validClass) {
              $(element).removeClass('is-invalid');
          }
      });
  });
  </script>
  