$( document ).ready(function() {
    $("#userRegister").on('submit', function(e){
        e.preventDefault();
        $.ajax({
        type: "POST",
        url: '/ajax/register',
        data: {"password":$("#password").val(),"username":$("#username").val(), "firstname":$("#firstname").val(), "lastname":$("#lastname").val()},
        success: function(reponse, data){
            alert("readyState: "+reponse.readyState+"\nstatus: "+reponse.status);
        },
        dataType: "json",
        });
        return false;
    });

    $("#userLogin").on('submit', function(e){
        e.preventDefault();
        $.ajax({
			type: "POST",
			url: '/ajax/login',
			data: {"password":$("#password").val(),"username":$("#username").val()},
			success: function(reponse, data){

			},
			dataType: "json",
       });
       return false;
   });
   
	$("#newPostForm").on('submit', function(event){
		$.ajax({
			type: "POST",
			url: '/ajax/post',
			data: {'title':$("#title").val(), 'subject':$("#subject").val(), 'description':$("#description").val()},
			success: function(reponse){
				console.log(reponse);
			
			},
			dataType: 'json',
		});
		event.preventDefault();
		return false;
	});
   
});