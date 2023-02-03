<?php 
	
namespace App\Filters\V1;

use Illuminate\Http\Request;
use App\Filters\ApiFilter;

class AppointmentsFilter extends ApiFilter {
	protected $safeParams = [
		'id' => ['eq','lte', 'gte','gt','lt'],
		'user_id' => ['eq'],
		'firstname' => ['eq'],
		'lastname' => ['eq'],
		'date' => ['eq','lte', 'gte','gt','lt'],
		'description' => ['eq']
	];

	protected $columnMap = [
		// no colums yet
	];
	protected $operators = [
		'eq' => '=',
		'lte' => '<=',
		'gte' => '>=',
		'gt' => '>',
		'lt' => '<'

	];
}


?>