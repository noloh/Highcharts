<?php
//Path to NOLOH Kernel, change to your path
require_once("/var/www/htdocs/Stable/NOLOH/NOLOH.php");
System::IncludePaths('../');

class HighchartTest1 extends WebPage
{
	function __construct()
	{
		parent::WebPage('Highchart Example 1');
		$this->Controls->Add($chart = new Highcharts());
	}
}