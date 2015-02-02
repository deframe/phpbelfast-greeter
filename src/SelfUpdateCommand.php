<?php
namespace Greeter;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\Question;

class SelfUpdateCommand extends Command
{
    const DOWNLOAD_URL = 'http://www.cryst.co.uk/phpbelfast-greeter';
    
    protected function configure()
    {
        $this->setName('self-update')
            ->setDescription('Update Greeter to the latest version');        
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $localFilename = realpath($_SERVER['argv'][0]) ?: $_SERVER['argv'][0];
        $tmpDir = sys_get_temp_dir();

        $latestVersion = trim(file_get_contents(self::DOWNLOAD_URL . '/version'));              
        
        if (version_compare($this->getApplication()->getVersion(), $latestVersion) == -1) {              

            $output->writeln('Updating Greeter to version ' . $latestVersion . '...');

            $remoteFilename = self::DOWNLOAD_URL . '/greeter.phar';
            $tempLocalFilename = $tmpDir . '/' . basename($localFilename, '.phar') . '-temp.phar';

            $latestPhar = file_get_contents($remoteFilename);
            file_put_contents($tempLocalFilename, $latestPhar);

            if (!file_exists($tempLocalFilename)) {
                $output->writeln('Error: The download of the new Greeter version failed for an unexpected reason');
                return;
            }

            try {
                @chmod($tempLocalFilename, 0777 & ~umask());
                $phar = new \Phar($tempLocalFilename);
                unset($phar);
                rename($tempLocalFilename, $localFilename);
                $output->writeln('Done, you are now using the latest version of Greeter!');
            } catch (\Exception $e) {
                @unlink($tempLocalFilename);
                if (!$e instanceof \UnexpectedValueException && !$e instanceof \PharException) {
                    throw $e;
                }
                $output->writeln('Error: The download is corrupted (' . $e->getMessage() . '). ' 
		    . 'Please re-run the self-update command to try again.');
            }


        } else {
            $output->writeln('You are using the latest version of Greeter! (' . $latestVersion . ')');
        }
    }
}
