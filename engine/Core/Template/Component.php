<?php


namespace Engine\Core\Template;


class Component
{
    /**
     * @param $nameFile
     * @param array $data
     * @throws \Exception
     */
    public static function loadTemplateFile($nameFile, $data=[]){
        $templateFile = ROOT_DIR . '/content/themes/default/' . $nameFile . '.php';
        if (ENV == 'Admin'){
            $templateFile = path('view') . '/' . $nameFile . '.php';
        }
        if (is_file($templateFile)){
            extract($data);
            require_once $templateFile;
        }else{
            throw new \Exception(
                sprintf('View file %s does not exist!!!', $templateFile)
            );
        }
    }

}