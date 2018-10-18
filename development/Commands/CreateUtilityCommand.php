<?php
declare(strict_types=1);

namespace LarsNieuwenhuizen\EUtilities\Commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CreateUtilityCommand extends Command
{

    /**
     * @return void
     */
    protected function configure(): void
    {
        $this->setName('make:utility')
            ->addArgument('name', InputArgument::REQUIRED, 'The name of the E-Utility')
            ->setDescription('Create a new E-Utility');
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int|null|void
     */
    protected function execute(InputInterface $input, OutputInterface $output): void
    {
        $output->writeln([
            'Create a new E-Utility',
            '======================',
            '',
        ]);
        $directoryCreated = $this->createDirectory($input->getArgument('name'));
        if ($directoryCreated) {
            $output->writeln([
                '<info>Directory created!</info>',
                ''
            ]);

            $this->createEUtilityClass(ucfirst($input->getArgument('name')));
            $output->writeln([
                '<info>Utility class created!</info>',
                ''
            ]);
            return;
        }

        $output->writeln([
            '<error>Directory already exists</error>'
        ]);
    }

    /**
     * @param string $name
     * @return bool
     */
    private function createDirectory(string $name): bool
    {
        $directoryToCreate = 'src/' . $name;
        if (!file_exists($directoryToCreate)) {
            return mkdir('src/' . $name, 0755, true);
        }

        return false;
    }

    /**
     * @param $name
     * @return void
     */
    private function createEUtilityClass($name): void
    {
        $stub = file_get_contents(__DIR__ . '/Stubs/EUtility.stub');
        $stub = str_replace('DummyEUtilityName', $name, $stub);
        file_put_contents('src/' . $name . '/' . $name . '.php', $stub);
    }
}
