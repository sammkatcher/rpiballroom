<?php

 class GOAL
{	
	public $letter;
    public $name;
    public $description;
    public $programs = array();
	
	public function __construct() 
	{
         
		 $this->name = NULL;
		 $this->description = NULL; 
		 $this->letter = NULL; 
		 $this->programs = array(NULL); 
    }
	
	public static function newgoal($letter,$name,$description,$programs) 
	{
		$instance = new self();
         if(!isset($name)) $name = NULL;
         if(!isset($description)) $description = NULL;
		 if(!isset($letter)) $letter = NULL; 
		 if(!isset($programs)) $programs = NULL; 
		 
		 $instance->name = $name;
		 $instance->description = $description; 
		 $instance->letter = $letter; 
		 $instance->programs = array($programs); 
		 return $instance;
    }
	
	public function add_program($program){
		unset($this->programs[0]);
		$this->programs[]=$program;
	}
	
	public function display_goal(){
		echo ("Goal ".$this->letter.": ".$this->name."<br />\n");
		echo ("Contains  ".count($this->programs)." programs: <br /> \n");
		foreach ($this->programs as $program){
			echo("    ".$program->name."<br />\n");
		}
		echo("<br />\n");
	}
	
}

class PROGRAM
{
    public $name;
	public $number;
    public $description;
    public $line_items = array();
	
	public function __construct() 
	{
         $this->name = NULL;
		 $this->number = NULL; 
         $this->description = NULL; 
		 $this->line_items = array(NULL); 
    }
	
	public static function newprogram($name,$number,$description,$line_items) 
	{
		$instance = new self();
		if(!isset($name)) $name = NULL;
		if(!isset($number)) $number = NULL;
        if(!isset($description)) $description = NULL;
		if(!isset($line_items)) $line_items = NULL; 

        $instance->name = $name;
		$instance->number = $number;
        $instance->description = $description; 
		$instance->line_items = array($line_items); 
		return $instance;
    }
	
	public function add_line($line_item){
		unset($this->line_items[0]);
		$this->line_items[]=$line_item;
	}
	public function display_progam(){
		print_r($this);
		echo ("Name is: ".$this->name."<br />\n");
		echo ("Contains  ".count($this->line_items)." line items: <br /> \n");
		foreach ($this->line_items as $line){
			echo("    ".$line->description."<br />\n");
		}
		echo("<br />\n");
		
	}
}

class LINE_ITEM
{
    public $line_code;
    public $description;
    public $quantity;
	public $unit_price;
	
	public function __construct() 
	{
		if(!isset($line_code)) $line_code = NULL;
        if(!isset($description)) $description = NULL;
		if(!isset($quantity)) $quantity = NULL; 
		if(!isset($unit_price)) $unit_price = NULL; 
		
         $this->line_code = $line_code;
         $this->description = $description; 
		 $this->quantity = $quantity;
         $this->unit_price = $unit_price; 
    }
	
	public static function newline($line_code,$description,$quantity,$unit_price) 
	{
		$instance = new self();
		if(!isset($line_code)) $name = NULL;
        if(!isset($description)) $description = NULL;
		if(!isset($quantity)) $quantity = NULL; 
		if(!isset($unit_price)) $unit_price = NULL; 
		
        $instance->line_code = $line_code;
        $instance->description = $description; 
		$instance->quantity = $quantity;
        $instance->unit_price = $unit_price; 
		 return $instance;
    }

	public function display_line(){
		echo ("Line desc is: ".$this->description);
		echo("<br />\n");
	}
}
	?>