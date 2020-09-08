<nav>
			<ul>
				<li <?php if(empty($_GET)) { ?> class="active" <?php } ?> >
					<a href="home.php">Home</a>
				</li>
				<li  <?php if(isset($_GET["menu"]) && $_GET['menu'] == "about") { echo 'class="active"'; }?> >
					<a href="about.php?menu=about">About</a>
				</li>
				<li  <?php if(isset($_GET["menu"]) && $_GET['menu'] == "contact") { echo 'class="active"'; }?> >
					<a href="contact.php?menu=contact">Contact</a>
				</li>
				<li  <?php if(isset($_GET["menu"]) && $_GET['menu'] == "search") { echo 'class="active"'; }?> >
					<a href="search.php?menu=search">Search</a>
				</li>
				
				<li  <?php if(isset($_GET["menu"]) && $_GET['menu'] == "admin") { echo 'class="active"'; }?> >
					<a href="admin_login.php?menu=admin">Admin panel</a>
				</li>
				<li>
					<a href="logout.php">Logout</a>
				</li>
			</ul>
</nav>