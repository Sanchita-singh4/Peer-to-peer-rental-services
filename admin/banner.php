<?php 
 include('top.php');
 isAdmin();

if(isset($_GET['type']) && $_GET['type']!=='' && isset($_GET['id']) && $_GET['id']>0){
	$type= get_safe_value($_GET['type']);
	$id= get_safe_value($_GET['id']);
	if($type=='delete'){
		mysqli_query($con,"delete from banner where id='$id'");
		redirect('banner.php');
	}
	if($type=='active' || $type=='deactive'){
		$status=1;
		if($type=='deactive'){
			$status=0;
		}
		mysqli_query($con,"update banner set status='$status' where id='$id'");
		redirect('banner.php');
	}

}

$sql="select * from banner order by order_number asc";
$res=mysqli_query($con,$sql);
$count=mysqli_num_rows($res);

?>
  <div class="card">
            <div class="card-body">
              <h1 class="grid_title">banner Master</h1>
			        <a href="manage_banner.php" class="add_link">Add banner</a>
              <div class="row grid_box">
				        <div class="col-12">
                  <div class="table-responsive">
                    <table id="order-listing" class="table">
                      <thead>
                        <tr>
                            <th width="10%">S.No #</th>
                            <th width="10%">Heading1</th>
                            <th width="10%">Heading2</th>
                            <th width="15%">Btn Text</th>
                            <th width="15%">Btn Link</th>
                            <th width="10%">Image</th>
                            <th width="30%">Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php if($count>0){
						              $i=1;
						              while($row=mysqli_fetch_assoc($res)){
						              ?>
						              <tr>
                            <td><?php echo $row['id']?></td>
                            <td><?php echo $row['heading1']?></td>
							              <td><?php echo $row['heading2']?></td>
                            <td><?php echo $row['btn_text']?></td>
                            <td><?php echo $row['btn_link']?></td>
                            <td><img src="<?php echo SITE_BANNER_IMAGE.$row['image']?>"></td>
							              <td>
								             <a href="manage_banner.php?id=<?php echo $row['id']?>"><label class="badge badge-success hand_cursor">Edit</label></a>&nbsp;
								             <?php
								             if($row['status']==1){
								             ?>
								             <a href="?id=<?php echo $row['id']?>&type=deactive"><label class="badge badge-danger hand_cursor">Active</label></a>
								             <?php
								             }else{
								              ?>
								             <a href="?id=<?php echo $row['id']?>&type=active"><label class="badge badge-info hand_cursor">Deactive</label></a>
								             <?php
								              }
								              ?>
							              	&nbsp;
								              <a href="?id=<?php echo $row['id']?>&type=delete"><label class="badge badge-danger delete_red hand_cursor">Delete</label></a>
							              </td>
                         </tr>
                          <?php 
						              $i++;
						             } } else { ?>
						              <tr>
							              <td colspan="5">No data found</td>
						             </tr>
						              <?php } ?>
                      </tbody>
                    </table>
                  </div>
				       </div>
              </div>
            </div>
          </div>
        
<?php include('footer.php');?>
