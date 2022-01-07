<!-- BEGIN .app-side -->
<aside class="app-side" id="app-side">
	<!-- BEGIN .side-content -->
	<div class="side-content ">
		<!-- BEGIN .user-profile -->
		<div class="user-profile">
			<img src="<?= base_url('assets_backend/back_end/') ?>img/user.png" class="profile-thumb" alt="User Thumb">
			<h6 class="profile-name">Nama session</h6>
			<ul class="profile-actions">
				
			</ul>
		</div>
		<!-- END .user-profile -->
		<!-- BEGIN .side-nav -->
		<nav class="side-nav">
			<!-- BEGIN: side-nav-content -->
			<ul class="unifyMenu" id="unifyMenu">

				
							<li class="selected">
								<a href="#">
									<span class="has-icon">
										<i class="far fa-building btn-sm"></i>
									</span>
									<span class="nav-title">Module no parent</span>
								</a>
							</li>
							<li class="">
								<a href="#" class="has-arrow" aria-expanded="false">
									<span class="has-icon">
										<i class="far fa-building btn-sm"></i>
									</span>
									<span class="nav-title">Module have parent</span>
								</a>
								<ul aria-expanded="false">
									<li>
										<a href="#">Sub module</a>
									</li>
								</ul>
							</li>
			</ul>
			<!-- END: side-nav-content -->
		</nav>
		<!-- END: .side-nav -->
	</div>
	<!-- END: .side-content -->
</aside>
<!-- END: .app-side -->