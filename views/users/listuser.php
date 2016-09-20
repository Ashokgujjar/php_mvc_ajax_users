<h3 style="color: green;"><?php if(isset($msg) && $msg!=""){echo $msg;} ?></h3>
<p>Here is a list of all Users:</p>


  <table border="1">
      <thead>
      <th>User ID</th>
      <th>User Name</th>
      <th>Email</th>
      <th>Phone</th>
      <th colspan="2">Action</th>
      </thead>
      <tbody>
          <?php foreach($users as $user) { ?>
          <tr>
              <td><?php echo $user->userid; ?></td>
              <td><?php echo $user->username; ?></td>
              <td><?php echo $user->email; ?></td>
              <td><?php echo $user->phone; ?></td>
              <td><button onclick="redirectTo('user','edituser','&userid=<?php echo $user->userid; ?>')">Edit User</button></td>
              <td><button onclick="redirectTo('user','deleteuser','&userid=<?php echo $user->userid; ?>')">Delete User</button></td>
          </tr>
          <?php } ?>
      </tbody>
  </table>  

<br>

<button onclick="redirectTo('user','adduser')">Add New User</button>

<div id="userform">
    
</div>