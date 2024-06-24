<?php $title='Create Topic';?>
<?php include 'inc/header.php' ; ?>
<form action="create.php" method="post" class="p-5">

                 <div class="form-group">
                    <label class="form-label">Topic Title : </label>
                    <input type="text" name="title" class="form-control" >
                 </div>

                 <div class="form-group my-3">
                  <label class="form-label">Category :</label>
                   <select name="category" class="form-control" >
                      <option value="0">choose category</option>
                     <?php foreach($categories as $category): ?>
                        <option value="<?php echo $category->id ; ?>"><?php echo $category->name ;?></option>
                     <?php endforeach ; ?>
                    
                    
                   </select>
                </div>
                

                <div class="form-group my-3">
                  <label class="form-label">Topic Body :</label>
                  <textarea id="body_i" name="body" class="form-control" ></textarea>
                  
                </div>

                <input type="submit" class="btn btn-dark" name="create" value="Create">
               </form>
                  
               
            
          
<?php include 'inc/footer.php'; ?>