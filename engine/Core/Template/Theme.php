<?php

namespace Engine\Core\Template;

class Theme
{
    /**
     * Const RULES_NAME_FILE
     */
    const RULES_NAME_FILE = [
        'header'  => 'header-%s',
        'footer'  => 'footer-%s',
        'sidebar' => 'sidebar-%s',
    ];
    /**
     * Url current theme
     * @var $url
     */
    public $url = '';
    /**
     * @var $data
     */
    protected $data = [];
    /**
     * @param null $name
     * @throws \Exception
     */
    public function header($name=null){
        $name = (string) $name;
        $file = self::detectNameFile($name, __FUNCTION__);

        Component::loadTemplateFile($file);
    }

    /**
     * @param null $name
     * @throws \Exception
     */
    public function footer($name=null){
        $name = (string) $name;
        $file = self::detectNameFile($name, __FUNCTION__);
        Component::loadTemplateFile($file);
    }

    /**
     * @param null $name
     * @throws \Exception
     */
    public function sidebar($name=null){
        $name = (string) $name;
        $file = self::detectNameFile($name, __FUNCTION__);
        Component::loadTemplateFile($file);
    }

    /**
     * @param string $name
     * @param array $data
     * @throws \Exception
     */
    public function block($name='', $data=[]){
        $name = (string) $name;
        if ($name !== ''){
            Component::loadTemplateFile($name, $data);
        }

    }
    private static function detectNameFile($name, $function){
        return empty(trim($name)) ? $function : sprintf(self::RULES_NAME_FILE[$function], $name);
    }

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param mixed $data
     */
    public function setData($data)
    {
        $this->data = $data;
    }
}