<?php

class View{
    public function render($page, $data = array()){
        if(isset($_SESSION['connected_user'])){
            $user = $_SESSION['connected_user'];
            $user_data = array(
                'userName' => $user->userName(),
                'isAdmin' => $user->isAdmin()
            );
        }else{
            $user_data = null;
        }

        $data['user'] = $user_data;
        
        $pageContent = $this->renderPage('view/pages/' . $page, $data);
        $pageTemplate = $this->renderPage('view/baseView.php', array(
            'pageContent' => $pageContent,
            'user' => $user_data
        ));

        echo($pageTemplate);
    }

    private function renderPage($page, $data){
        if(file_exists($page)){
            extract($data);
            ob_start();
            require($page);
            return ob_get_clean();
        }

        throw new Exception("Failed to render page. (File not found)");
        return false;
    }
}