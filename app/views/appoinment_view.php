<h3>Аppointment</h3>
        <form action="<?php echo $host . "/admin/"; ?>" class="signin-wrapper" method="post">
          <div class="widget-body">
            <div class="form-group">
            <label>Project name:</label>
              <input class="form-control" placeholder="Project name" type="text" name="projectname" required>
            </div>
            <div class="form-group">
            <label>Client’s name:</label>
              <input class="form-control" placeholder="Client’s name" type="text" name="clientname" required>
            </div>
            <div class="form-group">
            <label>Date & time:</label>
              <input class="form-control" placeholder="Date & time" type="date" name="dt" required>
            </div>
            <div class="form-group">
            <label>Remarks:</label>
              <input class="form-control" placeholder="Remarks" type="text" name="remarks" required>
            </div>
          </div>
          <div class="actions">
            <input class="btn btn-info pull-left newbutton" type="submit" value="Save">
            <div class="clearfix"></div>
          </div>
        </form>