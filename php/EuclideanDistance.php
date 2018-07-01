<?php 
	
	/* An example of a class implementation */
	// echo "<h2>Euclidean Distance</h2>";
	// $coordinate1 = array(-1, 2, 3);
	// $coordinate2 = array(4, 0, -3);
	// $output = EuclideanDistance::calculate($coordinate1, $coordinate2);
	// echo "Coordinate A : (".implode(",", $coordinate1).")";
	// echo "<br>";
	// echo "Coordinate B : (".implode(",", $coordinate2).")";
	// echo "<br><br>";
	// echo "Distance between coordinate A and B : ". $output;


	/**
	*	EuclideanDistance.php
	*	
	*	Calculate the distance between 2 points using Euclidean Distance.
	*	support for 2-Dimensional and 3-Dimensional space
	*	
	*	@author Abdullah 'Alim <alimm.abdullah@gmail.com>
	*	@since 	July 1, 2018
	*/
	class EuclideanDistance {

		/**
		*	calculate the distance between 2 points.
		*	
		*	sample 2-D coordinate : array(20, 80)
		*	sample 2-D coordinate : array(-1, 2, 3)
		*	
		*	@param coordinate1 coordinate point A
		*	@param coordinate2 coordinate point B
		*	@return distance
		*/
		public function calculate($coordinate1 = array(), $coordinate2 = array()){

			if (sizeof($coordinate1) != sizeof($coordinate2)) {
				die("Parameter doesn't match");
			}

			$deviationPoints = array();
			for ($i=0; $i < sizeof($coordinate1); $i++) { 
				
				$pointCoordinate1 = $coordinate1[$i];
				$pointCoordinate2 = $coordinate2[$i];

				$deviation = pow($pointCoordinate2 - $pointCoordinate1,2);

				$deviationPoints[] = $deviation;
			}

			$sumOfDeviation = array_sum($deviationPoints);

			$distance = sqrt($sumOfDeviation);

			return $distance;
		}


	}


?>