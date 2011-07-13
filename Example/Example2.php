<?php
//Path to NOLOH Kernel, change to your path
require_once("/var/www/htdocs/Stable/NOLOH/NOLOH.php");
System::IncludePaths('../');

class HighchartTest2 extends WebPage
{
	function __construct()
	{
		parent::WebPage('Basic Highchart, config from array');
		$config = array(
			'chart' => array(
			 'defaultSeriesType' => 'line',
			 'marginRight' => 130,
			 'marginBottom' => 25
			),
			'credits' => array('enabled' => false),
			'title' => array(
			 text => 'Monthly Average Temperature',
			 x => -20 //center
			),
			'subtitle' => array(
			 'text' => 'Source : WorldClimate.com',
			 'x' => -20
			),
			'xAxis' => array(
			 'categories' => array('Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 
				'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec')
			),
			'yAxis' => array(
			 'title' => array(
				'text' => 'Temperature (°C)'
			 ),
			 'plotLines' => array(
			 	array(
				'value' => 0,
				'width' => 1,
				'color' => '#808080')
			 )
			),
			'tooltip' => array(
			 'formatter' => new ClientEvent("return '<b>'+ this.series.name +'</b><br/>'+
				   this.x +' : '+ this.y +'°C';")
			),
			'legend' => array(
			 'layout' => 'vertical',
			 'align' => 'right',
			 'verticalAlign' => 'top',
			 'x' => -10,
			 'y' => 100,
			 'borderWidth' => 0
			),
			'series' => array(
				array(
				 'name' => 'Tokyo',
				 'data' => array(7.0, 6.9, 9.5, 14.5, 18.2, 21.5, 25.2, 26.5, 23.3, 18.3, 13.9, 9.6)
				), 
				array(
				 'name' => 'New York',
				 'data' => array(-0.2, 0.8, 5.7, 11.3, 17.0, 22.0, 24.8, 24.1, 20.1, 14.1, 8.6, 2.5)
				), 
				array(
				 'name' => 'Berlin',
				 'data' => array(-0.9, 0.6, 3.5, 8.4, 13.5, 17.0, 18.6, 17.9, 14.3, 9.0, 3.9, 1.0)
				), 
				array(
				 'name' => 'London',
				 'data' => array(3.9, 4.2, 5.7, 8.5, 11.9, 15.2, 17.0, 16.6, 14.2, 10.3, 6.6, 4.8)
				))
			);
		$this->Controls->Add($chart = new Highcharts());
		$chart->SetConfig($config);
		
		$config['chart']['defaultSeriesType'] = 'bar';
		$this->Controls->Add($chart2 = new Highcharts(null, 550));
		$chart2->SetConfig($config);
	}
}