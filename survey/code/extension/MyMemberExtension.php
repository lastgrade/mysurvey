<?php
class MyMemberExtension extends DataExtension{
	
	private static $many_many = array(
		'Parishes' => 'Parish'
		);
}