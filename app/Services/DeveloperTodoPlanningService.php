<?php

namespace App\Services;

use App\Constants\CommonConstants;

class DeveloperTodoPlanningService
{
    private $deptHours = 0;

    public function getWeeklyPlanning($developerTodos, $developers)
    {
        $developerWeeklyWorkHours = CommonConstants::WEEKLY_WORKING_HOURS;

        $firstLevelDifficultyTodos = $developerTodos->where('difficulty', 1);
        $secondLevelDifficultyTodos = $developerTodos->where('difficulty', 2);
        $thirdLevelDifficultyTodos = $developerTodos->where('difficulty', 3);
        $fourthLevelDifficultyTodos = $developerTodos->where('difficulty', 4);
        $fifthLevelDifficultyTodos = $developerTodos->where('difficulty', 5);

        $firstLevelDifficultyDevelopers = $developers->where('difficulty', 1)->first();
        $secondLevelDifficultyDevelopers = $developers->where('difficulty', 2)->first();
        $thirdLevelDifficultyDevelopers = $developers->where('difficulty', 3)->first();
        $fourthLevelDifficultyDevelopers = $developers->where('difficulty', 4)->first();
        $fifthLevelDifficultyDevelopers = $developers->where('difficulty', 5)->first();

        $firstLevelDeveloperWeeklyPlan = $this->getDeveloperWeeklyPlan($firstLevelDifficultyTodos, $firstLevelDifficultyDevelopers, $developerWeeklyWorkHours);
        $secondLevelDeveloperWeeklyPlan = $this->getDeveloperWeeklyPlan($secondLevelDifficultyTodos, $secondLevelDifficultyDevelopers, $developerWeeklyWorkHours);
        $thirdLevelDeveloperWeeklyPlan = $this->getDeveloperWeeklyPlan($thirdLevelDifficultyTodos, $thirdLevelDifficultyDevelopers, $developerWeeklyWorkHours);
        $fourthLevelDeveloperWeeklyPlan = $this->getDeveloperWeeklyPlan($fourthLevelDifficultyTodos, $fourthLevelDifficultyDevelopers, $developerWeeklyWorkHours);
        $fifthLevelDeveloperWeeklyPlan = $this->getDeveloperWeeklyPlan($fifthLevelDifficultyTodos, $fifthLevelDifficultyDevelopers, $developerWeeklyWorkHours);

        $weeklyPlanning = [
            $firstLevelDeveloperWeeklyPlan,
            $secondLevelDeveloperWeeklyPlan,
            $thirdLevelDeveloperWeeklyPlan,
            $fourthLevelDeveloperWeeklyPlan,
            $fifthLevelDeveloperWeeklyPlan,
        ];

        dd($weeklyPlanning);
    }

    private function getDeveloperWeeklyPlan($firstLevelDifficultyTodos, $firstLevelDifficultyDevelopers, $developerWeeklyWorkHours)
    {
        $developerDailyWorkHour = $developerWeeklyWorkHours / 5;
        $workingDaysOfTheWeek = CommonConstants::WORKING_DAYS_OF_THE_WEEK;

        $planningWeeklyWork = [];
        foreach ($workingDaysOfTheWeek as $workingDay) {
            foreach ($firstLevelDifficultyTodos as $firstLevelDifficultyTodo) {
                //
            }
        }

        return [
            'developer' => $firstLevelDifficultyDevelopers->full_name,
            'planningWeeklyWork' => $planningWeeklyWork,
        ];
    }

    /**
     * @return int
     */
    public function getDeptHours(): int
    {
        return $this->deptHours;
    }

    /**
     * @param int $deptHours
     */
    public function setDeptHours(int $deptHours): void
    {
        $this->deptHours = $deptHours;
    }
}
