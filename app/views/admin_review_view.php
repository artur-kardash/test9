<div>
  <div class="form-group add">
   <a href="<?php echo $host . "/admin/addcustomer?id=".$data['inf']['id'];?>"><input type="submit" class="btn btn-primary newbutton"  value="Add new user" ></a>
</div>
</div>
<div class="right_col" role="main">

<div style="display: block; float: left; width: 25%; position: relative;">
    <h1>Review</h1>
  <table>
       <input type='hidden' name='id_client' value='<?php echo $data['inf']['id_ag'];?>'/>
       <input type='hidden' name='id_us' value='<?php echo $data['inf']['id'];?>'/>
        <tr>
           <th>Firstame: </th><td><?php echo $data['inf']['firstname']?></td>
        </tr>
        <tr>
           <th>Lastname: </th><td><?php echo $data['inf']['lastname']?></td>
        </tr>
         <tr>
           <th>DOB: </th><td><?php echo $data['inf']['dob']?></td>
        </tr>
         <tr>
           <th>Phone: </th><td><?php echo $data['inf']['phone']?></td>
        </tr>
        <tr>
           <th>Email: </th><td><?php echo $data['inf']['email']?></td>
        </tr>
        <tr>
           <th>Password: </th><td>****</td>
        </tr>
            
  </table>
           
      <button style="margin-top:20px;" type="submit" name="id" value="<?php echo $data['inf']['id_ag']?>" data-toggle="modal" data-target="#edit" class="btn btn-primary newbutton">Edit</button>
      <a href="<?php echo $host; ?>/admin/allusers"><input style="margin-top: 20px;" type="button" class="btn btn-primary newbutton" name="back" value="Back"></a>
      <a href="<?php echo $host; ?>/admin/addcli?id=<?php echo $inf['id_ag']; ?>"><input style="margin-top: 20px;" type="button" class="btn btn-primary newbutton" name="back" value="Add new client"></a>
      <h5><?php echo $data['inf']['firstname']?> has <?php echo $data['count']['lim']?> clients</h5>
     
</div>

    <div class="customers">
        <h1><?php echo $data['inf']['firstname']?> users</h1>
      <table>
          <thead>
            <tr>
              <th width="5%" >ID</th>
              <th width="25%">Name</th>
              <th width="20%">DOB</th>
              <th width="20%">Phone</th>
              <th width="20%">Actions</th>
            </tr>
          </thead>
          <tbody>
            <tr>
            <? foreach($data['cli'] as $info) :?>
              <td> <?= $info['id'] ?> </td>
              <td> <?= $info['firstname']." ".$info['lastname'] ?> </td>
              <td> <?= $info['dob'] ?> </td>
              <td> <?= $info['phone'] ?> </td>
              <td> 
                <a href="<?php echo $host; ?>/admin/reviewcust?id=<?php echo $info['id']; ?>"><input class="btn btn-info pull-left newbutton" type="button" name="review" value="View/Edit"></a> 
                <a href="<?php echo $host; ?>/admin/deletecust?id=<?php echo $info['id']; ?>"><input class="btn btn-info pull-left newbutton" type="button" name="delete" value="Delete"></a> 
              </td>
            </tr>  
             <? endforeach; ?>
          </tbody>
      </table>
    </div>
</div>

<!-- modal window -->

<div class="modal fade" id="edit"  tabindex="-1" role="dialog" aria-labelledby="editCampaign">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="exampleModalLabel">Edit: </h4>
        </div>


    <form id="editCliorm" enctype="multipart/form-data" action="<?php echo $host . "/admin/"; ?>updateprofil" method="post">
          <div class="modal-body">
            <input type="hidden" class="form-control" name="id_sus" value="<?php echo $data['inf']['id']?>" />
            <input type="hidden" class="form-control" name="id" value="<?php echo $data['inf']['id_ag']?>" />
              <div class='form-group'>
              <label>Firstname:</label>
                  <input type="text" class="form-control" name="firstname" value="<?php echo $data['inf']['firstname']?>" placeholder = "Firstname" required />
              </div>
              <div class='form-group'>
              <label>Lastname:</label>
                  <input type="text" class="form-control" name="lastname" value="<?php echo $data['inf']['lastname']?>" placeholder = "Lastname" required />
              </div>
              <div class='form-group'>
              <label>DOB:</label>
                  <input type="date" class="form-control" name="dob" value="<?php echo $data['inf']['dob']?>" placeholder = "DOB" required />
              </div>
              <div class='form-group'>
              <label>Phone:</label>
                  <input type="text" class="form-control" name="phone" value="<?php echo $data['inf']['phone']?>" placeholder = "Phone" required />
              </div>
              <div class='form-group'>
              <label>Email:</label>
                  <input type="email" class="form-control" name="email" value="<?php echo $data['inf']['email']?>" placeholder = "Email" required />
              </div>
               <div class='form-group'>
               <label>Password:</label>
                  <input type="password" class="form-control" name="password" placeholder = "Password" />
              </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Closed</button>
              <button type="submit" class="btn btn-primary newbutton">Save</button>
            </div>
          </div>
    </form>
    </div>
  </div>
</div>

      

