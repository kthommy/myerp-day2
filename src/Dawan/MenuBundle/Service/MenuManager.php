<?php

namespace App\Dawan\MenuBundle\Service;

use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;

class MenuManager
{
    /**
     * @var AuthorizationCheckerInterface
     */
    private $checker;
    
    /**
     * @param AuthorizationCheckerInterface $checker
     */
    public function __construct(AuthorizationCheckerInterface $checker)
    {
        $this->checker = $checker;
    }
    
    /**
     * @return array
     */
    public function navbarLinks(): array
    {
        $links = [
            'app_main_index' => 'main.index.title',
            'app_worker_index' => 'worker.index.title',
            'app_job_index' => 'job.index.title',
        ];
        
        if ($this->checker->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
            $links['app_security_logout'] = 'security.action.logout';
        } else {
            $links['app_security_login'] = 'security.action.login';
        }
        
        return $links;
    }
}
