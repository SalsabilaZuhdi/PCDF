    <div id="sidebar" class="sidebar responsive ace-save-state">
			  <script type="text/javascript">
					try{ace.settings.loadState('sidebar')}catch(e){}
				</script><!-- /.sidebar-shortcuts -->
                                                        <!----navigation-->
				<ul class="nav nav-list">
				<!-- admin   -->
					<?php
					if(@$_SESSION['position'] == "1" ) 
					{ ?>
					<li class="">
						<a href="main.php">
							<i class="menu-icon fa fa-desktop"></i>
							<span class="menu-text"> Dashboard </span>
						</a>

						<b class="arrow"></b>
					</li>

                    <li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-group "></i>
							<span class="menu-text"> Staff </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">

							<li class="">
								<a href="addStaff.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Add New Staff
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="staffPMA.php">
									<i class="menu-icon fa fa-caret-right"></i>
									PMA
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="staffSKOIL.php">
									<i class="menu-icon fa fa-caret-right"></i>
									SK OIL
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="staffSKGAS.php">
									<i class="menu-icon fa fa-caret-right"></i>
									SK GAS
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="staffSBA.php">
									<i class="menu-icon fa fa-caret-right"></i>
									SBA
								</a>

								<b class="arrow"></b>
							</li>
							
						</ul>
					</li>

					<li class="">
						<a href="changePassword.php">
							<i class="menu-icon fa fa-lock"></i>
							<span class="menu-text"> Change Password </span>
						</a>

						<b class="arrow"></b>
					</li>	

					<li class="">
						<a href="logout.php">
							<i class="menu-icon fa fa-sign-out"></i>
							<span class="menu-text"> Log Out </span>
						</a>

						<b class="arrow"></b>
					</li>
         			<!-- Admin PMA -->
					<?php
					}
					else if(@$_SESSION['position'] == "2" ) 
					{ ?>
					<li class="">
						<a href="main.php">
							<i class="menu-icon fa fa-desktop"></i>
							<span class="menu-text"> Dashboard </span>
						</a>

						<b class="arrow"></b>
					</li>

                    <li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-group "></i>
							<span class="menu-text"> Staff </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="">
								<a href="addStaff.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Add New Staff
								</a>
								<b class="arrow"></b>
							</li>
							<li class="">
								<a href="staffPMA.php">
									<i class="menu-icon fa fa-caret-right"></i>
									PMA
								</a>
								<b class="arrow"></b>
							</li>
						</ul>
					</li>

					<li class="">
						<a href="changePassword.php">
							<i class="menu-icon fa fa-lock"></i>
							<span class="menu-text"> Change Password </span>
						</a>

						<b class="arrow"></b>
					</li>	

					<li class="">
						<a href="logout.php">
							<i class="menu-icon fa fa-sign-out"></i>
							<span class="menu-text"> Log Out </span>
						</a>

						<b class="arrow"></b>
					</li>
					<!-- Admin SKOIL  -->
					<?php }
					else if (@$_SESSION['position'] == "3" )
					{ ?>
					<li class="">
						<a href="main.php">
							<i class="menu-icon fa fa-desktop"></i>
							<span class="menu-text"> Dashboard </span>
						</a>

						<b class="arrow"></b>
					</li>

                    <li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-group "></i>
							<span class="menu-text"> Staff </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="">
								<a href="addStaff.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Add New Staff
								</a>
								<b class="arrow"></b>
							</li>
							<li class="">
								<a href="staffSKOIL.php">
									<i class="menu-icon fa fa-caret-right"></i>
									SKOIL
								</a>
								<b class="arrow"></b>
							</li>
						</ul>
					</li>

					<li class="">
						<a href="changePassword.php">
							<i class="menu-icon fa fa-lock"></i>
							<span class="menu-text"> Change Password </span>
						</a>

						<b class="arrow"></b>
					</li>	

					<li class="">
						<a href="logout.php">
							<i class="menu-icon fa fa-sign-out"></i>
							<span class="menu-text"> Log Out </span>
						</a>

						<b class="arrow"></b>
					</li>
					<!-- Admin SKGAS  -->
					<?php }
					else if (@$_SESSION['position'] == "4" )
					{ ?>
					
					<li class="">
						<a href="main.php">
							<i class="menu-icon fa fa-desktop"></i>
							<span class="menu-text"> Dashboard </span>
						</a>

						<b class="arrow"></b>
					</li>

                    <li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-group "></i>
							<span class="menu-text"> Staff </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="">
								<a href="addStaff.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Add New Staff
								</a>
								<b class="arrow"></b>
							</li>
							<li class="">
								<a href="staffSKGAS.php">
									<i class="menu-icon fa fa-caret-right"></i>
									SKGAS
								</a>
								<b class="arrow"></b>
							</li>
						</ul>
					</li>

					<li class="">
						<a href="changePassword.php">
							<i class="menu-icon fa fa-lock"></i>
							<span class="menu-text"> Change Password </span>
						</a>

						<b class="arrow"></b>
					</li>	

					<li class="">
						<a href="logout.php">
							<i class="menu-icon fa fa-sign-out"></i>
							<span class="menu-text"> Log Out </span>
						</a>

						<b class="arrow"></b>
					</li>

					<!-- Admin SBA  -->
					<?php }
					else if (@$_SESSION['position'] == "5" )
					{ ?>
					
					<li class="">
						<a href="main.php">
							<i class="menu-icon fa fa-desktop"></i>
							<span class="menu-text"> Dashboard </span>
						</a>

						<b class="arrow"></b>
					</li>

                    <li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-group "></i>
							<span class="menu-text"> Staff </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="">
								<a href="addStaff.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Add New Staff
								</a>
								<b class="arrow"></b>
							</li>
							<li class="">
								<a href="staffSBA.php">
									<i class="menu-icon fa fa-caret-right"></i>
									SBA
								</a>
								<b class="arrow"></b>
							</li>
						</ul>
					</li>

					<li class="">
						<a href="changePassword.php">
							<i class="menu-icon fa fa-lock"></i>
							<span class="menu-text"> Change Password </span>
						</a>

						<b class="arrow"></b>
					</li>	

					<li class="">
						<a href="logout.php">
							<i class="menu-icon fa fa-sign-out"></i>
							<span class="menu-text"> Log Out </span>
						</a>

						<b class="arrow"></b>
					</li>
					<?php }?>
			  </ul>
              
              <!-- /.nav-list -->



				<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
					<i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
				</div>
			</div>