<h4>All listing</h4>

<div class="form-group add">
   <a href="<?php echo $host . "/admin/addlisting"; ?>"><input type="submit" class="btn btn-primary newbutton"  value="Add new listing" ></a>
</div>
<br/>
<?php if($data['all'] == 'You don`t have a listing!'){ ?>
	<h3>You don`t have a listing!</h3>
<?php }else{?>
<!-- exel -->
<!-- <div class="handsontable" id="example">
    <table class="htCore">
      <colgroup>
        <col style="width: 50px;">
        <col style="width: 60px;">
        <col style="width: 50px;">
        <col style="width: 65px;">
        <col style="width: 50px;">
        <col style="width: 69px;">
      </colgroup>

      <thead>
        <tr>
          <th>
            <div class="relative">
              <span class="colHeader">Dist</span>
            </div>
          </th>

          <th>
            <div class="relative">
              <span class="colHeader">Huttons/Non-Htns</span>
            </div>
          </th>

          <th>
            <div class="relative">
              <span class="colHeader">Projects</span>
            </div>
          </th>

          <th>
            <div class="relative">
              <span class="colHeader">Location</span>
            </div>
          </th>

          <th>
            <div class="relative">
              <span class="colHeader">Type</span>
            </div>
          </th>

          <th>
            <div class="relative">
              <span class="colHeader">Size</span>
            </div>
          </th>
          <th>
            <div class="relative">
              <span class="colHeader">Quantum(Accurate to best effort basis)</span>
            </div>
          </th>
          <th>
            <div class="relative">
              <span class="colHeader">Tenure</span>
            </div>
          </th>
           <th>
            <div class="relative">
              <span class="colHeader">Com</span>
            </div>
          </th>
           <th>
            <div class="relative">
              <span class="colHeader">Tagger</span>
            </div>
          </th>
           <th>
            <div class="relative">
              <span class="colHeader">FOC Tag</span>
            </div>
          </th>
           <th>
            <div class="relative">
              <span class="colHeader">Building status</span>
            </div>
          </th>
           <th>
            <div class="relative">
              <span class="colHeader">Est. TOP</span>
            </div>
          </th>
           <th>
            <div class="relative">
              <span class="colHeader">USP</span>
            </div>
          </th>
           <th>
            <div class="relative">
              <span class="colHeader">Remarks</span>
            </div>
          </th>
           <th>
            <div class="relative">
              <span class="colHeader">Date Updated</span>
            </div>
          </th>
           <th>
            <div class="relative">
              <span class="colHeader">Action</span>
            </div>
          </th>
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
            
            <input class="btn btn-info pull-left newbutton" type="submit" value="Edit">
            <input class="btn btn-info pull-left newbutton" type="submit" value="Delete">
            
        

          </td>
        </tr> 
        <? endforeach; ?> 
      </tbody>
    </table>
  </div> -->




<!-- simple -->
<div style="margin-left: -22px;">
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
            
            <input class="btn btn-info pull-left newbutton" type="submit" value="Edit">
            <input class="btn btn-info pull-left newbutton" style="margin-top: 5px;" type="submit" value="Delete">
            
          </td>
        </tr> 
        <? endforeach; ?> 
  </tbody>
</table>
</div>
<?php } ?>
