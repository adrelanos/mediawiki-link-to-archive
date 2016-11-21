<?php

namespace ArchiveLinks;

class ArchiveLinks
{
    public static function onLinkerMakeExternalLink(&$url, &$text, &$link, array &$attribs, $linktype)
    {
        $attribs['href'] = $url;
        $archiveAttribs = [
            'rel'  => $attribs['rel'],
            'href' => 'https://web.archive.org/web/*/'.$url,
        ];
        if (isset($attribs['target'])) {
            $archiveAttribs['target'] = $attribs['target'];
        }
        $link = \Html::rawElement('a', $attribs, $text).' <sup>'.\Html::rawElement('a', $archiveAttribs, '[archive]').'</sup>';

        //We need to return false if we want to modify the HTML of external links
        return false;
    }
}
