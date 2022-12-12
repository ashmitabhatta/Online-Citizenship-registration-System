     <?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['OBCMSaid']==0)) {
  header('location:logout.php');
  } else{



  ?>
  <div class="left-sidebar-pro">
            <nav id="sidebar">
                <div class="sidebar-header">
                    <a href="#"><img src="img/message/avatar.jpg" alt="" />
                    </a>
                    <?php
$aid=$_SESSION['OBCMSaid'];
$sql="SELECT AdminName,Email from  tbladmin where ID=:aid";
$query = $dbh -> prepare($sql);
$query->bindParam(':aid',$aid,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
                    <h3> <?php  echo $row->AdminName;?></h3>
                    <p> <?php  echo $row->Email;?></p>
                  <?php $cnt=$cnt+1;}} ?>
                </div>
                <div class="left-custom-menu-adp-wrap">
                    <ul class="nav navbar-nav left-sidebar-menu-pro">
                        <li class="nav-item">
                            <a href="dashboard.php" role="button" aria-expanded="false"><i class="fa big-icon fa-home"></i> <span class="mini-dn">Home</span> </a>
                            
                        </li>
                       
                       
                      
                       
                        <li class="nav-item"><a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><i class="fa big-icon fa-table"></i> <span class="mini-dn">Citizenship Applications</span> <span class="indicator-right-menu mini-dn"><i class="fa indicator-mn fa-angle-left"></i></span></a>
                            <div role="menu" class="dropdown-menu left-menu-dropdown animated flipInX">
                                <a href="new-ctzn-application.php" class="dropdown-item">New Record</a>
                                <a href="verified-ctzn-application.php" class="dropdown-item">Verified Record(s)</a>
                                <a href="rejected-ctzn-application.php" class="dropdown-item">Rejected</a>
                                <a href="all-ctzn-application.php" class="dropdown-item">All Record(s)</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <?php }  ?>