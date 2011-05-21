<?php echo anchor('portofolio/add','add');?>
<br>
<?php echo anchor('front','back');?>
<?php echo form_open('portofolio/delete');?>


<table border="1">


    <tr>
        
        <td>id_portofolio</td>
       
        
        <td>title_portofolio</td>
        
        <td>content_portofolio</td>
        
        <td>pict_tumbh</td>
        
        <td>Action</td>

    </tr>
    <?php foreach ($portofolios as $portofolio) { ?>

        <tr>
            <td><?php echo form_checkbox('id_portofolio[]',$portofolio['id_portofolio']).$portofolio['id_portofolio']; ?></td>

             
            <td><?php echo $portofolio['title_portofolio']; ?></td>
           
            <td><?php echo $portofolio['content_portofolio']; ?></td>
           
            <td><?php echo $portofolio['pict_tumbh']; ?></td>
           
            <td><a href="<?php echo site_url().'/portofolio/form_update/'.$portofolio['id_portofolio'];?>" >Edit</a>
        </tr>
 
        <td>id_category_portofolio</td>
       
        
        <td>title_portofolio</td>
        
        <td>content_portofolio</td>
        
        <td>pict_tumbh</td>
        
        <td>Action</td>

    </tr>
    <?php foreach ($portofolios as $portofolio) { ?>

        <tr>
            <td><?php echo form_checkbox('id_category_portofolio[]',$portofolio['id_category_portofolio']).$portofolio['id_category_portofolio']; ?></td>

             
            <td><?php echo $portofolio['title_portofolio']; ?></td>
           
            <td><?php echo $portofolio['content_portofolio']; ?></td>
           
            <td><?php echo $portofolio['pict_tumbh']; ?></td>
           
            <td><a href="<?php echo site_url().'/portofolio/form_update/'.$portofolio['id_category_portofolio'];?>" >Edit</a>
        </tr>
 
<?php } ?>
</table>
<?php echo $pagination; ?>
<br>
<input type="submit" value="delete" onclick="return confirm('are you sure ?');">

<?php echo form_close();?>