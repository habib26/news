
/*
 return the content of the next  page 
*/
function nextPage () {

	CURRENT_PAGE = CURRENT_PAGE+1 ; 
	pagination(NUMEBR_PAGES,CURRENT_PAGE);
	getContentPage(CURRENT_PAGE,NUMBER_PER_PAGE);

}
/*
 return the content of the previous page 
*/
function prevPage () {
	if(CURRENT_PAGE>1) {
		CURRENT_PAGE = CURRENT_PAGE-1 ; 
		pagination(NUMEBR_PAGES,CURRENT_PAGE);
		getContentPage(CURRENT_PAGE,NUMBER_PER_PAGE);
	}

}
/*
* param int startIndex  
* param int numberPerPage  
*/
function getContentPage (startIndex,numberPerPage) {
   $.post(
            'list_news_ajax.php', // Un script PHP 
            {
                startIndex : startIndex,  
                numberPerPage : NUMBER_PER_PAGE
            },

            function(data){ 
            	$('#content_articles').html(data);
            },

            'text' 
         );

}
/*
* param int numberPages
* param int currentPage 
* 
*/
function pagination (numberPages,currentPage) {
	if( (1 == currentPage ) && (numberPages > 1 )) {
		$('#pagination').html('<a href="#" >1</a> <a href="#" onClick="nextPage(CURRENT_PAGE)" >suivant </a>') ; 
	} else if (currentPage == numberPages) {
		$('#pagination').html('<a href="#" onClick="prevPage(CURRENT_PAGE)">precedent</a><a href="#">'+currentPage+'</a>');

	} else {
		$('#pagination').html('<a href="#" onClick="prevPage(CURRENT_PAGE)">precedent</a><a href="#">'
			+currentPage+'</a><a href="#" onClick="nextPage(CURRENT_PAGE)">suivant</a>');
	}

}
