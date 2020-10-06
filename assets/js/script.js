$( document ).ready(function() {
	function getRandomColor() {
		var letters = '0123456789ABCDEF';
		var color = '#';
		for (var i = 0; i < 6; i++) {
		  color += letters[Math.floor(Math.random() * 16)];
		}
		return color;
	}
	$( ".colorRandom" ).each(function() {
		$( this ).css("background-color", getRandomColor());
	});
	$( ".colorRandomText" ).each(function() {
		$( this ).css("color", getRandomColor());
	});


    $("#userRegister").on('submit', function(e){  //User register request
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

    $("#userLogin").on('submit', function(e){ //User login request
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
   $("#newComment").on('submit', function(event){ //New Comment request
		$.ajax({
			type: "POST",
			url: '/ajax/comment',
			data: {"description":$("#comment").val(),"idPost":$("#newComment").attr("value")},
			success: function(reponse){
				$("#comment").val("")
				$("#ajaxReponse").text("Votre commentaire va bientôt être validé.");
			},
			dataType: "json",
		});
		event.preventDefault();
		return false;
	});
	$("#newPostForm").on('submit', function(event){ //New post request
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
                    $(".responseMessage").text("Connectez-vous avant de publier un post.");
                    $(".responseMessage").css("color", "red");
                }
			},
			dataType: 'json',
		});
		event.preventDefault();
		return false;
	});
	console.log($("#idPost").attr("value"));
	$("#modifyPostForm").on('submit', function(event){ //Modify post request
		$.ajax({
			type: "POST",
			url: '/ajax/modify',
			data: {"title":$("#title").val(), "subject":$("#subject").val(), "description":$("#description").val(), "idPost":$("#idPost").attr("value")},
			success: function(reponse){
				if(reponse.status){
                    setTimeout(function(){
                        window.location.href = "/posts/"+reponse.idPost;
                    }, 5);
                }else{
                }
			},
			dataType: 'json',
		});
		event.preventDefault();
		return false;
    });
    
    $(".userLogout").on('click', function(event){ //User logout request
		$.ajax({
			type: "POST",
			url: '/ajax/logout',
			data: {},
			success: function(reponse){
                window.location.href = "/";
            },
			dataType: 'json',
		});
		event.preventDefault();
		return false;
    });

	$(".deletePost").on('click', function(event){ //Delete post request
		$.ajax({
			type: "POST",
			url: '/ajax/deletePost',
			data: {"idPost":$(this).val()},
			success: function(reponse, data){
				if(reponse.status == "1"){
					if($("#deleteButton").hasClass('buttonPostDelete')){
						console.log("here");
						setTimeout(function(){
							window.location.href = "/posts";
						}, 500);
					}else{
						$("#post_"+reponse.idPost).fadeOut( "slow", function() {
						});
					}
				}
			},
			dataType: "json",
		});
		event.preventDefault();
		return false;
    });
    
	$(".validePost").on('click', function(event){ //Validate post request
		$.ajax({
			type: "POST",
			url: '/ajax/validePost',
			data: {"idPost":$(this).val()},
			success: function(reponse, data){
				console.log("there");
				if(reponse.status == true){
					console.log("valideok");
					$("#post_"+reponse.idPost).fadeOut( "slow", function() {
					});
				}
			},
			dataType: "json",
		});
		event.preventDefault();
		return false;
    });
    
	$(".deleteComment").on('click', function(event){ //Delete comment request
		$.ajax({
			type: "POST",
			url: '/ajax/deleteCom',
			data: {"idCom":$(this).val()},
			success: function(reponse, data){
				if(reponse.status == "1"){
					$("#com_"+reponse.idCom).fadeOut( "slow", function() {
					});
				}
			},
			dataType: "json",
		});
		event.preventDefault();
		return false;
    });
    
	$(".valideComment").on('click', function(event){ //Validate comment request
		$.ajax({
			type: "POST",
			url: '/ajax/valideCom',
			data: {"idCom":$(this).val()},
			success: function(reponse, data){
				if(reponse.status == "1"){
					$("#com_"+reponse.idCom).fadeOut( "slow", function() {
					});
				}
			},
			dataType: "json",
		});
		event.preventDefault();
		return false;
	});

	$(".deleteUser").on('click', function(event){ //Delete user request
		$.ajax({
			type: "POST",
			url: '/ajax/deleteUser',
			data: {"idUser":$(this).val()},
			success: function(reponse, data){
				if(reponse.status == "1"){
					$("#user_"+reponse.idUser).fadeOut( "slow", function() {
					});
				}else{
					console.log("error");
				}
			},
			dataType: "json",
		});
		event.preventDefault();
		return false;
	});
	
	$("#contactForm").on('submit', function(event){ //Contact form
		$.ajax({
			type: "POST",
			url: '/ajax/contact',
			data: {"name":$("#name").val(),"email":$("#email").val(),"message":$("#message").val()},
			success: function(reponse, data){
				if(reponse.status == 1){
					$('#name').val('');
					$('#message').val('');
					$('#email').val('');
					$("#reponse_message").text('Votre message à bien été envoyé');
					$("#reponse_message").css('color', 'green');
				}else if(reponse.status == 0){
					$("#reponse_message").text('Connectez-vous avant de nous contacter.');
					$("#reponse_message").css('color', 'red');
				}else{
					$("#reponse_message").text('Oops une erreur est survenue');
					$("#reponse_message").css('color', 'red');
				}
				
			},
			dataType: "json",
		});
		event.preventDefault();
		return false;
	});
});