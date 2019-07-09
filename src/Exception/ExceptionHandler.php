<?php
/**
 * 自定义异常处理类
 * @author qap <qiuapeng921@163.com>
 * @link http://127.0.0.1:8000/index
 * @Date 19-6-18 上午11:32
 */

namespace app\Exception;

use ESD\Go\GoController;
use ESD\Plugins\Ding\GetDing;

class ExceptionHandler extends GoController
{
    use GetDing;

    public function onExceptionHandle(\Throwable $exception)
    {
        $this->response->withHeader("content-type", 'text/html;charset=utf-8');
        if($exception instanceof \Exception){
            $msg = "- 请求地址：**{$this->request->getUri()->getPath()}** \n";
            $msg .= "- 文件名：**{$exception->getFile()}** \n";
            $msg .= "- 第几行：**{$exception->getLine()}** \n";
            $msg .= "- 错误信息：**{$exception->getMessage()}**\n";
            $this->sendMarkdown('异常错误', $msg);
            return '拦截所有异常';
        }
        return parent::onExceptionHandle($exception);
    }
}
