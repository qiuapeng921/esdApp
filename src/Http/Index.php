<?php

namespace app\Http;

use app\Service\UserService;
use DI\Annotation\Inject;
use ESD\Examples\Model\User;
use ESD\Plugins\EasyRoute\Annotation\GetMapping;
use ESD\Plugins\EasyRoute\Annotation\RestController;
use ESD\Plugins\Mysql\MysqlException;
use ESD\Plugins\Redis\RedisException;
use ESD\Plugins\Validate\ValidationException;

/**
 * @RestController()
 */
class Index extends Base
{
    /**
     * @Inject()
     * @var UserService
     */
    private $userService;

    /**
     * index
     * @GetMapping("/")
     *
     * @return string
     */
    public function index()
    {
        return 'hello word';
    }

    /**
     * getOne
     *
     * @GetMapping("getOne")
     *
     * @return User|null
     *
     * @throws MysqlException
     * @throws ValidationException
     */
    public function getOne()
    {
        $id = $this->queryRequire("id");
        return $this->userService->getUser($id);
    }

    /**
     * lPush
     *
     * @return void
     *
     * @throws RedisException
     */
    public function lPush()
    {
        $this->redis()->lPush('test', '666666666666');
    }
}
