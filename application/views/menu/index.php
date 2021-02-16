    <!-- Begin Page Content -->
    <div class="container-fluid">

      <!-- Page Heading -->
      <h1 class="h3 mb-4 text-gray-800">Menu Management</h1>

      <div class="row">
        <div class="col-lg-6">
          <?= $this->session->flashdata('message'); ?>
          <?= $this->session->unset_userdata('message'); ?>
          <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

          <a href="" class="mb-3 btn btn-primary insertDataModal" data-toggle="modal" data-target="#addMenu">Add New Menu</a>

          <table class="table table-hover">
            <thead class="table-light">
              <tr>
                <th scope="col">No</th>
                <th scope="col">Menu</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php $i = 1; ?>
              <?php foreach ($menu as $m) : ?>
                <tr class="table-light">
                  <th scope="row"><?= $i++; ?></th>
                  <td><?= $m['menu']; ?></td>
                  <td>
                    <a href="" class="badge badge-success updateDataModal" data-toggle="modal" data-target="#addMenu" data-id="<?= $m['id']; ?>">Edit</a>
                    <a href="<?= base_url('menu/delete/') . $m['id']; ?>" class="badge badge-danger">Delete</a>
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
    <div class="modal fade" id="addMenu" tabindex="-1" aria-labelledby="addMenuLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="addMenuLabel">Add New Menu</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form class="form-submit" action="<?= base_url('menu'); ?>" method="post">
            <div class="modal-body">
              <div class="form-group">
                <input type="text" class="form-control" id="menu" name="menu" placeholder="Menu name">
                <input type="hidden" id="id" name="id">
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary modalButton">Add Menu</button>
          </form>
        </div>
      </div>
    </div>
    </div>