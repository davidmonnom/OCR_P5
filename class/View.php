<?php

class View{
    public function render($page, $data = array()){
        if(isset($_SESSION['user'])){
            $user = $_SESSION['user'];
        }else{
            $user = null;
        }

        $data['user'] = $user;
        
        $pageContent = $this->renderPage('view/pages/' . $page, $data);
        $pageTemplate = $this->renderPage('view/baseView.php', array(
            'pageContent' => $pageContent,
            'user' => $user,
            'activePage' => $page
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