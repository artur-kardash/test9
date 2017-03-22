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

    <? // foreach($data['all'] as $inf) :?>
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
        <? // endforeach; ?> 
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

<?php 
if($data['all'] == 'You don`t have a listing!'){ 
}else{

      foreach ($data['all'] as $key) {
        $t = $key["district"];
        $i.= '<option value="'.$t.'">'.$key["district"].'</option>';
      }

      unset($data['proj'][0]);
      foreach ($data['proj'] as $project) {
        $proj_val = trim($project["project_name"]);
        $proj_val = str_replace(array("\n\r", "\n", "\r"), " ", $proj_val);
        $project["project_name"] = trim($project["project_name"]);
        $project["project_name"] = str_replace(array("\n\r", "\n", "\r"), " ", $project["project_name"]);
        $proj_options .= '<option value="'.$proj_val.'">'.$project["project_name"].'</option>';
       // $gh .= $project["project_name"];
      }

      unset($data['allloc'][0]);
      foreach ($data['allloc'] as $project) {
        $loc_val = trim($project["location"]);
        $loc_val = str_replace(array("\n\r", "\n", "\r"), " ", $loc_val);
        $project["location"] = trim($project["location"]);
        $project["location"] = str_replace(array("\n\r", "\n", "\r"), " ", $project["location"]);
        $proj_local .= '<option value="'.$loc_val.'">'.$project["location"].'</option>';
      }
      unset($data['alltype'][0]);
      foreach ($data['alltype'] as $project) {
        $type_val = trim($project["type"]);
        $type_val = str_replace(array("\n\r", "\n", "\r"), " ", $type_val);
        $project["type"] = trim($project["type"]);
        $project["type"] = str_replace(array("\n\r", "\n", "\r"), " ", $project["type"]);
        $proj_type .= '<option value="'.$type_val.'">'.$project["type"].'</option>';
      }

      unset($data['allsize'][0]);
      foreach ($data['allsize'] as $project) {
        $size_val = trim($project["size"]);
        $size_val = str_replace(array("\n\r", "\n", "\r"), " ", $size_val);
        $project["size"] = trim($project["size"]);
        $project["size"] = str_replace(array("\n\r", "\n", "\r"), " ", $project["size"]);
        $proj_size .= '<option value="'.$size_val.'">'.$project["size"].'</option>';
      }

      unset($data['allcom'][0]);
      foreach ($data['allcom'] as $project) {
        $com_val = trim($project["commission"]);
        $com_val = str_replace(array("\n\r", "\n", "\r"), " ", $com_val);
        $project["commission"] = trim($project["commission"]);
        $project["commission"] = str_replace(array("\n\r", "\n", "\r"), " ", $project["commission"]);
        $proj_com .= '<option value="'.$com_val.'">'.$project["commission"].'</option>';
      }

      unset($data['allcon'][0]);
      foreach ($data['allcon'] as $project) {
        $con_val = trim($project["contact_person"]);
        $con_val = str_replace(array("\n\r", "\n", "\r"), " ", $con_val);
        $project["contact_person"] = trim($project["contact_person"]);
        $project["contact_person"] = str_replace(array("\n\r", "\n", "\r"), " ", $project["contact_person"]);
        $proj_con .= '<option value="'.$con_val.'">'.$project["contact_person"].'</option>';
      }
      unset($data['allest'][0]);
      foreach ($data['allest'] as $project) {
        $est_val = trim($project["est"]);
        $est_val = str_replace(array("\n\r", "\n", "\r"), " ", $est_val);
        $project["est"] = trim($project["est"]);
        $project["est"] = str_replace(array("\n\r", "\n", "\r"), " ", $project["est"]);
        $proj_est .= '<option value="'.$est_val.'">'.$project["est"].'</option>';
      }
      unset($data['allusp'][0]);
      foreach ($data['allusp'] as $project) {
        $usp_val = trim($project["usp"]);
        $usp_val = str_replace(array("\n\r", "\n", "\r"), " ", $usp_val);
        $project["usp"] = trim($project["usp"]);
        $project["usp"] = str_replace(array("\n\r", "\n", "\r"), " ", $project["usp"]);
        $proj_usp .= '<option value="'.$usp_val.'">'.$project["usp"].'</option>';
      }




}




?>

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
      <th>id</th>
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
      <th>usp</th>
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
$('#sel_price'). change(function(){
      var price = $('select[name=sel_price]').val();
    });

   table = $('#example').DataTable( {
        "processing": true,
        "serverSide": true,
        "ajax": "<?php echo $host . "/admin/"; ?>table",

         "initComplete": function () {
        var r = $('#example tfoot tr');
        r.find('th').each(function(){
          $(this).css('padding', 8);
        });
        $('#example thead').append(r);
        $('input').css('text-align', 'center');
      },
    } );



