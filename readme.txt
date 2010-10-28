=== mmmp3 ===
Contributors: Travis Ballard
Tags: mp3, audio, mp3 player, flash mp3, flash, shortcode, mp3 shortcode, player, sound
Requires at least: 3.0
Tested up to: 3.0.1
Stable tag: 1.0
License: GPLv2

Shortcode integration for Flash MP3 Player from http://flash-mp3-player.net

== Description ==

Shortcode integration for Flash MP3 Player from http://flash-mp3-player.net

== Installation ==

Upload the mmmp3 plugin to your blog, Activate it, Use the shortcode in your posts.

== Frequently Asked Questions ==

= I'm getting a PHP error =
* Are you running PHP5 or greater? It's required.
* Are you running WordPress 3.0 or later? It's required as well.

= What shortcode attributes are available =
* src : substitute attribute for mp3
* mp3 : URL to MP3 to be played
* config : The URL of the configuration text file, similar to <a href="http://flash-mp3-player.net/medias/config_maxi.txt">config_maxi.txt</a>
* configxml : The URL of the configuration XML file, similar to config_maxi.xml
* autoplay : 1 to auto-play
* autoload : 1 to auto-load
* loop : 1 to loop
* skin : The URL of the JPEG file (not progressive) to load
* volume : The initial volume, between 0 and 200.
* showstop : 1 to show the STOP button
* showinfo : 1 to show the INFO button
* showvolume : 1 to show the VOLUME butotn
* showslider : 0 to hide the player bar
* showloading : Loading bar display mode; autohide, always, or never
* loadingcolor : The color of the loading bar
* bgcolor1 : The first color of the background gradient
* bgcolor2 : The second color of the background gradient
* buttoncolor : The color of the buttons
* buttonovercolor :  Hover color of buttons
* slidercolor1 : The first color of the bar gradient
* slidercolor2 : The second color of the bar gradient
* sliderovercolor : Hover color of the bar
* textcolor : The text color.
* bgcolor : The background color
* buttonwidth : The buttons width. By default set to 26.
* sliderwidth : The slider width. By default set to 20.
* sliderheight : The slider height. By default set to 10.
* volumewidth : The width of the VOLUME button. By default set to 30.
* volumeheight : The height of the VOLUME button. By default set to 6
* byteslimit : If it is a mp3 streaming, the stream will restart at the bytes limit, for prevent overload.

= keyboard shortcuts =
* space : Play/Pause
* P : Play/Pause
* S : Stop
* I : Show informations
* left : 5 seconds backward
* right : 5 seconds forward
* + : Volume up
* - : Volume down

== Screenshots ==

1. player

== Changelog ==

= 1.0 =

* Initial release of plugin. Basic functionality, Supports all shortcode attributes for the properties listed here http://flash-mp3-player.net/players/maxi/documentation/