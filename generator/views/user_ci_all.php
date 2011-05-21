<?php echo anchor('user_ci/add','add');?>
<br>
<?php echo anchor('front','back');?>
<?php echo form_open('user_ci/delete');?>


<table border="1">


    <tr>
        
        <td>id</td>
       
        
        <td>username</td>
        
        <td>password</td>
        
        <td>email</td>
        
        <td>level</td>
        
        <td>status</td>
        
        <td>Action</td>

    </tr>
    <?php foreach ($user_cis as $user_ci) { ?>

        <tr>
            <td><?php echo form_checkbox('id[]',$user_ci['id']).$user_ci['id']; ?></td>

             
            <td><?php echo $user_ci['username']; ?></td>
           
            <td><?php echo $user_ci['password']; ?></td>
           
            <td><?php echo $user_ci['email']; ?></td>
           
            <td><?php echo $user_ci['level']; ?></td>
           
            <td><?php echo $user_ci['status']; ?></td>
           
            <td><a href="<?php echo site_url().'/user_ci/form_update/'.$user_ci['id'];?>" >Edit</a>
        </tr>
 
<?php } ?>
</table>
<?php echo $pagination; ?>
<br>
<input type="submit" value="delete" onclick="return confirm('are you sure ?');">

<?php echo form_close();?>