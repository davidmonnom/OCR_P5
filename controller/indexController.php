<?php
require_once("controller/controller.php");
require_once("model/userManager.php");

class IndexController extends Controller{
    public function index(){ //home page
        $this->view()->render('indexView.php', array(
            'postsList' => $this->postMan()->getPosts()
        ));
    }
    public function error($error){ //error page
        $this->view()->render('errorView.php', array(
            'error' => $error
        ));
    }
    public function contact($name, $email, $message){ //contact form
        $name = strip_tags(trim($name));
        $name = str_replace(array("\r","\n"),array(" "," "),$name);
        $email = filter_var(trim($email), FILTER_SANITIZE_EMAIL);
        $message = trim($message);

        if ( empty($name) OR empty($message) OR !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $return = array();
            $status = 0;
            $return['status'] = $status;
            echo json_encode($return);
            return;
        }

        $recipient = "contact@david-monnom.be";
        $subject = "New contact from $name";
        $email_content = "Nom et préniom: $name\n";
        $email_content .= "Email: $email\n\n";
        $email_content .= "Message:\n$message\n";
        $email_headers = "Email : $name <$email>";

        if (mail($recipient, $subject, $email_content, $email_headers)) {
            $return = array();
            $status = 1;
            $return['status'] = $status;
            echo json_encode($return);
            
        } else {
            $status = 0;
            $return['status'] = $status;
            echo json_encode($return);
        }
    }
}