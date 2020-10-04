<?php
require_once("controller/controller.php");

class PostController extends Controller{
    public function listPosts(){
        $this->view()->render('listPostsView.php', array(
            'postsList' => $this->postMan()->getPosts()
        ));
    }

    public function viewPost($idPost){
        $post = $this->postMan()->getById($idPost);
        if (!$post) {
            throw new Exception('Le post n\'a pas été trouvé');
            return false;
        }

        $commentsList = $this->commMan()->getByIdPost($idPost);
        $this->view()->render('viewPostView.php', array(
            'post' => $post,
            'commentsList' => $commentsList
        ));
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