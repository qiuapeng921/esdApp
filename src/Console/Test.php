<?php
/**
 * ClassDescription
 * @author qap <qiuapeng921@163.com>
 * @link http://127.0.0.1:8000/index
 * @Date 19-6-18 上午10:56
 */

namespace app\Console;

use ESD\Core\Context\Context;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class Test extends Command
{
    /**
     * @var Context
     */
    private $context;

    /**
     * StartCmd constructor.
     * @param Context $context
     */
    public function __construct(Context $context)
    {
        parent::__construct();
        $this->context = $context;
    }

    protected function configure()
    {
        $this->setName('testConsole')->setDescription("testConsole");
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        while (true){
            print_r('1111111111111111111' . PHP_EOL);
            sleep(1);
        }
    }
}
