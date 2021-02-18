    <!-- Begin Page Content -->
    <div class="container-fluid">

      <!-- Page Heading -->
      <h1 class="h3 mb-4 text-gray-800">Change Password</h1>

      <div class="row">
        <div class="col-lg-6">
          <?= $this->session->flashdata('message'); ?>
          <?= $this->session->unset_userdata('message'); ?>
          <form action="<?= base_url('user/changepassword'); ?>" method="post">
            <div class="form-group row">
              <label for="currentpassword" class="col-sm-3 col-form-label">Current Password</label>
              <div class="col-sm-9">
                <input type="password" class="form-control" id="currentpassword" name="currentpassword">
                <?= form_error('currentpassword', '<small class="text-danger">', '</small>'); ?>
              </div>
            </div>
            <div class="form-group row">
              <label for="password1" class="col-sm-3 col-form-label">New Password</label>
              <div class="col-sm-9">
                <input type="password" class="form-control" id="password1" name="password1">
              </div>
            </div>
            <div class="form-group row">
              <label for="password2" class="col-sm-3 col-form-label">Repeat Password</label>
              <div class="col-sm-9">
                <input type="password" class="form-control" id="password2" name="password2"><?= form_error('password1', '<small class="text-danger">', '</small>'); ?>
              </div>
            </div>
            <div class="form-group">
              <div class="row justify-content-end">
                <div class="col-sm-9">
                  <button type="submit" class="btn btn-primary">Change Password</button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>

    </div>
    <!-- /.container-fluid -->