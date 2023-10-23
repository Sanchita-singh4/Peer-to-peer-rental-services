<?php 
 include('top.php');

if(isset($_GET['type']) && $_GET['type']!=='' && isset($_GET['id']) && $_GET['id']>0){
	$type= get_safe_value($_GET['type']);
	$id= get_safe_value($_GET['id']);
	if($type=='delete'){
		mysqli_query($con,"delete from admin where id='$id'");
		redirect('vendor_managment.php');
	}

	if($type=='active' || $type=='deactive'){
		$status=1;
		if($type=='deactive'){
			$status=0;
		}
		mysqli_query($con,"update admin set status='$status' where id='$id'");
		redirect('vendor_managment.php');
	}

}

$sql="select * from admin where role=1 order by id desc";
$res=mysqli_query($con,$sql);
$count=mysqli_num_rows($res);

?>
  <div class="card">
            <div class="card-body">
              <h1 class="grid_title">Vendor Management</h1>
			        <a href="manage_vendor_managment.php" class="add_link">Add Vendor</a>
              <div class="row grid_box">
				        <div class="col-12">
                  <div class="table-responsive">
                    <table id="order-listing" class="table">
                      <thead>
                        <tr>
                            <th width="10%">S.No #</th>
                            <th width="2%">ID</th>
                            <th width="10%">Username</th>
                            <th width="10%">Password</th>
                            <th width="10%">Email</th>
														<th width="10%">Mobile</th>
														<th width="15%">action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php {
						              $i=1;
						              while($row=mysqli_fetch_assoc($res)){
						              ?>
						              <tr>
                            <td><?php echo $i?></td>
														<td><?php echo $row['id']?></td>
                            <td><?php echo $row['username']?></td>
														<td><?php echo $row['password']?></td>
														<td><?php echo $row['email']?></td>
                            <td><?php echo $row['mobile']?></td>
                            <td>
														
                            </td>
							              <td>
                             <a href="manage_vendor_managment.php?id=<?php echo $row['id']?>"><label class="badge badge-success hand_cursor">Edit</label></a>&nbsp;
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
						             } }?>
                      </tbody>
                    </table>
                  </div>
				       </div>
              </div>
            </div>
          </div>
        
<?php include('footer.php');?>