<h3>Synchronization</h3>

<div class="form-group">
 <form action="<?php echo $host . "/manager/"; ?>ressync" class="signin-wrapper" method="post">
  <label>Project Name</label>
     <select name="project" class="form-control">
     <option disabled selected>Please select</option>
     <? foreach($data['inf'] as $all): ?>
      <option value="<?=$all['project_name']?>"><?=$all['project_name']?></option>
     <? endforeach; ?>
     </select>
     <label>District</label>
     <select name="district" class="form-control">
     <option disabled selected>Please select</option>
     <?php for ($i=1; $i < 29 ; $i++) { 
      ?>
      <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
     <?php } ?>
     </select>

     <label>Tenure</label>
    <select name="tenure" class="form-control">
     <option disabled selected>Please select</option>
      <option value="FH">Freehold</option>
      <option value="99">99 yrs</option>
      <option value="999">999 yrs</option>
      <!-- <option value="Third Choice">Third Choice</option> -->
     </select>
      <label>Size</label>
     <select name="size" class="form-control">
     <option disabled selected>Please select</option>
     <? foreach($data['size'] as $size): ?>
      <option value="<?=$size['size']?>"><?=$size['size']?></option>
     <? endforeach; ?>
   
     </select>
       <label>Type</label>
     <select name="type" class="form-control">
     <option disabled selected>Please select</option>
      <? foreach($data['type'] as $type): ?>
      <option value="<?=$type['type']?>"><?=$type['type']?></option>
     <? endforeach; ?>
     </select>
       <label>Price</label>
     <select name="price" class="form-control">
     <option disabled selected>Please select</option>
      <option value="below 500">Below $500k</option>
      <option value="500-1">$500k - $1mil</option>
      <option value="1-2">$1mil - $2mil</option>
      <option value="2-3">$2mil - $3mil</option>
      <option value="3">$3mil & above</option>
     </select>
     <p><input class="btn btn-primary newbutton" type="submit" value="Synchronization"></p>
  </form>
</div>

<!--     <form action="<?php echo $host . "/manager/"; ?>ressync" class="signin-wrapper" method="post">
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
        </form> -->


<!-- <script type="text/javascript">
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
</script> -->

