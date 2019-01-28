<?php require APPROOT . '/views/inc/header.php'; ?>
  
  <div class="card card-body bg-light mt-5">
    <h2>Add Post</h2>
    <p>Create a post</p>
    <form action="<?php echo URLROOT; ?>/posts/add" method="post">
      <div class="form-group">
        <label for="title">Title: <sup>*</sup></label>
        <input type="text" name="title" class="form-control form-control-lg <?php echo (!empty($data['error_title'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['title']; ?>">
        <span class="invalid-feedback"><?php echo $data['error_title']; ?></span>
      </div>
      <div class="form-group">
        <label for="body">Body: <sup>*</sup></label>
        <textarea name="body" class="form-control form-control-lg <?php echo (!empty($data['error_body'])) ? 'is-invalid' : ''; ?>"><?php echo $data['body']; ?></textarea>
        <span class="invalid-feedback"><?php echo $data['error_body']; ?></span>
      </div>
      <input type="submit" class="btn btn-success" value="Submit">
      <a href="<?php echo URLROOT; ?>/posts" class="btn btn-light">Back</a>
    </form>
  </div>
<?php require APPROOT . '/views/inc/footer.php'; ?>