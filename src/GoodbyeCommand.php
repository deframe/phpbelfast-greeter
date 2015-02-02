<?php
namespace Greeter;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\Question;

class GoodbyeCommand extends Command
{
    protected function configure()
    {
        $this->setName('goodbye')
            ->setDescription('Say goodbye to phpBelfast!');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {                      
        $output->writeln("<info>   _____                 _ _                        </info>");
        $output->writeln("<info>  / ____|               | | |                       </info>");
        $output->writeln("<info> | |  __  ___   ___   __| | |__  _   _  ___         </info>");
        $output->writeln("<info> | | |_ |/ _ \ / _ \ / _` | '_ \| | | |/ _ \        </info>");
        $output->writeln("<info> | |__| | (_) | (_) | (_| | |_) | |_| |  __/        </info>");
        $output->writeln("<info>  \_____|\___/ \___/ \__,_|_.__/ \__, |\___|        </info>");
        $output->writeln("<info>                                  __/ |             </info>");
        $output->writeln("<info>                                 |___/              </info>");                
        $output->writeln("<info>        _           ____       _  __          _   _ </info>");
        $output->writeln("<info>       | |         |  _ \     | |/ _|        | | | |</info>");
        $output->writeln("<info>  _ __ | |__  _ __ | |_) | ___| | |_ __ _ ___| |_| |</info>");
        $output->writeln("<info> | '_ \| '_ \| '_ \|  _ < / _ \ |  _/ _` / __| __| |</info>");
        $output->writeln("<info> | |_) | | | | |_) | |_) |  __/ | || (_| \__ \ |_|_|</info>");
        $output->writeln("<info> | .__/|_| |_| .__/|____/ \___|_|_| \__,_|___/\__(_)</info>");
        $output->writeln("<info> | |         | |                                    </info>");
        $output->writeln("<info> |_|         |_|                                    </info>");
        
    }
}
