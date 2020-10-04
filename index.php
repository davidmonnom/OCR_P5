<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

try{
    require("class/Router.php");
    require("class/Route.php");
    require("class/Database.php");
    require("controller/postController.php");
    require("controller/indexController.php");
    require("controller/userController.php");
    require("controller/commentController.php");
    require("controller/adminController.php");

    $rm = new Router($_GET['url']);
    $postC = new PostController();
    $userC = new UserController(); 
    $commC = new CommentController(); 
    $indexC = new IndexController(); 
    $adminC = new AdminController();

    session_start();


    /*
        Routes for the index management
    */ 
    $rm->get('/', function() use($indexC) { // Index of the blog                                  
        $indexC->index();
    }); 

    /*
        Routes for the posts management
    */ 
    $rm->get('/posts', function() use($postC) { // Show list of posts                           
        $postC->listPosts();
    }); 
    $rm->get('/posts/create', function() use($postC) { // Show the "creating post" form
        $postC->createPost();
    });
    $rm->get('/posts/:id', function($id) use($postC) { // Show post by id               
        $postC->viewPost($id);
    });

    /*
        Routes for the users management
    */
    $rm->get('/user/register', function() use($userC) { // Show register page                  
        $userC->register();
    });

    $rm->get('/user/login', function() use($userC) { // Show login page                  
        $userC->login();
    }); 

    $rm->get('/user/admin', function() use($adminC) {             
        $adminC->index();
    }); 



    /*
        Ajax functions
    */
    $rm->post('/ajax/logout', function() use($userC){  // Create a post
        $userC->logout();
    });

    $rm->post('/ajax/deleteCom', function() use($commC){  // Create a post
        $commC->delete($_POST["idCom"]);
    });

    $rm->post('/ajax/valideCom', function() use($commC){  // Create a post
        $commC->validate($_POST["idCom"]);
    });

    $rm->post('/ajax/deletePost', function() use($postC){  // Create a post
        $postC->delete($_POST["idPost"]);
    });

    $rm->post('/ajax/validePost', function() use($postC){  // Create a post
        $postC->validate($_POST["idPost"]);
    });

    $rm->post('/ajax/post', function() use($postC){  // Create a post
        $postC->createPost($_POST["title"], $_POST["subject"], $_POST["description"]);
    });

    $rm->post('/ajax/register', function() use($userC){ // Create an account
        $userC->register($_POST["username"], $_POST["firstname"], $_POST["lastname"], $_POST["password"]);
    });

    $rm->post('/ajax/login', function() use($userC){ // Create an account
        $userC->login($_POST["username"], $_POST["password"]);
    });

    $rm->run(); // Execute
}
catch(Exception $e){
	echo $e->getMessage();
}