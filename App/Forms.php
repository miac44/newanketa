<?php

namespace App;

class Forms
{
    public $model;
    public $form;

    public function __construct($model)
    {
        $this->model = $model;
        $this->form = self::formHeader();
        $this->form .= self::formBody();
        $this->form .= self::formFooter();
    }

    private function formHeader()
    {
        $form = '<form action="#" name="' . $this->model::TABLE. '">';
        return $form;
    }
    private function formHeader()
    {
        foreach ($model::COLUMNS as $k=>$v){
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
    }
    private function formFooter()
    {
        $form = '</form>';
        return $form;
    }
}
