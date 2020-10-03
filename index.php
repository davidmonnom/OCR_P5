<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

try{
    require("class/Router.php");
    require("class/Route.php");
    require("class/Database.php");
    require("controller/postController.php");
    require("controller/userController.php");
    require("controller/commentController.php");

    //CALL CLASSES
    $rm = new Router($_GET['url']);

    //
    // L'index de la page.
    //
    $rm->get('/', function(){                                   
        
   
    }); 

    //
    // La liste des posts.
    //
    $rm->get('/posts', function(){                              
        $postC = new PostController();
        $postC->listPosts();
    });
    
    //
    // Détail d'un post
    //
    $rm->get('/posts/:id', function($id){                      
        $postC = new PostController();
        $postC->viewPost($id);
    }); 

    $rm->run();

}
catch(Exception $e){
	echo $e->getMessage();
}