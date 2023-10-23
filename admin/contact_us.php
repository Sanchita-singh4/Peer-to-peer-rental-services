<?php 
 include('top.php');
 isAdmin();
if(isset($_GET['type']) && $_GET['type']!=='' && isset($_GET['id']) && $_GET['id']>0){
	$type= get_safe_value($_GET['type']);
	$id= get_safe_value($_GET['id']);
	if($type=='delete'){
		mysqli_query($con,"delete from contact_us where id='$id'");
		redirect('contact_us.php');
	}
}

$sql="select * from contact_us order by id desc";
$res=mysqli_query($con,$sql);
$count=mysqli_num_rows($res);

?>
  <div class="card">
            <div class="card-body">
              <h1 class="grid_title">Contact Us</h1>
              <div class="row grid_box">
				        <div class="col-12">
                  <div class="table-responsive">
                    <table id="order-listing" class="table">
                      <thead>
                        <tr>
                            <th width="10%">S.No #</th>
                            <th width="15%">Name </th>
                            <th width="15%">Email </th>
                            <th width="25%">Mobile</th>
                            <th width="25%">Query</th>
                            <th width="15%">Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php if($count>0){
						              $i=1;
						              while($row=mysqli_fetch_assoc($res)){
						              ?>
						              <tr>
                            <td><?php echo $i?></td>
                            <td><?php echo $row['name']?></td>
							              <td><?php echo $row['email']?></td>
                            <td><?php echo $row['mobile']?></td>
                            <td><?php echo $row['comment']?></td>
							              <td>
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
