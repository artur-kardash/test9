<div class="row" id="insertdiv">
  <div class="col-sm-12">
    <div class="widget">
      <div class="widget-header">
        <div class="title">
          <h3>Edit client</h3>
        </div>
      </div>
        <form action="<?php echo $host . "/user/"; ?>updateclient" class="signin-wrapper" method="post">
          <div class="widget-body">
              <input type="hidden" value="<?php echo $data['inf']['id']?>" name="id">
            <div class="form-group">
            <label>First name:</label>
              <input class="form-control" placeholder="First name" type="text" value="<?php echo $data['inf']['firstname']?>" name="firstname" required>
            </div>
            <div class="form-group">
            <label>Last name:</label>
              <input class="form-control" placeholder="Last name" value="<?php echo $data['inf']['lastname']?>" type="text" name="lastname" required>
            </div>
            <div class="form-group">
            <label>Phone number:</label>
              <input class="form-control" placeholder="Phone number" value="<?php echo $data['inf']['phone']?>" type="text" name="phone" required>
            </div>
            <div class="form-group">
            <label>Email:</label>
              <input class="form-control" placeholder="Email" value="<?php echo $data['inf']['email']?>" type="text" name="email" required>
            </div>
            <div class="form-group">
            <label>Development name:</label>
              <input class="form-control" placeholder="Development name" value="<?php echo $data['inf']['development']?>" type="text" name="development" required>
            </div>
            <div class="form-group">
            <label>Date of Birth:</label>
              <input class="form-control" placeholder="Date of Birth" value="<?php echo $data['inf']['date_time']?>" type="text" name="date_time" >
            </div>
             <div class="form-group">
            <label>Investment/own stay:</label>
              <input class="form-control" placeholder="Investment/own stay" value="<?php echo $data['inf']['investment']?>" type="text" name="investment" >
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