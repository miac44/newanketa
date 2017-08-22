<?php

namespace App;

class Html
{
    public $model;
    public $form;
    public $action;

    public function formHeader()
    {
        $form = '<div class="container"><form action="' . $this->action . '" name="' . $this->model::TABLE . '" method="POST">';
        return $form;
    }

    private function formBody()
    {
        foreach ($this->model::COLUMNS as $k => $v) {
            $form .= '<div clas="row"><div class="col-md-4"></div>';
            $form .= '<div class="col-md-4">';
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
            $form .= '</div>';
            $form .= '<div class="col-md-4"></div></div>';
        }
        return $form;
    }

    private function formFooter()
    {
        $form .= '<div clas="row"><div class="col-md-4"></div>';
        $form .= '<div class="col-md-4">';
        $form .= '<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Сохранить</button>';
        $form .= '</div><div class="col-md-4"></div></div>';
        $form .= '</form></div>';
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
