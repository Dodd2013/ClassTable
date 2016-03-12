function changeDiv(div,page) {
	//htmlobj=$.ajax({url:page,async:true});
	//alert(htmlobj.responseText);
	//$(div).html=htmlobj.responseText;
	
	$.AMUI.progress.start();
	$(div).load(page);
	// $.get(page, function(result){
	//  $result = $(result);

	// $(div).html($result);
	// $result.find('script').appendTo(div);
	// }, 'html');
	$.AMUI.progress.done();
}