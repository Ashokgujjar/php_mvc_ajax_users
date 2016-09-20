 <?php

    require_once './connection.php';

    if(isset($_GET['controller']) && isset($_GET['action'])){
        $controller = $_GET['controller'];
        $action = $_GET['action'];
        require_once './routes.php';
        exit;
    }
?>
<html>
    <header>
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <script>
           
        function redirectTo(controller, action, extra = ""){
            
            var dataString = ""
            if(controller === "user" && (action === "saveuser" || action === "updateuser")){
                var name = $("input#username").val();
                var userid = $("input#userid").val();
                var email = $("input#email").val();
                var phone = $("input#phone").val();
                var dataString = 'userid='+ userid + '&username='+ name + '&email=' + email + '&phone=' + phone;
            }
            
            $.ajax({
                
                type: 'POST',
                url: 'index.php?controller=' + controller + '&action=' + action + extra,                
                data:dataString,
                
                success: function(data) {
                    
                    if(controller === "user" && (action === "adduser" || action === "edituser")){
                        $('#userform').html(data);
                    }else{
                        $('#data').html(data);
                    }
                    
                }
            });
        }

        </script>
        <title>User Management</title>
        <button onclick="redirectTo('page','home')">Home</button>
        <button onclick="redirectTo('user','listuser')">Users</button>
    </header>
    <body>  
        <div id="data">
            
        </div>  
    </body>
</html>

