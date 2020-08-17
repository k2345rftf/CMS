<?php


namespace Engine\Core\Template;


class View
{
    public function __construct()
    {
    }

    public function render($template, $vars = array())
    {
        $templatePath = $this->getTemplatePath($template);
        if(!is_file($templatePath)){
            throw new \InvalidArgumentException(sprintf('Template "%s" not found %s', $template, $templatePath));
        }
        extract($vars);

        ob_start();
        ob_implicit_flush(0);

        try{
            require $templatePath;
        }catch(\ErrorException $e){
            ob_end_clean();
            throw  $e;
        }

        echo ob_get_clean();
    }

    private function getTemplatePath($template):string {
        switch(ENV) {
            case 'Admin':
                return ROOT_DIR . '/View/' . $template . '.php';

            case 'Cms':
                return ROOT_DIR . '/content/themes/default/' . $template . '.php';

        }
    }

}