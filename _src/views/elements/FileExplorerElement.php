<?php

namespace tomski\_src\views\elements;

class FileExplorerElement extends BaseElement
{
    protected $directory;
    protected $folders;
    protected $files;
    protected $filename;

//  =============================================
//  PROTECTED METHODS
//  =============================================

    protected function getContent()
    {
        $filedatamodel = new \tomski\_src\data_access\datamodels\FileDatamodel();
        if (isset($_GET['file']))
        {
            $file = \tomski\_src\tools\Tools::getRequestVar('folder', false, 1);
            $this->filename = $filedatamodel->getFileById($file);
            if ($this->filename == false) return false;
        }
        else
        {
            $this->directory = \tomski\_src\tools\Tools::getRequestVar('folder', false, 1);
            $this->folders = $filedatamodel->getFoldersByFolder($this->directory);
            $this->files = $filedatamodel->getFilesByFolder($this->directory);
        }
        return true;
    }

//  =============================================

    protected function displayContent()
    {
        if (isset($_GET['file']))
        {
            //Dit plaatst het gelijk, moet op zoek naar iets dat de opmaak "bewaard".
            $content = highlight_file($this->filename);
        }
        else
        {
            $content = '<ul>';
            if ($this->folders)
            {
                foreach ($this->folders as $value => $folder)
                {
                    $content .= '<li><a href="index.php?page='.$this->response['page'].'&folder='.$value.'">'.$folder.'</a></li>';
                }
            }
            if ($this->files)
            {
                foreach ($this->files as $value => $file)
                {
                    $content .= '<li><a href="index.php?page='.$this->response['page'].'&file='.$value.'">'.$file.'</a></li>';
                }
            }
            $content .= '</ul>';
        }
        return $content;
    }
}