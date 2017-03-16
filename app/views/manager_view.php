<h4>All clients</h4>

<div class="form-group add">
   <a href="<?php echo $host . "/manager/addclient"; ?>"><input type="submit" class="btn btn-primary newbutton"  value="Add new clients" ></a>
</div>
<br/>
<?php if($data['all'] == 'You don`t have a clients!'){ ?>
	<h3>You don`t have a clients!</h3>
<?php }else{ ?>
<table>
  <thead>
    <tr>
      <th width="12%" >Name</th>
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

    <? foreach($data['all'] as $inf) :?>
      <td> <?= $inf['firstname']." ".$inf['lastname'] ?> </td>
      <td> <?= $inf['phone'] ?> </td>
      <td> <?= $inf['email'] ?> </td>
      <td> <?= $inf['development'] ?> </td>
      <td> <?= $inf['date_time'] ?> </td>
      <td> <?= $inf['investment'] ?> </td>
      <td> 
        <a href="<?php echo $host; ?>/manager/review?id=<?php echo $inf['id']; ?>"><input type="button" class="btn btn-info pull-left newbutton" name="review" value="Edit"></a> 
        <a href="<?php echo $host; ?>/manager/delete?id=<?php echo $inf['id']; ?>"><input type="button" class="btn btn-info pull-left newbutton" name="delete" value="Delete"></a> 
      </td>
    </tr>  
     <? endforeach; ?>
  </tbody>
</table>

<?php } ?>