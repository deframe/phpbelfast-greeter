<?php
namespace Greeter;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\Question;

class HelloCommand extends Command
{
    protected function configure()
    {
        $this->setName('hello')
            ->setDescription('Say hello to phpBelfast!')
            ->addArgument(
                'name',
                InputArgument::OPTIONAL,
                'Who do you want to say hello to?'
            )
            ->addOption(
                'yell',
                'y',
                InputOption::VALUE_NONE,
                'If set, you will be yelled at!'
            );
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {               
        $name = $input->getArgument('name');
        if ($name) {
            $text = 'Hello there ' . $name . '!';
        } else {
            $text = 'Hello there!';
        }
        if ($input->getOption('yell')) {
            $text = '<error>' . strtoupper($text) . '</error>';
        }
        $helper = $this->getHelper('question');
        $question = new Question('How many times do you want me to say hello? [1] ');
        $times = $helper->ask($input, $output, $question) ?: 1;      
        for ($i = 0; $i <= intval($times) - 1; $i++) {
            $output->writeln($text);
        }
    }
}
