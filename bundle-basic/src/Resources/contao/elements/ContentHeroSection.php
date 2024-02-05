<?php
namespace Bundle\Basic;

use Contao\ContentText;

class ContentHeroSection extends ContentText
{

    /**
    * Template
    * @var string
    */
    protected $strTemplate = 'ce_hero_section';

        /**
    * Generate the content element
    */
    protected function compile()
    {
        parent::compile();
    }

}

            