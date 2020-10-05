<?php
require_once("controller/controller.php");

class CommentController extends Controller{
    public function delete($id){ //delete comment
        if(isset($_SESSION["user"])){
            if($_SESSION["user"]->isAdmin()){
                $return = $this->commMan()->delete($id);

                $reponse["status"] = $return;
                $reponse["idCom"] = $id;
                echo json_encode($reponse);
            }
        }
    }

    public function createComment($idPost, $description){ //create comment
        if(isset($_SESSION["user"])){
            $return = $this->commMan()->add(new Comment(null, $idPost, $_SESSION["user"]->id(), $description, new DateTime('NOW'), 0));

            $result["status"] = $return;
            echo json_encode($result);
        }else{
            $result["status"] = false;
            echo json_encode($result);
        }
    }

    public function validate($id){ //validate comment
        if(isset($_SESSION["user"])){
            if($_SESSION["user"]->isAdmin()){ //user admin ?
                $comment = $this->commMan()->getById($id);
                if(!$comment){
                    $reponse["status"] = false;
                    echo json_encode($reponse);
                }else{
                    $comment->setIsVerified(1);
                    $return = $this->commMan()->update($comment);
                    $reponse["status"] = $return;
                    $reponse["idCom"] = $id;
                    echo json_encode($reponse);
                }
            }
        }
    }
}