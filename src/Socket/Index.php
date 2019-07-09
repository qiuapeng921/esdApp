<?php
/**
 * Created by PhpStorm.
 * User: 白猫
 * Date: 2019/5/7
 * Time: 10:48
 */

namespace app\Socket;

use ESD\Plugins\EasyRoute\Annotation\RequestMapping;
use ESD\Plugins\EasyRoute\Annotation\WsController;

/**
 * @WsController()
 * Class Index
 * @package app\WebSocket
 */
class Index extends Base
{
    /**
     * RequestMapping()
     * @return string
     */
    public function wsBindUid()
    {
        $this->bindUid($this->clientData->getFd(), "test1");
        return "test";
    }

    /**
     * @RequestMapping()
     * @return mixed|null
     */
    public function wsGetUid()
    {
        return $this->getFdUid($this->clientData->getFd());
    }

    /**
     * @RequestMapping()
     */
    public function send()
    {
        $this->sendToUid("test1", "hello");
    }

    /**
     * @RequestMapping()
     * @throws \ESD\Plugins\ProcessRPC\ProcessRPCException
     */
    public function wsAddSub()
    {
        $this->addSub("sub", $this->getUid());
    }

    /**
     * @RequestMapping()
     * @throws \ESD\Plugins\ProcessRPC\ProcessRPCException
     */
    public function wsPub()
    {
        $this->pub("sub", "sub");
    }
}
