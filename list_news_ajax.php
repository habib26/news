<?php 
require_once("listingNews.php");
$news = getNews("news.json"); 
if(isset($_POST['startIndex']) && isset( $_POST['numberPerPage'])) {
	$startIndex=($_POST['startIndex']-1)*$_POST['numberPerPage'];
	$contents = getContentPage($news,$startIndex,$_POST['numberPerPage']) ;//  return array contents 
	getContentPageHtml($contents); // return hmtl contents 

}