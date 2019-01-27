<?php

class Row
{
    public function __construct(Array $row = null){
       $this->create($row);
    }

    // PROPERTIES
    protected const DEFAULT_PROPERTIES = [
        'date',
        'description',
        'account',
        'amount',
        'type'
    ];
    public $properties = array();


    // PUBLIC METHODS
    public function create(Array $array)
    {
        $this->validate($array);
        return $this->properties;
    }

    // PRIVATE METHODS
    private function validate(Array $array)
    {
        $default_properties = $this::DEFAULT_PROPERTIES;

        foreach($default_properties as $key){
            array_key_exists($key, $array) ? null : $missing_properties[] = $key;
        }

        if(isset($missing_properties)){
            throw new Exception("Properties missing or invalid.");
        }

        foreach ($array as $key => $value) {
            empty(trim($value)) == '' ? null : $values[] = $key;
        }

        if(isset($values)){
            throw new Exception("Values missing or invalid.");
        }
        $array['amount'] = floatval($array['amount']);
        $this->properties = $array;
    }
}


class Transaction
{
    public function __construct(Array $rows = null)
    {
        if(!isset($rows[1])){
            throw new Exception("Fewer than 2 rows.", 1);
        } else {
            $this->rows = $rows;
        }
        $this->isBalanced();
    }

    // PARAMETERS
    private $rows           = [];
    private $debit_amounts  = [];
    private $credit_amounts = [];

    private function isBalanced()
    {
        $rows = $this->rows;
        foreach ($rows as $class) {
           $type    = $class->properties['type'];
           $amount  = $class->properties['amount'];
           $type  === 'dr' ? $this->debit_amounts [] = $amount : null;
           $type  === 'cr' ? $this->credit_amounts[] = $amount : null;
        }
        $debit_sum  = array_sum($this->debit_amounts);
        $credit_sum = array_sum($this->credit_amounts);

        if($debit_sum !== $credit_sum){
           throw new Exception("Debits do not equal credits", 1);
        }
    }

    public function preview()
    {
        $rows = $this->rows;
        $output[] = 'DATE    DESCRIPTION    ACCOUNT    DR    CR';
        foreach($rows as $class)
        {
            $properties = $class->properties;
            $a = null;
            foreach($properties as $property)
            {
                $a .= substr($property, 0, 10) . '    ';
            }
            $output[]   = $a;
        }
        return implode("\n", $output);
    }
}

class Account
{
    private $properties = [
        'id' => '',
        
    ];
    
}


$row1 = [
    'date'          => '08/07/1989',
    'description'   => 'Description row 1',
    'account'       => '100',
    'amount'        => '10.01',
    'type'          => 'dr',
];

$row2 = [
    'date'          => '07-07-1900',
    'description'   => 'Description row 2',
    'account'       => '200',
    'amount'        => '10.01',
    'type'          => 'cr',  
];

$row3 = [
    'date'          => '07-07-19',
    'description'   => 'Description row 2',
    'account'       => '200',
    'amount'        => '5.00',
    'type'          => 'cr',  
];


$rows = [
    new Row($row1),
    new Row($row2),
    // new Row($row3),
];

$Transaction = new Transaction($rows);

echo $Transaction->preview();

// print_r($Transaction);
