<?php echo anchor('category_setting/add','add');?>
<br>
<?php echo anchor('front','back');?>
<?php echo form_open('category_setting/delete');?>


<table border="1">


    <tr>
        
        <td>id_category_setting</td>
       
        
        <td>title_category_setting</td>
        
        <td>Action</td>

    </tr>
    <?php foreach ($category_settings as $category_setting) { ?>

        <tr>
            <td><?php echo form_checkbox('id_category_setting[]',$category_setting['id_category_setting']).$category_setting['id_category_setting']; ?></td>

             
            <td><?php echo $category_setting['title_category_setting']; ?></td>
           
            <td><a href="<?php echo site_url().'/category_setting/form_update/'.$category_setting['id_category_setting'];?>" >Edit</a>
        </tr>
 
<?php } ?>
</table>
<?php echo $pagination; ?>
<br>
<input type="submit" value="delete" onclick="return confirm('are you sure ?');">

<?php echo form_close();?>