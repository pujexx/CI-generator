<?php echo anchor('setting_content/add','add');?>
<br>
<?php echo anchor('front','back');?>
<?php echo form_open('setting_content/delete');?>


<table border="1">


    <tr>
        
        <td>id_setting</td>
       
        
        <td>title_setting</td>
        
        <td>content_setting</td>
        
        <td>Action</td>

    </tr>
    <?php foreach ($setting_contents as $setting_content) { ?>

        <tr>
            <td><?php echo form_checkbox('id_setting[]',$setting_content['id_setting']).$setting_content['id_setting']; ?></td>

             
            <td><?php echo $setting_content['title_setting']; ?></td>
           
            <td><?php echo $setting_content['content_setting']; ?></td>
           
            <td><a href="<?php echo site_url().'/setting_content/form_update/'.$setting_content['id_setting'];?>" >Edit</a>
        </tr>
 
        <td>id_category_setting</td>
       
        
        <td>title_setting</td>
        
        <td>content_setting</td>
        
        <td>Action</td>

    </tr>
    <?php foreach ($setting_contents as $setting_content) { ?>

        <tr>
            <td><?php echo form_checkbox('id_category_setting[]',$setting_content['id_category_setting']).$setting_content['id_category_setting']; ?></td>

             
            <td><?php echo $setting_content['title_setting']; ?></td>
           
            <td><?php echo $setting_content['content_setting']; ?></td>
           
            <td><a href="<?php echo site_url().'/setting_content/form_update/'.$setting_content['id_category_setting'];?>" >Edit</a>
        </tr>
 
<?php } ?>
</table>
<?php echo $pagination; ?>
<br>
<input type="submit" value="delete" onclick="return confirm('are you sure ?');">

<?php echo form_close();?>