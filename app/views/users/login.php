<?php require APPROOT . '/views/inc/header.php'; ?>
  <div class="row">
    <div class="col-md-6 mx-auto">
      <div class="card card-body bg-light mt-5">
      <?php flash('register_success'); ?>
        <h2>Login</h2>
        <p>Please your login information</p>
        <form action="<?php echo URLROOT; ?>/users/login" method="post">
          <div class="form-group">
            <label for="email">Email: <sup>*</sup></label>
            <input type="email" name="email" class="form-control form-control-lg <?php echo (!empty($data['error_email'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['email']; ?>">
            <span class="invalid-feedback"><?php echo $data['error_email']; ?></span>
          </div>
          <div class="form-group">
            <label for="password1">Password: <sup>*</sup></label>
            <input type="password" name="password1" class="form-control form-control-lg <?php echo (!empty($data['error_password1'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['password1']; ?>">
            <span class="invalid-feedback"><?php echo $data['error_password1']; ?></span>
          </div>

          <div class="row">
            <div class="col">
              <input type="submit" value="Login" class="btn btn-success btn-block">
            </div>
          </div>
          <div class="col">
              <a href="<?php echo URLROOT; ?>/users/register" class="btn btn-light btn-block">Register</a>
            </div>
        </form>
      </div>
    </div>
  </div>
<?php require APPROOT . '/views/inc/footer.php'; ?>