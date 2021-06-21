<?php ?>
<div class="left-side-bar">
		<div class="brand-logo">
			<a href="<?php echo BASE_URL; ?>admin/">
				<img src="<?php echo BASE_URL; ?>vendors/images/deskapp-logo.svg" alt="" class="dark-logo">
				<img src="<?php echo BASE_URL; ?>vendors/images/deskapp-logo-white.svg" alt="" class="light-logo">
			</a>
			<div class="close-sidebar" data-toggle="left-sidebar-close">
				<i class="ion-close-round"></i>
			</div>
		</div>
		<div class="menu-block customscroll">
			<div class="sidebar-menu">
				<ul id="accordion-menu">
					<li>
						<a href="<?php echo BASE_URL; ?>admin/" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-house"></span><span class="mtext">Dashboard</span>
						</a>
					</li>

					<li class="dropdown">
						<a href="javascript:;" class="dropdown-toggle">
							<span class="micon dw dw-user-1"></span><span class="mtext">Parents Request</span>
						</a>
						<ul class="submenu">
							<li><a href="<?php echo BASE_URL; ?>Teachers/parentsRequest/index.php">Request</a></li>
						</ul>
					</li>

					<li class="dropdown">
						<a href="javascript:;" class="dropdown-toggle">
							<span class="micon dw dw-user-1"></span><span class="mtext">Kid Details</span>
						</a>
						<ul class="submenu">
							<li><a href="<?php echo BASE_URL; ?>Teachers/kidDetails/index.php">View Kids Details</a></li>
						</ul>
					</li>
                    <li class="dropdown">
                        <a href="javascript:;" class="dropdown-toggle">
                            <span class="micon dw dw-user-1"></span><span class="mtext">Lessons</span>
                        </a>
                        <ul class="submenu">
                            <li><a href="<?php echo BASE_URL; ?>Teachers/addLessons/index.php">Add Lessons</a></li>
                        </ul>
                    </li>
				</ul>
			</div>
		</div>
	</div>
	<div class="mobile-menu-overlay"></div>