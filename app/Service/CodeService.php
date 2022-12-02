<?php

namespace App\Service;

use Carbon\Carbon;
use Illuminate\Support\Str;

class CodeService
{
    public function GenerateProgramCode($name)
    {

        $expl = explode(' ', Str::upper($name));
        $codehotel = '';
        foreach ($expl as $key => $value) {
            $codehotel = $codehotel . substr($value, 0, 1);
        }

        while (strlen($codehotel) < 6) {
            $codehotel = $codehotel . rand(0, 9);
        }
        return $codehotel;
    }
    public function GenerateRunningProgramCode($name)
    {

        $expl = explode(' ', Str::upper($name));
        $codehotel = '';
        foreach ($expl as $key => $value) {
            $codehotel = $codehotel . substr($value, 0, 1);
        }

        while (strlen($codehotel) < 6) {
            $codehotel = $codehotel . rand(0, 9);
        }
        return 'GANPRO' . $codehotel;
    }

    public function generateCurriculumCode($name)
    {
        $expl = explode(' ', Str::upper($name));
        $codehotel = '';
        foreach ($expl as $key => $value) {
            $codehotel = $codehotel . substr($value, 0, 1);
        }

        while (strlen($codehotel) < 6) {
            $codehotel = $codehotel . rand(0, 9);
        }
        return 'GANCUR' . $codehotel;
    }

    public function GenerateExerciseCode($name)
    {

        $expl = explode(' ', Str::upper($name));
        $codehotel = '';
        foreach ($expl as $key => $value) {
            $codehotel = $codehotel . substr($value, 0, 1);
        }

        while (strlen($codehotel) < 6) {
            $codehotel = $codehotel . rand(0, 9);
        }
        return $codehotel;
    }

    public function GenerateExerciseSessionCode($name)
    {

        $expl = explode(' ', Str::upper($name));
        $codehotel = '';
        foreach ($expl as $key => $value) {
            $codehotel = $codehotel . substr($value, 0, 1);
        }

        while (strlen($codehotel) < 6) {
            $codehotel = $codehotel . rand(0, 9);
        }
        return $codehotel;
    }

    public function GenerateTrainingCode($name)
    {

        $expl = explode(' ', Str::upper($name));
        $codehotel = '';
        foreach ($expl as $key => $value) {
            $codehotel = $codehotel . substr($value, 0, 1);
        }

        while (strlen($codehotel) < 6) {
            $codehotel = $codehotel . rand(0, 9);
        }
        return $codehotel;
    }

    public function GenerateGroupTrainingCode($name)
    {

        $expl = explode(' ', Str::upper($name));
        $codehotel = '';
        foreach ($expl as $key => $value) {
            $codehotel = $codehotel . substr($value, 0, 1);
        }

        while (strlen($codehotel) < 6) {
            $codehotel = $codehotel . rand(0, 9);
        }
        return $codehotel;
    }

    public function getInitial($str)
    {
        preg_match_all('/(?<=\b)[a-z]/i', $str, $matches);
        $result = strtoupper(implode('', $str[0]));
        return str()->upper($result);
    }
}
