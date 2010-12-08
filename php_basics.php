1. $this keyword isn't available inside the static method becuase it can be accessed from outside. use self instead.

2. static properties can't be accessed using the $this keyword in the whole class use self instead

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
