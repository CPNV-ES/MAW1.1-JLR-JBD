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
         $this->exerciseTitle = "test_CreateNewexercise_Success";
         $this->assertFalse($this->exerciseHandler->exists($this->exerciseTitle));
 
         //when
         $exercise = new Exercise(0,$this->exerciseTitle,0);
         $this->exerciseHandler->create($exercise->getTitle());
 
         //then
         $this->assertTrue($this->exerciseHandler->exists($exercise->getTitle()));
    }
    public function test_DeleteExercise_Success(): void
    {
        //given
    
        $this->exerciseTitle = "test_DeleteExercise_Success";
        $exercise = new exercise(0,$this->exerciseTitle,0);
        $this->exerciseHandler->create($this->exerciseTitle);
        $this->assertTrue($this->exerciseHandler->exists($this->exerciseTitle));
      
       
        //delete Exercise

 
        //when
        $this->exerciseHandler->delete($this->exerciseTitle);
        //Event is called by assertion directly

        //then
        $this->assertCount(0, $this->exerciseHandler->getExercise($this->exerciseTitle));
    }

   
    public function test_SelectFourExercises_Success(): void
    {
       //given
        for($i = 0; $i <= 4; $i++){
            $this->exerciseTitle = "test_DeleteExercise_Success" . $i;
            $this->assertFalse($this->exerciseHandler->exists($this->exerciseTitle));

        }
        //assert 4 exerices

 
        //when
        for($i = 0; $i <= 4; $i++){
            $this->exerciseTitle = "test_DeleteExercise_Success" . $i;
            $exercise = new exercise(0,$this->exerciseTitle,0);
            $this->exerciseHandler->create($this->exerciseTitle);

        }
        //then
        $array = array();
        for($i = 0; $i <= 4; $i++){
           
          array_push($array, $this->exerciseHandler->getExercise("testSelectFourExercises" . $i));
       
        }
       
        $this->assertCount(5, $array);
        for($i = 0; $i <= 4; $i++){
            $this->exerciseTitle = "test_DeleteExercise_Success" . $i;
            $exercise = new exercise(0,$this->exerciseTitle,0);
            $this->exerciseHandler->delete($this->exerciseTitle);

        }
    }
   
    protected function tearDown() : void
    {
        if($this->exerciseHandler->exists($this->exerciseTitle)){
            $this->exerciseHandler->delete($this->exerciseTitle);
        }
    }
}