    <!-- Begin Page Content -->
    <div class="container-fluid">

      <!-- Page Heading -->
      <h1 class="h3 mb-4 text-gray-800">Role Management</h1>

      <div class="row">
        <div class="col-lg-6">
          <?= $this->session->flashdata('message'); ?>
          <?= $this->session->unset_userdata('message'); ?>
          <h5>Role : <?= $role['role']; ?></h5>
          <table class="table table-hover">
            <thead class="table-light">
              <tr>
                <th scope="col">No</th>
                <th scope="col">Menu</th>
                <th scope="col">Access</th>
              </tr>
            </thead>
            <tbody>
              <?php $i = 1; ?>
              <?php foreach ($menu as $m) : ?>
                <tr class="table-light">
                  <th scope="row"><?= $i; ?></th>
                  <td><?= $m['menu']; ?></td>
                  <td>
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input accessCheck" id="access<?= $i ?>" <?= check_access($role['id'], $m['id']); ?> data-role="<?= $role['id']; ?>" data-menu="<?= $m['id']; ?>">
                      <label class="custom-control-label" for="access<?= $i ?>">Give Access</label>
                    </div>
                  </td>
                </tr>
                <?php $i++; ?>
              <?php endforeach; ?>
            </tbody>
          </table>
          <a href="<?= base_url('admin/role'); ?>" class="btn btn-success">Back to Role Management</a>
        </div>
      </div>

    </div>
    <!-- /.container-fluid -->