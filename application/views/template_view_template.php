<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <div id="notif">{php_open_first} echo $this->session->flashdata('notif');{php_close_first}</div>
      {php_open_first}
        $this->load->view($content);
       {php_close_first}
    </body>
</html>
