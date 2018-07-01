<?php 
	
	/* An example of a class implementation */
	echo "<h2>Cosine similarity</h2>";

	$a = "Hello World";
	$b = "Hello Dunia";

	echo "Sentence 1 : ".$a; echo "<br>";
	echo "Sentence 2 : ".$b; echo "<br>";

	$cosineSimilarity = new CosineSimilarity();
	$similarity = $cosineSimilarity->process($a, $b); 

	echo "<br>";
	echo "similarity of sentences : ".$similarity;


	/**
	*	CosineSimilarity.php
	*	
	*	Calculate the similarity between 2 sentences using Cosine Similarity Calculation
	*	
	*	@author Abdullah 'Alim <alimm.abdullah@gmail.com>
	*	@since 	July 1, 2018
	*/
	class CosineSimilarity {

		/**
		*	Process for find the similarity of 2 sentences using Cosine Similarity calculation
		*/
		public function process ($sentence1, $sentence2) {

			$countSentence1 = $this->countEachWord($sentence1);
			$countSentence2 = $this->countEachWord($sentence2);

			// echo "The appearance of each word in sentence 1 : "; print_r($countSentence1);
			// echo "<br>";
			// echo "The appearance of each word in sentence 2 : "; print_r($countSentence2);

			$unionTableOfWord = array_merge($countSentence1, $countSentence2);
			$listOfWord = array_keys($unionTableOfWord);


			// echo "<br>"; echo "Unique words : "; print_r($listOfWord); echo "<br>";
			
			$similarity = $this->calculate($listOfWord, $countSentence1, $countSentence2);

			return $similarity;

		}

		/**
		*	Calculate the similarity of 2 sentences
		*/
		private function calculate($arrayWord, $arrayCountWordSentence1, $arrayCountWordSentence2) {

			$nAxnB = 0;
			$powEachWordSentence1 = 0;
			$powEachWordSentence2 = 0;


			foreach ($arrayWord as $index => $word) {
				$countWordSentence1 = $this->getValueWithDefault($word, $arrayCountWordSentence1);
				$countWordSentence2 = $this->getValueWithDefault($word, $arrayCountWordSentence2);
				
				$nAxnB += ($countWordSentence1 * $countWordSentence2);
				$powEachWordSentence1 += pow($countWordSentence1, 2);
				$powEachWordSentence2 += pow($countWordSentence2, 2);
			}

			// echo "<br> nA*nB : ".$nAxnB;
			// echo "<br> powEachWordSentence1 : ".$powEachWordSentence1;
			// echo "<br> powEachWordSentence2 : ".$powEachWordSentence2;

			$sqrtWord = sqrt($powEachWordSentence1) * sqrt($powEachWordSentence2);

			// echo "<br> sqrtWords : ".$sqrtWord;

			$similarity = ($nAxnB / $sqrtWord);

			return $similarity;
		}

		/**
		*	Get value in array, if the key not exists then return 0
		*/
		private function getValueWithDefault ($key, $arrayWordAppearance) {
			return array_key_exists($key, $arrayWordAppearance) ? $arrayWordAppearance[$key] : 0;
		}

		/**
		*	Count the occurrence of each word in a sentence
		*/
		private function countEachWord ($sentence) {
			$arraySentence = preg_split('/\s+/', trim($sentence));
			$arrayCount = array_count_values($arraySentence);
			
			return $arrayCount;
		}

	}


?>