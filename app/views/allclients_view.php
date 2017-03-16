<h3><?php echo $data['title']; ?></h3>
<a href="<?php echo $host . "/admin/addcli"; ?>"><input type="submit" class="btn btn-primary newbutton"  value="Add new client" ></a>
<?php if($data['inf'] == 'error'){ ?>
<h4>You don`t have a clients</h4>
<?php }else{ ?>

<div id="listing" style="margin-left: -22px;">
<table>
  <thead>
    <tr>
      <th width="12%" >First name</th>
      <th width="12%">Last name</th>
      <th width="12%">Phone</th>
      <th width="14%">Email</th>
      <th width="12%">Development name</th>
      <th width="10%">Date of Birth</th>
      <th width="12%">Investment/own stay</th>
      <th width="12%">Action</th>
     
    </tr>
  </thead>
  <tbody>
    <tr>

    <? foreach($data['inf'] as $inf) :?>
          <td class=""><?= $inf['firstname'] ?></td>
          <td class="inputfield"><?= $inf['lastname'] ?></td>
          <td class=""><?= $inf['phone'] ?></td>
          <td class=""><?= $inf['email'] ?></td>
          <td class=""><?= $inf['development'] ?></td>
          <td class=""><?= $inf['date_time'] ?></td>
          <td class=""><?= $inf['investment'] ?></td>
          <td class="">
            
          <a href="<?php echo $host; ?>/admin/editclient?id=<?php echo $inf['id']; ?>"> <input class="btn btn-info pull-left newbutton" type="submit" value="Edit"></a>
          <a href="<?php echo $host; ?>/admin/deleteclient?id=<?php echo $inf['id']; ?>">  <input class="btn btn-info pull-left newbutton" style="margin-top: 5px;" type="submit" value="Delete"></a>
            
          </td>
        </tr> 
        <? endforeach; ?> 
  </tbody>
</table>
</div>





<?php } ?>