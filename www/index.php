<?php
 	include "include/db_connect.php";
 	$sorting = $_GET["sort"];
 	switch ($sorting) {
    case 'price-asc';
    $sorting = 'price ASC';
    $sort_name = 'От дешовых к дорогим';
    break;

    case 'price-desc';
    $sorting = 'price DESC';
    $sort_name = 'От дорогих к дешовым';
    break;
    
    case 'popular';
    $sorting = 'count DESC';
    $sort_name = 'Популярные';
    break;
    
    case 'news';
    $sorting = 'datatime DESC';
    $sort_name = 'Новинки';
    break;
    
    case 'brand';
    $sorting = 'brand';
    $sort_name = 'От а до я';
    break;
    
    default:
    $sorting = 'products_id DESC';
    $sort_name = 'Нет сортировки';
    break;                           
	} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/maine.css">
	<link rel="stylesheet" href="trackbar/trackbar.css">
	<script src="js/jquery-1.8.2.min.js"></script>
	<script src="js/jcarousellite_1.0.1.js"></script>
	<script src="js/shop_script.js"></script>
	<script src="js/jquery.cookie.min.js"></script>
	<script src="trackbar/jquery.trackbar.js"></script>
	<title>Интернет Магазин техники</title>

</head>
<body>	
	<div id="block-body">
		<?php
		include "include/block-header.php";
		?>
		<div id="block-right">
		<?php
		include "include/block-category.php";
		include "include/block-paremeter.php";
		include "include/block-news.php";
		?>
		</div>
		<div id="block-content">	
			<div id="block-sorting">
				<p id="nav-brend-crabs">
					<a href="index.php">Главная страниця </a> <span> \ Все товары</span>
				</p>
				<ul id="option-list">
					<li>Вид</li>
					<li><img id="style-grid" src="img/icon-grid.png" alt="grid"></li>
					<li><img id="style-list" src="img/icon-list.png" alt="grid"></li>
					<li>Сортировать</li>
					<li><div id="select-sort"><?php echo $sort_name;?></div>
						<ul id="sorting-list">
							<li><a href="index.php?sort=price-asc">От дешовых к дорогим</a></li>
							<li><a href="index.php?sort=price-desc">От дорогих к дешовым</a></li>
							<li><a href="index.php?sort=popular">Популярные</a></li>
							<li><a href="index.php?sort=news">Новинки</a></li>
							<li><a href="index.php?sort=brand">От а до я</a></li>
						</ul>
					</li>
				</ul>

			</div>	
		<ul id="block-tovar-grid">
			
		<?php
			$result = mysql_query("SELECT * FROM table_products WHERE visible='1' ORDER BY $sorting", $link);
			if(mysql_num_rows($result) > 0)
				{
					$row = mysql_fetch_array($result);
					do {
						if  ($row["images"] != "" && file_exists("./uploads_images/".$row["images"]))
						{
						$img_path = './uploads_images/'.$row["images"];
						$max_width = 200; 
						$max_height = 200; 
						 list($width, $height) = getimagesize($img_path); 
						$ratioh = $max_height/$height; 
						$ratiow = $max_width/$width; 
						$ratio = min($ratioh, $ratiow); 
						$width = intval($ratio*$width); 
						$height = intval($ratio*$height);    
						}else
						{
						$img_path = "img/no-image.png";
						$width = 110;
						$height = 200;
						} 
						echo('
							<li>
							<div class="block-images-grid">
								<img src="'.$img_path.'"width="'.$width.'"height"'.$height.'">
							</div>
							<p class="style-title-grid">
								<a href="">'.$row["title"].'</a>
							</p>
							<ul class="reviewe-and-counts-grid">
								<li><img src="img/eye-icon.png" alt=""><p>0</p></li>
								<li><img src="img/comment-icon.png" alt=""><p>0</p></li>
							</ul>
							<a class="add-cart-style-grid" href=""></a>
							<p class="style-price-grid"><strong>'.$row["price"].'</strong> руб.</p>
							<div class="mini-features">'.$row["mini_features"].'</div>
							</li>
						 ');
					}
					while($row = mysql_fetch_array($result));
				}
		?>
		</ul>


		<ul id="block-tovar-list">
			
		<?php
			$result = mysql_query("SELECT * FROM table_products WHERE visible='1' ORDER BY $sorting", $link);
			if(mysql_num_rows($result) > 0)
				{
					$row = mysql_fetch_array($result);
					do {
						if  ($row["images"] != "" && file_exists("./uploads_images/".$row["images"]))
						{
						$img_path = './uploads_images/'.$row["images"];
						$max_width = 150; 
						$max_height = 150; 
						 list($width, $height) = getimagesize($img_path); 
						$ratioh = $max_height/$height; 
						$ratiow = $max_width/$width; 
						$ratio = min($ratioh, $ratiow); 
						$width = intval($ratio*$width); 
						$height = intval($ratio*$height);    
						}else
						{
						$img_path = "img/noimages80x70.png";
						$width = 80;
						$height = 70;
						} 
						echo('
							<li>
							<div class="block-images-list">
								<img src="'.$img_path.'"width="'.$width.'"height"'.$height.'">
							</div>
							<ul class="reviewe-and-counts-list">
								<li><img src="img/eye-icon.png" alt=""><p>0</p></li>
								<li><img src="img/comment-icon.png" alt=""><p>0</p></li>
							</ul>
							<p class="style-title-list">
								<a href="">'.$row["title"].'</a>
							</p>
							<a class="add-cart-style-list" href=""></a>
							<p class="style-price-list"><strong>'.$row["price"].'</strong> руб.</p>
							<div class="mini-features-list">'.$row["mini_description"].'</div>
							</li>
						 ');
					}
					while($row = mysql_fetch_array($result));
				}
		?>
		</ul>


		</div>
		<?php
		include "include/block-footer.php";
		?>
	</div>
</body>
</html>