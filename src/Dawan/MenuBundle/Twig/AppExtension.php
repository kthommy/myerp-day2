<?php

namespace App\Dawan\MenuBundle\Twig;

use App\Dawan\MenuBundle\Service\MenuManager;
use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;
use Twig\TwigFunction;

class AppExtension extends AbstractExtension
{
    /**
     * @var MenuManager
     */
    private $menu;
    
    public function __construct(MenuManager $menu)
    {
        $this->menu = $menu;
    }
    
    /**
     * @return array
     */
    public function getFunctions(): array
    {
        return [
            new TwigFunction('navbar_links', [$this->menu, 'navbarLinks']),
        ];
    }
}
