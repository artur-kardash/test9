<div class="row" id="insertdiv">
  <div class="col-sm-12">
    <div class="widget">
      <div class="widget-header">
        <div class="title">
          <h3>Add new user</h3>
        </div>
      </div>
        <form action="<?php echo $host . "/admin/"; ?>addnewuser" class="signin-wrapper" method="post">
          <div class="widget-body">
            <div class="form-group">
              <input class="form-control" placeholder="Firstname" type="text" name="firstname" required>
            </div>
            <div class="form-group">
              <input class="form-control" placeholder="Lastname" type="text" name="lastname" required>
            </div>
            <div class="form-group">
              <input class="form-control" placeholder="DOB" type="date" name="dob" required>
            </div>
            <div class="form-group">
              <input class="form-control" placeholder="Phone" type="text" name="phone" required>
            </div>
            <div class="form-group">
              <input class="form-control" placeholder="Email" type="email" name="email" required>
            </div>
            <div class="form-group">
              <input class="form-control" placeholder="Password" type="password" name="password" >
            </div>
          </div>
          <div class="actions">
            <input class="btn btn-info pull-left newbutton" type="submit" value="Save">
            <div class="clearfix"></div>
          </div>
        </form>
      </div>
    </div>
  </div>