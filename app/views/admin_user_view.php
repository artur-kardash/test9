<h4>All users</h4>

<div class="form-group add">
   <a href="<?php echo $host . "/user/adduser"; ?>"><input type="submit" class="btn btn-primary"  value="Add new user" ></a>
</div>
<br/>
<?php if($data['all'] == 'You don`t have a clients!'){ ?>
	<h3>You don`t have a users!</h3>
<?php } ?>



<!-- <div class="row" id="insertdiv" style="display:none">
  <div class="col-sm-12">
    <div class="widget">
      <div class="widget-header">
        <div class="title">
          <h3>Add new user</h3>
        </div>
      </div>
   onclick="addnew();"
        <form action="<?php echo $host . "/client/"; ?>addNewOrder" id="addNewOrder" class="signin-wrapper" method="post">
            <div class="widget-body">
          <div class="form-group">
              <input class="form-control" placeholder="Enter Your URL - www.YourDomainName.com " type="text" name="client_url" required>
            </div>
            <div class="form-group">
              <input class="form-control" placeholder="Niche" type="text" name="keywords" required>
            </div>
            <hr>
            <div class="form-group">
              <input class="form-control" placeholder="Topical Trustflow" type="text" name="ttf" >
            </div>
            
            <input type="hidden" value="'<?php echo $_COOKIE['user_id']; ?>'" name="id_user" >
          </div>
          <div class="actions">
            <input class="btn btn-info pull-left" style="background-color:#6A5FAC;" type="submit" value="Save">
            <input class="btn btn-info pull-left" style="background-color:#6A5FAC; margin-left: 2px;" type="reset" class="btn btn-default" value="Clear">
            <div class="clearfix"></div>
          </div>
        </form>
        <div class="addsuccess bg-success"></div>
      </div>
    </div>
  </div> -->



  <script type="text/javascript">
  	 function addnew(){
    $('#insertdiv').toggle("slow");
  }
  </script>
