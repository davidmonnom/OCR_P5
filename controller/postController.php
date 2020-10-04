<?php
require_once("controller/controller.php");

class PostController extends Controller{
    public function listPosts(){
        $this->view()->render('listPostsView.php', array(
            'postsList' => $this->postMan()->getPosts()
        ));
    }

    public function viewPost($idPost){
        if($_SESSION['user']->isAdmin()){
            $post = $this->postMan()->getById($idPost);
            if (!$post) {
                throw new Exception('Le post n\'a pas été trouvé');
                return false;
            }

            $user = $this->userMan()->getById($post->idUser());
            $commentsList = $this->commMan()->getByIdPost($idPost);
            $this->view()->render('viewPostView.php', array(
                'post' => $post,
                'user' => $user,
                'commentsList' => $commentsList
            ));
        }else{
            throw new Exception("Ce post n'a pas encore été validé.");
        }
    }

    public function createPost($title=NULL, $subject=NULL, $description=NULL){
        if(!empty($title) && !empty($subject) && !empty($description)){
            $return = $this->postMan()->add(new Post(null, $_SESSION["user"]->id(), $title, $subject, $description, new DateTime('NOW'), null, 0));

            $result["status"] = $return;
            echo json_encode($result);
        }else{
            $this->view()->render('createPostView.php');
        }
    }

    public function modifyPost($title=NULL, $subject=NULL, $description=NULL, $idPost){
        if(!empty($title) && !empty($subject) && !empty($description)){
            $post = $this->postMan()->getById($idPost);
            $post->setIsVerified(0);
            $post->setTitle($title);
            $post->setSubject($subject);
            $post->setDescription($description);

            $return = $this->postMan()->update($post);
            $reponse["status"] = $return;
            $reponse["idPost"] = $idPost;
            echo json_encode($reponse);
        }else{
            $post = $this->postMan()->getById($idPost);
            $this->view()->render('modifyPostView.php', array(
                'post' => $post,
            ));
        }
    }

    public function delete($id){
        if(isset($_SESSION["user"])){
            if($_SESSION["user"]->isAdmin()){
                $return = $this->postMan()->delete($id);

                $reponse["status"] = $return;
                $reponse["idPost"] = $id;
                echo json_encode($reponse);
            }
        }
    }
    public function validate($id){
        if(isset($_SESSION["user"])){
            if($_SESSION["user"]->isAdmin()){
                $post = $this->postMan()->getById($id);
                if(!$post){
                    $reponse["status"] = false;
                    echo json_encode($reponse);
                }else{
                    $post->setIsVerified(1);
                    $return = $this->postMan()->update($post);
                    $reponse["status"] = $return;
                    $reponse["idPost"] = $id;
                    echo json_encode($reponse);
                }
            }
        }
    }
}