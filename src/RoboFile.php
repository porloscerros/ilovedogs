<?php

/**
 * This is project's console commands configuration for Robo task runner.
 *
 * @see http://robo.li/
 */
class RoboFile extends \Robo\Tasks
{
    /**
     * This one must match docker containers suffix
     */
    private $user_id = 'CURRENT_UID=$(id -u):$(id -g)';
    
    /**
     * Run app
     */
    public function up()
    {
        $this->taskExec('cd .. && docker-compose up')->run();
    }

    /**
     * Arguments must be wrapped altogether in quotes.
     * Eg: "make:test MyUnitest"
     *
     * @param string $commands Command within quotes
     * @param string $args Parameters after --
     */
    public function artisan(string $commands, string $args = '')
    {
        // run docker as non-root user
        $this->taskExec($this->user_id . ' docker-compose run app php artisan ' . $commands)->args($args)->run();
    }

    /**
     * Execute a composer command
     * You have to pass the command and arguments within quotes, like:
     * robo composer "require package/package"
     *
     * @param string $commands
     */
    public function composer(string $commands)
    {
        $this->taskExec($this->user_id . ' docker-compose run composer ' . $commands)->run();
    }

    /**
     * Watch logs in real time
     * tail -f log 
     */
    public function watchLog($filename = 'laravel')
    {
        $this->taskExec('tail -f storage/logs/'.$filename.'.log')->run();
    }
    
    /**
     * Watch log exceptions in real time
     * tail -f log 
     */
    public function watchExceptions($filename = 'laravel')
    {
        $this->taskExec('tail -f storage/logs/'.$filename.'.log | grep Exception')->run();
    }
}
