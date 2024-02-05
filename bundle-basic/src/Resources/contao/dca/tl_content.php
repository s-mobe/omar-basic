<?php


// Hero Section
$GLOBALS['TL_DCA']['tl_content']['palettes']['hero_section'] = '{type_legend},type,headline;{text_legend},text;{expert_legend:hide},cssID;';

// Hero Section Subpage
$GLOBALS['TL_DCA']['tl_content']['palettes']['hero_section_subpage'] = '{type_legend},type,headline;{text_legend},text;{image_legend},singleSRC;{expert_legend:hide},cssID;';

// WhiteLabel Box
$GLOBALS['TL_DCA']['tl_content']['palettes']['whitelabel_box'] = '{type_legend},type,headline;{text_legend},text;{expert_legend:hide},cssID;';

// CTA Image
$GLOBALS['TL_DCA']['tl_content']['palettes']['cta'] = '{type_legend},type,headline;{text_legend},text;{image_legend},singleSRC;{expert_legend:hide},cssID;';

// Services
$GLOBALS['TL_DCA']['tl_content']['palettes']['services'] = '{type_legend},type,headline;{services_legend},services;';

// Specialities
$GLOBALS['TL_DCA']['tl_content']['palettes']['specialities'] = '{type_legend},type,headline;{specialities_legend},specialities;';

// Tools Showcase
$GLOBALS['TL_DCA']['tl_content']['palettes']['tools_showcase'] = '{type_legend},type,headline;{tools_legend},multiSRC,sortBy;';

// Simple CTA
$GLOBALS['TL_DCA']['tl_content']['palettes']['simple_cta'] = '{type_legend},type,headline;{link_legend},url';

// ShowCase
$GLOBALS['TL_DCA']['tl_content']['palettes']['showcase'] = '{type_legend},type,headline;{gallery_legend},multiSRC';

// Price Box
$GLOBALS['TL_DCA']['tl_content']['palettes']['price_box'] = '{type_legend},type,headline;{table_legend},tableitems;{tconfig_legend},summary,thead,tfoot,tleft;{sortable_legend:hide},sortable;';

// Services, for single service page
$GLOBALS['TL_DCA']['tl_content']['fields']['services'] = [
    'inputType' => 'group',
    'palette' => ['service','singleSRC','class'],
    'fields' => [
        'class' => [ // additional field, defined inline
            'inputType' => 'text',
            'eval' => ['tl_class' => 'w50'],
        ]
    ],     
    'min' => 1,
    'order' => true,
        'sql' => [
        'type' => 'blob',
        'notnull' => false,
    ],
    'relation' => [
        'load' => 'lazy',
        'table' => 'tl_page',
    ],  
];

// Specialities for subpages
$GLOBALS['TL_DCA']['tl_content']['fields']['specialities'] = [
    'inputType' => 'group',
    'palette' => ['speciality','singleSRC','text','class'],
    'fields' => [
        'class' => [ // additional field, defined inline
            'inputType' => 'text',
            'eval' => ['tl_class' => 'w50'],
        ]
    ],     
    'min' => 1,
    'order' => true,
        'sql' => [
        'type' => 'blob',
        'notnull' => false,
    ],
    'relation' => [
        'load' => 'lazy',
        'table' => 'tl_page',
    ],  
];


// Services list
$GLOBALS['TL_DCA']['tl_content']['fields']['service'] = array
(
    'search'                  => true,
    'inputType'               => 'text',
    'eval'                    => array('mandatory'=>true, 'maxlength'=>2048, 'dcaPicker'=>true, 'tl_class'=>'w50'),
    'sql'                     => "text NULL"
);

// Speciality field
$GLOBALS['TL_DCA']['tl_content']['fields']['speciality'] = array
(
    'search'                  => true,
    'inputType'               => 'text',
    'eval'                    => array('mandatory'=>true, 'maxlength'=>2048, 'dcaPicker'=>true, 'tl_class'=>'w50'),
    'sql'                     => "text NULL"
);


/**
 * Provide miscellaneous methods that are used by the data configuration array.
 *
 * @internal
 */
class tl_content_fa extends tl_content
{
	/**
	 * Dynamically add flags to the "multiSRC" field
	 *
	 * @param mixed         $varValue
	 * @param DataContainer $dc
	 *
	 * @return mixed
	 */
	public function setMultiSrcFlags($varValue, DataContainer $dc)
	{

        if ($dc->activeRecord)
		{
			switch ($dc->activeRecord->type)
			{
				case 'tools_showcase':
					$GLOBALS['TL_DCA'][$dc->table]['fields'][$dc->field]['eval']['isGallery'] = true;
					$GLOBALS['TL_DCA'][$dc->table]['fields'][$dc->field]['eval']['extensions'] = '%contao.image.valid_extensions%';
					$GLOBALS['TL_DCA'][$dc->table]['fields'][$dc->field]['eval']['mandatory'] = !$dc->activeRecord->useHomeDir;
					break;
			}
		}

		return $varValue;
    }

}