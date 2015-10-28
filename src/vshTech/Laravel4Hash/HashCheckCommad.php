<?php

namespace vshTech\Laravel4Hash;

use \Illuminate\Console\Command as Command;
use \Symfony\Component\Console\Input\InputOption as InputOption;
use \Symfony\Component\Console\Input\InputArgument as InputArgument;

class HashCheckCommand extends Command
{
    protected $name = 'hash:check';
    protected $description = 'Compare a hash to string.';

    public function __construct() {
        parent::__construct();
    }

    public function getArguments() {
        return [
            ['string', InputArgument::REQUIRED, 'String to be checked.'],
            ['hash', InputArgument::REQUIRED, 'Hash in single quotes.']
        ];
    }

    public function fire() {
        $string = $this -> argument ('string');
        $hash = $this -> argument ('hash');

        if (\Hash::check($string, $hash) === false) {
            $this -> error ('Compare: not match!');
        } else {
            $this -> info ('Compare: match!');
        }
        if (\Hash::needsRehash($hash)) {
            $this->info('Your hash needs to be rehashed.');
        }
    }
}