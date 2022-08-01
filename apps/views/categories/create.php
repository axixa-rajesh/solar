<form method="post" action="<?=ROOT;?>categories/store">
<div class="container border">
    <div class="form-group">
    <h3 class="display-6 text-center">Category Insert Form</h3>
    </div>
<div class="form-group">
    <label for="catname">Category Name</label>
    <input type="text" class="form-control" id="catname" name="name" placeholder="Enter Category Name" required>
  </div>
  <div class="form-group">
    <label for="description">Category Description</label>
    <textarea class="form-control" id="description" name="description" placeholder="Enter Category Description" required></textarea>
  </div>
  <div class="form-group">
  <button type="submit" class="btn btn-primary mb-2">Save</button>
  </div>
</div>
</form>