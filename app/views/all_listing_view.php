<h4>All listing</h4>


<div class="form-group add">
   <a href="<?php echo $host . "/admin/addlisting"; ?>"><input type="submit" class="btn btn-primary newbutton"  value="Add new listing" ></a>
</div>
<br/>
  <div class="form-group add">
   <input data-toggle="modal" data-target="#exel" type="submit" class="btn btn-primary newbutton"  value="Upload exel document" >
  </div>
<?php if($data['all'] == 'You don`t have a listing!'){ ?>
	<h3>You don`t have a listing!</h3>
<?php }else{?>



<!-- <div id="listing" style="margin-left: -22px;">
<table>
  <thead>
    <tr>
      <th width="5%" >Dist</th>
      <th width="20%">Huttons/Non-Htns</th>
      <th width="20%">Projects</th>
      <th width="20%">Location</th>
      <th width="30%">Type</th>
      <th width="30%">Size</th>
      <th width="30%">Quantum(Accurate to best effort basis)</th>
      <th width="30%">Tenure</th>
      <th width="30%">Com</th>
      <th width="30%">Tagger</th>
      <th width="30%">FOC Tag</th>
      <th width="30%">Building status</th>
      <th width="30%">Est. TOP</th>
      <th width="30%">USP</th>
      <th width="30%">Remarks</th>
      <th width="30%">Date Updated</th>
      <th width="30%">Action</th>
    </tr>
  </thead>
  <tbody>
    <tr>

    <? foreach($data['all'] as $inf) :?>
          <td class=""><?= $inf['district'] ?></td>

          <td class="inputfield"><?= $inf['huttons'] ?></td>

          <td class=""><?= $inf['project_name'] ?></td>

          <td class=""><?= $inf['location'] ?></td>

          <td class=""><?= $inf['type'] ?></td>

          <td class=""><?= $inf['size'] ?></td>
          <td class=""><?= $inf['price'] ?></td>
          <td class=""><?= $inf['tenure'] ?></td>
          <td class=""><?= $inf['commission'] ?></td>
          <td class=""><?= $inf['contact_person'] ?></td>
          <td class=""><?= $inf['tagging'] ?></td>
          <td class=""><?= $inf['building_status'] ?></td>
          <td class=""><?= $inf['remarks'] ?></td>
          <td class=""><?= $inf['est'] ?></td>
          <td class=""><?= $inf['usp'] ?></td>
          <td class=""><?= $inf['date_time'] ?></td>
          <td class="">
            
          <a href="<?php echo $host; ?>/admin/editlisting?id=<?php echo $inf['id']; ?>"> <input class="btn btn-info pull-left newbutton" type="submit" value="Edit"></a>
          <a href="<?php echo $host; ?>/admin/deletelisting?id=<?php echo $inf['id']; ?>">  <input class="btn btn-info pull-left newbutton" style="margin-top: 5px;" type="submit" value="Delete"></a>
            
          </td>
        </tr> 
        <? endforeach; ?> 
  </tbody>
</table>
</div> -->
<?php } ?>



<div class="modal fade" id="exel"  tabindex="-1" role="dialog" aria-labelledby="editCampaign">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="exampleModalLabel">Upload document: </h4>
        </div>


<form id="exel" enctype="multipart/form-data" action="<?php echo $host . "/admin/"; ?>addlistingexel" method="post">
          <div class="modal-body">
          <input type="hidden" class="form-control" name="id" value="<?php echo $data['inf']['id']?>" />
            <div class='form-group'>
                <input type="file" class="form-control" name="userfile" required />
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Closed</button>
              <button type="submit" class="btn btn-primary newbutton">Upload</button>
            </div>
            </div>
        
      </form>
    </div>
  </div>
</div>



<div class="data_table">
<table id="example" class="display" width="100%" cellspacing="0">
  <thead>
          <tr class="name_col">
            <th>Id</th>
            <th>District</th>
            <th>Huttons</th>
            <th>Projectname</th>
            <th>Location</th>
            <th>Type</th>
            <th>Size</th>
            <th>Price</th>
            <th>Tenure</th>
            <th>Commission</th>
            <th>Contact_person</th>
            <th>Tagging</th>
            <th>Remarks</th>
            <th>Est</th>
            <th>Usp</th>
            <th>Action</th>
          </tr>
  </thead>
  <tfoot>
  <tr>
    <!--   <th>id</th>
      <th>district</th>
      <th>huttons</th>
      <th>Projectname</th>
      <th>location</th>
      <th>type</th>
      <th>size</th>
      <th>price</th>
      <th>tenure</th>
      <th>commission</th>
      <th>contact_person</th>
      <th>tagging</th>
      <th>building_status</th>
      <th>remarks</th>
      <th>est</th>
      <th>usp</th> -->
  </tr>
  </tfoot>
</table>
    </div>



    <script type="text/javascript">
      // $( document ).ready(function() {
      //   $('#example').dataTable({
      //                    "bProcessing": true,
      //                    "sAjaxSource": "<?php echo $host . "/admin/"; ?>table",
      //                    "aoColumns": [
      //                           { mData: 'district' } ,
      //                           { mData: 'huttons' },
      //                           { mData: 'project_name' }
      //                   ]
      //           });   
      //   });
$(document).ready(function() {
    $('#example').DataTable( {
        "processing": true,
        "serverSide": true,
        "ajax": "<?php echo $host . "/admin/"; ?>table"
    } );
} );





    </script>