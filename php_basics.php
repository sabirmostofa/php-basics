1. $this keyword isn't available inside the static method . use self instead.For accesssing the static properties or method you have to use self:: from inside the class.

2. scope resolution operator(::) can used in case of constant, static or overriding properties or methods

3.print returns 1 always whether there is a successful print or not.

4. echo/print isn't actually a function it's a language construct so you can use print() or print '';

5. echo returns nothing

6. If in a class there is a abstract method the class must be abstract.But in a abstract class there is no need to declare abstract method(as seen from the abstract class in the zend dispatcher directory)

7. public functions methods can be accessed from outside. but not protected and private. protected can be inherited but  private can't be.

8. autloading classes is handy feature of php. you can autoload classes by the magic __autoload function.
using this function will try to load the files from the set_include_path Directories. atutoload tries fot the last time to load other the set_include_path directories when a object is instantiated
<?php
function __autoload($className){
	
	require_once($className.'.php');
	
	}  
	
	?>
	
9.In PHP objects are copied by reference. so if you want clone a object do it by $cloned=clone $original

10.Abstract classes are used as the base. you can not create an instance of the abstract class

11. Interfaces can be called the core all methods in interface. ALl methods of the interface must be implemented the the implemented class.

<?php
interface interfa{
	//methods and variables
	}
class foo implements interfa{

	
	}
?>

12.get_class, get_class_methods,class_exists are useful for debugging. 

13. set_include_path is a very important function to define the directory.

14. realpath .<?php echo realpath('/ '.'..'); ?>

15. It's important to understand the do while block. while in do while the code will be executed  whatever the condition in the while loop is.

<?php 
do{
	 echo 'hello';
	 }while(0);
	 ?>

16. understanding break and continue is important. they work in the while ,do-while, for,foreach,switch loop.

Switch is often misunderstood. if you don't break a switch it will compile the next statement whatever the case is.
so include break after each case if you don't want to execute all the case statement after matching.

******** In switch continue acts like break or break acts like continue ******
*******   break=break 0=break 1. contnue=continue 0= continue 1     ***********
<?php 
$a=5;
while(--$a):
switch($a):
	case(3):
	echo 'three';
	continue;  //go to switch again commenting this break will output three four
	
	case(4):
	echo 'four';
	break;  //it just go to the switch again like break 0 or only break
	
	case(5):
	echo 'five';
	break 2; //break 2 breaks from the while loop
	default:    //default is executed if nothing in the case matched
	echo 'nothing';
	endswitch;
	endwhile;
	 
	 ?>
	 
	 ****** continue break example*********
	17. continue is used to skip the current loop count and go to the next loop count
	 
	 <?php
	 echo '***********';
	 for($a=5;$a>0;$a--):
		 while(1):			 
			 $a--;	
			 while(1):
				 $a--;
				 if(!$a)break 1;	//break 2 wont' give the output 			 
				 endwhile;	
				 echo $a;	 
			 if(!$a)break;
			 endwhile;
		 
		 endfor;
	 ?>
	 
	 18. in for loop leaving the second expression will make an infinite loop assuming the blank as true
	 
	 
	 <?php 	 
	  for($i=5;$i!=8;$i++):	 
		 echo $i;		 
		 endfor;
		 
		 //leaving the first+third operator will work as while
		 $a=10;
		 $i=0;
		 
		 for(;$a>0;):
		 echo $a;
		 if(++$i==4) break 1;
		 endfor;		
		 ?>
		 
		 19. always use alternative syntax for the loops for more readability
		 
		 20. Every object has it's own unique property values if it isn't cloned or copied(which is by refrerence default) 
		 
		 <?php
		 
		 class a{
			 public static $a=7;
			 public $b;			 
			 }			 
			 $c=new a;
			 $m=$c;
			 $cloned=clone $c;
			 $c->b='maimai';
			 $cloned1=clone $c;
			 $d=new a;
			 echo $c->b.'copied after  '.$m->b.'new object  '.$d->b.' cloned before '.$cloned->b.'cloned after '.$cloned1->b;
			 
			 echo a::$a;
			 a::$a=9;
			 echo a::$a;
		 
		 ?>
		 
		 21. Making a class constructor private is a clever method to stop the instatiation of the class from outsitde the class. It's also a method of implementing the singleton feature.
		 
		 <?php
		 class geo{
			 public $a;
			 protected $b;
			 protected function __construct(){
			 $this->a=4;
			 $this->b=6;		
		 }
			 
			 }
			 
			 //$p=new geo; trying to instantiate the object will cause a fatal error
			 
		 ?>
		 so what's to do mr. wise? Let's try again. Only way to do this is to make a static function to return the self object, right? and there is no choice withoout making $b static in the following example because 
		 $this keyword isn't avaiable inside static methods.
		 
		 
		 
		 	<?php
		 	 class george{
			 public $a;
			 protected static $b=null;
			 
			 protected function __construct(){
			 $this->a=4;
			 }
			 
			 //my example may have  a problem this method allows only to allow a object at a time but zend singleton my have many objects at a time
			 public static function makeInstance(){
				 if(self::$b==null)//commenting this line will fail the singleton feature
				 return self::$b=new self();// you can also use return new self();but that's why its singleton
				 }			 
			 }
			 
			 var_dump($gotInstance=george::makeInstance());
			 echo $gotInstance->a;
			 
			 var_dump($gotInstance2=george::makeInstance());// it will have returned nothing due to class declaration
			//echo $gotInstance2->a;// it will generate a notice  that trying to get value from non object
		
			 ?>
			 If you have difficulties understanding the example defined above try this. the the self::b is called the $b value is changed so it won't return any more object. try this one
			 <?php
			 
			 class mark{
				 public static $m=null;
				 
				 function __construct(){
					 echo self::$m;
					 }				 
				 }
				 mark::$m=5;
				 $abs=new mark;
			 
			 ?>		
			 
			 21. As you see from the code self is important to remember;	
			 
			 22. you can call function with more arguments than defined*******
			 <?php 
			 
		   function  arg_test(){
			   //$num_arg=func_num_args();
			   $args=func_get_args();
			   foreach($args as $arg)
			   echo $arg;
			   echo '\n';
			   echo func_num_args();
			   } 
			   arg_test(3,4,5);
			   $a=3;
			   // See how to work with variables inside magic_quote
			   
			   echo "${a}_to_bans$a";
			 
			 ?>


23. Let's go back to functions in php. php has interresting features. you can pass parameters to a function by reference and the funtion can also return the reference.Let's checkout the following example.
Note that when returning by reference you have to use ampersand in both places
<?php
// The function changes the variable $b
function &refCheck(&$a){
	$a=4;
	return $a;
	
	}
	$b=3;
	$c=&refCheck($b);
	echo $b;
	
	$c=10;
	
	echo 'after returned from function'.' '.$b;
	
	//functions can return reference too
?>

		 
