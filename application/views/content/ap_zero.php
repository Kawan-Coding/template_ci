      <!-- Main Content -->

      <div class="main-content">
          <section class="section">
              <div class="section-header">
                  <h1><?= $title ?></h1>
              </div>
              <button class="btn btn-info " data-toggle="modal" data-target="#add" style="position: fixed; bottom: 36px;   right: 20px; padding: 18.5px;z-index: 10;">
                  <i class="fa fa-plus"></i>
              </button>
              <div class="section-body">
                  <div class="row">
                      <div class="col-12">
                          <div class="card">
                              <div class="card-body">
                                  <div class="table-responsive">
                                      <table class="table table-striped" id="table">
                                          <thead>
                                              <tr>
                                                  <th class="text-center">
                                                      #
                                                  </th>
                                                  <th>Name</th>
                                                  <th>Address</th>
                                                  <th>Member</th>
                                                  <th>Action</th>
                                              </tr>
                                          </thead>
                                          <tfoot>
                                              <tr>
                                                  <th class="text-center">
                                                      #
                                                  </th>
                                                  <th class="table_search"></th>
                                                  <th class="table_search"></th>
                                                  <th class="table_search"></th>
                                                  <th>#</th>
                                              </tr>
                                          </tfoot>
                                      </table>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </section>
      </div>
      <div class="modal fade" id="add">
          <div class="modal-dialog modal-xl" role="document">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Detail <?= $title ?></h5> <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                  </div>
                  <div class="modal-body row" id="form-data">

                      <div class="col-sm-4" style=" border-right: 5px solid;">
                          <div class="form-group">
                              <label for="nama">Username</label>
                              <input type="text" class="form-control" id="username" name="username">
                          </div>
                          <div class="form-group">
                              <label for="password">Password</label>
                              <input type="password" class="form-control" id="password" name="password">
                          </div>
                          <div class="form-group" id="role">
                              <label for="role">Member</label>
                              <select class="custom-select col" id="role">
                                  <option value="admin">admin</option>
                                  <option value="agent">agent</option>
                              </select>
                          </div>

                          <!-- <img src="#" alt="Foto <?= $title ?>" id="edit-foto" class="img-fluid"> -->
                      </div>
                      <div class="col-sm-8">
                          <div class="form-group"> <label for="name">Name</label>
                              <input type="text" class="form-control" id="name" name="name">
                          </div>
                          <div class="form-group"> <label for="address">Address</label>
                              <input type="text" class="form-control" id="address" name="address">
                          </div>
                          <div class="row">
                              <div class="form-group col"> <label for="telp">Telp</label>
                                  <input type="text" class="form-control" id="telp" name="telp">
                              </div>
                              <div class="form-group col"> <label for="email">E-mail</label>
                                  <input type="text" class="form-control" id="email" name="email">
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-outline-warning" data-dismiss="modal">Close</button>
                      <button type="button" class="btn btn-info" onclick="add()">Save</button>
                  </div>
              </div>
          </div>
      </div>

      <div class="modal fade" id="view">
          <div class="modal-dialog modal-xl" role="document">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Detail <?= $title ?></h5> <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                  </div>
                  <div class="modal-body row" id="form-data">
                      <input type="text" class="form-control" id="id" name="id" readonly hidden>
                      <input type="text" class="form-control" id="edit-password" name="password" readonly hidden>

                      <div class="col-sm-4" style=" border-right: 5px solid;">
                          <div class="form-group">
                              <label for="nama">Username</label>
                              <input type="text" class="form-control" id="edit-username" name="username" readonly>
                          </div>
                          <div class="form-group" id="role">
                              <label for="role">Member</label>
                              <select class="custom-select col" id="edit-role" disabled>
                                  <option value="admin">admin</option>
                                  <option value="agent">agent</option>
                              </select>
                          </div>

                          <!-- <img src="#" alt="Foto <?= $title ?>" id="edit-foto" class="img-fluid"> -->
                      </div>
                      <div class="col-sm-8">
                          <div class="form-group"> <label for="edit-name">Name</label>
                              <input type="text" class="form-control" id="edit-name" name="name" readonly>
                          </div>
                          <div class="form-group"> <label for="edit-address">Address</label>
                              <input type="text" class="form-control" id="edit-address" name="address" readonly>
                          </div>
                          <div class="row">
                              <div class="form-group col"> <label for="edit-telp">Telp</label>
                                  <input type="text" class="form-control" id="edit-telp" name="telp" readonly>
                              </div>
                              <div class="form-group col"> <label for="edit-email">E-mail</label>
                                  <input type="text" class="form-control" id="edit-email" name="email" readonly>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-outline-danger" onclick="del()"> Delete</button>
                      <button type="button" class="btn btn-outline-warning" onclick="edit()">Edit</button>
                      <button type="button" class="btn btn-info" onclick="save()">Save</button>
                  </div>
              </div>
          </div>
      </div>

      <script>
          var number = 0,
              is_update;
          $(document).ready(function() {
              $('#table').DataTable({
                  "ajax": "<?php echo base_url('zero/get') ?>",
                  "columns": [{
                      "render": function() {
                          return get_index();
                      },
                      className: "text-center"
                  }, {
                      "data": "name"
                  }, {
                      "data": "address"
                  }, {
                      "data": "role"
                  }, {
                      "render": function(data, type, JsonResultRow, meta) {
                          return '<button class="btn btn-primary" onclick="view(' + "'" + JsonResultRow.id + "'" + ')"><i class="fa fa-eye"></i> Detail </button>';
                      }
                  }]
              });

              var table = $('#table').DataTable();
              table.columns().every(function() {
                  var that = this;
                  $('input', this.footer()).on('keyup change clear', function() {
                      if (that.search() !== this.value) {
                          that
                              .search(this.value)
                              .draw();
                      }
                  });
              });
          });

          function get_index() {
              if (is_update) {
                  number = 1;
                  is_update = false;
              } else {
                  number++;
              }
              return number;
          }

          function view(id) {
              $.ajax({
                  url: '<?= base_url('zero/get/') ?>' + id,
                  type: 'POST',
                  data: "",
                  success: function(r) {
                      if (!r.error) {
                          $('#id').val(r.data.id);
                          $('#edit-username').val(r.data.username);
                          $('#edit-password').val(r.data.password);
                          $('#edit-role').val(r.data.role);
                          $('#edit-name').val(r.data.name);
                          $('#edit-address').val(r.data.address);
                          $('#edit-telp').val(r.data.telp);
                          $('#edit-email').val(r.data.email);
                          $('#view').modal('show');
                      } else {
                          swal('Gagal !', 'Gagal Mengambil Data Produk', 'error');
                      }
                  }
              })
          }

          function add() {
              $.ajax({
                  url: '<?= base_url('zero/create') ?>',
                  type: 'POST',
                  data: {
                      username: $("#username").val(),
                      password: $("#password").val(),
                      name: $("#name").val(),
                      role: $("#role").val(),
                      address: $("#address").val(),
                      telp: $("#telp").val(),
                      email: $("#email").val(),
                  },
                  success: function(r) {
                      if (!r.error) {
                          is_update = true;
                          $('#add').modal('hide');
                          $('#table').dataTable().api().ajax.reload();
                          swal('Success !', r.message, 'success');
                      } else {
                          swal('Error !', r.message, 'error');
                      }
                  },
                  statusCode: {
                      500: function() {
                          swal({
                              icon: "error",
                              title: "Error !",
                              text: "Something is error."
                          })
                      }
                  }
              })
          }

          function del() {
              $("#edit-name, #edit-address, #edit-telp, #edit-email").attr("readonly", true);
              $("#edit-role").attr("disabled", true);
              swal("Apakah kamu yakin menghapus data ?", {
                  icon: "info",
                  buttons: {
                      cancel: "Batal",
                      Yakin: true
                  },
              }).then((value) => {
                  if (value == 'Yakin') {
                      $.ajax({
                          url: '<?= base_url('zero/delete'); ?>',
                          type: 'POST',
                          dataType: 'json',
                          data: {
                              id: $('#id').val()
                          },
                          success: function(r) {
                              if (!r.error) {
                                  is_update = true;
                                  $('#view').modal('hide');
                                  $('#table').dataTable().api().ajax.reload();
                                  swal('Success !', r.message, 'success');
                              } else {
                                  swal('Error !', r.error, 'error');
                              }
                          }
                      });
                  }
              });
          }

          function edit() {
              $("#edit-name, #edit-address, #edit-telp, #edit-email").attr("readonly", false);
              $("#edit-role").attr("disabled", false);
          }

          function save() {
              $("#edit-name, #edit-address, #edit-telp, #edit-email").attr("readonly", true);
              $("#edit-role").attr("disabled", true);
              $.ajax({
                  url: '<?= base_url('zero/update') ?>',
                  type: 'POST',
                  data: {
                      id: $("#id").val(),
                      username: $("#edit-username").val(),
                      password: $("#edit-password").val(),
                      name: $("#edit-name").val(),
                      role: $("#edit-role").val(),
                      address: $("#edit-address").val(),
                      telp: $("#edit-telp").val(),
                      email: $("#edit-email").val(),
                  },
                  success: function(r) {
                      if (!r.error) {
                          is_update = true;
                          $('#view').modal('hide');
                          swal('Success !', r.message, 'success');
                          $('#table').dataTable().api().ajax.reload();
                      } else {
                          swal('Error !', r.message, 'error');
                      }
                  }
              })
          }
      </script>