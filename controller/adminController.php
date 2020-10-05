<?php 
require_once("controller/controller.php");

class AdminController extends Controller {
    public function index(){
        if(isset($_SESSION["user"])){
            if($_SESSION["user"]->isAdmin() == 1){

                $needed_users = array();
                $needed_posts = array();
                $posts = $this->postMan()->getUnverifiedPosts();
                $comments = $this->commMan()->getUnverifiedComments();
                $users = $this->userMan()->getUsers();

                foreach($posts as $post){
                    $idUser = $post->idUser();
                    if(!isset($needed_users[$idUser]))
                        $needed_users[$idUser] = $this->userMan()->getById($idUser);
                }

                foreach($comments as $comment){
                    $idUser = $comment->idUser();
                    if(!isset($needed_users[$idUser]))
                        $needed_users[$idUser] = $this->userMan()->getById($idUser);

                    $idPost = $comment->idPost();
                    if(!isset($needed_posts[$idPost]))
                        $needed_posts[$idPost] = $this->postMan()->getById($idPost);
                }

                $this->view()->render('adminView.php', array(
                    'neededUsers' => $needed_users,
                    'neededPosts' => $needed_posts,
                    'postsList' => $posts,
                    'commentsList' => $comments,
                    'usersList' => $users
                ));
            }else{
                throw new Exception("Vous n'êtes pas administrateur");
            }
        }else{
            throw new Exception("Connectez-vous pour accéder à la page d'administration");
        }
    }
}