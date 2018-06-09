<?php

namespace Shesh\Test\Plugin;

class ExamplePlugin
{

	public function beforeSetTitle(\Shesh\Test\Controller\Index\Example $subject, $title)
	{
		$title = $title . " to ";
		echo __METHOD__ . "</br>";

		return [$title];
	}


	public function afterGetTitle(\Shesh\Test\Controller\Index\Example $subject, $result)
	{

		echo __METHOD__ . "</br>";

		return '<h1>' . $result . 'Shesh test Plugin' . '</h1>';

	}


	public function aroundGetTitle(\Shesh\Test\Controller\Index\Example $subject, callable $proceed)
	{

		echo __METHOD__ . " - Before proceed() </br>";
		$result = $proceed();
		echo __METHOD__ . " - After proceed() </br>";


		return $result;
	}

}