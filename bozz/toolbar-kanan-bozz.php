<div class="col-sm-6 clearfix">
<?php
include "../koneksi.php";
$aa=mysqli_query($koneksi,"select *from user where iduser='$iduser'");
$fefe = mysqli_fetch_array($aa);
?>
                        <div class="user-profile pull-right">
                            <!-- <img class="avatar user-thumb" src="../assets/images/author/avatar.png" alt="avatar">-->
                            <h4 class="user-name dropdown-toggle" data-toggle="dropdown"><?php echo $fefe['username'];?> <i class="fa fa-angle-down"></i></h4>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="../logout.php">Log Out</a>
                            </div>
                        </div>
                    </div>