$('#example tfoot th').each( function () {
        var title = $('#example tfoot tr:eq(0) th').eq( $(this).index() ).text();
        var html_string = '';
        var input_style = ' style="width:100%; padding:1px !important; margin-left:-2px; margin-bottom: 0px;"';
        var select_style = ' style="width:100%; padding:1px; margin-left:-2px; margin-bottom: 0px; height: 24px;"';
     
          if($(this).index() == 1){
          html_string = '<select ' + select_style + '>' +
          '<option value="">Select Status...</option>' +
            '<?php echo $i ?>' +
          '</select>';
          }
          if($(this).index() == 2){
            html_string = '<select ' + select_style + '>' +

          '<option value="">Select Status...</option>' + 
          '<option value="Developer">Developer</option>' +
          '<option value="Huttons\nSpecial Arrangmen">Huttons Special Arrangmen</option>' +
          '<option value="Huttons">Huttons</option>' +
          '<option value="Non-Htns">Non-Htns</option>' +
          '</select>';
          }else if($(this).index() == 8){
            html_string = '<select ' + select_style + '>' +

          '<option value="">Select Status...</option>' + 
          '<option value="FH">Freehold</option>' +
          '<option value="99">99 yrs</option>' +
          '<option value="999">999 yrs</option>' +
          '</select>';
          }else if($(this).index() == 11){
            html_string = '<select ' + select_style + '>' +

          '<option value="">Select Status...</option>' + 
          '<option value="YES">YES</option>' +
          '<option value="FOC">FOC</option>' +
          '</select>';
          }else if($(this).index() == 12){
            html_string = '<select ' + select_style + '>' +

          '<option value="">Select Status...</option>' + 
          '<option value="2017">2017</option>' +
          '<option value="Near TOP">Near TOP</option>' +
          '<option value="TOP">TOP</option>' +
          '<option value="U/C">U/C</option>' +
          '</select>';
          }else if($(this).index() == 3){
          html_string = '<select ' + select_style + '>' +
          '<option value="">Select Status...</option>' +
            '<?php echo $proj_options ?>' +
          '</select>';
          }else if($(this).index() == 4){
          html_string = '<select ' + select_style + '>' +
          '<option value="">Select Status...</option>' +
            '<?php echo $proj_local ?>' +
          '</select>';
          }else if($(this).index() == 5){
          html_string = '<select ' + select_style + '>' +
          '<option value="">Select Status...</option>' +
            '<?php echo $proj_type ?>' +
          '</select>';
          }else if($(this).index() == 6){
          html_string = '<select ' + select_style + '>' +
          '<option value="">Select Status...</option>' +
            '<?php echo $proj_size ?>' +
          '</select>';
          }else if($(this).index() == 9){
          html_string = '<select ' + select_style + '>' +
          '<option value="">Select Status...</option>' +
            '<?php echo $proj_com ?>' +
          '</select>';
          }else if($(this).index() == 10){
          html_string = '<select ' + select_style + '>' +
          '<option value="">Select Status...</option>' +
            '<?php echo $proj_con ?>' +
          '</select>';
          }else if($(this).index() == 13){
          html_string = '<select ' + select_style + '>' +
          '<option value="">Select Status...</option>' +
            '<?php echo $proj_est ?>' +
          '</select>';
          }else if($(this).index() == 14){
          html_string = '<select ' + select_style + '>' +
          '<option value="">Select Status...</option>' +
            '<?php echo $proj_usp ?>' +
          '</select>';
          }
          // else if($(this).index() == 7){
          // html_string = '<select id="sel_price" name="price"' + select_style + '>' +
          // '<option value="">Select Status...</option>' + 
          // '<option value="500">Below 500k</option>' +
          // '<option value="$500-$1mil">$500-$1mil</option>' +
          // '<option value="$1mil-2mil">$1mil-2mil</option>' +
          // '<option value="$2mil-$3mil">$2mil-$3mil</option>' +
          // '<option value="$3mil & above">$3mil & above</option>' +
          // '</select>';
          // }


        $(this).html(html_string);
        // $(this).html( '<input class="searchbox" type="text" placeholder="Search '+title+'" />' );
      } );

 table.columns().eq( 0 ).each( function ( colIdx ) {
        $( 'input, select', table.column( colIdx ).footer() ).on( 'keyup change', function () {
          if(colIdx == 2){
            table
              .column( colIdx )
              .search(this.value)
              .draw();
          }else if(colIdx == 8){
            table
              .column( colIdx )
              .search(this.value)
              .draw();
          }else if(colIdx == 11){
            table
              .column( colIdx )
              .search(this.value)
              .draw();
          }else if(colIdx == 12){
            table
              .column( colIdx )
              .search(this.value)
              .draw();
          }else if(colIdx == 1){
            table
              .column( colIdx )
              .search(this.value)
              .draw();
          }else if(colIdx == 3){
            table
              .column( colIdx )
              .search(this.value)
              .draw();
          }else if(colIdx == 4){
            table
              .column( colIdx )
              .search(this.value)
              .draw();
          }else if(colIdx == 5){
            table
              .column( colIdx )
              .search(this.value)
              .draw();
          }else if(colIdx == 6){
            table
              .column( colIdx )
              .search(this.value)
              .draw();
          }else if(colIdx == 9){
            table
              .column( colIdx )
              .search(this.value)
              .draw();
          }else if(colIdx == 10){
            table
              .column( colIdx )
              .search(this.value)
              .draw();
          }else if(colIdx == 13){
            table
              .column( colIdx )
              .search(this.value)
              .draw();
          }else if(colIdx == 14){
            table
              .column( colIdx )
              .search(this.value)
              .draw();
          }
          // else if(colIdx == 7){
          //   if(this.value == 500){
          //     var i = '';
          //   }
          //   table
          //     .column( colIdx )
          //     .search(this.value)
          //     .draw();
          // }
        } );
    } );





} );





    </script>
 