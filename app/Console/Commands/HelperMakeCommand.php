<?php

namespace App\Console\Commands;

use Illuminate\Console\GeneratorCommand;
use Symfony\Component\Console\Input\InputArgument;

class HelperMakeCommand extends GeneratorCommand
{
    protected $signature   = 'make:helper {name}';
    protected $description = 'Untuk membuat helper';
    protected $type        = 'Helpers';

    protected function getStub(){
        return __DIR__.'/stubs/helper.stub';
    }

    protected function getArguments(){
        return [
            ['name', InputArgument::REQUIRED, 'The name of the command.'],
        ];
    }
    
    protected function getDefaultNamespace($rootNamespace){
        return $rootNamespace.'\Helpers';
    }
}
