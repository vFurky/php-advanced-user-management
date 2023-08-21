<div class="row">
	<div class="col">
		<nav class="navbar navbar-expand-lg navbar-light bg-light rounded-3">
			<div class="container-fluid">
				<a class="navbar-brand" href="./">SLTAX</a>
				<button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<i class="fas fa-bars"></i>
				</button>

				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav me-auto mb-2 mb-lg-0">
						<?php if($user['permission'] == "Admin") { ?>
							<div class="dropdown">
								<li class="nav-item dropdown-toggle" data-mdb-toggle="dropdown">
									<a class="nav-link" href="#"></a>
								</li>
								<ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
									<li><a class="dropdown-item" href="#">Test</a></li>
								</ul>
							</div>
						<?php } ?>
						<li class="nav-item">
							<a class="nav-link" href="#">What is this?</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#">What is this?</a>
						</li>
					</ul>
				</div>

				<div class="d-flex align-items-center">

					<div class="dropdown">
						<a class="text-reset me-3 dropdown-toggle hidden-arrow" href="#" id="navbarDropdownMenuLink" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
							<i data-feather="bell"></i>
							<span class="badge rounded-pill badge-notification bg-danger">1</span>
						</a>
						<ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
							<li>
								<a class="dropdown-item" href="#">Test Notification 1</a>
							</li>
							<li>
								<a class="dropdown-item" href="#">Test Notification 2</a>
							</li>
							<li>
								<a class="dropdown-item" href="#">Test Notification 3</a>
							</li>
						</ul>
					</div>

					<div class="dropdown">
						<a class="dropdown-toggle d-flex align-items-center hidden-arrow" href="#" id="navbarDropdownMenuAvatar" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
							<img src="./configuration/images/user.jpg" class="rounded-circle" height="30" alt="SLTAX User Logo" loading="lazy" />
						</a>
						<ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuAvatar">
							<li>
								<a class="dropdown-item" href="profile"><i data-feather="user"></i> <?= $translator->trans("my-profile"); ?></a>
							</li>
							<li>
								<a class="dropdown-item" href="settings"><i data-feather="settings"></i> <?= $translator->trans("settings"); ?></a>
							</li>
							<li>
								<a class="dropdown-item" href="security"><i data-feather="key"></i> <?= $translator->trans("security"); ?></a>
							</li>
							<li>
								<a class="dropdown-item" href="logout"><i data-feather="log-out"></i> <?= $translator->trans("logout"); ?></a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</nav>
	</div>
</div>