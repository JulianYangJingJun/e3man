<?php
namespace e3man\e3man;
 

class e3man
{
    /**
     * @var SessionManager
     */
    protected $session;

    /**
     * @var Repository
     */
    protected $config;

    /**
     * Packagetest constructor.
     * @param SessionManager $session
     * @param Repository $config
     */
    public function __construct($app)
    {
        $this->session = $app['session'];
        $this->config = $app['config'];
    }

    /**
     * @param string $msg
     * @return string
     */
    public function test_rtn($msg = '')
    {
        $config_arr = config('e3man.E3');
        return $msg . ' <strong>from your custom develop package</strong>';
    }
}
