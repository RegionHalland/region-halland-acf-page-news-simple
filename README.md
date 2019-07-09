# Enkel nyhetsfunktion

## Hur man använder Region Hallands plugin "region-halland-acf-page-news-simple"

Nedan följer instruktioner hur du kan använda pluginet "region-halland-acf-page-news-simple".


## Användningsområde

Denna plugin skapar en post_type med namn "nyhet" med tillhörande fält


## Licensmodell

Denna plugin använder licensmodell GPL-3.0. Du kan läsa mer om denna licensmodell på:
```sh
A) Gnu.org (https://www.gnu.org/licenses/gpl-3.0.html)
B) Wikipedia (https://sv.wikipedia.org/wiki/GNU_General_Public_License)
```


## Installation och aktivering

```sh
A) Hämta pluginen via Git eller läs in det med Composer
B) Installera Region Hallands plugin i Wordpress plugin folder
C) Aktivera pluginet inifrån Wordpress admin
```


## Hämta hem pluginet via Git

```sh
git clone https://github.com/RegionHalland/region-halland-acf-page-news-simple.git
```


## Läs in pluginen via composer

Dessa två delar behöver du lägga in i din composer-fil

Repositories = var pluginen är lagrad, i detta fall på github

```sh
"repositories": [
  {
    "type": "vcs",
    "url": "https://github.com/RegionHalland/region-halland-acf-page-news-simple.git"
  },
],
```
Require = anger vilken version av pluginen du vill använda, i detta fall version 1.0.0

OBS! Justera så att du hämtar aktuell version.

```sh
"require": {
  "regionhalland/region-halland-acf-page-news-simple": "1.0.0"
},
```

## Loopa ut nyheterna via "Blade"

```sh
@php($myNews = get_region_halland_get_page_news_simple())
@if($myNews)
  @foreach ($myNews as $nyhet)
    <h3>{{ $nyhet->post_title }}</h3>
    <p>{{ $nyhet->description }}</p>
    <p>{!! wpautop($nyhet->post_content) !!}</p>
    @if($nyhet->link_hsa_url == 1)
    <a href="{{ $nyhet->link_url }}" target="{{ $nyhet->link_target }}">{{ $nyhet->link_title }}</a>
    @endif
    <br>
  @endforeach
@endif
```

## Exempel på hur arrayen kan se ut

```sh
array (size=2)
  0 => 
    object(WP_Post)[7617]
      public 'ID' => int 209
      public 'post_author' => string '1' (length=1)
      public 'post_date' => string '2019-07-04 11:10:41' (length=19)
      public 'post_date_gmt' => string '2019-07-04 09:10:41' (length=19)
      public 'post_content' => string 'Aldu integer id metus pellentesque, suscipit mauris vel, placerat purus. Vestibulum diam elit, pharetra a velit quis, tristique feugiat metus. Donec maximus purus justo, ut lobortis enim tincidunt at.' (length=200)
      public 'post_title' => string 'Aldu integer' (length=12)
      public 'post_excerpt' => string '' (length=0)
      public 'post_status' => string 'publish' (length=7)
      public 'comment_status' => string 'closed' (length=6)
      public 'ping_status' => string 'closed' (length=6)
      public 'post_password' => string '' (length=0)
      public 'post_name' => string 'aldu-integer' (length=12)
      public 'to_ping' => string '' (length=0)
      public 'pinged' => string '' (length=0)
      public 'post_modified' => string '2019-07-04 11:10:41' (length=19)
      public 'post_modified_gmt' => string '2019-07-04 09:10:41' (length=19)
      public 'post_content_filtered' => string '' (length=0)
      public 'post_parent' => int 0
      public 'guid' => string 'http://exempel.se/nyhet/aldu-integer' (length=36)
      public 'menu_order' => int 0
      public 'post_type' => string 'nyhet' (length=5)
      public 'post_mime_type' => string '' (length=0)
      public 'comment_count' => string '0' (length=1)
      public 'filter' => string 'raw' (length=3)
      public 'link_title' => string 'Expressen' (length=9)
      public 'link_url' => string 'http://www.expressen.se' (length=23)
      public 'link_has_url' =>  => int 1
      public 'link_target' => string '_blank' (length=6)
      public 'url' => string 'http://exempel.se/nyhet/aldu-integer' (length=36)
      public 'image' => string '' (length=0)
      public 'image_url' => boolean false
      public 'description' => string 'Aldu integer id metus pellentesque, suscipit mauris vel.' (length=56)
  1 => 
    object(WP_Post)[7619]
      public 'ID' => int 208
      public 'post_author' => string '1' (length=1)
      public 'post_date' => string '2019-07-04 11:09:41' (length=19)
      public 'post_date_gmt' => string '2019-07-04 09:09:41' (length=19)
      public 'post_content' => string 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean id diam in erat egestas vehicula eu accumsan ligula. In pellentesque, ipsum ac vehicula consectetur, ex erat sagittis risus, ut rhoncus urna enim sit amet massa. Curabitur in massa dapibus, malesuada ex vitae, ultricies erat.' (length=289)
      public 'post_title' => string 'Lorem ipsum' (length=11)
      public 'post_excerpt' => string '' (length=0)
      public 'post_status' => string 'publish' (length=7)
      public 'comment_status' => string 'closed' (length=6)
      public 'ping_status' => string 'closed' (length=6)
      public 'post_password' => string '' (length=0)
      public 'post_name' => string 'lorem-ipsum' (length=11)
      public 'to_ping' => string '' (length=0)
      public 'pinged' => string '' (length=0)
      public 'post_modified' => string '2019-07-04 11:09:41' (length=19)
      public 'post_modified_gmt' => string '2019-07-04 09:09:41' (length=19)
      public 'post_content_filtered' => string '' (length=0)
      public 'post_parent' => int 0
      public 'guid' => string 'http://exempel.se/lorem-ipsum/' (length=30)
      public 'menu_order' => int 0
      public 'post_type' => string 'nyhet' (length=5)
      public 'post_mime_type' => string '' (length=0)
      public 'comment_count' => string '0' (length=1)
      public 'filter' => string 'raw' (length=3)
      public 'link_title' => string 'Aftonbladet' (length=11)
      public 'link_url' => string 'http://www.afonbladet.se' (length=24)
      public 'link_target' => string '' (length=0)
      public 'link_has_url' =>  => int 0
      public 'url' => string 'http://exempel.se/lorem-ipsum/' (length=30)
      public 'image' => string '' (length=0)
      public 'image_url' => boolean false
      public 'description' => string 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.' (length=56)
```


## Versionhistorik

### 1.3.0
- Uppdaterat information om licensmodell
- Lagt till funktion för att hämta ut en enskild nyhet
- Utökat ingress-fältet från 80 tecken till obegränsat

### 1.2.0
- Koll om länk finns, annars returnera tom link-array

### 1.1.0
- Uppdaterat readme med instruktioner

### 1.0.0
- Första version