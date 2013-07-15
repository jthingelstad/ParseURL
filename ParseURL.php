<?php

$wgExtensionCredits['parserhook'][] = array(
        'path' => __FILE__,     // Magic so that svn revision number can be shown
        'name' => "ParseURL",
        'description' => "Parser function that helps with handling URLs in wikitext.",    // Should be using descriptionmsg instead so that i18n is supported (but this is a simple example).
        'version' => "0.0.1", 
        'author' => "Jamie Thingelstad",
        'url' => "http://thingelstad.com/foo",
);
 
# Define a setup function
$wgHooks['ParserFirstCallInit'][] = 'efParseURL_Setup';
# Add a hook to initialise the magic word
$wgHooks['LanguageGetMagic'][] = 'efParseURL_Magic';
 
function efParseURL_Setup( &$parser ) {
	# Set a function hook associating "n2w" magic word with our function
	$parser->setFunctionHook( 'parseurl', 'efParseURL_Render' );
	$parser->setFunctionHook( 'parseurlquery', 'efParseURLQuery_Render' );
	return true;
}
 
function efParseURL_Magic( &$magicWords, $langCode ) {
	# Add the magic word
	# The first array element is whether to be case sensitive, in this case (0) it is not case sensitive, 1 would be sensitive
	# All remaining elements are synonyms for our parser function
	$magicWords['parseurl'] = array( 0, 'parseurl' );
	$magicWords['parseurlquery'] = array( 0, 'parseurlquery' );
	# unless we return true, other parser functions extensions won't get loaded.
	return true;
}

function efParseURL_Render( $parser, $url = '', $component = '' ) {
	$components = parse_url( $url );
	if (array_key_exists($component, $components)) {
		return $components[$component];
	} else {
		# No component found by that name, return empty string.
		return "";
	}
}

function efParseURLQuery_Render( $parser, $url = '', $param = '' ) {
	# The parser function itself
	# The input parameters are wikitext with templates expanded
	# The output should be wikitext too
	parse_str( parse_url( $url, PHP_URL_QUERY ), $my_query );
	if (array_key_exists($param, $my_query)) {
		return $my_query[$param];
	} else {
		# No parameter found, return an empty string.
		return "";
	}
}
