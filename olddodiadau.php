<?php
/*
Plugin Name: Olddodiadau
Description: Cywiro olddodiad dyddiadau Cymraeg.
Version: 0.1
Author: Rhys Owen
*/
?>
<?
function olddodiadau($d=''){
	if (WPLANG == 'cy-GB' || WPLANG == 'cy'){
		$patrwm = "/\\d?\\d(?:(?:st)|(?:nd)|(?:rd)|(?:th))/";
		preg_match($patrwm, $d, $match);
		if (isset($match[0])){
			$trefnolion = array('1st'=>'1af',
					'2nd'=>'2il',
					'3rd'=>'3ydd',
					'4th'=>'4ydd',
					'5th'=>'5ed',
					'6th'=>'6ed',
					'7th'=>'7fed',
					'8th'=>'8fed',
					'9th'=>'9fed',
					'10th'=>'10fed',
					'11th'=>'11eg',
					'12th'=>'12fed',
					'13th'=>'13eg',
					'14th'=>'14eg',
					'15th'=>'15fed',
					'16th'=>'16eg',
					'17th'=>'17eg',
					'18th'=>'18fed',
					'19th'=>'19eg',
					'20th'=>'20fed',
					'21st'=>'21ain',
					'22nd'=>'22ain',
					'23rd'=>'23ain',
					'24th'=>'24ain',
					'25th'=>'25ain',
					'26th'=>'26ain',
					'27th'=>'27ain',
					'28th'=>'28ain',
					'29th'=>'29ain',
					'30th'=>'30ain',
					'31st'=>'31ain');
			foreach ($trefnolion as $saesneg=>$cymraeg){
				if ($match[0] == $saesneg){
					$saesneg = '/'.$saesneg.'/';
					$d = preg_replace($saesneg, $cymraeg, $d);
					end;
				}
			}
		}
	}
	return $d;
}
add_filter('get_the_time', 'olddodiadau');
?>