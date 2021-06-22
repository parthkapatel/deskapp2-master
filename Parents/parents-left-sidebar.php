<?php ?>
<div class="left-side-bar">
		<div class="brand-logo">
			<a href="<?php echo PARENT_BASE_URL; ?>">
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
							<span class="micon dw dw-user-1"></span><span class="mtext">Manage Kids</span>
						</a>
						<ul class="submenu">
							<li><a href="<?php echo BASE_URL; ?>Parents/addStudent/">Add Kids Data</a></li>
                            <li><a href="<?php echo BASE_URL; ?>Parents/viewKidList/">View Kids Data</a></li>
						</ul>
					</li>

					<li class="dropdown">
						<a href="javascript:;" class="dropdown-toggle">
							<span class="micon dw dw-user-1"></span><span class="mtext">Lesson</span>
						</a>
						<ul class="submenu">
							<li><a href="<?php echo BASE_URL; ?>Parents/Lessons/">View Lessons</a></li>
							<li><a href="<?php echo BASE_URL; ?>Parents/addStudent/addQuerys">Add Querys</a></li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
	</div>
	<div class="mobile-menu-overlay"></div>