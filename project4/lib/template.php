<?php 
class template{
    protected $vars=[];
    protected $template;
    public function __construct($template)
    {
       $this->template=$template; 
    }
    public function __get($name)
    {
        return $this->name;
    }
    public function __set($name, $value)
    {
        $this->vars[$name]=$value;
    }
    public function __toString()
    {
        extract($this->vars);
        chdir(dirname($this->template));
        ob_start();
        include(basename($this->template));
        return ob_get_clean();
    }
}



?>