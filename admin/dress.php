<?php 
 include('top.php');
 $condition='';
 $condition1='';
 if($_SESSION['ADMIN_ROLE']==1){
	$condition=" and dress.added_by='".$_SESSION['ADMIN_ID']."'";
	$condition1=" and dress.added_by='".$_SESSION['ADMIN_ID']."'";
}

if(isset($_GET['type']) && $_GET['type']!=='' && isset($_GET['id']) && $_GET['id']>0){
	$type= get_safe_value($_GET['type']);
	$id= get_safe_value($_GET['id']);
	if($type=='delete'){
		mysqli_query($con,"delete from dress where id='$id'  $condition1");
		redirect('dress.php');
	}

	if($type=='active' || $type=='deactive'){
		$status=1;
		if($type=='deactive'){
			$status=0;
		}
		mysqli_query($con,"update dress set status='$status' $condition1 where id='$id' ");
		redirect('dress.php');
	}

}


$sql="select dress.*,category.dress_category from dress,category where
 dress.category_id= category.id $condition order by dress.id desc";
$res=mysqli_query($con,$sql);
$count=mysqli_num_rows($res);

?>
  <div class="card">
            <div class="card-body">
              <h1 class="grid_title">Dress Master</h1>
			        <a href="manage_dress.php" class="add_link">Add Dress</a>
              <div class="row grid_box">
				        <div class="col-12">
                  <div class="table-responsive">
                    <table id="order-listing" class="table">
                      <thead>
                        <tr>
                            <th width="2%">S.No </th>
                            <th width="4%">Category</th>
                            <th width="8%">Dress Name</th>
														<th width="1%">Price</th>
														<th width="11%">Rent Price</th>
														<th width="2%">txt</th>
														<th width="2%">Days</th>
														<th width="5%">Image</th>
                            <th width="8%">Added_on</th>
                            <th width="36%">Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php if($count>0){
						              $i=1;
						              while($row=mysqli_fetch_assoc($res)){
						              ?>
						              <tr>
                            <td><?php echo $i?></td>
                            <td><?php echo $row['dress_category']?></td>
                            <td><?php echo $row['dress_name']?></td>
														<td><?php echo $row['price']?></td>
														<td><?php echo $row['rent_price']?></td>
														<td><?php echo $row['security_charge']?></td>
														<td><?php echo $row['qty']?></td>
														<td><a target="_blank" href="<?php echo SITE_DRESS_IMAGE.$row['image']?>">
														<img src="<?php echo SITE_DRESS_IMAGE.$row['image']?>">
													  </a></td>
													 <td>
														 <?php
														  $datestr=strtotime($row['added_on']);
															echo date('Y-m-d',$datestr);
															?>
                            </td>
							              <td>
                             <a href="manage_dress.php?id=<?php echo $row['id']?>"><label class="badge badge-success hand_cursor">Edit</label></a>&nbsp;
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
							              <td colspan="9">No data found</td>
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