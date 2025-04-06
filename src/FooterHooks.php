<?php

namespace MediaWiki\Extension\AdelheidTweaks;

use Skin;
use Html;

class FooterHooks implements \MediaWiki\Hook\SkinAddFooterLinksHook {


	/**
	 * @see https://www.mediawiki.org/wiki/Manual:Hooks/SkinAddFooterLinks
	 * @param Skin $skin
	 * @param string $key
	 * @param array $footerItems
	 * @return void
	 */
	public function onSkinAddFooterLinks( Skin $skin, string $key, array &$footerItems ) {
		if( $key === 'places' ) {
			$footerItems['privacy'] = Html::rawElement ( 'a',
				[
					'href' => 'https://adelheid.org/privacy',
					'rel' => 'noreferrer noopener'
				],
			$skin->msg( 'Privacy' )->text()
			);
	
			$footerItems['terms'] = Html::rawElement ('a',
				[
					'href' => 'https://adelheid.org/terms',
					'rel' => 'noreferrer noopener'
				],
			$skin->msg ( 'Terms' )->text()
			);
	
			$footerItems['contact'] = Html::rawElement ('a',
				[
					'href' => 'https://adelheid.org/contact',
					'rel' => 'noreferrer noopener'
				],
			$skin->msg ( 'Contact' )->text()
			);
		};
	}

}
