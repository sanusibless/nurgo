<?php 
	
namespace App\Filters;

use Illuminate\Http\Request;

class ApiFilter {
	protected $safeParams = [];

	protected $columnMap = [];

	protected $operators = [];

	public function transform(Request $request) {
		$eloQuery =  [];// [columns, $operator, $value ] 
		foreach($this->safeParams as $param => $operators) {
			$query = $request->query($param);
			if(!isset($query)){
				continue;
			} 
			$columns = $this->columnMap[$param] ?? $param;
			foreach ($operators as $operator) {
			  if(isset($query[$operator])) {
				$eloQuery[] = [$columns, $this->operators[$operator], $query[$operator]]; 
			   }
			}
		}
		return $eloQuery;	

	}

}
?>