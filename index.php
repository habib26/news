<?php 
require_once("listingNews.php");
$news = getNews("news.json"); 
$numberNews = count($news); 
$numberPerPage=5; 
$numberPages=numberPages($numberNews,$numberPerPage);
$currentPage=1;


?>
<!DOCTYPE html>
<html>
<head>
<script type="text/javascript">
	NUMEBR_PAGES = <?php echo $numberPages ; ?> ; 
	NUMBER_PER_PAGE = <?php echo $numberPerPage ;?>   ; 
	CURRENT_PAGE = <?php echo $currentPage ; ?> ;

</script>

<script src="list_news.js"></script>
	<link type="text/css" rel="stylesheet" href="styles.css">
	<title></title>
</head>
<body>
<div class="content">
<div class="content_articles" id="content_articles">

<?php

	$contents=getContentPage($news,0,$numberPerPage);
	getContentPageHtml($contents);
	echo '</div>' ; 
	echo '<div class="pagination" id="pagination">'
	     .pagination($numberPages,$currentPage)
	     .'</div>';
?>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
</body>
</html>

