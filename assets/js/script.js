$( document ).ready(function() {
    $("#userRegister").on('submit', function(e){
        e.preventDefault();
        $.ajax({
        type: "POST",
        url: '/ajax/register',
        data: {"password":$("#password").val(),"username":$("#username").val(), "firstname":$("#firstname").val(), "lastname":$("#lastname").val()},
        success: function(reponse, data){
            if(reponse.status){
                $(".responseMessage").text("Votre compte a bien été créé, vous allez être redirigé.");
                $(".responseMessage").css("color", "green");
                setTimeout(function(){
                    window.location.href = "/user/login";
                }, 2000);
            }else{
                $(".responseMessage").text("Une erreur est survenue.");
                $(".responseMessage").css("color", "red");
            }
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
                if(reponse.status){
                    $(".responseMessage").text("Vous êtes connecté, vous allez être redirigé.");
                    $(".responseMessage").css("color", "green");
                    setTimeout(function(){
                        window.location.href = "/";
                    }, 2000);
                }else{
                    $(".responseMessage").text("Une erreur est survenue.");
                    $(".responseMessage").css("color", "red");
                }
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
				if(reponse.status){
                    $("#title").val("");
                    $("#subject").val("");
                    $("#description").val("");
                    $(".responseMessage").text("Votre post à été publier, il va bientôt être validé par un administrateur.");
                    $(".responseMessage").css("color", "green");
                    setTimeout(function(){
                        window.location.href = "/posts";
                    }, 2000);
                }else{
                    $(".responseMessage").text("Une erreur est survenue.");
                    $(".responseMessage").css("color", "green");
                }
			},
			dataType: 'json',
		});
		event.preventDefault();
		return false;
	});
   
});