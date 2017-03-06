<div class="row" id="insertdiv">
  <div class="col-sm-12">
    <div class="widget">
      <div class="widget-header">
        <div class="title">
          <h3>Add new listing</h3>
        </div>
      </div>
        <form action="<?php echo $host . "/admin/"; ?>addnewlisting" class="signin-wrapper" method="post">
          <div class="widget-body">
              <!-- <input type="hidden" value="<?php echo $_GET['id']?>" name="id"> -->
            <div class="form-group">
            <label>District:</label>
              <input class="form-control" placeholder="District" type="text" name="district" required>
            </div>
            <div class="form-group">
            <label>Huttons/non-huttons:</label>
              <input class="form-control" placeholder="Huttons/non-huttons" type="text" name="huttons" required>
            </div>
            <div class="form-group">
            <label>Project name:</label>
              <input class="form-control" placeholder="Project name" type="text" name="projectname" required>
            </div>
            <div class="form-group">
            <label>Location:</label>
              <input class="form-control" placeholder="Location" type="text" name="location" required>
            </div>
            <div class="form-group">
            <label>Type:</label>
              <input class="form-control" placeholder="Type" type="text" name="type" required>
            </div>
            <div class="form-group">
            <label>Size:</label>
              <input class="form-control" placeholder="Size" type="text" name="size" >
            </div>
             <div class="form-group">
            <label>Price:</label>
              <input class="form-control" placeholder="Price" type="text" name="price" >
            </div>
             <div class="form-group">
            <label>Tenure:</label>
              <input class="form-control" placeholder="Tenure" type="text" name="tenure" >
            </div>
             <div class="form-group">
            <label>Commission:</label>
              <input class="form-control" placeholder="Commission" type="text" name="commission" >
            </div>
            <div class="form-group">
            <label>Contact person:</label>
              <input class="form-control" placeholder="Contact person" type="text" name="contact_person" >
            </div>
              <div class="form-group">
            <label>FOC Tagging:</label>
              <input class="form-control" placeholder="FOC Tagging" type="text" name="tagging" >
            </div>
              <div class="form-group">
            <label>Building status:</label>
              <input class="form-control" placeholder="Building status" type="text" name="building_status" >
            </div>
            <div class="form-group">
            <label>Remarks:</label>
              <input class="form-control" placeholder="Remarks" type="text" name="remarks" >
            </div>
             <div class="form-group">
            <label>Est.Top:</label>
              <input class="form-control" placeholder="Est.Top" type="text" name="est" >
            </div>
            <div class="form-group">
            <label>USP:</label>
              <input class="form-control" placeholder="USP" type="text" name="usp" >
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