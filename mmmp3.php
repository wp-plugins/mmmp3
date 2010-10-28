<?php

    /**
     *   Plugin Name: mmmp3
     *   Plugin URI: http://travisballard.com/wordpress/mmmp3/
     *   Description: Shortcode integration for Flash MP3 Player from http://flash-mp3-player.net
     *   Version: 1.0
     *   Author: Travis Ballard
     *   Author URI: http://www.travisballard.com
     *
     *   Copyright 2010 Travis Ballard
     */
    /*******************************************************************************
     *
     *   This program is free software; you can redistribute it and/or modify
     *   it under the terms of the GNU General Public License as published by
     *   the Free Software Foundation; either version 2 of the License, or
     *   (at your option) any later version.

     *   This program is distributed in the hope that it will be useful,
     *   but WITHOUT ANY WARRANTY; without even the implied warranty of
     *   MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
     *   GNU General Public License for more details.

     *   You should have received a copy of the GNU General Public License
     *   along with this program; if not, write to the Free Software
     *   Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA 02111-1307 USA
     */

    class mmmp3
    {
        public static $flash_player;
        private $default_settings;

        function __construct()
        {
            self::$flash_player = apply_filters( 'mmmp3_player', plugins_url( 'inc/swf/player.swf', __FILE__ ) );
            add_shortcode( 'mmmp3', array( &$this, 'shortcode' ) );

            $this->default_settings = apply_filters(
                'mmmp3_default_settings',
                array(
                    'config' => false,
                    'configxml' => false,
                    'autoplay' =>0,
                    'autoload' =>1,
                    'loop' => 0,
                    'skin' => false,
                    'volume' => 120,
                    'showstop' => 0,
                    'showinfo' => 0,
                    'showvolume' => 0,
                    'showslider' => 1,
                    'showloading' => 'autohide', # autohide, always, or never
                    'loadingcolor' => 'ffff00',
                    'bgcolor1' => '7c7c7c',
                    'bgcolor2' => '333333',
                    'buttoncolor' => 'ffffff',
                    'buttonovercolor' => 'ffff00',
                    'slidercolor1' => 'cccccc',
                    'slidercolor2' => '888888',
                    'sliderovercolor' => 'eeee00',
                    'textcolor' => 'ffffff',
                    'bgcolor' => 'ffffff',
                    'buttonwidth' => 26,
                    'sliderwidth' => 20,
                    'sliderheight' => 10,
                    'volumewidth' => 30,
                    'volumeheight' => 6,
                    'byteslimit' => false
                )
            );
        }

        /**
        * shortcode callback
        *
        * @param mixed $args
        * @return string
        */
        function shortcode( $args )
        {
            extract( shortcode_atts( array_merge( array( 'src' => false, 'mp3' => false ), $this->default_settings ), $args ) );

            # no source file passed, return
            if( ! $src && ! $mp3 )
                return false;

            # set mp3 if user passed src= instead of mp3=
            if( $src && ! $mp3 ) $mp3 = $src;

            # setup flashvars
            $flashvars = '';
            foreach( shortcode_atts( array_merge( array( 'mp3' => urlencode( $mp3 ) ), $this->default_settings ), $args ) as $key => $value )
                if( false !== $value ) $flashvars .= sprintf( '&amp;%s=%s', $key, $value );

            # strip leading &amp;
            $flashvars = preg_replace( '/^&amp;/', '', $flashvars );

            ob_start();
            ?>
            <span class="<?php echo $class; ?>">
                <source src="<?php echo $src; ?>" type="audio/mp3">
                <object type="application/x-shockwave-flash" data="<?php echo self::$flash_player; ?>" width="200" height="20">
                    <param name="movie" value="<?php echo self::$flash_player; ?>" />
                    <param name="bgcolor" value="#<?php echo ltrim( $bgcolor, '#' ); ?>" />
                    <param name="FlashVars" value="<?php echo $flashvars; ?>" />
                    <a href="<?php echo urlencode( $src ); ?>"><?php echo basename( $src ); ?></a>
                </object>
            </span>
            <?php
            return ob_get_clean();
        }
    }

    $mmmp3 = new mmmp3();