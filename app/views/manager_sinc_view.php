<h3>Synchronization</h3>

    <form action="<?php echo $host . "/manager/"; ?>ressync" class="signin-wrapper" method="post">
          <div class="widget-body">
            <div class="form-group">
            <label>District:</label>
              <input class="form-control" id="dis" placeholder="District" onkeyup='checkParams()' type="text" name="district" >
            </div>
            <div class="form-group">
            <label>Tenure:</label>
              <input class="form-control" id="ten" placeholder="Tenure" onkeyup='checkParams()' type="text" name="tenure" >
            </div>
            <div class="form-group">
            <label>Type:</label>
              <input class="form-control" id="type" placeholder="Type" onkeyup='checkParams()' type="text" name="type" >
            </div>
            <div class="form-group">
            <label>Size:</label>
              <input class="form-control" id="size" placeholder="Size" onkeyup='checkParams()' type="text" name="size" >
            </div>
            <div class="form-group">
            <label>Price:</label>
              <input class="form-control" id="price" placeholder="Price" onkeyup='checkParams()' type="text" name="price" >
            </div>
          </div>
          <div class="actions">
            <input class="btn btn-info pull-left newbutton sub" id="submit" type="submit" disabled value="Synchronization" >
            <div class="clearfix"></div>
          </div>
        </form>


<script type="text/javascript">
function checkParams() {
    var dis = $('#dis').val();
    var ten = $('#ten').val();
    var type = $('#type').val();
    var size = $('#size').val();
    var price = $('#price').val();

    if(dis.length != 0 || ten.length != 0 || type.length != 0 || size.length != 0 || price.length != 0) {
        $('#submit').removeAttr('disabled');
    } else {
        $('#submit').attr('disabled', 'disabled');
	}
}
</script>

