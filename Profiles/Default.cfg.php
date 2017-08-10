<?php
return array (
  'site' =>
  array (
    'title' => 'Мой первый сайт',
    'name' => 'слоган',
    'copyright' => 'Все права защищены',
    'publish_year' => '2017',
    'meta' => 
    array (
      'name' => 
      array (
        'keywords' => 'сайт, мой первый сайт, тест',
        'author' => 'Автор',
        'description' => 'Описание сайта',
        'viewport' => 'width=device-width, initial-scale=1.0',
      ),
    ),
  ),
  'cookie' =>
  array (
    'name' => 'ThisIsDefaultProfile',
    'time' => 31536000,
  ),
  'db' =>
  array (
    'host' => 'localhost',
    'user' => 'username',
    'password' => 'simplepassword',
    'dbname' => 'database',
  ),
  'posts' =>
        array (
            'count_on_start_page' => 3,
        ),
    'template_engine' => 'Twig',
    'cache_dir' => '/path/to/cache/from/root',
    'template_dir' => '/path/to/main/template/from/root',
    'date_format' => 'd.m.Y H:i',
  'routes' =>
  array (
    '/' => '/Anketa/Index',
    '/auth' => '/Main/Auth',
    '/logout' => '/Main/Logout',
    '/login' => '/Main/Login',
    '/admin' => '/Admin/Index',
    '/admin/second' => '/Admin/Second',
    '/admin/medicalorganization/form' => '/Admin/MedicalOrganizationForm',
    '/admin/medicalorganization/save' => '/Admin/MedicalOrganizationSave',
    '/admin/medicalorganization/list' => '/Admin/MedicalOrganizationList',
    '/admin/medicalorganization/delete/<1>' => '/Admin/MedicalOrganizationDelete(id=<1>)',
    '/admin/medicalorganization/edit/<1>' => '/Admin/MedicalOrganizationForm(id=<1>)',
  ),

);