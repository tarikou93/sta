<?php
if (!isset($_SESSION))
  {
    session_start();
  }
 ?>
	<div class="pre-loader"></div>
	<div class="header clearfix">
		<div class="header-right">
			<div class="brand-logo">
				<a href="#">
					<img src="vendors/images/logo.png" alt="" class="mobile-logo">
				</a>
			</div>
			<div class="menu-icon">
				<span></span>
				<span></span>
				<span></span>
				<span></span>
			</div>
			<div class="user-info-dropdown">
				<div class="dropdown">
					<a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
						<span class="user-icon"><i class="fa fa-user-o"></i></span>
						<span class="user-name"><?php echo $_SESSION['user'] ?></span>
					</a>
					<div class="dropdown-menu dropdown-menu-right">
						<a class="dropdown-item" href="#"><i class="fa fa-user-md" aria-hidden="true"></i> Profile</a>
						<a class="dropdown-item" href="#"><i class="fa fa-question" aria-hidden="true"></i> Help</a>
						<a class="dropdown-item" href="#"><i class="fa fa-cog" aria-hidden="true"></i> Setting</a>
            <a class="dropdown-item" href="#" onclick="deconn()"><i class="fa fa-sign-out" aria-hidden="true"></i> Log Out</a>

						<form id="deconnexionForm"  action="servlets/deconnexion.php" method="post">

						</form>
						<script type="text/javascript">
							function deconn(){
								document.getElementById("deconnexionForm").submit();
							}
						</script>
					</div>
				</div>
			</div>
			<div class="user-notification">
				<div class="dropdown">
					<a class="dropdown-toggle no-arrow" href="#" role="button" data-toggle="dropdown">
            <i class="fa fa-bell" aria-hidden="true"></i>

            <?php
                if($_SESSION['notif'] > 0){
                  echo '<span class="text-danger">'. $_SESSION['notif']  .'</span>';
                }


             ?>

					</a>
					<div class="dropdown-menu dropdown-menu-right">
						<div class="notification-list mx-h-350 customscroll">
							<ul>
								<li>
                  <?php
                      if($_SESSION['notif'] > 0){
                      echo '<a href="listEvent.php" >
    										   <img src="vendors/images/rdv.png" alt="">
    										   <h4 class="clearfix"> vous avez '. $_SESSION['notif']  .' évènement(s) proche(s) </h4>
    									   </a>';
                      }

                      else{
                        echo '<a href="#">
      										<img src="vendors/images/img.jpg" alt="">
      										<h4 class="clearfix"> vous n\'avez aucun évènement pour demain </h4>
      									</a>';
                      }

                   ?>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>



  <form id="formNotif" action="servlets/addEvent1.php" method="post">

  </form>
