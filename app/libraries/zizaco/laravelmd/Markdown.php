<?php namespace Zizaco\LaravelMd;

use dflydev\markdown\MarkdownParser;

class Markdown
{

    /**
     * Parse markdown string and output the html
     * 
     * @param string $md
     * @return strong Html
     */
    public static function parse( $md )
    {
        $parser = new MarkdownParser;
        
        return $parser->transformMarkdown($md);
    }
}
