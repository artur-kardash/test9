<div class="row" id="insertdiv">
  <div class="col-sm-12">
    <div class="widget">
      <div class="widget-header">
        <div class="title">
          <h3>Add new client</h3>
        </div>
      </div>
        <form action="<?php echo $host . "/manager/"; ?>addnewcli" class="signin-wrapper" method="post">
          <div class="widget-body">
              <!-- <input type="hidden" value="<?php echo $_GET['id']?>" name="id"> -->
            <div class="form-group">
            <label>First name:</label>
              <input class="form-control" placeholder="First name" type="text" name="firstname" required>
            </div>
            <div class="form-group">
            <label>Last name:</label>
              <input class="form-control" placeholder="Last name" type="text" name="lastname" required>
            </div>
             <div class="form-group">
            <label>Development name:</label>
              <input class="form-control" placeholder="Development name" type="text" name="projectname" >
            </div>
            <div class="form-group">
            <label>Date of Birth:</label>
              <input class="form-control" placeholder="Date & time" type="date" name="d&t">
            </div>
            <div class="form-group">
            <label>Phone number:</label>
              <input class="form-control" placeholder="Phone" type="text" name="phone" >
            </div>
            <div class="form-group">
            <label>Email:</label>
              <input class="form-control" placeholder="Email" type="email" name="email" required>
            </div>
             <div class="form-group">
             <label>Investment/own stay:</label>
              <input class="form-control" placeholder="Remarks" type="text" name="remarks" >
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