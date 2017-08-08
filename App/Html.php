<?php

namespace App;

class Html
{
    public $model;
    public $form;
    public $action;

    public function formHeader()
    {
        $form = '<form action="' . $this->action . '" name="' . $this->model::TABLE. '" method="POST">';
        return $form;
    }
    private function formBody()
    {
        foreach ($this->model::COLUMNS as $k=>$v){
            switch ($v['type']){
                case 'text':
                    $form .= '<textarea name="' . $k . '"></textarea>';
                    break;
                case 'string':
                    $form .= '<input name="' . $k . '" value="" />';
                    break;
                case 'string':
                default:
                    $form .= '<input name="' . $k . '" value="" />';
                    break;
            }
        }
        return $form;
    }
    private function formFooter()
    {
        $form = '<a href="#" class="btn btn-primary btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Сохранить</a>';
        $form = '</form>';
        return $form;
    }

    public function form()
    {
        $this->form = self::formHeader();
        $this->form .= self::formBody();
        $this->form .= self::formFooter();
        return $this->form;  
    }
}
