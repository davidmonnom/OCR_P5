<?php
require_once("controller/controller.php");

class CommentController extends Controller{
    public function delete($id){
        if(isset($_SESSION["user"])){
            if($_SESSION["user"]->isAdmin()){
                $return = $this->commMan()->delete($id);

                $reponse["status"] = $return;
                $reponse["idCom"] = $id;
                echo json_encode($reponse);
            }
        }
    }
    public function validate($id){
        if(isset($_SESSION["user"])){
            if($_SESSION["user"]->isAdmin()){
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