<h3>Result synchronization</h3>

<?php if($data == NULL){ ?>
<h3>Sorry, but no matches found</h3>
  <a href="<?php echo $host; ?>/user/sinc"> <input class="btn btn-info pull-left newquery" type="submit" value="New query"></a>
<?php }else{ ?>
<div id="listing" style="margin-left: -22px;">
  <a href="<?php echo $host; ?>/user/sinc"> <input class="btn btn-info pull-left newquery" type="submit" value="New query"></a>
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
      <th width="30%">Est. TOP</th>
      <th width="30%">USP</th>
      <th width="30%">Remarks</th>
      <th width="30%">Date Updated</th>
 
    </tr>
  </thead>
  <tbody>
    <tr>

    <? foreach($data['res'] as $inf) :?>
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
          <td class=""><?= $inf['remarks'] ?></td>
          <td class=""><?= $inf['est'] ?></td>
          <td class=""><?= $inf['usp'] ?></td>
          <td class=""><?= $inf['date_time'] ?></td>
        
        </tr> 
        <? endforeach; ?> 
  </tbody>
</table>
</div>

<?php } ?>