<div class="row" id="insertdiv">
  <div class="col-sm-12">
    <div class="widget">
      <div class="widget-header">
        <div class="title">
          <h3>Add new client</h3>
        </div>
      </div>
        <form action="<?php echo $host . "/admin/"; ?>addnewclient" class="signin-wrapper" method="post">
          <div class="widget-body">
              <input type="hidden" value="<?php echo $_GET['id']?>" name="id">
            <div class="form-group">
              <input class="form-control" placeholder="Firstname" type="text" name="firstname" required>
            </div>
            <div class="form-group">
              <input class="form-control" placeholder="Lastname" type="text" name="lastname" required>
            </div>
             <div class="form-group">
              <input class="form-control" placeholder="Project name" type="text" name="projectname" >
            </div>
            <div class="form-group">
              <input class="form-control" placeholder="Date & time" type="date" name="d&t">
            </div>
            <div class="form-group">
              <input class="form-control" placeholder="Phone" type="text" name="phone" >
            </div>
            <div class="form-group">
              <input class="form-control" placeholder="Email" type="email" name="email" required>
            </div>
             <div class="form-group">
              <input class="form-control" placeholder="Remarks" type="text" name="remark" >
            </div>
          </div>
          <div class="actions">
            <input class="btn btn-info pull-left" style="background-color:#6A5FAC;" type="submit" value="Save">
            <div class="clearfix"></div>
          </div>
        </form>
      </div>
    </div>
  </div>