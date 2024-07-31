<?php

namespace MediaWiki\Extension\SoulsborneWikis;

class FooterHooks implements \MediaWiki\Hook\SkinAddFooterLinksHook {


	/**
	 * @see https://www.mediawiki.org/wiki/Manual:Hooks/SkinAddFooterLinks
	 * @param \Skin $skin
	 * @param string $key
	 * @param array $footerlinks
	 * @return void
	 */
	public static function onSkinAddFooterLinks( Skin $skin, string $key, array &$footerlinks ) {
		if( $key === 'places' ) {
			$footerlinks['privacy'] = Html::rawElement ( 'a',
				[
					'href' => 'https://soulsborne.wiki/privacy',
					'rel' => 'noreferrer noopener'
				],
			$skin->msg( 'Privacy' )->text()
			);
	
			$footerlinks['terms'] = Html::rawElement ('a',
				[
					'href' => 'https://soulsborne.wiki/terms',
					'rel' => 'noreferrer noopener'
				],
			$skin->msg ( 'Terms' )->text()
			);
	
			$footerlinks['contact'] = Html::rawElement ('a',
				[
					'href' => 'https://adelheid.org/contact',
					'rel' => 'noreferrer noopener'
				],
			$skin->msg ( 'Contact' )->text()
			);
		};
	}

}
