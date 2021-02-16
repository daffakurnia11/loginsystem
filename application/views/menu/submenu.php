    <!-- Begin Page Content -->
    <div class="container-fluid">

      <!-- Page Heading -->
      <h1 class="h3 mb-4 text-gray-800">Sub Menu Management</h1>

      <div class="row">
        <div class="col-lg">
          <?= $this->session->flashdata('message'); ?>
          <?= $this->session->unset_userdata('message'); ?>
          <?php if (validation_errors()) : ?>
            <div class="alert alert-danger" role="alert">
              <?= validation_errors(); ?>
            </div>
          <?php endif; ?>

          <a href="" class="mb-3 btn btn-primary insertSubMenu" data-toggle="modal" data-target="#addSubMenu">Add New Sub Menu</a>

          <table class="table table-hover">
            <thead class="table-light">
              <tr>
                <th scope="col">No</th>
                <th scope="col">Title</th>
                <th scope="col">Menu</th>
                <th scope="col">URL</th>
                <th scope="col">Icon</th>
                <th scope="col">Active</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php $i = 1; ?>
              <?php foreach ($submenu as $sm) : ?>
                <tr class="table-light">
                  <th scope="row"><?= $i++; ?></th>
                  <td><?= $sm['title']; ?></td>
                  <td><?= $sm['menu']; ?></td>
                  <td><?= $sm['url']; ?></td>
                  <td><?= $sm['icon']; ?></td>
                  <td><?= $sm['is_active']; ?></td>
                  <td>
                    <a href="" class="badge badge-success updateSubMenu" data-toggle="modal" data-target="#addSubMenu" data-id="<?= $sm['id']; ?>">Edit</a>
                    <a href="<?= base_url('menu/deletesub/') . $sm['id']; ?>" class="badge badge-danger">Delete</a>
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
    <div class="modal fade" id="addSubMenu" tabindex="-1" aria-labelledby="addSubMenuLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="addMenuLabel">Add New Sub Menu</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form class="form-submit" action="<?= base_url('menu/submenu'); ?>" method="post">
            <div class="modal-body">
              <input type="hidden" id="id" name="id">
              <div class="form-group">
                <input type="text" class="form-control" id="title" name="title" placeholder="Sub Menu name">
              </div>
              <div class="form-group">
                <select name="menu_id" class="form-control">
                  <option id="menu_id" value="">Select Menu</option>
                  <?php foreach ($menu as $m) : ?>
                    <option value="<?= $m['id']; ?>"><?= $m['menu']; ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" id="url" name="url" placeholder="Sub Menu URL">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" id="icon" name="icon" placeholder="Sub Menu Icon">
              </div>
              <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="active" name="active">
                <label class="custom-control-label" for="active">Active?</label>
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