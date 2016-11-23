<?php 
function admin_session_check($url)
{
   $ci=&get_instance();
   if (  $ci->session->userdata('reg_user_session') != 1) 
   {
       redirect($url);
   }
}
?>