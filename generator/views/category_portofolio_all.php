<?php echo anchor('category_portofolio/add','add');?>
<br>
<?php echo anchor('front','back');?>
<?php echo form_open('category_portofolio/delete');?>


<table border="1">


    <tr>
        
        <td>id_category_portofolio</td>
       
        
        <td>title_category_portofolio</td>
        
        <td>Action</td>

    </tr>
    <?php foreach ($category_portofolios as $category_portofolio) { ?>

        <tr>
            <td><?php echo form_checkbox('id_category_portofolio[]',$category_portofolio['id_category_portofolio']).$category_portofolio['id_category_portofolio']; ?></td>

             
            <td><?php echo $category_portofolio['title_category_portofolio']; ?></td>
           
            <td><a href="<?php echo site_url().'/category_portofolio/form_update/'.$category_portofolio['id_category_portofolio'];?>" >Edit</a>
        </tr>
 
<?php } ?>
</table>
<?php echo $pagination; ?>
<br>
<input type="submit" value="delete" onclick="return confirm('are you sure ?');">

<?php echo form_close();?>