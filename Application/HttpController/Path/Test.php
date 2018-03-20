<?php
/**
 * Created by PhpStorm.
 * User: yf
 * Date: 2018/3/16
 * Time: 下午12:59
 */

namespace App\HttpController\Path;


use EasySwoole\Core\Http\AbstractInterface\Controller;
use EasySwoole\Core\Http\UrlParser;

class Test extends Controller
{

    protected $arg = null;
    function index()
    {
        // TODO: Implement index() method.
        $this->actionNotFound('index');
    }

    protected function onRequest($action): ?bool
    {
        $ret = pathInfo($this->request()->getUri()->getPath());
        if(isset($ret['filename'])){
            $this->arg = $ret['filename'];
        }
        return parent::onRequest($action); // TODO: Change the autogenerated stub
    }

    /*
    * /path/test/a/1-1-1-1.html
    */
    public function a()
    {
        $this->response()->write('your arg is'.$this->arg);
    }
}