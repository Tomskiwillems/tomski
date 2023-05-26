<?php

namespace tomski\_src\views\elements;

class DropdownElement extends BaseElement
{
	protected $id;
    protected $options;

//  =============================================
//  PUBLIC METHODS
//  =============================================

	public function __construct(int $id, string $class, string $language, int $tree_order=0)
    {
        parent::__construct($class, $language, $tree_order);
		$this->id = $id;
	}

//  =============================================
//  PROTECTED METHODS
//  =============================================

    protected function getContent()
    {
        $databaseinfo = new \tomski\_src\data_access\DatabaseInfo;
        $this->options = $databaseinfo->getOptionsByID($this->id);
        if ($this->options == false) return false;
        return true;
    }

//  =============================================

    protected function displayContent()
    {
        foreach ($this->options as $barname => $options)
        $content = '<div class="dropdown">
        <span class="dropdown-bar">'.$barname.'</span>
        <div class="dropdown-content">';
        foreach ($options as $value => $name)
        {
            $content .= '<span value="'.$value.'">'.$name.'</span>';
        }
        $content .= '</div></div>';
    }
}