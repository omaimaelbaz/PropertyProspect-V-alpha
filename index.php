
<?php  
abstract class a  
{  
abstract public function dis1();  
abstract public function dis2();  
}  
abstract class b extends a  
{  
    abstract public function dis1()  
    {  
        echo "javatpoint";  
    }  
    abstract public function dis2()  
    {  
        echo "SSSIT";     
    }  
}  
$obj = new b();  
$obj->dis1();  
$obj->dis2();  
?>  