# SBW-Tweaks
A MediaWiki extension that provides additional functionality specific to the Soulsborne Wikis.

This extension modifies the footer links of our MediaWiki installation.

It also adds several custom parser functions:

* `toCargoBoolean`: converts `true`, `yes`, and similar to `1` and converts `false`, `no`, and similar to `0`.
* `calculateDamageTypes`: Takes in five booleans and determines the Elden Ring damage type from the input. The five booleans represent `standard`, `strike`, `slash`, `pierce`, and `none` damage, in that order.
