<h4>All Superusers</h4>

<div class="form-group add">
   <a href="<?php echo $host . "/admin/adduser"; ?>"><input type="submit" class="btn btn-primary newbutton"  value="Add new superuser" ></a>
</div>
<br/>
<?php if($data['all'] == 'You don`t have a clients!'){ ?>
	<h3>You don`t have a Superusers!</h3>
<?php } ?>
<table>
  <thead>
    <tr>
      <th width="5%" >ID</th>
      <th width="20%">Name</th>
      <th width="20%">DOB</th>
      <th width="20%">Phone</th>
      <th width="20%">Actions</th>
    </tr>
  </thead>
  <tbody>
    <tr>

    <? foreach($data['all'] as $inf) :?>
      <td> <?= $inf['id'] ?> </td>
      <td> <?= $inf['firstname']." ".$inf['lastname'] ?> </td>
      <td> <?= $inf['dob'] ?> </td>
      <td> <?= $inf['phone'] ?> </td>
      <td> 
        <a href="<?php echo $host; ?>/admin/review?id=<?php echo $inf['user_id']; ?>"><input type="button" class="btn btn-info pull-left newbutton" name="review" value="View/Edit"></a> 
        <a href="<?php echo $host; ?>/admin/delete?id=<?php echo $inf['user_id']; ?>"><input type="button" class="btn btn-info pull-left newbutton" name="delete" value="Delete"></a> 
      </td>
    </tr>  
     <? endforeach; ?>
  </tbody>
</table>

