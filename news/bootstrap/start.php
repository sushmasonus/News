<?php

/**
 *
 */
class Bootstrap
{

    public function __construct($request)
    {
        include '../config/config.php';

        $url = rtrim(trim($request['url']), '/');

        if ($url != "") {
            $args = explode('/', $url);

            $controller_name = ucfirst($args[0]);
            $controller_path = "../controllers/" . $controller_name . ".php";

            if (file_exists($controller_path)) {
                require $controller_path;
                $controller = new $controller_name;
                if (!isset($args[1])) {
                    $controller->index();
                } elseif (method_exists($controller, $args[1])) {
                    if (isset($args[2])) {
                        $controller->$args[1]($args[2]);
                    } else {
                        $controller->$args[1]();
                    }

                } else {
                    $this->go404();
                }
            } else {
                $this->go404();
            }

        } else {
            require "../controllers/Index.php";
            $controller = new Index;
            $controller->index();
        }
    }

    public function go404()
    {
        http_response_code(404);
        echo "404 Page Not Found";
    }
}
