<?php
    // Simple Class Objects

    // class classobj {

    //     var $name;

    //     public function setname($fname){
    //         $this->name=$fname;
    //         echo $this->name;
    //     }
    //     public function LastName(){
    //         echo "Nyalvani";
    //     }
    //     public function getname(){
    //         echo $this->name;
    //     }
    // }

    // $obj = new classobj();
    // $obj2 = new classobj();
    // $obj->setname("Chintan");
    // // $obj->getname();
    // $obj->LastName();


    // Single level inheritance
    // class a {

    //     var $name;

    //     public function setname($fname){
    //         $this->name=$fname;
    //         echo $this->name;
    //     }
    //     public function LastName(){
    //         echo "Nyalvani";
    //     }
    //     public function getname(){
    //         echo $this->name;
    //     }
    // }
    // class b extends a{
    //     var $email;
    //     public function getsetemail($mail){
    //         $this->email = $mail;
    //         echo PHP_EOL.$this->email;
    //     }
    // }

    // $obj = new a();
    // $obj->setname("Chintan");
    // $obj->LastName();

    // $obj2 = new b();
    // $obj2->setname("ViewSonic");
    // $obj2->LastName();
    // $obj2->getsetemail("Chintan.setubridge.com");

    // multilevel inheritance
    // class clsa{
    //     public function A(){
    //         return "I'm from Class A";
    //     }
    // }
    // class clsb extends clsa{
    //     public function B(){
    //         return "I'm from Class B";
    //     }
    // }
    // class clsc extends clsb{
    //     public function C(){
    //         return "I'm from Class C";
    //     }
    //     public function getvalues(){
    //         echo nl2br($this->A()."\n");
    //         echo nl2br($this->B()."\n");
    //         echo nl2br($this->C()."\n");
    //     }
    // }

    // $obj = new clsc();
    // $obj->getvalues();


    // interface
    // interface phone{
    //     public function setModel($modelnm);
    //     public function price($price);
    // }
    // class Samsung implements phone{
    //     public function setModel($modelnm)
    //     {
    //         echo nl2br($this->modelnm = $modelnm);
    //     }
    //     public function price($price)
    //     {
    //         echo nl2br($this->price = $price);
    //     }
    // }
    // $sm = new Samsung();
    // $sm->setModel("J7NXT");
    // $sm->price(9000);

    // abstract class
    abstract class phone{
        public abstract function model($model);
        public abstract function price($price);
    }
    class samsung extends phone{
        public function model($model){
            return $this->model = $model;
        }
        public function price($price){
            return $this->price = $price;
        }
    }
    class Mi extends phone{
        public function model($model){
            return $this->model = $model;
        }
        public function price($price){
            return $this->price = $price;
        }
    }

    $sm = new samsung();
    echo "Samsung ".$sm->model("J7NXT");
    echo " ".$sm->price(9000)."<br>";

    $m = new Mi();
    echo "Mi ".$m->model("Note5");
    echo " ".$m->model(14000);

?>