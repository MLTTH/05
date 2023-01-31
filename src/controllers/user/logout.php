<?php  
namespace App\Controllers\User;

class LogoutController{
    
    public function execute ()
{  
    session_destroy();  
    header("location:index.php");  
}
}
