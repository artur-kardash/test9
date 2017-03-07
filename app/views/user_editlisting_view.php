<div class="row" id="insertdiv">
  <div class="col-sm-12">
    <div class="widget">
      <div class="widget-header">
        <div class="title">
          <h3>Edit listing</h3>
        </div>
      </div>
        <form action="<?php echo $host . "/user/"; ?>updatelisting" class="signin-wrapper" method="post">
          <div class="widget-body">
              <input type="hidden" value="<?php echo $data['inf']['id']?>" name="id">
            <div class="form-group">
            <label>District:</label>
              <input class="form-control" placeholder="District" type="text" value="<?php echo $data['inf']['district']?>" name="district" required>
            </div>
            <div class="form-group">
            <label>Huttons/non-huttons:</label>
              <input class="form-control" placeholder="Huttons/non-huttons" value="<?php echo $data['inf']['huttons']?>" type="text" name="huttons" required>
            </div>
            <div class="form-group">
            <label>Project name:</label>
              <input class="form-control" placeholder="Project name" value="<?php echo $data['inf']['project_name']?>" type="text" name="projectname" required>
            </div>
            <div class="form-group">
            <label>Location:</label>
              <input class="form-control" placeholder="Location" value="<?php echo $data['inf']['location']?>" type="text" name="location" required>
            </div>
            <div class="form-group">
            <label>Type:</label>
              <input class="form-control" placeholder="Type" value="<?php echo $data['inf']['type']?>" type="text" name="type" required>
            </div>
            <div class="form-group">
            <label>Size:</label>
              <input class="form-control" placeholder="Size" value="<?php echo $data['inf']['size']?>" type="text" name="size" >
            </div>
             <div class="form-group">
            <label>Price:</label>
              <input class="form-control" placeholder="Price" value="<?php echo $data['inf']['price']?>" type="text" name="price" >
            </div>
             <div class="form-group">
            <label>Tenure:</label>
              <input class="form-control" placeholder="Tenure" value="<?php echo $data['inf']['tenure']?>" type="text" name="tenure" >
            </div>
             <div class="form-group">
            <label>Commission:</label>
              <input class="form-control" placeholder="Commission" value="<?php echo $data['inf']['commission']?>" type="text" name="commission" >
            </div>
            <div class="form-group">
            <label>Contact person:</label>
              <input class="form-control" placeholder="Contact person" value="<?php echo $data['inf']['contact_person']?>" type="text" name="contact_person" >
            </div>
              <div class="form-group">
            <label>FOC Tagging:</label>
              <input class="form-control" placeholder="FOC Tagging" value="<?php echo $data['inf']['tagging']?>" type="text" name="tagging" >
            </div>
             <!--  <div class="form-group">
            <label>Building status:</label>
              <input class="form-control" placeholder="Building status" value="<?php echo $data['inf']['building_status']?>" type="text" name="building_status" >
            </div> -->
            <div class="form-group">
            <label>Remarks:</label>
              <input class="form-control" placeholder="Remarks" value="<?php echo $data['inf']['remarks']?>" type="text" name="remarks" >
            </div>
             <div class="form-group">
            <label>Est.Top:</label>
              <input class="form-control" placeholder="Est.Top" value="<?php echo $data['inf']['est']?>" type="text" name="est" >
            </div>
            <div class="form-group">
            <label>USP:</label>
              <input class="form-control" placeholder="USP" value="<?php echo $data['inf']['usp']?>" type="text" name="usp" >
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