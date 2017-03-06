<div class="row" id="insertdiv">
  <div class="col-sm-12">
    <div class="widget">
      <div class="widget-header">
        <div class="title">
          <h3>Add new user</h3>
        </div>
      </div>
        <form action="<?php echo $host . "/admin/"; ?>addnewcust" class="signin-wrapper" method="post">
          <div class="widget-body">
              <input type="hidden" value="<?php echo $_GET['id']?>" name="id">
            <div class="form-group">
            <label>First name:</label>
              <input class="form-control" placeholder="First name" type="text" name="firstname" required>
            </div>
            <div class="form-group">
            <label>Last name:</label>
              <input class="form-control" placeholder="Last name" type="text" name="lastname" required>
            </div>
            <div class="form-group">
            <label>CEA No:</label>
              <input class="form-control" placeholder="CEA No" type="date" name="dob" required>
            </div>
            <div class="form-group">
            <label>Phone number:</label>
              <input class="form-control" placeholder="Phone" type="text" name="phone" required>
            </div>
            <div class="form-group">
            <label>Email:</label>
              <input class="form-control" placeholder="Email" type="email" name="email" required>
            </div>
            <div class="form-group">
            <label>Password:</label>
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