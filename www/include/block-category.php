<div id="block-category">
	<p class="header-title">Категории товаров</p>
	<ul>
		<li><a id="index1"><img id="mobile-img" src="../img/mobile-icon.gif" alt="mob">Мобильные телефоны</a>
			<ul class="category-section">
				<li><a href="view_cat.php?type=mobile"><strong>Все модели</strong></a></li>
				<?php
				  $result = mysql_query("SELECT * FROM category WHERE type='mobile'",$link);				  
				 if (mysql_num_rows($result) > 0){
					$row = mysql_fetch_array($result);
					do{
					echo '<li><a href="view_cat.php?cat='.strtolower($row["brand"]).'&type='.$row["type"].'">'.$row["brand"].'</a></li>';
					}
				 while ($row = mysql_fetch_array($result));
				} 	
				?>
			</ul>
		</li>
		<li><a id="index2"><img id="book-img" src="../img/book-icon.gif" alt="mob">Ноутбуки</a>
			<ul class="category-section">
				<li><a href="view_cat.php?type=notebook"><strong>Все модели</strong></a></li>
				<?php
				  $result = mysql_query("SELECT * FROM category WHERE type='notebook'",$link);				  
				 if (mysql_num_rows($result) > 0){
					$row = mysql_fetch_array($result);
					do{
					echo '<li><a href="view_cat.php?cat='.strtolower($row["brand"]).'&type='.$row["type"].'">'.$row["brand"].'</a></li>';
					}
				 while ($row = mysql_fetch_array($result));
				} 	
				?>
			</ul>
		</li>
		<li><a id="index3"><img id="table-img" src="../img/table-icon.gif" alt="mob">Планшеты</a>
			<ul class="category-section">
				<li><a href="view_cat.php?type=notepad"><strong>Все модели</strong></a></li>
				<?php
				  $result = mysql_query("SELECT * FROM category WHERE type='notepade'",$link);				  
				 if (mysql_num_rows($result) > 0){
					$row = mysql_fetch_array($result);
					do{
					echo '<li><a href="view_cat.php?cat='.strtolower($row["brand"]).'&type='.$row["type"].'">'.$row["brand"].'</a></li>';
					}
				 while ($row = mysql_fetch_array($result));
				} 	
				?>
			</ul>
		</li>
	</ul>
</div>