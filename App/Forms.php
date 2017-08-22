<?php

namespace App;

class Forms
{
    public $model;
    public $form;

    public function formHeader()
    {
        $form = '<form action="#" name="' . $this->model::TABLE . '">';
        return $form;
    }

    private function formBody()
    {
        foreach ($this->model::COLUMNS as $k => $v) {
            switch ($v['type']) {
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

    public function getForm()
    {
        $this->form = self::formHeader();
        $this->form .= self::formBody();
        $this->form .= self::formFooter();
        return $this->form;
    }
}
