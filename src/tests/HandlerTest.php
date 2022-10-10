<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;

require_once 'src/model/query.php';
require_once 'src/model/exerciseHandler.php';
require_once 'src/model/exercise.php';
final class HandlerTest extends TestCase
{
    protected $query;
    protected $exerciseHandler;
    protected $exerciseTitle;
    protected function setUp() : void
    {
        $this->query = new Query();
        $this->exerciseHandler = new ExerciseHandler($this->query);
    }

    public function test_CreateNominalCase_Success(): void
    {
        //given
        $this->exerciseTitle = "test_CreateNominalCase_Success";
        $this->assertFalse($this->exerciseHandler->exists($this->exerciseTitle));

        //when
        $exercise = new Exercise(0,$this->exerciseTitle,0);
        $this->exerciseHandler->create($exercise->getTitle());

        //then
        $this->assertTrue($this->exerciseHandler->exists($exercise->getTitle()));
    }

    public function test_CreateNewExeciceDuplicateTitle_ThrowException(): void
    {
        //given
        $this->exerciseTitle = "test_ThrowException";
        $this->assertFalse($this->exerciseHandler->exists($this->exerciseTitle));
        $exercise = new Exercise(0,$this->exerciseTitle,0);
        $this->exerciseHandler->create($exercise->getTitle());

        //when
        //event will be trigger by the assertion

        //then
        $this->expectException(DuplicateTitleException::class);
        $this->exerciseHandler->create($exercise->getTitle());
    }

    public function test_CreateNewexercise_Success(): void
    {
        //given
        $previousExerice = $this->exerciseHandler->getExercise("test_CreateNewexercise_Success");

        if(isset($previousExerice)){
       
        $this->delete($previousExerice[0]);
        }
        $exercise = new exercise(0,"test_CreateNewexercise_Success",0);
        $this->exerciseHandler->create($exercise->getTitle());
        //assert doesn't exist

        //when
        //Event is called by assertion directly

        //then
        $this->assertTrue($this->exerciseHandler->exists($exercise->getTitle()));

    }
    public function test_DeleteExercise_Success(): void
    {
        //given
        $previousExerice = $this->exerciseHandler->getExercise("test_DeleteExercise_Success");
        if(!isset($previousExerice)){
          
            $this->delete($previousExerice[0]);
        }
       
        $exercise = new exercise(0,"test_DeleteExercise_Success",0);
        $this->exerciseHandler->create($exercise->getTitle());
        $this->exerciseHandler->delete($exercise->getTitle());
        //delete Exercise

 
        //when
        //Event is called by assertion directly

        //then
        $this->assertCount(0, $this->exerciseHandler->getExercise($exercise->getTitle()));
    }

   
    public function test_SelectFourExercises_Success(): void
    {
       
        for($i = 0; $i <= 4; $i++){
            $previousExerice = $this->exerciseHandler->getExercise("testSelectFourExercises" . $i);
         
            if(isset($previousExerice)){
          
            $this->delete($previousExerice[0]);
            }
        }
       
        for($i = 0; $i <= 4; $i++){
        
        $this->exerciseHandler->create("testSelectFourExercises" . $i);
       
        }
        //assert 4 exerices

 
        //when
        //Event is called by assertion directly
 
        //then
        $array = array();
        for($i = 0; $i <= 4; $i++){
           
          array_push($array, $this->exerciseHandler->getExercise("testSelectFourExercises" . $i));
       
        }
       
        $this->assertCount(5, $array);
    }
   
    protected function tearDown() : void
    {
        if($this->exerciseHandler->exists($this->exerciseTitle)){
            $this->exerciseHandler->delete($this->exerciseTitle);
        }
    }
}