
************
Bakeryslider
************


DEUTSCH

Snippet zur Darstellung von Bakery-Artikeln
*******************************************

Funktionsaufruf:
if (function_exists('bakeryslider')) {
	bakeryslider(6,1,5);
}  

Parameter (num_items, order, visible):
num_items = Anzahl der Artikel (0 = alle Artikel)
order     = Artikel-Auswahl (0 = älteste Artikel, 1 = neueste Artikel, 2 = Zufall)
visible   = Anzahl der gleichzeitig sichtbaren Bilder (Standard = 5)

num_items sollte nicht kleiner als visible sein, da visible die Breite des Sliders bestimmt.

Erforderlich ist die Einbindung von jQuery.
Das jCarouselLite Skript wird automatisch eingebunden.

http://www.gmarwaha.com/jquery/jcarousellite/#doc

Möglicherweise muss das Stylsheet frontend.css an die eigenen Bedürfnisse angepasst werden.



~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~


ENGLISH

Bakery product slider snippet
*****************************

This slider uses the main-images-thumbs from the /media/bakery/thumbs/ directory.

Customized call:
if (function_exists('bakeryslider')) {
	bakeryslider(6,1,5);
} 

Arguments (num_items, order, visible):
num_items = Number of items that are loaded by the slider (0 for all items)
order     = Item selection (0 = oldest items, 1 = newest items, 2 = random)
visible   = Number of images that are visible in the slider (default = 5)

num_items should not be smaller than visible.

The slider depends on jQuery.
The jCarouselLite script is included by the snippet automatically.

http://www.gmarwaha.com/jquery/jcarousellite/#doc

You might have to edit the stylesheet frontend.css to fit your needs.

