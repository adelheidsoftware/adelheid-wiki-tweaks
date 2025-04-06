<?php

namespace MediaWiki\Extension\AdelheidTweaks;

use Parser;
use MediaWiki\MediaWikiServices;

class FunctionHooks implements \MediaWiki\Hook\ParserFirstCallInitHook {

	/**
	 * Registers our parser functions with a parser.
	 *
	 * @see https://www.mediawiki.org/wiki/Manual:Hooks/ParserFirstCallInit
	 *
	 * @param Parser $parser
	 */
	public function onParserFirstCallInit( $parser ) {
		MediaWikiServices::getInstance()->getContentLanguage()->mMagicExtensions['toCargoBoolean'] = ['toCargoBoolean', 'toCargoBoolean'];
		MediaWikiServices::getInstance()->getContentLanguage()->mMagicExtensions['calculateDamageTypes'] = ['calculateDamageTypes', 'calculateDamageTypes'];

		$parser->setFunctionHook( 'toCargoBoolean', $this->toCargoBoolean(...) );
		$parser->setFunctionHook( 'calculateDamageTypes', $this->calculateDamageTypes(...) );
	}

	function toCargoBoolean ( $parser, $param = '' ) {
		switch ((string) $param) {
			case 'yes':
			case 'true':
			case '1':
				return '1';
				break;
			case 'no':
			case 'false':
			case '0':
				return '0';
				break;
			default:
				return '0';
		}
	}

	function calculateDamageTypes ( $parser, $standard = '', $strike = '', $slash = '', $pierce = '', $none = '' ) {
		if ($standard && !$strike && !$slash && !$pierce && !$none) { # Standard
			return '[[Standard Damage|Standard]]';
		} else if (!$standard && !$strike && $slash && !$pierce && !$none) { # Slash
			return '[[Slash Damage|Slash]]';
		} else if (!$standard && $strike && !$slash && !$pierce && !$none) { # Strike
			return '[[Strike Damage|Strike]]';
		} else if (!$standard && !$strike && !$slash && $pierce && !$none) { # Pierce
			return '[[Pierce Damage|Pierce]]';
		} else if (!$standard && !$strike && !$slash && !$pierce && $none) { # None
			return 'None';
		} else if ($standard && !$strike && !$slash && $pierce && !$none) { # Standard/Pierce
			return array('[[Standard Damage|Standard]] / [[Pierce Damage|Pierce]]');
		} else if (!$standard && !$strike && $slash && $pierce && !$none) { # Slash/Pierce
			return '[[Slash Damage|Slash]] / [[Pierce Damage|Pierce]]';
		} else if (!$standard && $strike && !$slash && $pierce && !$none) { # Strike/Pierce
			return '[[Strike Damage|Strike]] / [[Pierce Damage|Pierce]]';
		} else {
			return 'Unknown';
		}
	}

}