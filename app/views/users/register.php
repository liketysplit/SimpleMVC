<?php require APPROOT . '/views/inc/header.php'; ?>
  <div class="row">
    <div class="col-md-6 mx-auto">
      <div class="card card-body bg-light mt-5">
        <h2>Registration</h2>
        <p>Please fill in the details below for an account</p>
        <form action="<?php echo URLROOT; ?>/users/register" method="post">
          <div class="form-group">
            <label for="name">Name: <sup>*</sup></label>
            <input type="text" name="name" class="form-control form-control-lg <?php echo (!empty($data['error_name'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['name']; ?>">
            <span class="invalid-feedback"><?php echo $data['error_name']; ?></span>
          </div>
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
          <div class="form-group">
            <label for="password2">Confirm Password: <sup>*</sup></label>
            <input type="password" name="password2" class="form-control form-control-lg <?php echo (!empty($data['error_password2'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['password2']; ?>">
            <span class="invalid-feedback"><?php echo $data['error_password2']; ?></span>
          </div>

          <div class="row">
            <div class="col">
              <input type="submit" value="Register" class="btn btn-success btn-block">
            </div>
            <div class="col">
              <a href="<?php echo URLROOT; ?>/users/login" class="btn btn-light btn-block">Login</a>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
<?php require APPROOT . '/views/inc/footer.php'; ?>
