    <!-- Begin Page Content -->
    <div class="container-fluid">

      <!-- Page Heading -->
      <h1 class="h3 mb-4 text-gray-800">Role Management</h1>

      <div class="row">
        <div class="col-lg-6">
          <?= $this->session->flashdata('message'); ?>
          <?= $this->session->unset_userdata('message'); ?>
          <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

          <a href="" class="mb-3 btn btn-primary insertRoleModal" data-toggle="modal" data-target="#addRole">Add New Role</a>

          <table class="table table-hover">
            <thead class="table-light">
              <tr>
                <th scope="col">No</th>
                <th scope="col">Role</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php $i = 1; ?>
              <?php foreach ($role as $r) : ?>
                <tr class="table-light">
                  <th scope="row"><?= $i++; ?></th>
                  <td><?= $r['role']; ?></td>
                  <td>
                    <a href="<?= base_url('admin/access/') . $r['id']; ?>" class="badge badge-warning">Access</a>
                    <a href="" class="badge badge-success updateRoleModal" data-toggle="modal" data-target="#addRole" data-id="<?= $r['id']; ?>">Edit</a>
                    <a href="<?= base_url('admin/deleterole/') . $r['id']; ?>" class="badge badge-danger">Delete</a>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>

    </div>
    <!-- /.container-fluid -->

    <!-- Modal -->
    <div class="modal fade" id="addRole" tabindex="-1" aria-labelledby="addRoleLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="addRoleLabel">Add New Role</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form class="form-submit" action="<?= base_url('admin/role'); ?>" method="post">
            <div class="modal-body">
              <div class="form-group">
                <input type="text" class="form-control" id="role" name="role" placeholder="Role name">
                <input type="hidden" id="id" name="id">
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary modalButton">Add Role</button>
          </form>
        </div>
      </div>
    </div>
    </div>