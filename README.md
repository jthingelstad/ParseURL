This is a very basic MediaWiki extension that exposes the PHP parse_url functions.

http://php.net/manual/en/function.parse-url.php

Usage
-----

    {{#parseurl: http://www.youtube.com/watch?v=C4kxS1ksqtw&feature=relate | host}}
  
Returns `www.youtube.com`

    {{#parseurl: http://www.youtube.com/watch?v=C4kxS1ksqtw&feature=relate | scheme}}
    
Returns `http`

    {{#parseurl: http://www.youtube.com/watch?v=C4kxS1ksqtw&feature=relate | path}}
    
Returns `/watch`

    {{#parseurl: http://www.youtube.com/watch?v=C4kxS1ksqtw&feature=relate | query}}

Returns `v=C4kxS1ksqtw&feature=relate`

    {{#parseurl: http://username:password@hostname/path?arg=value#anchor | fragment}}
  
Returns `anchor`

    {{#parseurl: http://username:password@hostname/path?arg=value#anchor | anchor}}
    
Returns nothing.

    {{#parseurlquery: http://www.youtube.com/watch?v=C4kxS1ksqtw&feature=relate | v}}
    
Returns `C4kxS1ksqtw`

    {{#parseurlquery: http://www.youtube.com/watch?v=C4kxS1ksqtw&feature=relate | bar}}

Returns nothing.
