<?php

namespace App\System;

use Carbon\Exceptions\Exception;
use League\Csv\Reader;
use League\Csv\Statement;
/**
 * Populate short summary.
 *
 * Populate description.
 *
 * @version 1.0
 * @author qasim
 */
class Populate
{
    public function readCsv()
    {
        try{
            $candidates = public_path().'/csv/candidates.csv';
            $jobs = public_path().'csv/jobs.csv';

            $canditatesList = [];

            if(file_exists($candidates))
            {

                if (($open = fopen($candidates, "r")) !== FALSE) {

                    while (($data = fgetcsv($open, 1000, ",")) !== FALSE) {
                        $canditatesList[] = $data;
                    }

                    fclose($open);
                }


            }
            if(file_exists($jobs))
            {
                $jobsList = [];

                if (($open = fopen($jobs, "r")) !== FALSE) {

                    while (($data = fgetcsv($open, 1000, ",")) !== FALSE) {
                        $jobsList[] = $data;
                    }

                    fclose($open);
                }


            }
        }
        catch(Exception $e)
        {
            print($e->getMessage());
        }
    }
}
