<?php

namespace tomski\_src\views\elements;

class FileExplorerElement extends BaseElement
{
    protected $folders;
    protected $files;
    protected $filename;
    protected $filedatamodel;
    protected $parentfolder;

//  =============================================
//  PROTECTED METHODS
//  =============================================

    protected function getContent()
    {
        $this->filedatamodel = new \tomski\_src\data_access\datamodels\FileDatamodel();
        if (isset($_GET['file']))
        {
            $file = \tomski\_src\tools\Tools::getRequestVar('file', false, 1);
            $this->filename = $this->filedatamodel->getFileById($file);
            if ($this->filename == false) return false;
            $this->parentfolder = $this->filedatamodel->getFolderById($this->filename['folder_id']);
            $this->addParentsToPath($this->filename['folder_id']);
        }
        else
        {
            $directory = \tomski\_src\tools\Tools::getRequestVar('folder', false, 1);
            $this->parentfolder = $this->filedatamodel->getParentById($directory);
            $this->folders = $this->filedatamodel->getFoldersByFolder($directory);
            $this->files = $this->filedatamodel->getFilesByFolder($directory);
        }
        return true;
    }

//  =============================================

    protected function displayContent()
    {
        $content = '<div class="'.$this->elementinfo['class'].'"><ul>';
        if ($this->parentfolder)
        {
            $content .= '<li class="parentfolder" data-page="'.$this->response['page'].'" data-folder="'.$this->parentfolder['id'].'">'.$this->parentfolder['name'].'</li>';
        }
        if (isset($this->filename['name']))
        {
            $content .= '</ul>';
            $content .= highlight_file(htmlspecialchars('../'.$this->filename['name']), true);
        }
        else
        {
            if ($this->folders)
            {
                foreach ($this->folders as $value => $folder)
                {
                    $content .= '<li class="folder" data-page="'.$this->response['page'].'" data-folder="'.$value.'">'.$folder.'</li>';
                }
            }
            if ($this->files)
            {
                foreach ($this->files as $value => $file)
                {
                    $content .= '<li class="file" data-page="'.$this->response['page'].'" data-file="'.$value.'">'.$file.'</li>';
                }               
            }
            $content .= '</ul></div>';
        }
        return $content;
    }

//  =============================================
//  PRIVATE METHODS
//  =============================================

    private function addParentsToPath(int $parent_id)
    {
        $parent = $this->filedatamodel->getFolderById($parent_id);
        if ($parent == false) return false;
        $this->filename['name'] = $parent['name'].'/'.$this->filename['name'];
        if ($parent['parent'] > 0) $this->addParentsToPath($parent['parent']);
    }
}