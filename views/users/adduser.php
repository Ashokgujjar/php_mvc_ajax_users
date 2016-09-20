<H3>From Here you can Add/Update User</h3>

<?php
       
    $userid = (isset($userdata)) ? $userdata['userid'] : "";
    $username = (isset($userdata)) ?  $userdata['username'] : "";
    $email = (isset($userdata)) ?  $userdata['email'] : "";
    $phone = (isset($userdata)) ?  $userdata['phone'] : "";
    $action = (isset($userdata)) ?  "Update User" : "Add User";
    $redirectto = (isset($userdata)) ?  "updateuser" : "saveuser";
       
?>
<form name="userform" method="POST" action="<?php echo $redirectto;?>">           
    User Name: <input type="text" name="username" id="username" value="<?php echo $username;?>" />
    Email: <input type="text" name="email" id="email" value="<?php echo $email;?>" />
    Phone: <input type="text" name="phone" id="phone" value="<?php echo $phone;?>" />
    <input type="hidden" name="userid" id="userid" value="<?php echo $userid;?>" />
    <input type="button" name="action"  value="<?php echo $action;?>" onclick="redirectTo('user','<?php echo $redirectto;?>')"/>
</form>
