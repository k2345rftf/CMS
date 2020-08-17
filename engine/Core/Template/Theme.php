<?php


namespace Engine\Core\Template;


class Theme
{

    const RULES_NAME_FILE = array(
        'header'=>'header-%s.php',
        'sidebar'=>'sidebar-%s.php',
        'footer'=>'footer-%s.php'
    );

    public $uri='';

    public function header($name = ''){
        $name = (string) $name;

        if ($name !== ''){
            $name = sprintf(self::RULES_NAME_FILE['header'], $name);
        }
    }

    public function sidebar($name = ''){
        $name = (string) $name;

        if ($name !== ''){
            $name = sprintf(self::RULES_NAME_FILE['sidebar'], $name);
        }
    }

    public function block($name = '', $data = []){

    }

    public function footer($name = ''){
        $name = (string) $name;

        if ($name !== ''){
            $name = sprintf(self::RULES_NAME_FILE['footer'], $name);
        }
    }

    private function loadTemplateFile($nameFile, $data=[]){

        $tmpfile = ROOT_DIR . '/content/themes/default/'.$nameFile.'.php';

        if (is_file($tmpfile)){
            extract($data);
            require_once $tmpfile;
        }else{
            throw new \Exception(sprintf('File not found: '.$tmpfile));
        }
    }

}