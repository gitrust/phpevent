<?php

class UiHelper
{

    public static function deleteIcon()
    {
        return '<img src="/static/img/trash-can.svg" title="' . I18n::tr('icon.title.delete') . '">';
    }

    public static function editIcon()
    {
        return '<img class="icon" src="/static/img/edit.svg" title="' . I18n::tr('icon.title.edit') . '">';
    }

    public static function plusIcon()
    {
        return '<img src="/static/img/plus.svg" title="' . I18n::tr('icon.title.add') . '">';
    }

    public static function leftIcon()
    {
        return '<img src="/static/img/arrow-left.svg" title="' . I18n::tr('icon.title.back') . '">';
    }

    public static function rightIcon()
    {
        return '<img src="/static/img/arrow-right.svg" title="' . I18n::tr('icon.title.forward') . '">';
    }

    public static function activateIcon()
    {
        return '<img src="/static/img/check-circle.svg" title="' . I18n::tr('icon.title.activate') . '">';
    }

    public static function deactivateIcon()
    {
        return '<img src="/static/img/circle-xmark.svg" title="' . I18n::tr('icon.title.deactivate') . '">';
    }

    public static function externalLinkIcon()
    {
        return '<i class="fas fa-external-link-alt"></i>';
    }

    public static function pdfIcon()
    {
        return '<img src="/static/img/file-pdf.svg" title="' . I18n::tr('icon.title.pdf') . '">';
    }

    public static function printIcon()
    {
        return '<img class="icon" src="/static/img/print.svg" title="' . I18n::tr('icon.title.print') . '">';
    }

    public static function formatDate($d)
    {
        if (is_null($d)) {
            return '--';
        }
        // format mysql date to php date with strtotime()
        return date('d.m.Y', strtotime($d));
    }

    public static function textToMd($text)
    {
        // make it HTML safe
        $text = htmlspecialchars($text, ENT_QUOTES, 'UTF-8');

        // Processes \r\n's first so they aren't converted twice.
        $newstr = str_replace(array("\r\n", "\n", "\r"), '<br />', $text);

        // bold
        $newstr = preg_replace('/\*\*(.*?)\*\*/s', '<b>$1</b>', $newstr);

        return  $newstr;
    }
}
