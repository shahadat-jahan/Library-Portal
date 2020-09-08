<?php 
require("haeder.php");
is_login();

if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["search"])){
			if ($_POST["search"] == "Search"){
				$book_name = Book_info($_POST["book_name"]);
				
			}
		}

?>


	<div class="mainContent">
		<div class="content">
			<article class="topcontent">
				<header>
					<h2>Search</h2>
				</header>

				<content>
					<form method="post" action="search.php">
						<input type="text" placeholder="Search keywords" name="book_name">
						<input type="submit" value="Search" name="search">
					</form>
				</content>


				<header class="advanced-search">
					<h2>Advanced search</h2>
				</header>

				<content>
					
					<form>
						<input class="advanceed-input" type="text" placeholder="Search keywords" name="">
					
						<table class="select">
						<tr>
							<td>
							<select name="department">
							
							<option value="">Select a department</option>
							<option value="cse">CSE</option>
							<option value="eee">EEE</option>
							<option value="bba">BBA</option>
							<option value="english">English</option>
							<option value="law">Law</option>
							<option value="mathematics">Mathematics</option>
							<option value="civil">Civil</option>
							<option value="physics">Physics</option>
							<option value="fdt">FDT</option>
							<option value="is">IS</option>
							<option value="bengali">Bengali</option>
							<option value="phy ed">Phy Ed</option>
						</select></td>
						<td>
						<select name="category">
							<option value="">Select a book category</option>
							<option value="information">Information</option>
							<option value="network">Network</option>
							<option value="web">Web</option>
							<option value="programming">Programming</option>
							<option value="mathematics">Mathematics</option>
							<option value="social">Social</option>
							<option value="history">History</option>
							<option value="language">Language</option>
						</select>
						</td>
					</tr>
					<tr>
						<td>	
						<select name="author">
							<option value="">Select a author</option>
							<option value="author 1">Author 1</option>
							<option value="author-2">Author 2</option>
							<option value="author-3">Author 3</option>
							<option value="author-4">Author 4</option>
							<option value="author-5">Author 5</option>
						</select>
						</td>
						<td>	
						<select name="publisher">
							<option value="">Select a publisher</option>
							<option value="publisher 1">Publisher 1</option>
							<option value="publisher-2">Publisher 2</option>
							<option value="publisher-3">Publisher 3</option>
							<option value="publisher-4">Publisher 4</option>
							<option value="publisher-5">Publisher 5</option>
						</select>
						</td>
					</tr>
				</table>
					
					<p>
					<input type="submit" value="Search">
					</p>
					</form>
				</content>
			</article>

			
		</div>
	</div>

	<?php 
		require("aside.php");
 
		require("footer.php");
		?>