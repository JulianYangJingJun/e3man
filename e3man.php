<?php
namespace e3man\e3man;
 
use Illuminate\Session\SessionManager;
use Illuminate\Config\Repository;

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
    public function __construct(SessionManager $session, Repository $config)
    {
        $this->session = $session;
        $this->config = $config;
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
