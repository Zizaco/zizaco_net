<?php

/*
|--------------------------------------------------------------------------
| Compiles LESS files (development environment only)
|--------------------------------------------------------------------------
|
| Compiles any less file within app/less directory to the equivalent in
| directory in assets/css.
|
*/

/*
function compileTree( $less, $origin, $destiny, $offset = '' )
{
    $tree = array();
    $dir = scandir( $origin.$offset );

    foreach ( $dir as $filename )
    {
        if ( is_dir( $origin.$offset.$filename ) and $filename != '.' and $filename != '..')
        {
            if ( ! file_exists( $destiny.$offset.$filename ) )
            {
                mkdir( $destiny.$offset.$filename );
            }

            // Recursive call
            $tree[$filename] = compileTree( $less, $origin, $destiny, $offset.$filename.'/' );
        }
        elseif ( is_file( $origin.$offset.$filename ))
        {
            if ( substr($filename,-5) == '.less' )
            {
                $tree[] = $filename;

                // Compile file
                $less->checkedCompile(
                    $origin.$offset.$filename,
                    $destiny.$offset.substr($filename,0,-5).'.css'
                );
            }
        }
    }

    return $tree;
}

$from = __DIR__.'/../less/';
$to = __DIR__.'/../../public/assets/css/';
$less = new lessc;
$tree = compileTree( $less, $from, $to );
*/
