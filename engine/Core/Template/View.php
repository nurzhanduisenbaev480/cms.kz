<?php

namespace Engine\Core\Template;
use Engine\Core\Template\Theme;
use Engine\DI\DI;

class View
{
    /**
     * @var DI
     */
    public $di;
    /**
     * @var \Engine\Core\Template\Theme
     */
    protected $theme;

    /**
     * View constructor.
     * @param DI $di
     */
    public function __construct(DI $di)
    {
        $this->di = $di;
        $this->theme = new Theme();
    }

    /**
     * @param $template
     * @param array $data
     * @throws \Exception
     */
    public function render($template, $data = []){
        $templatePath = $this->getTemplatePath($template, ENV);

        if (!is_file($templatePath)){
            throw new \InvalidArgumentException(
                sprintf("Template '%s' not found in '%s'", $template, $templatePath)
            );
        }
        $data['lang'] = $this->di->get('language');

        $this->theme->setData($data);
        extract($data);

        ob_start();
        ob_implicit_flush(0);
        try{
            require $templatePath;
        }catch (\Exception $exception){
            ob_end_clean();
            throw $exception;
        }
        echo ob_get_clean();
    }

    /**
     * @param $template
     * @param null $env
     * @return string
     */
    private function getTemplatePath($template, $env = null){
        if ($env == 'Cms'){
            return ROOT_DIR . '/content/themes/default/' . $template . '.php';
        }
        //28 urok 07min
        return path('view') . '/' . $template . '.php';
    }
}