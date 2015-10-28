<?php

namespace vshTech\Laravel4Hash;

use \Illuminate\Console\Command as Command;
use \Symfony\Component\Console\Input\InputOption as InputOption;
use \Symfony\Component\Console\Input\InputArgument as InputArgument;

class HashMakeCommand extends Command
{
    protected $name = 'hash:make';

    protected $description = 'Hash a string.';

    public function __construct() {
        parent::__construct();
    }

    public function getArguments() {
        return [
            ['string', InputArgument::REQUIRED, 'String to be hashed.']
        ];
    }

    public function fire() {
        $string = $this -> argument ('string');
        $this -> info (\Hash::make($string));
    }
}