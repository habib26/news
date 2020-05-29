<?php
	/**
	* @param json $fileName
	* @return array 
	**/
function getNews($fileName) {
	$res = file_get_contents($fileName);
	return json_decode($res)->{"results"};
	
}
/**
* @param int $total 
* @param $numberPerPage
*/
function numberPages($total,$numberPerPage){
	if( $numberPerPage > 0 )
	return ceil( $total / $numberPerPage );

}; 
/**
* @param int $numberPages
* @param int $currentPage
**/
function pagination($numberPages,$currentPage){

	if( ( 1 == $currentPage ) && ($numberPages > 1) ) {
		return '<a href="#" >1</a> <a href="#" onClick="nextPage()" >suivant </a>';
	} else if ($currentPage == $numberPages) {
		return '<a href="#" onClick="prevPage()">precedent</a><a href="#">'.$currentPage.'</a>';
	} else {
		return '<a href="#" onClick="prevPage()">precedent</a><a href="#">'.$currentPage.'</a><a href="#" onClick="nextPage()">suivant</a>';
	}
	
};
	/**
	* @param array $news 
	* @param int $startIndex
	* @param int $numberPerPage
	*/
function getContentPage($news,$startIndex,$numberPerPage){
	if (count($news) > 0)
		return array_slice($news,$startIndex,$numberPerPage); 
	else  
		return [] ; 

};

	/**
	 * @param array $contents
	 * @return hmtl  
	*/
function getContentPageHtml($contents){

	foreach ( $contents as $data ) {
 	 echo '<article class="article_news">'
  	   .'<a class="img" href="'.$data->{'url_news'}.'" ><img src="'.$data->{'author'}->{'url_avatar'}.'" /></a>'
       .'<div class="description"><span class="title">'.$data->{'title_news'}.'</span>'
       .'<p style="">'.substr(strip_tags($data->{'summary_news'}),0,100).'</p> </div>'
       .'<br/><span class="date" >'.$data->{'publication_date_news'}
       .'</article>';	
	}
};   

?> 