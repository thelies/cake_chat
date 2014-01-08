function action_delete (message_id){
	$.ajax({
		type: 'POST',
		url: '/CakeChat/messages/delete',
		success: function (respone){
			
		},
		data: 'data[message_id]='+message_id 				
	});	
}

function action_edit (message_id){
	var element_id='message_'+message_id;
	var message = document.getElementById(element_id).innerHTML;
	var content = prompt('Enter your new message', message);
	if(content!=null)
	{	
		$.ajax({
			type: 'POST',
			url: '../../edit',
			success: function(respone){
			//	alert(respone);	
			},
			data: 'data[message_id]='+message_id+'&data[content]='+content
		});
	}
}

function reload(thread_id, user_id){
	setInterval(
		function(){
			//alert('thread_id in reload '+thread_id);
			myTimer(thread_id, user_id)
	}, 800);
}

function myTimer(thread_id, user_id){
	//alert(thread_id);
	//alert(user_id);
	$.ajax({
		type: 'POST',
		url: '/CakeChat/messages/reload',
		success: function (data){
			//alert(data);
			$('#listMessage').html(data);		
		},
		data: 'data[thread_id]='+thread_id+'&data[user_id]='+user_id 				
	});
}
