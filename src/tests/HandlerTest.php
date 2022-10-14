<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;

require_once 'src/model/exercise_handler.php';
require_once 'src/model/exercise.php';
final class HandlerTest extends TestCase
{
    protected $exerciseHandler;
    protected $exerciseTitle;

    protected function setUp() : void
    {
        $this->exerciseHandler = ExerciseHandler::getInstance();
    }

    public function test_CreateNominalCase_Success(): void
    {
        //given
        $this->exerciseTitle = "test_CreateNominalCase_Success";
        $this->assertFalse($this->exists($this->exerciseTitle));

        //when
        $exercise = new Exercise(0,$this->exerciseTitle,0);
        $this->exerciseHandler->create($exercise->getTitle());
        //then
        $this->assertTrue($this->exists($exercise->getTitle()));
    }

    public function test_CreateNewExeciceDuplicateTitle_ThrowException(): void
    {
        //given
        $this->exerciseTitle = "test_ThrowException";
        $this->assertFalse($this->exists($this->exerciseTitle));
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
         $this->assertFalse($this->exists($this->exerciseTitle));
 
         //when
         $exercise = new Exercise(0,$this->exerciseTitle,0);
         $this->exerciseHandler->create($exercise->getTitle());
 
         //then
         $this->assertTrue($this->exists($exercise->getTitle()));
    }
    public function test_DeleteExercise_Success(): void
    {
        //given
    
        $this->exerciseTitle = "test_DeleteExercise_Success";
        $exercise = new exercise(0,$this->exerciseTitle,0);
        $this->exerciseHandler->create($this->exerciseTitle);
        $this->assertTrue($this->exists($this->exerciseTitle));
      
       
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
            $this->assertFalse($this->exists($this->exerciseTitle));

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

    protected function exists(...$exercises) : bool
    {
        $results = $this->exerciseHandler->getExercise(...$exercises);

        if(count($results) > 0) {
            for($i = 0; $i < count($results); $i++){
                if ($results[$i]->getTitle() != $exercises[$i]){
                    return false;
                }
            }
            return true;
        } else {
            return false; 
        }
    }
   
    protected function tearDown() : void
    {
        if($this->exists($this->exerciseTitle)){
            $this->exerciseHandler->delete($this->exerciseTitle);
        }
    }
}