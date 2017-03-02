<h4>All users</h4>

<div class="form-group add">
   <a href="<?php echo $host . "/admin/adduser"; ?>"><input type="submit" class="btn btn-primary"  value="Add new user" ></a>
</div>
<br/>
<?php if($data['all'] == 'You don`t have a clients!'){ ?>
	<h3>You don`t have a users!</h3>
<?php } ?>
<table>
  <thead>
    <tr>
      <th width="5%" >ID</th>
      <th width="20%">Name</th>
      <th width="20%">DOB</th>
      <th width="20%">Phone</th>
      <th width="30%">Actions</th>
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
        <a href="<?php echo $host; ?>/admin/review?id=<?php echo $inf['user_id']; ?>"><input type="button" name="review" value="View/Edit"></a> 
        <a href="<?php echo $host; ?>/admin/delete?id=<?php echo $inf['user_id']; ?>"><input type="button" name="delete" value="Delete"></a> 
      </td>
    </tr>  
     <? endforeach; ?>
  </tbody>
</table>

