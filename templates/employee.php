<div class="modal fade" id="form_category" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Employee</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div id="msg"></div>
        <form id="employee_form" action="includes/employee_process.php" autocomplete="off" method="POST" enctype="multipart/form-data">
          <div class="form-group">
            <label>Employee Name</label>
            <input type="text" class="form-control" name="fullname" id="fullname" placeholder="Employee Name">
            <small id="fullname_error" class="form-text text-muted"></small>
          </div>
          <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control" name="email" id="email" placeholder="Employee Email">
            <small id="email_error" class="form-text text-muted"></small>
          </div>
          <div class="form-group">
            <label>Password</label>
            <input type="password" class="form-control" name="password" id="password" placeholder="Password">
            <small id="password_error" class="form-text text-muted"></small>
          </div>
          <div class="form-group">
            <label>Phone</label>
            <input type="text" class="form-control" name="phone" id="phone" placeholder="Employee phone Number">
            <small id="phone_error" class="form-text text-muted"></small>
          </div>
          <div class="form-group">
            <label>Photo</label>
            <input type="file" class="form-control" name="photo" id="photo">
            <small id="photo_error" class="form-text text-muted"></small>
          </div>
          <div class="form-group">
            <label>Joining Date</label>
            <input type="date" class="form-control" name="employeefrom" id="employeefrom">
            <small id="date_error" class="form-text text-muted"></small>
          </div>
          
          <button type="submit" class="btn btn-primary" name="addemployee">Submit</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>