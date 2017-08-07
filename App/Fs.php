<?php
namespace App;


class Fs
{
    public static findFiles($mask="*.*")
    {
        return glob($mask, GLOB_BRACE);
    }

    public static findDir($mask="*.*")
    {
        return glob($mask, GLOB_BRACE|GLOB_ONLYDIR);
    }

}