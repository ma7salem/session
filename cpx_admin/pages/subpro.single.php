<?php  
if(isset($_GET['id'])){
    $id = mysqli_real_escape_string($conn, $_GET['id']);
}
$supbro = getDataById('subpro', $id) ?>
<div class="box box-info">
        <div class="box-header">
            <h3 class="box-title">Add sub product</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
                        <form method="post" action="" enctype="multipart/form-data" class="container"  style="width: 80%;">
                <div class="input-group  margin-v">
                    <div class="input-group-btn" >
                        <label for="d" class="btn btn-success">Name</label>
                    </div>
                    <input type="text"  name="title"  id="d" value="<?= $supbro['name'] ?>"  class="form-control input">
                </div><br>
                            
                
                            
                <div class="input-group img-entry margin-v">
                    <div class="input-group-btn">
                        <label for="img1" class="btn btn-success">PDF File</label>
                    </div>
                    <input type="file" id="img1" name="image" class="form-control">
                    <input type="hidden" value="<?= $supbro['pdf'] ?>" id="img1" name="old" class="form-control">
                </div><br>
                
                <div class="row">
                <!--<div class="col-md-6">
                    <div class="box box-info">

                        <div class="box-body">
                            <label for="excrept">Price</label>
                            <input type="number" class="form-control" name="excrept" id="excrept" />

                        </div>

                    </div>
                </div>-->
           <div class="col-md-4">
                    <div class="box box-info"><div class="box-body">
                            <label for="categ">
                                Category
                            </label>
                    <select required="required" id="categ" class="form-control" name="category">
                         <option value="" disabled selected>Select Category</option>
                         <option value="0" selected>No Category</option>
                    <?php 
                        $q1 = "SELECT * FROM sub_cat";
                        $r1 = mysqli_query($conn, $q1);
                        while ($f = mysqli_fetch_array($r1)) {
                            $pidsc[] = $f['category'];
                            }
                        $q = "SELECT * FROM category ORDER BY id DESC";
                        $r = mysqli_query($conn, $q);
                        while($cat = mysqli_fetch_array($r)){
                             if(in_array($cat['id'], $pidsc)){
                                    
                                        continue;
                                    }else{
                                        if($supbro['cat'] == $cat['id']){
                                            ?>
                                            <option value="<?= $cat['id'] ?>" selected><?= $cat['name'] ?></option>
                                            <?php
                                        }else{
                                            ?>
                                             <option value="<?= $cat['id'] ?>"><?= $cat['name'] ?></option>
                                            <?php
                                        }
                    ?>
                       
                      <?php }} ?>   
                       </select>
                            </div>
                        </div>
                     </div>
                     <!-- End -->
               <div class="col-md-4">
                    <div class="box box-info"><div class="box-body">
                            <label for="categ">
                               Sub Category
                            </label>
                    <select required="required" id="categ" class="form-control" name="subcat">
                         <option value="" disabled selected>Select Sub-Category</option>
                         <option value="0" selected>No Sub-Category</option>
                    <?php 
                        $q1 = "SELECT * FROM products";
                        $r1 = mysqli_query($conn, $q1);
                        while ($f = mysqli_fetch_array($r1)) {
                            $pidp[] = $f['category'];
                            }
                        $q = "SELECT * FROM sub_cat ORDER BY id DESC";
                        $r = mysqli_query($conn, $q);
                        while($cat = mysqli_fetch_array($r)){
                             if(in_array($cat['id'], $pidp)){
                                    
                                        continue;
                                    }else{
                                        if($supbro['subcat'] == $cat['id']){
                                            ?>
                                            <option value="<?= $cat['id'] ?>" selected><?= $cat['name'] ?></option>
                                            <?php
                                        }else{
                                            ?>
                                             <option value="<?= $cat['id'] ?>"><?= $cat['name'] ?></option>
                                            <?php
                                        }
                    ?>
                       
                      <?php }} ?>   
                       </select>
                            </div>
                        </div>
                     </div>

                     <!-- End -->

                  <div class="col-md-4">
                    <div class="box box-info"><div class="box-body">
                            <label for="categ">
                               Products
                            </label>
                    <select required="required" id="categ" class="form-control" name="pro">
                         <option value="" disabled selected>Select product</option>
                    
                    <?php 
                        
                        $q = "SELECT * FROM products ORDER BY id DESC";
                        $r = mysqli_query($conn, $q);
                        while($cat = mysqli_fetch_array($r)){
                            
                                        if($supbro['pro'] == $cat['id']){
                                            ?>
                                            <option value="<?= $cat['id'] ?>" selected><?= $cat['title'] ?></option>
                                            <?php
                                        }else{
                                            ?>
                                             <option value="<?= $cat['id'] ?>"><?= $cat['title'] ?></option>
                                            <?php
                                        }
                    ?>
                       
                      <?php } ?>   
                       </select>
                            </div>
                        </div>
                     </div>

                </div>


                <div class="clearfix"></div>
                <div class="box box-success">
                    <div class="box-header">
                        <h3 class="box-title">Product Content
                            <small>
                                <span id="count" class="hidden"></span>
                                
                            </small>
                        </h3>
                        <!-- tools box -->
                        <div class="pull-right box-tools">
                        </div>
                        <!-- /. tools -->
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body pad">

                           <textarea id="editor1" name="content" class="form-control" rows="80" cols="80" style="height:400px"> 
                              <?= $supbro['descrp'] ?>                                      
                            </textarea>
                            <script type="text/javascript">
                                CKEDITOR.replace( 'editor1' );
                            </script>

                    </div>
                </div>

                <div class="clearfix"></div>

                <div class="col-md-4 col-md-offset-8 text-right">
                    <button type="submit" name="submit" class="btn btn-bitbucket btn-lg">Submit</button>
                </div>
                <div class="clearfix"></div>
                <?php
                    if($_SERVER['REQUEST_METHOD'] == 'POST'){
                            $title = mysqli_real_escape_string($conn, $_POST['title']);
                            $excrept = mysqli_real_escape_string($conn, $_POST['subcat']);
                            $category = mysqli_real_escape_string($conn, $_POST['category']);
                            //$description = mysqli_real_escape_string($conn, $_POST['description']);
                            //$keywords = mysqli_real_escape_string($conn, $_POST['keywords']);
                            $content = mysqli_real_escape_string($conn, $_POST['content']);
                            //$pro_time = mysqli_real_escape_string($conn, $_POST['pro_time']);
                            //$to = mysqli_real_escape_string($conn, $_POST['to_time']);
                            $hotel = mysqli_real_escape_string($conn, $_POST['pro']);
                            $img = mysqli_real_escape_string($conn, $_POST['old']);
                            
                            
                            
                                
                                   // $pro = mysqli_insert_id($conn);
                               if(!empty($_FILES['image']['name'])){
                                $img = $_FILES['image']['name'];
                                $img_tmp = $_FILES['image']['tmp_name'];
                                $number = rand(120, 35000);    
                                $img = $number.'_'.$_FILES['image']['name'];
                               }         
                                 
                               
                                $allowed =  array('pdf');
                                $ext = pathinfo($img, PATHINFO_EXTENSION);
                                   if(in_array($ext,$allowed)){  
                                    $q = "UPDATE subpro SET name = '$title' , descrp = '$content' , pdf = '$img' , cat = $category , subcat = $excrept , pro = $hotel ";
                                    $q .= "WHERE id = $id";
                                 //echo $q;
                                    $r= mysqli_query($conn, $q);
                                   
                                        move_uploaded_file($img_tmp,"../uploads/product/$img");
                                        echo "<script>window.open('?p=subpro.view', '_self')</script>";
                                   }else{
                                    echo '<div class="alert alert-danger" style="margin-top: 30px">Check File type</div>';
                                   }
                                   
                                   //echo $pro;
                                   
                          
                    }

                ?>
            </form>

        </div>
        <!-- /.box-body -->
    </div>
